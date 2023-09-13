<?php 
namespace EnteraddonsPro\Widgets\Product_Viewer_360\Traits;
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
    
    protected static function getSettings() {
        return self::getDisplaySettings();
    }
    public static function productViewerSettings() {

        $settings = self::getDisplaySettings();

        $images = !empty( $settings['product_image_list'] ) ? array_column( $settings['product_image_list'], 'product_image' ) : '';
        $urls = !empty( $images ) ? array_column( $images, 'url' ) : '';

        $productViewerSettings = [
            'ProductImage'  => !empty( $urls ) ? $urls: '',
            'width'         => !empty( $settings['product_width']['size'] ) ? $settings['product_width']['size'] : 450,
            'height'        => !empty( $settings['product_height']['size'] ) ? $settings['product_height']['size'] : 450,
             'animation'    => !empty( $settings['product_animation'] ) && $settings['product_animation'] == 'yes' ? true : false,
             'loop'         => !empty( $settings['product_loop'] ) && $settings['product_loop'] == 'yes' ? true : false,
             'reverse'      => !empty( $settings['frame_reverse'] ) && $settings['frame_reverse'] == 'yes' ? true : false,
             'frameTime'    => !empty( $settings['frame_time'] ) ? $settings['frame_time'] : 60,
              
        ];
        return json_encode( $productViewerSettings );
    }
 
}