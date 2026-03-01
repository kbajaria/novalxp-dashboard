<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
	
	/* Social Media Links */
	$page = new admin_settingpage('theme_edutor_social', get_string('socialheading', 'theme_edutor'));
	$page->add(new admin_setting_heading('theme_edutor_socialmediaheadingsub', get_string('socialmediaheadingsub', 'theme_edutor'),
            format_text(get_string('socialmediaheadingsubdesc' , 'theme_edutor'), FORMAT_MARKDOWN)));

    
    //Website url settings
    $name = 'theme_edutor/website';
    $title = get_string('website', 'theme_edutor');
    $description = get_string('websitedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     // Tiktok url setting.
    $name = 'theme_edutor/tiktok';
    $title = get_string('tiktok', 'theme_edutor');
    $description = get_string('tiktokdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
            
    // Twitter url setting.
    $name = 'theme_edutor/twitterx';
    $title = get_string('twitterx', 'theme_edutor');
    $description = get_string('twitterxdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Facebook url setting.
    $name = 'theme_edutor/facebook';
    $title = get_string('facebook', 'theme_edutor');
    $description = get_string('facebookdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // LinkedIn url setting.
    $name = 'theme_edutor/linkedin';
    $title = get_string('linkedin', 'theme_edutor');
    $description = get_string('linkedindesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // YouTube url setting.
    $name = 'theme_edutor/youtube';
    $title = get_string('youtube', 'theme_edutor');
    $description = get_string('youtubedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Vimeo url setting.
    $name = 'theme_edutor/vimeo';
    $title = get_string('vimeo', 'theme_edutor');
    $description = get_string('vimeodesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    // Instagram url setting.
    $name = 'theme_edutor/instagram';
    $title = get_string('instagram', 'theme_edutor');
    $description = get_string('instagramdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Snapchat url setting.
    $name = 'theme_edutor/snapchat';
    $title = get_string('snapchat', 'theme_edutor');
    $description = get_string('snapchatdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // WhatsApp url setting.
    $name = 'theme_edutor/whatsapp';
    $title = get_string('whatsapp', 'theme_edutor');
    $description = get_string('whatsappdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    
    // Pinterest url setting.
    $name = 'theme_edutor/pinterest';
    $title = get_string('pinterest', 'theme_edutor');
    $description = get_string('pinterestdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Flickr url setting.
    $name = 'theme_edutor/flickr';
    $title = get_string('flickr', 'theme_edutor');
    $description = get_string('flickrdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Reddit url setting.
    $name = 'theme_edutor/reddit';
    $title = get_string('reddit', 'theme_edutor');
    $description = get_string('redditdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    //Tumblr url setting.
    $name = 'theme_edutor/tumblr';
    $title = get_string('tumblr', 'theme_edutor');
    $description = get_string('tumblrdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Slideshare url setting.
    $name = 'theme_edutor/slideshare';
    $title = get_string('slideshare', 'theme_edutor');
    $description = get_string('slidesharedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Skype account setting.
    $name = 'theme_edutor/skype';
    $title = get_string('skype', 'theme_edutor');
    $description = get_string('skypedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    

    // Weibo account setting.
    $name = 'theme_edutor/weibo';
    $title = get_string('weibo', 'theme_edutor');
    $description = get_string('weibodesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // RSS url setting.
    $name = 'theme_edutor/rss';
    $title = get_string('rss', 'theme_edutor');
    $description = get_string('rssdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	
	/* Custom Social Media Links */
	$page->add(new admin_setting_heading('theme_edutor_customsocial', get_string('customsocialheadingsub', 'theme_edutor'),
            format_text(get_string('customsocialdesc' , 'theme_edutor'), FORMAT_MARKDOWN)));
	
	// Custom social url setting 1.
	$name = 'theme_edutor/social1';
	$title = get_string('sociallink', 'theme_edutor');
	$description = get_string('sociallinkdesc', 'theme_edutor');
	$default = '';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$page->add($setting);
	
	// Social icon setting 1.
	$name = 'theme_edutor/socialicon1';
	$title = get_string('sociallinkicon', 'theme_edutor');
	$description = get_string('sociallinkicondesc', 'theme_edutor');
	$default = '';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$page->add($setting);

	
	// Custom social url setting 2.
	$name = 'theme_edutor/social2';
	$title = get_string('sociallink', 'theme_edutor');
	$description = get_string('sociallinkdesc', 'theme_edutor');
	$default = '';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$page->add($setting);
	
	// Social icon setting 2.
	$name = 'theme_edutor/socialicon2';
	$title = get_string('sociallinkicon', 'theme_edutor');
	$description = get_string('sociallinkicondesc', 'theme_edutor');
	$default = '';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$page->add($setting);
	
	// Custom social url setting 3.
	$name = 'theme_edutor/social3';
	$title = get_string('sociallink', 'theme_edutor');
	$description = get_string('sociallinkdesc', 'theme_edutor');
	$default = '';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$page->add($setting);
	
	// Social icon setting 3.
	$name = 'theme_edutor/socialicon3';
	$title = get_string('sociallinkicon', 'theme_edutor');
	$description = get_string('sociallinkicondesc', 'theme_edutor');
	$default = '';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$page->add($setting);

	
	// Add the page
    $settings->add($page);
    
    //$ADMIN->add('theme_edutor', $page);