<?php
/**
 * External API functions for local_novalxpapi.
 */

namespace local_novalxpapi;

defined('MOODLE_INTERNAL') || die();

use core_external\external_api;
use core_external\external_function_parameters;
use core_external\external_value;
use core_external\external_single_structure;
use mod_quiz\question\display_options; // For review timing bitmasks.

class external extends external_api {

    // -------------------------------------------------------------------------
    // Create Course
    // -------------------------------------------------------------------------
    public static function create_course_parameters() {
        return new external_function_parameters(array(
            'fullname'   => new external_value(PARAM_TEXT, 'Course full name', VALUE_REQUIRED),
            'shortname'  => new external_value(PARAM_TEXT, 'Course short name', VALUE_REQUIRED),
            'categoryid' => new external_value(PARAM_INT,  'Category ID', VALUE_DEFAULT, 1),
            'summary'    => new external_value(PARAM_RAW,  'Course summary/intro (HTML allowed)', VALUE_DEFAULT, ''),
        ));
    }

    public static function create_course($fullname, $shortname, $categoryid = 1, $summary = '') {
        global $CFG;

        // Debug marker so we can see this is actually running.
        error_log('[NovaLXP] create_course EXECUTING from ' . __FILE__);

        $params = self::validate_parameters(self::create_course_parameters(), array(
            'fullname'   => $fullname,
            'shortname'  => $shortname,
            'categoryid' => $categoryid,
            'summary'    => $summary,
        ));

        self::validate_context(\context_system::instance());
        \require_capability('moodle/course:create', \context_system::instance());

        require_once($CFG->dirroot . '/course/lib.php');

        $course = (object) array(
            'fullname'      => $params['fullname'],
            'shortname'     => $params['shortname'],
            'category'      => $params['categoryid'],
            'summary'       => $params['summary'],
            'summaryformat' => FORMAT_HTML,
        );

        debugging('local_novalxpapi create_course params: ' . json_encode($course), DEBUG_DEVELOPER);
        error_log('[NovaLXP] create_course params: ' . json_encode($course));

        try {
            // 1) Create the course.
            $newcourse = \create_course($course);

            debugging('local_novalxpapi create_course created id: ' . $newcourse->id, DEBUG_DEVELOPER);
            error_log('[NovaLXP] create_course created id: ' . $newcourse->id);

            // 2) Ensure Self enrolment (Student) exists and is enabled.
            self::ensure_self_enrol_instance($newcourse);

            return (int)$newcourse->id;

        } catch (\Throwable $e) {
            debugging('local_novalxpapi create_course error: ' . $e->getMessage(), DEBUG_DEVELOPER);
            error_log('[NovaLXP] create_course error: ' . $e->getMessage());
            throw $e;
        }
    }

    public static function create_course_returns() {
        return new external_value(PARAM_INT, 'New course ID');
    }

    /**
     * Enable a self-enrol instance (status=0, allow new enrolments=1).
     *
     * @param \stdClass $instance enrol record
     * @param \stdClass $course   course record
     */
    protected static function enable_self_enrol_instance(\stdClass $instance, \stdClass $course): void {
        global $DB;

        $needsupdate = false;

        // status: 0 = enabled, 1 = disabled.
        if (!isset($instance->status) || (int)$instance->status !== ENROL_INSTANCE_ENABLED) {
            $instance->status = ENROL_INSTANCE_ENABLED; // 0
            $needsupdate = true;
        }

        // customint6: for enrol_self this is "Allow new enrolments" (1=yes, 0=no).
        if (!isset($instance->customint6) || (int)$instance->customint6 !== 1) {
            $instance->customint6 = 1;
            $needsupdate = true;
        }

        if ($needsupdate) {
            $instance->timemodified = time();
            $DB->update_record('enrol', $instance);

            debugging('local_novalxpapi: enabled self enrol instance id ' . $instance->id .
                ' for course ' . $course->id, DEBUG_DEVELOPER);
            error_log('[NovaLXP] ensure_self_enrol_instance: enabled self enrol instance id ' . $instance->id .
                ' for course ' . $course->id);
        } else {
            debugging('local_novalxpapi: self enrol instance already enabled for course ' . $course->id,
                DEBUG_DEVELOPER);
            error_log('[NovaLXP] ensure_self_enrol_instance: self enrol instance already enabled for course ' . $course->id);
        }
    }

