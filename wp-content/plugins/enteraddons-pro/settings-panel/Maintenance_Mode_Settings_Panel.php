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

class Maintenance_Mode_Settings_Panel extends Settings_Panel_Base {
	
	public function getTabsContent() {
		new TabsContent\Maintenance_Mode_Tab();
	}

}