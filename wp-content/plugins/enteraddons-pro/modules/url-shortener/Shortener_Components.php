<?php
namespace EnteraddonsPro\Modules;
/**
 * Enteraddons Shortener_Components class
 *
 * @package     EnterAddons Pro
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

class Shortener_Components {

	public static function pageTitle( $title, $linkTitle = '' ) {
		echo '<h2 class="wp-heading-inline">'.esc_html( $title );
		if( !empty( $linkTitle ) ) {
			echo '<a href="'.esc_url( admin_url('/admin.php?page=ea-add-short-url') ).'" class="page-title-action">'.esc_html( $linkTitle ).'</a>';
		}
		echo '</h2>';
	}

	public static function selectField( array $args ) {
		
		$defaults = [
			'title' 	  => '',
			'name' 		  => '',
			'val' 		  => '',
			'class' 	  => '',
			'wrapperclass'	=> '',
			'id' 		  => '',
			'options' 	  => []
		];

		$attr = wp_parse_args( $args, $defaults );
		$val = $attr['val'];

		echo '<div class="snippet-field-group '.esc_attr( $attr['wrapperclass'] ).'">
    		<label>'.esc_html( $attr['title'] ).'</label>
    		<select id="'.esc_html( $attr['id'] ).'" class="ea-custom-admin-field '.esc_html( $attr['class'] ).'" name="'.esc_attr( $attr['name'] ).'">';
    			if( !empty( $attr['options'] ) ) {
	    			foreach( $attr['options'] as $key => $opt ) {
	    				echo '<option '.selected( $val, $key, false ).' value="'.esc_attr( $key ).'">'.esc_html( $opt ).'</option>';
	    			}
    			}
    	echo '</select></div>';
	}

	public static function textField( array $args ) {

		$defaults = [
			'title' 	=> '',
			'name' 		=> '',
			'placeholder' => '',
			'val' 		  => '',
			'class' 	  => '',
			'wrapperclass'	=> '',
			'id' 		  => ''
		];

		$attr = wp_parse_args( $args, $defaults );

		echo '<div class="snippet-field-group '.esc_attr( $attr['wrapperclass'] ).'"><label>'.esc_html( $attr['title'] ).'</label><input type="text" class="ea-custom-admin-field '.esc_html( $attr['class'] ).'" placeholder="'.esc_attr( $attr['placeholder'] ).'" name="'.esc_attr( $attr['name'] ).'" id="'.esc_html( $attr['id'] ).'" value="'.esc_html( $attr['val'] ).'"></div>';
	}
	public static function shortenerSlugField( array $args ) {

		$defaults = [
			'title' 	=> '',
			'name' 		=> '',
			'placeholder' => '',
			'val' 		  => '',
			'class' 	  => '',
			'id' 		  => ''
		];

		$attr = wp_parse_args( $args, $defaults );
		$siteUrl = site_url('/');
		echo '<div class="snippet-field-group"><label>'.esc_html( $attr['title'] ).'</label><div class="slug-area"><div class="slug-area-site-url">'.esc_url( $siteUrl ).'</div><input type="text" class="ea-custom-admin-field shortener-url-slug '.esc_html( $attr['class'] ).'" data-siteurl="'.esc_url( $siteUrl ).'" placeholder="'.esc_attr( $attr['placeholder'] ).'" name="'.esc_attr( $attr['name'] ).'" id="'.esc_html( $attr['id'] ).'" value="'.esc_html( $attr['val'] ).'"><span class="slug-gen"><span class="dashicons dashicons-image-rotate"></span></span><span class="shorturl-copy"><span class="dashicons dashicons-admin-page"></span></span></div></div>';
	}
	public static function textAreaField( array $args ) {

		$defaults = [
			'title' 		=> '',
			'name' 			=> '',
			'placeholder' 	=> '',
			'val' 			=> '',
			'class' 		=> '',
			'id' 			=> ''
		];

		$attr = wp_parse_args( $args, $defaults );

		echo '<div class="snippet-field-group"><label>'.esc_html( $attr['title'] ).'</label><textarea class="ea-custom-admin-field '.esc_html( $attr['class'] ).'" id="'.esc_html( $attr['id'] ).'" name="'.esc_attr( $attr['name'] ).'" rows="6" placeholder="'.esc_attr( $attr['placeholder'] ).'">'.esc_html( $attr['val'] ).'</textarea></div>';
	}

}