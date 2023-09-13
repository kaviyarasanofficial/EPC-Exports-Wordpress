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

trait Template_2 {
	
	public static function markup_style_2() {
        $settings = self::getSettings();
		?>
        <div class="ea-marktwo">
            <div class="ea-framed">
                <?php self::image(); ?>
            </div>
        </div>
    <?php
	}

}