    /**
     * Ensure a Self enrolment (Student) instance exists and is enabled for a course.
     *
     * - status     = ENROL_INSTANCE_ENABLED (0)  → eye open
     * - customint6 = 1 (Allow new enrolments = Yes)
     *
     * @param \stdClass $course The course object.
     */
    protected static function ensure_self_enrol_instance(\stdClass $course): void {
        global $CFG, $DB;

        // Debug marker so we can see this helper is being called.
        error_log('[NovaLXP] ensure_self_enrol_instance EXECUTING for course ' . $course->id);

        debugging('local_novalxpapi: ensure_self_enrol_instance CALLED for course ' . $course->id, DEBUG_DEVELOPER);
        error_log('[NovaLXP] ensure_self_enrol_instance CALLED for course ' . $course->id);

        // Core enrol API + self enrol plugin.
        require_once($CFG->libdir . '/enrollib.php');          // ✅ core enrol lib
        require_once($CFG->dirroot . '/enrol/self/lib.php');   // ✅ self enrol plugin lib

        $plugin = \enrol_get_plugin('self');
        if (!$plugin) {
            debugging('local_novalxpapi: self enrol plugin not available', DEBUG_DEVELOPER);
            error_log('[NovaLXP] ensure_self_enrol_instance: self enrol plugin not available');
            return;
        }

        // 1) Check for existing self-enrol instance using enrol_get_instances().
        $instances = \enrol_get_instances($course->id, false); // include disabled
        foreach ($instances as $instance) {
            if ($instance->enrol === 'self') {
                error_log('[NovaLXP] ensure_self_enrol_instance: found existing self instance id ' . $instance->id);
                self::enable_self_enrol_instance($instance, $course);
                return;
            }
        }

        // 2) No existing instance — create one.

        // Determine which role to assign (student).
        $roleid = (int)$plugin->get_config('roleid');
        if (empty($roleid)) {
            $studentrole = $DB->get_record('role', ['shortname' => 'student'], 'id', IGNORE_MISSING);
            if ($studentrole) {
                $roleid = (int)$studentrole->id;
            }
        }
        if (empty($roleid)) {
            $archetypes = get_archetype_roles('student');
            if (!empty($archetypes)) {
                $role = reset($archetypes);
                $roleid = (int)$role->id;
            }
        }
        if (empty($roleid)) {
            debugging('local_novalxpapi: could not determine student roleid for self enrol', DEBUG_DEVELOPER);
            error_log('[NovaLXP] ensure_self_enrol_instance: could not determine student roleid for self enrol');
            return;
        }

        $fields = array(
            'status'      => ENROL_INSTANCE_ENABLED, // 0 = enabled.
            'roleid'      => $roleid,
            'enrolperiod' => 0,                      // No expiry.
            'customint6'  => 1,                      // Allow new enrolments.
        );

        try {
            $instanceid = $plugin->add_instance($course, $fields);

            debugging('local_novalxpapi: created self enrol instance id ' . $instanceid .
                ' for course ' . $course->id, DEBUG_DEVELOPER);
            error_log('[NovaLXP] ensure_self_enrol_instance: created self enrol instance id ' . $instanceid .
                ' for course ' . $course->id);

            // Reload from DB and force fields (belt & braces).
            $instance = $DB->get_record('enrol', ['id' => $instanceid], '*', MUST_EXIST);
            self::enable_self_enrol_instance($instance, $course);

        } catch (\Throwable $e) {
            debugging('local_novalxpapi: error creating self enrol instance: ' . $e->getMessage(), DEBUG_DEVELOPER);
            error_log('[NovaLXP] ensure_self_enrol_instance: error creating self enrol instance: ' . $e->getMessage());
        }
    }

