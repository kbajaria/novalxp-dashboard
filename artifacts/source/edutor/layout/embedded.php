<?php


defined('MOODLE_INTERNAL') || die();

$fakeblockshtml = $OUTPUT->blocks('side-pre', array(), 'aside', true);
$hasfakeblocks = strpos($fakeblockshtml, 'data-block="_fake"') !== false;
$renderer = $PAGE->get_renderer('core');

$templatecontext = [
	'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'headercontent' => $PAGE->activityheader->export_for_template($renderer),
    'hasfakeblocks' => $hasfakeblocks,
    'fakeblocks' => $fakeblockshtml,
];

//$PAGE->requires->jquery ();
$PAGE->requires->js('/theme/edutor/plugins/back-to-top.min.js');

echo $OUTPUT->render_from_template('theme_edutor/embedded', $templatecontext);
