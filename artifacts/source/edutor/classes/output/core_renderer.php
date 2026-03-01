<?php

namespace theme_edutor\output;

use coding_exception;
use html_writer;
use tabobject;
use tabtree;
use custom_menu_item;
use custom_menu;
use block_contents;
use navigation_node;
use action_link;
use stdClass;
use moodle_url;
use preferences_groups;
use action_menu;
use help_icon;
use single_button;
use single_select;
use paging_bar;
use url_select;
use context_course;
use pix_icon;
use theme_config;


defined('MOODLE_INTERNAL') || die;

require_once ($CFG->dirroot . "/course/renderer.php");
//require_once ($CFG->libdir . '/coursecatlib.php'); //From Moodle 3.6 - Class coursecat is now alias to autoloaded class core_course_category, course_in_list is an alias to core_course_list_element. Class coursecat_sortable_records is deprecated without replacement. Do not include coursecatlib.php


class core_renderer extends \theme_boost\output\core_renderer {
    
    
    /*
    
    public function image_url($imagename, $component = 'moodle') {
        // Strip -24, -64, -256  etc from the end of filetype icons so we
        // only need to provide one SVG, see MDL-47082.
        $imagename = \preg_replace('/-\d\d\d?$/', '', $imagename);
        return $this->page->theme->image_url($imagename, $component);
    }
    */
    
    public function usefontsapi() {
        global $PAGE;
        $setting = $PAGE->theme->settings->usefontsapi == 1;
        return $setting != '' ? $setting : '';
    }
    
    public function headingfont() {
        global $PAGE;
        $setting = $PAGE->theme->settings->headingfont;
        return $setting != '' ? $setting : '';
    }

    public function pagefont() {
        global $PAGE;
        $setting = $PAGE->theme->settings->pagefont;
        return $setting != '' ? $setting : '';
    }
    
    
    public function site_logo() {
	     
        global $PAGE;
        
        $setting = $PAGE->theme->setting_file_url('logo', 'logo');
        
        return $setting != '' ? $setting : '';
        
    }
    
    public function login_site_logo() {
	     
        global $PAGE;
        
        $setting = $PAGE->theme->setting_file_url('loginlogo', 'loginlogo');
        
        return $setting != '' ? $setting : '';
        
    }

    
    public function login_background() {
        global $PAGE;
        
        $setting = $PAGE->theme->setting_file_url('loginbgimage', 'loginbgimage');
        
        return $setting != '' ? $setting : '';
    }
    

    
    public function google_analyticsid() {
        global $PAGE;
        
        $setting = $PAGE->theme->settings->analyticsid;
        
        return $setting != '' ? $setting : '';
        
    }
    
    
    public function ios_homescreen_icons() {
        global $PAGE;

        
        //iPhone icon
        $iphoneicon = (empty($PAGE->theme->setting_file_url('iphoneicon', 'iphoneicon'))) ? false : $PAGE->theme->setting_file_url('iphoneicon', 'iphoneicon');

        
        //iPhone Retina icon
        $iphoneretinaicon = (empty($PAGE->theme->setting_file_url('iphoneretinaicon', 'iphoneretinaicon'))) ? false : $PAGE->theme->setting_file_url('iphoneretinaicon', 'iphoneretinaicon');
        
         //iPad icon
        $ipadicon = (empty($PAGE->theme->setting_file_url('ipadicon', 'ipadicon'))) ? false : $PAGE->theme->setting_file_url('ipadicon', 'ipadicon');
        
        //ipad Retina icon
        $ipadretinaicon = (empty($PAGE->theme->setting_file_url('ipadretinaicon', 'ipadretinaicon'))) ? false : $PAGE->theme->setting_file_url('ipadretinaicon', 'ipadretinaicon');


        $ios_homescreen_icons = [
        
            'iphoneicon' => $iphoneicon, 
            'iphoneretinaicon' => $iphoneretinaicon, 
            'ipadicon' => $ipadicon, 
            'ipadretinaicon' => $ipadretinaicon, 

        
        ];

        return $this->render_from_template('theme_edutor/ios_homescreen_icons', $ios_homescreen_icons);
    }
    
    public function moodle_validator() {
        global $CFG;
        
        $valid = $CFG->branch == '501';
        

        $moodle_validator = [
        
            'invalid' => !$valid, 
        ];

        return $this->render_from_template('theme_edutor/moodle_validator', $moodle_validator);
    }
    
    public function header_alert() {
        global $PAGE;
        
        $usealert = $PAGE->theme->settings->usealert== 1;
        $alertcontent = (empty($PAGE->theme->settings->alertcontent)) ? false : format_text($PAGE->theme->settings->alertcontent);
        $alertbgcolor = (empty($PAGE->theme->settings->alertbgcolor)) ? false : $PAGE->theme->settings->alertbgcolor;


        $header_alert = [
        
            'hasalert' => $usealert, 
            'alertcontent' => $alertcontent, 
            'alertbgcolor' => $alertbgcolor,


        ];

        return $this->render_from_template('theme_edutor/header_alert', $header_alert);
    }
    
    
        

        
    public function footer_socialmedia() {
        global $PAGE;
        
        $usefootersocial = $PAGE->theme->settings->usefootersocial == 1;
        
        $footersocialsectiontitle = (empty($PAGE->theme->settings->footersocialsectiontitle)) ? false : format_text($PAGE->theme->settings->footersocialsectiontitle);
      
        $haswebsite = (empty($PAGE->theme->settings->website)) ? false : $PAGE->theme->settings->website;
        $hastwitterx = (empty($PAGE->theme->settings->twitterx)) ? false : $PAGE->theme->settings->twitterx;
        $hasfacebook = (empty($PAGE->theme->settings->facebook)) ? false : $PAGE->theme->settings->facebook;
        $haslinkedin = (empty($PAGE->theme->settings->linkedin)) ? false : $PAGE->theme->settings->linkedin;
        $hasyoutube = (empty($PAGE->theme->settings->youtube)) ? false : $PAGE->theme->settings->youtube;
        $hasvimeo = (empty($PAGE->theme->settings->vimeo)) ? false : $PAGE->theme->settings->vimeo;
        $hasinstagram = (empty($PAGE->theme->settings->instagram)) ? false : $PAGE->theme->settings->instagram;
        $haspinterest = (empty($PAGE->theme->settings->pinterest)) ? false : $PAGE->theme->settings->pinterest;
        $hasflickr = (empty($PAGE->theme->settings->flickr)) ? false : $PAGE->theme->settings->flickr;
        $hastumblr = (empty($PAGE->theme->settings->tumblr)) ? false : $PAGE->theme->settings->tumblr;
        $hasslideshare = (empty($PAGE->theme->settings->slideshare)) ? false : $PAGE->theme->settings->slideshare;
        $hasskype = (empty($PAGE->theme->settings->skype)) ? false : $PAGE->theme->settings->skype;
        $haswhatsapp = (empty($PAGE->theme->settings->whatsapp)) ? false : $PAGE->theme->settings->whatsapp;
        $hassnapchat = (empty($PAGE->theme->settings->snapchat)) ? false : $PAGE->theme->settings->snapchat;
        $hasweixin = (empty($PAGE->theme->settings->weixin)) ? false : $PAGE->theme->settings->weixin;
        $hasweibo = (empty($PAGE->theme->settings->weibo)) ? false : $PAGE->theme->settings->weibo;
        $hasrss = (empty($PAGE->theme->settings->rss)) ? false : $PAGE->theme->settings->rss;
        
        $hastiktok = (empty($PAGE->theme->settings->tiktok)) ? false : $PAGE->theme->settings->tiktok;
        $hasreddit = (empty($PAGE->theme->settings->reddit)) ? false : $PAGE->theme->settings->reddit;

        $hassocial1 = (empty($PAGE->theme->settings->social1)) ? false : $PAGE->theme->settings->social1;
        $social1icon = (empty($PAGE->theme->settings->socialicon1)) ? '' : $PAGE->theme->settings->socialicon1;
        $hassocial2 = (empty($PAGE->theme->settings->social2)) ? false : $PAGE->theme->settings->social2;
        $social2icon = (empty($PAGE->theme->settings->socialicon2)) ? '' : $PAGE->theme->settings->socialicon2;
        $hassocial3 = (empty($PAGE->theme->settings->social3)) ? false : $PAGE->theme->settings->social3;
        $social3icon = (empty($PAGE->theme->settings->socialicon3)) ? '' : $PAGE->theme->settings->socialicon3;

        $socialcontext = [

        'usefootersocial' => $usefootersocial,
        
        'footersocialsectiontitle' => $footersocialsectiontitle,


        'socialmedia' => array(
	        
	        array(
                'haslink' => $haswebsite,
                'linkicon' => 'globe fa-solid'
            ) ,
            
            array(
                'haslink' => $hastiktok,
                'linkicon' => 'tiktok fa-brands'
            ) ,
           
            array(
                'haslink' => $hastwitterx,
                'linkicon' => 'x-twitter fa-brands'
            ),
            array(
                'haslink' => $hasfacebook,
                'linkicon' => 'facebook fa-brands'
            ) ,
       
            array(
                'haslink' => $haslinkedin,
                'linkicon' => 'linkedin fa-brands'
            ) ,
            array(
                'haslink' => $hasyoutube,
                'linkicon' => 'youtube fa-brands '
            ) ,
            array(
                'haslink' => $hasvimeo,
                'linkicon' => 'vimeo fa-brands '
            ) ,
            array(
                'haslink' => $hasinstagram,
                'linkicon' => 'instagram fa-brands '
            ) ,
            array(
                'haslink' => $haspinterest,
                'linkicon' => 'pinterest fa-brands '
            ) ,
            array(
                'haslink' => $hasflickr,
                'linkicon' => 'flickr fa-brands '
            ) ,
            array(
                'haslink' => $hastumblr,
                'linkicon' => 'tumblr fa-brands '
            ) ,
            array(
                'haslink' => $hasslideshare,
                'linkicon' => 'slideshare fa-brands '
            ) ,
            array(
                'haslink' => $haswhatsapp,
                'linkicon' => 'whatsapp fa-brands'
            ) ,
            array(
                'haslink' => $hasskype,
                'linkicon' => 'skype fa-brands '
            ) ,

            array(
                'haslink' => $hassnapchat,
                'linkicon' => 'snapchat fa-brands '
            ) ,
            array(
                'haslink' => $hasweixin,
                'linkicon' => 'weixin fa-brands '
            ) ,
            array(
                'haslink' => $hasweibo,
                'linkicon' => 'weibo fa-brands '
            ) ,
            array(
                'haslink' => $hasrss,
                'linkicon' => 'rss fa-solid'
            ) ,
                       
            array(
                'haslink' => $hasreddit,
                'linkicon' => 'reddit fa-brands'
            ) ,
            array(
                'haslink' => $hassocial1,
                'linkicon' => $social1icon
            ) ,
            array(
                'haslink' => $hassocial2,
                'linkicon' => $social2icon
            ) ,
            array(
                'haslink' => $hassocial3,
                'linkicon' => $social3icon
            ) ,
            
        ) ];

        return $this->render_from_template('theme_edutor/footer_socialmedia', $socialcontext);
    }
    
    
   public function fp_hero() {
        global $PAGE, $OUTPUT;

        $useherosection = $PAGE->theme->settings->useherosection == 1;
        
        $useheroslideshowindicators = $PAGE->theme->settings->useheroslideshowindicators == 1;


        $hasslide1 = (empty($PAGE->theme->setting_file_url('slide1image', 'slide1image'))) ? false : $PAGE->theme->setting_file_url('slide1image', 'slide1image');
        $hasslide2 = (empty($PAGE->theme->setting_file_url('slide2image', 'slide2image'))) ? false : $PAGE->theme->setting_file_url('slide2image', 'slide2image');
        $hasslide3 = (empty($PAGE->theme->setting_file_url('slide3image', 'slide3image'))) ? false : $PAGE->theme->setting_file_url('slide3image', 'slide3image');
        $hasslide4 = (empty($PAGE->theme->setting_file_url('slide4image', 'slide4image'))) ? false : $PAGE->theme->setting_file_url('slide4image', 'slide4image');
        $hasslide5 = (empty($PAGE->theme->setting_file_url('slide5image', 'slide5image'))) ? false : $PAGE->theme->setting_file_url('slide5image', 'slide5image');
        $hasslide6 = (empty($PAGE->theme->setting_file_url('slide6image', 'slide6image'))) ? false : $PAGE->theme->setting_file_url('slide6image', 'slide6image');
   
        
        
        $slide1 = (empty($PAGE->theme->settings->slide1)) ? false : format_text($PAGE->theme->settings->slide1);
        $slide2 = (empty($PAGE->theme->settings->slide2)) ? false : format_text($PAGE->theme->settings->slide2);
        $slide3 = (empty($PAGE->theme->settings->slide3)) ? false : format_text($PAGE->theme->settings->slide3);
        $slide4 = (empty($PAGE->theme->settings->slide4)) ? false : format_text($PAGE->theme->settings->slide4);
        $slide5 = (empty($PAGE->theme->settings->slide5)) ? false : format_text($PAGE->theme->settings->slide5);
        $slide6 = (empty($PAGE->theme->settings->slide6)) ? false : format_text($PAGE->theme->settings->slide6);
        
        $slide1heading = (empty($PAGE->theme->settings->slide1heading)) ? false : format_text($PAGE->theme->settings->slide1heading);
        $slide2heading = (empty($PAGE->theme->settings->slide2heading)) ? false : format_text($PAGE->theme->settings->slide2heading);
        $slide3heading = (empty($PAGE->theme->settings->slide3heading)) ? false : format_text($PAGE->theme->settings->slide3heading);
        $slide4heading = (empty($PAGE->theme->settings->slide4heading)) ? false : format_text($PAGE->theme->settings->slide4heading);
        $slide5heading = (empty($PAGE->theme->settings->slide5heading)) ? false : format_text($PAGE->theme->settings->slide5heading);
        $slide6heading = (empty($PAGE->theme->settings->slide6heading)) ? false : format_text($PAGE->theme->settings->slide6heading);
        
        
        $slide1heading = (empty($PAGE->theme->settings->slide1heading)) ? false : format_text($PAGE->theme->settings->slide1heading);
        $slide2heading = (empty($PAGE->theme->settings->slide2heading)) ? false : format_text($PAGE->theme->settings->slide2heading);
        $slide3heading = (empty($PAGE->theme->settings->slide3heading)) ? false : format_text($PAGE->theme->settings->slide3heading);
        $slide4heading = (empty($PAGE->theme->settings->slide4heading)) ? false : format_text($PAGE->theme->settings->slide4heading);
        $slide5heading = (empty($PAGE->theme->settings->slide5heading)) ? false : format_text($PAGE->theme->settings->slide5heading);
        $slide6heading = (empty($PAGE->theme->settings->slide6heading)) ? false : format_text($PAGE->theme->settings->slide6heading);
        
        
        $slide1caption = (empty($PAGE->theme->settings->slide1caption)) ? false : format_text($PAGE->theme->settings->slide1caption);
        $slide2caption = (empty($PAGE->theme->settings->slide2caption)) ? false : format_text($PAGE->theme->settings->slide2caption);
        $slide3caption = (empty($PAGE->theme->settings->slide3caption)) ? false : format_text($PAGE->theme->settings->slide3caption);
        $slide4caption = (empty($PAGE->theme->settings->slide4caption)) ? false : format_text($PAGE->theme->settings->slide4caption);
        $slide5caption = (empty($PAGE->theme->settings->slide5caption)) ? false : format_text($PAGE->theme->settings->slide5caption);
        $slide6caption = (empty($PAGE->theme->settings->slide6caption)) ? false : format_text($PAGE->theme->settings->slide6caption);

        
        $slide1cta = (empty($PAGE->theme->settings->slide1cta)) ? false : format_text($PAGE->theme->settings->slide1cta);
        $slide2cta = (empty($PAGE->theme->settings->slide2cta)) ? false : format_text($PAGE->theme->settings->slide2cta);
        $slide3cta = (empty($PAGE->theme->settings->slide3cta)) ? false : format_text($PAGE->theme->settings->slide3cta);
        $slide4cta = (empty($PAGE->theme->settings->slide4cta)) ? false : format_text($PAGE->theme->settings->slide4cta);
        $slide5cta = (empty($PAGE->theme->settings->slide5cta)) ? false : format_text($PAGE->theme->settings->slide5cta);
        $slide6cta = (empty($PAGE->theme->settings->slide6cta)) ? false : format_text($PAGE->theme->settings->slide6cta);

        $slide1url = (empty($PAGE->theme->settings->slide1url)) ? false : $PAGE->theme->settings->slide1url;
        $slide2url = (empty($PAGE->theme->settings->slide2url)) ? false : $PAGE->theme->settings->slide2url;
        $slide3url = (empty($PAGE->theme->settings->slide3url)) ? false : $PAGE->theme->settings->slide3url;
        $slide4url = (empty($PAGE->theme->settings->slide4url)) ? false : $PAGE->theme->settings->slide4url;
        $slide5url = (empty($PAGE->theme->settings->slide5url)) ? false : $PAGE->theme->settings->slide5url;
        $slide6url = (empty($PAGE->theme->settings->slide6url)) ? false : $PAGE->theme->settings->slide6url;

        
        
        $slide1urlopennew = (empty($PAGE->theme->settings->slide1urlopennew )) ? false : $PAGE->theme->settings->slide1urlopennew;
        $slide2urlopennew = (empty($PAGE->theme->settings->slide2urlopennew )) ? false : $PAGE->theme->settings->slide2urlopennew;
        $slide3urlopennew = (empty($PAGE->theme->settings->slide3urlopennew )) ? false : $PAGE->theme->settings->slide3urlopennew;
        $slide4urlopennew = (empty($PAGE->theme->settings->slide4urlopennew )) ? false : $PAGE->theme->settings->slide4urlopennew;
        $slide5urlopennew = (empty($PAGE->theme->settings->slide5urlopennew )) ? false : $PAGE->theme->settings->slide5urlopennew;
        $slide6urlopennew = (empty($PAGE->theme->settings->slide6urlopennew )) ? false : $PAGE->theme->settings->slide6urlopennew;
       
        
        
        //hero logo image
        $herologoimage = (empty($PAGE->theme->setting_file_url('herologoimage', 'herologoimage'))) ? false : $PAGE->theme->setting_file_url('herologoimage', 'herologoimage');

        //hero video
        $useherovideo = $PAGE->theme->settings->useherovideo == 1;
        $videoplayicon = $OUTPUT->image_url('play-icon', 'theme');
        $herovideo = (empty($PAGE->theme->settings->herovideo)) ? false : format_text($PAGE->theme->settings->herovideo);        
        $herovideoswitcher = $PAGE->theme->settings->herovideoswitcher;       
        $herovideoid = (empty($PAGE->theme->settings->herovideoid)) ? false : $PAGE->theme->settings->herovideoid;
        
        


        $fp_hero = [

        'useherosection' => $useherosection,        
        'useheroslideshowindicators' => $useheroslideshowindicators,

        'herologoimage' => $herologoimage,

        'useherovideo' => $useherovideo,
        'videoplayicon' => $videoplayicon,
        'herovideo' => $herovideo,
        'useyoutubevideo' => $herovideoswitcher == 1,
        'usevimeovideo' => $herovideoswitcher == 2,
        'herovideoid' => $herovideoid,
        
        
        
        'slideshow' => array(
	        
            array(
	            'slidenumber'=> '1',
	            'slidedatanumber'=> '0',
	            'slideactive' => 1,
                'hasslide' => $hasslide1,
                'slideimage' => $hasslide1,
                'slideheading' => $slide1heading,
                'slidecaption' => $slide1caption,                
                'hasslidedata'=> ($slide1caption || $slide1) ? true: false,
                'slidecta' => $slide1cta,
                'slideurl' => $slide1url,
                'urlopennew' => $slide1urlopennew,
            ) ,
            
            array(
	            'slidenumber'=> '2',
	            'slidedatanumber'=> '1',
	            'slideactive' => 0,
                'hasslide' => $hasslide2,
                'slideimage' => $hasslide2,
                'slideheading' => $slide2heading,
                'slidecaption' => $slide2caption,                
                'hasslidedata'=> ($slide2caption || $slide2) ? true: false,
                'slidecta' => $slide2cta,
                'slideurl' => $slide2url,
                'urlopennew' => $slide2urlopennew,
            ) ,
            
            array(
	            'slidenumber'=> '3',
	            'slidedatanumber'=> '2',
	            'slideactive' => 0,
                'hasslide' => $hasslide3,
                'slideimage' => $hasslide3,
                'slideheading' => $slide3heading,
                'slidecaption' => $slide3caption,                
                'hasslidedata'=> ($slide3caption || $slide3) ? true: false,
                'slidecta' => $slide3cta,
                'slideurl' => $slide3url,
                'urlopennew' => $slide3urlopennew,
            ) ,
            
            array(
	            'slidenumber'=> '4',
	            'slidedatanumber'=> '3',
	            'slideactive' => 0,
                'hasslide' => $hasslide4,
                'slideimage' => $hasslide4,
                'slideheading' => $slide4heading,
                'slidecaption' => $slide4caption,                
                'hasslidedata'=> ($slide4caption || $slide4) ? true: false,
                'slidecta' => $slide4cta,
                'slideurl' => $slide4url,
                'urlopennew' => $slide4urlopennew,
            ) , 
            
            array(
	            'slidenumber'=> '5',
	            'slidedatanumber'=> '4',
	            'slideactive' => 0,
                'hasslide' => $hasslide5,
                'slideimage' => $hasslide5,
                'slideheading' => $slide5heading,
                'slidecaption' => $slide5caption,                
                'hasslidedata'=> ($slide5caption || $slide5) ? true: false,
                'slidecta' => $slide5cta,
                'slideurl' => $slide5url,
                'urlopennew' => $slide5urlopennew,
            ) , 
            
            array(
	            'slidenumber'=> '6',
	            'slidedatanumber'=> '5',
	            'slideactive' => 0,
                'hasslide' => $hasslide6,
                'slideimage' => $hasslide6,
                'slideheading' => $slide6heading,
                'slidecaption' => $slide6caption,                
                'hasslidedata'=> ($slide6caption || $slide6) ? true: false,
                'slidecta' => $slide6cta,
                'slideurl' => $slide6url,
                'urlopennew' => $slide6urlopennew,
            ) , 
            
                       
        ),


        ];

        return $this->render_from_template('theme_edutor/fp_hero', $fp_hero);
    }
    
    
    
