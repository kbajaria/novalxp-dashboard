<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
	/* Heading */
	$page = new admin_settingpage('theme_edutor_fpfeatured_pane4', get_string('fpfeaturedpane4heading', 'theme_edutor'));
	
       
    // Featured Panes
    
    
     /* Pane 4 */
    $name = 'theme_edutor/pane4info';
    $heading = get_string('pane4info', 'theme_edutor');
    $information = get_string('paneinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    
    // Pane 4 Tab (Nav)
    $name = 'theme_edutor/tab4name';
    $title = get_string('tabname', 'theme_edutor');
    $description = get_string('tabnamedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    $name = 'theme_edutor/tab4icon';
    $title = get_string('tabicon', 'theme_edutor');
    $description = get_string('tabicondesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    

    // Pane 4 Title
    $name = 'theme_edutor/pane4title';
    $title = get_string('panetitle', 'theme_edutor');
    $description = get_string('panetitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Pane 4 Intro
    $name = 'theme_edutor/pane4intro';
    $title = get_string('paneintro', 'theme_edutor');
    $description = get_string('paneintrodesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    //Enable Pane 4 Blocks
    $name = 'theme_edutor/usepane4blocks';
    $title = get_string('usepane4blocks', 'theme_edutor');
    $description = get_string('usepaneblocksdesc', 'theme_edutor');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Pane 4 Block 1 */	
    $name = 'theme_edutor/pane4block1info';
    $heading = get_string('pane4block1info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane4block1title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block1image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane4block1image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block1content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane4block1url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane4block1urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block1label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block1price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Pane 4 Block 2 */	
    $name = 'theme_edutor/pane4block2info';
    $heading = get_string('pane4block2info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane4block2title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block2image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane4block2image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block2content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane4block2url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane4block2urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block2label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block2price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* Pane 4 Block 3 */	
    $name = 'theme_edutor/pane4block3info';
    $heading = get_string('pane4block3info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane4block3title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block3image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane4block3image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block3content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane4block3url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane4block3urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block3label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block3price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    
     /* Pane 4 Block 4 */	
    $name = 'theme_edutor/pane4block4info';
    $heading = get_string('pane4block4info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane4block4title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block4image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane4block4image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block4content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane4block4url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane4block4urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block4label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block4price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     /* Pane 4 Block 5 */	
    $name = 'theme_edutor/pane4block5info';
    $heading = get_string('pane4block5info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane4block5title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block5image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane4block5image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block5content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane4block5url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane4block5urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block5label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block5price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     /* Pane 4 Block 6 */	
    $name = 'theme_edutor/pane4block6info';
    $heading = get_string('pane4block6info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane4block6title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block6image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane4block6image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block6content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane4block6url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane4block6urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block6label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block6price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     /* Pane 4 Block 7 */	
    $name = 'theme_edutor/pane4block7info';
    $heading = get_string('pane4block7info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane4block7title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block7image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane4block7image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block7content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane4block7url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane4block7urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block7label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block7price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     /* Pane 4 Block 8 */	
    $name = 'theme_edutor/pane4block8info';
    $heading = get_string('pane4block8info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane4block8title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block8image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane4block8image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block8content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane4block8url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane4block8urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block8label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block8price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
     /* Pane 4 Block 9 */	
    $name = 'theme_edutor/pane4block9info';
    $heading = get_string('pane4block9info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane4block9title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block9image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane4block9image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block9content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane4block9url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane4block9urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block9label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block9price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     /* Pane 4 Block 10 */	
    $name = 'theme_edutor/pane4block10info';
    $heading = get_string('pane4block10info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane4block10title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block10image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane4block10image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block10content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane4block10url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane4block10urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block10label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane4block10price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    
    // Add the page
    $settings->add($page);
    
    //$ADMIN->add('theme_edutor', $page);
