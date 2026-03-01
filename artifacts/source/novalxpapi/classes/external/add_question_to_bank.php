<?php
/**
 * Web service: (skeleton) add a question to a course question bank.
 *
 * Right now this just resolves the target category and then throws 'notimplemented'
 * so you can safely develop the internals later.
 */

namespace local_novalxpapi\external;

defined('MOODLE_INTERNAL') || die();

use core_external\external_api;
use core_external\external_function_parameters;
use core_external\external_value;
use local_novalxpapi\local\questionbank_service;

class add_question_to_bank extends external_api {

    public static function execute_parameters() {
        return new external_function_parameters([
            'courseid'      => new external_value(PARAM_INT,  'Course id', VALUE_REQUIRED),
            // 0 = default category for the course; otherwise question_categories.id.
            'categoryid'    => new external_value(PARAM_INT,  'Question category id (0=default)', VALUE_DEFAULT, 0),
            'qtype'         => new external_value(PARAM_ALPHA, 'Question type (e.g. description)', VALUE_DEFAULT, 'description'),
            'name'          => new external_value(PARAM_TEXT, 'Question name (editor-only)', VALUE_REQUIRED),
            'questiontext'  => new external_value(PARAM_RAW,  'Question text (HTML)', VALUE_REQUIRED),
            'defaultmark'   => new external_value(PARAM_FLOAT,'Default mark', VALUE_DEFAULT, 1.0),
        ]);
    }

    public static function execute($courseid, $categoryid = 0, $qtype = 'description',
        $name = '', $questiontext = '', $defaultmark = 1.0) {

        global $DB;

        $params = self::validate_parameters(self::execute_parameters(), [
            'courseid'     => $courseid,
            'categoryid'   => $categoryid,
            'qtype'        => $qtype,
            'name'         => $name,
            'questiontext' => $questiontext,
            'defaultmark'  => $defaultmark,
        ]);

        $course = get_course($params['courseid']);
        $coursectx = \context_course::instance($course->id);
        self::validate_context($coursectx);

        \require_capability('moodle/question:managecategory', $coursectx);
        \require_capability('moodle/question:add', $coursectx);

        debugging('[NovaLXP] add_question_to_bank params: ' . json_encode($params), DEBUG_DEVELOPER);
        error_log('[NovaLXP] add_question_to_bank params: ' . json_encode($params));

        // Resolve target category (default or specific).
        $category = questionbank_service::resolve_target_category(
            $course,
            (int)$params['categoryid']
        );

        debugging('[NovaLXP] add_question_to_bank resolved category: ' . json_encode($category), DEBUG_DEVELOPER);
        error_log('[NovaLXP] add_question_to_bank resolved category: ' . json_encode($category));

        // *** IMPORTANT ***
        // At this point you can safely implement real question creation, e.g. for 'description'
        // or other qtypes, without disturbing existing endpoints.
        //
        // For now, we deliberately abort with a clear error message.
        throw new \moodle_exception(
            'notimplemented',
            'local_novalxpapi',
            '',
            null,
            'add_question_to_bank skeleton – implement question creation logic here'
        );

        // When you implement it, you should:
        // $questionid = questionbank_service::create_basic_question(
        //     $category,
        //     $params['qtype'],
        //     $params['name'],
        //     $params['questiontext'],
        //     $params['defaultmark']
        // );
        //
        // return (int)$questionid;
    }

    public static function execute_returns() {
        return new external_value(PARAM_INT, 'New question id');
    }
}