    public function fp_search() {
	    
        global $PAGE;
        
        $usesearchsection = $PAGE->theme->settings->usesearchsection == 1;
        $searchsectiontitle = (empty($PAGE->theme->settings->searchsectiontitle)) ? false : format_text($PAGE->theme->settings->searchsectiontitle);
        
        $searchsectionintro = (empty($PAGE->theme->settings->searchsectiontitle)) ? false : format_text($PAGE->theme->settings->searchsectionintro);
        
        $usesearch = $PAGE->theme->settings->usesearch== 1;
        
        
        $searchsectionbuttontext = (empty($PAGE->theme->settings->searchsectionbuttontext)) ? false : format_text($PAGE->theme->settings->searchsectionbuttontext);
        $searchsectionbuttonurl = (empty($PAGE->theme->settings->searchsectionbuttonurl)) ? false : $PAGE->theme->settings->searchsectionbuttonurl;
        $searchsectionbuttonurlopennew = (empty($PAGE->theme->settings->searchsectionbuttonurlopennew)) ? false : $PAGE->theme->settings->searchsectionbuttonurlopennew;
        
        
        $fp_search = [

        'usesearchsection' => $usesearchsection,
        'searchsectiontitle' => $searchsectiontitle,
        'searchsectionintro' => $searchsectionintro,
        
        'hassearch' => $usesearch, 
        
        
        'searchsectionbuttontext' => $searchsectionbuttontext,
        'searchsectionbuttonurl' => $searchsectionbuttonurl,
        'searchsectionbuttonurlopennew' => $searchsectionbuttonurlopennew,
        
       ];
       
       return $this->render_from_template('theme_edutor/fp_search', $fp_search);
    
    }
    

    
    public function fp_featured() {
        global $PAGE;
        
        $usefeaturedsection = $PAGE->theme->settings->usefeaturedsection == 1;
        $featuredsectiontitle = (empty($PAGE->theme->settings->featuredsectiontitle)) ? false : format_text($PAGE->theme->settings->featuredsectiontitle);        
        $featuredsectionintro = (empty($PAGE->theme->settings->featuredsectionintro)) ? false : format_text($PAGE->theme->settings->featuredsectionintro);
        
        
        // Tabs   
        $tab1name = (empty($PAGE->theme->settings->tab1name)) ? false : format_text($PAGE->theme->settings->tab1name);  
        $tab2name = (empty($PAGE->theme->settings->tab2name)) ? false : format_text($PAGE->theme->settings->tab2name);  
        $tab3name = (empty($PAGE->theme->settings->tab3name)) ? false : format_text($PAGE->theme->settings->tab3name);  
        $tab4name = (empty($PAGE->theme->settings->tab4name)) ? false : format_text($PAGE->theme->settings->tab4name);  
        $tab5name = (empty($PAGE->theme->settings->tab5name)) ? false : format_text($PAGE->theme->settings->tab5name);  
        $tab6name = (empty($PAGE->theme->settings->tab6name)) ? false : format_text($PAGE->theme->settings->tab6name);  
        
        $tab1icon = (empty($PAGE->theme->settings->tab1icon)) ? false : $PAGE->theme->settings->tab1icon;  
        $tab2icon = (empty($PAGE->theme->settings->tab2icon)) ? false : $PAGE->theme->settings->tab2icon;  
        $tab3icon = (empty($PAGE->theme->settings->tab3icon)) ? false : $PAGE->theme->settings->tab3icon;  
        $tab4icon = (empty($PAGE->theme->settings->tab4icon)) ? false : $PAGE->theme->settings->tab4icon;  
        $tab5icon = (empty($PAGE->theme->settings->tab5icon)) ? false : $PAGE->theme->settings->tab5icon;  
        $tab6icon = (empty($PAGE->theme->settings->tab6icon)) ? false : $PAGE->theme->settings->tab6icon; 

        

         //Pane One
        
        $pane1title = (empty($PAGE->theme->settings->pane1title)) ? false : format_text($PAGE->theme->settings->pane1title);  
        $pane1intro = (empty($PAGE->theme->settings->pane1intro)) ? false : format_text($PAGE->theme->settings->pane1intro);  
        
        // Pane One Block 1
        $usepane1blocks = $PAGE->theme->settings->usepane1blocks == 1;
        $pane1block1title = (empty($PAGE->theme->settings->pane1block1title)) ? false : format_text($PAGE->theme->settings->pane1block1title);
        $pane1block1content = (empty($PAGE->theme->settings->pane1block1content)) ? false : format_text($PAGE->theme->settings->pane1block1content);
        $pane1block1url = (empty($PAGE->theme->settings->pane1block1url)) ? false : $PAGE->theme->settings->pane1block1url;
        $pane1block1urlopennew = (empty($PAGE->theme->settings->pane1block1urlopennew)) ? false : $PAGE->theme->settings->pane1block1urlopennew;
        
        $pane1block1image = (empty($PAGE->theme->setting_file_url('pane1block1image', 'pane1block1image'))) ? false : $PAGE->theme->setting_file_url('pane1block1image', 'pane1block1image');
        
        
        $pane1block1label = (empty($PAGE->theme->settings->pane1block1label)) ? false : format_text($PAGE->theme->settings->pane1block1label);
        $pane1block1price = (empty($PAGE->theme->settings->pane1block1price)) ? false : format_text($PAGE->theme->settings->pane1block1price);
        
        // Pane One Block 2
        $pane1block2title = (empty($PAGE->theme->settings->pane1block2title)) ? false : format_text($PAGE->theme->settings->pane1block2title);
        $pane1block2content = (empty($PAGE->theme->settings->pane1block2content)) ? false : format_text($PAGE->theme->settings->pane1block2content);
        $pane1block2url = (empty($PAGE->theme->settings->pane1block2url)) ? false : $PAGE->theme->settings->pane1block2url;
        $pane1block2urlopennew = (empty($PAGE->theme->settings->pane1block2urlopennew)) ? false : $PAGE->theme->settings->pane1block2urlopennew;
        $pane1block2image = (empty($PAGE->theme->setting_file_url('pane1block2image', 'pane1block2image'))) ? false : $PAGE->theme->setting_file_url('pane1block2image', 'pane1block2image');
        $pane1block2label = (empty($PAGE->theme->settings->pane1block2label)) ? false : format_text($PAGE->theme->settings->pane1block2label);
        $pane1block2price = (empty($PAGE->theme->settings->pane1block2price)) ? false : format_text($PAGE->theme->settings->pane1block2price);
        
        // Pane One Block 3
        $pane1block3title = (empty($PAGE->theme->settings->pane1block3title)) ? false : format_text($PAGE->theme->settings->pane1block3title);
        $pane1block3content = (empty($PAGE->theme->settings->pane1block3content)) ? false : format_text($PAGE->theme->settings->pane1block3content);
        $pane1block3url = (empty($PAGE->theme->settings->pane1block3url)) ? false : $PAGE->theme->settings->pane1block3url;
        $pane1block3urlopennew = (empty($PAGE->theme->settings->pane1block3urlopennew)) ? false : $PAGE->theme->settings->pane1block3urlopennew;
        $pane1block3image = (empty($PAGE->theme->setting_file_url('pane1block3image', 'pane1block3image'))) ? false : $PAGE->theme->setting_file_url('pane1block3image', 'pane1block3image');
        $pane1block3label = (empty($PAGE->theme->settings->pane1block3label)) ? false : format_text($PAGE->theme->settings->pane1block3label);
        $pane1block3price = (empty($PAGE->theme->settings->pane1block3price)) ? false : format_text($PAGE->theme->settings->pane1block3price);
        
        // Pane One Block 4
        $pane1block4title = (empty($PAGE->theme->settings->pane1block4title)) ? false : format_text($PAGE->theme->settings->pane1block4title);
        $pane1block4content = (empty($PAGE->theme->settings->pane1block4content)) ? false : format_text($PAGE->theme->settings->pane1block4content);
        $pane1block4url = (empty($PAGE->theme->settings->pane1block4url)) ? false : $PAGE->theme->settings->pane1block4url;
        $pane1block4urlopennew = (empty($PAGE->theme->settings->pane1block4urlopennew)) ? false : $PAGE->theme->settings->pane1block4urlopennew;
        $pane1block4image = (empty($PAGE->theme->setting_file_url('pane1block4image', 'pane1block4image'))) ? false : $PAGE->theme->setting_file_url('pane1block4image', 'pane1block4image');
        $pane1block4label = (empty($PAGE->theme->settings->pane1block4label)) ? false : format_text($PAGE->theme->settings->pane1block4label);
        $pane1block4price = (empty($PAGE->theme->settings->pane1block4price)) ? false : format_text($PAGE->theme->settings->pane1block4price);
        
        // Pane One Block 5
        $pane1block5title = (empty($PAGE->theme->settings->pane1block5title)) ? false : format_text($PAGE->theme->settings->pane1block5title);
        $pane1block5content = (empty($PAGE->theme->settings->pane1block5content)) ? false : format_text($PAGE->theme->settings->pane1block5content);
        $pane1block5url = (empty($PAGE->theme->settings->pane1block5url)) ? false : $PAGE->theme->settings->pane1block5url;
        $pane1block5urlopennew = (empty($PAGE->theme->settings->pane1block5urlopennew)) ? false : $PAGE->theme->settings->pane1block5urlopennew;
        $pane1block5image = (empty($PAGE->theme->setting_file_url('pane1block5image', 'pane1block5image'))) ? false : $PAGE->theme->setting_file_url('pane1block5image', 'pane1block5image');
        $pane1block5label = (empty($PAGE->theme->settings->pane1block5label)) ? false : format_text($PAGE->theme->settings->pane1block5label);
        $pane1block5price = (empty($PAGE->theme->settings->pane1block5price)) ? false : format_text($PAGE->theme->settings->pane1block5price);
        
        // Pane One Block 6
        $pane1block6title = (empty($PAGE->theme->settings->pane1block6title)) ? false : format_text($PAGE->theme->settings->pane1block6title);
        $pane1block6content = (empty($PAGE->theme->settings->pane1block6content)) ? false : format_text($PAGE->theme->settings->pane1block6content);
        $pane1block6url = (empty($PAGE->theme->settings->pane1block6url)) ? false : $PAGE->theme->settings->pane1block6url;
        $pane1block6urlopennew = (empty($PAGE->theme->settings->pane1block6urlopennew)) ? false : $PAGE->theme->settings->pane1block6urlopennew;
        $pane1block6image = (empty($PAGE->theme->setting_file_url('pane1block6image', 'pane1block6image'))) ? false : $PAGE->theme->setting_file_url('pane1block6image', 'pane1block6image');
        $pane1block6label = (empty($PAGE->theme->settings->pane1block6label)) ? false : format_text($PAGE->theme->settings->pane1block6label);
        $pane1block6price = (empty($PAGE->theme->settings->pane1block6price)) ? false : format_text($PAGE->theme->settings->pane1block6price);
        
        
        // Pane One Block 7
        $pane1block7title = (empty($PAGE->theme->settings->pane1block7title)) ? false : format_text($PAGE->theme->settings->pane1block7title);
        $pane1block7content = (empty($PAGE->theme->settings->pane1block7content)) ? false : format_text($PAGE->theme->settings->pane1block7content);
        $pane1block7url = (empty($PAGE->theme->settings->pane1block7url)) ? false : $PAGE->theme->settings->pane1block7url;
        $pane1block7urlopennew = (empty($PAGE->theme->settings->pane1block7urlopennew)) ? false : $PAGE->theme->settings->pane1block7urlopennew;
        $pane1block7image = (empty($PAGE->theme->setting_file_url('pane1block7image', 'pane1block7image'))) ? false : $PAGE->theme->setting_file_url('pane1block7image', 'pane1block7image');
        $pane1block7label = (empty($PAGE->theme->settings->pane1block7label)) ? false : format_text($PAGE->theme->settings->pane1block7label);
        $pane1block7price = (empty($PAGE->theme->settings->pane1block7price)) ? false : format_text($PAGE->theme->settings->pane1block7price);
        
        
        // Pane One Block 8
        $pane1block8title = (empty($PAGE->theme->settings->pane1block8title)) ? false : format_text($PAGE->theme->settings->pane1block8title);
        $pane1block8content = (empty($PAGE->theme->settings->pane1block8content)) ? false : format_text($PAGE->theme->settings->pane1block8content);
        $pane1block8url = (empty($PAGE->theme->settings->pane1block8url)) ? false : $PAGE->theme->settings->pane1block8url;
        $pane1block8urlopennew = (empty($PAGE->theme->settings->pane1block8urlopennew)) ? false : $PAGE->theme->settings->pane1block8urlopennew;
        $pane1block8image = (empty($PAGE->theme->setting_file_url('pane1block8image', 'pane1block8image'))) ? false : $PAGE->theme->setting_file_url('pane1block8image', 'pane1block8image');
        $pane1block8label = (empty($PAGE->theme->settings->pane1block8label)) ? false : format_text($PAGE->theme->settings->pane1block8label);
        $pane1block8price = (empty($PAGE->theme->settings->pane1block8price)) ? false : format_text($PAGE->theme->settings->pane1block8price);
        
        // Pane One Block 9
        $pane1block9title = (empty($PAGE->theme->settings->pane1block9title)) ? false : format_text($PAGE->theme->settings->pane1block9title);
        $pane1block9content = (empty($PAGE->theme->settings->pane1block9content)) ? false : format_text($PAGE->theme->settings->pane1block9content);
        $pane1block9url = (empty($PAGE->theme->settings->pane1block9url)) ? false : $PAGE->theme->settings->pane1block9url;
        $pane1block9urlopennew = (empty($PAGE->theme->settings->pane1block9urlopennew)) ? false : $PAGE->theme->settings->pane1block9urlopennew;
        $pane1block9image = (empty($PAGE->theme->setting_file_url('pane1block9image', 'pane1block9image'))) ? false : $PAGE->theme->setting_file_url('pane1block9image', 'pane1block9image');
        $pane1block9label = (empty($PAGE->theme->settings->pane1block9label)) ? false : format_text($PAGE->theme->settings->pane1block9label);
        $pane1block9price = (empty($PAGE->theme->settings->pane1block9price)) ? false : format_text($PAGE->theme->settings->pane1block9price);
        
        
        // Pane One Block 10
        $pane1block10title = (empty($PAGE->theme->settings->pane1block10title)) ? false : format_text($PAGE->theme->settings->pane1block10title);
        $pane1block10content = (empty($PAGE->theme->settings->pane1block10content)) ? false : format_text($PAGE->theme->settings->pane1block10content);
        $pane1block10url = (empty($PAGE->theme->settings->pane1block10url)) ? false : $PAGE->theme->settings->pane1block10url;
        $pane1block10urlopennew = (empty($PAGE->theme->settings->pane1block10urlopennew)) ? false : $PAGE->theme->settings->pane1block10urlopennew;
        $pane1block10image = (empty($PAGE->theme->setting_file_url('pane1block10image', 'pane1block10image'))) ? false : $PAGE->theme->setting_file_url('pane1block10image', 'pane1block10image');
        $pane1block10label = (empty($PAGE->theme->settings->pane1block10label)) ? false : format_text($PAGE->theme->settings->pane1block10label);
        $pane1block10price = (empty($PAGE->theme->settings->pane1block10price)) ? false : format_text($PAGE->theme->settings->pane1block10price);
        
        
        
        
         //Pane Two
        
        $pane2title = (empty($PAGE->theme->settings->pane2title)) ? false : format_text($PAGE->theme->settings->pane2title);  
        $pane2intro = (empty($PAGE->theme->settings->pane2intro)) ? false : format_text($PAGE->theme->settings->pane2intro); 
        
        
        // Pane Two Block 1
        $usepane2blocks = $PAGE->theme->settings->usepane2blocks == 1;
        $pane2block1title = (empty($PAGE->theme->settings->pane2block1title)) ? false : format_text($PAGE->theme->settings->pane2block1title);
        $pane2block1content = (empty($PAGE->theme->settings->pane2block1content)) ? false : format_text($PAGE->theme->settings->pane2block1content);
        $pane2block1url = (empty($PAGE->theme->settings->pane2block1url)) ? false : $PAGE->theme->settings->pane2block1url;
        $pane2block1urlopennew = (empty($PAGE->theme->settings->pane2block1urlopennew)) ? false : $PAGE->theme->settings->pane2block1urlopennew;
        
        $pane2block1image = (empty($PAGE->theme->setting_file_url('pane2block1image', 'pane2block1image'))) ? false : $PAGE->theme->setting_file_url('pane2block1image', 'pane2block1image');
        
        
        $pane2block1label = (empty($PAGE->theme->settings->pane2block1label)) ? false : format_text($PAGE->theme->settings->pane2block1label);
        $pane2block1price = (empty($PAGE->theme->settings->pane2block1price)) ? false : format_text($PAGE->theme->settings->pane2block1price);
        
        // Pane Two Block 2
        $pane2block2title = (empty($PAGE->theme->settings->pane2block2title)) ? false : format_text($PAGE->theme->settings->pane2block2title);
        $pane2block2content = (empty($PAGE->theme->settings->pane2block2content)) ? false : format_text($PAGE->theme->settings->pane2block2content);
        $pane2block2url = (empty($PAGE->theme->settings->pane2block2url)) ? false : $PAGE->theme->settings->pane2block2url;
        $pane2block2urlopennew = (empty($PAGE->theme->settings->pane2block2urlopennew)) ? false : $PAGE->theme->settings->pane2block2urlopennew;
        $pane2block2image = (empty($PAGE->theme->setting_file_url('pane2block2image', 'pane2block2image'))) ? false : $PAGE->theme->setting_file_url('pane2block2image', 'pane2block2image');
        $pane2block2label = (empty($PAGE->theme->settings->pane2block2label)) ? false : format_text($PAGE->theme->settings->pane2block2label);
        $pane2block2price = (empty($PAGE->theme->settings->pane2block2price)) ? false : format_text($PAGE->theme->settings->pane2block2price);
        
        // Pane Two Block 3
        $pane2block3title = (empty($PAGE->theme->settings->pane2block3title)) ? false : format_text($PAGE->theme->settings->pane2block3title);
        $pane2block3content = (empty($PAGE->theme->settings->pane2block3content)) ? false : format_text($PAGE->theme->settings->pane2block3content);
        $pane2block3url = (empty($PAGE->theme->settings->pane2block3url)) ? false : $PAGE->theme->settings->pane2block3url;
        $pane2block3urlopennew = (empty($PAGE->theme->settings->pane2block3urlopennew)) ? false : $PAGE->theme->settings->pane2block3urlopennew;
        $pane2block3image = (empty($PAGE->theme->setting_file_url('pane2block3image', 'pane2block3image'))) ? false : $PAGE->theme->setting_file_url('pane2block3image', 'pane2block3image');
        $pane2block3label = (empty($PAGE->theme->settings->pane2block3label)) ? false : format_text($PAGE->theme->settings->pane2block3label);
        $pane2block3price = (empty($PAGE->theme->settings->pane2block3price)) ? false : format_text($PAGE->theme->settings->pane2block3price);
        
        // Pane Two Block 4
        $pane2block4title = (empty($PAGE->theme->settings->pane2block4title)) ? false : format_text($PAGE->theme->settings->pane2block4title);
        $pane2block4content = (empty($PAGE->theme->settings->pane2block4content)) ? false : format_text($PAGE->theme->settings->pane2block4content);
        $pane2block4url = (empty($PAGE->theme->settings->pane2block4url)) ? false : $PAGE->theme->settings->pane2block4url;
        $pane2block4urlopennew = (empty($PAGE->theme->settings->pane2block4urlopennew)) ? false : $PAGE->theme->settings->pane2block4urlopennew;
        $pane2block4image = (empty($PAGE->theme->setting_file_url('pane2block4image', 'pane2block4image'))) ? false : $PAGE->theme->setting_file_url('pane2block4image', 'pane2block4image');
        $pane2block4label = (empty($PAGE->theme->settings->pane2block4label)) ? false : format_text($PAGE->theme->settings->pane2block4label);
        $pane2block4price = (empty($PAGE->theme->settings->pane2block4price)) ? false : format_text($PAGE->theme->settings->pane2block4price);
        
        // Pane Two Block 5
        $pane2block5title = (empty($PAGE->theme->settings->pane2block5title)) ? false : format_text($PAGE->theme->settings->pane2block5title);
        $pane2block5content = (empty($PAGE->theme->settings->pane2block5content)) ? false : format_text($PAGE->theme->settings->pane2block5content);
        $pane2block5url = (empty($PAGE->theme->settings->pane2block5url)) ? false : $PAGE->theme->settings->pane2block5url;
        $pane2block5urlopennew = (empty($PAGE->theme->settings->pane2block5urlopennew)) ? false : $PAGE->theme->settings->pane2block5urlopennew;
        $pane2block5image = (empty($PAGE->theme->setting_file_url('pane2block5image', 'pane2block5image'))) ? false : $PAGE->theme->setting_file_url('pane2block5image', 'pane2block5image');
        $pane2block5label = (empty($PAGE->theme->settings->pane2block5label)) ? false : format_text($PAGE->theme->settings->pane2block5label);
        $pane2block5price = (empty($PAGE->theme->settings->pane2block5price)) ? false : format_text($PAGE->theme->settings->pane2block5price);
        
        // Pane Two Block 6
        $pane2block6title = (empty($PAGE->theme->settings->pane2block6title)) ? false : format_text($PAGE->theme->settings->pane2block6title);
        $pane2block6content = (empty($PAGE->theme->settings->pane2block6content)) ? false : format_text($PAGE->theme->settings->pane2block6content);
        $pane2block6url = (empty($PAGE->theme->settings->pane2block6url)) ? false : $PAGE->theme->settings->pane2block6url;
        $pane2block6urlopennew = (empty($PAGE->theme->settings->pane2block6urlopennew)) ? false : $PAGE->theme->settings->pane2block6urlopennew;
        $pane2block6image = (empty($PAGE->theme->setting_file_url('pane2block6image', 'pane2block6image'))) ? false : $PAGE->theme->setting_file_url('pane2block6image', 'pane2block6image');
        $pane2block6label = (empty($PAGE->theme->settings->pane2block6label)) ? false : format_text($PAGE->theme->settings->pane2block6label);
        $pane2block6price = (empty($PAGE->theme->settings->pane2block6price)) ? false : format_text($PAGE->theme->settings->pane2block6price);
        
        
        // Pane Two Block 7
        $pane2block7title = (empty($PAGE->theme->settings->pane2block7title)) ? false : format_text($PAGE->theme->settings->pane2block7title);
        $pane2block7content = (empty($PAGE->theme->settings->pane2block7content)) ? false : format_text($PAGE->theme->settings->pane2block7content);
        $pane2block7url = (empty($PAGE->theme->settings->pane2block7url)) ? false : $PAGE->theme->settings->pane2block7url;
        $pane2block7urlopennew = (empty($PAGE->theme->settings->pane2block7urlopennew)) ? false : $PAGE->theme->settings->pane2block7urlopennew;
        $pane2block7image = (empty($PAGE->theme->setting_file_url('pane2block7image', 'pane2block7image'))) ? false : $PAGE->theme->setting_file_url('pane2block7image', 'pane2block7image');
        $pane2block7label = (empty($PAGE->theme->settings->pane2block7label)) ? false : format_text($PAGE->theme->settings->pane2block7label);
        $pane2block7price = (empty($PAGE->theme->settings->pane2block7price)) ? false : format_text($PAGE->theme->settings->pane2block7price);
        
        
        // Pane Two Block 8
        $pane2block8title = (empty($PAGE->theme->settings->pane2block8title)) ? false : format_text($PAGE->theme->settings->pane2block8title);
        $pane2block8content = (empty($PAGE->theme->settings->pane2block8content)) ? false : format_text($PAGE->theme->settings->pane2block8content);
        $pane2block8url = (empty($PAGE->theme->settings->pane2block8url)) ? false : $PAGE->theme->settings->pane2block8url;
        $pane2block8urlopennew = (empty($PAGE->theme->settings->pane2block8urlopennew)) ? false : $PAGE->theme->settings->pane2block8urlopennew;
        $pane2block8image = (empty($PAGE->theme->setting_file_url('pane2block8image', 'pane2block8image'))) ? false : $PAGE->theme->setting_file_url('pane2block8image', 'pane2block8image');
        $pane2block8label = (empty($PAGE->theme->settings->pane2block8label)) ? false : format_text($PAGE->theme->settings->pane2block8label);
        $pane2block8price = (empty($PAGE->theme->settings->pane2block8price)) ? false : format_text($PAGE->theme->settings->pane2block8price);
        
        // Pane Two Block 9
        $pane2block9title = (empty($PAGE->theme->settings->pane2block9title)) ? false : format_text($PAGE->theme->settings->pane2block9title);
        $pane2block9content = (empty($PAGE->theme->settings->pane2block9content)) ? false : format_text($PAGE->theme->settings->pane2block9content);
        $pane2block9url = (empty($PAGE->theme->settings->pane2block9url)) ? false : $PAGE->theme->settings->pane2block9url;
        $pane2block9urlopennew = (empty($PAGE->theme->settings->pane2block9urlopennew)) ? false : $PAGE->theme->settings->pane2block9urlopennew;
        $pane2block9image = (empty($PAGE->theme->setting_file_url('pane2block9image', 'pane2block9image'))) ? false : $PAGE->theme->setting_file_url('pane2block9image', 'pane2block9image');
        $pane2block9label = (empty($PAGE->theme->settings->pane2block9label)) ? false : format_text($PAGE->theme->settings->pane2block9label);
        $pane2block9price = (empty($PAGE->theme->settings->pane2block9price)) ? false : format_text($PAGE->theme->settings->pane2block9price);
        
        
        // Pane Two Block 10
        $pane2block10title = (empty($PAGE->theme->settings->pane2block10title)) ? false : format_text($PAGE->theme->settings->pane2block10title);
        $pane2block10content = (empty($PAGE->theme->settings->pane2block10content)) ? false : format_text($PAGE->theme->settings->pane2block10content);
        $pane2block10url = (empty($PAGE->theme->settings->pane2block10url)) ? false : $PAGE->theme->settings->pane2block10url;
        $pane2block10urlopennew = (empty($PAGE->theme->settings->pane2block10urlopennew)) ? false : $PAGE->theme->settings->pane2block10urlopennew;
        $pane2block10image = (empty($PAGE->theme->setting_file_url('pane2block10image', 'pane2block10image'))) ? false : $PAGE->theme->setting_file_url('pane2block10image', 'pane2block10image');
        $pane2block10label = (empty($PAGE->theme->settings->pane2block10label)) ? false : format_text($PAGE->theme->settings->pane2block10label);
        $pane2block10price = (empty($PAGE->theme->settings->pane2block10price)) ? false : format_text($PAGE->theme->settings->pane2block10price);
        
        
        
        
        //Pane Three
        
        $pane3title = (empty($PAGE->theme->settings->pane3title)) ? false : format_text($PAGE->theme->settings->pane3title);  
        $pane3intro = (empty($PAGE->theme->settings->pane3intro)) ? false : format_text($PAGE->theme->settings->pane3intro); 
        
        
        // Pane Three Block 1
        $usepane3blocks = $PAGE->theme->settings->usepane3blocks == 1;
        $pane3block1title = (empty($PAGE->theme->settings->pane3block1title)) ? false : format_text($PAGE->theme->settings->pane3block1title);
        $pane3block1content = (empty($PAGE->theme->settings->pane3block1content)) ? false : format_text($PAGE->theme->settings->pane3block1content);
        $pane3block1url = (empty($PAGE->theme->settings->pane3block1url)) ? false : $PAGE->theme->settings->pane3block1url;
        $pane3block1urlopennew = (empty($PAGE->theme->settings->pane3block1urlopennew)) ? false : $PAGE->theme->settings->pane3block1urlopennew;
        
        $pane3block1image = (empty($PAGE->theme->setting_file_url('pane3block1image', 'pane3block1image'))) ? false : $PAGE->theme->setting_file_url('pane3block1image', 'pane3block1image');
        
        
        $pane3block1label = (empty($PAGE->theme->settings->pane3block1label)) ? false : format_text($PAGE->theme->settings->pane3block1label);
        $pane3block1price = (empty($PAGE->theme->settings->pane3block1price)) ? false : format_text($PAGE->theme->settings->pane3block1price);
        
        // Pane Three Block 2
        $pane3block2title = (empty($PAGE->theme->settings->pane3block2title)) ? false : format_text($PAGE->theme->settings->pane3block2title);
        $pane3block2content = (empty($PAGE->theme->settings->pane3block2content)) ? false : format_text($PAGE->theme->settings->pane3block2content);
        $pane3block2url = (empty($PAGE->theme->settings->pane3block2url)) ? false : $PAGE->theme->settings->pane3block2url;
        $pane3block2urlopennew = (empty($PAGE->theme->settings->pane3block2urlopennew)) ? false : $PAGE->theme->settings->pane3block2urlopennew;
        $pane3block2image = (empty($PAGE->theme->setting_file_url('pane3block2image', 'pane3block2image'))) ? false : $PAGE->theme->setting_file_url('pane3block2image', 'pane3block2image');
        $pane3block2label = (empty($PAGE->theme->settings->pane3block2label)) ? false : format_text($PAGE->theme->settings->pane3block2label);
        $pane3block2price = (empty($PAGE->theme->settings->pane3block2price)) ? false : format_text($PAGE->theme->settings->pane3block2price);
        
        // Pane Three Block 3
        $pane3block3title = (empty($PAGE->theme->settings->pane3block3title)) ? false : format_text($PAGE->theme->settings->pane3block3title);
        $pane3block3content = (empty($PAGE->theme->settings->pane3block3content)) ? false : format_text($PAGE->theme->settings->pane3block3content);
        $pane3block3url = (empty($PAGE->theme->settings->pane3block3url)) ? false : $PAGE->theme->settings->pane3block3url;
        $pane3block3urlopennew = (empty($PAGE->theme->settings->pane3block3urlopennew)) ? false : $PAGE->theme->settings->pane3block3urlopennew;
        $pane3block3image = (empty($PAGE->theme->setting_file_url('pane3block3image', 'pane3block3image'))) ? false : $PAGE->theme->setting_file_url('pane3block3image', 'pane3block3image');
        $pane3block3label = (empty($PAGE->theme->settings->pane3block3label)) ? false : format_text($PAGE->theme->settings->pane3block3label);
        $pane3block3price = (empty($PAGE->theme->settings->pane3block3price)) ? false : format_text($PAGE->theme->settings->pane3block3price);
        
        // Pane Three Block 4
        $pane3block4title = (empty($PAGE->theme->settings->pane3block4title)) ? false : format_text($PAGE->theme->settings->pane3block4title);
        $pane3block4content = (empty($PAGE->theme->settings->pane3block4content)) ? false : format_text($PAGE->theme->settings->pane3block4content);
        $pane3block4url = (empty($PAGE->theme->settings->pane3block4url)) ? false : $PAGE->theme->settings->pane3block4url;
        $pane3block4urlopennew = (empty($PAGE->theme->settings->pane3block4urlopennew)) ? false : $PAGE->theme->settings->pane3block4urlopennew;
        $pane3block4image = (empty($PAGE->theme->setting_file_url('pane3block4image', 'pane3block4image'))) ? false : $PAGE->theme->setting_file_url('pane3block4image', 'pane3block4image');
        $pane3block4label = (empty($PAGE->theme->settings->pane3block4label)) ? false : format_text($PAGE->theme->settings->pane3block4label);
        $pane3block4price = (empty($PAGE->theme->settings->pane3block4price)) ? false : format_text($PAGE->theme->settings->pane3block4price);
        
        // Pane Three Block 5
        $pane3block5title = (empty($PAGE->theme->settings->pane3block5title)) ? false : format_text($PAGE->theme->settings->pane3block5title);
        $pane3block5content = (empty($PAGE->theme->settings->pane3block5content)) ? false : format_text($PAGE->theme->settings->pane3block5content);
        $pane3block5url = (empty($PAGE->theme->settings->pane3block5url)) ? false : $PAGE->theme->settings->pane3block5url;
        $pane3block5urlopennew = (empty($PAGE->theme->settings->pane3block5urlopennew)) ? false : $PAGE->theme->settings->pane3block5urlopennew;
        $pane3block5image = (empty($PAGE->theme->setting_file_url('pane3block5image', 'pane3block5image'))) ? false : $PAGE->theme->setting_file_url('pane3block5image', 'pane3block5image');
        $pane3block5label = (empty($PAGE->theme->settings->pane3block5label)) ? false : format_text($PAGE->theme->settings->pane3block5label);
        $pane3block5price = (empty($PAGE->theme->settings->pane3block5price)) ? false : format_text($PAGE->theme->settings->pane3block5price);
        
        // Pane Three Block 6
        $pane3block6title = (empty($PAGE->theme->settings->pane3block6title)) ? false : format_text($PAGE->theme->settings->pane3block6title);
        $pane3block6content = (empty($PAGE->theme->settings->pane3block6content)) ? false : format_text($PAGE->theme->settings->pane3block6content);
        $pane3block6url = (empty($PAGE->theme->settings->pane3block6url)) ? false : $PAGE->theme->settings->pane3block6url;
        $pane3block6urlopennew = (empty($PAGE->theme->settings->pane3block6urlopennew)) ? false : $PAGE->theme->settings->pane3block6urlopennew;
        $pane3block6image = (empty($PAGE->theme->setting_file_url('pane3block6image', 'pane3block6image'))) ? false : $PAGE->theme->setting_file_url('pane3block6image', 'pane3block6image');
        $pane3block6label = (empty($PAGE->theme->settings->pane3block6label)) ? false : format_text($PAGE->theme->settings->pane3block6label);
        $pane3block6price = (empty($PAGE->theme->settings->pane3block6price)) ? false : format_text($PAGE->theme->settings->pane3block6price);
        
        
        // Pane Three Block 7
        $pane3block7title = (empty($PAGE->theme->settings->pane3block7title)) ? false : format_text($PAGE->theme->settings->pane3block7title);
        $pane3block7content = (empty($PAGE->theme->settings->pane3block7content)) ? false : format_text($PAGE->theme->settings->pane3block7content);
        $pane3block7url = (empty($PAGE->theme->settings->pane3block7url)) ? false : $PAGE->theme->settings->pane3block7url;
        $pane3block7urlopennew = (empty($PAGE->theme->settings->pane3block7urlopennew)) ? false : $PAGE->theme->settings->pane3block7urlopennew;
        $pane3block7image = (empty($PAGE->theme->setting_file_url('pane3block7image', 'pane3block7image'))) ? false : $PAGE->theme->setting_file_url('pane3block7image', 'pane3block7image');
        $pane3block7label = (empty($PAGE->theme->settings->pane3block7label)) ? false : format_text($PAGE->theme->settings->pane3block7label);
        $pane3block7price = (empty($PAGE->theme->settings->pane3block7price)) ? false : format_text($PAGE->theme->settings->pane3block7price);
        
        
        // Pane Three Block 8
        $pane3block8title = (empty($PAGE->theme->settings->pane3block8title)) ? false : format_text($PAGE->theme->settings->pane3block8title);
        $pane3block8content = (empty($PAGE->theme->settings->pane3block8content)) ? false : format_text($PAGE->theme->settings->pane3block8content);
        $pane3block8url = (empty($PAGE->theme->settings->pane3block8url)) ? false : $PAGE->theme->settings->pane3block8url;
        $pane3block8urlopennew = (empty($PAGE->theme->settings->pane3block8urlopennew)) ? false : $PAGE->theme->settings->pane3block8urlopennew;
        $pane3block8image = (empty($PAGE->theme->setting_file_url('pane3block8image', 'pane3block8image'))) ? false : $PAGE->theme->setting_file_url('pane3block8image', 'pane3block8image');
        $pane3block8label = (empty($PAGE->theme->settings->pane3block8label)) ? false : format_text($PAGE->theme->settings->pane3block8label);
        $pane3block8price = (empty($PAGE->theme->settings->pane3block8price)) ? false : format_text($PAGE->theme->settings->pane3block8price);
        
        // Pane Three Block 9
        $pane3block9title = (empty($PAGE->theme->settings->pane3block9title)) ? false : format_text($PAGE->theme->settings->pane3block9title);
        $pane3block9content = (empty($PAGE->theme->settings->pane3block9content)) ? false : format_text($PAGE->theme->settings->pane3block9content);
        $pane3block9url = (empty($PAGE->theme->settings->pane3block9url)) ? false : $PAGE->theme->settings->pane3block9url;
        $pane3block9urlopennew = (empty($PAGE->theme->settings->pane3block9urlopennew)) ? false : $PAGE->theme->settings->pane3block9urlopennew;
        $pane3block9image = (empty($PAGE->theme->setting_file_url('pane3block9image', 'pane3block9image'))) ? false : $PAGE->theme->setting_file_url('pane3block9image', 'pane3block9image');
        $pane3block9label = (empty($PAGE->theme->settings->pane3block9label)) ? false : format_text($PAGE->theme->settings->pane3block9label);
        $pane3block9price = (empty($PAGE->theme->settings->pane3block9price)) ? false : format_text($PAGE->theme->settings->pane3block9price);
        
        
        // Pane Three Block 10
        $pane3block10title = (empty($PAGE->theme->settings->pane3block10title)) ? false : format_text($PAGE->theme->settings->pane3block10title);
        $pane3block10content = (empty($PAGE->theme->settings->pane3block10content)) ? false : format_text($PAGE->theme->settings->pane3block10content);
        $pane3block10url = (empty($PAGE->theme->settings->pane3block10url)) ? false : $PAGE->theme->settings->pane3block10url;
        $pane3block10urlopennew = (empty($PAGE->theme->settings->pane3block10urlopennew)) ? false : $PAGE->theme->settings->pane3block10urlopennew;
        $pane3block10image = (empty($PAGE->theme->setting_file_url('pane3block10image', 'pane3block10image'))) ? false : $PAGE->theme->setting_file_url('pane3block10image', 'pane3block10image');
        $pane3block10label = (empty($PAGE->theme->settings->pane3block10label)) ? false : format_text($PAGE->theme->settings->pane3block10label);
        $pane3block10price = (empty($PAGE->theme->settings->pane3block10price)) ? false : format_text($PAGE->theme->settings->pane3block10price);
        
        
        
        //Pane Four
        
        $pane4title = (empty($PAGE->theme->settings->pane4title)) ? false : format_text($PAGE->theme->settings->pane4title);  
        $pane4intro = (empty($PAGE->theme->settings->pane4intro)) ? false : format_text($PAGE->theme->settings->pane4intro); 
        
        
        // Pane Four Block 1
        $usepane4blocks = $PAGE->theme->settings->usepane4blocks == 1;
        $pane4block1title = (empty($PAGE->theme->settings->pane4block1title)) ? false : format_text($PAGE->theme->settings->pane4block1title);
        $pane4block1content = (empty($PAGE->theme->settings->pane4block1content)) ? false : format_text($PAGE->theme->settings->pane4block1content);
        $pane4block1url = (empty($PAGE->theme->settings->pane4block1url)) ? false : $PAGE->theme->settings->pane4block1url;
        $pane4block1urlopennew = (empty($PAGE->theme->settings->pane4block1urlopennew)) ? false : $PAGE->theme->settings->pane4block1urlopennew;
        
        $pane4block1image = (empty($PAGE->theme->setting_file_url('pane4block1image', 'pane4block1image'))) ? false : $PAGE->theme->setting_file_url('pane4block1image', 'pane4block1image');
        
        
        $pane4block1label = (empty($PAGE->theme->settings->pane4block1label)) ? false : format_text($PAGE->theme->settings->pane4block1label);
        $pane4block1price = (empty($PAGE->theme->settings->pane4block1price)) ? false : format_text($PAGE->theme->settings->pane4block1price);
        
        // Pane Four Block 2
        $pane4block2title = (empty($PAGE->theme->settings->pane4block2title)) ? false : format_text($PAGE->theme->settings->pane4block2title);
        $pane4block2content = (empty($PAGE->theme->settings->pane4block2content)) ? false : format_text($PAGE->theme->settings->pane4block2content);
        $pane4block2url = (empty($PAGE->theme->settings->pane4block2url)) ? false : $PAGE->theme->settings->pane4block2url;
        $pane4block2urlopennew = (empty($PAGE->theme->settings->pane4block2urlopennew)) ? false : $PAGE->theme->settings->pane4block2urlopennew;
        $pane4block2image = (empty($PAGE->theme->setting_file_url('pane4block2image', 'pane4block2image'))) ? false : $PAGE->theme->setting_file_url('pane4block2image', 'pane4block2image');
        $pane4block2label = (empty($PAGE->theme->settings->pane4block2label)) ? false : format_text($PAGE->theme->settings->pane4block2label);
        $pane4block2price = (empty($PAGE->theme->settings->pane4block2price)) ? false : format_text($PAGE->theme->settings->pane4block2price);
        
        // Pane Four Block 3
        $pane4block3title = (empty($PAGE->theme->settings->pane4block3title)) ? false : format_text($PAGE->theme->settings->pane4block3title);
        $pane4block3content = (empty($PAGE->theme->settings->pane4block3content)) ? false : format_text($PAGE->theme->settings->pane4block3content);
        $pane4block3url = (empty($PAGE->theme->settings->pane4block3url)) ? false : $PAGE->theme->settings->pane4block3url;
        $pane4block3urlopennew = (empty($PAGE->theme->settings->pane4block3urlopennew)) ? false : $PAGE->theme->settings->pane4block3urlopennew;
        $pane4block3image = (empty($PAGE->theme->setting_file_url('pane4block3image', 'pane4block3image'))) ? false : $PAGE->theme->setting_file_url('pane4block3image', 'pane4block3image');
        $pane4block3label = (empty($PAGE->theme->settings->pane4block3label)) ? false : format_text($PAGE->theme->settings->pane4block3label);
        $pane4block3price = (empty($PAGE->theme->settings->pane4block3price)) ? false : format_text($PAGE->theme->settings->pane4block3price);
        
        // Pane Four Block 4
        $pane4block4title = (empty($PAGE->theme->settings->pane4block4title)) ? false : format_text($PAGE->theme->settings->pane4block4title);
        $pane4block4content = (empty($PAGE->theme->settings->pane4block4content)) ? false : format_text($PAGE->theme->settings->pane4block4content);
        $pane4block4url = (empty($PAGE->theme->settings->pane4block4url)) ? false : $PAGE->theme->settings->pane4block4url;
        $pane4block4urlopennew = (empty($PAGE->theme->settings->pane4block4urlopennew)) ? false : $PAGE->theme->settings->pane4block4urlopennew;
        $pane4block4image = (empty($PAGE->theme->setting_file_url('pane4block4image', 'pane4block4image'))) ? false : $PAGE->theme->setting_file_url('pane4block4image', 'pane4block4image');
        $pane4block4label = (empty($PAGE->theme->settings->pane4block4label)) ? false : format_text($PAGE->theme->settings->pane4block4label);
        $pane4block4price = (empty($PAGE->theme->settings->pane4block4price)) ? false : format_text($PAGE->theme->settings->pane4block4price);
        
        // Pane Four Block 5
        $pane4block5title = (empty($PAGE->theme->settings->pane4block5title)) ? false : format_text($PAGE->theme->settings->pane4block5title);
        $pane4block5content = (empty($PAGE->theme->settings->pane4block5content)) ? false : format_text($PAGE->theme->settings->pane4block5content);
        $pane4block5url = (empty($PAGE->theme->settings->pane4block5url)) ? false : $PAGE->theme->settings->pane4block5url;
        $pane4block5urlopennew = (empty($PAGE->theme->settings->pane4block5urlopennew)) ? false : $PAGE->theme->settings->pane4block5urlopennew;
        $pane4block5image = (empty($PAGE->theme->setting_file_url('pane4block5image', 'pane4block5image'))) ? false : $PAGE->theme->setting_file_url('pane4block5image', 'pane4block5image');
        $pane4block5label = (empty($PAGE->theme->settings->pane4block5label)) ? false : format_text($PAGE->theme->settings->pane4block5label);
        $pane4block5price = (empty($PAGE->theme->settings->pane4block5price)) ? false : format_text($PAGE->theme->settings->pane4block5price);
        
        // Pane Four Block 6
        $pane4block6title = (empty($PAGE->theme->settings->pane4block6title)) ? false : format_text($PAGE->theme->settings->pane4block6title);
        $pane4block6content = (empty($PAGE->theme->settings->pane4block6content)) ? false : format_text($PAGE->theme->settings->pane4block6content);
        $pane4block6url = (empty($PAGE->theme->settings->pane4block6url)) ? false : $PAGE->theme->settings->pane4block6url;
        $pane4block6urlopennew = (empty($PAGE->theme->settings->pane4block6urlopennew)) ? false : $PAGE->theme->settings->pane4block6urlopennew;
        $pane4block6image = (empty($PAGE->theme->setting_file_url('pane4block6image', 'pane4block6image'))) ? false : $PAGE->theme->setting_file_url('pane4block6image', 'pane4block6image');
        $pane4block6label = (empty($PAGE->theme->settings->pane4block6label)) ? false : format_text($PAGE->theme->settings->pane4block6label);
        $pane4block6price = (empty($PAGE->theme->settings->pane4block6price)) ? false : format_text($PAGE->theme->settings->pane4block6price);
        
        
        // Pane Four Block 7
        $pane4block7title = (empty($PAGE->theme->settings->pane4block7title)) ? false : format_text($PAGE->theme->settings->pane4block7title);
        $pane4block7content = (empty($PAGE->theme->settings->pane4block7content)) ? false : format_text($PAGE->theme->settings->pane4block7content);
        $pane4block7url = (empty($PAGE->theme->settings->pane4block7url)) ? false : $PAGE->theme->settings->pane4block7url;
        $pane4block7urlopennew = (empty($PAGE->theme->settings->pane4block7urlopennew)) ? false : $PAGE->theme->settings->pane4block7urlopennew;
        $pane4block7image = (empty($PAGE->theme->setting_file_url('pane4block7image', 'pane4block7image'))) ? false : $PAGE->theme->setting_file_url('pane4block7image', 'pane4block7image');
        $pane4block7label = (empty($PAGE->theme->settings->pane4block7label)) ? false : format_text($PAGE->theme->settings->pane4block7label);
        $pane4block7price = (empty($PAGE->theme->settings->pane4block7price)) ? false : format_text($PAGE->theme->settings->pane4block7price);
        
        
        // Pane Four Block 8
        $pane4block8title = (empty($PAGE->theme->settings->pane4block8title)) ? false : format_text($PAGE->theme->settings->pane4block8title);
        $pane4block8content = (empty($PAGE->theme->settings->pane4block8content)) ? false : format_text($PAGE->theme->settings->pane4block8content);
        $pane4block8url = (empty($PAGE->theme->settings->pane4block8url)) ? false : $PAGE->theme->settings->pane4block8url;
        $pane4block8urlopennew = (empty($PAGE->theme->settings->pane4block8urlopennew)) ? false : $PAGE->theme->settings->pane4block8urlopennew;
        $pane4block8image = (empty($PAGE->theme->setting_file_url('pane4block8image', 'pane4block8image'))) ? false : $PAGE->theme->setting_file_url('pane4block8image', 'pane4block8image');
        $pane4block8label = (empty($PAGE->theme->settings->pane4block8label)) ? false : format_text($PAGE->theme->settings->pane4block8label);
        $pane4block8price = (empty($PAGE->theme->settings->pane4block8price)) ? false : format_text($PAGE->theme->settings->pane4block8price);
        
        // Pane Four Block 9
        $pane4block9title = (empty($PAGE->theme->settings->pane4block9title)) ? false : format_text($PAGE->theme->settings->pane4block9title);
        $pane4block9content = (empty($PAGE->theme->settings->pane4block9content)) ? false : format_text($PAGE->theme->settings->pane4block9content);
        $pane4block9url = (empty($PAGE->theme->settings->pane4block9url)) ? false : $PAGE->theme->settings->pane4block9url;
        $pane4block9urlopennew = (empty($PAGE->theme->settings->pane4block9urlopennew)) ? false : $PAGE->theme->settings->pane4block9urlopennew;
        $pane4block9image = (empty($PAGE->theme->setting_file_url('pane4block9image', 'pane4block9image'))) ? false : $PAGE->theme->setting_file_url('pane4block9image', 'pane4block9image');
        $pane4block9label = (empty($PAGE->theme->settings->pane4block9label)) ? false : format_text($PAGE->theme->settings->pane4block9label);
        $pane4block9price = (empty($PAGE->theme->settings->pane4block9price)) ? false : format_text($PAGE->theme->settings->pane4block9price);
        
        
        // Pane Four Block 10
        $pane4block10title = (empty($PAGE->theme->settings->pane4block10title)) ? false : format_text($PAGE->theme->settings->pane4block10title);
        $pane4block10content = (empty($PAGE->theme->settings->pane4block10content)) ? false : format_text($PAGE->theme->settings->pane4block10content);
        $pane4block10url = (empty($PAGE->theme->settings->pane4block10url)) ? false : $PAGE->theme->settings->pane4block10url;
        $pane4block10urlopennew = (empty($PAGE->theme->settings->pane4block10urlopennew)) ? false : $PAGE->theme->settings->pane4block10urlopennew;
        $pane4block10image = (empty($PAGE->theme->setting_file_url('pane4block10image', 'pane4block10image'))) ? false : $PAGE->theme->setting_file_url('pane4block10image', 'pane4block10image');
        $pane4block10label = (empty($PAGE->theme->settings->pane4block10label)) ? false : format_text($PAGE->theme->settings->pane4block10label);
        $pane4block10price = (empty($PAGE->theme->settings->pane4block10price)) ? false : format_text($PAGE->theme->settings->pane4block10price);
        
        
        
        //Pane Five
        
        $pane5title = (empty($PAGE->theme->settings->pane5title)) ? false : format_text($PAGE->theme->settings->pane5title);  
        $pane5intro = (empty($PAGE->theme->settings->pane5intro)) ? false : format_text($PAGE->theme->settings->pane5intro); 
        
        
        // Pane Five Block 1
        $usepane5blocks = $PAGE->theme->settings->usepane5blocks == 1;
        $pane5block1title = (empty($PAGE->theme->settings->pane5block1title)) ? false : format_text($PAGE->theme->settings->pane5block1title);
        $pane5block1content = (empty($PAGE->theme->settings->pane5block1content)) ? false : format_text($PAGE->theme->settings->pane5block1content);
        $pane5block1url = (empty($PAGE->theme->settings->pane5block1url)) ? false : $PAGE->theme->settings->pane5block1url;
        $pane5block1urlopennew = (empty($PAGE->theme->settings->pane5block1urlopennew)) ? false : $PAGE->theme->settings->pane5block1urlopennew;
        
        $pane5block1image = (empty($PAGE->theme->setting_file_url('pane5block1image', 'pane5block1image'))) ? false : $PAGE->theme->setting_file_url('pane5block1image', 'pane5block1image');
        
        
        $pane5block1label = (empty($PAGE->theme->settings->pane5block1label)) ? false : format_text($PAGE->theme->settings->pane5block1label);
        $pane5block1price = (empty($PAGE->theme->settings->pane5block1price)) ? false : format_text($PAGE->theme->settings->pane5block1price);
        
        // Pane Five Block 2
        $pane5block2title = (empty($PAGE->theme->settings->pane5block2title)) ? false : format_text($PAGE->theme->settings->pane5block2title);
        $pane5block2content = (empty($PAGE->theme->settings->pane5block2content)) ? false : format_text($PAGE->theme->settings->pane5block2content);
        $pane5block2url = (empty($PAGE->theme->settings->pane5block2url)) ? false : $PAGE->theme->settings->pane5block2url;
        $pane5block2urlopennew = (empty($PAGE->theme->settings->pane5block2urlopennew)) ? false : $PAGE->theme->settings->pane5block2urlopennew;
        $pane5block2image = (empty($PAGE->theme->setting_file_url('pane5block2image', 'pane5block2image'))) ? false : $PAGE->theme->setting_file_url('pane5block2image', 'pane5block2image');
        $pane5block2label = (empty($PAGE->theme->settings->pane5block2label)) ? false : format_text($PAGE->theme->settings->pane5block2label);
        $pane5block2price = (empty($PAGE->theme->settings->pane5block2price)) ? false : format_text($PAGE->theme->settings->pane5block2price);
        
        // Pane Five Block 3
        $pane5block3title = (empty($PAGE->theme->settings->pane5block3title)) ? false : format_text($PAGE->theme->settings->pane5block3title);
        $pane5block3content = (empty($PAGE->theme->settings->pane5block3content)) ? false : format_text($PAGE->theme->settings->pane5block3content);
        $pane5block3url = (empty($PAGE->theme->settings->pane5block3url)) ? false : $PAGE->theme->settings->pane5block3url;
        $pane5block3urlopennew = (empty($PAGE->theme->settings->pane5block3urlopennew)) ? false : $PAGE->theme->settings->pane5block3urlopennew;
        $pane5block3image = (empty($PAGE->theme->setting_file_url('pane5block3image', 'pane5block3image'))) ? false : $PAGE->theme->setting_file_url('pane5block3image', 'pane5block3image');
        $pane5block3label = (empty($PAGE->theme->settings->pane5block3label)) ? false : format_text($PAGE->theme->settings->pane5block3label);
        $pane5block3price = (empty($PAGE->theme->settings->pane5block3price)) ? false : format_text($PAGE->theme->settings->pane5block3price);
        
        // Pane Five Block 4
        $pane5block4title = (empty($PAGE->theme->settings->pane5block4title)) ? false : format_text($PAGE->theme->settings->pane5block4title);
        $pane5block4content = (empty($PAGE->theme->settings->pane5block4content)) ? false : format_text($PAGE->theme->settings->pane5block4content);
        $pane5block4url = (empty($PAGE->theme->settings->pane5block4url)) ? false : $PAGE->theme->settings->pane5block4url;
        $pane5block4urlopennew = (empty($PAGE->theme->settings->pane5block4urlopennew)) ? false : $PAGE->theme->settings->pane5block4urlopennew;
        $pane5block4image = (empty($PAGE->theme->setting_file_url('pane5block4image', 'pane5block4image'))) ? false : $PAGE->theme->setting_file_url('pane5block4image', 'pane5block4image');
        $pane5block4label = (empty($PAGE->theme->settings->pane5block4label)) ? false : format_text($PAGE->theme->settings->pane5block4label);
        $pane5block4price = (empty($PAGE->theme->settings->pane5block4price)) ? false : format_text($PAGE->theme->settings->pane5block4price);
        
        // Pane Five Block 5
        $pane5block5title = (empty($PAGE->theme->settings->pane5block5title)) ? false : format_text($PAGE->theme->settings->pane5block5title);
        $pane5block5content = (empty($PAGE->theme->settings->pane5block5content)) ? false : format_text($PAGE->theme->settings->pane5block5content);
        $pane5block5url = (empty($PAGE->theme->settings->pane5block5url)) ? false : $PAGE->theme->settings->pane5block5url;
        $pane5block5urlopennew = (empty($PAGE->theme->settings->pane5block5urlopennew)) ? false : $PAGE->theme->settings->pane5block5urlopennew;
        $pane5block5image = (empty($PAGE->theme->setting_file_url('pane5block5image', 'pane5block5image'))) ? false : $PAGE->theme->setting_file_url('pane5block5image', 'pane5block5image');
        $pane5block5label = (empty($PAGE->theme->settings->pane5block5label)) ? false : format_text($PAGE->theme->settings->pane5block5label);
        $pane5block5price = (empty($PAGE->theme->settings->pane5block5price)) ? false : format_text($PAGE->theme->settings->pane5block5price);
        
        // Pane Five Block 6
        $pane5block6title = (empty($PAGE->theme->settings->pane5block6title)) ? false : format_text($PAGE->theme->settings->pane5block6title);
        $pane5block6content = (empty($PAGE->theme->settings->pane5block6content)) ? false : format_text($PAGE->theme->settings->pane5block6content);
        $pane5block6url = (empty($PAGE->theme->settings->pane5block6url)) ? false : $PAGE->theme->settings->pane5block6url;
        $pane5block6urlopennew = (empty($PAGE->theme->settings->pane5block6urlopennew)) ? false : $PAGE->theme->settings->pane5block6urlopennew;
        $pane5block6image = (empty($PAGE->theme->setting_file_url('pane5block6image', 'pane5block6image'))) ? false : $PAGE->theme->setting_file_url('pane5block6image', 'pane5block6image');
        $pane5block6label = (empty($PAGE->theme->settings->pane5block6label)) ? false : format_text($PAGE->theme->settings->pane5block6label);
        $pane5block6price = (empty($PAGE->theme->settings->pane5block6price)) ? false : format_text($PAGE->theme->settings->pane5block6price);
        
        
        // Pane Five Block 7
        $pane5block7title = (empty($PAGE->theme->settings->pane5block7title)) ? false : format_text($PAGE->theme->settings->pane5block7title);
        $pane5block7content = (empty($PAGE->theme->settings->pane5block7content)) ? false : format_text($PAGE->theme->settings->pane5block7content);
        $pane5block7url = (empty($PAGE->theme->settings->pane5block7url)) ? false : $PAGE->theme->settings->pane5block7url;
        $pane5block7urlopennew = (empty($PAGE->theme->settings->pane5block7urlopennew)) ? false : $PAGE->theme->settings->pane5block7urlopennew;
        $pane5block7image = (empty($PAGE->theme->setting_file_url('pane5block7image', 'pane5block7image'))) ? false : $PAGE->theme->setting_file_url('pane5block7image', 'pane5block7image');
        $pane5block7label = (empty($PAGE->theme->settings->pane5block7label)) ? false : format_text($PAGE->theme->settings->pane5block7label);
        $pane5block7price = (empty($PAGE->theme->settings->pane5block7price)) ? false : format_text($PAGE->theme->settings->pane5block7price);
        
        
        // Pane Five Block 8
        $pane5block8title = (empty($PAGE->theme->settings->pane5block8title)) ? false : format_text($PAGE->theme->settings->pane5block8title);
        $pane5block8content = (empty($PAGE->theme->settings->pane5block8content)) ? false : format_text($PAGE->theme->settings->pane5block8content);
        $pane5block8url = (empty($PAGE->theme->settings->pane5block8url)) ? false : $PAGE->theme->settings->pane5block8url;
        $pane5block8urlopennew = (empty($PAGE->theme->settings->pane5block8urlopennew)) ? false : $PAGE->theme->settings->pane5block8urlopennew;
        $pane5block8image = (empty($PAGE->theme->setting_file_url('pane5block8image', 'pane5block8image'))) ? false : $PAGE->theme->setting_file_url('pane5block8image', 'pane5block8image');
        $pane5block8label = (empty($PAGE->theme->settings->pane5block8label)) ? false : format_text($PAGE->theme->settings->pane5block8label);
        $pane5block8price = (empty($PAGE->theme->settings->pane5block8price)) ? false : format_text($PAGE->theme->settings->pane5block8price);
        
        // Pane Five Block 9
        $pane5block9title = (empty($PAGE->theme->settings->pane5block9title)) ? false : format_text($PAGE->theme->settings->pane5block9title);
        $pane5block9content = (empty($PAGE->theme->settings->pane5block9content)) ? false : format_text($PAGE->theme->settings->pane5block9content);
        $pane5block9url = (empty($PAGE->theme->settings->pane5block9url)) ? false : $PAGE->theme->settings->pane5block9url;
        $pane5block9urlopennew = (empty($PAGE->theme->settings->pane5block9urlopennew)) ? false : $PAGE->theme->settings->pane5block9urlopennew;
        $pane5block9image = (empty($PAGE->theme->setting_file_url('pane5block9image', 'pane5block9image'))) ? false : $PAGE->theme->setting_file_url('pane5block9image', 'pane5block9image');
        $pane5block9label = (empty($PAGE->theme->settings->pane5block9label)) ? false : format_text($PAGE->theme->settings->pane5block9label);
        $pane5block9price = (empty($PAGE->theme->settings->pane5block9price)) ? false : format_text($PAGE->theme->settings->pane5block9price);
        
        
        // Pane Five Block 10
        $pane5block10title = (empty($PAGE->theme->settings->pane5block10title)) ? false : format_text($PAGE->theme->settings->pane5block10title);
        $pane5block10content = (empty($PAGE->theme->settings->pane5block10content)) ? false : format_text($PAGE->theme->settings->pane5block10content);
        $pane5block10url = (empty($PAGE->theme->settings->pane5block10url)) ? false : $PAGE->theme->settings->pane5block10url;
        $pane5block10urlopennew = (empty($PAGE->theme->settings->pane5block10urlopennew)) ? false : $PAGE->theme->settings->pane5block10urlopennew;
        $pane5block10image = (empty($PAGE->theme->setting_file_url('pane5block10image', 'pane5block10image'))) ? false : $PAGE->theme->setting_file_url('pane5block10image', 'pane5block10image');
        $pane5block10label = (empty($PAGE->theme->settings->pane5block10label)) ? false : format_text($PAGE->theme->settings->pane5block10label);
        $pane5block10price = (empty($PAGE->theme->settings->pane5block10price)) ? false : format_text($PAGE->theme->settings->pane5block10price);
        
        
        
        
        //Pane Six
        
        $pane6title = (empty($PAGE->theme->settings->pane6title)) ? false : format_text($PAGE->theme->settings->pane6title);  
        $pane6intro = (empty($PAGE->theme->settings->pane6intro)) ? false : format_text($PAGE->theme->settings->pane6intro); 
        
        
        // Pane Six Block 1
        $usepane6blocks = $PAGE->theme->settings->usepane6blocks == 1;
        $pane6block1title = (empty($PAGE->theme->settings->pane6block1title)) ? false : format_text($PAGE->theme->settings->pane6block1title);
        $pane6block1content = (empty($PAGE->theme->settings->pane6block1content)) ? false : format_text($PAGE->theme->settings->pane6block1content);
        $pane6block1url = (empty($PAGE->theme->settings->pane6block1url)) ? false : $PAGE->theme->settings->pane6block1url;
        $pane6block1urlopennew = (empty($PAGE->theme->settings->pane6block1urlopennew)) ? false : $PAGE->theme->settings->pane6block1urlopennew;
        
        $pane6block1image = (empty($PAGE->theme->setting_file_url('pane6block1image', 'pane6block1image'))) ? false : $PAGE->theme->setting_file_url('pane6block1image', 'pane6block1image');
        
        
        $pane6block1label = (empty($PAGE->theme->settings->pane6block1label)) ? false : format_text($PAGE->theme->settings->pane6block1label);
        $pane6block1price = (empty($PAGE->theme->settings->pane6block1price)) ? false : format_text($PAGE->theme->settings->pane6block1price);
        
        // Pane Six Block 2
        $pane6block2title = (empty($PAGE->theme->settings->pane6block2title)) ? false : format_text($PAGE->theme->settings->pane6block2title);
        $pane6block2content = (empty($PAGE->theme->settings->pane6block2content)) ? false : format_text($PAGE->theme->settings->pane6block2content);
        $pane6block2url = (empty($PAGE->theme->settings->pane6block2url)) ? false : $PAGE->theme->settings->pane6block2url;
        $pane6block2urlopennew = (empty($PAGE->theme->settings->pane6block2urlopennew)) ? false : $PAGE->theme->settings->pane6block2urlopennew;
        $pane6block2image = (empty($PAGE->theme->setting_file_url('pane6block2image', 'pane6block2image'))) ? false : $PAGE->theme->setting_file_url('pane6block2image', 'pane6block2image');
        $pane6block2label = (empty($PAGE->theme->settings->pane6block2label)) ? false : format_text($PAGE->theme->settings->pane6block2label);
        $pane6block2price = (empty($PAGE->theme->settings->pane6block2price)) ? false : format_text($PAGE->theme->settings->pane6block2price);
        
        // Pane Six Block 3
        $pane6block3title = (empty($PAGE->theme->settings->pane6block3title)) ? false : format_text($PAGE->theme->settings->pane6block3title);
        $pane6block3content = (empty($PAGE->theme->settings->pane6block3content)) ? false : format_text($PAGE->theme->settings->pane6block3content);
        $pane6block3url = (empty($PAGE->theme->settings->pane6block3url)) ? false : $PAGE->theme->settings->pane6block3url;
        $pane6block3urlopennew = (empty($PAGE->theme->settings->pane6block3urlopennew)) ? false : $PAGE->theme->settings->pane6block3urlopennew;
        $pane6block3image = (empty($PAGE->theme->setting_file_url('pane6block3image', 'pane6block3image'))) ? false : $PAGE->theme->setting_file_url('pane6block3image', 'pane6block3image');
        $pane6block3label = (empty($PAGE->theme->settings->pane6block3label)) ? false : format_text($PAGE->theme->settings->pane6block3label);
        $pane6block3price = (empty($PAGE->theme->settings->pane6block3price)) ? false : format_text($PAGE->theme->settings->pane6block3price);
        
        // Pane Six Block 4
        $pane6block4title = (empty($PAGE->theme->settings->pane6block4title)) ? false : format_text($PAGE->theme->settings->pane6block4title);
        $pane6block4content = (empty($PAGE->theme->settings->pane6block4content)) ? false : format_text($PAGE->theme->settings->pane6block4content);
        $pane6block4url = (empty($PAGE->theme->settings->pane6block4url)) ? false : $PAGE->theme->settings->pane6block4url;
        $pane6block4urlopennew = (empty($PAGE->theme->settings->pane6block4urlopennew)) ? false : $PAGE->theme->settings->pane6block4urlopennew;
        $pane6block4image = (empty($PAGE->theme->setting_file_url('pane6block4image', 'pane6block4image'))) ? false : $PAGE->theme->setting_file_url('pane6block4image', 'pane6block4image');
        $pane6block4label = (empty($PAGE->theme->settings->pane6block4label)) ? false : format_text($PAGE->theme->settings->pane6block4label);
        $pane6block4price = (empty($PAGE->theme->settings->pane6block4price)) ? false : format_text($PAGE->theme->settings->pane6block4price);
        
        // Pane Six Block 5
        $pane6block5title = (empty($PAGE->theme->settings->pane6block5title)) ? false : format_text($PAGE->theme->settings->pane6block5title);
        $pane6block5content = (empty($PAGE->theme->settings->pane6block5content)) ? false : format_text($PAGE->theme->settings->pane6block5content);
        $pane6block5url = (empty($PAGE->theme->settings->pane6block5url)) ? false : $PAGE->theme->settings->pane6block5url;
        $pane6block5urlopennew = (empty($PAGE->theme->settings->pane6block5urlopennew)) ? false : $PAGE->theme->settings->pane6block5urlopennew;
        $pane6block5image = (empty($PAGE->theme->setting_file_url('pane6block5image', 'pane6block5image'))) ? false : $PAGE->theme->setting_file_url('pane6block5image', 'pane6block5image');
        $pane6block5label = (empty($PAGE->theme->settings->pane6block5label)) ? false : format_text($PAGE->theme->settings->pane6block5label);
        $pane6block5price = (empty($PAGE->theme->settings->pane6block5price)) ? false : format_text($PAGE->theme->settings->pane6block5price);
        
        // Pane Six Block 6
        $pane6block6title = (empty($PAGE->theme->settings->pane6block6title)) ? false : format_text($PAGE->theme->settings->pane6block6title);
        $pane6block6content = (empty($PAGE->theme->settings->pane6block6content)) ? false : format_text($PAGE->theme->settings->pane6block6content);
        $pane6block6url = (empty($PAGE->theme->settings->pane6block6url)) ? false : $PAGE->theme->settings->pane6block6url;
        $pane6block6urlopennew = (empty($PAGE->theme->settings->pane6block6urlopennew)) ? false : $PAGE->theme->settings->pane6block6urlopennew;
        $pane6block6image = (empty($PAGE->theme->setting_file_url('pane6block6image', 'pane6block6image'))) ? false : $PAGE->theme->setting_file_url('pane6block6image', 'pane6block6image');
        $pane6block6label = (empty($PAGE->theme->settings->pane6block6label)) ? false : format_text($PAGE->theme->settings->pane6block6label);
        $pane6block6price = (empty($PAGE->theme->settings->pane6block6price)) ? false : format_text($PAGE->theme->settings->pane6block6price);
        
        
        // Pane Six Block 7
        $pane6block7title = (empty($PAGE->theme->settings->pane6block7title)) ? false : format_text($PAGE->theme->settings->pane6block7title);
        $pane6block7content = (empty($PAGE->theme->settings->pane6block7content)) ? false : format_text($PAGE->theme->settings->pane6block7content);
        $pane6block7url = (empty($PAGE->theme->settings->pane6block7url)) ? false : $PAGE->theme->settings->pane6block7url;
        $pane6block7urlopennew = (empty($PAGE->theme->settings->pane6block7urlopennew)) ? false : $PAGE->theme->settings->pane6block7urlopennew;
        $pane6block7image = (empty($PAGE->theme->setting_file_url('pane6block7image', 'pane6block7image'))) ? false : $PAGE->theme->setting_file_url('pane6block7image', 'pane6block7image');
        $pane6block7label = (empty($PAGE->theme->settings->pane6block7label)) ? false : format_text($PAGE->theme->settings->pane6block7label);
        $pane6block7price = (empty($PAGE->theme->settings->pane6block7price)) ? false : format_text($PAGE->theme->settings->pane6block7price);
        
        
        // Pane Six Block 8
        $pane6block8title = (empty($PAGE->theme->settings->pane6block8title)) ? false : format_text($PAGE->theme->settings->pane6block8title);
        $pane6block8content = (empty($PAGE->theme->settings->pane6block8content)) ? false : format_text($PAGE->theme->settings->pane6block8content);
        $pane6block8url = (empty($PAGE->theme->settings->pane6block8url)) ? false : $PAGE->theme->settings->pane6block8url;
        $pane6block8urlopennew = (empty($PAGE->theme->settings->pane6block8urlopennew)) ? false : $PAGE->theme->settings->pane6block8urlopennew;
        $pane6block8image = (empty($PAGE->theme->setting_file_url('pane6block8image', 'pane6block8image'))) ? false : $PAGE->theme->setting_file_url('pane6block8image', 'pane6block8image');
        $pane6block8label = (empty($PAGE->theme->settings->pane6block8label)) ? false : format_text($PAGE->theme->settings->pane6block8label);
        $pane6block8price = (empty($PAGE->theme->settings->pane6block8price)) ? false : format_text($PAGE->theme->settings->pane6block8price);
        
        // Pane Six Block 9
        $pane6block9title = (empty($PAGE->theme->settings->pane6block9title)) ? false : format_text($PAGE->theme->settings->pane6block9title);
        $pane6block9content = (empty($PAGE->theme->settings->pane6block9content)) ? false : format_text($PAGE->theme->settings->pane6block9content);
        $pane6block9url = (empty($PAGE->theme->settings->pane6block9url)) ? false : $PAGE->theme->settings->pane6block9url;
        $pane6block9urlopennew = (empty($PAGE->theme->settings->pane6block9urlopennew)) ? false : $PAGE->theme->settings->pane6block9urlopennew;
        $pane6block9image = (empty($PAGE->theme->setting_file_url('pane6block9image', 'pane6block9image'))) ? false : $PAGE->theme->setting_file_url('pane6block9image', 'pane6block9image');
        $pane6block9label = (empty($PAGE->theme->settings->pane6block9label)) ? false : format_text($PAGE->theme->settings->pane6block9label);
        $pane6block9price = (empty($PAGE->theme->settings->pane6block9price)) ? false : format_text($PAGE->theme->settings->pane6block9price);
        
        
        // Pane Six Block 10
        $pane6block10title = (empty($PAGE->theme->settings->pane6block10title)) ? false : format_text($PAGE->theme->settings->pane6block10title);
        $pane6block10content = (empty($PAGE->theme->settings->pane6block10content)) ? false : format_text($PAGE->theme->settings->pane6block10content);
        $pane6block10url = (empty($PAGE->theme->settings->pane6block10url)) ? false : $PAGE->theme->settings->pane6block10url;
        $pane6block10urlopennew = (empty($PAGE->theme->settings->pane6block10urlopennew)) ? false : $PAGE->theme->settings->pane6block10urlopennew;
        $pane6block10image = (empty($PAGE->theme->setting_file_url('pane6block10image', 'pane6block10image'))) ? false : $PAGE->theme->setting_file_url('pane6block10image', 'pane6block10image');
        $pane6block10label = (empty($PAGE->theme->settings->pane6block10label)) ? false : format_text($PAGE->theme->settings->pane6block10label);
        $pane6block10price = (empty($PAGE->theme->settings->pane6block10price)) ? false : format_text($PAGE->theme->settings->pane6block10price);
        

        $fp_featured = [

        'usefeaturedsection' => $usefeaturedsection,
        'featuredsectiontitle' => $featuredsectiontitle,
        'featuredsectionintro' => $featuredsectionintro,


        'featuredpanes' => array(
	        
            array(
	            'panecount'=> '1',
	            'paneactive' => '1',
	            'tabname' =>$tab1name,
	            'tabicon' =>$tab1icon,
	            'panetitle' => $pane1title,
	            'paneintro' => $pane1intro,
	            'usepaneblocks' => $usepane1blocks,
	            'paneblocks' => array (
		             array (
			            'blockcount'=> '1',
		                'blockimage' => $pane1block1image,
		                'blocktitle' => $pane1block1title,
		                'blockcontent' => $pane1block1content,
		                'blockurl' => $pane1block1url,
		                'urlopennew' => $pane1block1urlopennew,
		                'blocklabel'=> $pane1block1label,
		                'blockprice'=> $pane1block1price,
		             ),
		             array (
			            'blockcount'=> '2',
		                'blockimage' => $pane1block2image,
		                'blocktitle' => $pane1block2title,
		                'blockcontent' => $pane1block2content,
		                'blockurl' => $pane1block2url,
		                'urlopennew' => $pane1block2urlopennew,
		                'blocklabel'=> $pane1block2label,
		                'blockprice'=> $pane1block2price,
		             ),
		             
		             array (
			            'blockcount'=> '3',
		                'blockimage' => $pane1block3image,
		                'blocktitle' => $pane1block3title,
		                'blockcontent' => $pane1block3content,
		                'blockurl' => $pane1block3url,
		                'urlopennew' => $pane1block3urlopennew,
		                'blocklabel'=> $pane1block3label,
		                'blockprice'=> $pane1block3price,
		             ),
		             
		             array (
			            'blockcount'=> '4',
		                'blockimage' => $pane1block4image,
		                'blocktitle' => $pane1block4title,
		                'blockcontent' => $pane1block4content,
		                'blockurl' => $pane1block4url,
		                'urlopennew' => $pane1block4urlopennew,
		                'blocklabel'=> $pane1block4label,
		                'blockprice'=> $pane1block4price,
		             ),
		             
		             array (
			            'blockcount'=> '5',
		                'blockimage' => $pane1block5image,
		                'blocktitle' => $pane1block5title,
		                'blockcontent' => $pane1block5content,
		                'blockurl' => $pane1block5url,
		                'urlopennew' => $pane1block5urlopennew,
		                'blocklabel'=> $pane1block5label,
		                'blockprice'=> $pane1block5price,
		             ),
		             
		             array (
			            'blockcount'=> '6',
		                'blockimage' => $pane1block6image,
		                'blocktitle' => $pane1block6title,
		                'blockcontent' => $pane1block6content,
		                'blockurl' => $pane1block6url,
		                'urlopennew' => $pane1block6urlopennew,
		                'blocklabel'=> $pane1block6label,
		                'blockprice'=> $pane1block6price,
		             ),
		             
		             array (
			            'blockcount'=> '7',
		                'blockimage' => $pane1block7image,
		                'blocktitle' => $pane1block7title,
		                'blockcontent' => $pane1block7content,
		                'blockurl' => $pane1block7url,
		                'urlopennew' => $pane1block7urlopennew,
		                'blocklabel'=> $pane1block7label,
		                'blockprice'=> $pane1block7price,
		             ),
		             
		             array (
			            'blockcount'=> '8',
		                'blockimage' => $pane1block8image,
		                'blocktitle' => $pane1block8title,
		                'blockcontent' => $pane1block8content,
		                'blockurl' => $pane1block8url,
		                'urlopennew' => $pane1block8urlopennew,
		                'blocklabel'=> $pane1block8label,
		                'blockprice'=> $pane1block8price,
		             ),
		             
		             array (
			            'blockcount'=> '9',
		                'blockimage' => $pane1block9image,
		                'blocktitle' => $pane1block9title,
		                'blockcontent' => $pane1block9content,
		                'blockurl' => $pane1block9url,
		                'urlopennew' => $pane1block9urlopennew,
		                'blocklabel'=> $pane1block9label,
		                'blockprice'=> $pane1block9price,
		             ),
		             
		             array (
			            'blockcount'=> '10',
		                'blockimage' => $pane1block10image,
		                'blocktitle' => $pane1block10title,
		                'blockcontent' => $pane1block10content,
		                'blockurl' => $pane1block10url,
		                'urlopennew' => $pane1block10urlopennew,
		                'blocklabel'=> $pane1block10label,
		                'blockprice'=> $pane1block10price,
		             ),
	             ),
	
            ) , 
            
            array (
	            'panecount'=> '2',
	            'tabname' =>$tab2name,
	            'tabicon' =>$tab2icon,
	            'panetitle' => $pane2title,
	            'paneintro' => $pane2intro,
	            'usepaneblocks' => $usepane2blocks,
	            'paneblocks' => array (
		             array (
			            'blockcount'=> '1',
		                'blockimage' => $pane2block1image,
		                'blocktitle' => $pane2block1title,
		                'blockcontent' => $pane2block1content,
		                'blockurl' => $pane2block1url,
		                'urlopennew' => $pane2block1urlopennew,
		                'blocklabel'=> $pane2block1label,
		                'blockprice'=> $pane2block1price,
		             ),
		             array (
			            'blockcount'=> '2',
		                'blockimage' => $pane2block2image,
		                'blocktitle' => $pane2block2title,
		                'blockcontent' => $pane2block2content,
		                'blockurl' => $pane2block2url,
		                'urlopennew' => $pane2block2urlopennew,
		                'blocklabel'=> $pane2block2label,
		                'blockprice'=> $pane2block2price,
		             ),
		             
		             array (
			            'blockcount'=> '3',
		                'blockimage' => $pane2block3image,
		                'blocktitle' => $pane2block3title,
		                'blockcontent' => $pane2block3content,
		                'blockurl' => $pane2block3url,
		                'urlopennew' => $pane2block3urlopennew,
		                'blocklabel'=> $pane2block3label,
		                'blockprice'=> $pane2block3price,
		             ),
		             
		             array (
			            'blockcount'=> '4',
		                'blockimage' => $pane2block4image,
		                'blocktitle' => $pane2block4title,
		                'blockcontent' => $pane2block4content,
		                'blockurl' => $pane2block4url,
		                'urlopennew' => $pane2block4urlopennew,
		                'blocklabel'=> $pane2block4label,
		                'blockprice'=> $pane2block4price,
		             ),
		             
		             array (
			            'blockcount'=> '5',
		                'blockimage' => $pane2block5image,
		                'blocktitle' => $pane2block5title,
		                'blockcontent' => $pane2block5content,
		                'blockurl' => $pane2block5url,
		                'urlopennew' => $pane2block5urlopennew,
		                'blocklabel'=> $pane2block5label,
		                'blockprice'=> $pane2block5price,
		             ),
		             
		             array (
			            'blockcount'=> '6',
		                'blockimage' => $pane2block6image,
		                'blocktitle' => $pane2block6title,
		                'blockcontent' => $pane2block6content,
		                'blockurl' => $pane2block6url,
		                'urlopennew' => $pane2block6urlopennew,
		                'blocklabel'=> $pane2block6label,
		                'blockprice'=> $pane2block6price,
		             ),
		             
		             array (
			            'blockcount'=> '7',
		                'blockimage' => $pane2block7image,
		                'blocktitle' => $pane2block7title,
		                'blockcontent' => $pane2block7content,
		                'blockurl' => $pane2block7url,
		                'urlopennew' => $pane2block7urlopennew,
		                'blocklabel'=> $pane2block7label,
		                'blockprice'=> $pane2block7price,
		             ),
		             array (
			            'blockcount'=> '8',
		                'blockimage' => $pane2block8image,
		                'blocktitle' => $pane2block8title,
		                'blockcontent' => $pane2block8content,
		                'blockurl' => $pane2block8url,
		                'urlopennew' => $pane2block8urlopennew,
		                'blocklabel'=> $pane2block8label,
		                'blockprice'=> $pane2block8price,
		             ),
		             array (
			            'blockcount'=> '9',
		                'blockimage' => $pane2block9image,
		                'blocktitle' => $pane2block9title,
		                'blockcontent' => $pane2block9content,
		                'blockurl' => $pane2block9url,
		                'urlopennew' => $pane2block9urlopennew,
		                'blocklabel'=> $pane2block9label,
		                'blockprice'=> $pane2block9price,
		             ),
		             
		             array (
			            'blockcount'=> '10',
		                'blockimage' => $pane2block10image,
		                'blocktitle' => $pane2block10title,
		                'blockcontent' => $pane2block10content,
		                'blockurl' => $pane2block10url,
		                'urlopennew' => $pane2block10urlopennew,
		                'blocklabel'=> $pane2block10label,
		                'blockprice'=> $pane2block10price,
		             ),
	             ),
            ),   
            
            array (
	            'panecount'=> '3',
	            'tabname' =>$tab3name,
	            'tabicon' =>$tab3icon,
	            'panetitle' => $pane3title,
	            'paneintro' => $pane3intro,
	            'usepaneblocks' => $usepane3blocks,
	            'paneblocks' => array (
		             array (
			            'blockcount'=> '1',
		                'blockimage' => $pane3block1image,
		                'blocktitle' => $pane3block1title,
		                'blockcontent' => $pane3block1content,
		                'blockurl' => $pane3block1url,
		                'urlopennew' => $pane3block1urlopennew,
		                'blocklabel'=> $pane3block1label,
		                'blockprice'=> $pane3block1price,
		             ),
		             
		             array (
			            'blockcount'=> '2',
		                'blockimage' => $pane3block2image,
		                'blocktitle' => $pane3block2title,
		                'blockcontent' => $pane3block2content,
		                'blockurl' => $pane3block2url,
		                'urlopennew' => $pane3block2urlopennew,
		                'blocklabel'=> $pane3block2label,
		                'blockprice'=> $pane3block2price,
		             ),
		             
		             
		             array (
			            'blockcount'=> '3',
		                'blockimage' => $pane3block3image,
		                'blocktitle' => $pane3block3title,
		                'blockcontent' => $pane3block3content,
		                'blockurl' => $pane3block3url,
		                'urlopennew' => $pane3block3urlopennew,
		                'blocklabel'=> $pane3block3label,
		                'blockprice'=> $pane3block3price,
		             ),
		             
		             array (
			            'blockcount'=> '4',
		                'blockimage' => $pane3block4image,
		                'blocktitle' => $pane3block4title,
		                'blockcontent' => $pane3block4content,
		                'blockurl' => $pane3block4url,
		                'urlopennew' => $pane3block4urlopennew,
		                'blocklabel'=> $pane3block4label,
		                'blockprice'=> $pane3block4price,
		             ),
		             
		             array (
			            'blockcount'=> '5',
		                'blockimage' => $pane3block5image,
		                'blocktitle' => $pane3block5title,
		                'blockcontent' => $pane3block5content,
		                'blockurl' => $pane3block5url,
		                'urlopennew' => $pane3block5urlopennew,
		                'blocklabel'=> $pane3block5label,
		                'blockprice'=> $pane3block5price,
		             ),
		             
		             array (
			            'blockcount'=> '6',
		                'blockimage' => $pane3block6image,
		                'blocktitle' => $pane3block6title,
		                'blockcontent' => $pane3block6content,
		                'blockurl' => $pane3block6url,
		                'urlopennew' => $pane3block6urlopennew,
		                'blocklabel'=> $pane3block6label,
		                'blockprice'=> $pane3block6price,
		             ),
		             
		             array (
			            'blockcount'=> '7',
		                'blockimage' => $pane3block7image,
		                'blocktitle' => $pane3block7title,
		                'blockcontent' => $pane3block7content,
		                'blockurl' => $pane3block7url,
		                'urlopennew' => $pane3block7urlopennew,
		                'blocklabel'=> $pane3block7label,
		                'blockprice'=> $pane3block7price,
		             ),
		             array (
			            'blockcount'=> '8',
		                'blockimage' => $pane3block8image,
		                'blocktitle' => $pane3block8title,
		                'blockcontent' => $pane3block8content,
		                'blockurl' => $pane3block8url,
		                'urlopennew' => $pane3block8urlopennew,
		                'blocklabel'=> $pane3block8label,
		                'blockprice'=> $pane3block8price,
		             ),
		             array (
			            'blockcount'=> '9',
		                'blockimage' => $pane3block9image,
		                'blocktitle' => $pane3block9title,
		                'blockcontent' => $pane3block9content,
		                'blockurl' => $pane3block9url,
		                'urlopennew' => $pane3block9urlopennew,
		                'blocklabel'=> $pane3block9label,
		                'blockprice'=> $pane3block9price,
		             ),
		             
		             array (
			            'blockcount'=> '10',
		                'blockimage' => $pane3block10image,
		                'blocktitle' => $pane3block10title,
		                'blockcontent' => $pane3block10content,
		                'blockurl' => $pane3block10url,
		                'urlopennew' => $pane3block10urlopennew,
		                'blocklabel'=> $pane3block10label,
		                'blockprice'=> $pane3block10price,
		             ),
	             ),
	        ),
	        
	        
	        array (
	            'panecount'=> '4',
	            'tabname' =>$tab4name,
	            'tabicon' =>$tab4icon,
	            'panetitle' => $pane4title,
	            'paneintro' => $pane4intro,
	            'usepaneblocks' => $usepane4blocks,
	            'paneblocks' => array (
		             array (
			            'blockcount'=> '1',
		                'blockimage' => $pane4block1image,
		                'blocktitle' => $pane4block1title,
		                'blockcontent' => $pane4block1content,
		                'blockurl' => $pane4block1url,
		                'urlopennew' => $pane4block1urlopennew,
		                'blocklabel'=> $pane4block1label,
		                'blockprice'=> $pane4block1price,
		             ),
		             
		             array (
			            'blockcount'=> '2',
		                'blockimage' => $pane4block2image,
		                'blocktitle' => $pane4block2title,
		                'blockcontent' => $pane4block2content,
		                'blockurl' => $pane4block2url,
		                'urlopennew' => $pane4block2urlopennew,
		                'blocklabel'=> $pane4block2label,
		                'blockprice'=> $pane4block2price,
		             ),
		             
		             array (
			            'blockcount'=> '3',
		                'blockimage' => $pane4block3image,
		                'blocktitle' => $pane4block3title,
		                'blockcontent' => $pane4block3content,
		                'blockurl' => $pane4block3url,
		                'urlopennew' => $pane4block3urlopennew,
		                'blocklabel'=> $pane4block3label,
		                'blockprice'=> $pane4block3price,
		             ),
		             
		             
		             array (
			            'blockcount'=> '4',
		                'blockimage' => $pane4block4image,
		                'blocktitle' => $pane4block4title,
		                'blockcontent' => $pane4block4content,
		                'blockurl' => $pane4block4url,
		                'urlopennew' => $pane4block4urlopennew,
		                'blocklabel'=> $pane4block4label,
		                'blockprice'=> $pane4block4price,
		             ),
		             
		             array (
			            'blockcount'=> '5',
		                'blockimage' => $pane4block5image,
		                'blocktitle' => $pane4block5title,
		                'blockcontent' => $pane4block5content,
		                'blockurl' => $pane4block5url,
		                'urlopennew' => $pane4block5urlopennew,
		                'blocklabel'=> $pane4block5label,
		                'blockprice'=> $pane4block5price,
		             ),
		             
		             array (
			            'blockcount'=> '6',
		                'blockimage' => $pane4block6image,
		                'blocktitle' => $pane4block6title,
		                'blockcontent' => $pane4block6content,
		                'blockurl' => $pane4block6url,
		                'urlopennew' => $pane4block6urlopennew,
		                'blocklabel'=> $pane4block6label,
		                'blockprice'=> $pane4block6price,
		             ),
		             
		             array (
			            'blockcount'=> '7',
		                'blockimage' => $pane4block7image,
		                'blocktitle' => $pane4block7title,
		                'blockcontent' => $pane4block7content,
		                'blockurl' => $pane4block7url,
		                'urlopennew' => $pane4block7urlopennew,
		                'blocklabel'=> $pane4block7label,
		                'blockprice'=> $pane4block7price,
		             ),
		             array (
			            'blockcount'=> '8',
		                'blockimage' => $pane4block8image,
		                'blocktitle' => $pane4block8title,
		                'blockcontent' => $pane4block8content,
		                'blockurl' => $pane4block8url,
		                'urlopennew' => $pane4block8urlopennew,
		                'blocklabel'=> $pane4block8label,
		                'blockprice'=> $pane4block8price,
		             ),
		             array (
			            'blockcount'=> '9',
		                'blockimage' => $pane4block9image,
		                'blocktitle' => $pane4block9title,
		                'blockcontent' => $pane4block9content,
		                'blockurl' => $pane4block9url,
		                'urlopennew' => $pane4block9urlopennew,
		                'blocklabel'=> $pane4block9label,
		                'blockprice'=> $pane4block9price,
		             ),
		             
		             array (
			            'blockcount'=> '10',
		                'blockimage' => $pane4block10image,
		                'blocktitle' => $pane4block10title,
		                'blockcontent' => $pane4block10content,
		                'blockurl' => $pane4block10url,
		                'urlopennew' => $pane4block10urlopennew,
		                'blocklabel'=> $pane4block10label,
		                'blockprice'=> $pane4block10price,
		             ),
	             ),
	        ),
	        
	        array (
	            'panecount'=> '5',
	            'tabname' =>$tab5name,
	            'tabicon' =>$tab5icon,
	            'panetitle' => $pane5title,
	            'paneintro' => $pane5intro,
	            'usepaneblocks' => $usepane5blocks,
	            'paneblocks' => array (
		             array (
			            'blockcount'=> '1',
		                'blockimage' => $pane5block1image,
		                'blocktitle' => $pane5block1title,
		                'blockcontent' => $pane5block1content,
		                'blockurl' => $pane5block1url,
		                'urlopennew' => $pane5block1urlopennew,
		                'blocklabel'=> $pane5block1label,
		                'blockprice'=> $pane5block1price,
		             ),
		             
		             array (
			            'blockcount'=> '2',
		                'blockimage' => $pane5block2image,
		                'blocktitle' => $pane5block2title,
		                'blockcontent' => $pane5block2content,
		                'blockurl' => $pane5block2url,
		                'urlopennew' => $pane5block2urlopennew,
		                'blocklabel'=> $pane5block2label,
		                'blockprice'=> $pane5block2price,
		             ),
		             
		             array (
			            'blockcount'=> '3',
		                'blockimage' => $pane5block3image,
		                'blocktitle' => $pane5block3title,
		                'blockcontent' => $pane5block3content,
		                'blockurl' => $pane5block3url,
		                'urlopennew' => $pane5block3urlopennew,
		                'blocklabel'=> $pane5block3label,
		                'blockprice'=> $pane5block3price,
		             ),
		             
		             array (
			            'blockcount'=> '4',
		                'blockimage' => $pane5block4image,
		                'blocktitle' => $pane5block4title,
		                'blockcontent' => $pane5block4content,
		                'blockurl' => $pane5block4url,
		                'urlopennew' => $pane5block4urlopennew,
		                'blocklabel'=> $pane5block4label,
		                'blockprice'=> $pane5block4price,
		             ),
		             
		             
		             array (
			            'blockcount'=> '5',
		                'blockimage' => $pane5block5image,
		                'blocktitle' => $pane5block5title,
		                'blockcontent' => $pane5block5content,
		                'blockurl' => $pane5block5url,
		                'urlopennew' => $pane5block5urlopennew,
		                'blocklabel'=> $pane5block5label,
		                'blockprice'=> $pane5block5price,
		             ),
		             
		             array (
			            'blockcount'=> '6',
		                'blockimage' => $pane5block6image,
		                'blocktitle' => $pane5block6title,
		                'blockcontent' => $pane5block6content,
		                'blockurl' => $pane5block6url,
		                'urlopennew' => $pane5block6urlopennew,
		                'blocklabel'=> $pane5block6label,
		                'blockprice'=> $pane5block6price,
		             ),
		             
		             array (
			            'blockcount'=> '7',
		                'blockimage' => $pane5block7image,
		                'blocktitle' => $pane5block7title,
		                'blockcontent' => $pane5block7content,
		                'blockurl' => $pane5block7url,
		                'urlopennew' => $pane5block7urlopennew,
		                'blocklabel'=> $pane5block7label,
		                'blockprice'=> $pane5block7price,
		             ),
		             array (
			            'blockcount'=> '8',
		                'blockimage' => $pane5block8image,
		                'blocktitle' => $pane5block8title,
		                'blockcontent' => $pane5block8content,
		                'blockurl' => $pane5block8url,
		                'urlopennew' => $pane5block8urlopennew,
		                'blocklabel'=> $pane5block8label,
		                'blockprice'=> $pane5block8price,
		             ),
		             array (
			            'blockcount'=> '9',
		                'blockimage' => $pane5block9image,
		                'blocktitle' => $pane5block9title,
		                'blockcontent' => $pane5block9content,
		                'blockurl' => $pane5block9url,
		                'urlopennew' => $pane5block9urlopennew,
		                'blocklabel'=> $pane5block9label,
		                'blockprice'=> $pane5block9price,
		             ),
		             
		             array (
			            'blockcount'=> '10',
		                'blockimage' => $pane5block10image,
		                'blocktitle' => $pane5block10title,
		                'blockcontent' => $pane5block10content,
		                'blockurl' => $pane5block10url,
		                'urlopennew' => $pane5block10urlopennew,
		                'blocklabel'=> $pane5block10label,
		                'blockprice'=> $pane5block10price,
		             ),
	             ),
	        ),
	        
	        array (
	            'panecount'=> '6',
	            'tabname' =>$tab6name,
	            'tabicon' =>$tab6icon,
	            'panetitle' => $pane6title,
	            'paneintro' => $pane6intro,
	            'usepaneblocks' => $usepane6blocks,
	            'paneblocks' => array (
		             array (
			            'blockcount'=> '1',
		                'blockimage' => $pane6block1image,
		                'blocktitle' => $pane6block1title,
		                'blockcontent' => $pane6block1content,
		                'blockurl' => $pane6block1url,
		                'urlopennew' => $pane6block1urlopennew,
		                'blocklabel'=> $pane6block1label,
		                'blockprice'=> $pane6block1price,
		             ),
		             
		             array (
			            'blockcount'=> '2',
		                'blockimage' => $pane6block2image,
		                'blocktitle' => $pane6block2title,
		                'blockcontent' => $pane6block2content,
		                'blockurl' => $pane6block2url,
		                'urlopennew' => $pane6block2urlopennew,
		                'blocklabel'=> $pane6block2label,
		                'blockprice'=> $pane6block2price,
		             ),
		             
		             array (
			            'blockcount'=> '3',
		                'blockimage' => $pane6block3image,
		                'blocktitle' => $pane6block3title,
		                'blockcontent' => $pane6block3content,
		                'blockurl' => $pane6block3url,
		                'urlopennew' => $pane6block3urlopennew,
		                'blocklabel'=> $pane6block3label,
		                'blockprice'=> $pane6block3price,
		             ),
		             
		             array (
			            'blockcount'=> '4',
		                'blockimage' => $pane6block4image,
		                'blocktitle' => $pane6block4title,
		                'blockcontent' => $pane6block4content,
		                'blockurl' => $pane6block4url,
		                'urlopennew' => $pane6block4urlopennew,
		                'blocklabel'=> $pane6block4label,
		                'blockprice'=> $pane6block4price,
		             ),
		             
		             array (
			            'blockcount'=> '5',
		                'blockimage' => $pane6block5image,
		                'blocktitle' => $pane6block5title,
		                'blockcontent' => $pane6block5content,
		                'blockurl' => $pane6block5url,
		                'urlopennew' => $pane6block5urlopennew,
		                'blocklabel'=> $pane6block5label,
		                'blockprice'=> $pane6block5price,
		             ),
		             
		             
		             array (
			            'blockcount'=> '6',
		                'blockimage' => $pane6block6image,
		                'blocktitle' => $pane6block6title,
		                'blockcontent' => $pane6block6content,
		                'blockurl' => $pane6block6url,
		                'urlopennew' => $pane6block6urlopennew,
		                'blocklabel'=> $pane6block6label,
		                'blockprice'=> $pane6block6price,
		             ),
		             
		             array (
			            'blockcount'=> '7',
		                'blockimage' => $pane6block7image,
		                'blocktitle' => $pane6block7title,
		                'blockcontent' => $pane6block7content,
		                'blockurl' => $pane6block7url,
		                'urlopennew' => $pane6block7urlopennew,
		                'blocklabel'=> $pane6block7label,
		                'blockprice'=> $pane6block7price,
		             ),
		             array (
			            'blockcount'=> '8',
		                'blockimage' => $pane6block8image,
		                'blocktitle' => $pane6block8title,
		                'blockcontent' => $pane6block8content,
		                'blockurl' => $pane6block8url,
		                'urlopennew' => $pane6block8urlopennew,
		                'blocklabel'=> $pane6block8label,
		                'blockprice'=> $pane6block8price,
		             ),
		             array (
			            'blockcount'=> '9',
		                'blockimage' => $pane6block9image,
		                'blocktitle' => $pane6block9title,
		                'blockcontent' => $pane6block9content,
		                'blockurl' => $pane6block9url,
		                'urlopennew' => $pane6block9urlopennew,
		                'blocklabel'=> $pane6block9label,
		                'blockprice'=> $pane6block9price,
		             ),
		             
		             array (
			            'blockcount'=> '10',
		                'blockimage' => $pane6block10image,
		                'blocktitle' => $pane6block10title,
		                'blockcontent' => $pane6block10content,
		                'blockurl' => $pane6block10url,
		                'urlopennew' => $pane6block10urlopennew,
		                'blocklabel'=> $pane6block10label,
		                'blockprice'=> $pane6block10price,
		             ),
	             ),
	        ),    
            
        ) , 
        
        ];

        return $this->render_from_template('theme_edutor/fp_featured', $fp_featured);
    }
    
    
    public function fp_promo() {
        global $PAGE;

        $usepromocarousel = $PAGE->theme->settings->usepromocarousel == 1;
        
        $promosectiontitle = (empty($PAGE->theme->settings->promosectiontitle)) ? false : format_text($PAGE->theme->settings->promosectiontitle);
        $promosectionintro = (empty($PAGE->theme->settings->promosectionintro)) ? false : format_text($PAGE->theme->settings->promosectionintro);
        
        //Item 1
        $carouselitem1 = (empty($PAGE->theme->settings->carouselitem1)) ? false : format_text($PAGE->theme->settings->carouselitem1);
        $carouselitem1image = (empty($PAGE->theme->setting_file_url('carouselitem1image', 'carouselitem1image'))) ? false : $PAGE->theme->setting_file_url('carouselitem1image', 'carouselitem1image');        
        $carouselitem1content = (empty($PAGE->theme->settings->carouselitem1content)) ? false : format_text($PAGE->theme->settings->carouselitem1content);
        $carouselitem1buttontext = (empty($PAGE->theme->settings->carouselitem1buttontext)) ? false : format_text($PAGE->theme->settings->carouselitem1buttontext);
        $carouselitem1buttonurl = (empty($PAGE->theme->settings->carouselitem1buttonurl)) ? false : $PAGE->theme->settings->carouselitem1buttonurl;
        $carouselitem1buttonurlopennew = $PAGE->theme->settings->carouselitem1buttonurlopennew== 1;
        
        
        $usecarouselitem1video = $PAGE->theme->settings->usecarouselitem1video== 1;
        
        $carouselitem1videoswitcher = $PAGE->theme->settings->carouselitem1videoswitcher; 
        $carouselitem1videoid = (empty($PAGE->theme->settings->carouselitem1videoid)) ? false : $PAGE->theme->settings->carouselitem1videoid;
        
        
        //Item 2
        $carouselitem2 = (empty($PAGE->theme->settings->carouselitem2)) ? false : format_text($PAGE->theme->settings->carouselitem2);
        $carouselitem2image = (empty($PAGE->theme->setting_file_url('carouselitem2image', 'carouselitem2image'))) ? false : $PAGE->theme->setting_file_url('carouselitem2image', 'carouselitem2image');    
        $carouselitem2content = (empty($PAGE->theme->settings->carouselitem2content)) ? false : format_text($PAGE->theme->settings->carouselitem2content);
        $carouselitem2buttontext = (empty($PAGE->theme->settings->carouselitem2buttontext)) ? false : format_text($PAGE->theme->settings->carouselitem2buttontext);
        $carouselitem2buttonurl = (empty($PAGE->theme->settings->carouselitem2buttonurl)) ? false : $PAGE->theme->settings->carouselitem2buttonurl;
        $carouselitem2buttonurlopennew = $PAGE->theme->settings->carouselitem2buttonurlopennew== 1;
        
        
        $usecarouselitem2video = $PAGE->theme->settings->usecarouselitem2video== 1;
        
        $carouselitem2videoswitcher = $PAGE->theme->settings->carouselitem2videoswitcher; 
        $carouselitem2videoid = (empty($PAGE->theme->settings->carouselitem2videoid)) ? false : $PAGE->theme->settings->carouselitem2videoid;
        
        
        //Item 3
        $carouselitem3 = (empty($PAGE->theme->settings->carouselitem3)) ? false : format_text($PAGE->theme->settings->carouselitem3);
        $carouselitem3image = (empty($PAGE->theme->setting_file_url('carouselitem3image', 'carouselitem3image'))) ? false : $PAGE->theme->setting_file_url('carouselitem3image', 'carouselitem3image');    
        $carouselitem3content = (empty($PAGE->theme->settings->carouselitem3content)) ? false : format_text($PAGE->theme->settings->carouselitem3content);
        $carouselitem3buttontext = (empty($PAGE->theme->settings->carouselitem3buttontext)) ? false : format_text($PAGE->theme->settings->carouselitem3buttontext);
        $carouselitem3buttonurl = (empty($PAGE->theme->settings->carouselitem3buttonurl)) ? false : $PAGE->theme->settings->carouselitem3buttonurl;
        $carouselitem3buttonurlopennew = $PAGE->theme->settings->carouselitem3buttonurlopennew== 1;
        
        
        $usecarouselitem3video = $PAGE->theme->settings->usecarouselitem3video== 1;
        
        $carouselitem3videoswitcher = $PAGE->theme->settings->carouselitem3videoswitcher; 
        $carouselitem3videoid = (empty($PAGE->theme->settings->carouselitem3videoid)) ? false : $PAGE->theme->settings->carouselitem3videoid;
        
        
        //Item 4
        $carouselitem4 = (empty($PAGE->theme->settings->carouselitem4)) ? false : format_text($PAGE->theme->settings->carouselitem4);
        $carouselitem4image = (empty($PAGE->theme->setting_file_url('carouselitem4image', 'carouselitem4image'))) ? false : $PAGE->theme->setting_file_url('carouselitem4image', 'carouselitem4image');    
        $carouselitem4content = (empty($PAGE->theme->settings->carouselitem4content)) ? false : format_text($PAGE->theme->settings->carouselitem4content);
        $carouselitem4buttontext = (empty($PAGE->theme->settings->carouselitem4buttontext)) ? false : format_text($PAGE->theme->settings->carouselitem4buttontext);
        $carouselitem4buttonurl = (empty($PAGE->theme->settings->carouselitem4buttonurl)) ? false : $PAGE->theme->settings->carouselitem4buttonurl;
        $carouselitem4buttonurlopennew = $PAGE->theme->settings->carouselitem4buttonurlopennew== 1;
        
        
        $usecarouselitem4video = $PAGE->theme->settings->usecarouselitem4video== 1;
        
        $carouselitem4videoswitcher = $PAGE->theme->settings->carouselitem4videoswitcher; 
        $carouselitem4videoid = (empty($PAGE->theme->settings->carouselitem4videoid)) ? false : $PAGE->theme->settings->carouselitem4videoid;
        
        //Item 5
        $carouselitem5 = (empty($PAGE->theme->settings->carouselitem5)) ? false : format_text($PAGE->theme->settings->carouselitem5);
        $carouselitem5image = (empty($PAGE->theme->setting_file_url('carouselitem5image', 'carouselitem5image'))) ? false : $PAGE->theme->setting_file_url('carouselitem5image', 'carouselitem5image');    
        $carouselitem5content = (empty($PAGE->theme->settings->carouselitem5content)) ? false : format_text($PAGE->theme->settings->carouselitem5content);
        $carouselitem5buttontext = (empty($PAGE->theme->settings->carouselitem5buttontext)) ? false : format_text($PAGE->theme->settings->carouselitem5buttontext);
        $carouselitem5buttonurl = (empty($PAGE->theme->settings->carouselitem5buttonurl)) ? false : $PAGE->theme->settings->carouselitem5buttonurl;
        $carouselitem5buttonurlopennew = $PAGE->theme->settings->carouselitem5buttonurlopennew== 1;
        
        
        $usecarouselitem5video = $PAGE->theme->settings->usecarouselitem5video== 1;
        
        $carouselitem5videoswitcher = $PAGE->theme->settings->carouselitem5videoswitcher; 
        $carouselitem5videoid = (empty($PAGE->theme->settings->carouselitem5videoid)) ? false : $PAGE->theme->settings->carouselitem5videoid;
        
        //Item 6
        $carouselitem6 = (empty($PAGE->theme->settings->carouselitem6)) ? false : format_text($PAGE->theme->settings->carouselitem6);
        $carouselitem6image = (empty($PAGE->theme->setting_file_url('carouselitem6image', 'carouselitem6image'))) ? false : $PAGE->theme->setting_file_url('carouselitem6image', 'carouselitem6image');    
        $carouselitem6content = (empty($PAGE->theme->settings->carouselitem6content)) ? false : format_text($PAGE->theme->settings->carouselitem6content);
        $carouselitem6buttontext = (empty($PAGE->theme->settings->carouselitem6buttontext)) ? false : format_text($PAGE->theme->settings->carouselitem6buttontext);
        $carouselitem6buttonurl = (empty($PAGE->theme->settings->carouselitem6buttonurl)) ? false : $PAGE->theme->settings->carouselitem6buttonurl;
        $carouselitem6buttonurlopennew = $PAGE->theme->settings->carouselitem6buttonurlopennew== 1;
        
        
        $usecarouselitem6video = $PAGE->theme->settings->usecarouselitem6video== 1;
        
        $carouselitem6videoswitcher = $PAGE->theme->settings->carouselitem6videoswitcher; 
        $carouselitem6videoid = (empty($PAGE->theme->settings->carouselitem6videoid)) ? false : $PAGE->theme->settings->carouselitem6videoid;
        

        $fp_promo = [

        'usepromocarousel' => $usepromocarousel,
        'promosectiontitle' => $promosectiontitle,
        'promosectionintro' => $promosectionintro,
        
        
        'promocarousel' => array(
	        
            array(
	            'itemcount'=> "1",
                'hasitem' => $carouselitem1,
                'carouselimage' => $carouselitem1image,
                'carouseltitle' => $carouselitem1,
                'carouselcontent' => $carouselitem1content,
                'carouselbtn' => $carouselitem1buttontext,
                'carouselurl' => $carouselitem1buttonurl,
                'hasvideo'=> $usecarouselitem1video,
                'useyoutube' => $carouselitem1videoswitcher== 1,
                'usevimeo' => $carouselitem1videoswitcher== 2,
                'videoid' => $carouselitem1videoid,
                'urlopennew' => $carouselitem1buttonurlopennew,
            ) ,
            
            array(
	            'itemcount'=> "2",
                'hasitem' => $carouselitem2,
                'carouselimage' => $carouselitem2image,
                'carouseltitle' => $carouselitem2,
                'carouselcontent' => $carouselitem2content,
                'carouselbtn' => $carouselitem2buttontext,
                'carouselurl' => $carouselitem2buttonurl,
                'hasvideo'=> $usecarouselitem2video,
                'useyoutube' => $carouselitem2videoswitcher== 1,
                'usevimeo' => $carouselitem2videoswitcher== 2,
                'videoid' => $carouselitem2videoid,
                'urlopennew' => $carouselitem2buttonurlopennew,
            ) , 
            
            array(
	            'itemcount'=> "3",
                'hasitem' => $carouselitem3,
                'carouselimage' => $carouselitem3image,
                'carouseltitle' => $carouselitem3,
                'carouselcontent' => $carouselitem3content,
                'carouselbtn' => $carouselitem3buttontext,
                'carouselurl' => $carouselitem3buttonurl,
                'hasvideo'=> $usecarouselitem3video,
                'useyoutube' => $carouselitem3videoswitcher== 1,
                'usevimeo' => $carouselitem3videoswitcher== 2,
                'videoid' => $carouselitem3videoid,
                'urlopennew' => $carouselitem3buttonurlopennew,
            ) , 
            
            array(
	            'itemcount'=> "4",
                'hasitem' => $carouselitem4,
                'carouselimage' => $carouselitem4image,
                'carouseltitle' => $carouselitem4,
                'carouselcontent' => $carouselitem4content,
                'carouselbtn' => $carouselitem4buttontext,
                'carouselurl' => $carouselitem4buttonurl,
                'hasvideo'=> $usecarouselitem4video,
                'useyoutube' => $carouselitem4videoswitcher== 1,
                'usevimeo' => $carouselitem4videoswitcher== 2,
                'videoid' => $carouselitem4videoid,
                'urlopennew' => $carouselitem4buttonurlopennew,
            ) , 
            
            array(
	            'itemcount'=> "5",
                'hasitem' => $carouselitem5,
                'carouselimage' => $carouselitem5image,
                'carouseltitle' => $carouselitem5,
                'carouselcontent' => $carouselitem5content,
                'carouselbtn' => $carouselitem5buttontext,
                'carouselurl' => $carouselitem5buttonurl,
                'hasvideo'=> $usecarouselitem5video,
                'useyoutube' => $carouselitem5videoswitcher== 1,
                'usevimeo' => $carouselitem5videoswitcher== 2,
                'videoid' => $carouselitem5videoid,
                'urlopennew' => $carouselitem5buttonurlopennew,
            ) , 
            
            array(
	            'itemcount'=> "6",
                'hasitem' => $carouselitem6,
                'carouselimage' => $carouselitem6image,
                'carouseltitle' => $carouselitem6,
                'carouselcontent' => $carouselitem6content,
                'carouselbtn' => $carouselitem6buttontext,
                'carouselurl' => $carouselitem6buttonurl,
                'hasvideo'=> $usecarouselitem6video,
                'useyoutube' => $carouselitem6videoswitcher== 1,
                'usevimeo' => $carouselitem6videoswitcher== 2,
                'videoid' => $carouselitem6videoid,
                'urlopennew' => $carouselitem6buttonurlopennew,
            ) , 
            
            
        ),

        ];

        return $this->render_from_template('theme_edutor/fp_promo', $fp_promo);
    }
    
    
    public function fp_logos() {
        global $PAGE;

        $uselogos = $PAGE->theme->settings->uselogos == 1;
        $logossectiontitle = (empty($PAGE->theme->settings->logossectiontitle)) ? false : format_text($PAGE->theme->settings->logossectiontitle);
        $logossectionintro = (empty($PAGE->theme->settings->logossectionintro)) ? false : format_text($PAGE->theme->settings->logossectionintro);
        
        //Logo 1
        $logo1image = (empty($PAGE->theme->setting_file_url('logo1image', 'logo1image'))) ? false : $PAGE->theme->setting_file_url('logo1image', 'logo1image');
        $logo1url = (empty($PAGE->theme->settings->logo1url)) ? false : $PAGE->theme->settings->logo1url;

        //Logo 2
        $logo2image = (empty($PAGE->theme->setting_file_url('logo2image', 'logo2image'))) ? false : $PAGE->theme->setting_file_url('logo2image', 'logo2image');
        $logo2url = (empty($PAGE->theme->settings->logo2url)) ? false : $PAGE->theme->settings->logo2url;
        
        //Logo 3
        $logo3image = (empty($PAGE->theme->setting_file_url('logo3image', 'logo3image'))) ? false : $PAGE->theme->setting_file_url('logo3image', 'logo3image');
        $logo3url = (empty($PAGE->theme->settings->logo3url)) ? false : $PAGE->theme->settings->logo3url;
        
        //Logo 4
        $logo4image = (empty($PAGE->theme->setting_file_url('logo4image', 'logo4image'))) ? false : $PAGE->theme->setting_file_url('logo4image', 'logo4image');
        $logo4url = (empty($PAGE->theme->settings->logo4url)) ? false : $PAGE->theme->settings->logo4url;
        
        //Logo 5
        $logo5image = (empty($PAGE->theme->setting_file_url('logo5image', 'logo5image'))) ? false : $PAGE->theme->setting_file_url('logo5image', 'logo5image');
        $logo5url = (empty($PAGE->theme->settings->logo5url)) ? false : $PAGE->theme->settings->logo5url;
        
        //Logo 6
        $logo6image = (empty($PAGE->theme->setting_file_url('logo6image', 'logo6image'))) ? false : $PAGE->theme->setting_file_url('logo6image', 'logo6image');
        $logo6url = (empty($PAGE->theme->settings->logo6url)) ? false : $PAGE->theme->settings->logo6url;
        
        
        //Logo 7
        $logo7image = (empty($PAGE->theme->setting_file_url('logo7image', 'logo7image'))) ? false : $PAGE->theme->setting_file_url('logo7image', 'logo7image');
        $logo7url = (empty($PAGE->theme->settings->logo7url)) ? false : $PAGE->theme->settings->logo7url;
        
        //Logo 8
        $logo8image = (empty($PAGE->theme->setting_file_url('logo8image', 'logo8image'))) ? false : $PAGE->theme->setting_file_url('logo8image', 'logo8image');
        $logo8url = (empty($PAGE->theme->settings->logo8url)) ? false : $PAGE->theme->settings->logo8url;
        
        //Logo 9
        $logo9image = (empty($PAGE->theme->setting_file_url('logo9image', 'logo9image'))) ? false : $PAGE->theme->setting_file_url('logo9image', 'logo9image');
        $logo9url = (empty($PAGE->theme->settings->logo9url)) ? false : $PAGE->theme->settings->logo9url;
        
        //Logo 10
        $logo10image = (empty($PAGE->theme->setting_file_url('logo10image', 'logo10image'))) ? false : $PAGE->theme->setting_file_url('logo10image', 'logo10image');
        $logo10url = (empty($PAGE->theme->settings->logo10url)) ? false : $PAGE->theme->settings->logo10url;
        
        //Logo 11
        $logo11image = (empty($PAGE->theme->setting_file_url('logo11image', 'logo11image'))) ? false : $PAGE->theme->setting_file_url('logo11image', 'logo11image');
        $logo11url = (empty($PAGE->theme->settings->logo11url)) ? false : $PAGE->theme->settings->logo11url;
        
        //Logo 12
        $logo12image = (empty($PAGE->theme->setting_file_url('logo12image', 'logo12image'))) ? false : $PAGE->theme->setting_file_url('logo12image', 'logo12image');
        $logo12url = (empty($PAGE->theme->settings->logo12url)) ? false : $PAGE->theme->settings->logo12url;


        $fp_logos = [

        'uselogos' => $uselogos,
        'logossectiontitle'=> $logossectiontitle,
        'logossectionintro'=> $logossectionintro,
        
        'logos' => array(
	        
            array(
                'haslogo' => $logo1image,
                'logoimage' => $logo1image,
                'logourl' => $logo1url,
            ),     
            array(
                'haslogo' => $logo2image,
                'logoimage' => $logo2image,
                'logourl' => $logo2url,
            ),   
            array(
                'haslogo' => $logo3image,
                'logoimage' => $logo3image,
                'logourl' => $logo3url,
            ),   
            array(
                'haslogo' => $logo4image,
                'logoimage' => $logo4image,
                'logourl' => $logo4url,
            ),
            array(
                'haslogo' => $logo5image,
                'logoimage' => $logo5image,
                'logourl' => $logo5url,
            ),    
            array(
                'haslogo' => $logo6image,
                'logoimage' => $logo6image,
                'logourl' => $logo6url,
            ),       
            
            array(
                'haslogo' => $logo7image,
                'logoimage' => $logo7image,
                'logourl' => $logo7url,
            ), 
            
            array(
                'haslogo' => $logo8image,
                'logoimage' => $logo8image,
                'logourl' => $logo8url,
            ), 
            
            array(
                'haslogo' => $logo9image,
                'logoimage' => $logo9image,
                'logourl' => $logo9url,
            ), 
            
            array(
                'haslogo' => $logo10image,
                'logoimage' => $logo10image,
                'logourl' => $logo10url,
            ), 
            
            array(
                'haslogo' => $logo11image,
                'logoimage' => $logo11image,
                'logourl' => $logo11url,
            ), 
            
            array(
                'haslogo' => $logo12image,
                'logoimage' => $logo12image,
                'logourl' => $logo12url,
            ), 
            
            
        ),

        ];

        return $this->render_from_template('theme_edutor/fp_logos', $fp_logos);
    }
    
    
    public function fp_categories() {
        global $PAGE;
        
        $usecategories = $PAGE->theme->settings->usecategories == 1;
        
        $categoriessectiontitle = (empty($PAGE->theme->settings->categoriessectiontitle)) ? false : format_text($PAGE->theme->settings->categoriessectiontitle);
        
        
        $categoriesbuttontext = (empty($PAGE->theme->settings->categoriesbuttontext)) ? false : format_text($PAGE->theme->settings->categoriesbuttontext);
        $categoriesbuttonurl = (empty($PAGE->theme->settings->categoriesbuttonurl)) ? false : $PAGE->theme->settings->categoriesbuttonurl;
        $categoriesbuttonurlopennew = (empty($PAGE->theme->settings->categoriesbuttonurlopennew)) ? false : $PAGE->theme->settings->categoriesbuttonurlopennew;
        

        $category1title = (empty($PAGE->theme->settings->category1title)) ? false : format_text($PAGE->theme->settings->category1title);
        $category1content = (empty($PAGE->theme->settings->category1content)) ? false : format_text($PAGE->theme->settings->category1content);
        $category1url = (empty($PAGE->theme->settings->category1url)) ? false : $PAGE->theme->settings->category1url;
        $category1image = (empty($PAGE->theme->setting_file_url('category1image', 'category1image'))) ? false : $PAGE->theme->setting_file_url('category1image', 'category1image');

        

        $category2title = (empty($PAGE->theme->settings->category2title)) ? false : format_text($PAGE->theme->settings->category2title);
        $category2content = (empty($PAGE->theme->settings->category2content)) ? false : format_text($PAGE->theme->settings->category2content);
        $category2url = (empty($PAGE->theme->settings->category2url)) ? false : $PAGE->theme->settings->category2url;
        $category2image = (empty($PAGE->theme->setting_file_url('category2image', 'category2image'))) ? false : $PAGE->theme->setting_file_url('category2image', 'category2image');

        
        $category3title = (empty($PAGE->theme->settings->category3title)) ? false : format_text($PAGE->theme->settings->category3title);
        $category3content = (empty($PAGE->theme->settings->category3content)) ? false : format_text($PAGE->theme->settings->category3content);
        $category3url = (empty($PAGE->theme->settings->category3url)) ? false : $PAGE->theme->settings->category3url;
        $category3image = (empty($PAGE->theme->setting_file_url('category3image', 'category3image'))) ? false : $PAGE->theme->setting_file_url('category3image', 'category3image');

        
        $category4title = (empty($PAGE->theme->settings->category4title)) ? false : format_text($PAGE->theme->settings->category4title);
        $category4content = (empty($PAGE->theme->settings->category4content)) ? false : format_text($PAGE->theme->settings->category4content);
        $category4url = (empty($PAGE->theme->settings->category4url)) ? false : $PAGE->theme->settings->category4url;
        $category4image = (empty($PAGE->theme->setting_file_url('category4image', 'category4image'))) ? false : $PAGE->theme->setting_file_url('category4image', 'category4image');

        
        $category5title = (empty($PAGE->theme->settings->category5title)) ? false : format_text($PAGE->theme->settings->category5title);
        $category5content = (empty($PAGE->theme->settings->category5content)) ? false : format_text($PAGE->theme->settings->category5content);
        $category5url = (empty($PAGE->theme->settings->category5url)) ? false : $PAGE->theme->settings->category5url;
        $category5image = (empty($PAGE->theme->setting_file_url('category5image', 'category5image'))) ? false : $PAGE->theme->setting_file_url('category5image', 'category5image');

        
        $category6title = (empty($PAGE->theme->settings->category6title)) ? false : format_text($PAGE->theme->settings->category6title);
        $category6content = (empty($PAGE->theme->settings->category6content)) ? false : format_text($PAGE->theme->settings->category6content);
        $category6url = (empty($PAGE->theme->settings->category6url)) ? false : $PAGE->theme->settings->category6url;
        $category6image = (empty($PAGE->theme->setting_file_url('category6image', 'category6image'))) ? false : $PAGE->theme->setting_file_url('category6image', 'category6image');

        
        $category7title = (empty($PAGE->theme->settings->category7title)) ? false : format_text($PAGE->theme->settings->category7title);
        $category7content = (empty($PAGE->theme->settings->category7content)) ? false : format_text($PAGE->theme->settings->category7content);
        $category7url = (empty($PAGE->theme->settings->category7url)) ? false : $PAGE->theme->settings->category7url;
        $category7image = (empty($PAGE->theme->setting_file_url('category7image', 'category7image'))) ? false : $PAGE->theme->setting_file_url('category7image', 'category7image');

        
        $category8title = (empty($PAGE->theme->settings->category8title)) ? false : format_text($PAGE->theme->settings->category8title);
        $category8content = (empty($PAGE->theme->settings->category8content)) ? false : format_text($PAGE->theme->settings->category8content);
        $category8url = (empty($PAGE->theme->settings->category8url)) ? false : $PAGE->theme->settings->category8url;
        $category8image = (empty($PAGE->theme->setting_file_url('category8image', 'category8image'))) ? false : $PAGE->theme->setting_file_url('category8image', 'category8image');

        
        $category9title = (empty($PAGE->theme->settings->category9title)) ? false : format_text($PAGE->theme->settings->category9title);
        $category9content = (empty($PAGE->theme->settings->category9content)) ? false : format_text($PAGE->theme->settings->category9content);
        $category9url = (empty($PAGE->theme->settings->category9url)) ? false : $PAGE->theme->settings->category9url;
        $category9image = (empty($PAGE->theme->setting_file_url('category9image', 'category9image'))) ? false : $PAGE->theme->setting_file_url('category9image', 'category9image');

        
        $category10title = (empty($PAGE->theme->settings->category10title)) ? false : format_text($PAGE->theme->settings->category10title);
        $category10content = (empty($PAGE->theme->settings->category10content)) ? false : format_text($PAGE->theme->settings->category10content);
        $category10url = (empty($PAGE->theme->settings->category10url)) ? false : $PAGE->theme->settings->category10url;
        $category10image = (empty($PAGE->theme->setting_file_url('category10image', 'category10image'))) ? false : $PAGE->theme->setting_file_url('category10image', 'category10image');

        
        $category11title = (empty($PAGE->theme->settings->category11title)) ? false : format_text($PAGE->theme->settings->category11title);
        $category11content = (empty($PAGE->theme->settings->category11content)) ? false : format_text($PAGE->theme->settings->category11content);
        $category11url = (empty($PAGE->theme->settings->category11url)) ? false : $PAGE->theme->settings->category11url;
        $category11image = (empty($PAGE->theme->setting_file_url('category11image', 'category11image'))) ? false : $PAGE->theme->setting_file_url('category11image', 'category11image');

        
        $category12title = (empty($PAGE->theme->settings->category12title)) ? false : format_text($PAGE->theme->settings->category12title);
        $category12content = (empty($PAGE->theme->settings->category12content)) ? false : format_text($PAGE->theme->settings->category12content);
        $category12url = (empty($PAGE->theme->settings->category12url)) ? false : $PAGE->theme->settings->category12url;
        $category12image = (empty($PAGE->theme->setting_file_url('category12image', 'category12image'))) ? false : $PAGE->theme->setting_file_url('category12image', 'category12image');
        
        $category13title = (empty($PAGE->theme->settings->category13title)) ? false : format_text($PAGE->theme->settings->category13title);
        $category13content = (empty($PAGE->theme->settings->category13content)) ? false : format_text($PAGE->theme->settings->category13content);
        $category13url = (empty($PAGE->theme->settings->category13url)) ? false : $PAGE->theme->settings->category13url;
        $category13image = (empty($PAGE->theme->setting_file_url('category13image', 'category13image'))) ? false : $PAGE->theme->setting_file_url('category13image', 'category13image');
        
        $category14title = (empty($PAGE->theme->settings->category14title)) ? false : format_text($PAGE->theme->settings->category14title);
        $category14content = (empty($PAGE->theme->settings->category14content)) ? false : format_text($PAGE->theme->settings->category14content);
        $category14url = (empty($PAGE->theme->settings->category14url)) ? false : $PAGE->theme->settings->category14url;
        $category14image = (empty($PAGE->theme->setting_file_url('category14image', 'category14image'))) ? false : $PAGE->theme->setting_file_url('category14image', 'category14image');
        
        $category15title = (empty($PAGE->theme->settings->category15title)) ? false : format_text($PAGE->theme->settings->category15title);
        $category15content = (empty($PAGE->theme->settings->category15content)) ? false : format_text($PAGE->theme->settings->category15content);
        $category15url = (empty($PAGE->theme->settings->category15url)) ? false : $PAGE->theme->settings->category15url;
        $category15image = (empty($PAGE->theme->setting_file_url('category15image', 'category15image'))) ? false : $PAGE->theme->setting_file_url('category15image', 'category15image');
        
        $category16title = (empty($PAGE->theme->settings->category16title)) ? false : format_text($PAGE->theme->settings->category16title);
        $category16content = (empty($PAGE->theme->settings->category16content)) ? false : format_text($PAGE->theme->settings->category16content);
        $category16url = (empty($PAGE->theme->settings->category16url)) ? false : $PAGE->theme->settings->category16url;
        $category16image = (empty($PAGE->theme->setting_file_url('category16image', 'category16image'))) ? false : $PAGE->theme->setting_file_url('category16image', 'category16image');
        
        $category17title = (empty($PAGE->theme->settings->category17title)) ? false : format_text($PAGE->theme->settings->category17title);
        $category17content = (empty($PAGE->theme->settings->category17content)) ? false : format_text($PAGE->theme->settings->category17content);
        $category17url = (empty($PAGE->theme->settings->category17url)) ? false : $PAGE->theme->settings->category17url;
        $category17image = (empty($PAGE->theme->setting_file_url('category17image', 'category17image'))) ? false : $PAGE->theme->setting_file_url('category17image', 'category17image');
        
        
        $category18title = (empty($PAGE->theme->settings->category18title)) ? false : format_text($PAGE->theme->settings->category18title);
        $category18content = (empty($PAGE->theme->settings->category18content)) ? false : format_text($PAGE->theme->settings->category18content);
        $category18url = (empty($PAGE->theme->settings->category18url)) ? false : $PAGE->theme->settings->category18url;
        $category18image = (empty($PAGE->theme->setting_file_url('category18image', 'category18image'))) ? false : $PAGE->theme->setting_file_url('category18image', 'category18image');
        
        
        $category19title = (empty($PAGE->theme->settings->category19title)) ? false : format_text($PAGE->theme->settings->category19title);
        $category19content = (empty($PAGE->theme->settings->category19content)) ? false : format_text($PAGE->theme->settings->category19content);
        $category19url = (empty($PAGE->theme->settings->category19url)) ? false : $PAGE->theme->settings->category19url;
        $category19image = (empty($PAGE->theme->setting_file_url('category19image', 'category19image'))) ? false : $PAGE->theme->setting_file_url('category19image', 'category19image');
        
        
        $category20title = (empty($PAGE->theme->settings->category20title)) ? false : format_text($PAGE->theme->settings->category20title);
        $category20content = (empty($PAGE->theme->settings->category20content)) ? false : format_text($PAGE->theme->settings->category20content);
        $category20url = (empty($PAGE->theme->settings->category20url)) ? false : $PAGE->theme->settings->category20url;
        $category20image = (empty($PAGE->theme->setting_file_url('category20image', 'category20image'))) ? false : $PAGE->theme->setting_file_url('category20image', 'category20image');


        $fp_categories = [

        'usecategories' => $usecategories,
        'categoriessectiontitle' => $categoriessectiontitle,
        
        'categoriesbuttontext' => $categoriesbuttontext,
        'categoriesbuttonurl' => $categoriesbuttonurl,
        'categoriesbuttonurlopennew' => $categoriesbuttonurlopennew,

        'categories' => array(
	        
            array(
	            'categorycount'=> '1',
                'hascategory' => ($category1title || $category1image || $category1content) ? true: false,
                'categoryimage' => $category1image,
                'categorytitle' => $category1title,
                'categorycontent' => $category1content,
                'categoryurl' => $category1url,

            ) ,
            
           
            array(
	            'categorycount'=> '2',
                'hascategory' => ($category2title || $category2image || $category2content) ? true: false,
                'categoryimage' => $category2image,
                'categorytitle' => $category2title,
                'categorycontent' => $category2content,
                'categoryurl' => $category2url,

            ) ,
            
            
            array(
	            'categorycount'=> '3',
                'hascategory' => ($category3title || $category3image || $category3content) ? true: false,
                'categoryimage' => $category3image,
                'categorytitle' => $category3title,
                'categorycontent' => $category3content,
                'categoryurl' => $category3url,
            ) ,
            
            array(
	            'categorycount'=> '4',
                'hascategory' => ($category4title || $category4image || $category4content) ? true: false,
                'categoryimage' => $category4image,
                'categorytitle' => $category4title,
                'categorycontent' => $category4content,
                'categoryurl' => $category4url,
            ) ,
            
            array(
	            'categorycount'=> '5',
                'hascategory' => ($category5title || $category5image || $category5content) ? true: false,
                'categoryimage' => $category5image,
                'categorytitle' => $category5title,
                'categorycontent' => $category5content,
                'categoryurl' => $category5url,
            ) ,
            
            array(
	            'categorycount'=> '6',
                'hascategory' => ($category6title || $category6image || $category6content) ? true: false,
                'categoryimage' => $category6image,
                'categorytitle' => $category6title,
                'categorycontent' => $category6content,
                'categoryurl' => $category6url,
            ) ,
            
            array(
	            'categorycount'=> '7',
                'hascategory' => ($category7title || $category7image || $category7content) ? true: false,
                'categoryimage' => $category7image,
                'categorytitle' => $category7title,
                'categorycontent' => $category7content,
                'categoryurl' => $category7url,
            ) ,
            
            array(
	            'categorycount'=> '8',
                'hascategory' => ($category8title || $category8image || $category8content) ? true: false,
                'categoryimage' => $category8image,
                'categorytitle' => $category8title,
                'categorycontent' => $category8content,
                'categoryurl' => $category8url,
            ) ,
            
            array(
	            'categorycount'=> '9',
                'hascategory' => ($category9title || $category9image || $category9content) ? true: false,
                'categoryimage' => $category9image,
                'categorytitle' => $category9title,
                'categorycontent' => $category9content,
                'categoryurl' => $category9url,
            ) ,
            
            array(
	            'categorycount'=> '10',
                'hascategory' => ($category10title || $category10image || $category10content) ? true: false,
                'categoryimage' => $category10image,
                'categorytitle' => $category10title,
                'categorycontent' => $category10content,
                'categoryurl' => $category10url,
            ) ,
            
            array(
	            'categorycount'=> '11',
                'hascategory' => ($category11title || $category11image || $category11content) ? true: false,
                'categoryimage' => $category11image,
                'categorytitle' => $category11title,
                'categorycontent' => $category11content,
                'categoryurl' => $category11url,
            ) ,
            
            array(
	            'categorycount'=> '12',
                'hascategory' => ($category12title || $category12image || $category12content) ? true: false,
                'categoryimage' => $category12image,
                'categorytitle' => $category12title,
                'categorycontent' => $category12content,
                'categoryurl' => $category12url,
            ) ,
            
            array(
	            'categorycount'=> '13',
                'hascategory' => ($category13title || $category13image || $category13content) ? true: false,
                'categoryimage' => $category13image,
                'categorytitle' => $category13title,
                'categorycontent' => $category13content,
                'categoryurl' => $category13url,
            ) ,
            
            
            array(
	            'categorycount'=> '14',
                'hascategory' => ($category14title || $category14image || $category14content) ? true: false,
                'categoryimage' => $category14image,
                'categorytitle' => $category14title,
                'categorycontent' => $category14content,
                'categoryurl' => $category14url,
            ) ,
            
            
            array(
	            'categorycount'=> '15',
                'hascategory' => ($category15title || $category15image || $category15content) ? true: false,
                'categoryimage' => $category15image,
                'categorytitle' => $category15title,
                'categorycontent' => $category15content,
                'categoryurl' => $category15url,
            ) ,
            
            array(
	            'categorycount'=> '16',
                'hascategory' => ($category16title || $category16image || $category16content) ? true: false,
                'categoryimage' => $category16image,
                'categorytitle' => $category16title,
                'categorycontent' => $category16content,
                'categoryurl' => $category16url,
            ) ,
            
            array(
	            'categorycount'=> '17',
                'hascategory' => ($category17title || $category17image || $category17content) ? true: false,
                'categoryimage' => $category17image,
                'categorytitle' => $category17title,
                'categorycontent' => $category17content,
                'categoryurl' => $category17url,
            ) ,
            
            array(
	            'categorycount'=> '18',
                'hascategory' => ($category18title || $category18image || $category18content) ? true: false,
                'categoryimage' => $category18image,
                'categorytitle' => $category18title,
                'categorycontent' => $category18content,
                'categoryurl' => $category18url,
            ) ,
            
            array(
	            'categorycount'=> '19',
                'hascategory' => ($category19title || $category19image || $category19content) ? true: false,
                'categoryimage' => $category19image,
                'categorytitle' => $category19title,
                'categorycontent' => $category19content,
                'categoryurl' => $category19url,
            ) ,
            
            array(
	            'categorycount'=> '20',
                'hascategory' => ($category20title || $category20image || $category20content) ? true: false,
                'categoryimage' => $category20image,
                'categorytitle' => $category20title,
                'categorycontent' => $category20content,
                'categoryurl' => $category20url,
            ) ,
            
            
        ) , 
        
        ];

        return $this->render_from_template('theme_edutor/fp_categories', $fp_categories);
    }
    
    
    public function fp_teachers() {
        global $PAGE, $OUTPUT;

        $useteachers = $PAGE->theme->settings->useteachers == 1;
        
        $teachersectiontitle = (empty($PAGE->theme->settings->teachersectiontitle)) ? false : format_text($PAGE->theme->settings->teachersectiontitle);
        
        $teachersectionintro = (empty($PAGE->theme->settings->teachersectionintro)) ? false : format_text($PAGE->theme->settings->teachersectionintro);
        
        $defaultimage = $OUTPUT->image_url('teacher-default', 'theme');
        
        //Teachers section CTA button
        $teachersbuttontext = (empty($PAGE->theme->settings->teachersbuttontext)) ? false : format_text($PAGE->theme->settings->teachersbuttontext);
        $teachersbuttonurl = (empty($PAGE->theme->settings->teachersbuttonurl)) ? false : $PAGE->theme->settings->teachersbuttonurl;
        $teachersbuttonurlopennew = (empty($PAGE->theme->settings->teachersbuttonurlopennew)) ? false : $PAGE->theme->settings->teachersbuttonurlopennew;
        
        
        //Teacher 1
        $teacher1content = (empty($PAGE->theme->settings->teacher1content)) ? false : format_text($PAGE->theme->settings->teacher1content);
        $teacher1image = (empty($PAGE->theme->setting_file_url('teacher1image', 'teacher1image'))) ? false : $PAGE->theme->setting_file_url('teacher1image', 'teacher1image');
        $teacher1name = (empty($PAGE->theme->settings->teacher1name)) ? false : format_text($PAGE->theme->settings->teacher1name);
        $teacher1meta = (empty($PAGE->theme->settings->teacher1meta)) ? false : format_text($PAGE->theme->settings->teacher1meta);
        
        //Teacher 2
        $teacher2content = (empty($PAGE->theme->settings->teacher2content)) ? false : format_text($PAGE->theme->settings->teacher2content);
        $teacher2image = (empty($PAGE->theme->setting_file_url('teacher2image', 'teacher2image'))) ? false : $PAGE->theme->setting_file_url('teacher2image', 'teacher2image');
        $teacher2name = (empty($PAGE->theme->settings->teacher2name)) ? false : format_text($PAGE->theme->settings->teacher2name);
        $teacher2meta = (empty($PAGE->theme->settings->teacher2meta)) ? false : format_text($PAGE->theme->settings->teacher2meta);
        
        //Teacher 3
        $teacher3content = (empty($PAGE->theme->settings->teacher3content)) ? false : format_text($PAGE->theme->settings->teacher3content);
        $teacher3image = (empty($PAGE->theme->setting_file_url('teacher3image', 'teacher3image'))) ? false : $PAGE->theme->setting_file_url('teacher3image', 'teacher3image');
        $teacher3name = (empty($PAGE->theme->settings->teacher3name)) ? false : format_text($PAGE->theme->settings->teacher3name);
        $teacher3meta = (empty($PAGE->theme->settings->teacher3meta)) ? false : format_text($PAGE->theme->settings->teacher3meta);
        
        //Teacher 4
        $teacher4content = (empty($PAGE->theme->settings->teacher4content)) ? false : format_text($PAGE->theme->settings->teacher4content);
        $teacher4image = (empty($PAGE->theme->setting_file_url('teacher4image', 'teacher4image'))) ? false : $PAGE->theme->setting_file_url('teacher4image', 'teacher4image');
        $teacher4name = (empty($PAGE->theme->settings->teacher4name)) ? false : format_text($PAGE->theme->settings->teacher4name);
        $teacher4meta = (empty($PAGE->theme->settings->teacher4meta)) ? false : format_text($PAGE->theme->settings->teacher4meta);
        
        //Teacher 5
        $teacher5content = (empty($PAGE->theme->settings->teacher5content)) ? false : format_text($PAGE->theme->settings->teacher5content);
        $teacher5image = (empty($PAGE->theme->setting_file_url('teacher5image', 'teacher5image'))) ? false : $PAGE->theme->setting_file_url('teacher5image', 'teacher5image');
        $teacher5name = (empty($PAGE->theme->settings->teacher5name)) ? false : format_text($PAGE->theme->settings->teacher5name);
        $teacher5meta = (empty($PAGE->theme->settings->teacher5meta)) ? false : format_text($PAGE->theme->settings->teacher5meta);
        
        //Teacher 6
        $teacher6content = (empty($PAGE->theme->settings->teacher6content)) ? false : format_text($PAGE->theme->settings->teacher6content);
        $teacher6image = (empty($PAGE->theme->setting_file_url('teacher6image', 'teacher6image'))) ? false : $PAGE->theme->setting_file_url('teacher6image', 'teacher6image');
        $teacher6name = (empty($PAGE->theme->settings->teacher6name)) ? false : format_text($PAGE->theme->settings->teacher6name);
        $teacher6meta = (empty($PAGE->theme->settings->teacher6meta)) ? false : format_text($PAGE->theme->settings->teacher6meta);
        
        //Teacher 7
        $teacher7content = (empty($PAGE->theme->settings->teacher7content)) ? false : format_text($PAGE->theme->settings->teacher7content);
        $teacher7image = (empty($PAGE->theme->setting_file_url('teacher7image', 'teacher7image'))) ? false : $PAGE->theme->setting_file_url('teacher7image', 'teacher7image');
        $teacher7name = (empty($PAGE->theme->settings->teacher7name)) ? false : format_text($PAGE->theme->settings->teacher7name);
        $teacher7meta = (empty($PAGE->theme->settings->teacher7meta)) ? false : format_text($PAGE->theme->settings->teacher7meta);
        
        //Teacher 8
        $teacher8content = (empty($PAGE->theme->settings->teacher8content)) ? false : format_text($PAGE->theme->settings->teacher8content);
        $teacher8image = (empty($PAGE->theme->setting_file_url('teacher8image', 'teacher8image'))) ? false : $PAGE->theme->setting_file_url('teacher8image', 'teacher8image');
        $teacher8name = (empty($PAGE->theme->settings->teacher8name)) ? false : format_text($PAGE->theme->settings->teacher8name);
        $teacher8meta = (empty($PAGE->theme->settings->teacher8meta)) ? false : format_text($PAGE->theme->settings->teacher8meta);
        
        //Teacher 9
        $teacher9content = (empty($PAGE->theme->settings->teacher9content)) ? false : format_text($PAGE->theme->settings->teacher9content);
        $teacher9image = (empty($PAGE->theme->setting_file_url('teacher9image', 'teacher9image'))) ? false : $PAGE->theme->setting_file_url('teacher9image', 'teacher9image');
        $teacher9name = (empty($PAGE->theme->settings->teacher9name)) ? false : format_text($PAGE->theme->settings->teacher9name);
        $teacher9meta = (empty($PAGE->theme->settings->teacher9meta)) ? false : format_text($PAGE->theme->settings->teacher9meta);
        
        //Teacher 10
        $teacher10content = (empty($PAGE->theme->settings->teacher10content)) ? false : format_text($PAGE->theme->settings->teacher10content);
        $teacher10image = (empty($PAGE->theme->setting_file_url('teacher10image', 'teacher10image'))) ? false : $PAGE->theme->setting_file_url('teacher10image', 'teacher10image');
        $teacher10name = (empty($PAGE->theme->settings->teacher10name)) ? false : format_text($PAGE->theme->settings->teacher10name);
        $teacher10meta = (empty($PAGE->theme->settings->teacher10meta)) ? false : format_text($PAGE->theme->settings->teacher10meta);
        
        //Teacher 11
        $teacher11content = (empty($PAGE->theme->settings->teacher11content)) ? false : format_text($PAGE->theme->settings->teacher11content);
        $teacher11image = (empty($PAGE->theme->setting_file_url('teacher11image', 'teacher11image'))) ? false : $PAGE->theme->setting_file_url('teacher11image', 'teacher11image');
        $teacher11name = (empty($PAGE->theme->settings->teacher11name)) ? false : format_text($PAGE->theme->settings->teacher11name);
        $teacher11meta = (empty($PAGE->theme->settings->teacher11meta)) ? false : format_text($PAGE->theme->settings->teacher11meta);
        
        //Teacher 12
        $teacher12content = (empty($PAGE->theme->settings->teacher12content)) ? false : format_text($PAGE->theme->settings->teacher12content);
        $teacher12image = (empty($PAGE->theme->setting_file_url('teacher12image', 'teacher12image'))) ? false : $PAGE->theme->setting_file_url('teacher12image', 'teacher12image');
        $teacher12name = (empty($PAGE->theme->settings->teacher12name)) ? false : format_text($PAGE->theme->settings->teacher12name);
        $teacher12meta = (empty($PAGE->theme->settings->teacher12meta)) ? false : format_text($PAGE->theme->settings->teacher12meta);
        
        //Teacher 13
        $teacher13content = (empty($PAGE->theme->settings->teacher13content)) ? false : format_text($PAGE->theme->settings->teacher13content);
        $teacher13image = (empty($PAGE->theme->setting_file_url('teacher13image', 'teacher13image'))) ? false : $PAGE->theme->setting_file_url('teacher13image', 'teacher13image');
        $teacher13name = (empty($PAGE->theme->settings->teacher13name)) ? false : format_text($PAGE->theme->settings->teacher13name);
        $teacher13meta = (empty($PAGE->theme->settings->teacher13meta)) ? false : format_text($PAGE->theme->settings->teacher13meta);
        
        //Teacher 14
        $teacher14content = (empty($PAGE->theme->settings->teacher14content)) ? false : format_text($PAGE->theme->settings->teacher14content);
        $teacher14image = (empty($PAGE->theme->setting_file_url('teacher14image', 'teacher14image'))) ? false : $PAGE->theme->setting_file_url('teacher14image', 'teacher14image');
        $teacher14name = (empty($PAGE->theme->settings->teacher14name)) ? false : format_text($PAGE->theme->settings->teacher14name);
        $teacher14meta = (empty($PAGE->theme->settings->teacher14meta)) ? false : format_text($PAGE->theme->settings->teacher14meta);
        
        //Teacher 15
        $teacher15content = (empty($PAGE->theme->settings->teacher15content)) ? false : format_text($PAGE->theme->settings->teacher15content);
        $teacher15image = (empty($PAGE->theme->setting_file_url('teacher15image', 'teacher15image'))) ? false : $PAGE->theme->setting_file_url('teacher15image', 'teacher15image');
        $teacher15name = (empty($PAGE->theme->settings->teacher15name)) ? false : format_text($PAGE->theme->settings->teacher15name);
        $teacher15meta = (empty($PAGE->theme->settings->teacher15meta)) ? false : format_text($PAGE->theme->settings->teacher15meta);
        
        //Teacher 16
        $teacher16content = (empty($PAGE->theme->settings->teacher16content)) ? false : format_text($PAGE->theme->settings->teacher16content);
        $teacher16image = (empty($PAGE->theme->setting_file_url('teacher16image', 'teacher16image'))) ? false : $PAGE->theme->setting_file_url('teacher16image', 'teacher16image');
        $teacher16name = (empty($PAGE->theme->settings->teacher16name)) ? false : format_text($PAGE->theme->settings->teacher16name);
        $teacher16meta = (empty($PAGE->theme->settings->teacher16meta)) ? false : format_text($PAGE->theme->settings->teacher16meta);
        
        //Teacher 17
        $teacher17content = (empty($PAGE->theme->settings->teacher17content)) ? false : format_text($PAGE->theme->settings->teacher17content);
        $teacher17image = (empty($PAGE->theme->setting_file_url('teacher17image', 'teacher17image'))) ? false : $PAGE->theme->setting_file_url('teacher17image', 'teacher17image');
        $teacher17name = (empty($PAGE->theme->settings->teacher17name)) ? false : format_text($PAGE->theme->settings->teacher17name);
        $teacher17meta = (empty($PAGE->theme->settings->teacher17meta)) ? false : format_text($PAGE->theme->settings->teacher17meta);
        
        //Teacher 18
        $teacher18content = (empty($PAGE->theme->settings->teacher18content)) ? false : format_text($PAGE->theme->settings->teacher18content);
        $teacher18image = (empty($PAGE->theme->setting_file_url('teacher18image', 'teacher18image'))) ? false : $PAGE->theme->setting_file_url('teacher18image', 'teacher18image');
        $teacher18name = (empty($PAGE->theme->settings->teacher18name)) ? false : format_text($PAGE->theme->settings->teacher18name);
        $teacher18meta = (empty($PAGE->theme->settings->teacher18meta)) ? false : format_text($PAGE->theme->settings->teacher18meta);
        
        //Teacher 19
        $teacher19content = (empty($PAGE->theme->settings->teacher19content)) ? false : format_text($PAGE->theme->settings->teacher19content);
        $teacher19image = (empty($PAGE->theme->setting_file_url('teacher19image', 'teacher19image'))) ? false : $PAGE->theme->setting_file_url('teacher19image', 'teacher19image');
        $teacher19name = (empty($PAGE->theme->settings->teacher19name)) ? false : format_text($PAGE->theme->settings->teacher19name);
        $teacher19meta = (empty($PAGE->theme->settings->teacher19meta)) ? false : format_text($PAGE->theme->settings->teacher19meta);
        
        //Teacher 20
        $teacher20content = (empty($PAGE->theme->settings->teacher20content)) ? false : format_text($PAGE->theme->settings->teacher20content);
        $teacher20image = (empty($PAGE->theme->setting_file_url('teacher20image', 'teacher20image'))) ? false : $PAGE->theme->setting_file_url('teacher20image', 'teacher20image');
        $teacher20name = (empty($PAGE->theme->settings->teacher20name)) ? false : format_text($PAGE->theme->settings->teacher20name);
        $teacher20meta = (empty($PAGE->theme->settings->teacher20meta)) ? false : format_text($PAGE->theme->settings->teacher20meta);
       
        $fp_teachers = [

        'useteachers' => $useteachers,
        'teachersectiontitle' => $teachersectiontitle,
        'teachersectionintro'=> $teachersectionintro,
        'defaultimage' => $defaultimage,
        
        'teachersbuttontext' => $teachersbuttontext,
        'teachersbuttonurl' => $teachersbuttonurl,
        'teachersbuttonurlopennew' => $teachersbuttonurlopennew,
        
        
        
        'teachers' => array(
	        
            array(
                'hasteacher' => ($teacher1image || $teacher1name || $teacher1content) ? true: false,
                'teacherbio' => $teacher1content,
                'teacherimage' => $teacher1image,
                'teachername' => $teacher1name,
                'teachermeta' => $teacher1meta,
            ),    
            
            array(
                'hasteacher' => ($teacher2image || $teacher2name || $teacher2content) ? true: false,
                'teacherbio' => $teacher2content,
                'teacherimage' => $teacher2image,
                'teachername' => $teacher2name,
                'teachermeta' => $teacher2meta,
            ),   
            
            array(
                'hasteacher' => ($teacher3image || $teacher3name || $teacher3content) ? true: false,
                'teacherbio' => $teacher3content,
                'teacherimage' => $teacher3image,
                'teachername' => $teacher3name,
                'teachermeta' => $teacher3meta,
            ),  
            
            array(
                'hasteacher' => ($teacher4image || $teacher4name || $teacher4content) ? true: false,
                'teacherbio' => $teacher4content,
                'teacherimage' => $teacher4image,
                'teachername' => $teacher4name,
                'teachermeta' => $teacher4meta,
            ),  
            
            array(
                'hasteacher' => ($teacher5image || $teacher5name || $teacher5content) ? true: false,
                'teacherbio' => $teacher5content,
                'teacherimage' => $teacher5image,
                'teachername' => $teacher5name,
                'teachermeta' => $teacher5meta,
            ),  
            
            array(
                'hasteacher' => ($teacher6image || $teacher6name || $teacher6content) ? true: false,
                'teacherbio' => $teacher6content,
                'teacherimage' => $teacher6image,
                'teachername' => $teacher6name,
                'teachermeta' => $teacher6meta,
            ),
            
             array(
                'hasteacher' => ($teacher7image || $teacher7name || $teacher7content) ? true: false,
                'teacherbio' => $teacher7content,
                'teacherimage' => $teacher7image,
                'teachername' => $teacher7name,
                'teachermeta' => $teacher7meta,
            ), 
            
            array(
                'hasteacher' => ($teacher8image || $teacher8name || $teacher8content) ? true: false,
                'teacherbio' => $teacher8content,
                'teacherimage' => $teacher8image,
                'teachername' => $teacher8name,
                'teachermeta' => $teacher8meta,
            ), 
            
            array(
                'hasteacher' => ($teacher9image || $teacher9name || $teacher9content) ? true: false,
                'teacherbio' => $teacher9content,
                'teacherimage' => $teacher9image,
                'teachername' => $teacher9name,
                'teachermeta' => $teacher9meta,
            ), 
            
            array(
                'hasteacher' => ($teacher10image || $teacher10name || $teacher10content) ? true: false,
                'teacherbio' => $teacher10content,
                'teacherimage' => $teacher10image,
                'teachername' => $teacher10name,
                'teachermeta' => $teacher10meta,
            ), 
            
            array(
                'hasteacher' => ($teacher11image || $teacher11name || $teacher11content) ? true: false,
                'teacherbio' => $teacher11content,
                'teacherimage' => $teacher11image,
                'teachername' => $teacher11name,
                'teachermeta' => $teacher11meta,
            ), 
            
            array(
                'hasteacher' => ($teacher12image || $teacher12name || $teacher12content) ? true: false,
                'teacherbio' => $teacher12content,
                'teacherimage' => $teacher12image,
                'teachername' => $teacher12name,
                'teachermeta' => $teacher12meta,
            ), 
            
            array(
                'hasteacher' => ($teacher13image || $teacher13name || $teacher13content) ? true: false,
                'teacherbio' => $teacher13content,
                'teacherimage' => $teacher13image,
                'teachername' => $teacher13name,
                'teachermeta' => $teacher13meta,
            ), 
            
            array(
                'hasteacher' => ($teacher14image || $teacher14name || $teacher14content) ? true: false,
                'teacherbio' => $teacher14content,
                'teacherimage' => $teacher14image,
                'teachername' => $teacher14name,
                'teachermeta' => $teacher14meta,
            ), 
            
            array(
                'hasteacher' => ($teacher15image || $teacher15name || $teacher15content) ? true: false,
                'teacherbio' => $teacher15content,
                'teacherimage' => $teacher15image,
                'teachername' => $teacher15name,
                'teachermeta' => $teacher15meta,
            ), 
            
            array(
                'hasteacher' => ($teacher16image || $teacher16name || $teacher16content) ? true: false,
                'teacherbio' => $teacher16content,
                'teacherimage' => $teacher16image,
                'teachername' => $teacher16name,
                'teachermeta' => $teacher16meta,
            ), 
            
            array(
                'hasteacher' => ($teacher17image || $teacher17name || $teacher17content) ? true: false,
                'teacherbio' => $teacher17content,
                'teacherimage' => $teacher17image,
                'teachername' => $teacher17name,
                'teachermeta' => $teacher17meta,
            ), 
            
            array(
                'hasteacher' => ($teacher18image || $teacher18name || $teacher18content) ? true: false,
                'teacherbio' => $teacher18content,
                'teacherimage' => $teacher18image,
                'teachername' => $teacher18name,
                'teachermeta' => $teacher18meta,
            ), 
            
            array(
                'hasteacher' => ($teacher19image || $teacher19name || $teacher19content) ? true: false,
                'teacherbio' => $teacher19content,
                'teacherimage' => $teacher19image,
                'teachername' => $teacher19name,
                'teachermeta' => $teacher19meta,
            ), 
            
            array(
                'hasteacher' => ($teacher20image || $teacher20name || $teacher20content) ? true: false,
                'teacherbio' => $teacher20content,
                'teacherimage' => $teacher20image,
                'teachername' => $teacher20name,
                'teachermeta' => $teacher20meta,
            ), 
  
              
        ),

        ];

        return $this->render_from_template('theme_edutor/fp_teachers', $fp_teachers);
    }
    
    
    public function fp_testimonials() {
        global $PAGE, $OUTPUT;

        $usetestimonials = $PAGE->theme->settings->usetestimonials == 1;
        
        $showstarratings = $PAGE->theme->settings->showstarratings == 1;
        
        $testimonialsectiontitle = (empty($PAGE->theme->settings->testimonialsectiontitle)) ? false : format_text($PAGE->theme->settings->testimonialsectiontitle);
        $testimonialsectionintro = (empty($PAGE->theme->settings->testimonialsectionintro)) ? false : format_text($PAGE->theme->settings->testimonialsectionintro);
        
        $defaultimage = $OUTPUT->image_url('default-profile', 'theme');
        
        
        $testimonialsbuttontext = (empty($PAGE->theme->settings->testimonialsbuttontext)) ? false : format_text($PAGE->theme->settings->testimonialsbuttontext);
        $testimonialsbuttonurl = (empty($PAGE->theme->settings->testimonialsbuttonurl)) ? false : $PAGE->theme->settings->testimonialsbuttonurl;
        $testimonialsbuttonurlopennew = (empty($PAGE->theme->settings->testimonialsbuttonurlopennew)) ? false : $PAGE->theme->settings->testimonialsbuttonurlopennew;
        
        //Testimonial 1
        $testimonial1heading = (empty($PAGE->theme->settings->testimonial1heading)) ? false : format_text($PAGE->theme->settings->testimonial1heading);
        $testimonial1content = (empty($PAGE->theme->settings->testimonial1content)) ? false : format_text($PAGE->theme->settings->testimonial1content);
        $testimonial1image = (empty($PAGE->theme->setting_file_url('testimonial1image', 'testimonial1image'))) ? false : $PAGE->theme->setting_file_url('testimonial1image', 'testimonial1image');
        $testimonial1name = (empty($PAGE->theme->settings->testimonial1name)) ? false : format_text($PAGE->theme->settings->testimonial1name);
        $testimonial1meta = (empty($PAGE->theme->settings->testimonial1meta)) ? false : format_text($PAGE->theme->settings->testimonial1meta);
        
        //Testimonial 2
        $testimonial2heading = (empty($PAGE->theme->settings->testimonial2heading)) ? false : format_text($PAGE->theme->settings->testimonial2heading);
        $testimonial2content = (empty($PAGE->theme->settings->testimonial2content)) ? false : format_text($PAGE->theme->settings->testimonial2content);
        $testimonial2image = (empty($PAGE->theme->setting_file_url('testimonial2image', 'testimonial2image'))) ? false : $PAGE->theme->setting_file_url('testimonial2image', 'testimonial2image');
        $testimonial2name = (empty($PAGE->theme->settings->testimonial2name)) ? false : format_text($PAGE->theme->settings->testimonial2name);
        $testimonial2meta = (empty($PAGE->theme->settings->testimonial2meta)) ? false : format_text($PAGE->theme->settings->testimonial2meta);
        
        //Testimonial 3
        $testimonial3heading = (empty($PAGE->theme->settings->testimonial3heading)) ? false : format_text($PAGE->theme->settings->testimonial3heading);
        $testimonial3content = (empty($PAGE->theme->settings->testimonial3content)) ? false : format_text($PAGE->theme->settings->testimonial3content);
        $testimonial3image = (empty($PAGE->theme->setting_file_url('testimonial3image', 'testimonial3image'))) ? false : $PAGE->theme->setting_file_url('testimonial3image', 'testimonial3image');
        $testimonial3name = (empty($PAGE->theme->settings->testimonial3name)) ? false : format_text($PAGE->theme->settings->testimonial3name);
        $testimonial3meta = (empty($PAGE->theme->settings->testimonial3meta)) ? false : format_text($PAGE->theme->settings->testimonial3meta);
        
        //Testimonial 4
        $testimonial4heading = (empty($PAGE->theme->settings->testimonial4heading)) ? false : format_text($PAGE->theme->settings->testimonial4heading);
        $testimonial4content = (empty($PAGE->theme->settings->testimonial4content)) ? false : format_text($PAGE->theme->settings->testimonial4content);
        $testimonial4image = (empty($PAGE->theme->setting_file_url('testimonial4image', 'testimonial4image'))) ? false : $PAGE->theme->setting_file_url('testimonial4image', 'testimonial4image');
        $testimonial4name = (empty($PAGE->theme->settings->testimonial4name)) ? false : format_text($PAGE->theme->settings->testimonial4name);
        $testimonial4meta = (empty($PAGE->theme->settings->testimonial4meta)) ? false : format_text($PAGE->theme->settings->testimonial4meta);
        
        //Testimonial 5
        $testimonial5heading = (empty($PAGE->theme->settings->testimonial5heading)) ? false : format_text($PAGE->theme->settings->testimonial5heading);
        $testimonial5content = (empty($PAGE->theme->settings->testimonial5content)) ? false : format_text($PAGE->theme->settings->testimonial5content);
        $testimonial5image = (empty($PAGE->theme->setting_file_url('testimonial5image', 'testimonial5image'))) ? false : $PAGE->theme->setting_file_url('testimonial5image', 'testimonial5image');
        $testimonial5name = (empty($PAGE->theme->settings->testimonial5name)) ? false : format_text($PAGE->theme->settings->testimonial5name);
        $testimonial5meta = (empty($PAGE->theme->settings->testimonial5meta)) ? false : format_text($PAGE->theme->settings->testimonial5meta);
        
        //Testimonial 6
        $testimonial6heading = (empty($PAGE->theme->settings->testimonial6heading)) ? false : format_text($PAGE->theme->settings->testimonial6heading);
        $testimonial6content = (empty($PAGE->theme->settings->testimonial6content)) ? false : format_text($PAGE->theme->settings->testimonial6content);
        $testimonial6image = (empty($PAGE->theme->setting_file_url('testimonial6image', 'testimonial6image'))) ? false : $PAGE->theme->setting_file_url('testimonial6image', 'testimonial6image');
        $testimonial6name = (empty($PAGE->theme->settings->testimonial6name)) ? false : format_text($PAGE->theme->settings->testimonial6name);
        $testimonial6meta = (empty($PAGE->theme->settings->testimonial6meta)) ? false : format_text($PAGE->theme->settings->testimonial6meta);
       
        $fp_testimonials = [

        'usetestimonials' => $usetestimonials,
        'testimonialsectiontitle' => $testimonialsectiontitle,
        'testimonialsectionintro' => $testimonialsectionintro,
        'defaultimage' => $defaultimage,
        
        'testimonialsbuttontext' => $testimonialsbuttontext,
        'testimonialsbuttonurl' => $testimonialsbuttonurl,
        'testimonialsbuttonurlopennew' => $testimonialsbuttonurlopennew,
        
        'showstarratings' => $showstarratings,
        
        
        'testimonials' => array(
	        
            array(
                'hastestimonial' => ($testimonial1content || $testimonial1heading || $testimonial1image) ? true: false,
                'testimonialheading' => $testimonial1heading,
                'testimonial' => $testimonial1content,
                'testimonialimage' => $testimonial1image,
                'testimonialname' => $testimonial1name,
                'testimonialmeta' => $testimonial1meta,
            ),    
            
            array(
                'hastestimonial' => ($testimonial2content || $testimonial2heading || $testimonial2image) ? true: false,
                'testimonialheading' => $testimonial2heading,
                'testimonial' => $testimonial2content,
                'testimonialimage' => $testimonial2image,
                'testimonialname' => $testimonial2name,
                'testimonialmeta' => $testimonial2meta,
            ),   
            
            array(
                'hastestimonial' => ($testimonial3content || $testimonial3heading || $testimonial3image) ? true: false,
                'testimonialheading' => $testimonial3heading,
                'testimonial' => $testimonial3content,
                'testimonialimage' => $testimonial3image,
                'testimonialname' => $testimonial3name,
                'testimonialmeta' => $testimonial3meta,
            ),  
            
            array(
                'hastestimonial' => ($testimonial4content || $testimonial4heading || $testimonial4image) ? true: false,
                'testimonialheading' => $testimonial4heading,
                'testimonial' => $testimonial4content,
                'testimonialimage' => $testimonial4image,
                'testimonialname' => $testimonial4name,
                'testimonialmeta' => $testimonial4meta,
            ),  
            
            array(
                'hastestimonial' => ($testimonial5content || $testimonial5heading || $testimonial5image) ? true: false,
                'testimonialheading' => $testimonial5heading,
                'testimonial' => $testimonial5content,
                'testimonialimage' => $testimonial5image,
                'testimonialname' => $testimonial5name,
                'testimonialmeta' => $testimonial5meta,
            ),  
            
            array(
                'hastestimonial' => ($testimonial6content || $testimonial6heading || $testimonial6image) ? true: false,
                'testimonialheading' => $testimonial6heading,
                'testimonial' => $testimonial6content,
                'testimonialimage' => $testimonial6image,
                'testimonialname' => $testimonial6name,
                'testimonialmeta' => $testimonial6meta,
            ),  
            
                         
        ),

        ];

        return $this->render_from_template('theme_edutor/fp_testimonials', $fp_testimonials);
    }
    
    
    public function fp_faq() {
        global $PAGE;

        $usefaq = $PAGE->theme->settings->usefaq == 1;
        
        $faqsectiontitle = (empty($PAGE->theme->settings->faqsectiontitle)) ? false : format_text($PAGE->theme->settings->faqsectiontitle);
        $faqsectionintro = (empty($PAGE->theme->settings->faqsectionintro)) ? false : format_text($PAGE->theme->settings->faqsectionintro);
        
        $faqsectionimage = (empty($PAGE->theme->setting_file_url('faqsectionimage', 'faqsectionimage'))) ? false : $PAGE->theme->setting_file_url('faqsectionimage', 'faqsectionimage');


        $faq1title = (empty($PAGE->theme->settings->faq1title)) ? false : format_text($PAGE->theme->settings->faq1title);
        $faq1content = (empty($PAGE->theme->settings->faq1content)) ? false : format_text($PAGE->theme->settings->faq1content);
        
        
        $faq2title = (empty($PAGE->theme->settings->faq2title)) ? false : format_text($PAGE->theme->settings->faq2title);
        $faq2content = (empty($PAGE->theme->settings->faq2content)) ? false : format_text($PAGE->theme->settings->faq2content);
        
        $faq3title = (empty($PAGE->theme->settings->faq3title)) ? false : format_text($PAGE->theme->settings->faq3title);
        $faq3content = (empty($PAGE->theme->settings->faq3content)) ? false : format_text($PAGE->theme->settings->faq3content);
        
        $faq4title = (empty($PAGE->theme->settings->faq4title)) ? false : format_text($PAGE->theme->settings->faq4title);
        $faq4content = (empty($PAGE->theme->settings->faq4content)) ? false : format_text($PAGE->theme->settings->faq4content);
        
        $faq5title = (empty($PAGE->theme->settings->faq5title)) ? false : format_text($PAGE->theme->settings->faq5title);
        $faq5content = (empty($PAGE->theme->settings->faq5content)) ? false : format_text($PAGE->theme->settings->faq5content);
        
        $faq6title = (empty($PAGE->theme->settings->faq6title)) ? false : format_text($PAGE->theme->settings->faq6title);
        $faq6content = (empty($PAGE->theme->settings->faq6content)) ? false : format_text($PAGE->theme->settings->faq6content);
        
        $faq7title = (empty($PAGE->theme->settings->faq7title)) ? false : format_text($PAGE->theme->settings->faq7title);
        $faq7content = (empty($PAGE->theme->settings->faq7content)) ? false : format_text($PAGE->theme->settings->faq7content);
        
        $faq8title = (empty($PAGE->theme->settings->faq8title)) ? false : format_text($PAGE->theme->settings->faq8title);
        $faq8content = (empty($PAGE->theme->settings->faq8content)) ? false : format_text($PAGE->theme->settings->faq8content);
        
        $faq9title = (empty($PAGE->theme->settings->faq9title)) ? false : format_text($PAGE->theme->settings->faq9title);
        $faq9content = (empty($PAGE->theme->settings->faq9content)) ? false : format_text($PAGE->theme->settings->faq9content);
        
        $faq10title = (empty($PAGE->theme->settings->faq10title)) ? false : format_text($PAGE->theme->settings->faq10title);
        $faq10content = (empty($PAGE->theme->settings->faq10content)) ? false : format_text($PAGE->theme->settings->faq10content);
        
        $faqsectionbuttontext = (empty($PAGE->theme->settings->faqsectionbuttontext)) ? false : format_text($PAGE->theme->settings->faqsectionbuttontext);
        $faqsectionbuttonurl = (empty($PAGE->theme->settings->faqsectionbuttonurl)) ? false : $PAGE->theme->settings->faqsectionbuttonurl;
        $faqsectionbuttonurlopennew = $PAGE->theme->settings->faqsectionbuttonurlopennew== 1;


        $fp_faq = [

        'usefaq' => $usefaq,
        'faqsectiontitle' => $faqsectiontitle,
        'faqsectionintro' => $faqsectionintro,
        
        'faqsectionimage' => $faqsectionimage,
        
        'faq1title' => $faq1title,
        'faq2title' => $faq2title,
        'faq3title' => $faq3title,
        'faq4title' => $faq4title,
        'faq5title' => $faq5title,
        'faq6title' => $faq6title,
        'faq7title' => $faq7title,
        'faq8title' => $faq8title,
        'faq9title' => $faq9title,
        'faq10title' => $faq10title,
        
        'faq1content' => $faq1content,
        'faq2content' => $faq2content,
        'faq3content' => $faq3content,
        'faq4content' => $faq4content,
        'faq5content' => $faq5content,
        'faq6content' => $faq6content,
        'faq7content' => $faq7content,
        'faq8content' => $faq8content,
        'faq9content' => $faq9content,
        'faq10content' => $faq10content,
        
        'hasfaqcta' => $faqsectionbuttontext && $faqsectionbuttonurl,
        'faqbutton' => $faqsectionbuttontext,
        'faqurl'=> $faqsectionbuttonurl,
        'urlopennew' => $faqsectionbuttonurlopennew,


        ];

        return $this->render_from_template('theme_edutor/fp_faq', $fp_faq);
    }
    
