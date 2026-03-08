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

use core\chart_line;
use core\chart_series;
use local_novalxp_execdashboard\local\metrics;

require_login();

$systemcontext = context_system::instance();
require_capability('local/novalxp_execdashboard:view', $systemcontext);

$windowdays = optional_param('windowdays', 30, PARAM_INT);
$cohortid = optional_param('cohortid', 0, PARAM_INT);
$categoryid = optional_param('categoryid', 0, PARAM_INT);
$allowedwindows = [7, 30, 90];
if (!in_array($windowdays, $allowedwindows, true)) {
    $windowdays = 30;
}
$cohortoptions = metrics::cohort_options();
$categoryoptions = metrics::category_options();
if (!array_key_exists($cohortid, $cohortoptions)) {
    $cohortid = 0;
}
if (!array_key_exists($categoryid, $categoryoptions)) {
    $categoryid = 0;
}

$baseurl = new moodle_url('/local/novalxp_execdashboard/index.php');
$url = new moodle_url('/local/novalxp_execdashboard/index.php', [
    'windowdays' => $windowdays,
    'cohortid' => $cohortid,
    'categoryid' => $categoryid,
]);
$PAGE->set_url($url);
$PAGE->set_context($systemcontext);
$PAGE->set_pagelayout('report');
$PAGE->set_title(get_string('title', 'local_novalxp_execdashboard'));
$PAGE->set_heading(get_string('title', 'local_novalxp_execdashboard'));

$summary = metrics::summary($windowdays, $cohortid, $categoryid);
$courses = metrics::course_breakdown($windowdays, $cohortid, $categoryid);
$trends = metrics::trend_series($windowdays, $cohortid, $categoryid);
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
        'label' => get_string('tile_notstarted', 'local_novalxp_execdashboard'),
        'value' => format_float($summary['notstarted'], 0, false),
    ],
    [
        'label' => get_string('tile_inprogress', 'local_novalxp_execdashboard'),
        'value' => format_float($summary['inprogress'], 0, false),
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
        'label' => get_string('tile_newenrolmentswindow', 'local_novalxp_execdashboard') . ' (' . $windowdays . 'd)',
        'value' => format_float($summary['newenrolmentswindow'], 0, false),
    ],
    [
        'label' => get_string('tile_completionswindow', 'local_novalxp_execdashboard') . ' (' . $windowdays . 'd)',
        'value' => format_float($summary['completionswindow'], 0, false),
    ],
];

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('heading', 'local_novalxp_execdashboard'));
echo html_writer::tag('p', get_string('intro', 'local_novalxp_execdashboard'), ['class' => 'text-muted']);

$windowoptions = [
    7 => get_string('window_7', 'local_novalxp_execdashboard'),
    30 => get_string('window_30', 'local_novalxp_execdashboard'),
    90 => get_string('window_90', 'local_novalxp_execdashboard'),
];

$filtercontrols = html_writer::label(
    get_string('filter_category', 'local_novalxp_execdashboard'),
    'id_categoryid',
    false,
    ['class' => 'mr-2']
);
$filtercontrols .= html_writer::select($categoryoptions, 'categoryid', $categoryid, false, ['id' => 'id_categoryid', 'class' => 'custom-select mr-3']);
$filtercontrols .= html_writer::label(
    get_string('filter_cohort', 'local_novalxp_execdashboard'),
    'id_cohortid',
    false,
    ['class' => 'mr-2']
);
$filtercontrols .= html_writer::select($cohortoptions, 'cohortid', $cohortid, false, ['id' => 'id_cohortid', 'class' => 'custom-select mr-3']);
$filtercontrols .= html_writer::label(
    get_string('filter_window', 'local_novalxp_execdashboard'),
    'id_windowdays',
    false,
    ['class' => 'mr-2']
);
$filtercontrols .= html_writer::select($windowoptions, 'windowdays', $windowdays, false, ['id' => 'id_windowdays', 'class' => 'custom-select mr-2']);
$filtercontrols .= html_writer::empty_tag('input', [
    'type' => 'submit',
    'class' => 'btn btn-primary',
    'value' => get_string('filter_submit', 'local_novalxp_execdashboard'),
]);
$filterform = html_writer::tag('form', $filtercontrols, ['method' => 'get', 'action' => $baseurl->out(false), 'class' => 'form-inline mb-4']);

$rows = [];
foreach ($tiles as $tile) {
    $value = html_writer::tag('div', s($tile['value']), ['class' => 'h2 mb-1']);
    $label = html_writer::tag('div', s($tile['label']), ['class' => 'text-muted']);
    $body = html_writer::div($value . $label, 'card-body');
    $card = html_writer::div($body, 'card h-100');
    $rows[] = html_writer::div($card, 'col-md-4 mb-3');
}

echo html_writer::start_div('container-fluid px-0');
echo $filterform;
echo html_writer::div(implode('', $rows), 'row');

echo $OUTPUT->heading(get_string('section_trends', 'local_novalxp_execdashboard'), 3);
if ($trends) {
    $trendlabels = [];
    $newenrolments = [];
    $completions = [];
    foreach ($trends as $trend) {
        $trendlabels[] = (string)$trend['label'];
        $newenrolments[] = (int)$trend['newenrolments'];
        $completions[] = (int)$trend['completions'];
    }

    $chart = new chart_line();
    $chart->set_labels($trendlabels);
    $chart->add_series(new chart_series(get_string('trend_newenrolments', 'local_novalxp_execdashboard'), $newenrolments));
    $chart->add_series(new chart_series(get_string('trend_completions', 'local_novalxp_execdashboard'), $completions));
    $chart->set_title(get_string('section_trends', 'local_novalxp_execdashboard'));

    echo $OUTPUT->render($chart);
} else {
    echo $OUTPUT->notification(get_string('empty_trends', 'local_novalxp_execdashboard'), 'info');
}

echo $OUTPUT->heading(get_string('section_courses', 'local_novalxp_execdashboard'), 3);
if ($courses) {
    $table = new html_table();
    $table->head = [
        get_string('course_name', 'local_novalxp_execdashboard'),
        get_string('course_activeenrolments', 'local_novalxp_execdashboard'),
        get_string('course_activelearners', 'local_novalxp_execdashboard'),
        get_string('course_notstarted', 'local_novalxp_execdashboard'),
        get_string('course_inprogress', 'local_novalxp_execdashboard'),
        get_string('course_completions', 'local_novalxp_execdashboard'),
        get_string('course_completionrate', 'local_novalxp_execdashboard'),
        get_string('course_newenrolmentswindow', 'local_novalxp_execdashboard') . ' (' . $windowdays . 'd)',
        get_string('course_completionswindow', 'local_novalxp_execdashboard') . ' (' . $windowdays . 'd)',
    ];
    $table->attributes['class'] = 'table table-striped';
    foreach ($courses as $course) {
        $table->data[] = [
            format_string($course['coursename']),
            format_float($course['activeenrolments'], 0, false),
            format_float($course['activelearners'], 0, false),
            format_float($course['notstarted'], 0, false),
            format_float($course['inprogress'], 0, false),
            format_float($course['completions'], 0, false),
            format_float($course['completionrate'], 1, false) . '%',
            format_float($course['newenrolmentswindow'], 0, false),
            format_float($course['completionswindow'], 0, false),
        ];
    }
    echo html_writer::table($table);
} else {
    echo $OUTPUT->notification(get_string('empty_courses', 'local_novalxp_execdashboard'), 'info');
}
echo html_writer::end_div();

echo $OUTPUT->footer();
