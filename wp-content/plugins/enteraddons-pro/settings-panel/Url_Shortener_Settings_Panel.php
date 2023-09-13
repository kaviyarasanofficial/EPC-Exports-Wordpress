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

class Url_Shortener_Settings_Panel extends Settings_Panel_Base {


	public function getTabs() {
		return [
			'urlshortener' => [ 'title' => 'Url Shortener', 'class' => 'active', 'icon' => 'fa fa-truck'  ],
		];
	}

	public function getTabsContent() {
		new TabsContent\Url_Shortener_Tab();
	}

}

