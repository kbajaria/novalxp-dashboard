<?php
// local/novalxpapi/fix_self_enrol.php
//
// Simple endpoint to force self-enrolment enabled for a given course.
//

require_once(__DIR__ . '/../../config.php');

global $DB, $CFG;

// -----------------------------------------------------------------------------
// VERY SIMPLE AUTH: shared secret in query string.
// Change this to a long random string and keep it only in Zapier + this file.
// -----------------------------------------------------------------------------
$sharedsecret = 'dkde-eiei-wefa-cmvn-ghdk';

$key = optional_param('key', '', PARAM_ALPHANUMEXT);
if ($key !== $sharedsecret) {
    http_response_code(403);
    header('Content-Type: application/json');
    echo json_encode(['status' => false, 'error' => 'Forbidden']);
    exit;
}

// Course id passed from Zapier.
$courseid = required_param('courseid', PARAM_INT);

// Load core enrol API + self-enrol plugin.
require_once($CFG->libdir . '/enrollib.php');
require_once($CFG->dirroot . '/enrol/self/lib.php');

$plugin = enrol_get_plugin('self');
if (!$plugin) {
    http_response_code(500);
    header('Content-Type: application/json');
    echo json_encode(['status' => false, 'error' => 'Self enrol plugin not available']);
    exit;
}

// Try to find existing self-enrol instance for this course.
$instances = enrol_get_instances($courseid, false); // include disabled
$selfinstance = null;
foreach ($instances as $instance) {
    if ($instance->enrol === 'self') {
        $selfinstance = $instance;
        break;
    }
}

try {
    // If no instance, create one.
    if (!$selfinstance) {
        // Determine student roleid.
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
            http_response_code(500);
            header('Content-Type: application/json');
            echo json_encode(['status' => false, 'error' => 'Could not determine student roleid']);
            exit;
        }

        $course = $DB->get_record('course', ['id' => $courseid], '*', MUST_EXIST);
        $fields = [
            'status'      => ENROL_INSTANCE_ENABLED, // 0 = enabled.
            'roleid'      => $roleid,
            'enrolperiod' => 0,
            'customint6'  => 1,                      // Allow new enrolments.
        ];

        $instanceid = $plugin->add_instance($course, $fields);
        $selfinstance = $DB->get_record('enrol', ['id' => $instanceid], '*', MUST_EXIST);
    }

    // Force enabled + allow new enrolments.
    $needsupdate = false;

    if (!isset($selfinstance->status) || (int)$selfinstance->status !== ENROL_INSTANCE_ENABLED) {
        $selfinstance->status = ENROL_INSTANCE_ENABLED;
        $needsupdate = true;
    }

    if (!isset($selfinstance->customint6) || (int)$selfinstance->customint6 !== 1) {
        $selfinstance->customint6 = 1;
        $needsupdate = true;
    }

    if ($needsupdate) {
        $selfinstance->timemodified = time();
        $DB->update_record('enrol', $selfinstance);
    }

    header('Content-Type: application/json');
    echo json_encode([
        'status'      => true,
        'courseid'    => $courseid,
        'enrolid'     => (int)$selfinstance->id,
        'enrolstatus' => (int)$selfinstance->status,
        'customint6'  => (int)$selfinstance->customint6,
    ]);
    exit;

} catch (Throwable $e) {
    http_response_code(500);
    header('Content-Type: application/json');
    echo json_encode(['status' => false, 'error' => $e->getMessage()]);
    exit;
}
