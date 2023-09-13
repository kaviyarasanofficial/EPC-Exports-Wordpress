<?php
namespace EnteraddonsPro\Settings_Panel;
/**
 * Enteraddons Modules Settings Panel
 *
 * @package     EnterAddons Pro
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

class Accessibilities_Settings_Panel extends Settings_Panel_Base {

	public function getTabs() {
		return [
			'security' => [ 'title' => esc_html__( 'Security', 'enteraddons-pro' ), 'class' => 'active', 'icon' => 'dashicons dashicons-shield-alt'  ]
		];
	}
	
	public function getTabsContent() {
		new TabsContent\Accessibilities_Security_Tab();
	}

}