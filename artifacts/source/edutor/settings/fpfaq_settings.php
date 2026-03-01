<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
	
	/* Frontpage FAQ  */
	$page = new admin_settingpage('theme_edutor_faq', get_string('faqheading', 'theme_edutor'));
	
	$page->add(new admin_setting_heading('theme_edutor_faqheadingsub', get_string('faqheadingsub', 'theme_edutor'),
            format_text(get_string('faqheadingsubdesc' , 'theme_edutor'), FORMAT_MARKDOWN)));
    
    // Enable FAQ Section
    $name = 'theme_edutor/usefaq';
    $title = get_string('usefaq', 'theme_edutor');
    $description = get_string('usefaqdesc', 'theme_edutor');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // FAQ Section Title
    $name = 'theme_edutor/faqsectiontitle';
    $title = get_string('faqsectiontitle', 'theme_edutor');
    $description = get_string('faqsectiontitledesc', 'theme_edutor');
    $default = 'Frequently Asked Questions';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // FAQ Section Intro
    $name = 'theme_edutor/faqsectionintro';
    $title = get_string('faqsectionintro', 'theme_edutor');
    $description = get_string('faqsectionintrodesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     // FAQ Section Image
    $name = 'theme_edutor/faqsectionimage';
    $title = get_string('faqsectionimage', 'theme_edutor');
    $description = get_string('faqsectionimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'faqsectionimage');
    $setting->set_updatedcallback('theme_reset_all_caches');    
    $page->add($setting);
    
    // FAQ Section Background Colour
    // We use an empty default value because the default colour should come from the preset.
    $name = 'theme_edutor/faqsectionbgcolor';
    $title = get_string('faqsectionbgcolor', 'theme_edutor');
    $description = get_string('faqsectionbgcolordesc', 'theme_edutor');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // FAQ 1
    
    // Description
    $name = 'theme_edutor/faq1info';
    $heading = get_string('faq1info', 'theme_edutor');
    $information = get_string('faq1desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
   
    
    // Question
    $name = 'theme_edutor/faq1title';
    $title = get_string('faq1title', 'theme_edutor');
    $description = get_string('faq1titledesc', 'theme_edutor');
    $default = 'Question one heading goes here?';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Answer
    $name = 'theme_edutor/faq1content';
    $title = get_string('faq1content', 'theme_edutor');
    $description = get_string('faq1contentdesc', 'theme_edutor');
    $default = '<p>Answer 1 goes here. You can add up to 10 FAQs. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et <a href="#link">link example</a> magnis dis parturient montes, nascetur ridiculus mus. </p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
   
	// FAQ 2
	// Description
    $name = 'theme_edutor/faq2info';
    $heading = get_string('faq2info', 'theme_edutor');
    $information = get_string('faq2desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
   
    
    // Question
    $name = 'theme_edutor/faq2title';
    $title = get_string('faq2title', 'theme_edutor');
    $description = get_string('faq2titledesc', 'theme_edutor');
    $default = 'Question two heading goes here?';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Answer
    $name = 'theme_edutor/faq2content';
    $title = get_string('faq2content', 'theme_edutor');
    $description = get_string('faq2contentdesc', 'theme_edutor');
    $default = '<p>Answer 2 goes here. You can add up to 10 FAQs. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et <a href="#link">link example</a> magnis dis parturient montes, nascetur ridiculus mus. </p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	// FAQ 3
	// Description
    $name = 'theme_edutor/faq3info';
    $heading = get_string('faq3info', 'theme_edutor');
    $information = get_string('faq3desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
   
    
    // Question
    $name = 'theme_edutor/faq3title';
    $title = get_string('faq3title', 'theme_edutor');
    $description = get_string('faq3titledesc', 'theme_edutor');
    $default = 'Question three heading goes here?';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Answer
    $name = 'theme_edutor/faq3content';
    $title = get_string('faq3content', 'theme_edutor');
    $description = get_string('faq3contentdesc', 'theme_edutor');
    $default = '<p>Answer 3 goes here. You can add up to 10 FAQs. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et <a href="#link">link example</a> magnis dis parturient montes, nascetur ridiculus mus. </p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	// FAQ 4
	// Description
    $name = 'theme_edutor/faq4info';
    $heading = get_string('faq4info', 'theme_edutor');
    $information = get_string('faq4desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
   
    
    // Question
    $name = 'theme_edutor/faq4title';
    $title = get_string('faq4title', 'theme_edutor');
    $description = get_string('faq4titledesc', 'theme_edutor');
    $default = 'Question four heading goes here?';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Answer
    $name = 'theme_edutor/faq4content';
    $title = get_string('faq4content', 'theme_edutor');
    $description = get_string('faq4contentdesc', 'theme_edutor');
    $default = '<p>Answer 4 goes here. You can add up to 10 FAQs. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et <a href="#link">link example</a> magnis dis parturient montes, nascetur ridiculus mus. </p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	// FAQ 5
	// Description
    $name = 'theme_edutor/faq5info';
    $heading = get_string('faq5info', 'theme_edutor');
    $information = get_string('faq5desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
   
    
    // Question
    $name = 'theme_edutor/faq5title';
    $title = get_string('faq5title', 'theme_edutor');
    $description = get_string('faq5titledesc', 'theme_edutor');
    $default = 'Question five heading goes here?';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Answer
    $name = 'theme_edutor/faq5content';
    $title = get_string('faq5content', 'theme_edutor');
    $description = get_string('faq5contentdesc', 'theme_edutor');
    $default = '<p>Answer 5 goes here. You can add up to 10 FAQs. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et <a href="#link">link example</a> magnis dis parturient montes, nascetur ridiculus mus. </p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	// FAQ 6
	// Description
    $name = 'theme_edutor/faq6info';
    $heading = get_string('faq6info', 'theme_edutor');
    $information = get_string('faq6desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
   
    
    // Question
    $name = 'theme_edutor/faq6title';
    $title = get_string('faq6title', 'theme_edutor');
    $description = get_string('faq6titledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Answer
    $name = 'theme_edutor/faq6content';
    $title = get_string('faq6content', 'theme_edutor');
    $description = get_string('faq6contentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	// FAQ 7
	// Description
    $name = 'theme_edutor/faq7info';
    $heading = get_string('faq7info', 'theme_edutor');
    $information = get_string('faq7desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
   
    
    // Question
    $name = 'theme_edutor/faq7title';
    $title = get_string('faq7title', 'theme_edutor');
    $description = get_string('faq7titledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Answer
    $name = 'theme_edutor/faq7content';
    $title = get_string('faq7content', 'theme_edutor');
    $description = get_string('faq7contentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	// FAQ 8
	// Description
    $name = 'theme_edutor/faq8info';
    $heading = get_string('faq8info', 'theme_edutor');
    $information = get_string('faq8desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
   
    
    // Question
    $name = 'theme_edutor/faq8title';
    $title = get_string('faq8title', 'theme_edutor');
    $description = get_string('faq8titledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Answer
    $name = 'theme_edutor/faq8content';
    $title = get_string('faq8content', 'theme_edutor');
    $description = get_string('faq8contentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	// FAQ 9
	// Description
    $name = 'theme_edutor/faq9info';
    $heading = get_string('faq9info', 'theme_edutor');
    $information = get_string('faq9desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
   
    
    // Question
    $name = 'theme_edutor/faq9title';
    $title = get_string('faq9title', 'theme_edutor');
    $description = get_string('faq9titledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Answer
    $name = 'theme_edutor/faq9content';
    $title = get_string('faq9content', 'theme_edutor');
    $description = get_string('faq9contentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	// FAQ 10
	// Description
    $name = 'theme_edutor/faq10info';
    $heading = get_string('faq10info', 'theme_edutor');
    $information = get_string('faq10desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
   
    
    // Question
    $name = 'theme_edutor/faq10title';
    $title = get_string('faq10title', 'theme_edutor');
    $description = get_string('faq10titledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Answer
    $name = 'theme_edutor/faq10content';
    $title = get_string('faq10content', 'theme_edutor');
    $description = get_string('faq10contentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // FAQ Section CTA Button Text
    $name = 'theme_edutor/faqsectionbuttontext';
    $title = get_string('faqsectionbuttontext', 'theme_edutor');
    $description = get_string('faqsectionbuttontextdesc', 'theme_edutor');
    $default = 'View More';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // FAQ Section CTA Button URL
    $name = 'theme_edutor/faqsectionbuttonurl';
    $title = get_string('faqsectionbuttonurl', 'theme_edutor');
    $description = get_string('faqsectionbuttonurldesc', 'theme_edutor');
    $default = '#link';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/faqsectionbuttonurlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

	
	// Add the page
    $settings->add($page);
    
    //$ADMIN->add('theme_edutor', $page);