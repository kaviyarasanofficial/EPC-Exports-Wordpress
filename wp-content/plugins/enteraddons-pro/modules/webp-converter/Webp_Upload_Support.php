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

class Webp_Upload_Support {

	function __construct() {
		add_filter( 'mime_types', [ __CLASS__, 'webp_mime_type_support' ] );
		add_filter( 'file_is_displayable_image', [ __CLASS__, 'displayable_image' ], 10, 2 );
	}

	/**
	 * mime types
	 * @param  array
	 * @return array
	 */
	public static function webp_mime_type_support( $mime_types ) {
		$mime_types['webp'] = 'image/webp';
    	return $mime_types;
	}
	/**
	 * Displayable image Validate that file is suitable for displaying within a web page
	 * @param  [type] $result [description]
	 * @param  [type] $path   [description]
	 * @return bool
	 */
	public static function displayable_image( $result, $path ) {

		$displayable_image_types = array( IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP, IMAGETYPE_ICO, IMAGETYPE_WEBP );
	 
	    $info = @getimagesize( $path );
	    if ( empty( $info ) ) {
	        $result = false;
	    } elseif ( ! in_array( $info[2], $displayable_image_types, true ) ) {
	        $result = false;
	    } else {
	        $result = true;
	    }

	    return $result;
	}

}

