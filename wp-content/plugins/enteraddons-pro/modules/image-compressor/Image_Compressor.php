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

class Image_Compressor {
	
	/**
	 * [set_images description]
	 * @param array $images 
	 */
	public function set_images( $images ) {
		$this->images =  $images;
	}
	/**
	 * [mediaExtension description]
	 * @return [type] [description]
	 */
	protected function mediaExtension() {
		return [ 'jpg','png','jpeg' ];
	}
	/**
	 * [imageCompress description]
	 * @return [type] [description]
	 */
	public function imageCompress() {
		$totalImg = '';
		$complete = 0;
		$eImg = [];
		if( !empty( $this->images ) ) {
			$totalImg = count( $this->images );
			foreach( $this->images as $image ) {
				if( $this->compressor( $image ) == 1 ) {
					$complete ++;
				} else {
					$e = explode(',', $image);
					$eImg[] = !empty( $e[1] ) ? $e[1] : '';
				}
			}
		}
		return [ 'total' => $totalImg, 'complete' => $complete, 'eimg' => $eImg ];
	}
	/**
	 * [compressor description]
	 * @param  [type] $source [description]
	 * @return [type]         [description]
	 */
	private function compressor( $source ) {

		$options = get_option('ea_modules_option');

		$jpgQuality = !empty( $options['jpg-img-quality'] ) ? $options['jpg-img-quality'] : '70';
		$pngQuality = !empty( $options['png-img-quality'] ) ? $options['png-img-quality'] : '6';

		//
		$Compressor = new Image_Compressor_Based();
		$Compressor->setSource( $source );
		$Compressor->setQuality( $jpgQuality );
		$Compressor->setPngQuality( $pngQuality );

		// Check compress type
		if( !empty( $options['image-compress-type'] ) && $options['image-compress-type'] == 'api' ) {
			return $Compressor->getApiCompressFile();
		} else {
			return $Compressor->getSelfCompressFile();
		}
		
	}
}