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

class Image_Compress {

	function __construct() {
		add_action( 'ea_after_admin_menu', [ __CLASS__, 'image_compress_menu' ] );
		add_action( 'wp_ajax_image_compressor', [__CLASS__, 'image_compress'] );
		// Settings Panel init
		\EnteraddonsPro\Settings_Panel\Settings_Panel::getInstance();
	}

	public static function image_compress_menu() {
		add_submenu_page(
	        'enteraddons',
	        esc_html__( 'Image Compress', 'enteraddons-pro' ), //page title
	        esc_html__( 'Image Compress', 'enteraddons-pro' ), //menu title
	        'manage_options', //capability,
	        'ea-image-compress', //Menu slug,
	        [ __CLASS__, 'image_compress_view' ],// Callback
	    );
	}

	public static function image_compress_view() {
		$tabs = new \EnteraddonsPro\Settings_Panel\Image_Compress_Settings_Panel();
		$tabs->getSettingsArea();
	}

	public static function image_compress() {

		if( isset( $_POST['img_url'] ) ) {
			$obj = new Image_Compressor();
			$obj->set_images( $_POST['img_url'] );
			$r = $obj->imageCompress();
			echo json_encode($r);
		}
		
		die();
	}

}