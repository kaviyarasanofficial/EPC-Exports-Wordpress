<?php
namespace EnteraddonsPro\Widgets\Photo_Frame;
/**
 * EnteraddonsPro widget template class
 *
 * @package     Enteraddons
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

class Photo_Frame_Template {

	use Traits\Templates_Components;
	use Traits\Template_1;
	use Traits\Template_2;
	use Traits\Template_3;

	private static $settingsData;

	public static function setDisplaySettings( $data ) {
		self::$settingsData = $data;
	}
	
	private static function getDisplaySettings() {
		return self::$settingsData;
	}

	public static function renderTemplate() {
		$settings = self::getDisplaySettings();
		if( $settings['photo_frame_type'] == '1' ) {
			self::markup_style_1();
		} elseif($settings['photo_frame_type'] == '2') {
			self::markup_style_2();
		}
		else{
			self::markup_style_3();
		}
		
	}
}