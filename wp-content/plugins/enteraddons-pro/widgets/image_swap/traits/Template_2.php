<?php 
namespace EnteraddonsPro\Widgets\Image_Swap\Traits;
/**
 * Enteraddons team template class
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
		$settings   = self::getSettings();
		?>
        <div class="ea-swap--wrapper ea-swap-slide-animation <?php echo esc_attr( $settings['image_swap_event'].' '.$settings['image_slide_style'] ); ?>">
            <?php
                self::image_one();
                self::image_fake();
                self::image_two();
            ?>
        </div>	
		<?php
	}

}