    public function fp_ctasection() {
        global $PAGE;
        
        $usectasection = $PAGE->theme->settings->usectasection == 1;
        $ctasectiontitle = (empty($PAGE->theme->settings->ctasectiontitle)) ? false : format_text($PAGE->theme->settings->ctasectiontitle);
        $ctasectioncontent = (empty($PAGE->theme->settings->ctasectioncontent)) ? false : format_text($PAGE->theme->settings->ctasectioncontent);
        $ctasectionbuttontext = (empty($PAGE->theme->settings->ctasectionbuttontext)) ? false : format_text($PAGE->theme->settings->ctasectionbuttontext);
        $ctasectionbuttonurl = (empty($PAGE->theme->settings->ctasectionbuttonurl)) ? false : $PAGE->theme->settings->ctasectionbuttonurl;
        $ctasectionbuttonurlopennew = $PAGE->theme->settings->ctasectionbuttonurlopennew== 1;
     
  
        $ctasectionimage = (empty($PAGE->theme->setting_file_url('ctasectionimage', 'ctasectionimage'))) ? false : $PAGE->theme->setting_file_url('ctasectionimage', 'ctasectionimage');
        
        $usectadatabox = $PAGE->theme->settings->usectadatabox == 1;
        
        $ctadataitem1title = (empty($PAGE->theme->settings->ctadataitem1title)) ? false : format_text($PAGE->theme->settings->ctadataitem1title);
        $ctadataitem1meta = (empty($PAGE->theme->settings->ctadataitem1meta)) ? false : format_text($PAGE->theme->settings->ctadataitem1meta);
        $ctadataitem2title = (empty($PAGE->theme->settings->ctadataitem2title)) ? false : format_text($PAGE->theme->settings->ctadataitem2title);
        $ctadataitem2meta = (empty($PAGE->theme->settings->ctadataitem2meta)) ? false : format_text($PAGE->theme->settings->ctadataitem2meta);
        $ctadataitem3title = (empty($PAGE->theme->settings->ctadataitem3title)) ? false : format_text($PAGE->theme->settings->ctadataitem3title);
        $ctadataitem3meta = (empty($PAGE->theme->settings->ctadataitem3meta)) ? false : format_text($PAGE->theme->settings->ctadataitem3meta);
        $ctadataitem4title = (empty($PAGE->theme->settings->ctadataitem4title)) ? false : format_text($PAGE->theme->settings->ctadataitem4title);
        $ctadataitem4meta = (empty($PAGE->theme->settings->ctadataitem4meta)) ? false : format_text($PAGE->theme->settings->ctadataitem4meta);
        
        
        
        $usebenefits = $PAGE->theme->settings->usebenefits == 1;
        
        $usebenefit1image = $PAGE->theme->settings->usebenefit1image == 1;
        $usebenefit2image = $PAGE->theme->settings->usebenefit2image == 1;
        $usebenefit3image = $PAGE->theme->settings->usebenefit3image == 1;
        $usebenefit4image = $PAGE->theme->settings->usebenefit4image == 1;
        $usebenefit5image = $PAGE->theme->settings->usebenefit5image == 1;
        $usebenefit6image = $PAGE->theme->settings->usebenefit6image == 1;
        
        
        $benefitsbuttontext = (empty($PAGE->theme->settings->benefitsbuttontext)) ? false : format_text($PAGE->theme->settings->benefitsbuttontext);
        $benefitsbuttonurl = (empty($PAGE->theme->settings->benefitsbuttonurl)) ? false : $PAGE->theme->settings->benefitsbuttonurl;
        $benefitsbuttonurlopennew = (empty($PAGE->theme->settings->benefitsbuttonurlopennew)) ? false : $PAGE->theme->settings->benefitsbuttonurlopennew;

        
        $benefit1icon = (empty($PAGE->theme->settings->benefit1icon)) ? false : $PAGE->theme->settings->benefit1icon;
        $benefit1image = (empty($PAGE->theme->setting_file_url('benefit1image', 'benefit1image'))) ? false : $PAGE->theme->setting_file_url('benefit1image', 'benefit1image');
        $benefit1title = (empty($PAGE->theme->settings->benefit1title)) ? false : format_text($PAGE->theme->settings->benefit1title);
        $benefit1content = (empty($PAGE->theme->settings->benefit1content)) ? false : format_text($PAGE->theme->settings->benefit1content);
        
        
        $benefit2icon = (empty($PAGE->theme->settings->benefit2icon)) ? false : $PAGE->theme->settings->benefit2icon;
        $benefit2image = (empty($PAGE->theme->setting_file_url('benefit2image', 'benefit2image'))) ? false : $PAGE->theme->setting_file_url('benefit2image', 'benefit2image');
        $benefit2title = (empty($PAGE->theme->settings->benefit2title)) ? false : format_text($PAGE->theme->settings->benefit2title);
        $benefit2content = (empty($PAGE->theme->settings->benefit2content)) ? false : format_text($PAGE->theme->settings->benefit2content);
        
        $benefit3icon = (empty($PAGE->theme->settings->benefit3icon)) ? false : $PAGE->theme->settings->benefit3icon;
        $benefit3image = (empty($PAGE->theme->setting_file_url('benefit3image', 'benefit3image'))) ? false : $PAGE->theme->setting_file_url('benefit3image', 'benefit3image');
        $benefit3title = (empty($PAGE->theme->settings->benefit3title)) ? false : format_text($PAGE->theme->settings->benefit3title);
        $benefit3content = (empty($PAGE->theme->settings->benefit3content)) ? false : format_text($PAGE->theme->settings->benefit3content);
        
        $benefit4icon = (empty($PAGE->theme->settings->benefit4icon)) ? false : $PAGE->theme->settings->benefit4icon;
        $benefit4image = (empty($PAGE->theme->setting_file_url('benefit4image', 'benefit4image'))) ? false : $PAGE->theme->setting_file_url('benefit4image', 'benefit4image');
        $benefit4title = (empty($PAGE->theme->settings->benefit4title)) ? false : format_text($PAGE->theme->settings->benefit4title);
        $benefit4content = (empty($PAGE->theme->settings->benefit4content)) ? false : format_text($PAGE->theme->settings->benefit4content);
        
        $benefit5icon = (empty($PAGE->theme->settings->benefit5icon)) ? false : $PAGE->theme->settings->benefit5icon;
        $benefit5image = (empty($PAGE->theme->setting_file_url('benefit5image', 'benefit5image'))) ? false : $PAGE->theme->setting_file_url('benefit5image', 'benefit5image');
        $benefit5title = (empty($PAGE->theme->settings->benefit5title)) ? false : format_text($PAGE->theme->settings->benefit5title);
        $benefit5content = (empty($PAGE->theme->settings->benefit5content)) ? false : format_text($PAGE->theme->settings->benefit5content);
        
        $benefit6icon = (empty($PAGE->theme->settings->benefit6icon)) ? false : $PAGE->theme->settings->benefit6icon;
        $benefit6image = (empty($PAGE->theme->setting_file_url('benefit6image', 'benefit6image'))) ? false : $PAGE->theme->setting_file_url('benefit6image', 'benefit6image');
        $benefit6title = (empty($PAGE->theme->settings->benefit6title)) ? false : format_text($PAGE->theme->settings->benefit6title);
        $benefit6content = (empty($PAGE->theme->settings->benefit6content)) ? false : format_text($PAGE->theme->settings->benefit6content);




        $fp_ctasection = [
        
            'hasctasection' => $usectasection, 
            'ctatitle' => $ctasectiontitle, 
            'ctacontent' => $ctasectioncontent, 
            'hasctabutton' => ($ctasectionbuttontext && $ctasectionbuttonurl) ? true : false,
            'ctabutton' => $ctasectionbuttontext,
            'ctaurl' => $ctasectionbuttonurl,
            'urlopennew' => $ctasectionbuttonurlopennew,
            
            'ctasectionimage'=> $ctasectionimage,
            
            'hasctadatabox' => $usectadatabox,
            
            
            'ctadataitems' => array(
	        
	            array(
		            'ctadataitemtitle' => $ctadataitem1title,
                    'ctadataitemmeta' => $ctadataitem1meta,
	            ) ,
	            array(
		            'ctadataitemtitle' => $ctadataitem2title,
                    'ctadataitemmeta' => $ctadataitem2meta,
	            ) ,
	            array(
		            'ctadataitemtitle' => $ctadataitem3title,
                    'ctadataitemmeta' => $ctadataitem3meta,
	            ) ,
            
                array(
		            'ctadataitemtitle' => $ctadataitem4title,
                    'ctadataitemmeta' => $ctadataitem4meta,
	            ) ,
            
            ),
            
            'usebenefits' => $usebenefits,
	        
	        'benefitsbuttontext' => $benefitsbuttontext,
	        'benefitsbuttonurl' => $benefitsbuttonurl,
	        'benefitsbuttonurlopennew' => $benefitsbuttonurlopennew,
	        
	        
	        
	        'benefits' => array(
	        
	            array(
	                'hasbenefit' => $benefit1title,
	                'benefiticon' => $benefit1icon,
	                'usebenefitimage' => $usebenefit1image,
	                'benefitimage' => $benefit1image,
	                'benefittitle' => $benefit1title,
	                'benefitcontent' => $benefit1content,
	            ) ,
	            
	            array(
	                'hasbenefit' => $benefit2title,
	                'benefiticon' => $benefit2icon,
	                'usebenefitimage' => $usebenefit2image,
	                'benefitimage' => $benefit2image,
	                'benefittitle' => $benefit2title,
	                'benefitcontent' => $benefit2content,
	            ) ,
	            
	            array(
	                'hasbenefit' => $benefit3title,
	                'benefiticon' => $benefit3icon,
	                'usebenefitimage' => $usebenefit3image,
	                'benefitimage' => $benefit3image,
	                'benefittitle' => $benefit3title,
	                'benefitcontent' => $benefit3content,
	            ) ,
	            
	            array(
	                'hasbenefit' => $benefit4title,
	                'benefiticon' => $benefit4icon,
	                'usebenefitimage' => $usebenefit4image,
	                'benefitimage' => $benefit4image,
	                'benefittitle' => $benefit4title,
	                'benefitcontent' => $benefit4content,
	            ) ,
	            
	            array(
	                'hasbenefit' => $benefit5title,
	                'benefiticon' => $benefit5icon,
	                'usebenefitimage' => $usebenefit5image,
	                'benefitimage' => $benefit5image,
	                'benefittitle' => $benefit5title,
	                'benefitcontent' => $benefit5content,
	            ) ,
	            
	            array(
	                'hasbenefit' => $benefit6title,
	                'benefiticon' => $benefit6icon,
	                'usebenefitimage' => $usebenefit6image,
	                'benefitimage' => $benefit6image,
	                'benefittitle' => $benefit6title,
	                'benefitcontent' => $benefit6content,
	            ) ,
	            
	        ),




        ];
        
        
        
                
        

        return $this->render_from_template('theme_edutor/fp_ctasection', $fp_ctasection);
    }
    
    
    public function footer_branding() {
	    
        global $PAGE;
        //footer logo image
        $footerlogoimage = (empty($PAGE->theme->setting_file_url('footerlogoimage', 'footerlogoimage'))) ? false : $PAGE->theme->setting_file_url('footerlogoimage', 'footerlogoimage');
        
        //footer branding block
        $footerbrandingblock = (empty($PAGE->theme->settings->footerbrandingblock)) ? false : format_text($PAGE->theme->settings->footerbrandingblock);

        $footer_branding = [
	        'footerlogoimage' => $footerlogoimage,
	        'footerbrandingblock' => $footerbrandingblock,
        ];
        
        
        return $this->render_from_template('theme_edutor/footer_branding', $footer_branding);
    }
    
    
    public function footer_blocks() {
        global $PAGE;

        $usefooterblocks = $PAGE->theme->settings->usefooterblocks == 1;
        
        

        
        //Blocks
        $footerblock1 = (empty($PAGE->theme->settings->footerblock1)) ? false : format_text($PAGE->theme->settings->footerblock1);
        $footerblock2 = (empty($PAGE->theme->settings->footerblock2)) ? false : format_text($PAGE->theme->settings->footerblock2);
        $footerblock3 = (empty($PAGE->theme->settings->footerblock3)) ? false : format_text($PAGE->theme->settings->footerblock3);

        
        
              
        $footer_blocks = [

        'usefooterblocks' => $usefooterblocks,
        
        'footerblocks' => array(
	        
            array(
                'hasblock' => $footerblock1,
                'blockcontent' => $footerblock1,
            ), 
            array(
                'hasblock' => $footerblock2,
                'blockcontent' => $footerblock2,
            ),    
            
            array(
                'hasblock' => $footerblock3,
                'blockcontent' => $footerblock3,
            ),    
 

        ),

        ];

        return $this->render_from_template('theme_edutor/footer_blocks', $footer_blocks);
    }
    
    
    public function footer_widget() {
        global $PAGE;
        
        $usefooterwidget = $PAGE->theme->settings->usefooterwidget == 1;
        
        $footerwidgettitle = (empty($PAGE->theme->settings->footerwidgettitle)) ? false : format_text($PAGE->theme->settings->footerwidgettitle);
        $footerwidget = (empty($PAGE->theme->settings->footerwidget)) ? false : format_text($PAGE->theme->settings->footerwidget);
        
        $footer_widget = [
	        'usefooterwidget' => $usefooterwidget,
	        'footerwidgettitle' => $footerwidgettitle,
	        'footerwidgetcontent' => $footerwidget,
	        
        ];
        
        
        return $this->render_from_template('theme_edutor/footer_widget', $footer_widget);
    }
    
    
     public function footer_copyright() {
	     
        global $PAGE;
        
        $setting = $PAGE->theme->settings->copyright;
        
        return $setting != '' ? $setting : '';
        
    }
    
