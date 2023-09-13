<?php 
namespace EnteraddonsPro\Widgets\Image_Hover_Effect\Traits;
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

    // Image
    public static function image() {
        $settings   = self::getSettings();
        if( !empty( $settings['image'] ) ) {
            echo '<img src="'.esc_url( $settings['image']['url'] ).'">';
        }
        
    }

    // Content
    public static function content() {
        $settings   = self::getSettings();

        echo '<div class="imghvrcontent">';
            if( !empty( $settings['title'] ) ) {
                echo '<h2>'.esc_html( $settings['title'] ).'</h2>';
            }
            //
            if( !empty( $settings['description'] ) ) {
                echo '<p>'.esc_html( $settings['description'] ).'</p>';
            }
            //
            self::button();
        echo '</div>';

    }

    protected static function button() {

        $settings = self::getSettings();
        if( empty( $settings['button_text'] ) && empty( $settings['link']['url'] ) ) {
            return;
        }
        
        echo '<div class="imghvrbtn-link">'.self::linkOpen().self::button_icon().'<span class="imghvrbtn-btn--text">'.esc_html( $settings['button_text'] ).'</span>'.self::linkClose().'</a></div>';
    }

    protected static function button_icon() {
        $settings = self::getSettings();
        $normalIcon = \Enteraddons\Classes\Helper::getElementorIcon( $settings['button_icon'] );

        return !empty( $normalIcon ) ? '<span class="imghvrbtn-icons">'.\Enteraddons\Classes\Helper::allowFormattingTagHtml($normalIcon).'</span>' : '';
    }
    protected static function linkOpen() {
        $settings = self::getSettings();
        //
        $target = '_self';
        if( !empty( $settings['link']['is_external'] ) && $settings['link']['is_external'] == 'on' ) {
            $target = '_blank';
        }

        return '<a href="'.esc_url( $settings['link']['url'] ).'" target="'.esc_attr( $target ).'">';
    }
    protected static function linkClose() {
        return '</a>';
    }
    protected static function ribbon() {
        $settings = self::getSettings();
        if( !empty( $settings['ihve_ribbon_switch'] ) && $settings['ihve_ribbon_switch'] == 'yes' ) {
            echo '<div class="ihve-card-ribbon">'.esc_html( $settings['ihve_ribbon_title'] ).'</div>';
        }
    }

}