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

trait Template_1 {
	
	public static function markup_style_1() {
		$settings   = self::getSettings();
		?>
		<div class="ea-swap--wrapper ea-swap-effect-wrap <?php echo esc_attr( $settings['img_swap_effect_style'].' '.$settings['image_swap_event'] ); ?>">
			<?php 
				self::image_bottom();
				self::image_top();
			?>
		</div> 
		<?php
	}

}