<?php

defined('MOODLE_INTERNAL') || die();

$settings = null;

//$ADMIN->add('themes', new admin_category('theme_edutor', 'Edutor'));



if ($ADMIN->fulltree) {
    // New tabs layout for admin settings pages.
    $settings = new theme_boost_admin_settingspage_tabs('themesettingedutor', get_string('configtitle', 'theme_edutor'));
    
    //General Settings
    require('settings/general_settings.php');
   
	//Header Settings
	require('settings/header_settings.php');
	//Footer Settings
	require('settings/footer_settings.php');
	
	//Frontpage Settings
	require('settings/fpherosection_settings.php');
	require('settings/fplogos_settings.php');
	require('settings/fpsearch_settings.php');
	
	require('settings/fpfeatured_general_settings.php');
	require('settings/fpfeatured_pane1_settings.php');
	require('settings/fpfeatured_pane2_settings.php');
	require('settings/fpfeatured_pane3_settings.php');
	require('settings/fpfeatured_pane4_settings.php');
	require('settings/fpfeatured_pane5_settings.php');
	require('settings/fpfeatured_pane6_settings.php');
	
	
	require('settings/fpcategories_settings.php');    
	require('settings/fpctasection_settings.php');
	require('settings/fpfaq_settings.php');
	require('settings/fppromo_settings.php');
	require('settings/fpteachers_settings.php');
	require('settings/fptestimonials_settings.php');
	
	
	//Coruse Settings
	require('settings/course_settings.php');
	//Social Media Settings
	require('settings/socialmedia_settings.php');
	//Login page settings
	require('settings/login_settings.php');
	//Advanced Settings
	require('settings/advanced_settings.php');
	    
}







