<?php
namespace EnteraddonsPro\Settings_Panel;
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

class Settings_Panel {

	private static $instance = null;

	function __construct() {
		add_action( 'admin_init', [ __CLASS__, 'page_settings_init' ] );
		add_action( 'admin_enqueue_scripts', [ __CLASS__, 'admin_scripts' ] );
	}

	public static function getInstance() {
		if( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	public static function page_settings_init() {
		register_setting(
            'enteraddons_modules_settings_option_group', // Option group
            'ea_modules_option' // Option name
        );  
	}
	public static function admin_scripts( $hooks ) {
		$pluginDirUrl = plugin_dir_url( __FILE__ );

		wp_enqueue_style( 'datatables', $pluginDirUrl. 'assets/datatables.min.css', array(), '1.0.0', false );
		wp_enqueue_style( 'eap-moduls-admin', $pluginDirUrl. 'assets/admin.css', array(), '1.0.0', false );
		wp_enqueue_script( 'datatables', $pluginDirUrl. 'assets/datatables.min.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'eap-moduls-admin', $pluginDirUrl. 'assets/admin.js', array('jquery'), '1.0.0', true );
		
		wp_localize_script(
			'eap-moduls-admin', 
			'adminEap',
			array(
				"ajaxurl" => admin_url('admin-ajax.php')
			) 
		);

	}

}

