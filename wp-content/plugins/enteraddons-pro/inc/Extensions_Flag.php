<?php
namespace EnteraddonsPro\Inc;

/**
 * Enteraddons Extensions list class
 *
 * @package     Enteraddons
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

if( !defined( 'WPINC' ) ) {
    die;
}

class Extensions_Flag {
    
    public static function getExtensions() {

        return [

            [
                'label'     => esc_html__( 'Header & Footer Snippets', 'enteraddons-pro' ),
                'name'      => 'header_footer_snippets',
                'icon'      => 'entera entera-source-code',
                'demo_link' => '#',
                'is_pro'    => true
            ],
            [
                'label'     => esc_html__( 'Accessibilities', 'enteraddons-pro' ),
                'name'      => 'accessibilities',
                'icon'      => 'entera entera-accessibilities',
                'demo_link' => '#',
                'is_pro'    => true
            ],
            [
                'label'     => esc_html__( 'Speedup', 'enteraddons-pro' ),
                'name'      => 'speedup',
                'icon'      => 'entera entera-speedup',
                'demo_link' => '#',
                'is_pro'    => true
            ],
            [
                'label'     => esc_html__( 'Image Compressor', 'enteraddons-pro' ),
                'name'      => 'image_compressor',
                'icon'      => 'entera entera-image-compressor',
                'demo_link' => '#',
                'is_pro'    => true
            ],
            [
                'label'     => esc_html__( 'Webp Converter', 'enteraddons-pro' ),
                'name'      => 'webp_converter',
                'icon'      => 'entera entera-webp-converter',
                'demo_link' => '#',
                'is_pro'    => true
            ],
            [
                'label'     => esc_html__( 'Url Shortener', 'enteraddons-pro' ),
                'name'      => 'url_shortener',
                'icon'      => 'entera entera-url-shortener',
                'demo_link' => '#',
                'is_pro'    => true
            ],
            [
                'label'     => esc_html__( 'Maintenance Mode', 'enteraddons-pro' ),
                'name'      => 'maintenance_mode',
                'icon'      => 'entera entera-maintenance-mode',
                'demo_link' => '#',
                'is_pro'    => true
            ]

        ];

    }

}
