<?php 
namespace EnteraddonsPro\Widgets\Comparison_Table\Traits;
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

    //Header 
    public static function header( $item ) {
                
        if ( 'yes' === $item['show_icon'] && !empty( $item['dp_heading_image']['url'] ) ) {
            $altText = \Elementor\Control_Media::get_image_alt( $item['dp_heading_image'] );
            echo '<img src="'.esc_url( $item['dp_heading_image']['url'] ).'" class="ea-ct-heading-image" alt="'.esc_attr( $altText ).'">';  
        }
        // 
        if( !empty( $item['dp_heading_text']  ) )  {
            echo '<h4>'. esc_html( $item['dp_heading_text']).'</h4>'; 
        }
    }

    // Price
    public static function price( $item ) {

        echo '<div class="enteraddons-ct-price">';
            echo '<span class="enteraddons-ct-inner-price">';
                echo '<span class="price-group">';
                    //Currency
                    if( !empty( $item['currency'] ) ) {
                        if( $item['currency'] == 'custom' && !empty( $item['custom_currency'] )  ) {
                        $currency = $item['custom_currency'];
                        } else {
                        $currency = \Enteraddons\Classes\Helper::getCurrencySymbol($item['currency']);
                        }
                        echo '<sub class="ea-ct-currency">'.esc_html( $currency ).'</sub>';
                    }
                    // Price
                    if( !empty( $item['price'] ) ) {
                        echo '<span class="price">'.esc_html( $item['price'] ).'</span>';
                    }
                echo '</span>';
                // Duration
                if( !empty( $item['duration'] ) ) {
                    echo '<span class="ct-duration-wrapper"><sub class="ea-ct-duration">'.esc_html( $item['duration'] ).'</sub></span>';
                }
            echo '</span>';
        echo '</div>';
    }

    //Comparison table badge 
    public static function badge( $item ) {
        if ( 'yes' === $item['show_badge'] ) {
            $text = !empty( $item['badge_text'] ) ? $item['badge_text'] : '';
            echo '<span class="enteraddons-ct-price-badge '.esc_html( $item['badge_style'] ).'">'.esc_html( $text ).'</span>';
        }
    }


    // Table Content 
    public static function Content( $item ) {
        $altText     = \Elementor\Control_Media::get_image_alt( $item['tbody_image'] );

        if( !empty( $item['content_title'] || $item['tbody_icon']  ) || $item['tbody_image'] ) {
            echo "<td><div class='ea-ct-td-content'>";
                if ( 'yes' === $item['ea_show_icon'] ) {
                    if( $item['icon_type'] != 'img' ) {
                        echo \Enteraddons\Classes\Helper::getElementorIcon( $item['tbody_icon'] );
                    } else {
                        echo '<img src="'.esc_url( $item['tbody_image']['url'] ).'" class="ea-ct-table-image" alt="'.esc_attr( $altText ).'">';
                    }
                }
                echo esc_html( $item['content_title'] );
            echo "</div></td>";
        }
    }

    // Button 
    public static function button( $item ) {
        
        if( !empty( $item['btn_title'] && $item['btn_links']) ) {
            echo '<td><div class="ea-ct-td-content"><a href="'. esc_url( $item['btn_links']['url'] ) .'" class="ct-btn-custom-reverse">'.esc_html( $item['btn_title'] ).'</a></div></td>';
        }
    }
  
}