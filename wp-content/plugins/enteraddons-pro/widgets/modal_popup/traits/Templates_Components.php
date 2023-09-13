<?php 
namespace EnteraddonsPro\Widgets\Modal_Popup\Traits;
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

     //Popup Header
     public static function header() {

        $settings = self::getSettings();
        if( !empty( $settings['header_title'] ) ) {
            echo '<h4>'.esc_html( $settings['header_title'] ).'</h4>';
        }
    }

    // Close Icon
    protected static function close_icon() {
        
        $settings = self::getSettings();
        echo \Enteraddons\Classes\Helper::getElementorIcon( $settings['close_icon'] );
    }

    // Modal Popup Image
    protected static function modal_image() {
         
        $settings = self::getSettings();
        if( !empty( $settings['modal_image']['url'] ) ) {
            echo '<div class="ea-modal-img-wrapper">';
                echo '<img class="ea-modal-img" src="'.esc_url( $settings['modal_image']['url'] ).'" >';
            echo '</div>';
        }
    }

    // Popup Title
    public static function title() {

        $settings = self::getSettings();
        if( !empty( $settings['modal_title'] ) ) {
            echo '<h1 class="ea-modal-title">'.esc_html( $settings['modal_title'] ).'</h1>';
        }
    }

    // Popup Title
    public static function subtitle() {

        $settings = self::getSettings();
        if( !empty( $settings['modal_subtitle'] ) ) {
            echo '<h1 class="ea-modal-subtitle">'.esc_html( $settings['modal_subtitle'] ).'</h1>';
        }
    }

    // Popup Description
    public static function description() {

        $settings = self::getSettings();
        if( !empty( $settings['modal_description'] ) ) {
            echo '<div class="ea-modal-description">'.wpautop( $settings['modal_description'] ).'</div>';
        }
    }

    // Trigger Button Title
    public static function btn_text() {

        $settings = self::getSettings();
        if( !empty( $settings['button_title'] ) ) {
            echo esc_html( $settings['button_title'] );
        }
    }

    // Trigger Image
    protected static function trigger_image() {
         
        $settings = self::getSettings();
        $altText = \Elementor\Control_Media::get_image_alt( $settings['trigger_image'] );
        if( !empty( $settings['trigger_image']['url'] || $settings['trigger_title'] || $settings['trigger_subtitle']  ) ) {
            echo  '<div class="trigger-img-wrapper" data-toggle="ea-modal" data-effect="'. esc_attr( $settings['modal_effect_style'] ).'" >';
                echo '<div class="ea-trigger-img-main '.esc_attr( $settings['trigger_type_effect'] ).'">';
                    echo '<img class="ea-trigger-img" src="'.esc_url( $settings['trigger_image']['url'] ).'" alt="'.esc_attr( $altText ).'">';
                echo '</div>';
                echo '<div class ="ea-trigger-content">';
                    echo '<h4 class="ea-trigger-title">'.esc_html( $settings['trigger_title'] ).'</h4>';
                    echo '<p class="ea-trigger-subtitle">'.esc_html( $settings['trigger_subtitle'] ).'</p>';
                echo '</div>';
            echo '</div>';
        }
    }

    // Social Icon
    protected static function icon( $data ) {

        if(  !empty( $data['icon'] ) ) {
            echo \Enteraddons\Classes\Helper::getElementorIcon( $data['icon'] );
        } 
        
    }
    protected static function linkOpen( $data ) {
        //
        $target = '_self';
        if( !empty( $data['link']['is_external'] ) && $data['link']['is_external'] == 'on' ) {
            $target = '_blank';
        }
        echo '<a href="'.esc_url( $data['link']['url'] ).'" target="'.esc_attr( $target ).'">';
    }
    protected static function linkClose() {
        echo '</a>';
    }

     // Button
     public static function modal_button(  ) {

        $settings = self::getSettings();
        $label     = !empty( $settings ['link_label'] ) ?  $settings['link_label'] : esc_html__( 'See Details', 'enteraddons-pro' );
        echo \Enteraddons\Classes\Helper::getElementorLinkHandler( $settings['more_link'], $label, 'ea-modal-button' );
    }

}