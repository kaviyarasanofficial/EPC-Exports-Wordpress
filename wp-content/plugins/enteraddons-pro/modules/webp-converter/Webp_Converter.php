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

class Webp_Converter {

	protected $images;

	/**
	 * [set_images description]
	 * @param array $images 
	 */
	public function set_images( $images ) {
		$this->images =  $images;
	}
	/**
	 * [webpConvert description]
	 * @return [type] [description]
	 */
	public function webpConvert() {
		if( !empty( $this->images ) ) {
			foreach( $this->images as $image ) {
				foreach( $image as $imag ) {
					$this->webpConverter( $imag );
				}
			}
		}
	}
	/**
	 * [getPathInfo description]
	 * @param  [type] $path [description]
	 * @return [type]       [description]
	 */
	public function getPathInfo( $path ) {
		return new Path_info( $path );
	}
	public function getWebpQuality() {
		$quality = get_option('ea_modules_option');
		return !empty( $quality['webp-img-quality'] ) ? $quality['webp-img-quality'] : 80;
	}
	/**
	 * [getWebpNewName description]
	 * @param  [type] $imagePath [description]
	 * @return [type]            [description]
	 */
	public function getWebpNewName( $filename ) {
		return $filename.'.webp';
	}
	
	/**
	 * Convert image in webp format
	 * @return void
	 */
	private function webpConverter( $image ) {

		$pathinfo = $this->getPathInfo( $image );

		// get Image new name
		$newName = $this->getWebpNewName( $pathinfo->getFileName() );
		$extension = $pathinfo->getExtension();
		$dir = trailingslashit( $pathinfo->getDirname() );

		/*** Create and save ***/
		// Check image extension
		if( $extension == 'png' ) {
			$img = imagecreatefrompng( $image );
		} else if( $extension == 'jpeg' || $extension == 'jpg'  ) {
			$img = imagecreatefromjpeg( $image );
		}

		imagepalettetotruecolor( $img );
		imagealphablending( $img, true );
		imagesavealpha( $img, true );
		$t = imagewebp ( $img, $dir . $newName, $this->getWebpQuality() );
		imagedestroy( $img );
		
		echo $t;
	}

}

