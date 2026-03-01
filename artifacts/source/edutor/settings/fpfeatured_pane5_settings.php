<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
	/* Heading */
	$page = new admin_settingpage('theme_edutor_fpfeatured_pane5', get_string('fpfeaturedpane5heading', 'theme_edutor'));
	
       
    // Featured Panes

     /* Pane 5 */
    $name = 'theme_edutor/pane5info';
    $heading = get_string('pane5info', 'theme_edutor');
    $information = get_string('paneinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    
    // Pane 5 Tab (Nav)
    $name = 'theme_edutor/tab5name';
    $title = get_string('tabname', 'theme_edutor');
    $description = get_string('tabnamedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    $name = 'theme_edutor/tab5icon';
    $title = get_string('tabicon', 'theme_edutor');
    $description = get_string('tabicondesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    

    // Pane 5 Title
    $name = 'theme_edutor/pane5title';
    $title = get_string('panetitle', 'theme_edutor');
    $description = get_string('panetitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Pane 5 Intro
    $name = 'theme_edutor/pane5intro';
    $title = get_string('paneintro', 'theme_edutor');
    $description = get_string('paneintrodesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    //Enable Pane 5 Blocks
    $name = 'theme_edutor/usepane5blocks';
    $title = get_string('usepane5blocks', 'theme_edutor');
    $description = get_string('usepaneblocksdesc', 'theme_edutor');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Pane 5 Block 1 */	
    $name = 'theme_edutor/pane5block1info';
    $heading = get_string('pane5block1info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane5block1title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block1image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane5block1image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block1content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane5block1url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane5block1urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block1label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block1price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Pane 5 Block 2 */	
    $name = 'theme_edutor/pane5block2info';
    $heading = get_string('pane5block2info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane5block2title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block2image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane5block2image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block2content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane5block2url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane5block2urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block2label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block2price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* Pane 5 Block 3 */	
    $name = 'theme_edutor/pane5block3info';
    $heading = get_string('pane5block3info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane5block3title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block3image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane5block3image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block3content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane5block3url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane5block3urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block3label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block3price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    
     /* Pane 5 Block 4 */	
    $name = 'theme_edutor/pane5block4info';
    $heading = get_string('pane5block4info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane5block4title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block4image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane5block4image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block4content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane5block4url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane5block4urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block4label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block4price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     /* Pane 5 Block 5 */	
    $name = 'theme_edutor/pane5block5info';
    $heading = get_string('pane5block5info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane5block5title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block5image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane5block5image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block5content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane5block5url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane5block5urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block5label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block5price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     /* Pane 5 Block 6 */	
    $name = 'theme_edutor/pane5block6info';
    $heading = get_string('pane5block6info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane5block6title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block6image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane5block6image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block6content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane5block6url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane5block6urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block6label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block6price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     /* Pane 5 Block 7 */	
    $name = 'theme_edutor/pane5block7info';
    $heading = get_string('pane5block7info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane5block7title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block7image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane5block7image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block7content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane5block7url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane5block7urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block7label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block7price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     /* Pane 5 Block 8 */	
    $name = 'theme_edutor/pane5block8info';
    $heading = get_string('pane5block8info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane5block8title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block8image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane5block8image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block8content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane5block8url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane5block8urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block8label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block8price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
     /* Pane 5 Block 9 */	
    $name = 'theme_edutor/pane5block9info';
    $heading = get_string('pane5block9info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane5block9title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block9image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane5block9image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block9content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane5block9url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane5block9urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block9label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block9price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     /* Pane 5 Block 10 */	
    $name = 'theme_edutor/pane5block10info';
    $heading = get_string('pane5block10info', 'theme_edutor');
    $information = get_string('paneblockinfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/pane5block10title';
    $title = get_string('paneblocktitle', 'theme_edutor');
    $description = get_string('paneblocktitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block10image';
    $title = get_string('paneblockimage', 'theme_edutor');
    $description = get_string('paneblockimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pane5block10image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block10content';
    $title = get_string('paneblockcontent', 'theme_edutor');
    $description = get_string('paneblockcontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/pane5block10url';
    $title = get_string('paneblockurl', 'theme_edutor');
    $description = get_string('paneblockbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/pane5block10urlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block10label';
    $title = get_string('paneblocklabel', 'theme_edutor');
    $description = get_string('paneblocklabeldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/pane5block10price';
    $title = get_string('paneblockprice', 'theme_edutor');
    $description = get_string('paneblockpricedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);    
    
    
    
    // Add the page
    $settings->add($page);
    
    //$ADMIN->add('theme_edutor', $page);
