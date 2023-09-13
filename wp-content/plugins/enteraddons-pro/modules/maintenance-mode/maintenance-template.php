<?php
/**
 * Maintenance mode Template
 *
 * @package     Enteraddons Pro
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

wp_head();
    $opt = get_option('ea_modules_option');
    if( !empty( $opt['mm-page'] ) ) {
        echo Enteraddons\Classes\Helper::elementor_content_display( absint( $opt['mm-page'] ) );
    }
wp_footer();