<?php
namespace EnteraddonsPro\Modules;
/**
 * Enteraddons Url_Shortener_Handler class
 *
 * @package     EnterAddons Pro
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

class Url_Shortener_Handler {

	function __construct() {
		add_action( 'ea_add_shorturl', [ __CLASS__, 'addShorturl' ] );
		add_action( 'ea_edit_shorturl', [ __CLASS__, 'editShorturl' ] );
	}

	public static function addShorturl() {

		if( isset( $_POST['shorturl_publish'] ) && $_POST['shorturl_publish'] == 'publish' ) {
			// Check nonce
			if ( isset( $_POST['add_shorturl_nonce'] ) && wp_verify_nonce( $_POST['add_shorturl_nonce'], 'ea_add_shorturl_nonce' ) 
			) {

				// type
				$type = '';
				if( !empty( $_POST['shortable_type'] ) ) {
					$type = $_POST['shortable_type'];
				}

				$data = [
				'title' => isset( $_POST['title'] ) ? sanitize_text_field( $_POST['title'] ) : '',
				'slug' => isset( $_POST['slug'] ) ? sanitize_text_field( $_POST['slug'] ) : '',
				'shortable_type' => $type,
				'shortable_url' => isset( $_POST[$type.'_shortable_url'] ) ? sanitize_text_field( $_POST[$type.'_shortable_url'] ) : '',
				'redirect_type' => isset( $_POST['redirections_type'] ) ? sanitize_text_field( $_POST['redirections_type'] ) : '',
				'other_short_urls' => isset( $_POST['other_short_urls'] ) ? sanitize_text_field( $_POST['other_short_urls'] ) : '',
				'description' => isset( $_POST['description'] ) ? sanitize_text_field( $_POST['description'] ) : ''
				];

				$result = Url_Shortener_DB::insertData( $data );

			   if( $result != 'error' ) {
			   	$url = admin_url( '/admin.php?page=ea-edit-short-url&shortener_id='.$result );
			   	\EnteraddonsPro\Inc\Helper::addSuccessNotice();
			   	wp_redirect($url);
			   	exit;
			   } else {
			   	\EnteraddonsPro\Inc\Helper::addErrorNotice();
			   }

			} else {
			   \EnteraddonsPro\Inc\Helper::addErrorNotice();
			}
		}
	}

	public static function editShorturl( $sid = '' ) {
		
		// 
		if( !empty( $sid ) && ( isset( $_POST['shorturl_update'] ) && $_POST['shorturl_update'] == 'update' ) ) {

			// Check nonce
			if ( isset( $_POST['edit_shorturl_nonce'] ) && wp_verify_nonce( $_POST['edit_shorturl_nonce'], 'ea_edit_shorturl_nonce' ) 
			) {

				//  title
				$title = !empty( $_POST['title'] ) ? $_POST['title'] : '';
				Url_Shortener_DB::updateData( $sid, 'title', sanitize_text_field( $title ) );
				//  status
				$slug = !empty( $_POST['slug'] ) ? $_POST['slug'] : '';
				Url_Shortener_DB::updateData( $sid, 'slug', sanitize_text_field( $slug ) );
				// type
				$type = '';
				if( !empty( $_POST['shortable_type'] ) ) {
					$type = $_POST['shortable_type'];
				}
				Url_Shortener_DB::updateData( $sid, 'shortable_type', sanitize_text_field( $type ) );
				$shortable_url = !empty( $_POST[$type.'_shortable_url'] ) ? $_POST[$type.'_shortable_url'] : '';
				Url_Shortener_DB::updateData( $sid, 'shortable_url', sanitize_text_field( $shortable_url ) );

				//  redirect type
				$redirections_type = !empty( $_POST['redirections_type'] ) ? $_POST['redirections_type'] : '';
				Url_Shortener_DB::updateData( $sid, 'redirect_type', sanitize_text_field( $redirections_type ) );
				//  description
				$description = !empty( $_POST['description'] ) ? $_POST['description'] : '';
				Url_Shortener_DB::updateData( $sid, 'description', sanitize_textarea_field( $description ) );
				// other short url
				$other_short_urls = !empty( $_POST['other_short_urls'] ) ? $_POST['other_short_urls'] : '';
				Url_Shortener_DB::updateData( $sid, 'other_short_urls', maybe_serialize( $other_short_urls ) );

				\EnteraddonsPro\Inc\Helper::updatedSuccessNotice();

			} // Nonce 
			else {
				\EnteraddonsPro\Inc\Helper::updatedErrorNotice();
			}
		}
		
	}

}

