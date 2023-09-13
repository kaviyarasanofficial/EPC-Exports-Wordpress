<?php
namespace EnteraddonsPro\Widgets\Image_Swap;
/**
 * Enteraddons widget template class
 *
 * @package     Enteraddons
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

class Image_Swap_Template {

	use Traits\Templates_Components;
	use Traits\Template_1;
	use Traits\Template_2;

	private static $settingsData;

	public static function setDisplaySettings( $data ) {
		self::$settingsData = $data;
	}
	
	private static function getDisplaySettings() {
		return self::$settingsData;
	}

	public static function renderTemplate() {
		
		$settings = self::getDisplaySettings();
		if( $settings['image_swap_template'] == 'markup_one' ) {
			self::markup_style_1();
		} elseif( $settings['image_swap_template'] == 'markup_two' ) {
			self::markup_style_2();
		}
	}
}