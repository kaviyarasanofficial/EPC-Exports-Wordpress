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

class Accessibilities_Based {

	function __construct() {
		// Init all callable method
		$this->callTwiksMethod();
	}

	private function setOptionsKey() {
		return [
			'remove-wp-version' => 'remove_generator_version',
			'remove-rsd-link' => 'remove_rsd_link',
			'remove-rest-output-link' => 'rest_output_link_wp_head',
			'remove-oembed-add-discovery-links' => 'wp_oembed_add_discovery_links',
			'remove-rest-api-output-link' => 'rest_output_link_header',
			'remove-wlwmanifest-link' => 'wlwmanifest_link',
			'remove-shortlink-wp' => 'shortlink_wp_head'
		];
	}

	public function settingsOption( $fieldName ) {

		$opt = get_option('ea_modules_option');
        $getOpt = '';
        if( !empty( $opt[$fieldName] ) ) {
            $getOpt = $opt[$fieldName];
        }
        return $getOpt;
	}

	public function callTwiksMethod() {

		$getOptKey = $this->setOptionsKey();
		if( !empty( $getOptKey ) ) {
			foreach( $getOptKey as $optionKey => $func ) {
				if( $this->settingsOption($optionKey) ) {
					$this->$func();
				}
			}
		}
	}

	/**
	 * remove wp version
	 * 
	 */
	private function remove_generator_version() {
		add_filter('the_generator', [ $this, 'remove_wp_version' ] );
		//Remove generator
		remove_action( 'wp_head', 'wp_generator' );
	}
	
	/**
	 * Remove RSD Link
	 * 
	 */
	private function remove_rsd_link() {
		remove_action( 'wp_head', 'rsd_link' );
	}
	/**
	 * Remove REST API link tag
	 * 
	 */
	private function rest_output_link_wp_head() {
		remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	}
	/**
	 * Remove oEmbed links
	 * 
	 */
	private function wp_oembed_add_discovery_links() {
		remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
	}
	/**
	 * Remove REST API in HTTP Headers
	 * 
	 */
	private function rest_output_link_header() {
		remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
	}
	/**
	 * Remove WLW Manifest
	 * 
	 */
	private function wlwmanifest_link() {
		remove_action( 'wp_head', 'wlwmanifest_link' );
	}
	/**
	 * Remove shortlink
	 * 
	 */
	private function shortlink_wp_head() {
		remove_action( 'wp_head', 'wp_shortlink_wp_head' );
	}
	
	public function remove_wp_version() {
		return '';
	}
	
	// Remove query string from static resources
	public function remove_cssjs_ver( $src ) {
		if( strpos( $src, '?ver=' ) )
		$src = remove_query_arg( 'ver', $src );
		return $src;
	}


	
}