<?php
/**
 * GIFT import helper for NovaLXP.
 *
 * Uses Moodle's core GIFT importer to create questions in the QUIZ (module) question bank.
 */

namespace local_novalxpapi\local;

defined('MOODLE_INTERNAL') || die();

class gift_service {

    /**
     * Import GIFT text into the quiz's question bank (module context) and return new question IDs.
     *
     * @param \stdClass $course     Course record.
     * @param \stdClass $cm         Course module record for the quiz (from get_coursemodule_from_id()).
     * @param string    $gifttext   Raw GIFT formatted text.
     * @param int       $categoryid Optional explicit question category id (0 = quiz default).
     * @return array {
     *   questionsparsed => int,
     *   questionids     => int[]
     * }
     * @throws \moodle_exception|\Throwable
     */
    public static function import_gift_for_quiz($course, $cm, $gifttext, $categoryid = 0) {
        global $CFG, $DB;

        $gifttext = trim((string)$gifttext);
        if ($gifttext === '') {
            return array(
                'questionsparsed' => 0,
                'questionids'     => array(),
            );
        }

        require_once($CFG->libdir . '/questionlib.php');
        require_once($CFG->libdir . '/filelib.php');
        require_once($CFG->dirroot . '/question/format.php');
        require_once($CFG->dirroot . '/question/format/gift/format.php');

        // ---------------------------------------------------------------------
        // Resolve target category in the QUIZ (module) context.
        // ---------------------------------------------------------------------
        $quizctx = \context_module::instance($cm->id);

        if ((int)$categoryid === 0) {
            // Try to get a default category for this module context.
            $category = \question_get_default_category($quizctx->id);

            if (!$category) {
                // Create a very simple default category under the quiz context.
                $record = new \stdClass();
                $record->name       = get_string('defaultfor', 'question', $course->shortname);
                $record->contextid  = $quizctx->id;
                $record->info       = '';
                $record->infoformat = FORMAT_HTML;
                $record->parent     = 0;
                $record->sortorder  = 999;
                $record->stamp      = \make_unique_id_code();
                $record->idnumber   = null;

                $record->id = $DB->insert_record('question_categories', $record);
                $category = $record;

                debugging(
                    '[NovaLXP] gift_service::import_gift_for_quiz created default module category ' .
                    $record->id . ' for context ' . $quizctx->id,
                    DEBUG_DEVELOPER
                );
                error_log(
                    '[NovaLXP] gift_service::import_gift_for_quiz created default module category ' .
                    $record->id . ' for context ' . $quizctx->id
                );
            }
        } else {
            // Specific category requested: ensure it exists and belongs to this module context.
            $category = $DB->get_record('question_categories', array('id' => (int)$categoryid), '*', MUST_EXIST);
            if ((int)$category->contextid !== (int)$quizctx->id) {
                throw new \moodle_exception(
                    'Invalid contextlevel for target category, must be CONTEXT_MODULE',
                    'error'
                );
            }
        }

        // ---------------------------------------------------------------------
        // Prepare temp file for the GIFT text.
        // ---------------------------------------------------------------------
        $tempdir  = make_temp_directory('novalxpapi_gift');
        $filename = 'novalxpapi_ws_import_' . time() . '_' . rand(1000, 9999) . '.gift';
        $tempfile = $tempdir . '/' . $filename;

        if (file_put_contents($tempfile, $gifttext) === false) {
            throw new \moodle_exception('cannotwritefile', 'error', '', null, 'Failed to write temp GIFT file');
        }

        debugging('[NovaLXP] gift_service::import_gift_for_quiz temp file: ' . $tempfile, DEBUG_DEVELOPER);
        error_log('[NovaLXP] gift_service::import_gift_for_quiz temp file: ' . $tempfile);

        // ---------------------------------------------------------------------
        // Instantiate and configure the GIFT importer.
        // ---------------------------------------------------------------------
        $format = new \qformat_gift();

        // Category.
        if (method_exists($format, 'setCategory')) {
            $format->setCategory($category);
        } else {
            $format->category = $category;
        }

        // Course.
        if (method_exists($format, 'setCourse')) {
            $format->setCourse($course);
        } else {
            $format->course = $course;
        }

        // Filename & realfilename.
        if (method_exists($format, 'setFilename')) {
            $format->setFilename($tempfile);
        } else {
            $format->filename = $tempfile;
        }

        if (method_exists($format, 'setRealfilename')) {
            $format->setRealfilename($filename);
        } else {
            $format->realfilename = $filename;
        }

        // Match grades / stop on error / progress display.
        if (method_exists($format, 'set_matchgrades')) {
            $format->set_matchgrades('error');
        } else {
            $format->matchgrades = 'error';
        }

        if (method_exists($format, 'set_stoponerror')) {
            $format->set_stoponerror(false);
        } else {
            $format->stoponerror = false;
        }

        if (method_exists($format, 'set_display_progress')) {
            $format->set_display_progress(false);
        } else {
            if (property_exists($format, 'displayprogress')) {
                $format->displayprogress = false;
            }
        }

        // Context / import context – important for events.
        $importcontextset = false;

        if (method_exists($format, 'set_importcontext')) {
            $format->set_importcontext($quizctx);
            $importcontextset = true;
        } elseif (method_exists($format, 'setImportcontext')) {
            $format->setImportcontext($quizctx);
            $importcontextset = true;
        }

        if (property_exists($format, 'context')) {
            $format->context = $quizctx;
        }

        debugging(
            '[NovaLXP] gift_service::import_gift_for_quiz importcontextset=' .
            ($importcontextset ? '1' : '0') .
            ' contextid=' . $quizctx->id,
            DEBUG_DEVELOPER
        );
        error_log(
            '[NovaLXP] gift_service::import_gift_for_quiz importcontextset=' .
            ($importcontextset ? '1' : '0') .
            ' contextid=' . $quizctx->id
        );

        // ---------------------------------------------------------------------
        // Import lifecycle: preprocess -> process -> postprocess.
        // ---------------------------------------------------------------------
        if (!$format->importpreprocess()) {
            @unlink($tempfile);
            throw new \moodle_exception('cannotimport', 'question', '', null, 'importpreprocess() failed');
        }

        if (!$format->importprocess()) {
            @unlink($tempfile);
            throw new \moodle_exception('cannotimport', 'question', '', null, 'importprocess() failed');
        }

        $format->importpostprocess();

        // Clean up temp file.
        @unlink($tempfile);

        // ---------------------------------------------------------------------
        // Get the IDs of the questions the importer just created.
        // ---------------------------------------------------------------------
        $questionids = array();
        if (!empty($format->questionids) && is_array($format->questionids)) {
            foreach ($format->questionids as $qid) {
                $qid = (int)$qid;
                if ($qid > 0) {
                    $questionids[] = $qid;
                }
            }
        }

        $questionsparsed = count($questionids);

        debugging(
            '[NovaLXP] gift_service::import_gift_for_quiz imported questions: ' . json_encode($questionids),
            DEBUG_DEVELOPER
        );
        error_log(
            '[NovaLXP] gift_service::import_gift_for_quiz imported questions: ' . json_encode($questionids)
        );

        return array(
            'questionsparsed' => $questionsparsed,
            'questionids'     => $questionids,
        );
    }
}

