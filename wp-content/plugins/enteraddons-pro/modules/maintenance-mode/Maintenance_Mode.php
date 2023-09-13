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

class Maintenance_Mode {

	function __construct() {
		$opt = get_option('ea_modules_option');
		add_action( 'ea_after_admin_menu', [ __CLASS__, 'maintenance_mode_menu' ] );
		// Settings Panel init
		\EnteraddonsPro\Settings_Panel\Settings_Panel::getInstance();
		//
		if( !empty( $opt['active-maintenance-mode'] ) ) {
			add_filter( 'template_include', [ __CLASS__, 'maintenance_template' ], 99 );
		}
	}

	public static function maintenance_mode_menu() {
		add_submenu_page(
	        'enteraddons',
	        esc_html__( 'Maintenance Mode', 'enteraddons-pro' ), //page title
	        esc_html__( 'Maintenance Mode', 'enteraddons-pro' ), //menu title
	        'manage_options', //capability,
	        'ea-maintenance-mode', //Menu slug,
	        [ __CLASS__, 'maintenance_mode_view' ],// Callback
	    );
	}
	
	public static function maintenance_mode_view() {
		$tabs = new \EnteraddonsPro\Settings_Panel\Maintenance_Mode_Settings_Panel();
		$tabs->getSettingsArea();
	}

	/**
	 * [maintenance_template description]
	 * @param  [type] $template [description]
	 * @return [type]           [description]
	 */
	public static function maintenance_template( $template ) {
	    if ( !is_user_logged_in()  ) {
	    	return trailingslashit( plugin_dir_path( __FILE__ ) ).'maintenance-template.php';
	    }
	    return $template;
	}


}