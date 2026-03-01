<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
	
	/* General Settings */
	$page = new admin_settingpage('theme_edutor_general', get_string('generalheading', 'theme_edutor'));
	
	/* Header Social Media Links */
	/*
	$page->add(new admin_setting_heading('theme_edutor_general', get_string('generalheadingsub', 'theme_edutor'),
            format_text(get_string('generalheadingdesc' , 'theme_edutor'), FORMAT_MARKDOWN))); */
	
    
    // Theme Color Switcher (Preset SCSS)

    $name = 'theme_edutor/preset';
    $title = get_string('preset', 'theme_edutor');
    $description = get_string('preset_desc', 'theme_edutor');
    $default = 'theme-1.scss';

    $context = context_system::instance();
    $fs = get_file_storage();
    $files = $fs->get_area_files($context->id, 'theme_edutor', 'preset', 0, 'itemid, filepath, filename', false);

    $choices = [];
    foreach ($files as $file) {
        $choices[$file->get_filename()] = $file->get_filename();
    }
    // These are the built in presets.
    $choices['theme-1.scss'] = 'theme-1.scss';
    $choices['theme-2.scss'] = 'theme-2.scss';
    $choices['theme-3.scss'] = 'theme-3.scss';
    $choices['theme-4.scss'] = 'theme-4.scss';
    $choices['theme-5.scss'] = 'theme-5.scss';
    $choices['theme-6.scss'] = 'theme-6.scss';


    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Variable $theme-color-primary
    // We use an empty default value because the default colour should come from the preset.
    $name = 'theme_edutor/brandcolorprimary';
    $title = get_string('brandcolorprimary', 'theme_edutor');
    $description = get_string('brandcolorprimarydesc', 'theme_edutor');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Variable $theme-color-secondary
    // We use an empty default value because the default colour should come from the preset.
    $name = 'theme_edutor/brandcolorsecondary';
    $title = get_string('brandcolorsecondary', 'theme_edutor');
    $description = get_string('brandcolorsecondarydesc', 'theme_edutor');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Enable Google Fonts API 
    $name = 'theme_edutor/usefontsapi';
    $title = get_string('usefontsapi', 'theme_edutor');
    $description = get_string('usefontsapidesc', 'theme_edutor');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    

    
    // Page fonts.
	$name = 'theme_edutor/pagefont';
	$title = get_string('pagefont', 'theme_edutor');
	$description = get_string('pagefontdesc', 'theme_edutor');
	$default = 'DM Sans';
	$choices = array(
		    
		    'DM Sans' => 'DM Sans',
		    'Libre Baskerville' => 'Libre Baskerville',
	        'Roboto' => 'Roboto',
	        'Roboto Slab' => 'Roboto Slab',
	        'Open Sans' => 'Open Sans',
	        'Source Sans Pro' => 'Source Sans Pro',
	        'PT Sans' => 'PT Sans',
	        'PT Serif' => 'PT Serif',
	        'Oswald' => 'Oswald',
	        'Lato' => 'Lato',
	        'Lora' => 'Lora',
	        'Montserrat' => 'Montserrat',
	        'Cardo' => 'Cardo',
	        'Arvo' => 'Arvo',
	        'Ubuntu' => 'Ubuntu',
	        'Oswald' => 'Oswald',
	        'Poppins' => 'Poppins',
	        'Nunito' => 'Nunito',
	        'Merriweather' => 'Merriweather',
	        'Noto Sans'=> 'Noto Sans',
	        'Playfair Display' => 'Playfair Display',
	        'Karla' => 'Karla',
	        'Work Sans' => 'Work Sans',
	    );
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$page->add($setting);
    
    // Heading fonts.
	$name = 'theme_edutor/headingfont';
	$title = get_string('headingfont', 'theme_edutor');
	$description = get_string('headingfontdesc', 'theme_edutor');
	$default = 'Mulish';
	$choices = array(
		    'DM Sans' => 'DM Sans',
		    'Libre Baskerville' => 'Libre Baskerville',
		    'Mulish' => 'Mulish',
	        'Roboto' => 'Roboto',
	        'Roboto Slab' => 'Roboto Slab',
	        'Open Sans' => 'Open Sans',
	        'Source Sans Pro' => 'Source Sans Pro',
	        'PT Sans' => 'PT Sans',
	        'PT Serif' => 'PT Serif',
	        'Oswald' => 'Oswald',
	        'Lato' => 'Lato',
	        'Lora' => 'Lora',
	        'Montserrat' => 'Montserrat',
	        'Cardo' => 'Cardo',
	        'Arvo' => 'Arvo',
	        'Ubuntu' => 'Ubuntu',
	        'Oswald' => 'Oswald',
	        'Poppins' => 'Poppins',
	        'Nunito' => 'Nunito',
	        'Merriweather' => 'Merriweather',
	        'Noto Sans'=> 'Noto Sans',
	        'Playfair Display' => 'Playfair Display',
	        'Karla' => 'Karla',
	        'Work Sans' => 'Work Sans',
	    );
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$page->add($setting);
	
	

    
    // Add the page
    $settings->add($page);
    
    //$ADMIN->add('theme_edutor', $page);
