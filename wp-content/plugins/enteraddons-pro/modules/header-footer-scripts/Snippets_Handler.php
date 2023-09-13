<?php
namespace EnteraddonsPro\Modules;
/**
 * Enteraddons Header_Footer_Scripts class
 *
 * @package     EnterAddons Pro
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

class Snippets_Handler {

	function __construct() {
		add_action( 'ea_add_snippets', [ __CLASS__, 'addSnippet' ] );
		add_action( 'ea_edit_snippets', [ __CLASS__, 'editSnippet' ] );
	}

	public static function addSnippet() {

		if( isset( $_POST['snippet_publish'] ) && $_POST['snippet_publish'] == 'publish' ) {
			// Check nonce
			if ( isset( $_POST['add_snippet_nonce'] ) && wp_verify_nonce( $_POST['add_snippet_nonce'], 'ea_add_snippet_nonce' ) 
			) {
				$data = [
				'title' => isset( $_POST['snippet_title'] ) ? sanitize_text_field( $_POST['snippet_title'] ) : '',
				'status' => isset( $_POST['snippet_status'] ) ? sanitize_text_field( $_POST['snippet_status'] ) : '',
				'snippet_type' => isset( $_POST['snippet_type'] ) ? sanitize_text_field( $_POST['snippet_type'] ) : '',
				'location' => isset( $_POST['snippet_location'] ) ? sanitize_text_field( $_POST['snippet_location'] ) : '',
				'display_on' => isset( $_POST['snippet_display_on'] ) ? sanitize_text_field( $_POST['snippet_display_on'] ) : '',
				'exclude_pages' => isset( $_POST['snippet_exclude_pages'] ) ? sanitize_text_field( $_POST['snippet_exclude_pages'] ) : '',
				'exclude_posts' => isset( $_POST['snippet_exclude_posts'] ) ? sanitize_text_field( $_POST['snippet_exclude_posts'] ) : '',
				'snippets' => isset( $_POST['ea_hf_code'] ) ? htmlentities( stripslashes( $_POST['ea_hf_code'] )  ) : '',
				];
			
				$result = HFS_Database_Table::insertData( $data );
			   
			   if( $result != 'error' ) {
				   	$url = admin_url( '/admin.php?page=header-footer-edit-snippet&id='.$result );
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

	public static function editSnippet( $sid = '' ) {

		// 
		if( !empty( $sid ) && ( isset( $_POST['snippet_update'] ) && $_POST['snippet_update'] == 'update' ) ) {

			// Check nonce
			if ( isset( $_POST['edit_snippet_nonce'] ) && wp_verify_nonce( $_POST['edit_snippet_nonce'], 'ea_edit_snippet_nonce' ) 
			) {

				// snippet title
				$snippet_title = !empty( $_POST['snippet_title'] ) ? $_POST['snippet_title'] : '';
				HFS_Database_Table::updateData( $sid, 'title', sanitize_text_field( $snippet_title ) );
				// snippet status
				$snippet_status = !empty( $_POST['snippet_status'] ) ? $_POST['snippet_status'] : '';
				HFS_Database_Table::updateData( $sid, 'status', sanitize_text_field( $snippet_status ) );
				// Snippet type
				$snippet_type = !empty( $_POST['snippet_type'] ) ? $_POST['snippet_type'] : '';
				HFS_Database_Table::updateData( $sid, 'snippet_type', sanitize_text_field( $snippet_type ) );
				// snippet location
				$snippet_location = !empty( $_POST['snippet_location'] ) ? $_POST['snippet_location'] : '';
				HFS_Database_Table::updateData( $sid, 'location', sanitize_text_field( $snippet_location ) );
				// snippet display on
				$snippet_display_on = !empty( $_POST['snippet_display_on'] ) ? $_POST['snippet_display_on'] : '';
				HFS_Database_Table::updateData( $sid, 'display_on', sanitize_text_field( $snippet_display_on ) );
				// exclude pages
				$snippet_exclude_pages = !empty( $_POST['snippet_exclude_pages'] ) ? $_POST['snippet_exclude_pages'] : '';
				HFS_Database_Table::updateData( $sid, 'exclude_pages', maybe_serialize( $snippet_exclude_pages ) );
				// exclude posts
				$snippet_exclude_posts = !empty( $_POST['snippet_exclude_posts'] ) ? $_POST['snippet_exclude_posts'] : '';
				HFS_Database_Table::updateData( $sid, 'exclude_posts', maybe_serialize( $snippet_exclude_posts ) );
				// snippets
				$ea_hf_code = !empty( $_POST['ea_hf_code'] ) ? $_POST['ea_hf_code'] : '';
				HFS_Database_Table::updateData( $sid, 'snippets', htmlentities( stripslashes( $ea_hf_code ) ) );
				
				\EnteraddonsPro\Inc\Helper::updatedSuccessNotice();

			} // Nonce 
			else {
				\EnteraddonsPro\Inc\Helper::updatedErrorNotice();
			}
		}
		
	}

}

