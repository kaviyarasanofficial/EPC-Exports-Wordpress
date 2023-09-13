<?php 
namespace EnteraddonsPro\Widgets\Panorama\Traits;
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

		$url = !empty( $settings['image']['url'] ) ? $settings['image']['url'] : '';
		$id = !empty( $settings['image']['id'] ) ? $settings['image']['id'] : '';

		$opt = [
			'title_one' => !empty( $settings['title_one'] ) ? $settings['title_one'] : '',
            'title_two' => !empty( $settings['title_two'] ) ? $settings['title_two'] : '',
            'autoload' => !empty( $settings['autoload'] ) && $settings['autoload'] == 'yes' ? true : false,
            'showzoomctrl' => !empty( $settings['showzoomctrl'] ) && $settings['showzoomctrl'] == 'yes' ? true : false,
            'showcontrols' => !empty( $settings['showcontrols'] ) && $settings['showcontrols'] == 'yes' ? true : false,
            'hot_spots' =>  !empty( $settings['hot_spots_switch'] ) && $settings['hot_spots_switch'] == 'yes' ? $settings['hot_spots'] : '',

		];

		$opt = json_encode( $opt );

		?>
		<div class="ea-panorama-360-wrap"><div class="ea-panorama-360-view" data-opt="<?php echo htmlspecialchars( $opt, ENT_QUOTES, 'UTF-8' ); ?>" id="ea_panorama_<?php echo esc_attr( $id ); ?>" data-img="<?php echo esc_url( $url ); ?>" style="width: 100%;height: 500px;"></div></div>
		<?php
	}

}