    // -------------------------------------------------------------------------
    // Enrol User
    // -------------------------------------------------------------------------
    public static function enrol_user_parameters() {
        return new external_function_parameters(array(
            'userid'   => new external_value(PARAM_INT, 'User ID', VALUE_REQUIRED),
            'courseid' => new external_value(PARAM_INT, 'Course ID', VALUE_REQUIRED),
            'roleid'   => new external_value(PARAM_INT, 'Role ID (default student=5)', VALUE_DEFAULT, 5),
        ));
    }

    public static function enrol_user($userid, $courseid, $roleid = 5) {
        global $CFG;

        $params = self::validate_parameters(self::enrol_user_parameters(), array(
            'userid'   => $userid,
            'courseid' => $courseid,
            'roleid'   => $roleid,
        ));

        $coursectx = \context_course::instance($params['courseid']);
        self::validate_context($coursectx);
        \require_capability('enrol/manual:enrol', $coursectx);

        require_once($CFG->dirroot . '/enrol/manual/lib.php');

        debugging('local_novalxpapi enrol_user params: ' . json_encode($params), DEBUG_DEVELOPER);
        error_log('[NovaLXP] enrol_user params: ' . json_encode($params));

        $enrol = \enrol_get_plugin('manual');
        if (!$enrol) {
            throw new \moodle_exception('Manual enrolment plugin not enabled', 'enrol_manual');
        }

        $instances = \enrol_get_instances($params['courseid'], true);
        $manualinstance = null;
        foreach ($instances as $instance) {
            if ($instance->enrol === 'manual') {
                $manualinstance = $instance;
                break;
            }
        }
        if (!$manualinstance) {
            throw new \moodle_exception('No manual enrolment instance found', 'enrol_manual');
        }

        try {
            $enrol->enrol_user($manualinstance, $params['userid'], $params['roleid']);
            debugging('local_novalxpapi enrol_user success', DEBUG_DEVELOPER);
            error_log('[NovaLXP] enrol_user success');
            return true;
        } catch (\Throwable $e) {
            debugging('local_novalxpapi enrol_user error: ' . $e->getMessage(), DEBUG_DEVELOPER);
            error_log('[NovaLXP] enrol_user error: ' . $e->getMessage());
            throw $e;
        }
    }

    public static function enrol_user_returns() {
        return new external_value(PARAM_BOOL, 'True if enrolment succeeded');
    }

    // -------------------------------------------------------------------------
    // Add Section
    // -------------------------------------------------------------------------
    public static function add_section_parameters() {
        return new external_function_parameters(array(
            'courseid' => new external_value(PARAM_INT,  'Course ID', VALUE_REQUIRED),
            'name'     => new external_value(PARAM_TEXT, 'Section name (optional)', VALUE_DEFAULT, ''),
        ));
    }

    public static function add_section($courseid, $name = '') {
        global $CFG, $DB;

        $params = self::validate_parameters(self::add_section_parameters(), array(
            'courseid' => $courseid,
            'name'     => $name,
        ));

        $course = get_course($params['courseid']);
        $coursectx = \context_course::instance($course->id);
        self::validate_context($coursectx);
        \require_capability('moodle/course:update', $coursectx);

        require_once($CFG->dirroot . '/course/lib.php');

        debugging('local_novalxpapi add_section params: ' . json_encode($params), DEBUG_DEVELOPER);
        error_log('[NovaLXP] add_section params: ' . json_encode($params));

        try {
            $section = \course_create_section($course->id, 0);

            if ($params['name'] !== '') {
                $DB->set_field('course_sections', 'name', $params['name'], array('id' => $section->id));
                $section->name = $params['name'];
            }

            \rebuild_course_cache($course->id, true);

            debugging('local_novalxpapi add_section created: ' . json_encode(array(
                'id'      => $section->id,
                'section' => $section->section,
                'name'    => $params['name'],
            )), DEBUG_DEVELOPER);

            error_log('[NovaLXP] add_section created: ' . json_encode(array(
                'id'      => $section->id,
                'section' => $section->section,
                'name'    => $params['name'],
            )));

            return (int)$section->id;
        } catch (\Throwable $e) {
            debugging('local_novalxpapi add_section error: ' . $e->getMessage(), DEBUG_DEVELOPER);
            error_log('[NovaLXP] add_section error: ' . $e->getMessage());
            throw $e;
        }
    }

