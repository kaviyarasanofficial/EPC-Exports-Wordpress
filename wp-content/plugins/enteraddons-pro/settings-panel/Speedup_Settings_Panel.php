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

class Speedup_Settings_Panel extends Settings_Panel_Base {
	
	public function getTabsContent() {
		new TabsContent\Tweaks_Tab();
	}

}