<?php


defined('MOODLE_INTERNAL') || die();



//$extraclasses = [];
//$bodyattributes = $OUTPUT->body_attributes($extraclasses);
$bodyattributes = $OUTPUT->body_attributes([]);

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'bodyattributes' => $bodyattributes,
    
];


if (empty($PAGE->layout_options['noactivityheader'])) {
    $header = $PAGE->activityheader;
    $renderer = $PAGE->get_renderer('core');
    $templatecontext['headercontent'] = $header->export_for_template($renderer);
}

//$PAGE->requires->jquery ();
$PAGE->requires->js('/theme/edutor/plugins/back-to-top.min.js');

echo $OUTPUT->render_from_template('theme_edutor/columns1', $templatecontext);

