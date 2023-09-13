<?php
namespace EnteraddonsPro\Widgets\Source_Code;
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

class Source_Code_Template {

	use Traits\Template_1;

	private static $settingsData;
	private static $obj;
	
	public static function setDisplaySettings( $data ) {
		self::$settingsData = $data;
	}
	public static function setObj( $obj ) {
		self::$obj = $obj;
	}

	private static function getDisplaySettings() {
		return self::$settingsData;
	}

	private static function getObj() {
		return self::$obj;
	}

	public static function renderTemplate() {
		self::markup_style_1();
	}

}