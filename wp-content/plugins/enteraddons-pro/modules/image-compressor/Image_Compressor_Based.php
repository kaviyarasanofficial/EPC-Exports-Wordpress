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

class Image_Compressor_Based {

	private $source;
	private $quality;
	private $pngQuality;
	private $mimeType;

	/**
	 * setSource
	 * @param path $source 
	 */
	public function setSource( $source ) {
		$this->source = $source;
	}

	/**
	 * setQuality
	 * @param string $quality
	 */
	public function setQuality( $quality = '70' ) {
		$this->quality = $quality;
	}

	/**
	 * setQuality
	 * @param string $quality
	 */
	public function setPngQuality( $quality = '-1' ) {
		$this->pngQuality = $quality;
	}
	/**
	 * getAPI
	 * @return url
	 */
	private function getAPI() {
		$quality = $this->quality;
		return 'http://api.resmush.it/ws.php?qlty='.esc_html( $quality ).'&img=';
	}
	/**
	 * [getCompressFile description]
	 * @return [type] [description]
	 */
	public function getSelfCompressFile() {

		switch( $this->getMimeType() ) {

			case 'image/png' :
				return $this->pngCompress();
			break;
			case 'image/jpeg' :
				return $this->jpgCompress();
			break;
			case 'image/gif' :
				return $this->gifCompress();
			break;

		}
	}
	/**
	 * [getApiCompressFile description]
	 * @return [type] [description]
	 */
	public function getApiCompressFile() {
		return $this->compressByAPI();
	}
	private function sourcePerser() {
		$source = $this->source;
		return explode(',', $source);
	}
	/**
	 * [getImgPath description]
	 * @return [type] [description]
	 */
	private function getImgPath() {
		$i = $this->sourcePerser();
		return !empty($i[0]) ? $i[0] : '';
	}
	/**
	 * [getImgPath description]
	 * @return [type] [description]
	 */
	private function getImgUrl() {
		$i = $this->sourcePerser();
		return !empty( $i[1] ) ? $i[1] : '';
	}
	/**
	 * mimeTypes 
	 * @return array image mime types
	 */
	private function mimeTypes() {
		return [ 'image/gif','image/png', 'image/jpeg' ];
	}
	/**
	 * getMimeType
	 * @return string image mime type
	 */
	private function getMimeType() {
		$info = getimagesize( $this->getImgPath() );	
		return $info['mime'];	
	}

	/**
	 * gifCompress
	 * @return [type] [description]
	 */
	private function gifCompress() {
		$source = '';
		$quality = $this->quality;
	}
	/**
	 * jpgCompress
	 * @return [type] [description]
	 */
	private function jpgCompress() {

		$source = $this->getImgPath();
		$quality = $this->quality;

		$image = imagecreatefromjpeg( $source );
		$r = imagejpeg( $image, $source, $quality );
		imagedestroy($image);
		return $r;
	}

	/**
	 * pngCompress
	 * @return [type] [description]
	 */
	private function pngCompress() {

		$source = $this->getImgPath();
		$quality = $this->pngQuality;

		$image = imagecreatefrompng( $source );
        $bck   = imagecolorallocate( $image , 0, 0, 0 );
        imagecolortransparent( $image, $bck );
        imagealphablending( $image, false );
        imagesavealpha( $image, true );
        $r = imagepng( $image, $source, $quality );
        imagedestroy($image);
        return $r;

	}

	/**
	 * [compressByAPI description]
	 * 
	 * @return url
	 */
	private function compressByAPI() {
		// 
		define('WEBSERVICE', self::getAPI() );

		$o = json_decode( self::get_url_content( WEBSERVICE . $this->getImgUrl() ) );
		if( isset( $o->error ) ) {
			return 'Error '.$o->error;
		}

		$url = $o->dest;
		$img = $this->getImgPath();
		$r = file_put_contents($img, file_get_contents( $url ));
		
		return !empty( $r ) && $r > 0 ? 1 : '';
	}

	public static function get_url_content($url)
	{
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($curl, CURLOPT_COOKIEFILE, "cookie.txt");
		curl_setopt($curl, CURLOPT_COOKIEJAR, "cookie.txt");
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_ENCODING, "");
		curl_setopt($curl, CURLOPT_TIMEOUT, 3);
		curl_setopt($curl, CURLOPT_MAXREDIRS, 8);
		$contents = curl_exec($curl);
		curl_close($curl);

		if(!$contents || empty($contents))
		{
			return false;
		}

		return $contents;
	}


}


