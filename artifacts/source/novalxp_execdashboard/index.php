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

/**
 * Format a KPI currency value.
 *
 * @param float|int|null $value
 * @return string
 */
function local_novalxp_execdashboard_format_currency($value): string {
    if ($value === null) {
        return get_string('notconfigured', 'local_novalxp_execdashboard');
    }

    return '$' . format_float((float)$value, 2, false);
}

/**
 * Render a tile row.
 *
 * @param array<int,array{label:string,value:string,help?:string}> $tiles
 * @return string
 */
function local_novalxp_execdashboard_render_tiles(array $tiles): string {
    $rows = [];
    foreach ($tiles as $tile) {
        $help = trim((string)($tile['help'] ?? ''));
        $value = html_writer::tag('div', s($tile['value']), ['class' => 'h2 mb-1']);
        $labeltext = s($tile['label']);
        if ($help !== '') {
            $trigger = html_writer::tag('button', 'i', [
                'type' => 'button',
                'class' => 'local-novalxp-kpi-help__trigger',
                'aria-label' => $tile['label'] . '. ' . $help,
            ]);
            $bubble = html_writer::span(s($help), 'local-novalxp-kpi-help__bubble');
            $labeltext .= html_writer::span($trigger . $bubble, 'local-novalxp-kpi-help');
        }
        $label = html_writer::tag('div', $labeltext, ['class' => 'text-muted']);
        $body = html_writer::div($value . $label, 'card-body');
        $card = html_writer::div($body, 'card h-100');
        $rows[] = html_writer::div($card, 'col-md-4 mb-3');
    }

    return html_writer::div(implode('', $rows), 'row');
}

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
$costsummary = metrics::cost_summary($summary);
$costrecommendations = metrics::cost_recommendations($costsummary);
$courses = metrics::course_breakdown($windowdays, $cohortid, $categoryid);
$trends = metrics::trend_series($windowdays, $cohortid, $categoryid);
$summarytiles = [
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

$costtiles = [
    [
        'label' => get_string('tile_totalmonthlycost', 'local_novalxp_execdashboard'),
        'value' => local_novalxp_execdashboard_format_currency($costsummary['totalmonthlycost']),
        'help' => get_string('tile_totalmonthlycost_help', 'local_novalxp_execdashboard'),
    ],
    [
        'label' => get_string('tile_monthlyaicost', 'local_novalxp_execdashboard'),
        'value' => local_novalxp_execdashboard_format_currency($costsummary['monthlyaicost']),
        'help' => get_string('tile_monthlyaicost_help', 'local_novalxp_execdashboard'),
    ],
    [
        'label' => get_string('tile_costperactivelearner', 'local_novalxp_execdashboard'),
        'value' => local_novalxp_execdashboard_format_currency($costsummary['costperactivelearner']),
        'help' => get_string('tile_costperactivelearner_help', 'local_novalxp_execdashboard'),
    ],
    [
        'label' => get_string('tile_aicostperactivelearner', 'local_novalxp_execdashboard'),
        'value' => local_novalxp_execdashboard_format_currency($costsummary['aicostperactivelearner']),
        'help' => get_string('tile_aicostperactivelearner_help', 'local_novalxp_execdashboard'),
    ],
    [
        'label' => get_string('tile_aicostpercentoftotal', 'local_novalxp_execdashboard'),
        'value' => $costsummary['aicostpercentoftotal'] === null
            ? get_string('notconfigured', 'local_novalxp_execdashboard')
            : format_float($costsummary['aicostpercentoftotal'], 1, false) . '%',
        'help' => get_string('tile_aicostpercentoftotal_help', 'local_novalxp_execdashboard'),
    ],
    [
        'label' => get_string('tile_forecastcurrentadoption', 'local_novalxp_execdashboard'),
        'value' => local_novalxp_execdashboard_format_currency($costsummary['forecastcurrentadoption']),
        'help' => get_string('tile_forecastcurrentadoption_help', 'local_novalxp_execdashboard'),
    ],
    [
        'label' => get_string('tile_forecastdoubledadoption', 'local_novalxp_execdashboard'),
        'value' => local_novalxp_execdashboard_format_currency($costsummary['forecastdoubledadoption']),
        'help' => get_string('tile_forecastdoubledadoption_help', 'local_novalxp_execdashboard'),
    ],
];

$forecastdelta = null;
if ($costsummary['forecastcurrentadoption'] !== null && $costsummary['forecastdoubledadoption'] !== null) {
    $forecastdelta = (float)$costsummary['forecastdoubledadoption'] - (float)$costsummary['forecastcurrentadoption'];
}

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('heading', 'local_novalxp_execdashboard'));
echo html_writer::tag('p', get_string('intro', 'local_novalxp_execdashboard'), ['class' => 'text-muted']);
echo html_writer::tag('style', '
    .local-novalxp-kpi-help {
        position: relative;
        display: inline-flex;
        align-items: center;
        margin-left: 0.35rem;
    }
    .local-novalxp-kpi-help__trigger {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 1rem;
        height: 1rem;
        border-radius: 999px;
        border: 1px solid #98a2b3;
        color: #475467;
        font-size: 0.75rem;
        font-weight: 700;
        line-height: 1;
        cursor: help;
        background: #fff;
    }
    .local-novalxp-kpi-help__bubble {
        position: absolute;
        left: 50%;
        bottom: calc(100% + 0.5rem);
        transform: translateX(-50%);
        width: 18rem;
        max-width: min(18rem, 80vw);
        padding: 0.65rem 0.75rem;
        border-radius: 0.5rem;
        background: #1f2937;
        color: #fff;
        font-size: 0.8rem;
        line-height: 1.4;
        box-shadow: 0 12px 28px rgba(15, 23, 42, 0.22);
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
        transition: opacity 120ms ease;
        z-index: 20;
        text-align: left;
    }
    .local-novalxp-kpi-help:hover .local-novalxp-kpi-help__bubble,
    .local-novalxp-kpi-help:focus-within .local-novalxp-kpi-help__bubble {
        opacity: 1;
        visibility: visible;
    }
');

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

echo html_writer::start_div('container-fluid px-0');
echo $filterform;
echo $OUTPUT->heading(get_string('section_summarykpis', 'local_novalxp_execdashboard'), 3);
echo local_novalxp_execdashboard_render_tiles($summarytiles);

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

echo html_writer::div('', 'mt-5');
echo $OUTPUT->heading(get_string('section_costkpis', 'local_novalxp_execdashboard'), 3);
echo local_novalxp_execdashboard_render_tiles($costtiles);
echo html_writer::tag(
    'p',
    get_string('costassumptionnote', 'local_novalxp_execdashboard'),
    ['class' => 'text-muted mb-4']
);
if ($forecastdelta !== null) {
    echo html_writer::tag(
        'p',
        get_string('costforecastnote', 'local_novalxp_execdashboard', local_novalxp_execdashboard_format_currency($forecastdelta)),
        ['class' => 'text-muted mb-2']
    );
}
echo html_writer::tag(
    'p',
    s((string)$costsummary['sourcenote']),
    ['class' => 'text-muted mb-4']
);
echo $OUTPUT->heading(get_string('section_costrecommendations', 'local_novalxp_execdashboard'), 4);
if ($costrecommendations) {
    $items = [];
    foreach ($costrecommendations as $recommendation) {
        $title = html_writer::tag('strong', s($recommendation['title']));
        $body = html_writer::span(' ' . s($recommendation['body']));
        $items[] = html_writer::tag('li', $title . $body);
    }
    echo html_writer::tag('ul', implode('', $items), ['class' => 'mb-4']);
}
echo html_writer::end_div();

echo $OUTPUT->footer();
