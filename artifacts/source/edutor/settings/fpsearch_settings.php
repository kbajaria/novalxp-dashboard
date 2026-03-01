<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
    /* Frontpage Search Section */	
	$page = new admin_settingpage('theme_edutor_searchsection', get_string('searchsectionheading', 'theme_edutor'));
	$page->add(new admin_setting_heading('theme_edutor_searchsectionheadingsub', get_string('searchsectionheadingsub', 'theme_edutor'),
    format_text(get_string('searchsectionheadingsubdesc' , 'theme_edutor'), FORMAT_MARKDOWN)));
                 
	//Enable Search Section.
    $name = 'theme_edutor/usesearchsection';
    $title = get_string('usesearchsection', 'theme_edutor');
    $description = get_string('usesearchsectiondesc', 'theme_edutor');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Search Section Title
    $name = 'theme_edutor/searchsectiontitle';
    $title = get_string('searchsectiontitle', 'theme_edutor');
    $description = get_string('searchsectiontitledesc', 'theme_edutor');
    $default = 'Search Section Heading';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Search Section Intro
    $name = 'theme_edutor/searchsectionintro';
    $title = get_string('searchsectionintro', 'theme_edutor');
    $description = get_string('searchsectionintrodesc', 'theme_edutor');
    $default = '<p>Search section intro goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu tellus erat. Fusce quis risus ullamcorper, tincidunt nunc eu, convallis neque. </p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Search Section CTA Button Text
    $name = 'theme_edutor/searchsectionbuttontext';
    $title = get_string('searchsectionbuttontext', 'theme_edutor');
    $description = get_string('searchsectionbuttontextdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Search Section CTA Button URL
    $name = 'theme_edutor/searchsectionbuttonurl';
    $title = get_string('searchsectionbuttonurl', 'theme_edutor');
    $description = get_string('searchsectionbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/searchsectionbuttonurlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
  
    // Enable Course Search Box  
    $name = 'theme_edutor/usesearch';
    $title = get_string('usesearch', 'theme_edutor');
    $description = get_string('usesearchdesc', 'theme_edutor');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Search Section Background Color.
	// We use an empty default value because the default colour should come from the preset.
    $name = 'theme_edutor/searchsectionbgcolor';
    $title = get_string('searchsectionbgcolor', 'theme_edutor');
    $description = get_string('searchsectionbgcolordesc', 'theme_edutor');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);



    
    // Add the page
    $settings->add($page);
    
    //$ADMIN->add('theme_edutor', $page);
