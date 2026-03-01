<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/blocks/moodleblock.class.php');

use block_novalxpfunnel\local\metrics;

class block_novalxpfunnel extends block_base {
    public function init(): void {
        $this->title = get_string('pluginname', 'block_novalxpfunnel');
    }

    public function applicable_formats(): array {
        return [
            'my' => true,
            'my-index' => true,
            'site-index' => false,
            'course-view' => false,
            'mod' => false,
            'admin' => false,
        ];
    }

    public function has_config(): bool {
        return false;
    }

    public function instance_allow_multiple(): bool {
        return false;
    }

    public function get_content(): stdClass {
        global $OUTPUT, $USER;

        if ($this->content !== null) {
            return $this->content;
        }

        $this->content = new stdClass();
        $this->content->text = '';
        $this->content->footer = '';

        if (!isloggedin() || isguestuser()) {
            $this->content->text = get_string('nologinmessage', 'block_novalxpfunnel');
            return $this->content;
        }

        $data = metrics::for_user((int)$USER->id);

        $enrolled = (int)$data['enrolled'];
        $inprogress = (int)$data['inprogress'];
        $complete = (int)$data['complete'];

        if ($enrolled > 0) {
            $inprogresspct = (int)round(($inprogress / $enrolled) * 100);
            $completepct = (int)round(($complete / $enrolled) * 100);
        } else {
            $inprogresspct = 0;
            $completepct = 0;
        }

        $this->content->text = $OUTPUT->render_from_template('block_novalxpfunnel/funnel', [
            'enrolled' => $enrolled,
            'inprogress' => $inprogress,
            'complete' => $complete,
            'inprogresspct' => $inprogresspct,
            'completepct' => $completepct,
            'enrolledlabel' => get_string('metric_enrolled', 'block_novalxpfunnel'),
            'inprogresslabel' => get_string('metric_inprogress', 'block_novalxpfunnel'),
            'completelabel' => get_string('metric_complete', 'block_novalxpfunnel'),
            'empty' => ($enrolled === 0),
            'emptytext' => get_string('emptystate', 'block_novalxpfunnel'),
        ]);

        return $this->content;
    }
}
