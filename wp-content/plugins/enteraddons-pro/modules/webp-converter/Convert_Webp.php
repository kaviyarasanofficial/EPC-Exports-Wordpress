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

class Convert_Webp {

	function __construct() {
		add_action( 'ea_after_admin_menu', [ __CLASS__, 'image_convert_webp_menu' ] );
		add_action( 'wp_ajax_webp_converter', [ __CLASS__, 'webp_convert'] );
		add_action( 'wp_ajax_eap_use_webp', [ __CLASS__, 'eap_use_webp'] );
		add_action( 'wp_ajax_eap_reset_webp', [ __CLASS__, 'eap_reset_webp'] );
		// Settings Panel init
		\EnteraddonsPro\Settings_Panel\Settings_Panel::getInstance();
	}

	public static function image_convert_webp_menu() {
		add_submenu_page(
	        'enteraddons',
	        esc_html__( 'Webp Convert', 'enteraddons-pro' ), //page title
	        esc_html__( 'Webp Convert', 'enteraddons-pro' ), //menu title
	        'manage_options', //capability,
	        'ea-convert-webp', //Menu slug,
	        [ __CLASS__, 'image_convert_webp' ],// Callback
	    );
	}

	public static function image_convert_webp() {
		$tabs = new \EnteraddonsPro\Settings_Panel\Convert_Webp_Settings_Panel();
		$tabs->getSettingsArea();
	}

	public static function webp_convert() {
		
		if( isset( $_POST['img_url'] ) ) {
			$obj = new Webp_Converter();
			$obj->set_images( $_POST['img_url'] );
			$t = $obj->webpConvert();
			echo $t;
		}
		die();
	}

	public static function eap_use_webp() {

		if( isset( $_POST['attachment_id'] ) && isset( $_POST['webp_url'] ) ) {
			$id = $_POST['attachment_id'];
			update_attached_file( absint( $id ), $_POST['webp_url'] );
			$image_file = wp_get_original_image_path( absint( $id ) );
			$image_meta = wp_create_image_subsizes( $image_file, $id );
			$r = wp_update_attachment_metadata( $id, $image_meta );

			if( !is_wp_error( $r ) ) {
				update_post_meta( $id, 'eap_webp_use_status', 1 );
				echo 'success';
			} else {
				echo 'error';
			}

		}

		die();
	}

	public static function eap_reset_webp() {

		if( isset( $_POST['attachment_id'] ) && isset( $_POST['prev_ext'] ) ) {
			$id = $_POST['attachment_id'];

			$image_file = wp_get_original_image_path( absint( $id ) );
			$getPath = substr( $image_file, 0, strrpos( $image_file, '.' ) );
			$imgFullPath = $getPath.'.'.$_POST['prev_ext'];
			update_attached_file( absint( $id ), $imgFullPath );
			//
			$image_file = wp_get_original_image_path( absint( $id ) );
			$image_meta = wp_create_image_subsizes( $image_file, $id );
			$r = wp_update_attachment_metadata( $id, $image_meta );

			if( !is_wp_error( $r ) ) {
				update_post_meta( $id, 'eap_webp_use_status', 0 );
				echo 'success';
			} else {
				echo 'error';
			}

		}

		die();
	}

}