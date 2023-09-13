<?php 
namespace EnteraddonsPro\Widgets\Photo_Frame\Traits;
/**
 * EnteraddonsPro Photo Frame template class
 *
 * @package     Enteraddons
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

trait Template_3 {
	
	public static function markup_style_3() {
        $settings = self::getSettings();
		?>
        <div class="ea-markthree">
            <?php self::image(); ?>
        </div>
    <?php
	}
    
}