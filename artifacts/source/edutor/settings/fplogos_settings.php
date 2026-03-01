<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
	
	/* Frontpage Logos */
	$page = new admin_settingpage('theme_edutor_logos', get_string('logosheading', 'theme_edutor'));
	$page->add(new admin_setting_heading('theme_edutor_logosheadingsub', get_string('logosheadingsub', 'theme_edutor'),
            format_text(get_string('logosheadingsubdesc' , 'theme_edutor'), FORMAT_MARKDOWN)));
    
    // Enable logos Section
    $name = 'theme_edutor/uselogos';
    $title = get_string('uselogos', 'theme_edutor');
    $description = get_string('uselogosdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Logos Section Title
    $name = 'theme_edutor/logossectiontitle';
    $title = get_string('logossectiontitle', 'theme_edutor');
    $description = get_string('logossectiontitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Logo Section Intro
    $name = 'theme_edutor/logossectionintro';
    $title = get_string('logossectionintro', 'theme_edutor');
    $description = get_string('logossectionintrodesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    /* Logo 1 */
    
    // Description for logo One
    $name = 'theme_edutor/logo1info';
    $heading = get_string('logo1', 'theme_edutor');
    $information = get_string('logodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    
    // Logo Image 
    
    $name = 'theme_edutor/logo1image';
    $title = get_string('logoimage', 'theme_edutor');
    $description = get_string('logoimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo1image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
   

    // Logo URL
    $name = 'theme_edutor/logo1url';
    $title = get_string('logourl', 'theme_edutor');
    $description = get_string('logourldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    /* Logo 2 */
    
    // Description for logo Two
    $name = 'theme_edutor/logo2info';
    $heading = get_string('logo2', 'theme_edutor');
    $information = get_string('logodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Logo Image 
    $name = 'theme_edutor/logo2image';
    $title = get_string('logoimage', 'theme_edutor');
    $description = get_string('logoimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo2image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    

    // Logo URL
    $name = 'theme_edutor/logo2url';
    $title = get_string('logourl', 'theme_edutor');
    $description = get_string('logourldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* Logo 3 */
    
    // Description for logo Three
    $name = 'theme_edutor/logo3info';
    $heading = get_string('logo3', 'theme_edutor');
    $information = get_string('logodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Logo Image 
    $name = 'theme_edutor/logo3image';
    $title = get_string('logoimage', 'theme_edutor');
    $description = get_string('logoimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo3image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    // Logo URL
    $name = 'theme_edutor/logo3url';
    $title = get_string('logourl', 'theme_edutor');
    $description = get_string('logourldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Logo 4 */
    
    // Description for logo Four
    $name = 'theme_edutor/logo4info';
    $heading = get_string('logo4', 'theme_edutor');
    $information = get_string('logodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Logo Image 
    $name = 'theme_edutor/logo4image';
    $title = get_string('logoimage', 'theme_edutor');
    $description = get_string('logoimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo4image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    // Logo URL
    $name = 'theme_edutor/logo4url';
    $title = get_string('logourl', 'theme_edutor');
    $description = get_string('logourldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Logo 5 */
    
    // Description for logo Five
    $name = 'theme_edutor/logo5info';
    $heading = get_string('logo5', 'theme_edutor');
    $information = get_string('logodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Logo Image 
    $name = 'theme_edutor/logo5image';
    $title = get_string('logoimage', 'theme_edutor');
    $description = get_string('logoimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo5image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    

    // Logo URL
    $name = 'theme_edutor/logo5url';
    $title = get_string('logourl', 'theme_edutor');
    $description = get_string('logourldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Logo 6 */
    
    // Description for logo Six
    $name = 'theme_edutor/logo6info';
    $heading = get_string('logo6', 'theme_edutor');
    $information = get_string('logodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Logo Image 
    $name = 'theme_edutor/logo6image';
    $title = get_string('logoimage', 'theme_edutor');
    $description = get_string('logoimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo6image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Logo URL
    $name = 'theme_edutor/logo6url';
    $title = get_string('logourl', 'theme_edutor');
    $description = get_string('logourldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* Logo 7 */
    
    // Description for logo One
    $name = 'theme_edutor/logo7info';
    $heading = get_string('logo7', 'theme_edutor');
    $information = get_string('logodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    
    // Logo Image 
    
    $name = 'theme_edutor/logo7image';
    $title = get_string('logoimage', 'theme_edutor');
    $description = get_string('logoimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo7image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    

    // Logo URL
    $name = 'theme_edutor/logo7url';
    $title = get_string('logourl', 'theme_edutor');
    $description = get_string('logourldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* Logo 8 */
    
    // Description for logo One
    $name = 'theme_edutor/logo8info';
    $heading = get_string('logo8', 'theme_edutor');
    $information = get_string('logodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    
    // Logo Image 
    
    $name = 'theme_edutor/logo8image';
    $title = get_string('logoimage', 'theme_edutor');
    $description = get_string('logoimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo8image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    

    // Logo URL
    $name = 'theme_edutor/logo8url';
    $title = get_string('logourl', 'theme_edutor');
    $description = get_string('logourldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Logo 9 */
    
    // Description for logo One
    $name = 'theme_edutor/logo9info';
    $heading = get_string('logo9', 'theme_edutor');
    $information = get_string('logodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    
    // Logo Image 
    
    $name = 'theme_edutor/logo9image';
    $title = get_string('logoimage', 'theme_edutor');
    $description = get_string('logoimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo9image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    

    // Logo URL
    $name = 'theme_edutor/logo9url';
    $title = get_string('logourl', 'theme_edutor');
    $description = get_string('logourldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Logo 10 */
    
    // Description for logo One
    $name = 'theme_edutor/logo10info';
    $heading = get_string('logo10', 'theme_edutor');
    $information = get_string('logodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    
    // Logo Image 
    
    $name = 'theme_edutor/logo10image';
    $title = get_string('logoimage', 'theme_edutor');
    $description = get_string('logoimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo10image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    

    // Logo URL
    $name = 'theme_edutor/logo10url';
    $title = get_string('logourl', 'theme_edutor');
    $description = get_string('logourldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* Logo 11 */
    
    // Description for logo One
    $name = 'theme_edutor/logo11info';
    $heading = get_string('logo11', 'theme_edutor');
    $information = get_string('logodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    
    // Logo Image 
    
    $name = 'theme_edutor/logo11image';
    $title = get_string('logoimage', 'theme_edutor');
    $description = get_string('logoimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo11image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    

    // Logo URL
    $name = 'theme_edutor/logo11url';
    $title = get_string('logourl', 'theme_edutor');
    $description = get_string('logourldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* Logo 12 */
    
    // Description for logo One
    $name = 'theme_edutor/logo12info';
    $heading = get_string('logo12', 'theme_edutor');
    $information = get_string('logodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    
    // Logo Image 
    
    $name = 'theme_edutor/logo12image';
    $title = get_string('logoimage', 'theme_edutor');
    $description = get_string('logoimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo12image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    

    // Logo URL
    $name = 'theme_edutor/logo12url';
    $title = get_string('logourl', 'theme_edutor');
    $description = get_string('logourldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	
	// Add the page
    $settings->add($page);
    
    //$ADMIN->add('theme_edutor', $page);