<?php 
namespace EnteraddonsPro\Widgets\Mini_Cart\Traits;
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
     // Cart Button Icon
    protected static function icon() {

        $settings = self::getSettings();
        if( !empty( $settings['icon']) ) {
           echo \Enteraddons\Classes\Helper::getElementorIcon( $settings['icon'] );
        }
    }

    // Offcanvas Body 
    protected static function offcanvas_cart() {

        $settings   = self::getSettings();
        if ( null === WC()->cart ) {
			return;
		}

        $widget_cart_is_hidden = apply_filters( 'woocommerce_widget_cart_is_hidden', false );
		$is_edit_mode = \Enteraddons\Classes\Helper::is_elementor_edit_mode();

        if( class_exists('woocommerce') ) {
            echo '<!-- Minicart -->';
            if ( ! $widget_cart_is_hidden ) {
                echo '<div id="offcanvas_cart" class="offcanvas-panel cart-panel">';
                    echo '<!-- Offcanvas Overlay -->';
                    echo '<div class="offcanvas-overlay"></div>';
                    echo '<!-- End Offcanvas Overlay -->';

                    echo '<!-- Panel -->';
                    echo '<div class="panel ps">';
                        echo '<!-- Offcanvas Header -->';
                        echo '<div class="offcanvas-header enteraddons-d-flex enteraddons-align-items-center minicart-justify-content-between">';
                            echo '<!-- Header Title -->';
                            echo '<div class="offcanvas-title">';
                                    if( !empty( $settings['title_icon'] ) ) {
                                        echo \Enteraddons\Classes\Helper::getElementorIcon( $settings['title_icon'] );
                                    }
                                echo '<h3>'.esc_html__('Your Cart List','enteraddons-pro').'</h3>';
                            echo '</div>';
                            echo '<!-- End Header Title -->';

                            echo '<!-- Offcanvas Close -->';
                            echo '<div class="btn_close offcanvas-close">';
                                if( !empty( $settings['Close_button_icon'] ) ) {
                                    echo \Enteraddons\Classes\Helper::getElementorIcon( $settings['Close_button_icon'] );
                                }
                            echo '</div>';
                            echo '<!-- End Offcanvas Close -->';
                        echo '</div>';
                        echo '<!-- End Offcanvas Header -->';
                        echo '<!-- Offcanvas Content -->';
                        echo '<div class="offcanvas-content">';
                            echo '<div class="woocommerce-mini-cart-content widget_shopping_cart_content">';
                            if ( $is_edit_mode ) {
                                woocommerce_mini_cart();
                            }
                            echo '</div>';
                        echo '</div>';
                        echo '<!-- End Offcanvas Content -->';
                    echo '</div>';
                    echo '<!-- End Panel -->';
                echo '</div>';
            }
            echo '<!-- End Minicart -->';
        }
    }
}