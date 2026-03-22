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

use block_novalxppopular\local\metrics;

class block_novalxppopular extends block_base {
    public function init(): void {
        $this->title = get_string('pluginname', 'block_novalxppopular');
    }

    public function applicable_formats(): array {
        return [
            'my'          => true,
            'my-index'    => true,
            'site-index'  => false,
            'course-view' => false,
            'mod'         => false,
            'admin'       => false,
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

        $this->content         = new stdClass();
        $this->content->text   = '';
        $this->content->footer = '';

        if (!isloggedin() || isguestuser()) {
            $this->content->text = get_string('nologinmessage', 'block_novalxppopular');
            return $this->content;
        }

        $courses = metrics::top_for_user((int)$USER->id, 5);

        $this->content->text = $OUTPUT->render_from_template('block_novalxppopular/popular', [
            'courses'   => $courses,
            'empty'     => empty($courses),
            'emptytext' => get_string('emptystate', 'block_novalxppopular'),
        ]);

        return $this->content;
    }
}