    public static function add_section_returns() {
        return new external_value(PARAM_INT, 'New section ID (course_sections.id)');
    }

    // -------------------------------------------------------------------------
    // Add Page (mod_page)
    // -------------------------------------------------------------------------
    public static function add_page_parameters() {
        return new external_function_parameters(array(
            'courseid' => new external_value(PARAM_INT, 'Course ID', VALUE_REQUIRED),
            'section'  => new external_value(PARAM_INT,
                'Course section row ID (course_sections.id) OR section number, or 0 for last section',
                VALUE_DEFAULT, 0),
            'title'    => new external_value(PARAM_TEXT, 'Page title', VALUE_DEFAULT, ''),
            'content'  => new external_value(PARAM_RAW,  'Page content (HTML)', VALUE_DEFAULT, ''),
            'visible'  => new external_value(PARAM_INT,  'Visibility (1=visible, 0=hidden)', VALUE_DEFAULT, 1),
        ));
    }

    public static function add_page($courseid, $section = 0, $title = '', $content = '', $visible = 1) {
        global $CFG, $DB;

        require_once($CFG->dirroot . '/course/lib.php');
        require_once($CFG->dirroot . '/course/modlib.php');

        $params = self::validate_parameters(self::add_page_parameters(), array(
            'courseid' => $courseid,
            'section'  => $section,
            'title'    => $title,
            'content'  => $content,
            'visible'  => $visible,
        ));

        $course = get_course($params['courseid']);
        $coursectx = \context_course::instance($course->id);
        self::validate_context($coursectx);

        \require_capability('moodle/course:manageactivities', $coursectx);
        \require_capability('mod/page:addinstance', $coursectx);

        debugging('local_novalxpapi add_page incoming params: ' . json_encode($params), DEBUG_DEVELOPER);
        error_log('[NovaLXP] add_page incoming params: ' . json_encode($params));

        $sectionparam = (int)$params['section'];

        if ($sectionparam <= 0) {
            $format = \course_get_format($course);
            $sectionnum = max(1, $format->get_last_section_number());
        } else {
            $record = $DB->get_record(
                'course_sections',
                array(
                    'id'     => $sectionparam,
                    'course' => $course->id,
                ),
                'id, section',
                IGNORE_MISSING
            );

            if ($record) {
                $sectionnum = (int)$record->section;
            } else {
                $record = $DB->get_record(
                    'course_sections',
                    array(
                        'course'  => $course->id,
                        'section' => $sectionparam,
                    ),
                    'id, section',
                    MUST_EXIST
                );

                $sectionnum = (int)$record->section;
            }
        }

        \course_create_sections_if_missing($course->id, array($sectionnum));

        debugging('local_novalxpapi add_page resolved sectionnum: ' . $sectionnum, DEBUG_DEVELOPER);
        error_log('[NovaLXP] add_page resolved sectionnum: ' . $sectionnum);

        $decodedcontent = html_entity_decode($params['content'], ENT_QUOTES | ENT_HTML5, 'UTF-8');

        list($module, $modcontext, $cw, $cm, $moduleinfo) =
            \prepare_new_moduleinfo_data($course, 'page', $sectionnum);

        $moduleinfo->name          = ($params['title'] !== '' ? $params['title'] : 'Page');
        $moduleinfo->intro         = ($params['title'] !== '' ? $params['title'] : '');
        $moduleinfo->introformat   = FORMAT_HTML;
        $moduleinfo->content       = ($decodedcontent !== '' ? $decodedcontent : '<p></p>');
        $moduleinfo->contentformat = FORMAT_HTML;
        $moduleinfo->visible       = (int)$params['visible'];

        debugging('local_novalxpapi add_page moduleinfo before add_moduleinfo: ' . json_encode($moduleinfo), DEBUG_DEVELOPER);
        error_log('[NovaLXP] add_page moduleinfo before add_moduleinfo: ' . json_encode($moduleinfo));

        try {
            $moduleinfo = \add_moduleinfo($moduleinfo, $course);

            debugging('local_novalxpapi add_page created coursemodule: ' . $moduleinfo->coursemodule, DEBUG_DEVELOPER);
            error_log('[NovaLXP] add_page created coursemodule: ' . $moduleinfo->coursemodule);

            return (int)$moduleinfo->coursemodule;
        } catch (\Throwable $e) {
            $context = array(
                'courseid'    => $course->id,
                'section_in'  => $params['section'],
                'section_num' => $sectionnum,
                'title'       => $params['title'],
                'content_len' => strlen($decodedcontent),
                'visible'     => (int)$params['visible'],
                'exception'   => get_class($e),
            );

            debugging('local_novalxpapi add_page error: ' . $e->getMessage(), DEBUG_DEVELOPER);
            debugging('local_novalxpapi add_page error context: ' . json_encode($context), DEBUG_DEVELOPER);
            debugging('local_novalxpapi add_page stack: ' . $e->getTraceAsString(), DEBUG_DEVELOPER);

            error_log('[NovaLXP] add_page error: ' . $e->getMessage());
            error_log('[NovaLXP] add_page error context: ' . json_encode($context));
            error_log('[NovaLXP] add_page stack: ' . $e->getTraceAsString());

            throw $e;
        }
    }

