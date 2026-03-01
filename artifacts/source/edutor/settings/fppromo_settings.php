<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
	
	/* Frontpage Promo Carousel Settings */	
	$page = new admin_settingpage('theme_edutor_promocarousel', get_string('promocarouselheading', 'theme_edutor'));
	$page->add(new admin_setting_heading('theme_edutor_promocarouselheadingsub', get_string('promocarouselheadingsub', 'theme_edutor'),
            format_text(get_string('promocarouselheadingsubdesc' , 'theme_edutor'), FORMAT_MARKDOWN)));
	
	
	
	//Enable Promo Carousel
    $name = 'theme_edutor/usepromocarousel';
    $title = get_string('usepromocarousel', 'theme_edutor');
    $description = get_string('usepromocarouseldesc', 'theme_edutor');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Promo  Section Title
    $name = 'theme_edutor/promosectiontitle';
    $title = get_string('promosectiontitle', 'theme_edutor');
    $description = get_string('promosectiontitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Promo  Section Intro
    $name = 'theme_edutor/promosectionintro';
    $title = get_string('promosectionintro', 'theme_edutor');
    $description = get_string('promosectionintrodesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    

	/* Carousel Item 1 */	
	$name = 'theme_edutor/carouselitem1info';
    $heading = get_string('carouselitem1info', 'theme_edutor');
    $information = get_string('carouselitem1desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/carouselitem1';
    $title = get_string('carouselitemtitle', 'theme_edutor');
    $description = get_string('carouselitemtitledesc', 'theme_edutor');
    $default = 'Heading One';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/carouselitem1image';
    $title = get_string('carouselitemimage', 'theme_edutor');
    $description = get_string('carouselitemimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'carouselitem1image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/carouselitem1content';
    $title = get_string('carouselitemcontent', 'theme_edutor');
    $description = get_string('carouselitemcontentdesc', 'theme_edutor');
    $default = '<p>You can add up to 6 carousel items to promote your content or courses. Each carousel item can also include a YouTube video. It\'s a great way to grab your visitors\' attention and spark their interest!</p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/carouselitem1buttontext';
    $title = get_string('carouselitembuttontext', 'theme_edutor');
    $description = get_string('carouselitembuttontextdesc', 'theme_edutor');
    $default = 'Find out more';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/carouselitem1buttonurl';
    $title = get_string('carouselitembuttonurl', 'theme_edutor');
    $description = get_string('carouselitembuttonurldesc', 'theme_edutor');
    $default = '#link1';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/carouselitem1buttonurlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Enable Carousel Item 1 Video
    $name = 'theme_edutor/usecarouselitem1video';
    $title = get_string('usecarouselitemvideo', 'theme_edutor');
    $description = get_string('usecarouselitemvideodesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Carousel Item 1 Video Type Switcher
    $name = 'theme_edutor/carouselitem1videoswitcher';
    $title = get_string('carouselitemvideoswitcher', 'theme_edutor');
    $description = get_string('carouselitemvideoswitcherdesc', 'theme_edutor');
    $default = '1';
    $choices = array(
        '1' => 'YouTube Video',
        '2' => 'Vimeo Video'
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    //Carousel Item 1 Video ID
    $name = 'theme_edutor/carouselitem1videoid';
    $title = get_string('carouselitemvideoid', 'theme_edutor');
    $description = get_string('carouselitemvideoiddesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    /* Carousel Item 2 */   
    $name = 'theme_edutor/carouselitem2info';
    $heading = get_string('carouselitem2info', 'theme_edutor');
    $information = get_string('carouselitem2desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
	$name = 'theme_edutor/carouselitem2';
    $title = get_string('carouselitemtitle', 'theme_edutor');
    $description = get_string('carouselitemtitledesc', 'theme_edutor');
    $default = 'Heading Two';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/carouselitem2image';
    $title = get_string('carouselitemimage', 'theme_edutor');
    $description = get_string('carouselitemimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'carouselitem2image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/carouselitem2content';
    $title = get_string('carouselitemcontent', 'theme_edutor');
    $description = get_string('carouselitemcontentdesc', 'theme_edutor');
    $default = '<p>You can add up to 6 carousel items to promote your content or courses. You also have the option to add YouTube or Vimeo videos to each carousel item. It is a great way to catch your visitors\' attention and interest!</p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/carouselitem2buttontext';
    $title = get_string('carouselitembuttontext', 'theme_edutor');
    $description = get_string('carouselitembuttontextdesc', 'theme_edutor');
    $default = 'Find out more';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/carouselitem2buttonurl';
    $title = get_string('carouselitembuttonurl', 'theme_edutor');
    $description = get_string('carouselitembuttonurldesc', 'theme_edutor');
    $default = '#link2';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/carouselitem2buttonurlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Enable Carousel Item 2 Video
    $name = 'theme_edutor/usecarouselitem2video';
    $title = get_string('usecarouselitemvideo', 'theme_edutor');
    $description = get_string('usecarouselitemvideodesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    

    //Carousel Item 2 Video Type Switcher
    $name = 'theme_edutor/carouselitem2videoswitcher';
    $title = get_string('carouselitemvideoswitcher', 'theme_edutor');
    $description = get_string('carouselitemvideoswitcherdesc', 'theme_edutor');
    $default = '1';
    $choices = array(
        '1' => 'YouTube Video',
        '2' => 'Vimeo Video'
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    //Carousel Item 2 Video ID
    $name = 'theme_edutor/carouselitem2videoid';
    $title = get_string('carouselitemvideoid', 'theme_edutor');
    $description = get_string('carouselitemvideoiddesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Carousel Item 3 */    
    $name = 'theme_edutor/carouselitem3info';
    $heading = get_string('carouselitem3info', 'theme_edutor');
    $information = get_string('carouselitem3desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
	$name = 'theme_edutor/carouselitem3';
    $title = get_string('carouselitemtitle', 'theme_edutor');
    $description = get_string('carouselitemtitledesc', 'theme_edutor');
    $default = 'Heading Three';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/carouselitem3image';
    $title = get_string('carouselitemimage', 'theme_edutor');
    $description = get_string('carouselitemimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'carouselitem3image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/carouselitem3content';
    $title = get_string('carouselitemcontent', 'theme_edutor');
    $description = get_string('carouselitemcontentdesc', 'theme_edutor');
    $default = '<p>You can add up to 6 carousel items to promote your content or courses. You also have the option to add YouTube or Vimeo videos to each carousel item. It is a great way to catch your visitors\' attention and interest!</p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/carouselitem3buttontext';
    $title = get_string('carouselitembuttontext', 'theme_edutor');
    $description = get_string('carouselitembuttontextdesc', 'theme_edutor');
    $default = 'Find out more';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/carouselitem3buttonurl';
    $title = get_string('carouselitembuttonurl', 'theme_edutor');
    $description = get_string('carouselitembuttonurldesc', 'theme_edutor');
    $default = '#link3';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/carouselitem3buttonurlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Enable Carousel Item 3 Video
    $name = 'theme_edutor/usecarouselitem3video';
    $title = get_string('usecarouselitemvideo', 'theme_edutor');
    $description = get_string('usecarouselitemvideodesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    //Carousel Item 3 Video Type Switcher
    $name = 'theme_edutor/carouselitem3videoswitcher';
    $title = get_string('carouselitemvideoswitcher', 'theme_edutor');
    $description = get_string('carouselitemvideoswitcherdesc', 'theme_edutor');
    $default = '1';
    $choices = array(
        '1' => 'YouTube Video',
        '2' => 'Vimeo Video'
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Carousel Item 3 Video ID
    $name = 'theme_edutor/carouselitem3videoid';
    $title = get_string('carouselitemvideoid', 'theme_edutor');
    $description = get_string('carouselitemvideoiddesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
   
    
    /* Carousel Item 4 */    
     
    $name = 'theme_edutor/carouselitem4info';
    $heading = get_string('carouselitem4info', 'theme_edutor');
    $information = get_string('carouselitem4desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
	$name = 'theme_edutor/carouselitem4';
    $title = get_string('carouselitemtitle', 'theme_edutor');
    $description = get_string('carouselitemtitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/carouselitem4image';
    $title = get_string('carouselitemimage', 'theme_edutor');
    $description = get_string('carouselitemimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'carouselitem4image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/carouselitem4content';
    $title = get_string('carouselitemcontent', 'theme_edutor');
    $description = get_string('carouselitemcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/carouselitem4buttontext';
    $title = get_string('carouselitembuttontext', 'theme_edutor');
    $description = get_string('carouselitembuttontextdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/carouselitem4buttonurl';
    $title = get_string('carouselitembuttonurl', 'theme_edutor');
    $description = get_string('carouselitembuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/carouselitem4buttonurlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Enable Carousel Item 4 Video
    $name = 'theme_edutor/usecarouselitem4video';
    $title = get_string('usecarouselitemvideo', 'theme_edutor');
    $description = get_string('usecarouselitemvideodesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    

    //Carousel Item 4 Video Type Switcher
    $name = 'theme_edutor/carouselitem4videoswitcher';
    $title = get_string('carouselitemvideoswitcher', 'theme_edutor');
    $description = get_string('carouselitemvideoswitcherdesc', 'theme_edutor');
    $default = '1';
    $choices = array(
        '1' => 'YouTube Video',
        '2' => 'Vimeo Video'
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    
    //Carousel Item 4 Video ID
    $name = 'theme_edutor/carouselitem4videoid';
    $title = get_string('carouselitemvideoid', 'theme_edutor');
    $description = get_string('carouselitemvideoiddesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Carousel Item 5 */    
    $name = 'theme_edutor/carouselitem5info';
    $heading = get_string('carouselitem5info', 'theme_edutor');
    $information = get_string('carouselitem5desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
	$name = 'theme_edutor/carouselitem5';
    $title = get_string('carouselitemtitle', 'theme_edutor');
    $description = get_string('carouselitemtitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/carouselitem5image';
    $title = get_string('carouselitemimage', 'theme_edutor');
    $description = get_string('carouselitemimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'carouselitem5image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/carouselitem5content';
    $title = get_string('carouselitemcontent', 'theme_edutor');
    $description = get_string('carouselitemcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/carouselitem5buttontext';
    $title = get_string('carouselitembuttontext', 'theme_edutor');
    $description = get_string('carouselitembuttontextdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/carouselitem5buttonurl';
    $title = get_string('carouselitembuttonurl', 'theme_edutor');
    $description = get_string('carouselitembuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/carouselitem5buttonurlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Enable Carousel Item 5 Video
    $name = 'theme_edutor/usecarouselitem5video';
    $title = get_string('usecarouselitemvideo', 'theme_edutor');
    $description = get_string('usecarouselitemvideodesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    //Carousel Item 5 Video Type Switcher
    $name = 'theme_edutor/carouselitem5videoswitcher';
    $title = get_string('carouselitemvideoswitcher', 'theme_edutor');
    $description = get_string('carouselitemvideoswitcherdesc', 'theme_edutor');
    $default = '1';
    $choices = array(
        '1' => 'YouTube Video',
        '2' => 'Vimeo Video'
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    

    
    //Carousel Item 5 Video ID
    $name = 'theme_edutor/carouselitem5videoid';
    $title = get_string('carouselitemvideoid', 'theme_edutor');
    $description = get_string('carouselitemvideoiddesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Carousel Item 6 */    
    $name = 'theme_edutor/carouselitem6info';
    $heading = get_string('carouselitem6info', 'theme_edutor');
    $information = get_string('carouselitem6desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
	$name = 'theme_edutor/carouselitem6';
    $title = get_string('carouselitemtitle', 'theme_edutor');
    $description = get_string('carouselitemtitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/carouselitem6image';
    $title = get_string('carouselitemimage', 'theme_edutor');
    $description = get_string('carouselitemimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'carouselitem6image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/carouselitem6content';
    $title = get_string('carouselitemcontent', 'theme_edutor');
    $description = get_string('carouselitemcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/carouselitem6buttontext';
    $title = get_string('carouselitembuttontext', 'theme_edutor');
    $description = get_string('carouselitembuttontextdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/carouselitem6buttonurl';
    $title = get_string('carouselitembuttonurl', 'theme_edutor');
    $description = get_string('carouselitembuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/carouselitem6buttonurlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Enable Carousel Item 6 Video
    $name = 'theme_edutor/usecarouselitem6video';
    $title = get_string('usecarouselitemvideo', 'theme_edutor');
    $description = get_string('usecarouselitemvideodesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    //Carousel Item 6 Video Type Switcher
    $name = 'theme_edutor/carouselitem6videoswitcher';
    $title = get_string('carouselitemvideoswitcher', 'theme_edutor');
    $description = get_string('carouselitemvideoswitcherdesc', 'theme_edutor');
    $default = '1';
    $choices = array(
        '1' => 'YouTube Video',
        '2' => 'Vimeo Video'
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    

    
    //Carousel Item 6 Video ID
    $name = 'theme_edutor/carouselitem6videoid';
    $title = get_string('carouselitemvideoid', 'theme_edutor');
    $description = get_string('carouselitemvideoiddesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
	
	
	
	// Add the page
    $settings->add($page);
    
    //$ADMIN->add('theme_edutor', $page);