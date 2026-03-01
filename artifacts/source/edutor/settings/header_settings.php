<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
	
	/* Header Section */
	$page = new admin_settingpage('theme_edutor_header', get_string('headerheading', 'theme_edutor'));
	
	
	
	// Header Site Logo file setting.   
    $name = 'theme_edutor/logo';
    $title = get_string('logo','theme_edutor');
    $description = get_string('logodesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting); 
    
	
	// Header top bar background color.
	// We use an empty default value because the default colour should come from the preset.
    $name = 'theme_edutor/headerbgcolor';
    $title = get_string('headerbgcolor', 'theme_edutor');
    $description = get_string('headerbgcolordesc', 'theme_edutor');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

   
    
    
    
    /* Header Alerts */
	$page->add(new admin_setting_heading('theme_edutor_alerts', get_string('alertheadingsub', 'theme_edutor'),
            format_text(get_string('alertdesc' , 'theme_edutor'), FORMAT_MARKDOWN)));
    
    // Enable Alert 
    $name = 'theme_edutor/usealert';
    $title = get_string('usealert', 'theme_edutor');
    $description = get_string('usealertdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    

    // Alert Content
    $name = 'theme_edutor/alertcontent';
    $title = get_string('alertcontent', 'theme_edutor');
    $description = get_string('alertcontentdesc', 'theme_edutor');
    $default = '<p><strong>Alert content goes here!</strong> Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Alert background colour
    $name = 'theme_edutor/alertbgcolor';
    $title = get_string('alertbgcolor', 'theme_edutor');
    $description = get_string('alertbgcolordesc', 'theme_edutor');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
        
    
    
    // Add the page
    $settings->add($page);
    
    //$ADMIN->add('theme_edutor', $page);