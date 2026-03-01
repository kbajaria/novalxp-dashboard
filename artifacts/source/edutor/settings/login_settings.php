<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
	
	/* Advanced Settings */
	$page = new admin_settingpage('theme_edutor_login', get_string('loginheading', 'theme_edutor'));
	$page->add(new admin_setting_heading('theme_edutor_loginheadingsub', get_string('loginheadingsub', 'theme_edutor'),
            format_text(get_string('loginheadingsubdesc' , 'theme_edutor'), FORMAT_MARKDOWN)));
            
    // Header Site Logo file setting.   
    $name = 'theme_edutor/loginlogo';
    $title = get_string('loginlogo','theme_edutor');
    $description = get_string('loginlogodesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'loginlogo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting); 

    
    // Login page background image
    $name = 'theme_edutor/loginbgimage';
    $title = get_string('loginbgimage', 'theme_edutor');
    $description = get_string('loginbgimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'loginbgimage');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    
    // Add the page
    $settings->add($page);
    
    //$ADMIN->add('theme_edutor', $page);