<?php
/**
 * Web service: add existing questions (by id) to an existing quiz.
 */

namespace local_novalxpapi\external;

defined('MOODLE_INTERNAL') || die();

use core_external\external_api;
use core_external\external_function_parameters;
use core_external\external_value;
use core_external\external_multiple_structure;
use local_novalxpapi\local\quiz_service;

class add_questions_to_quiz extends external_api {

    public static function execute_parameters() {
        return new external_function_parameters([
            'quizid'      => new external_value(PARAM_INT, 'Quiz id (mod_quiz.id)', VALUE_REQUIRED),
            'questionids' => new external_multiple_structure(
                new external_value(PARAM_INT, 'Question id'),
                'Array of existing question ids to add to the quiz',
                VALUE_REQUIRED
            ),
            'maxmark'     => new external_value(PARAM_FLOAT, 'Max mark per question', VALUE_DEFAULT, 1.0),
        ]);
    }

    public static function execute($quizid, $questionids, $maxmark = 1.0) {
        global $DB;

        $params = self::validate_parameters(self::execute_parameters(), [
            'quizid'      => $quizid,
            'questionids' => $questionids,
            'maxmark'     => $maxmark,
        ]);

        // Get quiz + cm to establish proper context.
        $quiz = $DB->get_record('quiz', ['id' => $params['quizid']], '*', MUST_EXIST);
        $cm   = get_coursemodule_from_instance('quiz', $quiz->id, $quiz->course, false, MUST_EXIST);
        $modctx = \context_module::instance($cm->id);
        self::validate_context($modctx);

        \require_capability('mod/quiz:manage', $modctx);

        debugging('[NovaLXP] add_questions_to_quiz params: ' . json_encode($params), DEBUG_DEVELOPER);
        error_log('[NovaLXP] add_questions_to_quiz params: ' . json_encode($params));

        try {
            $added = quiz_service::add_questions_to_quiz(
                $quiz,
                $params['questionids'],
                (float)$params['maxmark']
            );

            debugging('[NovaLXP] add_questions_to_quiz added: ' . $added, DEBUG_DEVELOPER);
            error_log('[NovaLXP] add_questions_to_quiz added: ' . $added);

            return (int)$added;
        } catch (\Throwable $e) {
            debugging('[NovaLXP] add_questions_to_quiz error: ' . $e->getMessage(), DEBUG_DEVELOPER);
            error_log('[NovaLXP] add_questions_to_quiz error: ' . $e->getMessage());
            throw $e;
        }
    }

    public static function execute_returns() {
        return new external_value(PARAM_INT, 'Number of questions actually added');
    }
}

