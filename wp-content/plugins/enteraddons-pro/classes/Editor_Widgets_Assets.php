<?php
namespace EnteraddonsPro\Classes;

/**
 * Enteraddons Pro Editor_Widgets_Assets class
 *
 * @package     Enteraddons
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

if( !defined( 'WPINC' ) ) {
    die;
}

class Editor_Widgets_Assets extends \Enteraddons\Classes\Editor_Widgets_Assets_Base {
	
	public function getPrefix(){
		return 'enteraddons-pro-';
	}

	public function getDirPath() {
		return ENTERADDONSPRO_DIR_PATH;
	}

	public function getDirUrl() {
		return ENTERADDONSPRO_DIR_URL;
	}
	
	public function getPackageVersion() {
		return ENTERADDONSPRO_VERSION;
	}

	public function getPluginMode() {
		return ENTERADDONSPRO_VERSION_TYPE;
	}

}