    public function course_image() {
        global $CFG, $COURSE, $PAGE, $OUTPUT;
        // Get course overview files.
        if (empty($CFG->courseoverviewfileslimit)) {
            return '';
        }
        require_once ($CFG->libdir . '/filestorage/file_storage.php');
        require_once ($CFG->dirroot . '/course/lib.php');
        $fs = get_file_storage();
        $context = context_course::instance($COURSE->id);
        $files = $fs->get_area_files($context->id, 'course', 'overviewfiles', false, 'filename', false);
        if (count($files)) {
            $overviewfilesoptions = course_overviewfiles_options($COURSE->id);
            $acceptedtypes = $overviewfilesoptions['accepted_types'];
            if ($acceptedtypes !== '*') {
                // Filter only files with allowed extensions.
                require_once ($CFG->libdir . '/filelib.php');
                foreach ($files as $key => $file) {
                    if (!file_extension_in_typegroup($file->get_filename() , $acceptedtypes)) {
                        unset($files[$key]);
                    }
                }
            }
            if (count($files) > $CFG->courseoverviewfileslimit) {
                // Return no more than $CFG->courseoverviewfileslimit files.
                $files = array_slice($files, 0, $CFG->courseoverviewfileslimit, true);
            }
        }

        // Get course overview files as images - set $courseimage.
        // The loop means that the LAST stored image will be the one displayed if >1 image file.
        $courseimage = '';
        foreach ($files as $file) {
            $isimage = $file->is_valid_image();
            if ($isimage) {
	            
	            //Before Moodle 5.1:
	            /*
                $courseimage = file_encode_url("$CFG->wwwroot/pluginfile.php", '/' . $file->get_contextid() . '/' . $file->get_component() . '/' . $file->get_filearea() . $file->get_filepath() . $file->get_filename() , !$isimage);
                */
                
                //After Moodle 5.1:
                $courseimage = \core\url::make_pluginfile_url(
				    $file->get_contextid(),
				    $file->get_component(),
				    $file->get_filearea(),
				    $file->get_filepath(),
				    $file->get_filename(),
				    false // no forcedownload for images
				)->out(false);
				                
                
                
            }
        }
        
        
        // Create html for header.
        
        $html = "";
        
        $defaultcourseimage = theme_edutor_get_setting('defaultcourseimage');

        if (theme_edutor_get_setting('usecourseheaderimage')) {
	        
	        
	        if ($courseimage) {
		        $html = html_writer::start_div('course-header-bg');
	        
	            $html .= html_writer::start_div('course-header-image', array(
	                'style' => 'background-image: url("' . $courseimage . '"); -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover; background-repeat: no-repeat;  background-position: center; width:100%; height: 100%;'
	            ));
	            $html .= html_writer::end_div(); // End has-course-image inline style div.
	            
	            $html .= html_writer::start_div('mask');
	            
	            $html .= html_writer::end_div(); //End mask div
	            
	            $html .= html_writer::end_div(); 
	            
	        } elseif (theme_edutor_get_setting('defaultcourseimage')) {
		        $html = html_writer::start_div('course-header-bg');
	        
	            $html .= html_writer::start_div('course-header-image');
	            $html .= html_writer::end_div(); // End has-course-image inline style div.
	            
	            $html .= html_writer::start_div('mask');
	            
	            $html .= html_writer::end_div(); //End mask div
	            
	            $html .= html_writer::end_div(); 
	        } else {
		        $html ="";
	        }
	        
            
        } 

        return $html;

    }
    
    
    public function has_course_image() {
        global $CFG, $COURSE, $PAGE, $OUTPUT;
        // Get course overview files.
        if (empty($CFG->courseoverviewfileslimit)) {
            return '';
        }
        require_once ($CFG->libdir . '/filestorage/file_storage.php');
        require_once ($CFG->dirroot . '/course/lib.php');
        $fs = get_file_storage();
        $context = context_course::instance($COURSE->id);
        $files = $fs->get_area_files($context->id, 'course', 'overviewfiles', false, 'filename', false);
        if (count($files)) {
            $overviewfilesoptions = course_overviewfiles_options($COURSE->id);
            $acceptedtypes = $overviewfilesoptions['accepted_types'];
            if ($acceptedtypes !== '*') {
                // Filter only files with allowed extensions.
                require_once ($CFG->libdir . '/filelib.php');
                foreach ($files as $key => $file) {
                    if (!file_extension_in_typegroup($file->get_filename() , $acceptedtypes)) {
                        unset($files[$key]);
                    }
                }
            }
            if (count($files) > $CFG->courseoverviewfileslimit) {
                // Return no more than $CFG->courseoverviewfileslimit files.
                $files = array_slice($files, 0, $CFG->courseoverviewfileslimit, true);
            }
        }

        // Get course overview files as images - set $courseimage.
        // The loop means that the LAST stored image will be the one displayed if >1 image file.
        $courseimage = '';
        foreach ($files as $file) {
            $isimage = $file->is_valid_image();
            if ($isimage) {
	            
	            /* Before Moodle 5.1:
                $courseimage = file_encode_url("$CFG->wwwroot/pluginfile.php", '/' . $file->get_contextid() . '/' . $file->get_component() . '/' . $file->get_filearea() . $file->get_filepath() . $file->get_filename() , !$isimage);
                */
                
                //After Moodle 5.1:
                $courseimage = \core\url::make_pluginfile_url(
				    $file->get_contextid(),
				    $file->get_component(),
				    $file->get_filearea(),
				    $file->get_filepath(),
				    $file->get_filename(),
				    false
				)->out(false);
                
                
            }
        }


        $defaultcourseimage = (empty($PAGE->theme->setting_file_url('defaultcourseimage', 'defaultcourseimage'))) ? false : $PAGE->theme->setting_file_url('defaultcourseimage', 'defaultcourseimage');
        
        if (theme_edutor_get_setting('usecourseheaderimage') && ( $courseimage || $defaultcourseimage ) ) {
	        
	        return "has-course-header-image";
            
        } 
 
    }
    
    
    public function fp_javascript() {
        global $PAGE;
        
        //$usertl = $PAGE->theme->settings->usertl == 1; 
        $usertl = right_to_left()? 1 : 0;      
        
        //Featured Pane Blocks Breakpoint Display
        $paneblocks_xs = $PAGE->theme->settings->paneblocks_xs;
        $paneblocks_sm = $PAGE->theme->settings->paneblocks_sm;
        $paneblocks_md = $PAGE->theme->settings->paneblocks_md;
        $paneblocks_lg = $PAGE->theme->settings->paneblocks_lg;
        $paneblocks_xl = $PAGE->theme->settings->paneblocks_xl;
        $paneblocks_xxl = $PAGE->theme->settings->paneblocks_xxl;
        
        $fp_javascript = [
	        'usertl' => $usertl,
	        'paneblocks_xs' => $paneblocks_xs,
	        'paneblocks_sm' => $paneblocks_sm,
	        'paneblocks_md' => $paneblocks_md,
	        'paneblocks_lg' => $paneblocks_lg,
	        'paneblocks_xl' => $paneblocks_xl,
	        'paneblocks_xxl' => $paneblocks_xxl,
        ];

        
        return $this->render_from_template('theme_edutor/fp_javascript', $fp_javascript);
    }
    
    /* Replace Moodle SVG image with default course image */
    /* Ref: https://moodle.org/mod/forum/discuss.php?d=385813#p1556512 */
    public function get_generated_image_for_id($id) {
        // See if user uploaded a custom header background to the theme.
        $defaultcourseimage = $this->page->theme->setting_file_url('defaultcourseimage', 'defaultcourseimage');
        if (isset($defaultcourseimage)) {
            return $defaultcourseimage;
        } else {
            // Use the default theme image when no course image is detected.
            return $this->image_url('noimg', 'theme')->out();
        }
    }
   


}
