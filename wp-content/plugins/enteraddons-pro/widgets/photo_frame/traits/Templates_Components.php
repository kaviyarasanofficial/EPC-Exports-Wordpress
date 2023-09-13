<?php 
namespace EnteraddonsPro\Widgets\Photo_Frame\Traits;
/**
 * EnteraddonsPro template class
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
    
    // Image
    public static function image() {
        $settings = self::getSettings();

        if( !empty( $settings['image']['url'] ) ) {
            echo '<img  src="'.esc_url( $settings['image']['url'] ).'">';
        }
    }

     // Title
     public static function title() {
        $settings = self::getSettings();

        if( !empty( $settings['title'] ) ) {
            echo esc_html( $settings['title'] );
        }
    }

     // Designation
     public static function designation() {
        $settings = self::getSettings();

        if( !empty( $settings['designation'] ) ) {
            echo esc_html( $settings['designation'] );
        }
    }


}