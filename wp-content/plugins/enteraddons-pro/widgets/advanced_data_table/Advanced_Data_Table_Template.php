<?php
namespace EnteraddonsPro\Widgets\Advanced_Data_Table;
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

class Advanced_Data_Table_Template {

	use Traits\Templates_Components;
	use Traits\Template_1;
	use Traits\Template_2;
	use Traits\Template_3;

	private static $settingsData;
	private static $widgetObj;

	public static function setDisplaySettings( $data ) {
		self::$settingsData = $data;
	}
	public static function setWidgetObject( $obj ) {
		self::$widgetObj = $obj;
	}
	private static function getDisplaySettings() {
		return self::$settingsData;
	}
	private static function getWidgetObject() {
		return self::$widgetObj;
	}
	public static function renderTemplate() {
		$settings = self::getDisplaySettings();
		if( $settings['advanced_table_style'] == '1' ) {
			self::markup_style_1();
		} elseif ( $settings['advanced_table_style'] == '2' ) {
			self::markup_style_2();
		} else {
			self::markup_style_3();
		}
	}
}