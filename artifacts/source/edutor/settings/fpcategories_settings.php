<?php 
	
	
	defined('MOODLE_INTERNAL') || die();
	
    /* Frontpage Featured Blocks */	
	$page = new admin_settingpage('theme_edutor_categories', get_string('categoriesheading', 'theme_edutor'));
	$page->add(new admin_setting_heading('theme_edutor_categoriesheadingsub', get_string('categoriesheadingsub', 'theme_edutor'),
            format_text(get_string('categoriesheadingsubdesc' , 'theme_edutor'), FORMAT_MARKDOWN)));
            
            
	//Enable Categories Section
    $name = 'theme_edutor/usecategories';
    $title = get_string('usecategories', 'theme_edutor');
    $description = get_string('usecategoriesdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Categories Section Title
    $name = 'theme_edutor/categoriessectiontitle';
    $title = get_string('categoriessectiontitle', 'theme_edutor');
    $description = get_string('categoriessectiontitledesc', 'theme_edutor');
    $default = 'Top Categories';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* Category block display  -  display on large devices (desktops, 992px and up) */
    $name = 'theme_edutor/catblockwidth_lg';
    $title = get_string('catblockwidth_lg', 'theme_edutor');
    $description = get_string('catblockwidth_lg_desc', 'theme_edutor');
    $default = '20%';
	$choices = array(		
		    '32%' => 'Max 3 blocks per row',   
		    '25%' => 'Max 4 blocks per row',
		    '20%' => 'Max 5 blocks per row (default)',
		    '16%' => 'Max 6 blocks per row',
	    );
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$page->add($setting);
	
	
	/* Category icon image max width  */
    $name = 'theme_edutor/caticonwidthlimit';
    $title = get_string('caticonwidthlimit', 'theme_edutor');
    $description = get_string('caticonwidthlimitdesc', 'theme_edutor');
    $default = '40px';
	$choices = array(		
		    '40px' => 'Max 40px (default)',   
		    '60px' => 'Max 60px',
		    '80px' => 'Max 80px',
		    '100px' => 'Max 100px',
		    '120px' => 'Max 120px',
		    '140px' => 'Max 140px',
		    '160px' => 'Max 160px',
		    '180px' => 'Max 180px',
		    '200px' => 'Max 200px',
	    );
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$page->add($setting);
    
    
    
    // Categories Section CTA Button Info
    $name = 'theme_edutor/categoriesbuttoninfo';
    $heading = get_string('categoriesbuttoninfo', 'theme_edutor');
    $information = get_string('categoriesbuttoninfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    
    // Categories Section CTA Button Text
    $name = 'theme_edutor/categoriesbuttontext';
    $title = get_string('categoriesbuttontext', 'theme_edutor');
    $description = get_string('categoriesbuttontextdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Categories Section CTA Button URL
    $name = 'theme_edutor/categoriesbuttonurl';
    $title = get_string('categoriesbuttonurl', 'theme_edutor');
    $description = get_string('categoriesbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/categoriesbuttonurlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    
	
    

	/* Category 1 */	
    $name = 'theme_edutor/category1info';
    $heading = get_string('category1info', 'theme_edutor');
    $information = get_string('category1desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
	
	$name = 'theme_edutor/category1title';
    $title = get_string('categorytitle', 'theme_edutor');
    $description = get_string('categorytitledesc', 'theme_edutor');
    $default = 'Category One';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category1image';
    $title = get_string('categoryimage', 'theme_edutor');
    $description = get_string('categoryimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'category1image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    $name = 'theme_edutor/category1content';
    $title = get_string('categorycontent', 'theme_edutor');
    $description = get_string('categorycontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    $name = 'theme_edutor/category1url';
    $title = get_string('categoryurl', 'theme_edutor');
    $description = get_string('categorybuttonurldesc', 'theme_edutor');
    $default = '#link1';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    

    
    /* Category 2 */    
    $name = 'theme_edutor/category2info';
    $heading = get_string('category2info', 'theme_edutor');
    $information = get_string('category2desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);   
    
	$name = 'theme_edutor/category2title';
    $title = get_string('categorytitle', 'theme_edutor');
    $description = get_string('categorytitledesc', 'theme_edutor');
    $default = 'Category Two';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category2image';
    $title = get_string('categoryimage', 'theme_edutor');
    $description = get_string('categoryimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'category2image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category2content';
    $title = get_string('categorycontent', 'theme_edutor');
    $description = get_string('categorycontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category2url';
    $title = get_string('categoryurl', 'theme_edutor');
    $description = get_string('categorybuttonurldesc', 'theme_edutor');
    $default = '#link2';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    
    /* Category 3 */        
    $name = 'theme_edutor/category3info';
    $heading = get_string('category3info', 'theme_edutor');
    $information = get_string('category3desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
	$name = 'theme_edutor/category3title';
    $title = get_string('categorytitle', 'theme_edutor');
    $description = get_string('categorytitledesc', 'theme_edutor');
    $default = 'Category Three';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category3image';
    $title = get_string('categoryimage', 'theme_edutor');
    $description = get_string('categoryimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'category3image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category3content';
    $title = get_string('categorycontent', 'theme_edutor');
    $description = get_string('categorycontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category3url';
    $title = get_string('categoryurl', 'theme_edutor');
    $description = get_string('categorybuttonurldesc', 'theme_edutor');
    $default = '#link3';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    

    /* Category 4 */    
    $name = 'theme_edutor/category4info';
    $heading = get_string('category4info', 'theme_edutor');
    $information = get_string('category4desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
	$name = 'theme_edutor/category4title';
    $title = get_string('categorytitle', 'theme_edutor');
    $description = get_string('categorytitledesc', 'theme_edutor');
    $default = 'Category Four';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category4image';
    $title = get_string('categoryimage', 'theme_edutor');
    $description = get_string('categoryimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'category4image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category4content';
    $title = get_string('categorycontent', 'theme_edutor');
    $description = get_string('categorycontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category4url';
    $title = get_string('categoryurl', 'theme_edutor');
    $description = get_string('categorybuttonurldesc', 'theme_edutor');
    $default = '#link4';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* Category 5 */    
    $name = 'theme_edutor/category5info';
    $heading = get_string('category5info', 'theme_edutor');
    $information = get_string('category5desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
	$name = 'theme_edutor/category5title';
    $title = get_string('categorytitle', 'theme_edutor');
    $description = get_string('categorytitledesc', 'theme_edutor');
    $default = 'Category Five';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category5image';
    $title = get_string('categoryimage', 'theme_edutor');
    $description = get_string('categoryimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'category5image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category5content';
    $title = get_string('categorycontent', 'theme_edutor');
    $description = get_string('categorycontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category5url';
    $title = get_string('categoryurl', 'theme_edutor');
    $description = get_string('categorybuttonurldesc', 'theme_edutor');
    $default = '#link5';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);    
    
    
    /* Category 6 */   
    $name = 'theme_edutor/category6info';
    $heading = get_string('category6info', 'theme_edutor');
    $information = get_string('category6desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
     
	$name = 'theme_edutor/category6title';
    $title = get_string('categorytitle', 'theme_edutor');
    $description = get_string('categorytitledesc', 'theme_edutor');
    $default = 'Category Six';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category6image';
    $title = get_string('categoryimage', 'theme_edutor');
    $description = get_string('categoryimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'category6image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category6content';
    $title = get_string('categorycontent', 'theme_edutor');
    $description = get_string('categorycontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category6url';
    $title = get_string('categoryurl', 'theme_edutor');
    $description = get_string('categorybuttonurldesc', 'theme_edutor');
    $default = '#link6';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);    
    
    
    /* Category 7 */   
    $name = 'theme_edutor/category7info';
    $heading = get_string('category7info', 'theme_edutor');
    $information = get_string('category7desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
     
	$name = 'theme_edutor/category7title';
    $title = get_string('categorytitle', 'theme_edutor');
    $description = get_string('categorytitledesc', 'theme_edutor');
    $default = 'Category Seven';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category7image';
    $title = get_string('categoryimage', 'theme_edutor');
    $description = get_string('categoryimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'category7image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category7content';
    $title = get_string('categorycontent', 'theme_edutor');
    $description = get_string('categorycontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category7url';
    $title = get_string('categoryurl', 'theme_edutor');
    $description = get_string('categorybuttonurldesc', 'theme_edutor');
    $default = '#link7';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);    
    
    
    /* Category 8 */ 
    $name = 'theme_edutor/category8info';
    $heading = get_string('category8info', 'theme_edutor');
    $information = get_string('category8desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
       
	$name = 'theme_edutor/category8title';
    $title = get_string('categorytitle', 'theme_edutor');
    $description = get_string('categorytitledesc', 'theme_edutor');
    $default = 'Category Eight';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category8image';
    $title = get_string('categoryimage', 'theme_edutor');
    $description = get_string('categoryimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'category8image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category8content';
    $title = get_string('categorycontent', 'theme_edutor');
    $description = get_string('categorycontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category8url';
    $title = get_string('categoryurl', 'theme_edutor');
    $description = get_string('categorybuttonurldesc', 'theme_edutor');
    $default = '#link8';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);    
    
    
    
     /* Category 9 */ 
     $name = 'theme_edutor/category9info';
    $heading = get_string('category9info', 'theme_edutor');
    $information = get_string('category9desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
       
	$name = 'theme_edutor/category9title';
    $title = get_string('categorytitle', 'theme_edutor');
    $description = get_string('categorytitledesc', 'theme_edutor');
    $default = 'Category Nine';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category9image';
    $title = get_string('categoryimage', 'theme_edutor');
    $description = get_string('categoryimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'category9image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category9content';
    $title = get_string('categorycontent', 'theme_edutor');
    $description = get_string('categorycontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category9url';
    $title = get_string('categoryurl', 'theme_edutor');
    $description = get_string('categorybuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);    
    
     
     /* Category 10 */ 
     $name = 'theme_edutor/category10info';
    $heading = get_string('category10info', 'theme_edutor');
    $information = get_string('category10desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
       
	$name = 'theme_edutor/category10title';
    $title = get_string('categorytitle', 'theme_edutor');
    $description = get_string('categorytitledesc', 'theme_edutor');
    $default = 'Category Ten';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category10image';
    $title = get_string('categoryimage', 'theme_edutor');
    $description = get_string('categoryimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'category10image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category10content';
    $title = get_string('categorycontent', 'theme_edutor');
    $description = get_string('categorycontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category10url';
    $title = get_string('categoryurl', 'theme_edutor');
    $description = get_string('categorybuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);    
    
     
     /* Category 11 */
     $name = 'theme_edutor/category11info';
    $heading = get_string('category11info', 'theme_edutor');
    $information = get_string('category11desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
       
	$name = 'theme_edutor/category11title';
    $title = get_string('categorytitle', 'theme_edutor');
    $description = get_string('categorytitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category11image';
    $title = get_string('categoryimage', 'theme_edutor');
    $description = get_string('categoryimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'category11image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category11content';
    $title = get_string('categorycontent', 'theme_edutor');
    $description = get_string('categorycontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category11url';
    $title = get_string('categoryurl', 'theme_edutor');
    $description = get_string('categorybuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);    
    
     
    /* Category 12 */
    $name = 'theme_edutor/category12info';
    $heading = get_string('category12info', 'theme_edutor');
    $information = get_string('category12desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
       
	$name = 'theme_edutor/category12title';
    $title = get_string('categorytitle', 'theme_edutor');
    $description = get_string('categorytitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category12image';
    $title = get_string('categoryimage', 'theme_edutor');
    $description = get_string('categoryimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'category12image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category12content';
    $title = get_string('categorycontent', 'theme_edutor');
    $description = get_string('categorycontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category12url';
    $title = get_string('categoryurl', 'theme_edutor');
    $description = get_string('categorybuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);    
    
    /* Category 13 */
    $name = 'theme_edutor/category13info';
    $heading = get_string('category13info', 'theme_edutor');
    $information = get_string('category13desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
       
	$name = 'theme_edutor/category13title';
    $title = get_string('categorytitle', 'theme_edutor');
    $description = get_string('categorytitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category13image';
    $title = get_string('categoryimage', 'theme_edutor');
    $description = get_string('categoryimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'category13image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category13content';
    $title = get_string('categorycontent', 'theme_edutor');
    $description = get_string('categorycontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category13url';
    $title = get_string('categoryurl', 'theme_edutor');
    $description = get_string('categorybuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);  
    
    /* Category 14 */
    $name = 'theme_edutor/category14info';
    $heading = get_string('category14info', 'theme_edutor');
    $information = get_string('category14desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
       
	$name = 'theme_edutor/category14title';
    $title = get_string('categorytitle', 'theme_edutor');
    $description = get_string('categorytitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category14image';
    $title = get_string('categoryimage', 'theme_edutor');
    $description = get_string('categoryimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'category14image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category14content';
    $title = get_string('categorycontent', 'theme_edutor');
    $description = get_string('categorycontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category14url';
    $title = get_string('categoryurl', 'theme_edutor');
    $description = get_string('categorybuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting); 
    
    
    /* Category 15 */
    $name = 'theme_edutor/category15info';
    $heading = get_string('category15info', 'theme_edutor');
    $information = get_string('category15desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
       
	$name = 'theme_edutor/category15title';
    $title = get_string('categorytitle', 'theme_edutor');
    $description = get_string('categorytitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category15image';
    $title = get_string('categoryimage', 'theme_edutor');
    $description = get_string('categoryimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'category15image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category15content';
    $title = get_string('categorycontent', 'theme_edutor');
    $description = get_string('categorycontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category15url';
    $title = get_string('categoryurl', 'theme_edutor');
    $description = get_string('categorybuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);  
    
    
    /* Category 16 */
    $name = 'theme_edutor/category16info';
    $heading = get_string('category16info', 'theme_edutor');
    $information = get_string('category16desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
       
	$name = 'theme_edutor/category16title';
    $title = get_string('categorytitle', 'theme_edutor');
    $description = get_string('categorytitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category16image';
    $title = get_string('categoryimage', 'theme_edutor');
    $description = get_string('categoryimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'category16image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category16content';
    $title = get_string('categorycontent', 'theme_edutor');
    $description = get_string('categorycontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category16url';
    $title = get_string('categoryurl', 'theme_edutor');
    $description = get_string('categorybuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);  
    
    /* Category 17 */
    $name = 'theme_edutor/category17info';
    $heading = get_string('category17info', 'theme_edutor');
    $information = get_string('category17desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
       
	$name = 'theme_edutor/category17title';
    $title = get_string('categorytitle', 'theme_edutor');
    $description = get_string('categorytitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category17image';
    $title = get_string('categoryimage', 'theme_edutor');
    $description = get_string('categoryimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'category17image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category17content';
    $title = get_string('categorycontent', 'theme_edutor');
    $description = get_string('categorycontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category17url';
    $title = get_string('categoryurl', 'theme_edutor');
    $description = get_string('categorybuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);  
    
    /* Category 18 */
    $name = 'theme_edutor/category18info';
    $heading = get_string('category18info', 'theme_edutor');
    $information = get_string('category18desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
       
	$name = 'theme_edutor/category18title';
    $title = get_string('categorytitle', 'theme_edutor');
    $description = get_string('categorytitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category18image';
    $title = get_string('categoryimage', 'theme_edutor');
    $description = get_string('categoryimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'category18image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category18content';
    $title = get_string('categorycontent', 'theme_edutor');
    $description = get_string('categorycontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category18url';
    $title = get_string('categoryurl', 'theme_edutor');
    $description = get_string('categorybuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);  
    
    /* Category 19 */
    $name = 'theme_edutor/category19info';
    $heading = get_string('category19info', 'theme_edutor');
    $information = get_string('category19desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
       
	$name = 'theme_edutor/category19title';
    $title = get_string('categorytitle', 'theme_edutor');
    $description = get_string('categorytitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category19image';
    $title = get_string('categoryimage', 'theme_edutor');
    $description = get_string('categoryimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'category19image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category19content';
    $title = get_string('categorycontent', 'theme_edutor');
    $description = get_string('categorycontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category19url';
    $title = get_string('categoryurl', 'theme_edutor');
    $description = get_string('categorybuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);  
    
    
    /* Category 20 */
    $name = 'theme_edutor/category20info';
    $heading = get_string('category20info', 'theme_edutor');
    $information = get_string('category20desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
       
	$name = 'theme_edutor/category20title';
    $title = get_string('categorytitle', 'theme_edutor');
    $description = get_string('categorytitledesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category20image';
    $title = get_string('categoryimage', 'theme_edutor');
    $description = get_string('categoryimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'category20image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category20content';
    $title = get_string('categorycontent', 'theme_edutor');
    $description = get_string('categorycontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    $name = 'theme_edutor/category20url';
    $title = get_string('categoryurl', 'theme_edutor');
    $description = get_string('categorybuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting); 

    
    // Add the page
    $settings->add($page);
    
    //$ADMIN->add('theme_edutor', $page);