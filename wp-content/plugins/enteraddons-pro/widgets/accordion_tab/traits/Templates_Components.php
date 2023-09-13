<?php 
namespace EnteraddonsPro\Widgets\Accordion_Tab\Traits;
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
 
    //Accordion Description
    protected static function description( $accordion_tab ) {
        //
        if( !empty( $accordion_tab['enteraddons_accordion_tab_description'] )) {
            echo '<p>'.wp_kses( $accordion_tab['enteraddons_accordion_tab_description'],'post' ) .' </p>';
        }
    }

    //Accordion Icon 
    protected static function count_icon($accordion_tab) {  
        if(!empty($accordion_tab['enteraddons_accordion_icon']))  {
             \Elementor\Icons_Manager::render_icon( $accordion_tab['enteraddons_accordion_icon'], [ 'aria-hidden' => 'true' ] ); 
        }  
    }

    // Image Body Link Open
    protected static function linkOpen($accordion_image) {
        $settings = self::getSettings();
        //
        $target = '_self';
        if( !empty( $accordion_image['accordion_tab_image_link']['is_external'] ) && $accordion_image['accordion_tab_image_link']['is_external'] == 'on' ) {
            $target = '_blank';
        }

        return '<a class="at-card-thumb d-block at-bg-overlay after-opacity-3" href="'.esc_url( $accordion_image['accordion_tab_image_link']['url'] ).'" target="'.esc_attr( $target ).'">';
    }

    //Accordion Image
    protected static function image( $accordion_image ) {
        //
        if ( !empty( $accordion_image['image']['url'] )) {
            $altText  = \Elementor\Control_Media::get_image_alt( $accordion_image['image'] );
            echo '<img src="'. esc_url( $accordion_image['image']['url'] ).'" alt="'.esc_attr( $altText ).'" >';
        }
    }
     //Image Body and Button Link Close
    protected static function linkClose() {
        return '</a>';
     }

    //Button Link Open
    protected static function button_linkOpen($accordion_image) {
        //
        $target = '_self';
        if( !empty( $accordion_image['enteraddons_accordion_tab_Button_link']['is_external'] ) && $accordion_image['enteraddons_accordion_tab_Button_link']['is_external'] == 'on' ) {
            $target = '_blank';
        }

      return  '<a class="enteraddons-btn hover-green ea-nunito" href="'.esc_url($accordion_image['enteraddons_accordion_tab_Button_link']['url'] ).'" target="'.esc_attr( $target ).'">';
    }
}