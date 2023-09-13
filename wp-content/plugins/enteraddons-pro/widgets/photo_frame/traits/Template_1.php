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

trait Template_1 {
	
	public static function markup_style_1() {
        $settings = self::getSettings();
		?>
        <div class="ea-markone">
            <div class="ea-snipimage ea-red">
                <?php 
        		self::image();
        		?>
                <div class="ea-imgCaption">
                    <h3>
                        <?php 
        				self::title();
        				?>
                    </h3>
                    <h4>
                        <?php 
        				 self::designation();
        				?>
                    </h4>
                </div>
            </div>
        </div>
<?php
	}

}