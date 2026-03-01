<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
	/* Frontpage Hero Slideshow Settings */
    $page = new admin_settingpage('theme_edutor_herosection', get_string('herosectionheading', 'theme_edutor'));
    
    $page->add(new admin_setting_heading('theme_edutor_herosectionheadingsub', get_string('herosectionheadingsub', 'theme_edutor'),
            format_text(get_string('herosectionheadingsubdesc' , 'theme_edutor'), FORMAT_MARKDOWN)));


    // Enable Hero Section   
    $name = 'theme_edutor/useherosection';
    $title = get_string('useherosection', 'theme_edutor');
    $description = get_string('useherosectiondesc', 'theme_edutor');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    //Hero Slideshow Item Height
    $name = 'theme_edutor/slideshowheight';
	$title = get_string('slideshowheight', 'theme_edutor');
	$description = get_string('slideshowheightdesc', 'theme_edutor');;
	$default = '660px';
	$choices = array(
	        '400px' => '400px',
	        '420px' => '420px',
	        '440px' => '440px',
	        '460px' => '460px',
		    '480px' => '480px',
		    '500px' => '500px',
		    '520px' => '520px',
		    '540px' => '540px',
		    '560px' => '560px',
		    '580px' => '580px',
		    '600px' => '600px',
		    '620px' => '620px',
		    '640px' => '640px',
		    '660px' => '660px',
		    '680px' => '680px',
		    '700px' => '700px',
		    '720px' => '720px',
		    '740px' => '740px',
		    '760px' => '760px',
		    '780px' => '780px',
		    '800px' => '800px',
	    );
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$page->add($setting);
	
	
	// Enable Hero Slideshow Indicators  
    $name = 'theme_edutor/useheroslideshowindicators';
    $title = get_string('useheroslideshowindicators', 'theme_edutor');
    $description = get_string('useheroslideshowindicatorsdesc', 'theme_edutor');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
 
    
    // Hero Logo Image 
    
    $name = 'theme_edutor/herologoimage';
    $title = get_string('herologoimage', 'theme_edutor');
    $description = get_string('herologoimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'herologoimage');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
        
    //Enable Hero Video
    $name = 'theme_edutor/useherovideo';
    $title = get_string('useherovideo', 'theme_edutor');
    $description = get_string('useherovideodesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Hero Video Link Text
    $name = 'theme_edutor/herovideo';
    $title = get_string('herovideo', 'theme_edutor');
    $description = get_string('herovideodesc', 'theme_edutor');
    $default = 'Watch video';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    //Hero Video Type Switcher
    
    $name = 'theme_edutor/herovideoswitcher';
    $title = get_string('herovideoswitcher', 'theme_edutor');
    $description = get_string('herovideoswitcherdesc', 'theme_edutor');
    $default = '1';
    $choices = array(
        '1' => 'YouTube Video',
        '2' => 'Vimeo Video'
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    
    //Hero Video ID
    $name = 'theme_edutor/herovideoid';
    $title = get_string('herovideoid', 'theme_edutor');
    $description = get_string('herovideoiddesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    /* Slide 1 */

    // Description for Slide 1
    $name = 'theme_edutor/slide1info';
    $heading = get_string('slide1', 'theme_edutor');
    $information = get_string('slideinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    // Image
    $name = 'theme_edutor/slide1image';
    $title = get_string('slideimage', 'theme_edutor');
    $description = get_string('slideimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide1image');
    $setting->set_updatedcallback('theme_reset_all_caches');    
    $page->add($setting);
    
    
    // Heading.
    $name = 'theme_edutor/slide1heading';
    $title = get_string('slideheading', 'theme_edutor');
    $description = get_string('slideheadingdesc', 'theme_edutor');
    $default = 'Slide One Heading';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    // Caption.
    $name = 'theme_edutor/slide1caption';
    $title = get_string('slidecaption', 'theme_edutor');
    $description = get_string('slidecaptiondesc', 'theme_edutor');
    $default = '<div class="mb-4">Engaging and empowering learning through technology.<br>Edutor is the perfect theme for your Moodle LMS platform.</div>
<ul class="list-unstyled">
    <li><i class="list-check-icon fa fa-check-circle me-2"></i>List item example lorem ipsum</li>
    <li><i class="list-check-icon fa fa-check-circle me-2"></i>List item example lorem ipsum</li>
    <li><i class="list-check-icon fa fa-check-circle me-2"></i>List item example lorem ipsum</li>
</ul>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // CTA Button Text
    $name = 'theme_edutor/slide1cta';
    $title = get_string('slidecta', 'theme_edutor');
    $description = get_string('slidectadesc', 'theme_edutor');
    $default = 'Slide One CTA';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // CTA URL.
    $name = 'theme_edutor/slide1url';
    $title = get_string('slideurl', 'theme_edutor');
    $description = get_string('slideurldesc', 'theme_edutor');
    $default = '#link1';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA URL open in new window    
    $name = 'theme_edutor/slide1urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // CTA Button Colour
    $name = 'theme_edutor/slide1ctacolor';
    $title = get_string('slidectacolor', 'theme_edutor');
    $description = get_string('slidectacolordesc', 'theme_edutor');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    


    /* Slide 2 */
     
    // Description for Slide 2
    $name = 'theme_edutor/slide2info';
    $heading = get_string('slide2', 'theme_edutor');
    $information = get_string('slideinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    // Image
    $name = 'theme_edutor/slide2image';
    $title = get_string('slideimage', 'theme_edutor');
    $description = get_string('slideimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide2image');
    $setting->set_updatedcallback('theme_reset_all_caches');    
    $page->add($setting);
    
    // Heading.
    $name = 'theme_edutor/slide2heading';
    $title = get_string('slideheading', 'theme_edutor');
    $description = get_string('slideheadingdesc', 'theme_edutor');
    $default = 'Slide Two Heading';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    // Caption.
    $name = 'theme_edutor/slide2caption';
    $title = get_string('slidecaption', 'theme_edutor');
    $description = get_string('slidecaptiondesc', 'theme_edutor');
    $default = '<p>Slide 2 description goes here. You can add up to 6 slides.</p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA Button Text
    $name = 'theme_edutor/slide2cta';
    $title = get_string('slidecta', 'theme_edutor');
    $description = get_string('slidectadesc', 'theme_edutor');
    $default = 'Slide Two CTA';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA URL.
    $name = 'theme_edutor/slide2url';
    $title = get_string('slideurl', 'theme_edutor');
    $description = get_string('slideurldesc', 'theme_edutor');
    $default = '#link2';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA URL open in new window    
    $name = 'theme_edutor/slide2urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA Button Colour
    $name = 'theme_edutor/slide2ctacolor';
    $title = get_string('slidectacolor', 'theme_edutor');
    $description = get_string('slidectacolordesc', 'theme_edutor');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    
    /* Slide 3 */
     
    // Description for Slide 3
    $name = 'theme_edutor/slide3info';
    $heading = get_string('slide3', 'theme_edutor');
    $information = get_string('slideinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    // Image
    $name = 'theme_edutor/slide3image';
    $title = get_string('slideimage', 'theme_edutor');
    $description = get_string('slideimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide3image');
    $setting->set_updatedcallback('theme_reset_all_caches');    
    $page->add($setting);
    
    // Heading.
    $name = 'theme_edutor/slide3heading';
    $title = get_string('slideheading', 'theme_edutor');
    $description = get_string('slideheadingdesc', 'theme_edutor');
    $default = 'Slide Three Heading';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    // Caption.
    $name = 'theme_edutor/slide3caption';
    $title = get_string('slidecaption', 'theme_edutor');
    $description = get_string('slidecaptiondesc', 'theme_edutor');
    $default = 'Slide 3 description goes here. You can add up to 6 slides. ';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // CTA Button Text
    $name = 'theme_edutor/slide3cta';
    $title = get_string('slidecta', 'theme_edutor');
    $description = get_string('slidectadesc', 'theme_edutor');
    $default = 'Slide Three CTA';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // CTA URL.
    $name = 'theme_edutor/slide3url';
    $title = get_string('slideurl', 'theme_edutor');
    $description = get_string('slideurldesc', 'theme_edutor');
    $default = '#link3';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA URL open in new window    
    $name = 'theme_edutor/slide3urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA Button Colour
    $name = 'theme_edutor/slide3ctacolor';
    $title = get_string('slidectacolor', 'theme_edutor');
    $description = get_string('slidectacolordesc', 'theme_edutor');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    
    /* Slide 4 */
     
    // Description for Slide 4
    $name = 'theme_edutor/slide4info';
    $heading = get_string('slide4', 'theme_edutor');
    $information = get_string('slideinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    // Image
    $name = 'theme_edutor/slide4image';
    $title = get_string('slideimage', 'theme_edutor');
    $description = get_string('slideimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide4image');
    $setting->set_updatedcallback('theme_reset_all_caches');    
    $page->add($setting);
    
    // Heading.
    $name = 'theme_edutor/slide4heading';
    $title = get_string('slideheading', 'theme_edutor');
    $description = get_string('slideheadingdesc', 'theme_edutor');
    $default = 'Slide Four Heading';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    // Caption.
    $name = 'theme_edutor/slide4caption';
    $title = get_string('slidecaption', 'theme_edutor');
    $description = get_string('slidecaptiondesc', 'theme_edutor');
    $default = 'Slide 4 description goes here. You can add up to 6 slides.';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA Button Text
    $name = 'theme_edutor/slide4cta';
    $title = get_string('slidecta', 'theme_edutor');
    $description = get_string('slidectadesc', 'theme_edutor');
    $default = 'Slide Four CTA';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA URL.
    $name = 'theme_edutor/slide4url';
    $title = get_string('slideurl', 'theme_edutor');
    $description = get_string('slideurldesc', 'theme_edutor');
    $default = '#link4';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA URL open in new window    
    $name = 'theme_edutor/slide4urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA Button Colour
    $name = 'theme_edutor/slide4ctacolor';
    $title = get_string('slidectacolor', 'theme_edutor');
    $description = get_string('slidectacolordesc', 'theme_edutor');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* Slide 5 */
     
    // Description for Slide 5
    $name = 'theme_edutor/slide5info';
    $heading = get_string('slide5', 'theme_edutor');
    $information = get_string('slideinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    // Image
    $name = 'theme_edutor/slide5image';
    $title = get_string('slideimage', 'theme_edutor');
    $description = get_string('slideimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide5image');
    $setting->set_updatedcallback('theme_reset_all_caches');    
    $page->add($setting);
    
    // Heading.
    $name = 'theme_edutor/slide5heading';
    $title = get_string('slideheading', 'theme_edutor');
    $description = get_string('slideheadingdesc', 'theme_edutor');
    $default = 'Slide Five Heading';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    // Caption.
    $name = 'theme_edutor/slide5caption';
    $title = get_string('slidecaption', 'theme_edutor');
    $description = get_string('slidecaptiondesc', 'theme_edutor');
    $default = 'Slide 5 description goes here. You can add up to 6 slides.';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA Button Text
    $name = 'theme_edutor/slide5cta';
    $title = get_string('slidecta', 'theme_edutor');
    $description = get_string('slidectadesc', 'theme_edutor');
    $default = 'Slide Five CTA';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA URL.
    $name = 'theme_edutor/slide5url';
    $title = get_string('slideurl', 'theme_edutor');
    $description = get_string('slideurldesc', 'theme_edutor');
    $default = '#link5';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA URL open in new window    
    $name = 'theme_edutor/slide5urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA Button Colour
    $name = 'theme_edutor/slide5ctacolor';
    $title = get_string('slidectacolor', 'theme_edutor');
    $description = get_string('slidectacolordesc', 'theme_edutor');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    
    
    
    /* Slide 6 */
     
    // Description for Slide 6
    $name = 'theme_edutor/slide6info';
    $heading = get_string('slide6', 'theme_edutor');
    $information = get_string('slideinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    // Image
    $name = 'theme_edutor/slide6image';
    $title = get_string('slideimage', 'theme_edutor');
    $description = get_string('slideimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide6image');
    $setting->set_updatedcallback('theme_reset_all_caches');    
    $page->add($setting);
    
    // Heading.
    $name = 'theme_edutor/slide6heading';
    $title = get_string('slideheading', 'theme_edutor');
    $description = get_string('slideheadingdesc', 'theme_edutor');
    $default = 'Slide Six Heading';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    // Caption.
    $name = 'theme_edutor/slide6caption';
    $title = get_string('slidecaption', 'theme_edutor');
    $description = get_string('slidecaptiondesc', 'theme_edutor');
    $default = 'Slide 6 description goes here. You can add up to 6 slides.';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // CTA Button Text
    $name = 'theme_edutor/slide6cta';
    $title = get_string('slidecta', 'theme_edutor');
    $description = get_string('slidectadesc', 'theme_edutor');
    $default = 'Slide Six CTA';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA URL.
    $name = 'theme_edutor/slide6url';
    $title = get_string('slideurl', 'theme_edutor');
    $description = get_string('slideurldesc', 'theme_edutor');
    $default = '#link6';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA URL open in new window    
    $name = 'theme_edutor/slide6urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA Button Colour
    $name = 'theme_edutor/slide6ctacolor';
    $title = get_string('slidectacolor', 'theme_edutor');
    $description = get_string('slidectacolordesc', 'theme_edutor');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    
    // Add the page
    $settings->add($page);
    
    //$ADMIN->add('theme_edutor', $page);