<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
	/* Heading */
	$page = new admin_settingpage('theme_edutor_fpfeatured_pan65', get_string('fpfeaturedpane6heading', 'theme_edutor'));
	
       
    // Featured Panes
    
     /* Pane 6 */
    $name = 'theme_edutor/pane6info';
    $heading = get_string('pane6info', 'theme_edutor');
    $information = get_string('paneinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    
    // Pane 6 Tab (Nav)
    $name = 'theme_edutor/tab6name';
    $title = get_string('tabname', 'theme_edutor');
    $description = get_string('tabnamedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    $name = 'theme_edutor/tab6icon';
    $title = get_string('tabicon', 'theme_edutor');
    $description = get_string('tabicondesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    

    // Pane 6 Title
    $name = 'theme_edutor/pane6title';
    $title = get_string('panetitle', 'theme_edutor');
    $description = get_string('panetitledesc', 'theme_edutor');
    $default = 'Pane Six Heading';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Pane 6 Intro
    $name = 'theme_edutor/pane6intro';
    $title = get_string('paneintro', 'theme_edutor');
    $description = get_string('paneintrodesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    //Enable Pane 6 Blocks
    $name = 'theme_edutor/usepane6blocks';
    $title = get_string('usepane6blocks', 'theme_edutor');
    $description = get_string('usepaneblocksdesc', 'theme_edutor');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Pane 6 Block 1 */	
    $name = 'theme_edutor/pane6block1info';
    $heading = get_string('pane6block1info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane6block1title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block1image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane6block1image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block1content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane6block1url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane6block1urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block1label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block1price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Pane 6 Block 2 */	
    $name = 'theme_edutor/pane6block2info';
    $heading = get_string('pane6block2info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane6block2title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block2image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane6block2image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block2content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane6block2url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane6block2urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block2label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block2price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* Pane 6 Block 3 */	
    $name = 'theme_edutor/pane6block3info';
    $heading = get_string('pane6block3info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane6block3title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block3image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane6block3image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block3content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane6block3url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane6block3urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block3label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block3price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    
     /* Pane 6 Block 4 */	
    $name = 'theme_edutor/pane6block4info';
    $heading = get_string('pane6block4info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane6block4title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block4image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane6block4image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block4content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane6block4url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane6block4urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block4label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block4price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     /* Pane 6 Block 5 */	
    $name = 'theme_edutor/pane6block5info';
    $heading = get_string('pane6block5info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane6block5title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block5image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane6block5image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block5content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane6block5url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane6block5urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block5label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block5price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     /* Pane 6 Block 6 */	
    $name = 'theme_edutor/pane6block6info';
    $heading = get_string('pane6block6info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane6block6title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block6image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane6block6image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block6content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane6block6url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane6block6urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block6label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block6price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     /* Pane 6 Block 7 */	
    $name = 'theme_edutor/pane6block7info';
    $heading = get_string('pane6block7info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane6block7title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block7image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane6block7image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block7content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane6block7url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane6block7urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block7label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block7price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     /* Pane 6 Block 8 */	
    $name = 'theme_edutor/pane6block8info';
    $heading = get_string('pane6block8info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane6block8title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block8image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane6block8image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block8content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane6block8url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane6block8urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block8label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block8price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
     /* Pane 6 Block 9 */	
    $name = 'theme_edutor/pane6block9info';
    $heading = get_string('pane6block9info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane6block9title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block9image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane6block9image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block9content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane6block9url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane6block9urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block9label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block9price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     /* Pane 6 Block 10 */	
    $name = 'theme_edutor/pane6block10info';
    $heading = get_string('pane6block10info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane6block10title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block10image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane6block10image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block10content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane6block10url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane6block10urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block10label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane6block10price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);    
    
    
    
    // Add the page
    $settings->add($page);
    
    //$ADMIN->add('theme_edutor', $page);
