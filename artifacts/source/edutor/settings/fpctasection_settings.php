<?php   
    
    
    
    defined('MOODLE_INTERNAL') || die();
	
	/* Frontpage CTA Section */
	$page = new admin_settingpage('theme_edutor_ctasection', get_string('ctasectionheading', 'theme_edutor'));
	$page->add(new admin_setting_heading('theme_edutor_ctasectionheadingsub', get_string('ctasectionheadingsub', 'theme_edutor'),
            format_text(get_string('ctasectionheadingsubdesc' , 'theme_edutor'), FORMAT_MARKDOWN)));
    
    // Enable CTA Section
    $name = 'theme_edutor/usectasection';
    $title = get_string('usectasection', 'theme_edutor');
    $description = get_string('usectasectiondesc', 'theme_edutor');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA Section Title
    $name = 'theme_edutor/ctasectiontitle';
    $title = get_string('ctasectiontitle', 'theme_edutor');
    $description = get_string('ctasectiontitledesc', 'theme_edutor');
    $default = 'Section Heading';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA Section Content
    $name = 'theme_edutor/ctasectioncontent';
    $title = get_string('ctasectioncontent', 'theme_edutor');
    $description = get_string('ctasectioncontentdesc', 'theme_edutor');
    $default = '<p>Section intro goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tincidunt metus libero, ut condimentum lectus finibus et.</p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    // CTA Section CTA Button Text
    $name = 'theme_edutor/ctasectionbuttontext';
    $title = get_string('ctasectionbuttontext', 'theme_edutor');
    $description = get_string('ctasectionbuttontextdesc', 'theme_edutor');
    $default = 'Button Text';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA Section CTA Button URL
    $name = 'theme_edutor/ctasectionbuttonurl';
    $title = get_string('ctasectionbuttonurl', 'theme_edutor');
    $description = get_string('ctasectionbuttonurldesc', 'theme_edutor');
    $default = '#link';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/ctasectionbuttonurlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // CTA Section Image
    $name = 'theme_edutor/ctasectionimage';
    $title = get_string('ctasectionimage', 'theme_edutor');
    $description = get_string('ctasectionimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'ctasectionimage');
    $setting->set_updatedcallback('theme_reset_all_caches');    
    $page->add($setting);
    
    
    // CTA Section Background Colour
    // We use an empty default value because the default colour should come from the preset.
    $name = 'theme_edutor/ctasectionbgcolor';
    $title = get_string('ctasectionbgcolor', 'theme_edutor');
    $description = get_string('ctasectionbgcolordesc', 'theme_edutor');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    // Data Box Info
    $name = 'theme_edutor/ctadataboxinfo';
    $heading = get_string('ctadataboxinfo', 'theme_edutor');
    $information = get_string('ctadataboxinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Enable Data Box 
    $name = 'theme_edutor/usectadatabox';
    $title = get_string('usectadatabox', 'theme_edutor');
    $description = get_string('usectadataboxdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // CTA Data Box Item 1 Title
    $name = 'theme_edutor/ctadataitem1title';
    $title = get_string('ctadataitem1title', 'theme_edutor');
    $description = get_string('ctadataitemtitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA Data Box Item 1 Meta
    $name = 'theme_edutor/ctadataitem1meta';
    $title = get_string('ctadataitem1meta', 'theme_edutor');
    $description = get_string('ctadataitemmetadesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // CTA Data Box Item 2 Title
    $name = 'theme_edutor/ctadataitem2title';
    $title = get_string('ctadataitem2title', 'theme_edutor');
    $description = get_string('ctadataitemtitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA Data Box Item 2 Meta
    $name = 'theme_edutor/ctadataitem2meta';
    $title = get_string('ctadataitem2meta', 'theme_edutor');
    $description = get_string('ctadataitemmetadesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA Data Box Item 3 Title
    $name = 'theme_edutor/ctadataitem3title';
    $title = get_string('ctadataitem3title', 'theme_edutor');
    $description = get_string('ctadataitemtitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA Data Box Item 3 Meta
    $name = 'theme_edutor/ctadataitem3meta';
    $title = get_string('ctadataitem3meta', 'theme_edutor');
    $description = get_string('ctadataitemmetadesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA Data Box Item 4 Title
    $name = 'theme_edutor/ctadataitem4title';
    $title = get_string('ctadataitem4title', 'theme_edutor');
    $description = get_string('ctadataitemtitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // CTA Data Box Item 4 Meta
    $name = 'theme_edutor/ctadataitem4meta';
    $title = get_string('ctadataitem4meta', 'theme_edutor');
    $description = get_string('ctadataitemmetadesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    
    // CTA Benefits Info
    $name = 'theme_edutor/ctabenefitsinfo';
    $heading = get_string('ctabenefitsinfo', 'theme_edutor');
    $information = get_string('ctabenefitsinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    
    // Enable CTA Benefits
    $name = 'theme_edutor/usebenefits';
    $title = get_string('usebenefits', 'theme_edutor');
    $description = get_string('usebenefitsdesc', 'theme_edutor');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    
    // Benefit Box 1
    
    // Description
    $name = 'theme_edutor/benefit1info';
    $heading = get_string('benefit1info', 'theme_edutor');
    $information = get_string('benefit1desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Icon
    $name = 'theme_edutor/benefit1icon';
    $title = get_string('benefit1icon', 'theme_edutor');
    $description = get_string('benefit1icondesc', 'theme_edutor');    
    $default = 'business';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Use Image Instead of Icon
    $name = 'theme_edutor/usebenefit1image';
    $title = get_string('usebenefitimage', 'theme_edutor');
    $description = get_string('usebenefitimagedesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Image 
    $name = 'theme_edutor/benefit1image';
    $title = get_string('benefitimage', 'theme_edutor');
    $description = get_string('benefitimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'benefit1image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Title
    $name = 'theme_edutor/benefit1title';
    $title = get_string('benefit1title', 'theme_edutor');
    $description = get_string('benefit1titledesc', 'theme_edutor');
    $default = 'Benefit One';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Content
    $name = 'theme_edutor/benefit1content';
    $title = get_string('benefit1copy', 'theme_edutor');
    $description = get_string('benefit1contentdesc', 'theme_edutor');
    $default = '<p>You can add up to 6 blocks. You can change the icon above to any of the 1000+ <a href="https://material.io/icons/" target="_blank">Google Material icons</a> available or upload your own image.</p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    
    // Benefit Box 2
    
    // Description
    $name = 'theme_edutor/benefit2info';
    $heading = get_string('benefit2info', 'theme_edutor');
    $information = get_string('benefit2desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Icon
    $name = 'theme_edutor/benefit2icon';
    $title = get_string('benefit2icon', 'theme_edutor');
    $description = get_string('benefit2icondesc', 'theme_edutor');
    $default = 'more_time';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Use Image Instead of Icon
    $name = 'theme_edutor/usebenefit2image';
    $title = get_string('usebenefitimage', 'theme_edutor');
    $description = get_string('usebenefitimagedesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Image 
    $name = 'theme_edutor/benefit2image';
    $title = get_string('benefitimage', 'theme_edutor');
    $description = get_string('benefitimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'benefit2image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Title
    $name = 'theme_edutor/benefit2title';
    $title = get_string('benefit2title', 'theme_edutor');
    $description = get_string('benefit2titledesc', 'theme_edutor');
    $default = 'Benefit Two';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Content
    $name = 'theme_edutor/benefit2content';
    $title = get_string('benefit2copy', 'theme_edutor');
    $description = get_string('benefit2contentdesc', 'theme_edutor');
    $default = '<p>You can add up to 6 blocks. You can change the icon above to any of the 1000+ <a href="https://material.io/icons/" target="_blank">Google Material icons</a> available or upload your own image.</p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    
    // Benefit Box 3
    
    // Description
    $name = 'theme_edutor/benefit3info';
    $heading = get_string('benefit3info', 'theme_edutor');
    $information = get_string('benefit3desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Icon
    $name = 'theme_edutor/benefit3icon';
    $title = get_string('benefit3icon', 'theme_edutor');
    $description = get_string('benefit3icondesc', 'theme_edutor');
    $default = 'photo_camera_front';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Use Image Instead of Icon
    $name = 'theme_edutor/usebenefit3image';
    $title = get_string('usebenefitimage', 'theme_edutor');
    $description = get_string('usebenefitimagedesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Image 
    $name = 'theme_edutor/benefit3image';
    $title = get_string('benefitimage', 'theme_edutor');
    $description = get_string('benefitimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'benefit3image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Title
    $name = 'theme_edutor/benefit3title';
    $title = get_string('benefit3title', 'theme_edutor');
    $description = get_string('benefit3titledesc', 'theme_edutor');
    $default = 'Benefit Three';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Content
    $name = 'theme_edutor/benefit3content';
    $title = get_string('benefit3copy', 'theme_edutor');
    $description = get_string('benefit3contentdesc', 'theme_edutor');
    $default = '<p>You can add up to 6 blocks. You can change the icon above to any of the 1000+ <a href="https://material.io/icons/" target="_blank">Google Material icons</a> available or upload your own image.</p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Benefit Box 4
    
    // Description
    $name = 'theme_edutor/benefit4info';
    $heading = get_string('benefit4info', 'theme_edutor');
    $information = get_string('benefit4desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Icon
    $name = 'theme_edutor/benefit4icon';
    $title = get_string('benefit4icon', 'theme_edutor');
    $description = get_string('benefit4icondesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Use Image Instead of Icon
    $name = 'theme_edutor/usebenefit4image';
    $title = get_string('usebenefitimage', 'theme_edutor');
    $description = get_string('usebenefitimagedesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Image 
    $name = 'theme_edutor/benefit4image';
    $title = get_string('benefitimage', 'theme_edutor');
    $description = get_string('benefitimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'benefit4image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Title
    $name = 'theme_edutor/benefit4title';
    $title = get_string('benefit4title', 'theme_edutor');
    $description = get_string('benefit4titledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Content
    $name = 'theme_edutor/benefit4content';
    $title = get_string('benefit4copy', 'theme_edutor');
    $description = get_string('benefit4contentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Benefit Box 5
    
    // Description
    $name = 'theme_edutor/benefit5info';
    $heading = get_string('benefit5info', 'theme_edutor');
    $information = get_string('benefit5desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Icon
    $name = 'theme_edutor/benefit5icon';
    $title = get_string('benefit5icon', 'theme_edutor');
    $description = get_string('benefit5icondesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Use Image Instead of Icon
    $name = 'theme_edutor/usebenefit5image';
    $title = get_string('usebenefitimage', 'theme_edutor');
    $description = get_string('usebenefitimagedesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Image 
    $name = 'theme_edutor/benefit5image';
    $title = get_string('benefitimage', 'theme_edutor');
    $description = get_string('benefitimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'benefit5image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Title
    $name = 'theme_edutor/benefit5title';
    $title = get_string('benefit5title', 'theme_edutor');
    $description = get_string('benefit5titledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Content
    $name = 'theme_edutor/benefit5content';
    $title = get_string('benefit5copy', 'theme_edutor');
    $description = get_string('benefit5contentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    // Benefit Box 6
    
    // Description
    $name = 'theme_edutor/benefit6info';
    $heading = get_string('benefit6info', 'theme_edutor');
    $information = get_string('benefit6desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Icon
    $name = 'theme_edutor/benefit6icon';
    $title = get_string('benefit6icon', 'theme_edutor');
    $description = get_string('benefit6icondesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Use Image Instead of Icon
    $name = 'theme_edutor/usebenefit6image';
    $title = get_string('usebenefitimage', 'theme_edutor');
    $description = get_string('usebenefitimagedesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Image 
    $name = 'theme_edutor/benefit6image';
    $title = get_string('benefitimage', 'theme_edutor');
    $description = get_string('benefitimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'benefit6image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Title
    $name = 'theme_edutor/benefit6title';
    $title = get_string('benefit6title', 'theme_edutor');
    $description = get_string('benefit6titledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);    
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Content
    $name = 'theme_edutor/benefit6content';
    $title = get_string('benefit6copy', 'theme_edutor');
    $description = get_string('benefit6contentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);  
        
    // Add the page
    $settings->add($page);
    
    //$ADMIN->add('theme_edutor', $page);