<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
	/* Heading */
	$page = new admin_settingpage('theme_edutor_fpfeatured_pane2', get_string('fpfeaturedpane2heading', 'theme_edutor'));
	
       
    // Featured Panes
    
         /* Pane 2 */
    $name = 'theme_edutor/pane2info';
    $heading = get_string('pane2info', 'theme_edutor');
    $information = get_string('paneinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    
    // Pane 2 Tab (Nav)
    $name = 'theme_edutor/tab2name';
    $title = get_string('tabname', 'theme_edutor');
    $description = get_string('tabnamedesc', 'theme_edutor');
    $default = 'New';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    $name = 'theme_edutor/tab2icon';
    $title = get_string('tabicon', 'theme_edutor');
    $description = get_string('tabicondesc', 'theme_edutor');
    $default = 'fa-bullhorn';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    

    // Pane 2 Title
    $name = 'theme_edutor/pane2title';
    $title = get_string('panetitle', 'theme_edutor');
    $description = get_string('panetitledesc', 'theme_edutor');
    $default = 'Pane two Heading';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Pane 2 Intro
    $name = 'theme_edutor/pane2intro';
    $title = get_string('paneintro', 'theme_edutor');
    $description = get_string('paneintrodesc', 'theme_edutor');
    $default = '<p>Pane two intro goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet vulputate metus. Donec nisi nulla, rutrum eu eros a, interdum hendrerit sapien. </p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    //Enable Pane 2 Blocks
    $name = 'theme_edutor/usepane2blocks';
    $title = get_string('usepane2blocks', 'theme_edutor');
    $description = get_string('usepaneblocksdesc', 'theme_edutor');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Pane 2 Block 1 */	
    $name = 'theme_edutor/pane2block1info';
    $heading = get_string('pane2block1info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane2block1title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = 'Pane Two Block 1';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block1image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane2block1image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block1content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = 'Block 1 content goes here Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane2block1url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '#link';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane2block1urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block1label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block1price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Pane 2 Block 2 */	
    $name = 'theme_edutor/pane2block2info';
    $heading = get_string('pane2block2info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane2block2title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = 'Pane Two Block 2';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block2image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane2block2image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block2content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = 'Block 2 content goes here Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane2block2url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '#link';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane2block2urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block2label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block2price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* Pane 2 Block 3 */	
    $name = 'theme_edutor/pane2block3info';
    $heading = get_string('pane2block3info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane2block3title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = 'Pane Two Block 3';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block3image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane2block3image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block3content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = 'Block 3 content goes here Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane2block3url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '#link';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane2block3urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block3label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block3price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    
     /* Pane 2 Block 4 */	
    $name = 'theme_edutor/pane2block4info';
    $heading = get_string('pane2block4info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane2block4title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = 'Pane Two Block 4';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block4image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane2block4image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block4content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = 'Block 4 content goes here Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane2block4url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '#link';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane2block4urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block4label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block4price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     /* Pane 2 Block 5 */	
    $name = 'theme_edutor/pane2block5info';
    $heading = get_string('pane2block5info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane2block5title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = 'Pane Two Block 5';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block5image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane2block5image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block5content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = 'Block 5 content goes here Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane2block5url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '#link';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane2block5urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block5label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block5price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     /* Pane 2 Block 6 */	
    $name = 'theme_edutor/pane2block6info';
    $heading = get_string('pane2block6info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane2block6title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block6image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane2block6image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block6content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane2block6url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane2block6urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block6label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block6price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     /* Pane 2 Block 7 */	
    $name = 'theme_edutor/pane2block7info';
    $heading = get_string('pane2block7info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane2block7title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block7image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane2block7image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block7content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane2block7url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane2block7urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block7label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block7price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     /* Pane 2 Block 8 */	
    $name = 'theme_edutor/pane2block8info';
    $heading = get_string('pane2block8info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane2block8title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block8image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane2block8image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block8content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane2block8url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane2block8urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block8label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block8price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
     /* Pane 2 Block 9 */	
    $name = 'theme_edutor/pane2block9info';
    $heading = get_string('pane2block9info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane2block9title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block9image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane2block9image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block9content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane2block9url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane2block9urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block9label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block9price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     /* Pane 2 Block 10 */	
    $name = 'theme_edutor/pane2block10info';
    $heading = get_string('pane2block10info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane2block10title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block10image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane2block10image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block10content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane2block10url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane2block10urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block10label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane2block10price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

       
    
    // Add the page
    $settings->add($page);
    
    //$ADMIN->add('theme_edutor', $page);
