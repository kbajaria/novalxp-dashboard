<?php
/**
 * Internal quiz helper functions for NovaLXP.
 *
 * Not exposed as web services – only used by classes in classes/external/.
 */

namespace local_novalxpapi\local;

defined('MOODLE_INTERNAL') || die();

class quiz_service {

    /**
     * Create a quiz in the given course and place it in the requested section.
     *
     * @param \stdClass $course  Course record (course table).
     * @param int       $section Section param: 0=last section, else course_sections.id or section number.
     * @param string    $name    Quiz name.
     * @param string    $intro   HTML intro.
     * @param int       $visible 1=visible, 0=hidden.
     * @return int      New coursemodule id.
     * @throws \Throwable
     */
    public static function create_quiz($course, $section, $name, $intro = '', $visible = 1) {
        global $CFG, $DB;

        require_once($CFG->dirroot . '/course/lib.php');
        require_once($CFG->dirroot . '/course/modlib.php');
        require_once($CFG->dirroot . '/mod/quiz/lib.php');

        // -------------------------------
        // Resolve section number.
        // -------------------------------
        $sectionparam = (int)$section;

        if ($sectionparam <= 0) {
            $format = \course_get_format($course);
            $sectionnum = max(1, $format->get_last_section_number());
        } else {
            // Try as course_sections.id first.
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
                // Treat as section number.
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

        debugging('[NovaLXP] quiz_service::create_quiz resolved sectionnum: ' . $sectionnum, DEBUG_DEVELOPER);
        error_log('[NovaLXP] quiz_service::create_quiz resolved sectionnum: ' . $sectionnum);

        // -------------------------------
        // Prepare moduleinfo for quiz.
        // -------------------------------
        list($module, $modcontext, $cw, $cm, $moduleinfo) =
            \prepare_new_moduleinfo_data($course, 'quiz', $sectionnum);

        $moduleinfo->name        = ($name !== '' ? $name : 'Quiz');
        $moduleinfo->intro       = $intro;
        $moduleinfo->introformat = FORMAT_HTML;
        $moduleinfo->visible     = (int)$visible;

        // Force both password and quizpassword to empty string so DB never sees NULL.
        $moduleinfo->password     = '';
        $moduleinfo->quizpassword = '';

        // Set a default max grade if none present.
        if (!isset($moduleinfo->grade) || $moduleinfo->grade <= 0) {
            $moduleinfo->grade = 100;
        }

        debugging(
            '[NovaLXP] quiz_service::create_quiz moduleinfo before add_moduleinfo: ' .
            json_encode($moduleinfo),
            DEBUG_DEVELOPER
        );
        error_log(
            '[NovaLXP] quiz_service::create_quiz moduleinfo before add_moduleinfo: ' .
            json_encode($moduleinfo)
        );

        // -------------------------------
        // Create quiz via standard helper.
        // -------------------------------
        $moduleinfo = \add_moduleinfo($moduleinfo, $course);

        debugging(
            '[NovaLXP] quiz_service::create_quiz created cmid: ' . $moduleinfo->coursemodule,
            DEBUG_DEVELOPER
        );
        error_log(
            '[NovaLXP] quiz_service::create_quiz created cmid: ' . $moduleinfo->coursemodule
        );

        return (int)$moduleinfo->coursemodule;
    }

    /**
     * Add questions to an existing quiz using quiz_add_quiz_question().
     *
     * @param \stdClass $quiz        Quiz DB record (from quiz table).
     * @param int[]     $questionids Array of question ids.
     * @param float     $maxmark     Max mark per question.
     * @return int      Number of questions actually added (duplicates skipped).
     */
    public static function add_questions_to_quiz($quiz, $questionids, $maxmark = 1.0) {
        global $CFG;

        require_once($CFG->dirroot . '/mod/quiz/locallib.php');

        $added = 0;

        if (!is_array($questionids)) {
            return 0;
        }

        foreach ($questionids as $qid) {
            $qid = (int)$qid;
            if ($qid <= 0) {
                continue;
            }

            $result = \quiz_add_quiz_question($qid, $quiz, 0, $maxmark);
            // Function returns false if already in quiz.
            if ($result !== false) {
                $added++;
            }
        }

        return $added;
    }
}

