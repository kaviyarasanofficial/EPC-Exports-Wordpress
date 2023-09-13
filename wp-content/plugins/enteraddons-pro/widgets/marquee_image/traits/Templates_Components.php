<?php 
namespace EnteraddonsPro\Widgets\Marquee_Image\Traits;
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

    public static function marqueeSettings(){
        $settings = self::getSettings();

        $marqueeSettings = [
            'marquee_animation_delay'  => !empty( $settings['marquee_animation_delay'] ) ? $settings['marquee_animation_delay'] : 50000,
            'marquee_direction'        => !empty( $settings['marquee_direction'] ) ? $settings['marquee_direction'] : 'right',
            'marquee_duplicate_image_gap'  => !empty( $settings['marquee_duplicate_image_gap'] ) ? $settings['marquee_duplicate_image_gap'] : 100,
            'marquee_hover_pause'      => !empty( $settings['marquee_hover_pause'] ) && $settings['marquee_hover_pause'] == 'yes' ? true : false,
        ];
        return json_encode( $marqueeSettings );  
    }

    //Image Link
    protected static function linkOpen( $item ) {
        //
        $target = '_blank';
        if( !empty( $item['image_link']['is_external'] ) && $item['image_link']['is_external'] == 'on' ) {
            $target = '_blank';
        }

        return '<a href="'.esc_url( $item['image_link']['url'] ).'" target="'.esc_attr( $target ).'">';
    }

    // Image and Text Link Close
    protected static function linkClose() {
        return '</a>';
    }

    //Image
    public static function image( $item ) {

        if( !empty( $item['image']['url'] ) ) {
            echo '<img src="'.esc_url( $item['image']['url'] ).'" >';

        }
    }

    //image caption
    public static function image_caption( $item ) {

        if( !empty( $item['image_caption'] ) ) {
            echo '<h5>'. esc_html( $item['image_caption'] ).'</h5>';

        }
    }

    //Image Link
    protected static function linkOpentext( $item ) {

        $target = '_blank';
        if( !empty( $item['text_link']['is_external'] ) && $item['text_link']['is_external'] == 'on' ) {
            $target = '_blank';
        }

        return '<a href="'.esc_url( $item['text_link']['url'] ).'" target="'.esc_attr( $target ).'">';
    }

    //Title
    public static function title( $item_text ) {

        if( !empty( $item_text['title'] ) ) {
            $settings = self::getSettings();
            echo '<'.esc_attr( $settings['title_tag'] ).' class="ea-marquee-title">'. esc_html( $item_text['title'] ).'</'.esc_attr( $settings['title_tag'] ).'>';

        }
    }

    //Descriptions
    public static function descriptions( $item_text ) {

        if( !empty( $item_text['desc'] ) ) {
            echo wpautop( $item_text['desc'] );
        }
    }

    // Icon
    protected static function icon( $item_text ) {
        echo '<div class="text-icon">';  
            echo \Enteraddons\Classes\Helper::getElementorIcon( $item_text['icon'] );
        echo '</div>';
    }
  
}