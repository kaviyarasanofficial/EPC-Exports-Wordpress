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

class Media_Directory {

	protected function mediaExtension() {
		return [ 'jpg','png','jpeg' ];
	}

	/**
	 * get all media file from uploads
	 * @return array
	 */
	public function getMedia() {
		return $this->mediaMaping();
	}
	/**
	 * [mediaMaping description]
	 * @return [type] [description]
	 */
	protected function mediaMaping() {
		$mediaExtension = $this->mediaExtension();
		$mediaDirPath = $this->getMediaDirPath();	
		$mediaDirUrl = $this->getMediaDirUrl();	
		$media 	  = $this->iterateUploadDirData( $mediaDirPath );

		$getAllmedia = [];
		if( !empty( $media ) ) {
			foreach ( $media as $key => $value ) {
				if( !empty( $value ) && is_array($value) ) {
					foreach ( $value as $childKey => $childValue ) {
						if( !empty( $childValue ) && is_array($childValue) ) {
							foreach ( $childValue as $childInnerKey => $childInnerValue ) {

								if( !is_array( $childInnerValue ) ) {
									
									$images = pathinfo( $childInnerValue );
									if( in_array( $images['extension'] ,  $mediaExtension ) ) {

										$folderMediaPath = trailingslashit($key).trailingslashit($childKey).$childInnerValue;
										$mediaPath = $mediaDirPath.$folderMediaPath;
										$mediaUrl = $mediaDirUrl.$folderMediaPath;
										$getAllmedia[] = [ $mediaPath, $mediaUrl ];
									}
								}

							}
						}	

					}
				}

			}
		}

		return $getAllmedia;
	}

	/**
	 * get media upload directory 
	 * default basedir directory
	 * @param  string $basedir 
	 * @return url
	 */
	protected function getMediaDirPath() {
		$uploadDir = $this->getUploadDir();
		return trailingslashit( $uploadDir['basedir'] );
	}
	/**
	 * get media upload directory 
	 * default basedir directory
	 * @param  string $basedir 
	 * @return url
	 */
	protected function getMediaDirUrl() {
		$uploadDir = $this->getUploadDir();
		return trailingslashit( $uploadDir['baseurl'] );
	}

	/**
	 * Returns an array containing the current upload directory’s path and URL
	 * @return array
	 */
	protected function getUploadDir() {
		return wp_upload_dir();
	}

	/**
	 * get all media from upload folder
	 * @param   path $dir upload directory
	 * @return array
	 */
	protected function iterateUploadDirData( $dir ) {

		$result = array();
		$cdir = scandir($dir);
	   	foreach ($cdir as $key => $value) {
	      	if (!in_array($value,array(".",".."))) {
	        	if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
	            	$result[$value] = $this->iterateUploadDirData($dir . DIRECTORY_SEPARATOR . $value);
	         	} else {
	            	$result[] = $value;
	        	}
	    	}
	    }
		return $result;
	}

	public function getAttachmentFromDatabase() {

		$args = array( 'post_type'=>'attachment','numberposts'=> '-1' );
		$attachments = get_posts($args);

		$getAllMedia = [];

		if( !empty( $attachments ) ) {
		    foreach( $attachments as $attachment ) {
		    	
		    	$id = $attachment->ID;
		    	$imgUrl = $attachment->guid;
		    	$metaData = wp_get_attachment_metadata($id);
		    	$getFiles = [];
		    	if( !empty( $metaData['file'] ) ) {
		    		$file = $metaData['file'];
		    		$sizesFile  = array_column( $metaData['sizes'], 'file' );
		    		$getFiles 	= array_unique( $sizesFile );
		    		$dirRootPath = substr( $file, 0, strrpos( $file, '/' ) + 1 );

		    		$getNewFiles = array_map( function( $img ) use ($dirRootPath) {
		    			return self::getMediaDirPath().$dirRootPath.$img;
		    		}, $getFiles );

		    		$getNewFiles[] = self::getMediaDirPath().$file;

		    		$getAllMedia[$id] = [
		    			'url' => $imgUrl, 
		    			'file' => $file, 
		    			'files' => $getNewFiles
		    		];

		    	}
		    }
		}

		return $getAllMedia;

	}

}
