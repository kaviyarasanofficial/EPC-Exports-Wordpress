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

class Convert_Webp_Settings_Panel extends Settings_Panel_Base {


	public function getTabs() {
		return [
			'tweaks' => [ 'title' => 'Webp Convert', 'class' => 'active', 'icon' => 'dashicons dashicons-update'  ]
		];
	}
	public function getTabsContent() {
		new TabsContent\Webp_Convert_Tab();
	}

}