    public static function add_page_returns() {
        return new external_value(PARAM_INT, 'New course module ID for the page');
    }

    // -------------------------------------------------------------------------
    // Create Quiz + GIFT import
    // -------------------------------------------------------------------------
    public static function create_quiz_parameters() {
        return new external_function_parameters(array(
            'courseid'    => new external_value(PARAM_INT,  'Course ID', VALUE_REQUIRED),
            'section'     => new external_value(PARAM_INT,  'Section id/number (0 = last)', VALUE_DEFAULT, 0),
            'quizname'    => new external_value(PARAM_TEXT, 'Quiz name', VALUE_REQUIRED),
            'intro'       => new external_value(PARAM_RAW,  'Quiz introduction (HTML)', VALUE_DEFAULT, ''),
            'visible'     => new external_value(PARAM_INT,  'Visibility (1=visible, 0=hidden)', VALUE_DEFAULT, 1),
            'gifttext'    => new external_value(PARAM_RAW,  'GIFT-formatted question text', VALUE_DEFAULT, ''),
            'sectionname' => new external_value(PARAM_TEXT, 'Optional section name label (unused)', VALUE_DEFAULT, ''),
        ));
    }

    public static function create_quiz($courseid, $section = 0, $quizname = '', $intro = '', $visible = 1,
        $gifttext = '', $sectionname = '') {

        global $DB, $CFG;

        require_once($CFG->dirroot . '/mod/quiz/lib.php');

        $params = self::validate_parameters(self::create_quiz_parameters(), array(
            'courseid'    => $courseid,
            'section'     => $section,
            'quizname'    => $quizname,
            'intro'       => $intro,
            'visible'     => $visible,
            'gifttext'    => $gifttext,
            'sectionname' => $sectionname,
        ));

        $course = get_course($params['courseid']);
        $coursectx = \context_course::instance($course->id);
        self::validate_context($coursectx);

        \require_capability('moodle/course:manageactivities', $coursectx);
        \require_capability('mod/quiz:addinstance', $coursectx);

        debugging('local_novalxpapi create_quiz incoming params: ' . json_encode($params), DEBUG_DEVELOPER);
        error_log('[NovaLXP] create_quiz incoming params: ' . json_encode($params));

        try {
            // 1) Create quiz shell.
            $cmid = \local_novalxpapi\local\quiz_service::create_quiz(
                $course,
                (int)$params['section'],
                (string)$params['quizname'],
                (string)$params['intro'],
                (int)$params['visible']
            );

            $cm   = get_coursemodule_from_id('quiz', $cmid, $course->id, false, MUST_EXIST);
            $quiz = $DB->get_record('quiz', array('id' => $cm->instance), '*', MUST_EXIST);

            // Behaviour: deferred feedback.
            $quiz->preferredbehaviour = 'deferredfeedback';

            // Time bitmasks.
            $dur = display_options::DURING;
            $imm = display_options::IMMEDIATELY_AFTER;
            $lat = display_options::LATER_WHILE_OPEN;
            $clo = display_options::AFTER_CLOSE;

            // The attempt: During + Immediately + Later.
            $quiz->reviewattempt = $dur | $imm | $lat;

            // Whether correct: Immediately + Later.
            $quiz->reviewcorrectness = $imm | $lat;

            // Marks: During + Immediately + Later.
            $quiz->reviewmarks = $dur | $imm | $lat;

            // Maximum marks: same timings as Marks.
            if (property_exists($quiz, 'reviewmaxmarks')) {
                $quiz->reviewmaxmarks = $dur | $imm | $lat;
            }

            // Specific/general feedback, right answer: all off.
            $quiz->reviewspecificfeedback = 0;
            $quiz->reviewgeneralfeedback  = 0;
            $quiz->reviewrightanswer      = 0;

            // Overall feedback: Immediately + Later.
            $quiz->reviewoverallfeedback = $imm | $lat;

            $DB->update_record('quiz', $quiz);

            // 2) Import GIFT and add questions.
            $questionsparsed = 0;
            $questionsadded  = 0;
            $questionids     = array();

            if (trim((string)$params['gifttext']) !== '') {
                $importresult = \local_novalxpapi\local\gift_service::import_gift_for_quiz(
                    $course,
                    $cm,
                    (string)$params['gifttext'],
                    0 // default module category
                );

                $questionsparsed = (int)$importresult['questionsparsed'];
                $questionids     = $importresult['questionids'];

                if (!empty($questionids)) {
                    $questionsadded = \local_novalxpapi\local\quiz_service::add_questions_to_quiz(
                        $quiz,
                        $questionids,
                        1.0
                    );

                    // 3) Enforce scoring: total 100, passing 80, equal per-question marks.
                    $slots = $DB->get_records('quiz_slots', array('quizid' => $quiz->id), 'slot ASC');

                    if (!empty($slots)) {
                        $slotcount   = count($slots);
                        $totalgrade  = 100.0;
                        $perquestion = $totalgrade / $slotcount;

                        foreach ($slots as $slot) {
                            $DB->set_field('quiz_slots', 'maxmark', $perquestion, array('id' => $slot->id));
                        }

                        $quiz->sumgrades = $totalgrade;
                        $quiz->grade     = $totalgrade;
                        $quiz->gradepass = 80.0;

                        $DB->update_record('quiz', $quiz);
                        quiz_grade_item_update($quiz);
                    }
                }

                debugging(
                    '[NovaLXP] create_quiz GIFT import result: parsed=' . $questionsparsed .
                    ', added=' . $questionsadded . ', questionids=' . json_encode($questionids),
                    DEBUG_DEVELOPER
                );
                error_log(
                    '[NovaLXP] create_quiz GIFT import result: parsed=' . $questionsparsed .
                    ', added=' . $questionsadded . ', questionids=' . json_encode($questionids)
                );
            }

            return array(
                'cmid'            => (int)$cmid,
                'quizid'          => (int)$quiz->id,
                'questionsparsed' => (int)$questionsparsed,
                'questionsadded'  => (int)$questionsadded,
                'status'          => true,
                'message'         => 'Quiz created and questions imported from GIFT.',
            );
        } catch (\Throwable $e) {
            debugging('local_novalxpapi create_quiz error: ' . $e->getMessage(), DEBUG_DEVELOPER);
            error_log('[NovaLXP] create_quiz error: ' . $e->getMessage());
            throw $e;
        }
    }

