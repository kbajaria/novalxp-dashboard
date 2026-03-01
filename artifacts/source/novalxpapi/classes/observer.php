<?php
namespace local_novalxpapi;

defined('MOODLE_INTERNAL') || die();

/**
 * Event observers for local_novalxpapi.
 */
class observer {

    /**
     * Handle course_created event: ensure self-enrolment is enabled.
     *
     * @param \core\event\course_created $event
     */
    public static function course_created(\core\event\course_created $event): void {
        global $DB, $CFG;

        // Core enrol API + self-enrol plugin.
        require_once($CFG->libdir . '/enrollib.php');        // ✅ core enrol lib
        require_once($CFG->dirroot . '/enrol/self/lib.php'); // ✅ self enrol plugin lib

        $courseid = $event->objectid;

        error_log('[NovaLXP] observer::course_created for course ' . $courseid);

        // Get the course record (safety).
        $course = $DB->get_record('course', ['id' => $courseid], '*', IGNORE_MISSING);
        if (!$course) {
            error_log('[NovaLXP] observer::course_created: course not found for id ' . $courseid);
            return;
        }

        $plugin = \enrol_get_plugin('self');
        if (!$plugin) {
            error_log('[NovaLXP] observer::course_created: self enrol plugin not available');
            return;
        }

        // 1) See if a self-enrol instance already exists for this course.
        $instances = \enrol_get_instances($courseid, false); // include disabled
        $selfinstance = null;
        foreach ($instances as $instance) {
            if ($instance->enrol === 'self') {
                $selfinstance = $instance;
                break;
            }
        }

        if ($selfinstance) {
            self::enable_self_enrol_instance($selfinstance, $course);
            return;
        }

        // 2) No existing instance: create one.
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
            error_log('[NovaLXP] observer::course_created: could not determine student roleid');
            return;
        }

        $fields = [
            'status'      => ENROL_INSTANCE_ENABLED, // 0 = enabled
            'roleid'      => $roleid,
            'enrolperiod' => 0,
            'customint6'  => 1,                      // Allow new enrolments
        ];

        try {
            $instanceid = $plugin->add_instance($course, $fields);
            error_log('[NovaLXP] observer::course_created: created self instance id ' . $instanceid .
                ' for course ' . $courseid);

            $instance = $DB->get_record('enrol', ['id' => $instanceid], '*', MUST_EXIST);
            self::enable_self_enrol_instance($instance, $course);

        } catch (\Throwable $e) {
            error_log('[NovaLXP] observer::course_created: error creating self instance: ' . $e->getMessage());
        }
    }

    /**
     * Enable a self-enrol instance: status=0, allow new enrolments=1.
     *
     * @param \stdClass $instance
     * @param \stdClass $course
     */
    protected static function enable_self_enrol_instance(\stdClass $instance, \stdClass $course): void {
        global $DB;

        $needsupdate = false;

        if (!isset($instance->status) || (int)$instance->status !== ENROL_INSTANCE_ENABLED) {
            $instance->status = ENROL_INSTANCE_ENABLED; // 0
            $needsupdate = true;
        }

        // customint6 is "Allow new enrolments" for enrol_self.
        if (!isset($instance->customint6) || (int)$instance->customint6 !== 1) {
            $instance->customint6 = 1;
            $needsupdate = true;
        }

        if ($needsupdate) {
            $instance->timemodified = time();
            $DB->update_record('enrol', $instance);
            error_log('[NovaLXP] observer::enable_self_enrol_instance: enabled instance ' . $instance->id .
                ' for course ' . $course->id);
        } else {
            error_log('[NovaLXP] observer::enable_self_enrol_instance: instance already enabled ' . $instance->id .
                ' for course ' . $course->id);
        }
    }
}

