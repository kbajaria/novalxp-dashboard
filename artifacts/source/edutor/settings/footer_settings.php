<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
	
	/* Footer Section */
	$page = new admin_settingpage('theme_edutor_footer', get_string('footerheading', 'theme_edutor'));
	
	
	/* Footer Branding */
	$page->add(new admin_setting_heading('theme_edutor_footerbranding', get_string('footerbrandingheadingsub', 'theme_edutor'),
            format_text(get_string('footerbrandingdesc' , 'theme_edutor'), FORMAT_MARKDOWN)));
	
	// Footer Branding Image 
    
    $name = 'theme_edutor/footerlogoimage';
    $title = get_string('footerlogoimage', 'theme_edutor');
    $description = get_string('footerlogoimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'footerlogoimage');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Footer Branding Content
	$name = 'theme_edutor/footerbrandingblock';
    $title = get_string('footerbrandingblock', 'theme_edutor');
    $description = get_string('footerbrandingblockdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
	
	/* Footer Social Media Links */
	$page->add(new admin_setting_heading('theme_edutor_footersocial', get_string('footersocialheadingsub', 'theme_edutor'),
            format_text(get_string('footersocialdesc' , 'theme_edutor'), FORMAT_MARKDOWN)));
            
 
     // Enable social media 
    $name = 'theme_edutor/usefootersocial';
    $title = get_string('usefootersocial', 'theme_edutor');
    $description = get_string('usefootersocialdesc', 'theme_edutor');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Footer Social Media Section Title
    $name = 'theme_edutor/footersocialsectiontitle';
    $title = get_string('socialsectiontitle', 'theme_edutor');
    $description = get_string('socialsectiontitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* Footer Blocks */
    $page->add(new admin_setting_heading('theme_edutor_footerblocks', get_string('footerblocksheadingsub', 'theme_edutor'),
            format_text(get_string('footerblocksdesc' , 'theme_edutor'), FORMAT_MARKDOWN)));
    
    //Enable Footer Blocks.
    $name = 'theme_edutor/usefooterblocks';
    $title = get_string('usefooterblocks', 'theme_edutor');
    $description = get_string('usefooterblocksdesc', 'theme_edutor');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	//Footer Block One.
	$name = 'theme_edutor/footerblock1';
    $title = get_string('footerblock1', 'theme_edutor');
    $description = get_string('footerblock1desc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Footer Block Two.
	$name = 'theme_edutor/footerblock2';
    $title = get_string('footerblock2', 'theme_edutor');
    $description = get_string('footerblock2desc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Footer Block Three.
	$name = 'theme_edutor/footerblock3';
    $title = get_string('footerblock3', 'theme_edutor');
    $description = get_string('footerblock3desc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    

    
    /* Footer Blocks */
    $page->add(new admin_setting_heading('theme_edutor_footerwidget', get_string('footerwidgetheadingsub', 'theme_edutor'),
            format_text(get_string('footerwidgetdesc' , 'theme_edutor'), FORMAT_MARKDOWN)));
    
    
     // Enable footerwidget
    $name = 'theme_edutor/usefooterwidget';
    $title = get_string('usefooterwidget', 'theme_edutor');
    $description = get_string('usefooterwidgetdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Footerwidget title setting.
    $name = 'theme_edutor/footerwidgettitle';
    $title = get_string('footerwidgettitle', 'theme_edutor');
    $description = get_string('footerwidgettitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Footerwidget setting.
    $name = 'theme_edutor/footerwidget';
    $title = get_string('footerwidget', 'theme_edutor');
    $description = get_string('footerwidgetdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Footer Copyright setting.
    $name = 'theme_edutor/copyright';
    $title = get_string('copyright', 'theme_edutor');
    $description = get_string('copyrightdesc', 'theme_edutor');
    $default = 'Copyright &copy; Company Name';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Footer Background Colour
    // We use an empty default value because the default colour should come from the preset.
    $name = 'theme_edutor/footerbgcolor';
    $title = get_string('footerbgcolor', 'theme_edutor');
    $description = get_string('footerbgcolordesc', 'theme_edutor');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
           
            
    // Add the page
    $settings->add($page);
    
    //$ADMIN->add('theme_edutor', $page);