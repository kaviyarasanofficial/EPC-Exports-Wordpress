<?php 
namespace EnteraddonsPro\Widgets\Product_Single_Category\Traits;
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

    protected static function linkOpen( $link, $class = '' ) {
        //
        $target = '_self';
        if( !empty( $link['is_external'] ) && $link['is_external'] == 'on' ) {
            $target = '_blank';
        }

        return '<a class="'.esc_attr( $class ).'" href="'.esc_url( $link['url'] ).'" target="'.esc_attr( $target ).'">';
    }
    protected static function linkClose() {
        return '</a>';
    }

    
}