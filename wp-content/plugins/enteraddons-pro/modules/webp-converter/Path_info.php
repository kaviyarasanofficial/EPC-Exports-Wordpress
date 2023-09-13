<?php
namespace EnteraddonsPro\Modules;
/**
 * Enteraddons Path info class
 *
 * @package     EnterAddons Pro
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

class Path_info {

	private $path;
	private $pathInfo;

	function __construct( $path ) {
		$this->path = $path;
		$this->setPath();
	}
	private function setPath() {
		$this->pathInfo = pathinfo( $this->path );
	}

	public function getBasename() {
		return $this->pathInfo['basename'];
	}
	public function getDirname() {
		return $this->pathInfo['dirname'];
	}
	public function getFileName() {
		return $this->pathInfo['filename'];
	}
	public function getExtension() {
		return $this->pathInfo['extension'];
	}

}