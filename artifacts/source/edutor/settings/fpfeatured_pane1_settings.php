<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
	/* Heading */
	$page = new admin_settingpage('theme_edutor_fpfeatured_pane1', get_string('fpfeaturedpane1heading', 'theme_edutor'));
	
       
    // Featured Panes
    
    
     /* Pane 1 */
    $name = 'theme_edutor/pane1info';
    $heading = get_string('pane1info', 'theme_edutor');
    $information = get_string('paneinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    
    // Pane 1 Tab (Nav)
    $name = 'theme_edutor/tab1name';
    $title = get_string('tabname', 'theme_edutor');
    $description = get_string('tabnamedesc', 'theme_edutor');
    $default = 'Top Rated';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    $name = 'theme_edutor/tab1icon';
    $title = get_string('tabicon', 'theme_edutor');
    $description = get_string('tabicondesc', 'theme_edutor');
    $default = 'fa-star';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    

    // Pane 1 Title
    $name = 'theme_edutor/pane1title';
    $title = get_string('panetitle', 'theme_edutor');
    $description = get_string('panetitledesc', 'theme_edutor');
    $default = 'Pane One Heading';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Pane 1 Intro
    $name = 'theme_edutor/pane1intro';
    $title = get_string('paneintro', 'theme_edutor');
    $description = get_string('paneintrodesc', 'theme_edutor');
    $default = '<p>Pane one intro goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet vulputate metus. Donec nisi nulla, rutrum eu eros a, interdum hendrerit sapien. </p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    //Enable Pane 1 Blocks
    $name = 'theme_edutor/usepane1blocks';
    $title = get_string('usepane1blocks', 'theme_edutor');
    $description = get_string('usepaneblocksdesc', 'theme_edutor');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


	/* Pane 1 Block 1 */	
    $name = 'theme_edutor/pane1block1info';
    $heading = get_string('pane1block1info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane1block1title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = 'Pane One Block 1';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block1image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane1block1image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block1content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = 'Block 1 content goes here Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane1block1url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '#link';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane1block1urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block1label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block1price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Pane 1 Block 2 */	
    $name = 'theme_edutor/pane1block2info';
    $heading = get_string('pane1block2info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane1block2title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = 'Pane One Block 2';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block2image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane1block2image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block2content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = 'Block 2 content goes here Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane1block2url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '#link';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane1block2urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block2label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block2price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* Pane 1 Block 3 */	
    $name = 'theme_edutor/pane1block3info';
    $heading = get_string('pane1block3info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane1block3title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = 'Pane One Block 3';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block3image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane1block3image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block3content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = 'Block 3 content goes here Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane1block3url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '#link';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane1block3urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block3label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block3price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    
     /* Pane 1 Block 4 */	
    $name = 'theme_edutor/pane1block4info';
    $heading = get_string('pane1block4info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane1block4title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = 'Pane One Block 4';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block4image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane1block4image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block4content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = 'Block 4 content goes here Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane1block4url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '#link';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane1block4urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block4label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block4price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     /* Pane 1 Block 5 */	
    $name = 'theme_edutor/pane1block5info';
    $heading = get_string('pane1block5info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane1block5title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = 'Pane One Block 5';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block5image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane1block5image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block5content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = 'Block 5 content goes here Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane1block5url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '#link';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane1block5urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block5label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block5price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     /* Pane 1 Block 6 */	
    $name = 'theme_edutor/pane1block6info';
    $heading = get_string('pane1block6info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane1block6title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = 'Pane One Block 6';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block6image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane1block6image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block6content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = 'Block 6 content goes here Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane1block6url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '#link';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane1block6urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block6label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block6price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     /* Pane 1 Block 7 */	
    $name = 'theme_edutor/pane1block7info';
    $heading = get_string('pane1block7info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane1block7title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = 'Pane One Block 7';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block7image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane1block7image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block7content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = 'Block 7 content goes here Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane1block7url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '#link';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane1block7urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block7label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block7price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     /* Pane 1 Block 8 */	
    $name = 'theme_edutor/pane1block8info';
    $heading = get_string('pane1block8info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane1block8title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = 'Pane One Block 8';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block8image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane1block8image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block8content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = 'Block 8 content goes here Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane1block8url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '#link';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane1block8urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block8label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block8price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
     /* Pane 1 Block 9 */	
    $name = 'theme_edutor/pane1block9info';
    $heading = get_string('pane1block9info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane1block9title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = 'Pane One Block 9';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block9image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane1block9image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block9content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = 'Block 9 content goes here Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane1block9url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '#link';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane1block9urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block9label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block9price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     /* Pane 1 Block 10 */	
    $name = 'theme_edutor/pane1block10info';
    $heading = get_string('pane1block10info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane1block10title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = 'Pane One Block 10';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block10image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane1block10image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block10content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = 'Block 10 content goes here Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane1block10url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '#link';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane1block10urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block10label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane1block10price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Add the page
    $settings->add($page);
    
    //$ADMIN->add('theme_edutor', $page);
