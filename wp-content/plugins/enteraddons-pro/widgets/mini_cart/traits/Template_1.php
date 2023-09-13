<?php 
namespace EnteraddonsPro\Widgets\Mini_Cart\Traits;
/**
 * EnteraddonsPro mini cart template class
 *
 * @package     Enteraddons
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

trait Template_1 {
	
	public static function markup_style_1() {
		$settings   = self::getSettings();
		
		if ( null === WC()->cart ) {
			return;
		}

        echo '<!-- cart button -->';
		echo '<div class="ea-cart-button-wrapper">';
			echo '<a class="position-relative" href="#" data-toggle="offCanvas" data-target="offcanvas_cart">';
			    self::icon();
				echo '<span class="cart-count ea-mini-cart-count">'.esc_html( WC()->cart->get_cart_contents_count() ).'</span>';
			echo '</a>';
		echo '</div>';
        echo '<!-- end cart button -->';
		self::offcanvas_cart();    
	}
}