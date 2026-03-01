<?php
/**
 * Internal question bank helper functions for NovaLXP.
 */

namespace local_novalxpapi\local;

defined('MOODLE_INTERNAL') || die();

class questionbank_service {

    /**
     * Resolve a target category for a course:
     * - If $categoryid == 0, returns (and if necessary creates) the default course category.
     * - Otherwise returns the specified category (must belong to the course context).
     *
     * @param \stdClass $course
     * @param int       $categoryid
     * @return \stdClass question_categories record
     * @throws \moodle_exception
     */
    public static function resolve_target_category($course, $categoryid) {
        global $DB, $CFG;

        require_once($CFG->libdir . '/questionlib.php');
        require_once($CFG->libdir . '/moodlelib.php');

        $coursectx = \context_course::instance($course->id);

        // ---------------------------------------------------------------------
        // Case 1: $categoryid == 0  → use / create default course question category
        // ---------------------------------------------------------------------
        if ((int)$categoryid === 0) {
            // Try the usual helper first.
            $default = \question_get_default_category($coursectx->id);

            if ($default) {
                return $default;
            }

            // If still no default, we create a very simple default category.
            // This can happen on brand-new courses that have never opened the Question bank UI.
            $record = new \stdClass();
            $record->name       = get_string('defaultfor', 'question', $course->shortname);
            $record->contextid  = $coursectx->id;
            $record->info       = '';
            $record->infoformat = FORMAT_HTML;
            $record->parent     = 0;
            $record->sortorder  = 999;
            $record->stamp      = \make_unique_id_code();
            $record->idnumber   = null;

            $record->id = $DB->insert_record('question_categories', $record);

            debugging(
                '[NovaLXP] questionbank_service::resolve_target_category created default category ' .
                $record->id . ' for context ' . $coursectx->id,
                DEBUG_DEVELOPER
            );
            error_log(
                '[NovaLXP] questionbank_service::resolve_target_category created default category ' .
                $record->id . ' for context ' . $coursectx->id
            );

            return $record;
        }

        // ---------------------------------------------------------------------
        // Case 2: Specific category requested → ensure it exists and belongs to this course context.
        // ---------------------------------------------------------------------
        $category = $DB->get_record('question_categories', array('id' => (int)$categoryid), '*', MUST_EXIST);

        if ((int)$category->contextid !== (int)$coursectx->id) {
            throw new \moodle_exception(
                'nopermissions',
                'error',
                '',
                null,
                'Question category does not belong to course context'
            );
        }

        return $category;
    }

    // -------------------------------------------------------------------------
    // OPTIONAL FUTURE WORK:
    // You can add helpers such as create_basic_question() here later.
    // -------------------------------------------------------------------------
}

