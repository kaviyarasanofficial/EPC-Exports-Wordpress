<?php 
namespace EnteraddonsPro\Widgets\Iframe\Traits;
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

trait Template_1 {
    
    public static function markup_style_1() {

        $settings   = self::getDisplaySettings();
        $url        = !empty( $settings['iframe_url'] ) ? $settings['iframe_url'] : '';        
        $allowfullscreen = !empty( $settings['allowfullscreen'] ) && $settings['allowfullscreen'] == 'yes' ? true : false;
        $scrolling  = !empty( $settings['scrolling'] ) && $settings['scrolling'] == 'yes' ? 'yes' : 'no';
        $loading    = !empty( $settings['loading'] ) ? $settings['loading'] : 'auto';
        ?>
        <div class="ea-iframe-wrap">
            <?php
            if( !empty( $settings['active-preloader'] ) ):
            ?>
            <div class="ea-iframe-preloader"><div class="ea-iframe-preloader-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>
            <?php
            endif;
            ?>
            <iframe class="ea-iframe" loading="<?php echo esc_attr( $loading ) ?>" allowfullscreen="<?php echo esc_attr( $allowfullscreen ) ?>" scrolling="<?php echo esc_attr( $scrolling ) ?>" src="<?php echo esc_url( $url ); ?>"></iframe>
        </div>
        <?php
    }

}