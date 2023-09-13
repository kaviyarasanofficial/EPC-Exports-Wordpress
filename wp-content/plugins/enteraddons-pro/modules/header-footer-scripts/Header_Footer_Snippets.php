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

class Header_Footer_Snippets {

	function __construct() {
		add_action( 'ea_after_admin_menu', [ __CLASS__, 'header_footer_scripts_menu' ] );
		add_action( 'admin_enqueue_scripts', [ __CLASS__, 'enqueue_scripts' ] );
		add_action( 'wp_head', [ __CLASS__, 'header_scripts' ] );
		add_action( 'wp_footer', [ __CLASS__, 'footer_scripts' ], 999 );
		// Settings Panel init
		\EnteraddonsPro\Settings_Panel\Settings_Panel::getInstance();
		// Snippets Handler init
		new Snippets_Handler();
	}

	public static function header_footer_scripts_menu() {
		
		add_submenu_page(
	        'enteraddons',
	        esc_html__( 'Header Footer Snippets', 'enteraddons-pro' ), //page title
	        esc_html__( 'Header Footer Snippets', 'enteraddons-pro' ), //menu title
	        'manage_options', //capability,
	        'header-footer-scripts', //Menu slug,
	        [ __CLASS__, 'header_footer_snippets_view' ],// Callback
	    );
		add_submenu_page(
	        'header-footer-scripts',
	        esc_html__( 'Add Snippet', 'enteraddons-pro' ), //page title
	        esc_html__( 'Add Snippet', 'enteraddons-pro' ), //menu title
	        'manage_options', //capability,
	        'header-footer-add-snippet', //Menu slug,
	        [ __CLASS__, 'header_footer_add_snippet' ],// Callback
	    );
		add_submenu_page(
	        'header-footer-scripts',
	        esc_html__( 'Edit Snippet', 'enteraddons-pro' ), //page title
	        esc_html__( 'Edit Snippet', 'enteraddons-pro' ), //menu title
	        'manage_options', //capability,
	        'header-footer-edit-snippet', //Menu slug,
	        [ __CLASS__, 'header_footer_edit_snippet' ],// Callback
	    );

	}

	public static function enqueue_scripts() {
		wp_enqueue_code_editor( array( 'type' => 'text/html' ) );
	}

	public static function header_footer_snippets_view() {
		if( ( isset( $_GET['action'] ) && $_GET['action'] == 'delete' ) && !empty( $_GET['id'] ) ) {
			HFS_Database_Table::deleteItemById( absint( $_GET['id'] ) );
		}
		include __DIR__ .'/snippets-page.php';
	}

	public static function header_footer_add_snippet() {
		include __DIR__ .'/add-snippets.php';
	}

	public static function header_footer_edit_snippet() {
		include __DIR__ .'/edit-snippets.php';
	}

	public static function header_scripts() {

		$args = [
			'relation' => 'AND',
			'query' => [
				'location' => 'header',
				'status' => 'active'
			]
		];
		
		$getSnippets = \EnteraddonsPro\Modules\HFS_Database_Table::getAllDataByMeta( $args );

		if( !empty( $getSnippets ) ) {
			$pageId = get_the_ID();
			foreach( $getSnippets as $snippet ) {

				$displayOn = !empty( $snippet['display_on'] ) ? $snippet['display_on'] : '';

				switch( $displayOn ) {
					case 'entire-site' :
						$eb = !empty( $snippet['exclude_posts'] ) ? maybe_unserialize( $snippet['exclude_posts'] ) : [];
						$ep = !empty( $snippet['exclude_pages'] ) ? maybe_unserialize( $snippet['exclude_pages'] ) : [];

						if( !in_array( get_the_ID(), $eb ) || !in_array( get_the_ID(), $ep ) ) {
							echo html_entity_decode( $snippet['snippets'] );
						}
						
					break;
					case 'posts' :				
						if( self::is_blog() ) {
							$eb = !empty( $snippet['exclude_posts'] ) ? maybe_unserialize( $snippet['exclude_posts'] ) : [];
							//
							if( !in_array( get_the_ID(), $eb ) ) {
								echo html_entity_decode( $snippet['snippets'] );
							}
						}
					break;
					case 'pages' :
						if( is_page() ) {
							$eb = !empty( $snippet['exclude_pages'] ) ? maybe_unserialize( $snippet['exclude_pages'] ) : [];
							if( !in_array( get_the_ID(), $eb ) ) {
								echo html_entity_decode( $snippet['snippets'] );
							}
						}
					break;
					case 'home-page' :
						if( is_home() || is_front_page() ) {
							echo html_entity_decode( $snippet['snippets'] );
						}
					break;
				}

				
			}
		}

	}
	public static function footer_scripts() {

		$args = [
			'relation' => 'AND',
			'query' => [
				'location' => 'footer',
				'status' => 'active'
			]
		];

		$getSnippets = \EnteraddonsPro\Modules\HFS_Database_Table::getAllDataByMeta( $args );
		if( !empty( $getSnippets ) ) {
			$pageId = get_the_ID();
			foreach( $getSnippets as $snippet ) {
				$displayOn = !empty( $snippet['display_on'] ) ? $snippet['display_on'] : '';
				switch( $displayOn ) {
					case 'entire-site' :
						$eb = !empty( $snippet['exclude_posts'] ) ? maybe_unserialize( $snippet['exclude_posts'] ) : [];
						$ep = !empty( $snippet['exclude_pages'] ) ? maybe_unserialize( $snippet['exclude_pages'] ) : [];

						if( !in_array( get_the_ID(), $eb ) || !in_array( get_the_ID(), $ep ) ) {
							echo html_entity_decode( $snippet['snippets'] );
						}
						
					break;
					case 'posts' :				
						if( self::is_blog() ) {
							$eb = !empty( $snippet['exclude_posts'] ) ? maybe_unserialize( $snippet['exclude_posts'] ) : [];
							//
							if( !in_array( get_the_ID(), $eb ) ) {
								echo html_entity_decode( $snippet['snippets'] );
							}
						}
					break;
					case 'pages' :
						if( is_page() ) {
							$eb = !empty( $snippet['exclude_pages'] ) ? maybe_unserialize( $snippet['exclude_pages'] ) : [];
							if( !in_array( get_the_ID(), $eb ) ) {
								echo html_entity_decode( $snippet['snippets'] );
							}
						}
					break;
					case 'home-page' :
						if( is_home() || is_front_page() ) {
							echo html_entity_decode( $snippet['snippets'] );
						}
					break;
				}
				
			}
		}

	}

	public static function is_blog() {
	    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
	}

}
