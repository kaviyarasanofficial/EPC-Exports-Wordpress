<?php 
namespace EnteraddonsPro\Widgets\Image_Hover_Effect\Traits;
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
		<div class="ea-imghvreffect-wrap <?php echo esc_attr( $settings['image_hover_effect'] ); ?>">
			<?php
			self::ribbon();
			self::image();
			self::content();
			?>
		</div> 
		<?php
	}

}