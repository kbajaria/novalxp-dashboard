<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

defined('MOODLE_INTERNAL') || die();


/**
 * Serves any files associated with the theme settings.
 *
 * @param stdClass $course
 * @param stdClass $cm
 * @param context $context
 * @param string $filearea
 * @param array $args
 * @param bool $forcedownload
 * @param array $options
 * @return bool
 */

function theme_edutor_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array()) {
    static $theme;
    if (empty($theme)) {
        $theme = theme_config::load('edutor');
    }
    if ($context->contextlevel == CONTEXT_SYSTEM && ($filearea === '')) {
        $theme = theme_config::load('edutor');
        return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
    } else if ($filearea === 'logo') {
        return $theme->setting_file_serve('logo', $args, $forcedownload, $options);
    } else if ($filearea === 'loginlogo') {
        return $theme->setting_file_serve('loginlogo', $args, $forcedownload, $options);
    } else if ($filearea === 'slide1image') {
        return $theme->setting_file_serve('slide1image', $args, $forcedownload, $options);
    } else if ($filearea === 'slide2image') {
        return $theme->setting_file_serve('slide2image', $args, $forcedownload, $options);
    } else if ($filearea === 'slide3image') {
        return $theme->setting_file_serve('slide3image', $args, $forcedownload, $options);
    } else if ($filearea === 'slide4image') {
        return $theme->setting_file_serve('slide4image', $args, $forcedownload, $options);
    } else if ($filearea === 'slide5image') {
        return $theme->setting_file_serve('slide5image', $args, $forcedownload, $options);
    } else if ($filearea === 'slide6image') {
        return $theme->setting_file_serve('slide6image', $args, $forcedownload, $options);
    } else if ($filearea === 'herologoimage') {
        return $theme->setting_file_serve('herologoimage', $args, $forcedownload, $options);
    } else if ($filearea === 'footerlogoimage') {
        return $theme->setting_file_serve('footerlogoimage', $args, $forcedownload, $options);
    } else if ($filearea === 'benefit1image') {
        return $theme->setting_file_serve('benefit1image', $args, $forcedownload, $options);
    } else if ($filearea === 'benefit2image') {
        return $theme->setting_file_serve('benefit2image', $args, $forcedownload, $options);
    } else if ($filearea === 'benefit3image') {
        return $theme->setting_file_serve('benefit3image', $args, $forcedownload, $options);
    } else if ($filearea === 'benefit4image') {
        return $theme->setting_file_serve('benefit4image', $args, $forcedownload, $options);
    } else if ($filearea === 'benefit5image') {
        return $theme->setting_file_serve('benefit5image', $args, $forcedownload, $options);
    } else if ($filearea === 'benefit6image') {
        return $theme->setting_file_serve('benefit6image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane1block1image') {
        return $theme->setting_file_serve('pane1block1image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane1block2image') {
        return $theme->setting_file_serve('pane1block2image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane1block3image') {
        return $theme->setting_file_serve('pane1block3image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane1block4image') {
        return $theme->setting_file_serve('pane1block4image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane1block5image') {
        return $theme->setting_file_serve('pane1block5image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane1block6image') {
        return $theme->setting_file_serve('pane1block6image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane1block7image') {
        return $theme->setting_file_serve('pane1block7image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane1block8image') {
        return $theme->setting_file_serve('pane1block8image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane1block9image') {
        return $theme->setting_file_serve('pane1block9image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane1block10image') {
        return $theme->setting_file_serve('pane1block10image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane2block1image') {
        return $theme->setting_file_serve('pane2block1image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane2block2image') {
        return $theme->setting_file_serve('pane2block2image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane2block3image') {
        return $theme->setting_file_serve('pane2block3image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane2block4image') {
        return $theme->setting_file_serve('pane2block4image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane2block5image') {
        return $theme->setting_file_serve('pane2block5image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane2block6image') {
        return $theme->setting_file_serve('pane2block6image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane2block7image') {
        return $theme->setting_file_serve('pane2block7image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane2block8image') {
        return $theme->setting_file_serve('pane2block8image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane2block9image') {
        return $theme->setting_file_serve('pane2block9image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane2block10image') {
        return $theme->setting_file_serve('pane2block10image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane3block1image') {
        return $theme->setting_file_serve('pane3block1image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane3block2image') {
        return $theme->setting_file_serve('pane3block2image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane3block3image') {
        return $theme->setting_file_serve('pane3block3image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane3block4image') {
        return $theme->setting_file_serve('pane3block4image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane3block5image') {
        return $theme->setting_file_serve('pane3block5image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane3block6image') {
        return $theme->setting_file_serve('pane3block6image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane3block7image') {
        return $theme->setting_file_serve('pane3block7image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane3block8image') {
        return $theme->setting_file_serve('pane3block8image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane3block9image') {
        return $theme->setting_file_serve('pane3block9image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane3block10image') {
        return $theme->setting_file_serve('pane3block10image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane4block1image') {
        return $theme->setting_file_serve('pane4block1image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane4block2image') {
        return $theme->setting_file_serve('pane4block2image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane4block3image') {
        return $theme->setting_file_serve('pane4block3image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane4block4image') {
        return $theme->setting_file_serve('pane4block4image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane4block5image') {
        return $theme->setting_file_serve('pane4block5image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane4block6image') {
        return $theme->setting_file_serve('pane4block6image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane4block7image') {
        return $theme->setting_file_serve('pane4block7image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane4block8image') {
        return $theme->setting_file_serve('pane4block8image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane4block9image') {
        return $theme->setting_file_serve('pane4block9image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane4block10image') {
        return $theme->setting_file_serve('pane4block10image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane5block1image') {
        return $theme->setting_file_serve('pane5block1image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane5block2image') {
        return $theme->setting_file_serve('pane5block2image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane5block3image') {
        return $theme->setting_file_serve('pane5block3image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane5block4image') {
        return $theme->setting_file_serve('pane5block4image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane5block5image') {
        return $theme->setting_file_serve('pane5block5image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane5block6image') {
        return $theme->setting_file_serve('pane5block6image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane5block7image') {
        return $theme->setting_file_serve('pane5block7image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane5block8image') {
        return $theme->setting_file_serve('pane5block8image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane5block9image') {
        return $theme->setting_file_serve('pane5block9image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane5block10image') {
        return $theme->setting_file_serve('pane5block10image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane6block1image') {
        return $theme->setting_file_serve('pane6block1image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane6block2image') {
        return $theme->setting_file_serve('pane6block2image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane6block3image') {
        return $theme->setting_file_serve('pane6block3image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane6block4image') {
        return $theme->setting_file_serve('pane6block4image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane6block5image') {
        return $theme->setting_file_serve('pane6block5image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane6block6image') {
        return $theme->setting_file_serve('pane6block6image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane6block7image') {
        return $theme->setting_file_serve('pane6block7image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane6block8image') {
        return $theme->setting_file_serve('pane6block8image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane6block9image') {
        return $theme->setting_file_serve('pane6block9image', $args, $forcedownload, $options);
    } else if ($filearea === 'pane6block10image') {
        return $theme->setting_file_serve('pane6block10image', $args, $forcedownload, $options);
    } else if ($filearea === 'carouselitem1image') {
        return $theme->setting_file_serve('carouselitem1image', $args, $forcedownload, $options);
    } else if ($filearea === 'carouselitem2image') {
        return $theme->setting_file_serve('carouselitem2image', $args, $forcedownload, $options);
    } else if ($filearea === 'carouselitem3image') {
        return $theme->setting_file_serve('carouselitem3image', $args, $forcedownload, $options);
    } else if ($filearea === 'carouselitem4image') {
        return $theme->setting_file_serve('carouselitem4image', $args, $forcedownload, $options);
    } else if ($filearea === 'carouselitem5image') {
	    return $theme->setting_file_serve('carouselitem5image', $args, $forcedownload, $options);
    } else if ($filearea === 'carouselitem6image') {
       return $theme->setting_file_serve('carouselitem6image', $args, $forcedownload, $options);
    } else if ($filearea === 'logo1image') {
        return $theme->setting_file_serve('logo1image', $args, $forcedownload, $options);
    } else if ($filearea === 'logo2image') {
        return $theme->setting_file_serve('logo2image', $args, $forcedownload, $options);
    } else if ($filearea === 'logo3image') {
        return $theme->setting_file_serve('logo3image', $args, $forcedownload, $options);
    } else if ($filearea === 'logo4image') {
        return $theme->setting_file_serve('logo4image', $args, $forcedownload, $options);
    } else if ($filearea === 'logo5image') {
        return $theme->setting_file_serve('logo5image', $args, $forcedownload, $options);
    } else if ($filearea === 'logo6image') {
        return $theme->setting_file_serve('logo6image', $args, $forcedownload, $options);
    } else if ($filearea === 'logo7image') {
        return $theme->setting_file_serve('logo7image', $args, $forcedownload, $options);
    } else if ($filearea === 'logo8image') {
        return $theme->setting_file_serve('logo8image', $args, $forcedownload, $options);
    } else if ($filearea === 'logo9image') {
        return $theme->setting_file_serve('logo9image', $args, $forcedownload, $options);
    } else if ($filearea === 'logo10image') {
        return $theme->setting_file_serve('logo10image', $args, $forcedownload, $options);
    } else if ($filearea === 'logo11image') {
        return $theme->setting_file_serve('logo11image', $args, $forcedownload, $options);
    } else if ($filearea === 'logo12image') {
        return $theme->setting_file_serve('logo12image', $args, $forcedownload, $options);
    } else if ($filearea === 'category1image') {
        return $theme->setting_file_serve('category1image', $args, $forcedownload, $options);
    } else if ($filearea === 'category2image') {
        return $theme->setting_file_serve('category2image', $args, $forcedownload, $options);
    } else if ($filearea === 'category3image') {
        return $theme->setting_file_serve('category3image', $args, $forcedownload, $options);
    } else if ($filearea === 'category4image') {
        return $theme->setting_file_serve('category4image', $args, $forcedownload, $options);
    } else if ($filearea === 'category5image') {
        return $theme->setting_file_serve('category5image', $args, $forcedownload, $options);
    } else if ($filearea === 'category6image') {
        return $theme->setting_file_serve('category6image', $args, $forcedownload, $options);
    } else if ($filearea === 'category7image') {
        return $theme->setting_file_serve('category7image', $args, $forcedownload, $options);
    } else if ($filearea === 'category8image') {
        return $theme->setting_file_serve('category8image', $args, $forcedownload, $options);
    } else if ($filearea === 'category9image') {
        return $theme->setting_file_serve('category9image', $args, $forcedownload, $options);
    } else if ($filearea === 'category10image') {
        return $theme->setting_file_serve('category10image', $args, $forcedownload, $options);
    } else if ($filearea === 'category11image') {
        return $theme->setting_file_serve('category11image', $args, $forcedownload, $options);
    } else if ($filearea === 'category12image') {
        return $theme->setting_file_serve('category12image', $args, $forcedownload, $options);
    } else if ($filearea === 'category13image') {
        return $theme->setting_file_serve('category13image', $args, $forcedownload, $options);
    } else if ($filearea === 'category14image') {
        return $theme->setting_file_serve('category14image', $args, $forcedownload, $options);
    } else if ($filearea === 'category15image') {
        return $theme->setting_file_serve('category15image', $args, $forcedownload, $options);
    } else if ($filearea === 'category16image') {
        return $theme->setting_file_serve('category16image', $args, $forcedownload, $options);
    } else if ($filearea === 'category17image') {
        return $theme->setting_file_serve('category17image', $args, $forcedownload, $options);
    } else if ($filearea === 'category18image') {
        return $theme->setting_file_serve('category18image', $args, $forcedownload, $options);
    } else if ($filearea === 'category19image') {
        return $theme->setting_file_serve('category19image', $args, $forcedownload, $options);
    } else if ($filearea === 'category20image') {
        return $theme->setting_file_serve('category20image', $args, $forcedownload, $options);
    } else if ($filearea === 'teacher1image') {
        return $theme->setting_file_serve('teacher1image', $args, $forcedownload, $options);
    } else if ($filearea === 'teacher2image') {
        return $theme->setting_file_serve('teacher2image', $args, $forcedownload, $options);
    } else if ($filearea === 'teacher3image') {
        return $theme->setting_file_serve('teacher3image', $args, $forcedownload, $options);
    } else if ($filearea === 'teacher4image') {
        return $theme->setting_file_serve('teacher4image', $args, $forcedownload, $options);
    } else if ($filearea === 'teacher5image') {
        return $theme->setting_file_serve('teacher5image', $args, $forcedownload, $options);
    } else if ($filearea === 'teacher6image') {
        return $theme->setting_file_serve('teacher6image', $args, $forcedownload, $options);
    } else if ($filearea === 'teacher7image') {
        return $theme->setting_file_serve('teacher7image', $args, $forcedownload, $options);
    } else if ($filearea === 'teacher8image') {
        return $theme->setting_file_serve('teacher8image', $args, $forcedownload, $options);
    } else if ($filearea === 'teacher9image') {
        return $theme->setting_file_serve('teacher9image', $args, $forcedownload, $options);
    } else if ($filearea === 'teacher10image') {
        return $theme->setting_file_serve('teacher10image', $args, $forcedownload, $options);
    } else if ($filearea === 'teacher11image') {
        return $theme->setting_file_serve('teacher11image', $args, $forcedownload, $options);
    } else if ($filearea === 'teacher12image') {
        return $theme->setting_file_serve('teacher12image', $args, $forcedownload, $options);
    } else if ($filearea === 'teacher13image') {
        return $theme->setting_file_serve('teacher13image', $args, $forcedownload, $options);
    } else if ($filearea === 'teacher14image') {
        return $theme->setting_file_serve('teacher14image', $args, $forcedownload, $options);
    } else if ($filearea === 'teacher15image') {
        return $theme->setting_file_serve('teacher15image', $args, $forcedownload, $options);
    } else if ($filearea === 'teacher16image') {
        return $theme->setting_file_serve('teacher16image', $args, $forcedownload, $options);
    } else if ($filearea === 'teacher17image') {
        return $theme->setting_file_serve('teacher17image', $args, $forcedownload, $options);
    } else if ($filearea === 'teacher18image') {
        return $theme->setting_file_serve('teacher18image', $args, $forcedownload, $options);
    } else if ($filearea === 'teacher19image') {
        return $theme->setting_file_serve('teacher19image', $args, $forcedownload, $options);
    } else if ($filearea === 'teacher20image') {
        return $theme->setting_file_serve('teacher20image', $args, $forcedownload, $options);
    } else if ($filearea === 'testimonial1image') {
        return $theme->setting_file_serve('testimonial1image', $args, $forcedownload, $options);
    } else if ($filearea === 'testimonial2image') {
        return $theme->setting_file_serve('testimonial2image', $args, $forcedownload, $options);
    } else if ($filearea === 'testimonial3image') {
        return $theme->setting_file_serve('testimonial3image', $args, $forcedownload, $options);
    } else if ($filearea === 'testimonial4image') {
        return $theme->setting_file_serve('testimonial4image', $args, $forcedownload, $options);
    } else if ($filearea === 'testimonial5image') {
        return $theme->setting_file_serve('testimonial5image', $args, $forcedownload, $options);
    } else if ($filearea === 'testimonial6image') {
	    return $theme->setting_file_serve('testimonial6image', $args, $forcedownload, $options);
    } else if ($filearea === 'ctasectionimage') {
	    return $theme->setting_file_serve('ctasectionimage', $args, $forcedownload, $options);
    } else if ($filearea === 'faqsectionimage') {
	    return $theme->setting_file_serve('faqsectionimage', $args, $forcedownload, $options);
    } else if ($filearea === 'loginbgimage') {
	    return $theme->setting_file_serve('loginbgimage', $args, $forcedownload, $options);
    } else if ($filearea === 'defaultcourseimage') {
	    return $theme->setting_file_serve('defaultcourseimage', $args, $forcedownload, $options);
    } else if ($filearea === 'iphoneicon') {
        return $theme->setting_file_serve('iphoneicon', $args, $forcedownload, $options);
    } else if ($filearea === 'iphoneretinaicon') {
        return $theme->setting_file_serve('iphoneretinaicon', $args, $forcedownload, $options);
    } else if ($filearea === 'ipadicon') {
        return $theme->setting_file_serve('ipadicon', $args, $forcedownload, $options);
    } else if ($filearea === 'ipadretinaicon') {
        return $theme->setting_file_serve('ipadretinaicon', $args, $forcedownload, $options);
    } else {
        send_file_not_found();
    }
}




/**
 * Returns the main SCSS content.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */

function theme_edutor_get_main_scss_content($theme) {
    global $CFG;

    $scss = '';
    $filename = !empty($theme->settings->preset) ? $theme->settings->preset : null;
    $fs = get_file_storage();

    $context = context_system::instance();
    
    // Use Boost theme's default styling as the base
    //$scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    
    if ($filename == 'theme-1.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/edutor/scss/preset/theme-1.scss');
    } else if ($filename == 'theme-2.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/edutor/scss/preset/theme-2.scss');
    } else if ($filename == 'theme-3.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/edutor/scss/preset/theme-3.scss');
    } else if ($filename == 'theme-4.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/edutor/scss/preset/theme-4.scss');
    } else if ($filename == 'theme-5.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/edutor/scss/preset/theme-5.scss');
    } else if ($filename == 'theme-6.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/edutor/scss/preset/theme-6.scss');
    } else if ($filename && ($presetfile = $fs->get_file($context->id, 'theme_edutor', 'preset', 0, '/', $filename))) {
        $scss .= $presetfile->get_content();
    } else {
        // Safety fallback - maybe new installs etc.
        $scss .= file_get_contents($CFG->dirroot . '/theme/edutor/scss/preset/theme-1.scss');
    }

    return $scss;
}


/**
 * Get SCSS to prepend.
 *
 * @param theme_config $theme The theme config object.
 * @return array
 */
function theme_edutor_get_pre_scss($theme) {
    global $CFG, $PAGE;

    $prescss = '';
    
    $configurable = [
    // Config key => variableName,
    'brandcolorprimary' => ['theme-color-primary'],
    'brandcolorsecondary' => ['theme-color-secondary'],
    'pagefont' => ['pagefont'],
    'headingfont' => ['headingfont'],
    'slideshowheight' => ['fp-hero-height'],
    //'paneblockheight' => ['fp-block-height'],

    'courseheaderimageheight' => ['course-header-image-height'],
    
    'slide1ctacolor' => ['slide1-cta-btn-color'],
    'slide2ctacolor' => ['slide2-cta-btn-color'],
    'slide3ctacolor' => ['slide3-cta-btn-color'],
    'slide4ctacolor' => ['slide4-cta-btn-color'],
    'slide5ctacolor' => ['slide5-cta-btn-color'],
    'slide6ctacolor' => ['slide6-cta-btn-color'],

    
    'headerbgcolor' => ['theme-header-bg-color'],
    'searchsectionbgcolor' => ['theme-search-section-bg-color'],
    'tabbgcolor' => ['tabbgcolor'],
    'tabbgcoloractive' => ['tabbgcoloractive'],
    'paneblockbgcolor' => ['paneblockbgcolor'],
    'paneblocktextcolor' => ['paneblocktextcolor'],
    'paneblocklabelbgcolor' => ['paneblocklabelbgcolor'],
    'ctasectionbgcolor'=> ['ctasectionbgcolor'],
    'faqsectionbgcolor'=> ['faqsectionbgcolor'],
    'teacherssectionbgcolor'=> ['teacherssectionbgcolor'],
    'footerbgcolor' => ['theme-footer-bg-color'],
    
    'catblockwidth_lg' => ['catblockwidth_lg'],
    'caticonwidthlimit' => ['caticonwidthlimit'],
    
    ];

    // Add settings variables.
    foreach ($configurable as $configkey => $targets) {
        $value = $theme->settings->{$configkey};
        if (empty($value)) {
            continue;
        }
        array_map(function ($target) use (&$prescss, $value) {
            $prescss .= '$' . $target . ': ' . $value . ";\n";
        }
        , (array)$targets);
    }
    

    // Prepend pre-scss.
    if (!empty($theme->settings->scsspre)) {
        $prescss .= $theme->settings->scsspre;
    }
    
    
    // Frontpage Slideshow Hero Images
    
    
    // Slideshow slide 1
    $slide1image = $theme->setting_file_url('slide1image', 'slide1image');
    if (isset($slide1image)) {
        
        $prescss .= '.slide-1 {background-image: url("' . $slide1image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center center;}';
        

    }
    
     // Slideshow slide 1 (This is a hack - Must duplicate the above slide 1 code so slide1 shows up when theme designer mode is on )
     
    $slide1image = $theme->setting_file_url('slide1image', 'slide1image');
    if (isset($slide1image)) {
        
        $prescss .= '.slide-1 {background-image: url("' . $slide1image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center center;}'; 

    }

    // Slideshow slide 2
    $slide2image = $theme->setting_file_url('slide2image', 'slide2image');
    if (isset($slide2image)) {
        
        $prescss .= '.slide-2 {background-image: url("' . $slide2image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center center;}';
    }
    
   

    // Slideshow slide 2
    $slide2image = $theme->setting_file_url('slide2image', 'slide2image');
    if (isset($slide2image)) {
        
        $prescss .= '.slide-2 {background-image: url("' . $slide2image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center center;}';
    }
    
    

    // Slideshow slide 3
    $slide3image = $theme->setting_file_url('slide3image', 'slide3image');
    if (isset($slide3image)) {
        
        $prescss .= '.slide-3 {background-image: url("' . $slide3image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center center;}';
    }
    
    // Slideshow slide 4
    $slide4image = $theme->setting_file_url('slide4image', 'slide4image');
    if (isset($slide4image)) {
        
        $prescss .= '.slide-4 {background-image: url("' . $slide4image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position: center center;}';
    }
    
    // Slideshow slide 5
    $slide5image = $theme->setting_file_url('slide5image', 'slide5image');
    if (isset($slide5image)) {
        
        $prescss .= '.slide-5 {background-image: url("' . $slide5image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position: center center;}';
    }
        
    // Slideshow slide 6
    $slide6image = $theme->setting_file_url('slide6image', 'slide6image');
    if (isset($slide6image)) {
        
        $prescss .= '.slide-6 {background-image: url("' . $slide6image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position: center center;}';
    }
    

    /* Frontpage Featured Blocks Images */
    
    //Pane One Block 1
    $pane1block1image = $theme->setting_file_url('pane1block1image', 'pane1block1image');
    if (isset($pane1block1image)) {
        
        $prescss .= '.featured-carousel .item-1-1 .thumb-holder-inner {background-image: url("' . $pane1block1image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane One Block 2
    $pane1block2image = $theme->setting_file_url('pane1block2image', 'pane1block2image');
    if (isset($pane1block2image)) {
        
        $prescss .= '.featured-carousel .item-1-2 .thumb-holder-inner {background-image: url("' . $pane1block2image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane One Block 3
    $pane1block3image = $theme->setting_file_url('pane1block3image', 'pane1block3image');
    if (isset($pane1block3image)) {
        
        $prescss .= '.featured-carousel .item-1-3 .thumb-holder-inner {background-image: url("' . $pane1block3image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane One Block 4
    $pane1block4image = $theme->setting_file_url('pane1block4image', 'pane1block4image');
    if (isset($pane1block4image)) {
        
        $prescss .= '.featured-carousel .item-1-4 .thumb-holder-inner {background-image: url("' . $pane1block4image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane One Block 5
    $pane1block5image = $theme->setting_file_url('pane1block5image', 'pane1block5image');
    if (isset($pane1block5image)) {
        
    $prescss .= '.featured-carousel .item-1-5 .thumb-holder-inner {background-image: url("' . $pane1block5image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane One Block 6
$pane1block6image = $theme->setting_file_url('pane1block6image', 'pane1block6image');
    if (isset($pane1block6image)) {
        
        $prescss .= '.featured-carousel .item-1-6 .thumb-holder-inner {background-image: url("' . $pane1block6image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane One Block 7
    $pane1block7image = $theme->setting_file_url('pane1block7image', 'pane1block7image');
    if (isset($pane1block7image)) {
        
        $prescss .= '.featured-carousel .item-1-7 .thumb-holder-inner {background-image: url("' . $pane1block7image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane One Block 8
    $pane1block8image = $theme->setting_file_url('pane1block8image', 'pane1block8image');
    if (isset($pane1block8image)) {
        
        $prescss .= '.featured-carousel .item-1-8 .thumb-holder-inner {background-image: url("' . $pane1block8image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane One Block 9
    $pane1block9image = $theme->setting_file_url('pane1block9image', 'pane1block9image');
    if (isset($pane1block9image)) {
        
        $prescss .= '.featured-carousel .item-1-9 .thumb-holder-inner {background-image: url("' . $pane1block9image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane One Block 10
    $pane1block10image = $theme->setting_file_url('pane1block10image', 'pane1block10image');
    if (isset($pane1block10image)) {
        
        $prescss .= '.featured-carousel .item-1-10 .thumb-holder-inner {background-image: url("' . $pane1block10image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    
    //Pane Two Block 1
    $pane2block1image = $theme->setting_file_url('pane2block1image', 'pane2block1image');
    if (isset($pane2block1image)) {
        
        $prescss .= '.featured-carousel .item-2-1 .thumb-holder-inner {background-image: url("' . $pane2block1image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Two Block 2
    $pane2block2image = $theme->setting_file_url('pane2block2image', 'pane2block2image');
    if (isset($pane2block2image)) {
        
        $prescss .= '.featured-carousel .item-2-2 .thumb-holder-inner {background-image: url("' . $pane2block2image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Two Block 3
    $pane2block3image = $theme->setting_file_url('pane2block3image', 'pane2block3image');
    if (isset($pane2block3image)) {
        
        $prescss .= '.featured-carousel .item-2-3 .thumb-holder-inner {background-image: url("' . $pane2block3image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Two Block 4
    $pane2block4image = $theme->setting_file_url('pane2block4image', 'pane2block4image');
    if (isset($pane2block4image)) {
        
        $prescss .= '.featured-carousel .item-2-4 .thumb-holder-inner {background-image: url("' . $pane2block4image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Two Block 5
    $pane2block5image = $theme->setting_file_url('pane2block5image', 'pane2block5image');
    if (isset($pane2block5image)) {
        
    $prescss .= '.featured-carousel .item-2-5 .thumb-holder-inner {background-image: url("' . $pane2block5image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Two Block 6
$pane2block6image = $theme->setting_file_url('pane2block6image', 'pane2block6image');
    if (isset($pane2block6image)) {
        
        $prescss .= '.featured-carousel .item-2-6 .thumb-holder-inner {background-image: url("' . $pane2block6image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Two Block 7
    $pane2block7image = $theme->setting_file_url('pane2block7image', 'pane2block7image');
    if (isset($pane2block7image)) {
        
        $prescss .= '.featured-carousel .item-2-7 .thumb-holder-inner {background-image: url("' . $pane2block7image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Two Block 8
    $pane2block8image = $theme->setting_file_url('pane2block8image', 'pane2block8image');
    if (isset($pane2block8image)) {
        
        $prescss .= '.featured-carousel .item-2-8 .thumb-holder-inner {background-image: url("' . $pane2block8image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Two Block 9
    $pane2block9image = $theme->setting_file_url('pane2block9image', 'pane2block9image');
    if (isset($pane2block9image)) {
        
        $prescss .= '.featured-carousel .item-2-9 .thumb-holder-inner {background-image: url("' . $pane2block9image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Two Block 10
    $pane2block10image = $theme->setting_file_url('pane2block10image', 'pane2block10image');
    if (isset($pane2block10image)) {
        
        $prescss .= '.featured-carousel .item-2-10 .thumb-holder-inner {background-image: url("' . $pane2block10image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Three Block 1
    $pane3block1image = $theme->setting_file_url('pane3block1image', 'pane3block1image');
    if (isset($pane3block1image)) {
        
        $prescss .= '.featured-carousel .item-3-1 .thumb-holder-inner {background-image: url("' . $pane3block1image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Three Block 2
    $pane3block2image = $theme->setting_file_url('pane3block2image', 'pane3block2image');
    if (isset($pane3block2image)) {
        
        $prescss .= '.featured-carousel .item-3-2 .thumb-holder-inner {background-image: url("' . $pane3block2image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Three Block 3
    $pane3block3image = $theme->setting_file_url('pane3block3image', 'pane3block3image');
    if (isset($pane3block3image)) {
        
        $prescss .= '.featured-carousel .item-3-3 .thumb-holder-inner {background-image: url("' . $pane3block3image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Three Block 4
    $pane3block4image = $theme->setting_file_url('pane3block4image', 'pane3block4image');
    if (isset($pane3block4image)) {
        
        $prescss .= '.featured-carousel .item-3-4 .thumb-holder-inner {background-image: url("' . $pane3block4image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Three Block 5
    $pane3block5image = $theme->setting_file_url('pane3block5image', 'pane3block5image');
    if (isset($pane3block5image)) {
        
    $prescss .= '.featured-carousel .item-3-5 .thumb-holder-inner {background-image: url("' . $pane3block5image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Three Block 6
$pane3block6image = $theme->setting_file_url('pane3block6image', 'pane3block6image');
    if (isset($pane3block6image)) {
        
        $prescss .= '.featured-carousel .item-3-6 .thumb-holder-inner {background-image: url("' . $pane3block6image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Three Block 7
    $pane3block7image = $theme->setting_file_url('pane3block7image', 'pane3block7image');
    if (isset($pane3block7image)) {
        
        $prescss .= '.featured-carousel .item-3-7 .thumb-holder-inner {background-image: url("' . $pane3block7image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Three Block 8
    $pane3block8image = $theme->setting_file_url('pane3block8image', 'pane3block8image');
    if (isset($pane3block8image)) {
        
        $prescss .= '.featured-carousel .item-3-8 .thumb-holder-inner {background-image: url("' . $pane3block8image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Three Block 9
    $pane3block9image = $theme->setting_file_url('pane3block9image', 'pane3block9image');
    if (isset($pane3block9image)) {
        
        $prescss .= '.featured-carousel .item-3-9 .thumb-holder-inner {background-image: url("' . $pane3block9image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Three Block 10
    $pane3block10image = $theme->setting_file_url('pane3block10image', 'pane3block10image');
    if (isset($pane3block10image)) {
        
        $prescss .= '.featured-carousel .item-3-10 .thumb-holder-inner {background-image: url("' . $pane3block10image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    
    //Pane Four Block 1
    $pane4block1image = $theme->setting_file_url('pane4block1image', 'pane4block1image');
    if (isset($pane4block1image)) {
        
        $prescss .= '.featured-carousel .item-4-1 .thumb-holder-inner {background-image: url("' . $pane4block1image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Four Block 2
    $pane4block2image = $theme->setting_file_url('pane4block2image', 'pane4block2image');
    if (isset($pane4block2image)) {
        
        $prescss .= '.featured-carousel .item-4-2 .thumb-holder-inner {background-image: url("' . $pane4block2image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Four Block 3
    $pane4block3image = $theme->setting_file_url('pane4block3image', 'pane4block3image');
    if (isset($pane4block3image)) {
        
        $prescss .= '.featured-carousel .item-4-3 .thumb-holder-inner {background-image: url("' . $pane4block3image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Four Block 4
    $pane4block4image = $theme->setting_file_url('pane4block4image', 'pane4block4image');
    if (isset($pane4block4image)) {
        
        $prescss .= '.featured-carousel .item-4-4 .thumb-holder-inner {background-image: url("' . $pane4block4image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Four Block 5
    $pane4block5image = $theme->setting_file_url('pane4block5image', 'pane4block5image');
    if (isset($pane4block5image)) {
        
    $prescss .= '.featured-carousel .item-4-5 .thumb-holder-inner {background-image: url("' . $pane4block5image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Four Block 6
$pane4block6image = $theme->setting_file_url('pane4block6image', 'pane4block6image');
    if (isset($pane4block6image)) {
        
        $prescss .= '.featured-carousel .item-4-6 .thumb-holder-inner {background-image: url("' . $pane4block6image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Four Block 7
    $pane4block7image = $theme->setting_file_url('pane4block7image', 'pane4block7image');
    if (isset($pane4block7image)) {
        
        $prescss .= '.featured-carousel .item-4-7 .thumb-holder-inner {background-image: url("' . $pane4block7image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Four Block 8
    $pane4block8image = $theme->setting_file_url('pane4block8image', 'pane4block8image');
    if (isset($pane4block8image)) {
        
        $prescss .= '.featured-carousel .item-4-8 .thumb-holder-inner {background-image: url("' . $pane4block8image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Four Block 9
    $pane4block9image = $theme->setting_file_url('pane4block9image', 'pane4block9image');
    if (isset($pane4block9image)) {
        
        $prescss .= '.featured-carousel .item-4-9 .thumb-holder-inner {background-image: url("' . $pane4block9image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Four Block 10
    $pane4block10image = $theme->setting_file_url('pane4block10image', 'pane4block10image');
    if (isset($pane4block10image)) {
        
        $prescss .= '.featured-carousel .item-4-10 .thumb-holder-inner {background-image: url("' . $pane4block10image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    
    //Pane Five Block 1
    $pane5block1image = $theme->setting_file_url('pane5block1image', 'pane5block1image');
    if (isset($pane5block1image)) {
        
        $prescss .= '.featured-carousel .item-5-1 .thumb-holder-inner {background-image: url("' . $pane5block1image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Five Block 2
    $pane5block2image = $theme->setting_file_url('pane5block2image', 'pane5block2image');
    if (isset($pane5block2image)) {
        
        $prescss .= '.featured-carousel .item-5-2 .thumb-holder-inner {background-image: url("' . $pane5block2image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Five Block 3
    $pane5block3image = $theme->setting_file_url('pane5block3image', 'pane5block3image');
    if (isset($pane5block3image)) {
        
        $prescss .= '.featured-carousel .item-5-3 .thumb-holder-inner {background-image: url("' . $pane5block3image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Five Block 4
    $pane5block4image = $theme->setting_file_url('pane5block4image', 'pane5block4image');
    if (isset($pane5block4image)) {
        
        $prescss .= '.featured-carousel .item-5-4 .thumb-holder-inner {background-image: url("' . $pane5block4image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Five Block 5
    $pane5block5image = $theme->setting_file_url('pane5block5image', 'pane5block5image');
    if (isset($pane5block5image)) {
        
    $prescss .= '.featured-carousel .item-5-5 .thumb-holder-inner {background-image: url("' . $pane5block5image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Five Block 6
$pane5block6image = $theme->setting_file_url('pane5block6image', 'pane5block6image');
    if (isset($pane5block6image)) {
        
        $prescss .= '.featured-carousel .item-5-6 .thumb-holder-inner {background-image: url("' . $pane5block6image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Five Block 7
    $pane5block7image = $theme->setting_file_url('pane5block7image', 'pane5block7image');
    if (isset($pane5block7image)) {
        
        $prescss .= '.featured-carousel .item-5-7 .thumb-holder-inner {background-image: url("' . $pane5block7image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Five Block 8
    $pane5block8image = $theme->setting_file_url('pane5block8image', 'pane5block8image');
    if (isset($pane5block8image)) {
        
        $prescss .= '.featured-carousel .item-5-8 .thumb-holder-inner {background-image: url("' . $pane5block8image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Five Block 9
    $pane5block9image = $theme->setting_file_url('pane5block9image', 'pane5block9image');
    if (isset($pane5block9image)) {
        
        $prescss .= '.featured-carousel .item-5-9 .thumb-holder-inner {background-image: url("' . $pane5block9image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Five Block 10
    $pane5block10image = $theme->setting_file_url('pane5block10image', 'pane5block10image');
    if (isset($pane5block10image)) {
        
        $prescss .= '.featured-carousel .item-5-10 .thumb-holder-inner {background-image: url("' . $pane5block10image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
   //Pane Six Block 1
    $pane6block1image = $theme->setting_file_url('pane6block1image', 'pane6block1image');
    if (isset($pane6block1image)) {
        
        $prescss .= '.featured-carousel .item-6-1 .thumb-holder-inner {background-image: url("' . $pane6block1image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Six Block 2
    $pane6block2image = $theme->setting_file_url('pane6block2image', 'pane6block2image');
    if (isset($pane6block2image)) {
        
        $prescss .= '.featured-carousel .item-6-2 .thumb-holder-inner {background-image: url("' . $pane6block2image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Six Block 3
    $pane6block3image = $theme->setting_file_url('pane6block3image', 'pane6block3image');
    if (isset($pane6block3image)) {
        
        $prescss .= '.featured-carousel .item-6-3 .thumb-holder-inner {background-image: url("' . $pane6block3image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Six Block 4
    $pane6block4image = $theme->setting_file_url('pane6block4image', 'pane6block4image');
    if (isset($pane6block4image)) {
        
        $prescss .= '.featured-carousel .item-6-4 .thumb-holder-inner {background-image: url("' . $pane6block4image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Six Block 5
    $pane6block5image = $theme->setting_file_url('pane6block5image', 'pane6block5image');
    if (isset($pane6block5image)) {
        
    $prescss .= '.featured-carousel .item-6-5 .thumb-holder-inner {background-image: url("' . $pane6block5image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Six Block 6
$pane6block6image = $theme->setting_file_url('pane6block6image', 'pane6block6image');
    if (isset($pane6block6image)) {
        
        $prescss .= '.featured-carousel .item-6-6 .thumb-holder-inner {background-image: url("' . $pane6block6image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Six Block 7
    $pane6block7image = $theme->setting_file_url('pane6block7image', 'pane6block7image');
    if (isset($pane6block7image)) {
        
        $prescss .= '.featured-carousel .item-6-7 .thumb-holder-inner {background-image: url("' . $pane6block7image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Six Block 8
    $pane6block8image = $theme->setting_file_url('pane6block8image', 'pane6block8image');
    if (isset($pane6block8image)) {
        
        $prescss .= '.featured-carousel .item-6-8 .thumb-holder-inner {background-image: url("' . $pane6block8image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Six Block 9
    $pane6block9image = $theme->setting_file_url('pane6block9image', 'pane6block9image');
    if (isset($pane6block9image)) {
        
        $prescss .= '.featured-carousel .item-6-9 .thumb-holder-inner {background-image: url("' . $pane6block9image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    
    //Pane Six Block 10
    $pane6block10image = $theme->setting_file_url('pane6block10image', 'pane6block10image');
    if (isset($pane6block10image)) {
        
        $prescss .= '.featured-carousel .item-6-10 .thumb-holder-inner {background-image: url("' . $pane6block10image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
    }
    

    // Promo slide 1
    $carouselitem1image = $theme->setting_file_url('carouselitem1image', 'carouselitem1image');
    if (isset($carouselitem1image)) {
        
        $prescss .= '.promo-carousel .item-1 .item-figure-holder {background-image: url("' . $carouselitem1image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
        

    }
    
    // Promo slide 2
    $carouselitem2image = $theme->setting_file_url('carouselitem2image', 'carouselitem2image');
    if (isset($carouselitem2image)) {
        
        $prescss .= '.promo-carousel .item-2 .item-figure-holder {background-image: url("' . $carouselitem2image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
        

    }
    
    // Promo slide 3
    $carouselitem3image = $theme->setting_file_url('carouselitem3image', 'carouselitem3image');
    if (isset($carouselitem3image)) {
        
        $prescss .= '.promo-carousel .item-3 .item-figure-holder {background-image: url("' . $carouselitem3image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
        

    }
    
    // Promo slide 4
    $carouselitem4image = $theme->setting_file_url('carouselitem4image', 'carouselitem4image');
    if (isset($carouselitem4image)) {
        
        $prescss .= '.promo-carousel .item-4 .item-figure-holder {background-image: url("' . $carouselitem4image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
        

    }
    
    // Promo slide 5
    $carouselitem5image = $theme->setting_file_url('carouselitem5image', 'carouselitem5image');
    if (isset($carouselitem5image)) {
        
        $prescss .= '.promo-carousel .item-5 .item-figure-holder {background-image: url("' . $carouselitem5image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
        

    }
    
    // Promo slide 6
    $carouselitem6image = $theme->setting_file_url('carouselitem6image', 'carouselitem6image');
    if (isset($carouselitem6image)) {
        
        $prescss .= '.promo-carousel .item-6 .item-figure-holder {background-image: url("' . $carouselitem6image . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
        
    }
    
    
    
    // FAQ section image 
    $faqsectionimage = $theme->setting_file_url('faqsectionimage', 'faqsectionimage');
    if (isset($faqsectionimage)) {
        
        $prescss .= '.faq-section .faq-figure-holder {background-image: url("' . $faqsectionimage. '"); -webkit-background-size:contain; -moz-background-size:contain; -o-background-size:contain; background-size:contain; background-repeat: no-repeat; background-position: center center;}';
        

    }
    
    /* Course Default Image */
    $defaultcourseimage = $theme->setting_file_url('defaultcourseimage', 'defaultcourseimage');
    if (isset($defaultcourseimage)) {
        
        $prescss .= '.course-header-bg .course-header-image {background-image: url("' . $defaultcourseimage . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat;  background-position: center; width:100%; height: 100%;}';
        
        /*
        $prescss .= '.dashboard-card-deck .dashboard-card .dashboard-card-img {background-image: url("' . $defaultcourseimage . '") !important; -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat;  background-position: center; width:100%; height: 100%;}';
        */
        
    }
    
    
    
    /* Login Page */
    
    // Page Background Image
    
    $loginbgimage = $theme->setting_file_url('loginbgimage', 'loginbgimage');
    if (isset($loginbgimage)) {
        
        $prescss .= '.page-wrapper.has-bg-image .auth-background-holder {background-image: url("' . $loginbgimage . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat; background-position:center top;}';
        

    }
    
    // Login Page Logo Image
   
    $loginsitelogo = $theme->setting_file_url('loginlogo', 'loginlogo');
    if (isset($loginsitelogo)) {
        
        $prescss .= '.has-logo .login-sitename a,  .has-logo .login-sitename a:focus {text-indent: -99999px; display: block; height: 70px; background-image: url("' . $loginsitelogo . '") !important; background-repeat: no-repeat; background-position: center center;}';
      
        

    }

    return $prescss;
}


/**
 * Inject additional SCSS.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_edutor_get_extra_scss($theme) {
    // Adapted from Boost to allow other changes or settings if required.
    $extrascss = '';
    if (!empty($theme->settings->scss)) {
        $extrascss .= $theme->settings->scss;
    }

    return $extrascss;
}



function theme_edutor_get_course_activities() {
    GLOBAL $CFG, $PAGE, $OUTPUT;
    // A copy of block_activity_modules.
    $course = $PAGE->course;
    $content = new stdClass();
    $modinfo = get_fast_modinfo($course);
    $modfullnames = array();

    $archetypes = array();

    foreach ($modinfo->cms as $cm) {
        // Exclude activities which are not visible or have no link (=label).
        if (!$cm->uservisible or !$cm->has_view()) {
            continue;
        }
        if (array_key_exists($cm->modname, $modfullnames)) {
            continue;
        }
        if (!array_key_exists($cm->modname, $archetypes)) {
            $archetypes[$cm->modname] = plugin_supports('mod', $cm->modname, FEATURE_MOD_ARCHETYPE, MOD_ARCHETYPE_OTHER);
        }
        if ($archetypes[$cm->modname] == MOD_ARCHETYPE_RESOURCE) {
            if (!array_key_exists('resources', $modfullnames)) {
                $modfullnames['resources'] = get_string('resources');
            }
        } else {
            $modfullnames[$cm->modname] = $cm->modplural;
        }
    }
    core_collator::asort($modfullnames);

    return $modfullnames;
}

/**
 * This function creates the dynamic HTML needed for some
 * settings and then passes it back in an object so it can
 * be echo'd to the page.
 *
 */

function theme_edutor_get_setting($setting, $format = false) {
    global $CFG;
    require_once($CFG->dirroot . '/lib/weblib.php');
    static $theme;
    if (empty($theme)) {
        $theme = theme_config::load('edutor');
    }
    if (empty($theme->settings->$setting)) {
        return false;
    } else if (!$format) {
        return $theme->settings->$setting;
    } else if ($format === 'format_text') {
        return format_text($theme->settings->$setting, FORMAT_PLAIN);
    } else if ($format === 'format_html') {
        return format_text($theme->settings->$setting, FORMAT_HTML, array('trusted' => true, 'noclean' => true));
    } else {
        return format_string($theme->settings->$setting);
    }
}

/* Remove HTML tags  (used in course_render.php) */

function theme_edutor_strip_html_tags( $text ) {
    $text = preg_replace(
        array(
            // Remove invisible content.
            '@<head[^>]*?>.*?</head>@siu',
            '@<style[^>]*?>.*?</style>@siu',
            '@<script[^>]*?.*?</script>@siu',
            '@<object[^>]*?.*?</object>@siu',
            '@<embed[^>]*?.*?</embed>@siu',
            '@<applet[^>]*?.*?</applet>@siu',
            '@<noframes[^>]*?.*?</noframes>@siu',
            '@<noscript[^>]*?.*?</noscript>@siu',
            '@<noembed[^>]*?.*?</noembed>@siu',
            // Add line breaks before and after blocks.
            '@</?((address)|(blockquote)|(center)|(del))@iu',
            '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
            '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
            '@</?((table)|(th)|(td)|(caption))@iu',
            '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
            '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
            '@</?((frameset)|(frame)|(iframe))@iu',
            ),
        array(
            ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
            "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
            "\n\$0", "\n\$0",
            ),
        $text
        );
return strip_tags( $text );
}


/* Truncate the course content with ellipsis (used in course_render.php) */


function theme_edutor_course_trim_char($str, $n = 200, $endchar = '&#8230;') {
    if (strlen($str) < $n) {
        return $str;
    }

    $str = preg_replace("/\s+/", ' ', str_replace(array("\r\n", "\r", "\n"), ' ', $str));
    if (strlen($str) <= $n) {
        return $str;
    }

    $out = "";
    $small = mb_substr($str, 0, $n); //Use mb_substr instead of substr Ref: https://stackoverflow.com/questions/6007999/cutting-a-string-with-accents
    $out = $small.$endchar;
    return $out;
}





