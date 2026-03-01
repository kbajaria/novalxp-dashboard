<?php
/**
 * Web service: create a quiz in a course and place it in a section.
 *
 * This is a separate external class so mistakes here won't break your other APIs.
 */

namespace local_novalxpapi\external;

defined('MOODLE_INTERNAL') || die();

use core_external\external_api;
use core_external\external_function_parameters;
use core_external\external_value;
use local_novalxpapi\local\quiz_service;

class create_quiz extends external_api {

    /**
     * Parameter definition.
     */
    public static function execute_parameters() {
        return new external_function_parameters([
            'courseid' => new external_value(PARAM_INT,  'Course ID', VALUE_REQUIRED),
            // Same semantics as your add_page: 0 = last section, otherwise course_sections.id or section number.
            'section'  => new external_value(PARAM_INT,  'Section id or number (0=last section)', VALUE_DEFAULT, 0),
            'name'     => new external_value(PARAM_TEXT, 'Quiz name (visible to learners)', VALUE_REQUIRED),
            'intro'    => new external_value(PARAM_RAW,  'Intro/description (HTML)', VALUE_DEFAULT, ''),
            'visible'  => new external_value(PARAM_INT,  'Visibility (1=visible, 0=hidden)', VALUE_DEFAULT, 1),
        ]);
    }

    /**
     * Create the quiz and return the new coursemodule id.
     */
    public static function execute($courseid, $section = 0, $name = '', $intro = '', $visible = 1) {
        global $DB;

        $params = self::validate_parameters(self::execute_parameters(), [
            'courseid' => $courseid,
            'section'  => $section,
            'name'     => $name,
            'intro'    => $intro,
            'visible'  => $visible,
        ]);

        $course = get_course($params['courseid']);
        $coursectx = \context_course::instance($course->id);
        self::validate_context($coursectx);

        // Require the same capabilities as manually adding a quiz.
        \require_capability('moodle/course:manageactivities', $coursectx);
        \require_capability('mod/quiz:addinstance', $coursectx);

        debugging('[NovaLXP] create_quiz params: ' . json_encode($params), DEBUG_DEVELOPER);
        error_log('[NovaLXP] create_quiz params: ' . json_encode($params));

        try {
            $cmid = quiz_service::create_quiz(
                $course,
                (int)$params['section'],
                $params['name'],
                $params['intro'],
                (int)$params['visible']
            );

            debugging('[NovaLXP] create_quiz created cmid: ' . $cmid, DEBUG_DEVELOPER);
            error_log('[NovaLXP] create_quiz created cmid: ' . $cmid);

            return (int)$cmid;
        } catch (\Throwable $e) {
            debugging('[NovaLXP] create_quiz error: ' . $e->getMessage(), DEBUG_DEVELOPER);
            error_log('[NovaLXP] create_quiz error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Return type.
     */
    public static function execute_returns() {
        return new external_value(PARAM_INT, 'New quiz coursemodule id (cmid)');
    }
}

