<?php
namespace EnteraddonsPro\Modules;
/**
 *
 * @package     EnterAddons Pro
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

class Speedup {

	function __construct() {
		add_action( 'ea_after_admin_menu', [ __CLASS__, 'speedup_menu' ] );
		// Settings Panel init
		\EnteraddonsPro\Settings_Panel\Settings_Panel::getInstance();
		// Tweaks Init
		new Tweaks_Based();
	}

	public static function speedup_menu() {
		add_submenu_page(
	        'enteraddons',
	        esc_html__( 'Speedup', 'enteraddons-pro' ), //page title
	        esc_html__( 'Speedup', 'enteraddons-pro' ), //menu title
	        'manage_options', //capability,
	        'ea-speedup', //Menu slug,
	        [ __CLASS__, 'speedup_view' ],// Callback
	    );
	}
	
	public static function speedup_view() {
		$tabs = new \EnteraddonsPro\Settings_Panel\Speedup_Settings_Panel();
		$tabs->getSettingsArea();
	}

}