    public static function create_quiz_returns() {
        return new external_single_structure(array(
            'cmid'            => new external_value(PARAM_INT,  'New course module ID for the quiz'),
            'quizid'          => new external_value(PARAM_INT,  'Quiz ID (mod_quiz instance id)'),
            'questionsparsed' => new external_value(PARAM_INT,  'Number of questions imported into the quiz question bank'),
            'questionsadded'  => new external_value(PARAM_INT,  'Number of questions added to the quiz'),
            'status'          => new external_value(PARAM_BOOL, 'True on success'),
            'message'         => new external_value(PARAM_TEXT, 'Status message'),
        ));
    }

    // -------------------------------------------------------------------------
    // Apply quiz completion guardrails
    // -------------------------------------------------------------------------
    public static function apply_quiz_completion_guardrails_parameters() {
        return new external_function_parameters(array(
            'courseid'       => new external_value(PARAM_INT, 'Course ID', VALUE_REQUIRED),
            'quizcmid'       => new external_value(PARAM_INT, 'Quiz course module ID', VALUE_DEFAULT, 0),
            'quizid'         => new external_value(PARAM_INT, 'Quiz instance ID', VALUE_DEFAULT, 0),
            'passmark'       => new external_value(PARAM_FLOAT, 'Pass mark percentage', VALUE_DEFAULT, 80),
            'shuffleanswers' => new external_value(PARAM_INT, 'Whether to force quiz/question answer shuffling', VALUE_DEFAULT, 1),
        ));
    }

