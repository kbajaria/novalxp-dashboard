<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
	
	/* Advanced Settings */
	$page = new admin_settingpage('theme_edutor_advanced', get_string('advancedheading', 'theme_edutor'));

	
	/* Custom SCSS & CSS */
	$page->add(new admin_setting_heading('theme_edutor_customcss', get_string('customcssheadingsub', 'theme_edutor'),
            format_text(get_string('customcssdesc' , 'theme_edutor'), FORMAT_MARKDOWN)));
       
    // Raw SCSS to include before the content.
    $setting = new admin_setting_scsscode('theme_edutor/scsspre',
        get_string('rawscsspre', 'theme_edutor'), get_string('rawscsspre_desc', 'theme_edutor'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Raw SCSS to include after the content.
    $setting = new admin_setting_scsscode('theme_edutor/scss', get_string('rawscss', 'theme_edutor'),
        get_string('rawscss_desc', 'theme_edutor'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    /* Analytics Settings */
	$page->add(new admin_setting_heading('theme_edutor_analytics', get_string('analyticsheadingsub', 'theme_edutor'),
            format_text(get_string('analyticsdesc' , 'theme_edutor'), FORMAT_MARKDOWN)));
    
    
    // Google Analytics ID
    $name = 'theme_edutor/analyticsid';
    $title = get_string('analyticsid', 'theme_edutor');
    $description = get_string('analyticsiddesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* iOS Homescreen Icons */
            
    //Description for iOS Icons
    $name = 'theme_edutor/iosiconinfo';
    $heading = get_string('iosicon', 'theme_edutor');
    $information = get_string('iosicondesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // iPhone Icon.
    $name = 'theme_edutor/iphoneicon';
    $title = get_string('iphoneicon', 'theme_edutor');
    $description = get_string('iphoneicondesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'iphoneicon');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // iPhone Retina Icon.
    $name = 'theme_edutor/iphoneretinaicon';
    $title = get_string('iphoneretinaicon', 'theme_edutor');
    $description = get_string('iphoneretinaicondesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'iphoneretinaicon');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // iPad Icon.
    $name = 'theme_edutor/ipadicon';
    $title = get_string('ipadicon', 'theme_edutor');
    $description = get_string('ipadicondesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'ipadicon');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // iPad Retina Icon.
    $name = 'theme_edutor/ipadretinaicon';
    $title = get_string('ipadretinaicon', 'theme_edutor');
    $description = get_string('ipadretinaicondesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'ipadretinaicon');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
   
    
    
    $settings->add($page);
    
    //$ADMIN->add('theme_edutor', $page);