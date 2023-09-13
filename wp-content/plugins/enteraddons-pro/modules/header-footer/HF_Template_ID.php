<?php
namespace EnteraddonsPro\Modules;
/**
 * Enteraddons Post Type Meta class
 *
 * @package     EnterAddons Pro
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

class HF_Template_ID {

	private static $SettingsModel = null;

	function __construct() {
		if( is_null( self::$SettingsModel ) ) {
			self::$SettingsModel = self::pageTemplateSettings();
		}
	}

	private static  function getPageId() {
		return get_the_ID();
	}

	private static function pageTemplateSettings() {
        // Get the page settings manager
        $pageSettingsManager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );
        // Get the settings model for current post
        return $pageSettingsManager->get_model( self::getPageId() );
	}

	private static function pageHeaderTemplateActive() {
		$pageSettingsModel = self::$SettingsModel;
		// Retrieve the template id
        return $pageSettingsModel->get_settings( 'ea_header_choice' );
	}

	private static function pageFooterTemplateActive() {
		$pageSettingsModel = self::$SettingsModel;
		// Retrieve the template id
        return $pageSettingsModel->get_settings( 'ea_footer_choice' );
	}

	private static function pageHeaderTemplateId() {
		$pageSettingsModel = self::$SettingsModel;
		// Retrieve the template id
        return $pageSettingsModel->get_settings( 'ea_header_builder_option' );
	}

	private static function pageFooterTemplateId() {
		$pageSettingsModel = self::$SettingsModel;
		// Retrieve the template id
        return $pageSettingsModel->get_settings( 'ea_footer_builder_option' );
	}

	public static function getHeaderTemplateActiveStatus() {
		return self::pageHeaderTemplateActive();
	}

	public static function getFooterTemplateActiveStatus() {
		return self::pageFooterTemplateActive();
	}
	public static function getHeaderTemplateId() {
		return self::pageHeaderTemplateId();
	}

	public static function getFooterTemplateId() {
		return self::pageFooterTemplateId();
	}

} // END CLASS
