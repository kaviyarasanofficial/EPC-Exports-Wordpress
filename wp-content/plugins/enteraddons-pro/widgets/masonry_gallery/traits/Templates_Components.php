<?php 
namespace EnteraddonsPro\Widgets\Masonry_Gallery\Traits;
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

    public static function gallerysettings(){

        $settings = self::getSettings();
        $gallerySettings = [
            'gutter'  => !empty( $settings['gallery_gutter'] ) ? $settings['gallery_gutter'] : '',
        ];
        return json_encode( $gallerySettings );  
    }

   //Filter butoon bTemplate 1
   protected static function title( $masonary_image ) {
        if( !empty( $masonary_image['filter_btn_title'] ) ) {
            echo esc_html( $masonary_image['filter_btn_title'] );
        }
    }
    
    //gallery Template 1
    protected static function gallery( $img ) {

        if( !empty( $img['url'] ) ){
           echo  '<img src="'.esc_url( $img['url'] ).'"/>';
        }
     }

    // Image template 2
    protected static function image($masonary_gallery_image) {

        if( !empty( $masonary_gallery_image['masonary_gallery_image']['url'] ) ) {
            $altText = \Elementor\Control_Media::get_image_alt( $masonary_gallery_image );
          echo   '<img src="'.esc_url( $masonary_gallery_image['masonary_gallery_image']['url']).'" alt="'.esc_attr( $altText ).'" />';
        }
    }

    //Gallery Image Title Template 2
    protected static function image_title( $masonary_gallery_image ) {
            if( !empty( $masonary_gallery_image['gallery_image_title'] ) ) {
                    echo '<h4>'.esc_html($masonary_gallery_image['gallery_image_title']).'</h4>';
            }
     }
      //Gallery Image Description Template 2
    protected static function imageDescription( $masonary_gallery_image ) {
        if( !empty( $masonary_gallery_image['gallery_image_description'] ) ) {
                echo '<p>'.esc_html($masonary_gallery_image['gallery_image_description']).'</p>';
        }
    }
    // button Template 2
   protected static function Button( $masonary_image ) {
        if( !empty( $masonary_image['gallery_btn_title'] ) ) {
                echo esc_html( $masonary_image['gallery_btn_title'] );
        }
    }
    protected static function icon( $masonary_image ) {
        if(!empty( $masonary_image['button_icon'] )){
            return \Enteraddons\Classes\Helper::getElementorIcon( $masonary_image['button_icon'] );
        }
    }

    // Image Link Template 2
    protected static function linkOpen( $masonary_gallery_image ) {
        //
        $target = '_blank';
        if( !empty( $masonary_gallery_image['is_external']['masonary_button_link'] ) && $masonary_gallery_image['is_external'] == 'on' ) {
            $target = '_blank';
        }

        return '<a class="ea-btn"  href="'.esc_url( $masonary_gallery_image['masonary_button_link']['url'] ).'" target="'.esc_attr( $target ).'">';
    }
    // Image Link Close Template 2
    protected static function linkClose() {
        return '</a>';
    }
 
}