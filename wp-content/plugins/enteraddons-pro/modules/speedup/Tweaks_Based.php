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

class Tweaks_Based {

	function __construct() {
		// Init all callable method
		$this->callTwiksMethod();
	}

	private function setOptionsKey() {
		return [
			'disable-pingbacks' => 'disable_pingbacks',
			'dequeue-emoji' 	=> 'dequeue_emoji',
			'dequeue-dashicons-css' 	=> 'dequeue_dashicons_css',
			'dequeue-post-embed-script' => 'dequeue_post_embed_script',
			'dequeue-gutenberg-css' 	=> 'dequeue_gutenberg_css',
			'active-instant-page' 		=> 'active_instant_page',
			'oembed-resource-disable'	=> 'oembed_resource_disable',
			'remove-query-strings'		=> 'remove_query_strings',
			'defer-css'					=> 'add_rel_preload',
			'defer-js'					=> 'add_scripts_defer'
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
	 * Disable self pingbacks
	 * 
	 */
	private function disable_pingbacks() {
		add_action( 'pre_ping', [ $this, 'no_self_ping'] );	
	}
	/**
	 * Disable emojis
	 * 
	 */
	private function dequeue_emoji() {
		add_action( 'init', [ $this, 'disable_emojis'] );
	}
	/**
	 * Dequeue dashicons css
	 * 
	 */
	private function dequeue_dashicons_css() {
		add_action( 'wp_enqueue_scripts', [ $this, 'dequeue_dashicon'] );
	}
	/**
	 * Dequeue post embed script
	 * 
	 */
	private function dequeue_post_embed_script() {
		add_action( 'init', [ $this, 'stop_loading_wp_embed' ] );
	}
	/**
	 * Dequeue gutenberg css
	 * 
	 */
	private function dequeue_gutenberg_css() {
		add_action( 'wp_enqueue_scripts', [ $this, 'remove_wp_block_library_css' ], 100 );
	}
	/**
	 * Enqueue insta page script
	 * 
	 */
	private function active_instant_page() {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueueInstaPageScript' ], 10 );
	}
	/**
	 * oembed resource disable
	 * 
	 */
	private function oembed_resource_disable() {
		add_action( 'init', [ $this, 'oembedResourceDisable' ] );
	}
	/**
	 * Remove query strings
	 * 
	 */
	private function remove_query_strings() {
		add_action( 'init', [ $this, 'removeQueryStrings' ] );
	}
	/**
	 * add rel preload in style link
	 * 
	 */
	public function add_rel_preload() {
		add_filter( 'style_loader_tag', [ $this, 'addRelPreload' ], 10, 4 );
	}
	/**
	 * add defer attr to scripts
	 * 
	 */
	public function add_scripts_defer() {
		add_filter( 'script_loader_tag', [ $this, 'addDeferToScripts' ], 10, 3 );
	}

	/**
	 * Disable self ping
	 * no_self_ping hooked in pre_ping of disable_pingbacks method
	 * @param  [type] &$links [description]
	 * @return [type]         [description]
	 */
	public function no_self_ping( &$links ) {

		$home = get_option( 'home' );
	    foreach ( $links as $l => $link ) {
	        if ( 0 === strpos( $link, $home ) ) {
	            unset($links[$l]);
	        }
	    }

	}
	// call emojis hooks
	public function disable_emojis() {
		if ( ! is_admin() ) {
			add_filter( 'tiny_mce_plugins', [ $this, 'disable_emojis_tinymce' ] );
			add_filter( 'wp_resource_hints', [ $this, 'disable_emojis_dns_prefetch' ], 10, 2 );
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
			remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
			remove_filter( 'embed_head', 'print_emoji_detection_script' );
			remove_action( 'wp_print_styles', 'print_emoji_styles' );
			remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
			remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
			remove_action( 'admin_print_styles', 'print_emoji_styles' );
			remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		}
	}

	public function disable_emojis_tinymce( $plugins ) {
		if( is_array( $plugins ) ) {
	        return array_diff( $plugins, array('wpemoji') );
	    } else {
	        return array();
	    }
	}

	public function disable_emojis_dns_prefetch( $urls, $relation_type ) {

		if( 'dns-prefetch' == $relation_type ) {
			$emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2.2.1/svg/');
			$urls = array_diff($urls, array($emoji_svg_url));
     	}
     	return $urls;
	}

	//
    public function dequeue_dashicon() {
        wp_deregister_style('dashicons');
    }
    
    // Remove jQuery Migrate Script from header and Load jQuery from Google API
	public function stop_loading_wp_embed() {
		if (!is_admin()) {
			wp_deregister_script('wp-embed');
		}
	}

 	public function remove_wp_block_library_css(){
	    wp_dequeue_style( 'wp-block-library' );
	    wp_dequeue_style( 'wp-block-library-theme' );
	    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
	} 

	public function enqueueInstaPageScript() {
		wp_enqueue_script( 'eap-instapage', plugin_dir_url( __FILE__ ).'assets/inspage.js', [], '5.1.0', true );		
	}
	public function oembedResourceDisable() {
		// Remove the REST API endpoint.
		remove_action( 'rest_api_init', 'wp_oembed_register_route' );

		// Turn off oEmbed auto discovery.
		add_filter( 'embed_oembed_discover', '__return_false' );

		// Don't filter oEmbed results.
		remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

		// Remove oEmbed discovery links.
		remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

		// Remove oEmbed-specific JavaScript from the front-end and back-end.
		remove_action( 'wp_head', 'wp_oembed_add_host_js' );
		add_filter( 'tiny_mce_plugins', [ $this, 'disable_embeds_tiny_mce_plugin' ] );

		// Remove all embeds rewrite rules.
		add_filter( 'rewrite_rules_array', [ $this, 'disable_embeds_rewrites' ] );

		// Remove filter of the oEmbed result before any HTTP requests are made.
		remove_filter( 'pre_oembed_result', 'wp_filter_pre_oembed_result', 10 );

	}
	/**
	 * disable_embeds_tiny_mce_plugin hooked in tiny_mce_plugins
	 * @param  array $plugins
	 * @return  array
	 */
	public function disable_embeds_tiny_mce_plugin($plugins) {
    	return array_diff($plugins, array('wpembed'));
	}
	/**
	 * disable_embeds_rewrites hooked in rewrite_rules_array
	 * @param  array $rules 
	 * @return void
	 */
	public function disable_embeds_rewrites($rules) {
	    foreach($rules as $rule => $rewrite) {
	        if(false !== strpos($rewrite, 'embed=true')) {
	            unset($rules[$rule]);
	        }
	    }
	    return $rules;
	}

	/**
	 * removeQueryStrings hooked in init of remove_query_strings method
	 * @return void
	 */
	public function removeQueryStrings() {
		if(!is_admin()) {
			add_filter('script_loader_src', [ $this, 'remove_query_strings_split' ], 15);
			add_filter('style_loader_src', [ $this, 'remove_query_strings_split' ], 15);
		}
	}
	/**
	 * remove_query_strings_split hooked in script_loader_src and style_loader_src
	 * @param  url $src 
	 * @return url
	 */
	public function remove_query_strings_split( $src ){
		$output = preg_split("/(&ver|\?ver)/", $src);
		return $output[0];
	}

	public function addRelPreload( $html, $handle, $href, $media ) {
    
	    if ( is_admin() ) {
	        return $html;
	    }

		$html = "<link rel='preload' as='style' onload='this.onload=null;this.rel=\"stylesheet\"' id='$handle' href='$href' type='text/css' media='all' />";
		
    	$html .= '<noscript><link rel="stylesheet" href="style.css"></noscript>';

	   return $html;
	}
	
	public function addDeferToScripts( $tag, $handle, $src ) {

	    if (is_admin())
	      return $tag;

	    if ( strpos($handle, 'jquery-core') === false ) {
	        return str_replace( ' src=', ' defer="defer" src=', $tag );
	    }

	    return $tag;
	}
	
}