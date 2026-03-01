<?php
	
	defined('MOODLE_INTERNAL') || die();
	
    /* Frontpage Teachers */
   
	$page = new admin_settingpage('theme_edutor_teachers', get_string('teachersheading', 'theme_edutor'));
	$page->add(new admin_setting_heading('theme_edutor_teachersheadingsub', get_string('teachersheadingsub', 'theme_edutor'),
            format_text(get_string('teachersheadingsubdesc' , 'theme_edutor'), FORMAT_MARKDOWN)));
    
    // Enable Teachers Section
    $name = 'theme_edutor/useteachers';
    $title = get_string('useteachers', 'theme_edutor');
    $description = get_string('useteachersdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Teachers Section Title
    $name = 'theme_edutor/teachersectiontitle';
    $title = get_string('teachersectiontitle', 'theme_edutor');
    $description = get_string('teachersectiontitledesc', 'theme_edutor');
    $default = 'Learn From The Best';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
     // Teachers Section Intro
    $name = 'theme_edutor/teachersectionintro';
    $title = get_string('teachersectionintro', 'theme_edutor');
    $description = get_string('teachersectionintrodesc', 'theme_edutor');
    $default = '<p>Section intro goes here. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Teachers Section CTA Button Info
    $name = 'theme_edutor/teachersbuttoninfo';
    $heading = get_string('teachersbuttoninfo', 'theme_edutor');
    $information = get_string('teachersbuttoninfodesc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Teachers Section CTA Button Text
    $name = 'theme_edutor/teachersbuttontext';
    $title = get_string('teachersbuttontext', 'theme_edutor');
    $description = get_string('teachersbuttontextdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teachers Section CTA Button URL
    $name = 'theme_edutor/teachersbuttonurl';
    $title = get_string('teachersbuttonurl', 'theme_edutor');
    $description = get_string('teachersbuttonurldesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // URL open in new window    
    $name = 'theme_edutor/teachersbuttonurlopennew';
    $title = get_string('opennew', 'theme_edutor');
    $description = get_string('opennewdesc', 'theme_edutor');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Teachers Section Background Colour
    // We use an empty default value because the default colour should come from the preset.
    $name = 'theme_edutor/teacherssectionbgcolor';
    $title = get_string('teacherssectionbgcolor', 'theme_edutor');
    $description = get_string('teacherssectionbgcolordesc', 'theme_edutor');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
       
    
    /* Teacher 1 */
    
    // Description for Teacher 1
    $name = 'theme_edutor/teacher1info';
    $heading = get_string('teacher1', 'theme_edutor');
    $information = get_string('teacher1desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Teacher Image 
    $name = 'theme_edutor/teacher1image';
    $title = get_string('teacherimage', 'theme_edutor');
    $description = get_string('teacherimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'teacher1image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Name
    $name = 'theme_edutor/teacher1name';
    $title = get_string('teachername', 'theme_edutor');
    $description = get_string('teachernamedesc', 'theme_edutor');
    $default = 'Name One';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Profile Meta
    $name = 'theme_edutor/teacher1meta';
    $title = get_string('teachermeta', 'theme_edutor');
    $description = get_string('teachermetadesc', 'theme_edutor');
    $default = 'Teacher 1 meta info';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Content 
    $name = 'theme_edutor/teacher1content';
    $title = get_string('teachercontent', 'theme_edutor');
    $description = get_string('teachercontentdesc', 'theme_edutor');
    $default = '<p>Teacher bio 1 goes here. You can add up to 20 teachers. Lorem ipsum dolor sit amet consectetur adipiscing elit. Integer suscipit, elit sed placerat aliquam, velit nulla semper lectus.</p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Teacher 2 */
    
    // Description for Teacher 2
    $name = 'theme_edutor/teacher2info';
    $heading = get_string('teacher2', 'theme_edutor');
    $information = get_string('teacher2desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Teacher Image 
    $name = 'theme_edutor/teacher2image';
    $title = get_string('teacherimage', 'theme_edutor');
    $description = get_string('teacherimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'teacher2image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Name
    $name = 'theme_edutor/teacher2name';
    $title = get_string('teachername', 'theme_edutor');
    $description = get_string('teachernamedesc', 'theme_edutor');
    $default = 'Name Two';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Profile Meta
    $name = 'theme_edutor/teacher2meta';
    $title = get_string('teachermeta', 'theme_edutor');
    $description = get_string('teachermetadesc', 'theme_edutor');
    $default = 'Teacher 2 meta info';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Content 
    $name = 'theme_edutor/teacher2content';
    $title = get_string('teachercontent', 'theme_edutor');
    $description = get_string('teachercontentdesc', 'theme_edutor');
    $default = '<p>Teacher bio 2 goes here. You can add up to 20 teachers. Lorem ipsum dolor sit amet consectetur adipiscing elit. Integer suscipit, elit sed placerat aliquam, velit nulla semper lectus.</p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Teacher 3 */
    
    // Description for Teacher 3
    $name = 'theme_edutor/teacher3info';
    $heading = get_string('teacher3', 'theme_edutor');
    $information = get_string('teacher3desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Teacher Image 
    $name = 'theme_edutor/teacher3image';
    $title = get_string('teacherimage', 'theme_edutor');
    $description = get_string('teacherimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'teacher3image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Name
    $name = 'theme_edutor/teacher3name';
    $title = get_string('teachername', 'theme_edutor');
    $description = get_string('teachernamedesc', 'theme_edutor');
    $default = 'Name Three';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Profile Meta
    $name = 'theme_edutor/teacher3meta';
    $title = get_string('teachermeta', 'theme_edutor');
    $description = get_string('teachermetadesc', 'theme_edutor');
    $default = 'Teacher 3 meta info';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Content 
    $name = 'theme_edutor/teacher3content';
    $title = get_string('teachercontent', 'theme_edutor');
    $description = get_string('teachercontentdesc', 'theme_edutor');
    $default = '<p>Teacher bio 3 goes here. You can add up to 20 teachers. Lorem ipsum dolor sit amet consectetur adipiscing elit. Integer suscipit, elit sed placerat aliquam, velit nulla semper lectus.</p>';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* Teacher 4 */
    
    // Description for Teacher 4
    $name = 'theme_edutor/teacher4info';
    $heading = get_string('teacher4', 'theme_edutor');
    $information = get_string('teacher4desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Teacher Image 
    $name = 'theme_edutor/teacher4image';
    $title = get_string('teacherimage', 'theme_edutor');
    $description = get_string('teacherimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'teacher4image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Name
    $name = 'theme_edutor/teacher4name';
    $title = get_string('teachername', 'theme_edutor');
    $description = get_string('teachernamedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Profile Meta
    $name = 'theme_edutor/teacher4meta';
    $title = get_string('teachermeta', 'theme_edutor');
    $description = get_string('teachermetadesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Content 
    $name = 'theme_edutor/teacher4content';
    $title = get_string('teachercontent', 'theme_edutor');
    $description = get_string('teachercontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* Teacher 5 */
    
    // Description for Teacher 5
    $name = 'theme_edutor/teacher5info';
    $heading = get_string('teacher5', 'theme_edutor');
    $information = get_string('teacher5desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Teacher Image 
    $name = 'theme_edutor/teacher5image';
    $title = get_string('teacherimage', 'theme_edutor');
    $description = get_string('teacherimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'teacher5image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Name
    $name = 'theme_edutor/teacher5name';
    $title = get_string('teachername', 'theme_edutor');
    $description = get_string('teachernamedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Profile Meta
    $name = 'theme_edutor/teacher5meta';
    $title = get_string('teachermeta', 'theme_edutor');
    $description = get_string('teachermetadesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Content 
    $name = 'theme_edutor/teacher5content';
    $title = get_string('teachercontent', 'theme_edutor');
    $description = get_string('teachercontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* Teacher 6 */
    
    // Description for Teacher 6
    $name = 'theme_edutor/teacher6info';
    $heading = get_string('teacher6', 'theme_edutor');
    $information = get_string('teacher6desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Teacher Image 
    $name = 'theme_edutor/teacher6image';
    $title = get_string('teacherimage', 'theme_edutor');
    $description = get_string('teacherimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'teacher6image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Name
    $name = 'theme_edutor/teacher6name';
    $title = get_string('teachername', 'theme_edutor');
    $description = get_string('teachernamedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Profile Meta
    $name = 'theme_edutor/teacher6meta';
    $title = get_string('teachermeta', 'theme_edutor');
    $description = get_string('teachermetadesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Content 
    $name = 'theme_edutor/teacher6content';
    $title = get_string('teachercontent', 'theme_edutor');
    $description = get_string('teachercontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* Teacher 7 */
    
    // Description for Teacher 7
    $name = 'theme_edutor/teacher7info';
    $heading = get_string('teacher7', 'theme_edutor');
    $information = get_string('teacher7desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Teacher Image 
    $name = 'theme_edutor/teacher7image';
    $title = get_string('teacherimage', 'theme_edutor');
    $description = get_string('teacherimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'teacher7image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Name
    $name = 'theme_edutor/teacher7name';
    $title = get_string('teachername', 'theme_edutor');
    $description = get_string('teachernamedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Profile Meta
    $name = 'theme_edutor/teacher7meta';
    $title = get_string('teachermeta', 'theme_edutor');
    $description = get_string('teachermetadesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Content 
    $name = 'theme_edutor/teacher7content';
    $title = get_string('teachercontent', 'theme_edutor');
    $description = get_string('teachercontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* Teacher 8 */
    
    // Description for Teacher 8
    $name = 'theme_edutor/teacher8info';
    $heading = get_string('teacher8', 'theme_edutor');
    $information = get_string('teacher8desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Teacher Image 
    $name = 'theme_edutor/teacher8image';
    $title = get_string('teacherimage', 'theme_edutor');
    $description = get_string('teacherimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'teacher8image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Name
    $name = 'theme_edutor/teacher8name';
    $title = get_string('teachername', 'theme_edutor');
    $description = get_string('teachernamedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Profile Meta
    $name = 'theme_edutor/teacher8meta';
    $title = get_string('teachermeta', 'theme_edutor');
    $description = get_string('teachermetadesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Content 
    $name = 'theme_edutor/teacher8content';
    $title = get_string('teachercontent', 'theme_edutor');
    $description = get_string('teachercontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* Teacher 9 */
    
    // Description for Teacher 9
    $name = 'theme_edutor/teacher9info';
    $heading = get_string('teacher9', 'theme_edutor');
    $information = get_string('teacher9desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Teacher Image 
    $name = 'theme_edutor/teacher9image';
    $title = get_string('teacherimage', 'theme_edutor');
    $description = get_string('teacherimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'teacher9image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Name
    $name = 'theme_edutor/teacher9name';
    $title = get_string('teachername', 'theme_edutor');
    $description = get_string('teachernamedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Profile Meta
    $name = 'theme_edutor/teacher9meta';
    $title = get_string('teachermeta', 'theme_edutor');
    $description = get_string('teachermetadesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Content 
    $name = 'theme_edutor/teacher9content';
    $title = get_string('teachercontent', 'theme_edutor');
    $description = get_string('teachercontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Teacher 10 */
    
    // Description for Teacher 10
    $name = 'theme_edutor/teacher10info';
    $heading = get_string('teacher10', 'theme_edutor');
    $information = get_string('teacher10desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Teacher Image 
    $name = 'theme_edutor/teacher10image';
    $title = get_string('teacherimage', 'theme_edutor');
    $description = get_string('teacherimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'teacher10image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Name
    $name = 'theme_edutor/teacher10name';
    $title = get_string('teachername', 'theme_edutor');
    $description = get_string('teachernamedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Profile Meta
    $name = 'theme_edutor/teacher10meta';
    $title = get_string('teachermeta', 'theme_edutor');
    $description = get_string('teachermetadesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Content 
    $name = 'theme_edutor/teacher10content';
    $title = get_string('teachercontent', 'theme_edutor');
    $description = get_string('teachercontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    /* Teacher 11 */
    
    // Description for Teacher 11
    $name = 'theme_edutor/teacher11info';
    $heading = get_string('teacher11', 'theme_edutor');
    $information = get_string('teacher11desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Teacher Image 
    $name = 'theme_edutor/teacher11image';
    $title = get_string('teacherimage', 'theme_edutor');
    $description = get_string('teacherimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'teacher11image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Name
    $name = 'theme_edutor/teacher11name';
    $title = get_string('teachername', 'theme_edutor');
    $description = get_string('teachernamedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Profile Meta
    $name = 'theme_edutor/teacher11meta';
    $title = get_string('teachermeta', 'theme_edutor');
    $description = get_string('teachermetadesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Content 
    $name = 'theme_edutor/teacher11content';
    $title = get_string('teachercontent', 'theme_edutor');
    $description = get_string('teachercontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Teacher 12 */
    
    // Description for Teacher 12
    $name = 'theme_edutor/teacher12info';
    $heading = get_string('teacher12', 'theme_edutor');
    $information = get_string('teacher12desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Teacher Image 
    $name = 'theme_edutor/teacher12image';
    $title = get_string('teacherimage', 'theme_edutor');
    $description = get_string('teacherimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'teacher12image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Name
    $name = 'theme_edutor/teacher12name';
    $title = get_string('teachername', 'theme_edutor');
    $description = get_string('teachernamedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Profile Meta
    $name = 'theme_edutor/teacher12meta';
    $title = get_string('teachermeta', 'theme_edutor');
    $description = get_string('teachermetadesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Content 
    $name = 'theme_edutor/teacher12content';
    $title = get_string('teachercontent', 'theme_edutor');
    $description = get_string('teachercontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Teacher 13 */
    
    // Description for Teacher 13
    $name = 'theme_edutor/teacher13info';
    $heading = get_string('teacher13', 'theme_edutor');
    $information = get_string('teacher13desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Teacher Image 
    $name = 'theme_edutor/teacher13image';
    $title = get_string('teacherimage', 'theme_edutor');
    $description = get_string('teacherimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'teacher13image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Name
    $name = 'theme_edutor/teacher13name';
    $title = get_string('teachername', 'theme_edutor');
    $description = get_string('teachernamedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Profile Meta
    $name = 'theme_edutor/teacher13meta';
    $title = get_string('teachermeta', 'theme_edutor');
    $description = get_string('teachermetadesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Content 
    $name = 'theme_edutor/teacher13content';
    $title = get_string('teachercontent', 'theme_edutor');
    $description = get_string('teachercontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Teacher 14 */
    
    // Description for Teacher 14
    $name = 'theme_edutor/teacher14info';
    $heading = get_string('teacher14', 'theme_edutor');
    $information = get_string('teacher14desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Teacher Image 
    $name = 'theme_edutor/teacher14image';
    $title = get_string('teacherimage', 'theme_edutor');
    $description = get_string('teacherimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'teacher14image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Name
    $name = 'theme_edutor/teacher14name';
    $title = get_string('teachername', 'theme_edutor');
    $description = get_string('teachernamedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Profile Meta
    $name = 'theme_edutor/teacher14meta';
    $title = get_string('teachermeta', 'theme_edutor');
    $description = get_string('teachermetadesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Content 
    $name = 'theme_edutor/teacher14content';
    $title = get_string('teachercontent', 'theme_edutor');
    $description = get_string('teachercontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Teacher 15 */
    
    // Description for Teacher 15
    $name = 'theme_edutor/teacher15info';
    $heading = get_string('teacher15', 'theme_edutor');
    $information = get_string('teacher15desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Teacher Image 
    $name = 'theme_edutor/teacher15image';
    $title = get_string('teacherimage', 'theme_edutor');
    $description = get_string('teacherimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'teacher15image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Name
    $name = 'theme_edutor/teacher15name';
    $title = get_string('teachername', 'theme_edutor');
    $description = get_string('teachernamedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Profile Meta
    $name = 'theme_edutor/teacher15meta';
    $title = get_string('teachermeta', 'theme_edutor');
    $description = get_string('teachermetadesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Content 
    $name = 'theme_edutor/teacher15content';
    $title = get_string('teachercontent', 'theme_edutor');
    $description = get_string('teachercontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Teacher 16 */
    
    // Description for Teacher 16
    $name = 'theme_edutor/teacher16info';
    $heading = get_string('teacher16', 'theme_edutor');
    $information = get_string('teacher16desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Teacher Image 
    $name = 'theme_edutor/teacher16image';
    $title = get_string('teacherimage', 'theme_edutor');
    $description = get_string('teacherimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'teacher16image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Name
    $name = 'theme_edutor/teacher16name';
    $title = get_string('teachername', 'theme_edutor');
    $description = get_string('teachernamedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Profile Meta
    $name = 'theme_edutor/teacher16meta';
    $title = get_string('teachermeta', 'theme_edutor');
    $description = get_string('teachermetadesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Content 
    $name = 'theme_edutor/teacher16content';
    $title = get_string('teachercontent', 'theme_edutor');
    $description = get_string('teachercontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Teacher 17 */
    
    // Description for Teacher 17
    $name = 'theme_edutor/teacher17info';
    $heading = get_string('teacher17', 'theme_edutor');
    $information = get_string('teacher17desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Teacher Image 
    $name = 'theme_edutor/teacher17image';
    $title = get_string('teacherimage', 'theme_edutor');
    $description = get_string('teacherimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'teacher17image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Name
    $name = 'theme_edutor/teacher17name';
    $title = get_string('teachername', 'theme_edutor');
    $description = get_string('teachernamedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Profile Meta
    $name = 'theme_edutor/teacher17meta';
    $title = get_string('teachermeta', 'theme_edutor');
    $description = get_string('teachermetadesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Content 
    $name = 'theme_edutor/teacher17content';
    $title = get_string('teachercontent', 'theme_edutor');
    $description = get_string('teachercontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Teacher 18 */
    
    // Description for Teacher 18
    $name = 'theme_edutor/teacher18info';
    $heading = get_string('teacher18', 'theme_edutor');
    $information = get_string('teacher18desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Teacher Image 
    $name = 'theme_edutor/teacher18image';
    $title = get_string('teacherimage', 'theme_edutor');
    $description = get_string('teacherimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'teacher18image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Name
    $name = 'theme_edutor/teacher18name';
    $title = get_string('teachername', 'theme_edutor');
    $description = get_string('teachernamedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Profile Meta
    $name = 'theme_edutor/teacher18meta';
    $title = get_string('teachermeta', 'theme_edutor');
    $description = get_string('teachermetadesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Content 
    $name = 'theme_edutor/teacher18content';
    $title = get_string('teachercontent', 'theme_edutor');
    $description = get_string('teachercontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Teacher 19 */
    
    // Description for Teacher 19
    $name = 'theme_edutor/teacher19info';
    $heading = get_string('teacher19', 'theme_edutor');
    $information = get_string('teacher19desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Teacher Image 
    $name = 'theme_edutor/teacher19image';
    $title = get_string('teacherimage', 'theme_edutor');
    $description = get_string('teacherimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'teacher19image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Name
    $name = 'theme_edutor/teacher19name';
    $title = get_string('teachername', 'theme_edutor');
    $description = get_string('teachernamedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Profile Meta
    $name = 'theme_edutor/teacher19meta';
    $title = get_string('teachermeta', 'theme_edutor');
    $description = get_string('teachermetadesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Content 
    $name = 'theme_edutor/teacher19content';
    $title = get_string('teachercontent', 'theme_edutor');
    $description = get_string('teachercontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    /* Teacher 20 */
    
    // Description for Teacher 20
    $name = 'theme_edutor/teacher20info';
    $heading = get_string('teacher20', 'theme_edutor');
    $information = get_string('teacher20desc', 'theme_edutor');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);
    
    // Teacher Image 
    $name = 'theme_edutor/teacher20image';
    $title = get_string('teacherimage', 'theme_edutor');
    $description = get_string('teacherimagedesc', 'theme_edutor');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'teacher20image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Name
    $name = 'theme_edutor/teacher20name';
    $title = get_string('teachername', 'theme_edutor');
    $description = get_string('teachernamedesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Profile Meta
    $name = 'theme_edutor/teacher20meta';
    $title = get_string('teachermeta', 'theme_edutor');
    $description = get_string('teachermetadesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Teacher Content 
    $name = 'theme_edutor/teacher20content';
    $title = get_string('teachercontent', 'theme_edutor');
    $description = get_string('teachercontentdesc', 'theme_edutor');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    
    // Add the page
    $settings->add($page);
    
    //$ADMIN->add('theme_edutor', $page);