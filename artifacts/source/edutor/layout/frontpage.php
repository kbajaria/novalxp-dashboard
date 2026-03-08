<?php
	

defined('MOODLE_INTERNAL') || die();

//user_preference_allow_ajax_update('drawer-open-nav', PARAM_ALPHA);
require_once($CFG->libdir . '/behat/lib.php');


// Add block button in editing mode.
$addblockbutton = $OUTPUT->addblockbutton();



$extraclasses = [];
$bodyattributes = $OUTPUT->body_attributes($extraclasses);
$blockshtml = $OUTPUT->blocks('side-pre');
$blockshtmlcenterpre =  $OUTPUT->blocks('center-pre');
$blockshtmlcenterpost =  $OUTPUT->blocks('center-post');

$hasblocks = (strpos($blockshtml, 'data-block=') !== false || !empty($addblockbutton));
$hasblockscenterpre = (strpos($blockshtmlcenterpre, 'data-block=') !== false || !empty($addblockbutton));
$hasblockscenterpost = (strpos($blockshtmlcenterpost, 'data-block=') !== false || !empty($addblockbutton));


$secondarynavigation = false;
$overflow = '';
if ($PAGE->has_secondary_navigation()) {
    $tablistnav = $PAGE->has_tablist_secondary_navigation();
    $moremenu = new \core\navigation\output\more_menu($PAGE->secondarynav, 'nav-tabs', true, $tablistnav);
    $secondarynavigation = $moremenu->export_for_template($OUTPUT);
    $overflowdata = $PAGE->secondarynav->get_overflow_menu_data();
    if (!is_null($overflowdata)) {
        $overflow = $overflowdata->export_for_template($OUTPUT);
    }
}

$primary = new core\navigation\output\primary($PAGE);
$renderer = $PAGE->get_renderer('core');
$primarymenu = $primary->export_for_template($renderer);
$buildregionmainsettings = !$PAGE->include_region_main_settings_in_header_actions()  && !$PAGE->has_secondary_navigation();
// If the settings menu will be included in the header then don't add it here.
$regionmainsettingsmenu = $buildregionmainsettings ? $OUTPUT->region_main_settings_menu() : false;

$header = $PAGE->activityheader;
$headercontent = $header->export_for_template($renderer);

$execkpinavhtml = '';
if (isloggedin() && !isguestuser()) {
    $systemcontext = context_system::instance();
    if (has_capability('local/novalxp_execdashboard:view', $systemcontext)) {
        $kpiurl = new moodle_url('/local/novalxp_execdashboard/index.php');
        $isactive = strpos($PAGE->url->out_as_local_url(false), '/local/novalxp_execdashboard/index.php') === 0;
        $classes = 'nav-link';
        $attrs = [
            'class' => $classes,
            'style' => $isactive ? 'color:#ffffff;' : 'color:rgba(255,255,255,0.85);',
        ];
        if ($isactive) {
            $classes .= ' active';
            $attrs['class'] = $classes;
        }
        $kpilink = html_writer::link($kpiurl, 'KPIs', $attrs);
        $execkpinavhtml = html_writer::tag(
            'ul',
            html_writer::tag('li', $kpilink, ['class' => 'nav-item']),
            ['class' => 'nav more-nav navbar-nav local-kpi-nav', 'style' => 'margin-left: 1.75rem;']
        );
    }
}

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    
    'sidepreblocks' => $blockshtml,
	'centerpreblocks' => $blockshtmlcenterpre,
	'centerpostblocks' => $blockshtmlcenterpost,

	
	'hasblocks' => $hasblocks,
    'bodyattributes' => $bodyattributes,
    'hasblockscenterpre' => $hasblockscenterpre,
    'hasblockscenterpost' => $hasblockscenterpost,
    
    'primarymoremenu' => $primarymenu['moremenu'],
    'secondarymoremenu' => $secondarynavigation ?: false,
    'mobileprimarynav' => $primarymenu['mobileprimarynav'],
    'usermenu' => $primarymenu['user'],
    'langmenu' => $primarymenu['lang'],
    'execkpinavhtml' => $execkpinavhtml,

    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
    'headercontent' => $headercontent,
    'overflow' => $overflow,
    'addblockbutton' => $addblockbutton,

    
];

//$PAGE->requires->jquery();
$PAGE->requires->js('/theme/edutor/plugins/back-to-top.min.js');
$PAGE->requires->js('/theme/edutor/plugins/tiny-slider/min/tiny-slider.js');



echo $OUTPUT->render_from_template('theme_edutor/frontpage', $templatecontext);
