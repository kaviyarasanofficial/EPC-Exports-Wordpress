<?php
namespace EnteraddonsPro\Inc;

/**
 * Enteraddons widgets list class
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

class Widgets_Flag {
    
    public static function getWidgets() {

        return [
            [
                'label'     => esc_html__( 'Accordion Tab', 'enteraddons-pro' ),
                'name'      => 'accordion_tab',
                'icon'      => 'entera entera-accordion-tab',
                'demo_link' => '#',
                'is_pro'    => true
            ],
            [
                'label'     => esc_html__( 'Advanced Data Table', 'enteraddons-pro' ),
                'name'      => 'advanced_data_table',
                'icon'      => 'entera entera-advance-data-table',
                'demo_link' => '#',
                'is_pro'    => true
            ],
            [
                'label'     => esc_html__( 'Marquee Image', 'enteraddons-pro' ),
                'name'      => 'marquee_image',
                'icon'      => 'entera entera-marquee-image',
                'demo_link' => '#',
                'is_pro'    => true
            ],
            [
                'label'     => esc_html__( 'Team Carousel', 'enteraddons-pro' ),
                'name'      => 'team_carousel',
                'icon'      => 'entera entera-team-carousel',
                'demo_link' => '#',
                'is_pro'    => true
            ],
            [
                'label'     => esc_html__( 'Product Category Carousel', 'enteraddons-pro' ),
                'name'      => 'product_category_carousel',
                'icon'      => 'entera entera-category-carousel',
                'demo_link' => '#',
                'is_pro'    => true
            ],
            [
                'label'     => esc_html__( 'Product Category Grid', 'enteraddons-pro' ),
                'name'      => 'product_category_grid',
                'icon'      => 'entera entera-category-grid',
                'demo_link' => '#',
                'is_pro'    => true
            ],
            [
                'label'     => esc_html__( 'Product Single Category', 'enteraddons-pro' ),
                'name'      => 'product_single_category',
                'icon'      => 'entera entera-single-category',
                'demo_link' => '#',
                'is_pro'    => true
            ],
            [
                'label'     => esc_html__( 'Product Grid', 'enteraddons-pro' ),
                'name'      => 'product_grid',
                'icon'      => 'entera entera-product-grid',
                'demo_link' => '#',
                'is_pro'    => true
            ],
            [
                'label'     => esc_html__( 'Photo Frame', 'enteraddons-pro' ),
                'name'      => 'photo_frame',
                'icon'      => 'entera entera-photo-frame',
                'demo_link' => '#',
                'is_pro'    => true
            ],
            [
                'label'     => esc_html__( 'Source Code', 'enteraddons-pro' ),
                'name'      => 'source_code',
                'icon'      => 'entera entera-source-code',
                'demo_link' => '#',
                'is_pro'    => true
            ],
            [
                'label'     => esc_html__( 'Mini Cart', 'enteraddons-pro' ),
                'name'      => 'mini_cart',
                'icon'      => 'entera entera-mini-cart',
                'demo_link' => '#',
                'is_pro'    => true
            ],
            [
                'label'     => esc_html__( 'Masonry Gallery', 'enteraddons-pro' ),
                'name'      => 'masonry_gallery',
                'icon'      => 'entera entera-masonry-gallery',
                'demo_link' => '#',
                'is_pro'    => true
            ],
            [
                'label'     => esc_html__( 'Image Swap', 'enteraddons-pro' ),
                'name'      => 'image_swap',
                'icon'      => 'entera entera-image-swap',
                'demo_link' => '#',
                'is_pro'    => true
            ],
            [
                'label'     => esc_html__( '360d Product Viewer', 'enteraddons-pro' ),
                'name'      => 'product_viewer_360',
                'icon'      => 'entera entera-product-viewer-360d',
                'demo_link' => '#',
                'is_pro'    => true
            ],
            [
                'label'     => esc_html__( 'Iframe', 'enteraddons-pro' ),
                'name'      => 'iframe',
                'icon'      => 'entera entera-iframe',
                'demo_link' => '#',
                'is_pro'    => true
            ],
            [
                'label'     => esc_html__( 'Panorama Viewer', 'enteraddons-pro' ),
                'name'      => 'panorama',
                'icon'      => 'entera entera-panorama',
                'demo_link' => '#',
                'is_pro'    => true
            ],
            [
                'label'     => esc_html__( 'Image Hover Effect', 'enteraddons-pro' ),
                'name'      => 'image_hover_effect',
                'icon'      => 'entera entera-image-hover-effect',
                'demo_link' => '#',
                'is_pro'    => true
            ],
            [
                'label'     => esc_html__( 'Domain Search', 'enteraddons-pro' ),
                'name'      => 'domain_search',
                'icon'      => 'entera entera-domain-search',
                'demo_link' => '#',
                'is_pro'    => true
            ],
            [
                'label'     => esc_html__( 'Comparison Table', 'enteraddons-pro' ),
                'name'      => 'comparison_table',
                'icon'      => 'entera entera-comparison-table',
                'demo_link' => '#',
                'is_pro'    => true
            ],
            [
                'label'     => esc_html__( 'Modal Popup', 'enteraddons-pro' ),
                'name'      => 'modal_popup',
                'icon'      => 'entera entera-modal-popup',
                'demo_link' => '#',
                'is_pro'    => true
            ]

        ];

    }

}
