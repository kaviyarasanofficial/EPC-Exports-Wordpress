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

class Accessibilities {

	function __construct() {
		add_action( 'ea_after_admin_menu', [ __CLASS__, 'accessibilities_menu' ] );
		// Settings Panel init
		\EnteraddonsPro\Settings_Panel\Settings_Panel::getInstance();
		new Accessibilities_Based();
	}

	public static function accessibilities_menu() {
		add_submenu_page(
	        'enteraddons',
	        esc_html__( 'Accessibilities', 'enteraddons-pro' ), //page title
	        esc_html__( 'Accessibilities', 'enteraddons-pro' ), //menu title
	        'manage_options', //capability,
	        'ea-accessibilities', //Menu slug,
	        [ __CLASS__, 'accessibilities_view' ],// Callback
	    );
	}
	
	public static function accessibilities_view() {
		$tabs = new \EnteraddonsPro\Settings_Panel\Accessibilities_Settings_Panel();
		$tabs->getSettingsArea();
	}

}