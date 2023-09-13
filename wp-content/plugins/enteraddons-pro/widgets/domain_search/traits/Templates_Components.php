<?php 
namespace EnteraddonsPro\Widgets\Domain_Search\Traits;
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

    //Action Link
    public static function link() {

        $settings = self::getSettings();
        if( !empty( $settings['website_link']['url'] ) ) {
            echo esc_url( $settings['website_link']['url'] );
        }
    }

    //Button
    public static function button() {

        $settings = self::getSettings();
        if( !empty( $settings['button_text'] ) ) {
            echo  '<div class="ea-search-button">';					
                echo '<input type="submit" class="ea-ds-btn ea-form-control" name="submit-button" value="'. esc_html( $settings['button_text'] ).'">';
            echo '</div>';
        }
    }

    //Placeholder Text
    public static function text() {

        $settings = self::getSettings();
        if( !empty( $settings['placeholder_text'] ) ) {
            echo esc_html( $settings['placeholder_text'] );
        }
    }

    //Domain Type
    public static function domain_type( $item ) {

        if( !empty( $item['domain_type'] &&  $item['domain_price'] ) ) {
            echo   '<div class="ea-product-one">';
                echo '<h4 class="ea-ds-type">';
                    echo esc_html( $item['domain_type'] );
                echo '</h4>';
                echo '<p class="ea-ds-duration">';
                    echo esc_html( $item['domain_price'] ); 
                echo '</p>';
            echo '</div>';
        }
    }

    //....................  Template 2 Components................... //

   //Action Link
   public static function action_link() {

        $settings = self::getSettings();
        if( !empty( $settings['bill_address_link']['url'] ) ) {
            echo esc_url( $settings['bill_address_link']['url'] );
        }
    }

    //Placeholder Text
    public static function placeholder() {

        $settings = self::getSettings();
        if( !empty( $settings['search_form_placeholder'] ) ) {
            esc_html_e($settings['search_form_placeholder'] );
        }
    }

    // Domain Heading Text
    public static function domain_heading() {

        $settings = self::getSettings();
        if( !empty( $settings['domain_heading_content_subtitle'] || $settings['domain_heading_content_title'] ) ) {
            echo   '<div class="ea-dm-left-content">';
                echo '<p>';
                    echo '<span>';
                        echo esc_html( $settings['domain_heading_content_subtitle'] );
                    echo '</span>';
                    echo  esc_html( $settings['domain_heading_content_title'] );
                echo '</p>';
            echo '</div>';
        }  
    }

    //Domain Option List
    public static function domain_title( $item ) {

        if( !empty( $item['domain_title'] ) ) {
            echo "<option>".esc_html( $item['domain_title'] )."</option>";
        }
    }

    //Button
    public static function search_button() {

        $settings = self::getSettings();
        if( !empty( $settings['ea_button_text'] ) ) {
            esc_html_e( $settings['ea_button_text'] );
        }
        else {
            echo \Enteraddons\Classes\Helper::getElementorIcon( $settings['ea_button_icon'] ); 
        }
    }

    // Domain Offer
    public static function domain_offer() {

        $settings = self::getSettings();
        if( !empty( $settings['domain_offer_title'] ) ) { 
            ?>
                <div  class="ea-dm-domain--offer show 
                    <?php 
                        if( $settings['offer_animation'] == 'animation' ) { 
                            esc_html_e( 'domain--offer-animation' );
                        }
                        elseif( $settings['offer_animation'] == 'shake') {
                             esc_html_e( 'domain--offer-shake' );
                        }
                        ?>">
                    <span>
                        <?php esc_html_e( $settings['domain_offer_title'] ); ?>
                    </span>
                </div>
            <?php
        }    
    }

    // Domain Type List
    public static function domain_type_name( $item ) {
    
        if( !empty( $item['domain_names'] || $item['domain_price']  ) ) {
            echo  '<div class="ea-dm-extension">';
                echo '<span class="ea-dm-name">';
                    echo esc_html( $item['domain_names'] ); 
                echo '</span>';
                echo '<span class="ea-dm-price">';
                    echo esc_html( $item['domain_price'] );
                echo '</span>';
            echo '</div>';
        }
    }
}