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

class Url_Shortener {

	function __construct() {
		add_action( 'ea_after_admin_menu', [ __CLASS__, 'url_shortener_menu' ] );
		add_action( 'init', [ __CLASS__, 'redirect' ] );
		// Settings Panel init
		\EnteraddonsPro\Settings_Panel\Settings_Panel::getInstance();
		new Url_Shortener_Handler();
	}

	public static function url_shortener_menu() {

		add_submenu_page(
	        'enteraddons',
	        esc_html__( 'Url Shortener', 'enteraddons-pro' ), //page title
	        esc_html__( 'Url Shortener', 'enteraddons-pro' ), //menu title
	        'manage_options', //capability,
	        'ea-url-shortener', //Menu slug,
	        [ __CLASS__, 'shortener_view' ],// Callback
	    );
		add_submenu_page(
	        'ea-url-shortener',
	        esc_html__( 'Add Short Url', 'enteraddons-pro' ), //page title
	        esc_html__( 'Add Short Url', 'enteraddons-pro' ), //menu title
	        'manage_options', //capability,
	        'ea-add-short-url', //Menu slug,
	        [ __CLASS__, 'add_shortener_view' ],// Callback
	    );
		add_submenu_page(
	        'ea-url-shortener',
	        esc_html__( 'Edit Short Url', 'enteraddons-pro' ), //page title
	        esc_html__( 'Edit Short Url', 'enteraddons-pro' ), //menu title
	        'manage_options', //capability,
	        'ea-edit-short-url', //Menu slug,
	        [ __CLASS__, 'edit_shortener_view' ],// Callback
	    );

	}

	public static function shortener_view() {
		if( ( isset( $_GET['action'] ) && $_GET['action'] == 'delete' ) && !empty( $_GET['shortener_id'] ) ) {
			Url_Shortener_DB::deleteItemById( absint( $_GET['shortener_id'] ) );
		}
		include __DIR__ .'/templates/shortener-page.php';
	}

	public static function add_shortener_view() {
		include __DIR__ .'/templates/add-shortener.php';
	}

	public static function edit_shortener_view() {
		include __DIR__ .'/templates/edit-shortener.php';
	}

	public static function redirect() {
		self::do_redirect();
	}
	
	private static function do_redirect() {

		$request_uri = preg_replace( '#/(\?.*)?$#', '$1', rawurldecode( $_SERVER['REQUEST_URI'] ) );
		$uriSegments = explode( "/", parse_url( $request_uri, PHP_URL_PATH ) );
		$lastUriSegment = array_pop( $uriSegments );

		$data = self::is_valid_path( $lastUriSegment );
		
		if( !empty( $data ) ) {
			$url = !empty( $data['shortable_url'] ) ? $data['shortable_url'] : '';

			if( $url ) {

				// Insert visitor info
				if( !empty( $data['id'] ) ) {
					Url_Tracking::insertVisitorData( $data['id'] );
				}
				
				// is exists wp_redirect
				if( ! function_exists( 'wp_redirect' ) ) {
					require_once( ABSPATH . WPINC . '/pluggable.php' );
				}
				//
				if( !empty( $data['redirect_type'] ) ) {
					wp_redirect( $url, sanitize_text_field( $data['redirect_type'] ) );
				} else {
					wp_redirect( $url );
				}
				exit;
			}

		}
	}

	public static function is_valid_path( $slug ) {
		return \EnteraddonsPro\Modules\Url_Shortener_DB::getDataByMeta( 'slug', $slug );
	}

}

