<?php
	
	defined('MOODLE_INTERNAL') || die();
	
    /* Frontpage Testimonials */
   
	$page = new admin_settingpage('theme_edutor_testimonials', get_string('testimonialsheading', 'theme_edutor'));
	$page->add(new admin_setting_heading('theme_edutor_testimonialsheadingsub', get_string('testimonialsheadingsub', 'theme_edutor'),
            format_text(get_string('testimonialsheadingsubdesc' , 'theme_edutor'), FORMAT_MARKDOWN)));
    
    // Enable Testimonials section
    $name = 'theme_edutor/usetestimonials';
    $title = get_string('usetestimonials', 'theme_edutor');
    $description = get_string('usetestimonialsdesc', 'theme_edutor');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Testimonial Section Title
    $name = 'theme_edutor/testimonialsectiontitle';
    $title = get_string('testimonialsectiontitle', 'theme_edutor');
    $description = get_string('testimonialsectiontitledesc', 'theme_edutor');
    $default = 'Don\'t Take Our Word For It';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Section Intro
    $name = 'theme_edutor/testimonialsectionintro';
    $title = get_string('testimonialsectionintro', 'theme_edutor');
    $description = get_string('testimonialsectionintrodesc', 'theme_edutor');
    $default = '<p>Section intro goes here. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
	
	// Show Star Ratings
    $name = 'theme_edutor/showstarratings';
    $title = get_string('showstarratings', 'theme_edutor');
    $description = get_string('showstarratingsdesc', 'theme_edutor');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
	
	
	// Testimonials Section CTA Button Info
    $name = 'theme_edutor/testimonialsbuttoninfo';
    $heading = get_string('testimonialsbuttoninfo', 'theme_edutor');
    $information = get_string('testimonialsbuttoninfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Testimonials Section CTA Button Text
    $name = 'theme_edutor/testimonialsbuttontext';
    $title = get_string('testimonialsbuttontext', 'theme_edutor');
    $description = get_string('testimonialsbuttontextdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonials Section CTA Button URL
    $name = 'theme_edutor/testimonialsbuttonurl';
    $title = get_string('testimonialsbuttonurl', 'theme_edutor');
    $description = get_string('testimonialsbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/testimonialsbuttonurlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* Testimonial 1 */
    
    // Description for Testimonial 1
    $name = 'theme_edutor/testimonial1info';
    $heading = get_string('testimonial1', 'theme_edutor');
    $information = get_string('testimonial1desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Testimonial Image 
    $name = 'theme_edutor/testimonial1image';
    $title = get_string('testimonialimage', 'theme_edutor');
    $description = get_string('testimonialimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'testimonial1image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Profile Name
    $name = 'theme_edutor/testimonial1name';
    $title = get_string('testimonialname', 'theme_edutor');
    $description = get_string('testimonialnamedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Profile Meta
    $name = 'theme_edutor/testimonial1meta';
    $title = get_string('testimonialmeta', 'theme_edutor');
    $description = get_string('testimonialmetadesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Testimonial Heading (summary)
    $name = 'theme_edutor/testimonial1heading';
    $title = get_string('testimonialheading', 'theme_edutor');
    $description = get_string('testimonialheadingdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Content 
    $name = 'theme_edutor/testimonial1content';
    $title = get_string('testimonialcontent', 'theme_edutor');
    $description = get_string('testimonialcontentdesc', 'theme_edutor');
    $default = '<p>Testimonial 1 goes here. You can add up to 6 testimonials. Lorem ipsum dolor sit amet consectetur adipiscing elit. Integer suscipit, elit sed placerat aliquam, velit nulla semper lectus.</p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Testimonial 2 */
    
    // Description for Testimonial 2
    $name = 'theme_edutor/testimonial2info';
    $heading = get_string('testimonial2', 'theme_edutor');
    $information = get_string('testimonial2desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Testimonial Image 
    $name = 'theme_edutor/testimonial2image';
    $title = get_string('testimonialimage', 'theme_edutor');
    $description = get_string('testimonialimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'testimonial2image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Profile Name
    $name = 'theme_edutor/testimonial2name';
    $title = get_string('testimonialname', 'theme_edutor');
    $description = get_string('testimonialnamedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Profile Meta
    $name = 'theme_edutor/testimonial2meta';
    $title = get_string('testimonialmeta', 'theme_edutor');
    $description = get_string('testimonialmetadesc', 'theme_edutor');
    $default = 'San Francisco, US';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Heading (summary)
    $name = 'theme_edutor/testimonial2heading';
    $title = get_string('testimonialheading', 'theme_edutor');
    $description = get_string('testimonialheadingdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Content 
    $name = 'theme_edutor/testimonial2content';
    $title = get_string('testimonialcontent', 'theme_edutor');
    $description = get_string('testimonialcontentdesc', 'theme_edutor');
    $default = '<p>Testimonial 2 goes here. You can add up to 6 testimonials. Lorem ipsum dolor sit amet consectetur adipiscing elit. Integer suscipit, elit sed placerat aliquam, velit nulla semper lectus.</p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Testimonial 3 */
    
    // Description for Testimonial 3
    $name = 'theme_edutor/testimonial3info';
    $heading = get_string('testimonial3', 'theme_edutor');
    $information = get_string('testimonial3desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Testimonial Image 
    $name = 'theme_edutor/testimonial3image';
    $title = get_string('testimonialimage', 'theme_edutor');
    $description = get_string('testimonialimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'testimonial3image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Profile Name
    $name = 'theme_edutor/testimonial3name';
    $title = get_string('testimonialname', 'theme_edutor');
    $description = get_string('testimonialnamedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Profile Meta
    $name = 'theme_edutor/testimonial3meta';
    $title = get_string('testimonialmeta', 'theme_edutor');
    $description = get_string('testimonialmetadesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Heading (summary)
    $name = 'theme_edutor/testimonial3heading';
    $title = get_string('testimonialheading', 'theme_edutor');
    $description = get_string('testimonialheadingdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Content 
    $name = 'theme_edutor/testimonial3content';
    $title = get_string('testimonialcontent', 'theme_edutor');
    $description = get_string('testimonialcontentdesc', 'theme_edutor');
    $default = '<p>Testimonial 3 goes here. You can add up to 6 testimonials. Lorem ipsum dolor sit amet consectetur adipiscing elit. Integer suscipit, elit sed placerat aliquam, velit nulla semper lectus.</p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Testimonial 4 */
    
    // Description for Testimonial 4
    $name = 'theme_edutor/testimonial4info';
    $heading = get_string('testimonial4', 'theme_edutor');
    $information = get_string('testimonial4desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Testimonial Image 
    $name = 'theme_edutor/testimonial4image';
    $title = get_string('testimonialimage', 'theme_edutor');
    $description = get_string('testimonialimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'testimonial4image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    
    // Testimonial Profile Name
    $name = 'theme_edutor/testimonial4name';
    $title = get_string('testimonialname', 'theme_edutor');
    $description = get_string('testimonialnamedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Profile Meta
    $name = 'theme_edutor/testimonial4meta';
    $title = get_string('testimonialmeta', 'theme_edutor');
    $description = get_string('testimonialmetadesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Testimonial Heading (summary)
    $name = 'theme_edutor/testimonial4heading';
    $title = get_string('testimonialheading', 'theme_edutor');
    $description = get_string('testimonialheadingdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Testimonial Content 
    $name = 'theme_edutor/testimonial4content';
    $title = get_string('testimonialcontent', 'theme_edutor');
    $description = get_string('testimonialcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* Testimonial 5 */
    
    // Description for Testimonial 5
    $name = 'theme_edutor/testimonial5info';
    $heading = get_string('testimonial5', 'theme_edutor');
    $information = get_string('testimonial5desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Testimonial Image 
    $name = 'theme_edutor/testimonial5image';
    $title = get_string('testimonialimage', 'theme_edutor');
    $description = get_string('testimonialimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'testimonial5image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Profile Name
    $name = 'theme_edutor/testimonial5name';
    $title = get_string('testimonialname', 'theme_edutor');
    $description = get_string('testimonialnamedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Profile Meta
    $name = 'theme_edutor/testimonial5meta';
    $title = get_string('testimonialmeta', 'theme_edutor');
    $description = get_string('testimonialmetadesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Heading (summary)
    $name = 'theme_edutor/testimonial5heading';
    $title = get_string('testimonialheading', 'theme_edutor');
    $description = get_string('testimonialheadingdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Content 
    $name = 'theme_edutor/testimonial5content';
    $title = get_string('testimonialcontent', 'theme_edutor');
    $description = get_string('testimonialcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Testimonial 6 */
    
    // Description for Testimonial 6
    $name = 'theme_edutor/testimonial6info';
    $heading = get_string('testimonial6', 'theme_edutor');
    $information = get_string('testimonial6desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Testimonial Image 
    $name = 'theme_edutor/testimonial6image';
    $title = get_string('testimonialimage', 'theme_edutor');
    $description = get_string('testimonialimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'testimonial6image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Profile Name
    $name = 'theme_edutor/testimonial6name';
    $title = get_string('testimonialname', 'theme_edutor');
    $description = get_string('testimonialnamedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Profile Title
    $name = 'theme_edutor/testimonial6meta';
    $title = get_string('testimonialmeta', 'theme_edutor');
    $description = get_string('testimonialmetadesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Heading (summary)
    $name = 'theme_edutor/testimonial6heading';
    $title = get_string('testimonialheading', 'theme_edutor');
    $description = get_string('testimonialheadingdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Testimonial Content 
    $name = 'theme_edutor/testimonial6content';
    $title = get_string('testimonialcontent', 'theme_edutor');
    $description = get_string('testimonialcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Add the page
    $settings->add($page);
    
    //$ADMIN->add('theme_edutor', $page);