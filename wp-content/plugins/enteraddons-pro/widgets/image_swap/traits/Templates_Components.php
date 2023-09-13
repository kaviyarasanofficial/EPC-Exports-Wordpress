<?php 
namespace EnteraddonsPro\Widgets\Image_Swap\Traits;
/**
 * Enteraddons template class
 *
 * @package     Enteraddons
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

trait Templates_Components {
	
    // Set Settings options
    protected static function getSettings() {
        return self::getDisplaySettings();
    }

     // Image Top
     public static function image_top() {
        $settings   = self::getSettings();
    
        if( !empty( $settings['first_image']['url'] ) ) {
            ?>
             <img class="ea-top-img <?php echo esc_attr( !empty( $settings['image_effect_rotate_zoom'] ) ? $settings['image_effect_rotate_zoom'] : '' ); ?>" src="<?php  echo esc_url( $settings['first_image']['url'] ); ?>" />
          <?php
        }
    }

     // Image Bottom
     public static function image_bottom() {
        $settings   = self::getSettings();
        
        if( !empty( $settings['second_image']['url'] ) ) {
            echo '<img class="ea-bottom-img" src="'.esc_url( $settings['second_image']['url'] ).'">';

        }
    }

    // Image For template 2
    // Image One
    public static function image_one() {
        $settings   = self::getSettings();

        if( !empty( $settings['first_image']['url'] ) ) {
            echo '<img class="ea-swap-absolute-img ea-first-img" src="'.esc_url( $settings['first_image']['url'] ).'">';
        }
    }

    // Second Image
    public static function image_two() {
        $settings   = self::getSettings();

        if( !empty( $settings['second_image']['url'] ) ) {

            echo '<img class="ea-swap-absolute-img ea-second-img" src="'.esc_url( $settings['second_image']['url'] ).'">';

        }
    }

    // Common Image
    public static function image_fake() {
        $settings   = self::getSettings();

        if( !empty( $settings['first_image']['url'] ) ) {

            echo '<img class="ea-common-img" src="'.esc_url( $settings['first_image']['url'] ).'">';

        }
    }   

}