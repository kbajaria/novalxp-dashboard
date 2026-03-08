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

require(__DIR__ . '/../../config.php');

use local_novalxp_execdashboard\local\metrics;

require_login();

$systemcontext = context_system::instance();
require_capability('local/novalxp_execdashboard:view', $systemcontext);

$url = new moodle_url('/local/novalxp_execdashboard/index.php');
$PAGE->set_url($url);
$PAGE->set_context($systemcontext);
$PAGE->set_pagelayout('report');
$PAGE->set_title(get_string('title', 'local_novalxp_execdashboard'));
$PAGE->set_heading(get_string('title', 'local_novalxp_execdashboard'));

$summary = metrics::summary();
$tiles = [
    [
        'label' => get_string('tile_activelearners', 'local_novalxp_execdashboard'),
        'value' => format_float($summary['activelearners'], 0, false),
    ],
    [
        'label' => get_string('tile_activeenrolments', 'local_novalxp_execdashboard'),
        'value' => format_float($summary['activeenrolments'], 0, false),
    ],
    [
        'label' => get_string('tile_completions', 'local_novalxp_execdashboard'),
        'value' => format_float($summary['completions'], 0, false),
    ],
    [
        'label' => get_string('tile_completionrate', 'local_novalxp_execdashboard'),
        'value' => format_float($summary['completionrate'], 1, false) . '%',
    ],
    [
        'label' => get_string('tile_newenrolments30', 'local_novalxp_execdashboard'),
        'value' => format_float($summary['newenrolments30'], 0, false),
    ],
    [
        'label' => get_string('tile_completions30', 'local_novalxp_execdashboard'),
        'value' => format_float($summary['completions30'], 0, false),
    ],
];

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('heading', 'local_novalxp_execdashboard'));
echo html_writer::tag('p', get_string('intro', 'local_novalxp_execdashboard'), ['class' => 'text-muted']);

$rows = [];
foreach ($tiles as $tile) {
    $value = html_writer::tag('div', s($tile['value']), ['class' => 'h2 mb-1']);
    $label = html_writer::tag('div', s($tile['label']), ['class' => 'text-muted']);
    $body = html_writer::div($value . $label, 'card-body');
    $card = html_writer::div($body, 'card h-100');
    $rows[] = html_writer::div($card, 'col-md-4 mb-3');
}

echo html_writer::start_div('container-fluid px-0');
echo html_writer::div(implode('', $rows), 'row');

echo $OUTPUT->heading(get_string('section_notes', 'local_novalxp_execdashboard'), 3);
echo html_writer::start_tag('ul', ['class' => 'mb-4']);
echo html_writer::tag('li', get_string('note_capability', 'local_novalxp_execdashboard'));
echo html_writer::tag('li', get_string('note_scope', 'local_novalxp_execdashboard'));
echo html_writer::tag('li', get_string('note_inprogress', 'local_novalxp_execdashboard'));
echo html_writer::tag('li', get_string('note_next', 'local_novalxp_execdashboard'));
echo html_writer::end_tag('ul');
echo html_writer::end_div();

echo $OUTPUT->footer();