    public static function apply_quiz_completion_guardrails($courseid, $quizcmid = 0, $quizid = 0,
        $passmark = 80, $shuffleanswers = 1) {
        global $CFG, $DB;

        require_once($CFG->dirroot . '/course/lib.php');

        $params = self::validate_parameters(self::apply_quiz_completion_guardrails_parameters(), array(
            'courseid'       => $courseid,
            'quizcmid'       => $quizcmid,
            'quizid'         => $quizid,
            'passmark'       => $passmark,
            'shuffleanswers' => $shuffleanswers,
        ));

        $course = get_course($params['courseid']);
        $coursectx = \context_course::instance($course->id);
        self::validate_context($coursectx);

        \require_capability('moodle/course:update', $coursectx);
        \require_capability('moodle/course:manageactivities', $coursectx);

        $quizmodule = $DB->get_record('modules', ['name' => 'quiz'], '*', MUST_EXIST);

        $cm = null;
        $quiz = null;

        if (!empty($params['quizcmid'])) {
            $cm = get_coursemodule_from_id('quiz', (int)$params['quizcmid'], $course->id, false, MUST_EXIST);
            $quiz = $DB->get_record('quiz', ['id' => $cm->instance], '*', MUST_EXIST);
        } else if (!empty($params['quizid'])) {
            $quiz = $DB->get_record('quiz', ['id' => (int)$params['quizid'], 'course' => $course->id], '*', MUST_EXIST);
            $cm = $DB->get_record('course_modules', [
                'course' => $course->id,
                'module' => $quizmodule->id,
                'instance' => $quiz->id,
            ], '*', MUST_EXIST);
        } else {
            throw new \moodle_exception('invalidparameter', 'error', '', 'quizcmid or quizid');
        }

        $transaction = $DB->start_delegated_transaction();
        $actions = array();

        if ((int)$course->enablecompletion !== 1) {
            $course->enablecompletion = 1;
            $DB->update_record('course', $course);
            $actions[] = 'enabled_course_completion';
        }

        $cmupdate = (object) array(
            'id' => $cm->id,
            'completion' => 2,
            'completionpassgrade' => 1,
            'completiongradeitemnumber' => 0,
        );
        $DB->update_record('course_modules', $cmupdate);
        $actions[] = 'set_quiz_activity_completion_passgrade';

        $gradeitem = $DB->get_record('grade_items', [
            'courseid' => $course->id,
            'itemmodule' => 'quiz',
            'iteminstance' => $quiz->id,
        ], '*', IGNORE_MISSING);
        if ($gradeitem) {
            $gradeitem->gradepass = (float)$params['passmark'];
            $DB->update_record('grade_items', $gradeitem);
            $actions[] = 'set_quiz_gradepass';
        }

        $criteriaexists = $DB->record_exists_select(
            'course_completion_criteria',
            'course = :course AND criteriatype = 4 AND moduleinstance = :moduleinstance',
            ['course' => $course->id, 'moduleinstance' => $cm->id]
        );

        if (!$criteriaexists) {
            $columns = $DB->get_columns('course_completion_criteria');
            $criterion = (object) array(
                'course' => $course->id,
                'criteriatype' => 4,
                'moduleinstance' => $cm->id,
            );

            if (isset($columns['module'])) {
                $criterion->module = $quizmodule->id;
            }
            if (isset($columns['courseinstance'])) {
                $criterion->courseinstance = 0;
            }
            if (isset($columns['enrolperiod'])) {
                $criterion->enrolperiod = 0;
            }
            if (isset($columns['timeend'])) {
                $criterion->timeend = 0;
            }
            if (isset($columns['gradepass'])) {
                $criterion->gradepass = null;
            }
            if (isset($columns['role'])) {
                $criterion->role = null;
            }

            $DB->insert_record('course_completion_criteria', $criterion);
            $actions[] = 'added_activity_completion_criterion';
        }

        $DB->delete_records('course_completion_criteria', [
            'course' => $course->id,
            'criteriatype' => 6,
        ]);
        $actions[] = 'removed_course_grade_criteria';

        if ((int)$params['shuffleanswers'] === 1) {
            if ((int)$quiz->shuffleanswers !== 1) {
                $quizupdate = (object) array(
                    'id' => $quiz->id,
                    'shuffleanswers' => 1,
                );
                $DB->update_record('quiz', $quizupdate);
            }
            $actions[] = 'enabled_quiz_shuffleanswers';

        }

        \rebuild_course_cache($course->id, true);
        $transaction->allow_commit();

        $guardrailsready = true;
        $cmfresh = $DB->get_record('course_modules', ['id' => $cm->id], '*', MUST_EXIST);
        if ((int)$cmfresh->completion !== 2 || (int)$cmfresh->completionpassgrade !== 1) {
            $guardrailsready = false;
        }

        return array(
            'status' => true,
            'courseid' => (int)$course->id,
            'quizid' => (int)$quiz->id,
            'quizcmid' => (int)$cm->id,
            'guardrailsready' => $guardrailsready,
            'actionsjson' => json_encode($actions),
        );
    }

    public static function apply_quiz_completion_guardrails_returns() {
        return new external_single_structure(array(
            'status' => new external_value(PARAM_BOOL, 'True on success'),
            'courseid' => new external_value(PARAM_INT, 'Course ID'),
            'quizid' => new external_value(PARAM_INT, 'Quiz ID'),
            'quizcmid' => new external_value(PARAM_INT, 'Quiz course module ID'),
            'guardrailsready' => new external_value(PARAM_BOOL, 'Whether the key guardrails appear to be in place'),
            'actionsjson' => new external_value(PARAM_RAW, 'JSON list of actions applied'),
        ));
    }
}
