<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
    /* Frontpage Featured Blocks */	
	$page = new admin_settingpage('theme_edutor_featuredsection', get_string('featuredsectionheading', 'theme_edutor'));
	$page->add(new admin_setting_heading('theme_edutor_featuredsectionheadingsub', get_string('featuredsectionheadingsub', 'theme_edutor'),
            format_text(get_string('featuredsectionheadingsubdesc' , 'theme_edutor'), FORMAT_MARKDOWN)));
                 
	//Enable Featured Blocks.
    $name = 'theme_edutor/usefeaturedsection';
    $title = get_string('usefeaturedsection', 'theme_edutor');
    $description = get_string('usefeaturedsectiondesc', 'theme_edutor');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Featured Section Title
    $name = 'theme_edutor/featuredsectiontitle';
    $title = get_string('featuredsectiontitle', 'theme_edutor');
    $description = get_string('featuredsectiontitledesc', 'theme_edutor');
    $default = 'Featured Courses';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Featured Section Intro
    $name = 'theme_edutor/featuredsectionintro';
    $title = get_string('featuredsectionintro', 'theme_edutor');
    $description = get_string('featuredsectionintrodesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Featured Pane Nav Icon Background Colour (normal status)
	// We use an empty default value because the default colour should come from the preset.
    $name = 'theme_edutor/tabbgcolor';
    $title = get_string('tabbgcolor', 'theme_edutor');
    $description = get_string('tabbgcolordesc', 'theme_edutor');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Featured Pane Nav Icon Background Colour (active status)
	// We use an empty default value because the default colour should come from the preset.
    $name = 'theme_edutor/tabbgcoloractive';
    $title = get_string('tabbgcoloractive', 'theme_edutor');
    $description = get_string('tabbgcoloractivedesc', 'theme_edutor');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    
    // Featured Pane Blocks Background Colour
	// We use an empty default value because the default colour should come from the preset.
    $name = 'theme_edutor/paneblockbgcolor';
    $title = get_string('paneblockbgcolor', 'theme_edutor');
    $description = get_string('paneblockbgcolordesc', 'theme_edutor');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Featured Pane Block Content Text Colour
	// We use an empty default value because the default colour should come from the preset.
    $name = 'theme_edutor/paneblocktextcolor';
    $title = get_string('paneblocktextcolor', 'theme_edutor');
    $description = get_string('paneblocktextcolordesc', 'theme_edutor');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Featured Pane Block Label Colour
	// We use an empty default value because the default colour should come from the preset.
    $name = 'theme_edutor/paneblocklabelbgcolor';
    $title = get_string('paneblocklabelbgcolor', 'theme_edutor');
    $description = get_string('paneblocklabelbgcolordesc', 'theme_edutor');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    
    // Featured Pane Blocks Responsive Breakpoint Display  
    
    // Pane Blocks Display Title
    $name = 'theme_edutor/paneblocksdisplayinfo';
    $heading = get_string('paneblocksdisplayinfo', 'theme_edutor');
    $information = get_string('paneblocksdisplayinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
     
    //X-Small devices (portrait phones, less than 576px)
    $name = 'theme_edutor/paneblocks_xs';
    $title = get_string('paneblocks_xs', 'theme_edutor');
    $description = get_string('paneblocks_xs_desc', 'theme_edutor');
    $default = '1';
	$choices = array(
		    '1' => 'Display 1 pane block (default)',
		    '2' => 'Display 2 pane blocks',
	    );
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$page->add($setting);
	
	//Small devices (landscape phones, 576px and up)
    $name = 'theme_edutor/paneblocks_sm';
    $title = get_string('paneblocks_sm', 'theme_edutor');
    $description = get_string('paneblocks_sm_desc', 'theme_edutor');
    $default = '2';
	$choices = array(
		    '1' => 'Display 1 pane block',
		    '2' => 'Display 2 pane blocks (default)',
		    '3' => 'Display 3 pane blocks',
	    );
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$page->add($setting);
	
	// Medium devices (tablets, 768px and up)
    $name = 'theme_edutor/paneblocks_md';
    $title = get_string('paneblocks_md', 'theme_edutor');
    $description = get_string('paneblocks_md_desc', 'theme_edutor');
    $default = '3';
	$choices = array(
		    '1' => 'Display 1 pane blocks',
		    '2' => 'Display 2 pane blocks',
		    '3' => 'Display 3 pane blocks (default)',
		    '4' => 'Display 4 pane blocks',
	    );
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$page->add($setting);
	

	
	// Large devices (desktops, 992px and up)
    $name = 'theme_edutor/paneblocks_lg';
    $title = get_string('paneblocks_lg', 'theme_edutor');
    $description = get_string('paneblocks_lg_desc', 'theme_edutor');
    $default = '4';
	$choices = array(		
		    '2' => 'Display 2 pane blocks', 
		    '3' => 'Display 3 pane blocks',   
		    '4' => 'Display 4 pane blocks (default)',
		    '5' => 'Display 5 pane blocks',
	    );
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$page->add($setting);
	
	
	// X-Large devices (large desktops, 1200px and up)
    $name = 'theme_edutor/paneblocks_xl';
    $title = get_string('paneblocks_xl', 'theme_edutor');
    $description = get_string('paneblocks_xl_desc', 'theme_edutor');
    $default = '5';
	$choices = array(		
		    '3' => 'Display 3 pane blocks',   
		    '4' => 'Display 4 pane blocks',
		    '5' => 'Display 5 pane blocks (default)',
		    '6' => 'Display 6 pane blocks',
	    );
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$page->add($setting);
    
    // XX-Large devices (larger desktops, 1400px and up)
    $name = 'theme_edutor/paneblocks_xxl';
    $title = get_string('paneblocks_xxl', 'theme_edutor');
    $description = get_string('paneblocks_xxl_desc', 'theme_edutor');
    $default = '5';
	$choices = array(
		    '3' => 'Display 3 pane blocks',
		    '4' => 'Display 4 pane blocks',
		    '5' => 'Display 5 pane blocks (default)',
		    '6' => 'Display 6 pane blocks',
	       
	    );
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$page->add($setting);


      
    // Add the page
    $settings->add($page);
    
    //$ADMIN->add('theme_edutor', $page);
    