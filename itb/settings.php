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

/**
 * Moodle's Clean theme, an example of how to make a Bootstrap theme
 *
 * DO NOT MODIFY THIS THEME!
 * COPY IT FIRST, THEN RENAME THE COPY AND MODIFY IT INSTEAD.
 *
 * For full information about creating Moodle themes, see:
 * http://docs.moodle.org/dev/Themes_2.0
 *
 * @package   theme_itb
 * @copyright 2015 Nephzat Dev Team, nephzat.com
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;
$settings = null;

if (is_siteadmin()) {

    $ADMIN->add('themes', new admin_category('theme_itb', 'itb'));
				
				/* Header Settings */
				$temp = new admin_settingpage('theme_itb_header', get_string('headerheading', 'theme_itb'));	

	// SID Phone setting.
	$name = 'theme_itb/sidphoneno';
    $title = get_string('sidphoneno', 'theme_itb');
    $description = 'Phone number for SID desk';
    $default = get_string('defaultphoneno','theme_itb');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

	// SID Phone setting.
	$name = 'theme_itb/sidemailid';
    $title = get_string('sidemailid', 'theme_itb');
    $description = '';
    $default = get_string('defaultsidemailid','theme_itb');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);


    // Logo file setting.
    $name = 'theme_itb/logo';
    $title = get_string('logo','theme_itb');
    $description = get_string('logodesc', 'theme_itb');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Custom CSS file.
    $name = 'theme_itb/customcss';
    $title = get_string('customcss', 'theme_itb');
    $description = get_string('customcssdesc', 'theme_itb');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
				
				$ADMIN->add('theme_itb', $temp);

    	/* Slideshow Settings Start */
				
				 $temp = new admin_settingpage('theme_itb_slideshow', get_string('slideshowheading', 'theme_itb'));
    $temp->add(new admin_setting_heading('theme_itb_slideshow', get_string('slideshowheadingsub', 'theme_itb'),
        format_text(get_string('slideshowdesc', 'theme_itb'), FORMAT_MARKDOWN)));
				
				// Display Slideshow.
    $name = 'theme_itb/toggleslideshow';
    $title = get_string('toggleslideshow', 'theme_itb');
    $description = get_string('toggleslideshowdesc', 'theme_itb');
    $yes = get_string('yes');
    $no = get_string('no');
    $default = 1;
    $choices = array(1 => $yes , 0 => $no);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
				
				// Number of slides.
    $name = 'theme_itb/numberofslides';
    $title = get_string('numberofslides', 'theme_itb');
    $description = get_string('numberofslides_desc', 'theme_itb');
    $default = 3;
    $choices = array(
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        6 => '6',
        7 => '7',
        8 => '8',
        9 => '9',
        10 => '10',
        11 => '11',
        12 => '12',
    );
    $temp->add(new admin_setting_configselect($name, $title, $description, $default, $choices));
				

    $numberofslides = get_config('theme_itb', 'numberofslides');
    for ($i = 1; $i <= $numberofslides; $i++) {
				    
								// This is the descriptor for Slide One
        $name = 'theme_itb/slide' . $i . 'info';
        $heading = get_string('slideno', 'theme_itb', array('slide' => $i));
        $information = get_string('slidenodesc', 'theme_itb', array('slide' => $i));
        $setting = new admin_setting_heading($name, $heading, $information);
        $temp->add($setting);
								
		// Slide Image.
        $name = 'theme_itb/slide' . $i . 'image';
        $title = get_string('slideimage', 'theme_itb');
        $description = get_string('slideimagedesc', 'theme_itb');
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide' . $i . 'image');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        // Slide Caption.
        $name = 'theme_itb/slide' . $i . 'caption';
        $title = get_string('slidecaption', 'theme_itb');
        $description = get_string('slidecaptiondesc', 'theme_itb');
        $default = get_string('slidecaptiondefault','theme_itb', array('slideno' => sprintf('%02d', $i) ));
        $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);
								
		// Slide Description Text.
		$name = 'theme_itb/slide' . $i . 'desc';
		$title = get_string('slidedesc', 'theme_itb');
		$description = get_string('slidedesctext', 'theme_itb');
		$default = get_string('slidedescdefault','theme_itb');
		$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
		$setting->set_updatedcallback('theme_reset_all_caches');
		$temp->add($setting);
		
		// Slide Link.
		$name = 'theme_itb/slide' . $i . 'link';
		$title = get_string('slidelink', 'theme_itb');
		$description = get_string('slidelinktext', 'theme_itb');
		$default = get_string('slidelinkdefault','theme_itb');
		$setting = new admin_setting_configtext($name, $title, $description, $default);
		$setting->set_updatedcallback('theme_reset_all_caches');
		$temp->add($setting);
		
		
		
								
		}
				
				$ADMIN->add('theme_itb', $temp);
				/* Slideshow Settings End*/
				
				/* Footer Settings start */
				
				$temp = new admin_settingpage('theme_itb_footer', get_string('footerheading', 'theme_itb'));
				
				/* Footer Content */
				$name = 'theme_itb/footnote';
    $title = get_string('footnote', 'theme_itb');
    $description = get_string('footnotedesc', 'theme_itb');
    $default = get_string('footnotedefault', 'theme_itb');
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
				

				/* Address , Email , Phone No */
				
	$name = 'theme_itb/address';
    $title = get_string('address', 'theme_itb');
    $description = '';
    $default = get_string('defaultaddress','theme_itb');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);
				
				
	$name = 'theme_itb/emailid';
    $title = get_string('emailid', 'theme_itb');
    $description = '';
    $default = get_string('defaultemailid','theme_itb');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);
				
	$name = 'theme_itb/phoneno';
    $title = get_string('phoneno', 'theme_itb');
    $description = '';
    $default = get_string('defaultphoneno','theme_itb');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);
				
	/* Facebook,Pinterest,Twitter,Google+ Settings */
	$name = 'theme_itb/fburl';
    $title = get_string('fburl', 'theme_itb');
    $description = get_string('fburldesc', 'theme_itb');
    $default = get_string('fburl_default','theme_itb');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);
				
				$name = 'theme_itb/pinurl';
    $title = get_string('pinurl', 'theme_itb');
    $description = get_string('pinurldesc', 'theme_itb');
    $default = get_string('pinurl_default','theme_itb');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);
				
				$name = 'theme_itb/twurl';
    $title = get_string('twurl', 'theme_itb');
    $description = get_string('twurldesc', 'theme_itb');
    $default = get_string('twurl_default','theme_itb');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);
				
				$name = 'theme_itb/gpurl';
    $title = get_string('gpurl', 'theme_itb');
    $description = get_string('gpurldesc', 'theme_itb');
    $default = get_string('gpurl_default','theme_itb');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);
    
    // Footer Logo file setting.
    $name = 'theme_itb/footerlogo';
    $title = get_string('footerlogo','theme_itb');
    $description = get_string('footerlogodesc', 'theme_itb');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'footerlogo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $ADMIN->add('theme_itb', $temp);
			 /*  Footer Settings end */	
				
				
}
