<?php
namespace EnteraddonsPro\Settings_Panel;
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

class Image_Compress_Settings_Panel extends Settings_Panel_Base {


	public function getTabs() {
		return [
			'imgcsettings' => [ 'title' => esc_html__( 'Settings', 'enteraddons-pro' ), 'class' => 'active', 'icon' => 'dashicons dashicons-admin-generic'  ],
			'imagecompress' => [ 'title' => esc_html__( 'Image Compress', 'enteraddons-pro' ), 'class' => '', 'icon' => 'dashicons dashicons-update'  ]
		];
	}
	public function getTabsContent() {
		new TabsContent\Image_Compress_Settings_Tab();
		new TabsContent\Image_Compress_Tab();
	}

}

