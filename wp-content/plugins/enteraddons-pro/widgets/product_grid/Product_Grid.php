<?php
namespace EnteraddonsPro\Widgets\Product_Grid;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 *
 * Enteraddons elementor product grid widget.
 *
 * @since 1.0
 */

class Product_Grid extends Widget_Base {

	public function get_name() {
		return 'enteraddons-product-grid';
	}

	public function get_title() {
		return esc_html__( 'Product Grid', 'enteraddons-pro' );
	}

	public function get_icon() {
		return 'entera entera-product-grid';
	}

	public function get_categories() {
		return ['enteraddons-pro-elements-category'];
	}

	protected function register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Product Grid content ------------------------------
        $this->start_controls_section(
            'enteraddons_product_grid_content',
            [
                'label' => esc_html__( 'Product Grid Content', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'product_layout',
            [
                'label' => esc_html__( 'Layout', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'label_block' => false,
                'default' => 'product-vertical',
                'options' => [
                    'product-vertical'   => esc_html__( 'Vertical', 'enteraddons-pro' ),
                    'product-horizontal' => esc_html__( 'Horizontal', 'enteraddons-pro' )
                ]
            ]
        );
        $this->add_control(
            'grid_column',
            [
                'label' => esc_html__( 'Column', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'label_block' => false,
                'default' => '3',
                'options' => [
                    '1' => esc_html__( 'Column 1', 'enteraddons-pro' ),
                    '2' => esc_html__( 'Column 2', 'enteraddons-pro' ),
                    '3' => esc_html__( 'Column 3', 'enteraddons-pro' ),
                    '4' => esc_html__( 'Column 4', 'enteraddons-pro' )
                ]
            ]
        );
        $this->add_control(
            'product_limit',
            [
                'label' => esc_html__( 'Product Limit', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'label_block' => false,
                'default' => 10
            ]
        );
        $this->add_control(
            'product_order',
            [
                'label' => esc_html__( 'Order', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'label_block' => false,
                'default' => 'DESC',
                'options' => [
                    'ASC' => esc_html__( 'ASC', 'enteraddons-pro' ),
                    'DESC' => esc_html__( 'DESC', 'enteraddons-pro' ),
                ]
            ]
        );
        
        $this->add_control(
            'product_type',
            [
                'label' => esc_html__( 'Product Type', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'label_block' => false,
                'default' => 'recent_product',
                'options' => [
                    'recent_product' => esc_html__( 'Recent Product', 'enteraddons-pro' ),
                    'featured_product' => esc_html__( 'Featured', 'enteraddons-pro' ),
                    'on_sale' => esc_html__( 'On Sale', 'enteraddons-pro' )
                ]
            ]
        );
        $this->end_controls_section(); // End content

        // ----------------------------------------  Product Grid content ------------------------------
        $this->start_controls_section(
            'enteraddons_product_grid_cartbutton_content',
            [
                'label' => esc_html__( 'Cart Button Text/Icon', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'simple_product_cart_btn_text',
            [
                'label' => esc_html__( 'Simple Product Add To Cart Button Text', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Add To Cart'
            ]
        );
        $this->add_control(
            'variable_product_cart_btn_text',
            [
                'label' => esc_html__( 'Variable Product Add To Cart Button Text', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Select Options'
            ]
        );
        
        $this->end_controls_section(); // End content

        /**
         * Style Tab
         * ------------------------------ Product Grid wrapper style Settings ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_product_grid_wrapper_style_settings', [
                'label' => esc_html__( 'Content Wrapper Style Settings', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'content_wrapper_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .entera-product-grid-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'content_wrapper_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .entera-product-grid-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'content_wrapper_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .entera-product-grid-wrap',
            ]
        );
        $this->add_responsive_control(
            'content_wrapper_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .entera-product-grid-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'content_wrapper_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .entera-product-grid-wrap',
            ]
        ); 
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'content_wrapper_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .entera-product-grid-wrap',
            ]
        );
        $this->end_controls_section();

        
        /**
         * Style Tab
         * ------------------------------ Item Wrapper Settings ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_product_carousel_item_wrapper_settings', [
                'label' => esc_html__( 'Item Wrapper Settings', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            // start controls tabs

            $this->start_controls_tabs( 'item_wrap_tabs' );

            //  Controls tab For Normal
            $this->start_controls_tab(
                'item_wrap_normal',
                [
                    'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
                ]
            );

            $this->add_responsive_control(
                'item_wrapper_margin',
                [
                    'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ea-product-grid-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'item_wrapper_padding',
                [
                    'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ea-product-grid-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'item_wrapper_border',
                    'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                    'selector' => '{{WRAPPER}} .ea-product-grid-item',
                ]
            );
            $this->add_responsive_control(
                'item_wrapper_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ea-product-grid-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'item_wrapper_shadow',
                    'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                    'selector' => '{{WRAPPER}} .ea-product-grid-item',
                ]
            ); 
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'item_background',
                    'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .ea-product-grid-item',
                ]
            );

            $this->end_controls_tab(); // End Controls tab

            //  Controls tab For Hover
            $this->start_controls_tab(
                'item_wrap_hover',
                [
                    'label' => esc_html__( 'Hover', 'enteraddons-pro' ),
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'item_wrapper_hover_border',
                    'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                    'selector' => '{{WRAPPER}} .ea-product-grid-item:hover',
                ]
            );
            $this->add_responsive_control(
                'item_wrapper_hover_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ea-product-grid-item:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'item_wrapper_hover_shadow',
                    'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                    'selector' => '{{WRAPPER}} .ea-product-grid-item:hover',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'item_hover_background',
                    'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .ea-product-grid-item:hover',
                ]
            );
            $this->end_controls_tab(); // End Controls tab

            $this->end_controls_tabs(); //  end controls tabs section

        $this->end_controls_section();
        /**
         * Style Tab
         * ------------------------------  Item Thumbnail Settings ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_product_carousel_item_image_settings', [
                'label' => esc_html__( 'Item Thumbnail Settings', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
                'thumbnail_wrapper_margin',
                [
                    'label' => esc_html__( 'Thumbnail Wrapper Margin', 'enteraddons-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ea-grid-product-thumbnail' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'thumbnail_wrapper_padding',
                [
                    'label' => esc_html__( 'Thumbnail Wrapper Padding', 'enteraddons-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ea-grid-product-thumbnail' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'item_image_width',
                [
                    'label' => esc_html__( 'Thumbnail Width', 'enteraddons-pro' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => '100',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ea-grid-product-thumbnail img' => 'width: {{SIZE}}{{UNIT}};'
                    ],
                ]
            );
            $this->add_responsive_control(
                'item_image_max_width',
                [
                    'label' => esc_html__( 'Thumbnail Max Width', 'enteraddons-pro' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => '100',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ea-grid-product-thumbnail img' => 'max-width: {{SIZE}}{{UNIT}};'
                    ],
                ]
            );
            $this->add_responsive_control(
                'item_image_height',
                [
                    'label' => esc_html__( 'Thumbnail Height', 'enteraddons-pro' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => '100',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ea-grid-product-thumbnail img' => 'max-width: {{SIZE}}{{UNIT}};'
                    ],
                ]
            );
            $this->add_responsive_control(
                'item_img_alignment',
                [
                    'label' => esc_html__( 'Content Alignment', 'enteraddons-pro' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => esc_html__( 'Left', 'enteraddons-pro' ),
                            'icon' => 'eicon-h-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Center', 'enteraddons-pro' ),
                            'icon' => 'eicon-h-align-center',
                        ],
                        'right' => [
                            'title' => esc_html__( 'Right', 'enteraddons-pro' ),
                            'icon' => 'eicon-h-align-right',
                        ],
                    ],
                    'default' => 'center',
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .ea-grid-product-thumbnail' => 'display: flex;justify-content: {{VALUE}} !important',
                    ],
                ]
            );

            // start controls tabs
            $this->start_controls_tabs( 'item_img_tabs' );
            //  Controls tab For Normal
            $this->start_controls_tab(
                'item_img_normal',
                [
                    'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
                ]
            );

            $this->add_responsive_control(
                'item_img_margin',
                [
                    'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ea-grid-product-thumbnail img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'item_img_padding',
                [
                    'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ea-grid-product-thumbnail img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'item_img_border',
                    'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                    'selector' => '{{WRAPPER}} .ea-grid-product-thumbnail img',
                ]
            );
            $this->add_responsive_control(
                'item_img_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ea-grid-product-thumbnail img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'item_img_shadow',
                    'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                    'selector' => '{{WRAPPER}} .ea-grid-product-thumbnail img',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'item_img_background',
                    'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .ea-grid-product-thumbnail img',
                ]
            );
            $this->end_controls_tab(); // End Controls tab

            //  Controls tab For Hover
            $this->start_controls_tab(
                'item_img_hover',
                [
                    'label' => esc_html__( 'Hover', 'enteraddons-pro' ),
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'item_img_hover_border',
                    'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                    'selector' => '{{WRAPPER}} .ea-grid-product-thumbnail:hover img',
                ]
            );
            $this->add_responsive_control(
                'item_img_hover_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ea-grid-product-thumbnail:hover img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'item_img_hover_shadow',
                    'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                    'selector' => '{{WRAPPER}} .ea-grid-product-thumbnail:hover img',
                ]
            );
            $this->end_controls_tab(); // End Controls tab

            $this->end_controls_tabs(); //  end controls tabs section

        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------  Item Content Wrap Settings ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_product_item_content_wrap_settings', [
                'label' => esc_html__( 'Item Content Wrapper Settings', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'item_content_alignment',
            [
                'label' => esc_html__( 'Content Alignment', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'enteraddons-pro' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'enteraddons-pro' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'enteraddons-pro' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .ea-grid-product-summary' => 'text-align: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_responsive_control(
            'item_content_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-grid-product-summary' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'item_content_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-grid-product-summary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'item_content_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-grid-product-summary',
            ]
        );
        $this->add_responsive_control(
            'item_content_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-grid-product-summary' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'item_content_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-grid-product-summary',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'item_content_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .ea-grid-product-summary',
            ]
        );
        $this->end_controls_section();
        /**
         * Style Tab
         * ------------------------------  Item Title and Category Settings ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_product_grid_item_title_settings', [
                'label' => esc_html__( 'Item Title Settings', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            // start controls tabs
            $this->start_controls_tabs( 'item_title_cat_tabs' );
            //  Controls tab For Normal
            $this->start_controls_tab(
                'item_title_cat_normal',
                [
                    'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
                ]
            );
            $this->add_control(
            'title_settings',
            [
                'label' => esc_html__( 'Title Settings', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
            );
            $this->add_control(
            'title_color',
                [
                    'label' => esc_html__( 'Title Color', 'enteraddons-pro' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ea-grid-product-summary .product-title a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                    'selector' => '{{WRAPPER}} .ea-grid-product-summary .product-title a',
                ]
            );
            $this->add_responsive_control(
                'item_title_margin',
                [
                    'label' => esc_html__( 'Title Margin', 'enteraddons-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ea-grid-product-summary .product-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'item_title_padding',
                [
                    'label' => esc_html__( 'Title Padding', 'enteraddons-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ea-grid-product-summary .product-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'item_title_border',
                    'label' => esc_html__( 'Title Border', 'enteraddons-pro' ),
                    'selector' => '{{WRAPPER}} .ea-grid-product-summary .product-title',
                ]
            );
            
            $this->end_controls_tab(); // End Controls tab

            //  Controls tab For Hover
            $this->start_controls_tab(
                'item_title_cat_hover',
                [
                    'label' => esc_html__( 'Hover', 'enteraddons-pro' ),
                ]
            );
            
            $this->add_control(
            'title_hover_settings',
            [
                'label' => esc_html__( 'Title Hover Settings', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
            );
            $this->add_control(
            'title_hover_color',
                [
                    'label' => esc_html__( 'Title Color', 'enteraddons-pro' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ea-grid-product-summary .product-title a:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->end_controls_tab(); // End Controls tab

            $this->end_controls_tabs(); //  end controls tabs section
            
        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------  Item Price and Rating Settings ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_product_grid_item_price_rating_settings', [
                'label' => esc_html__( 'Item Price and Rating Settings', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            
            $this->add_responsive_control(
                'item_price_rating_position_alignment',
                [
                    'label' => esc_html__( 'Price Rating Position', 'enteraddons-pro' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'flex-start' => [
                            'title' => esc_html__( 'Left', 'enteraddons-pro' ),
                            'icon' => 'eicon-h-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Center', 'enteraddons-pro' ),
                            'icon' => 'eicon-h-align-center',
                        ],
                        'space-between' => [
                            'title' => esc_html__( 'Space Between', 'enteraddons-pro' ),
                            'icon' => 'eicon-h-align-stretch',
                        ],
                        'flex-end' => [
                            'title' => esc_html__( 'Right', 'enteraddons-pro' ),
                            'icon' => 'eicon-h-align-right',
                        ],
                    ],
                    'default' => 'center',
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .price-rating-area' => 'display: flex;align-items: center;justify-content: {{VALUE}} !important;',
                    ],
                ]
            );
            $this->add_responsive_control(
                'item_price_rating_margin',
                [
                    'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .price-rating-area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'item_price_rating_padding',
                [
                    'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .price-rating-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'item_price_rating_border',
                    'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                    'selector' => '{{WRAPPER}} .price-rating-area',
                ]
            );
            $this->add_responsive_control(
                'item_price_rating_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .price-rating-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'item_price_rating_background',
                    'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .price-rating-area',
                ]
            );
            // start controls tabs
            $this->start_controls_tabs( 'item_price_rating_tabs' );
            //  Controls tab For Price
            $this->start_controls_tab(
                'item_price_normal',
                [
                    'label' => esc_html__( 'Price', 'enteraddons-pro' ),
                ]
            );
            $this->add_control(
            'price_color',
                [
                    'label' => esc_html__( 'Price Color', 'enteraddons-pro' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ea-product-grid-price' => 'color: {{VALUE}}',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'price_typography',
                    'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                    'selector' => '{{WRAPPER}} .ea-product-grid-price',
                ]
            );
            $this->add_control(
            'price_del_color',
                [
                    'label' => esc_html__( 'Del Price Color', 'enteraddons-pro' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ea-product-grid-price del' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'price_del_typography',
                    'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                    'selector' => '{{WRAPPER}} .ea-product-grid-price del',
                ]
            );
            
            $this->end_controls_tab(); // End Controls tab

            //  Controls tab For Hover
            $this->start_controls_tab(
                'item_ratings',
                [
                    'label' => esc_html__( 'Rating', 'enteraddons-pro' ),
                ]
            );
            
            $this->add_control(
            'rating_color',
                [
                    'label' => esc_html__( 'Rating Color', 'enteraddons-pro' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .star-rating i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_responsive_control(
            'icon_size',
            [
                'label' => esc_html__( 'Size', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .star-rating i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
            );
            $this->add_responsive_control(
                'icon_rating_margin',
                [
                    'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .star-rating i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab(); // End Controls tab

            $this->end_controls_tabs(); //  end controls tabs section
            
        $this->end_controls_section();
        /**
         * Style Tab
         * ------------------------------  Item Content Settings ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_product_grid_item_cart_button_settings', [
                'label' => esc_html__( 'Item Cart Button Settings', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'item_cart_btn_text_typography',
                'label' => esc_html__( 'Text Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .product-button-area a',
            ]
        );
        $this->add_responsive_control(
            'item_cart_btn_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .product-button-area a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'item_cart_btn_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .product-button-area a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // start controls tabs
        $this->start_controls_tabs( 'item_cart_btn_tabs' );
        //  Controls tab For
        $this->start_controls_tab(
            'item_cart_btn_normal',
            [
                'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'item_cart_btn_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .product-button-area a',
            ]
        );
        $this->add_responsive_control(
            'item_cart_btn_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .product-button-area a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_control(
            'item_cart_btn_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-button-area a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'item_cart_btn_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .product-button-area a',
            ]
        );

        $this->end_controls_tab(); // End Controls tab

        //  Controls tab For Hover
        $this->start_controls_tab(
            'item_cart_btn_hover',
            [
                'label' => esc_html__( 'Hover', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'item_cart_btn_hover_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-button-area a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'item_cart_btn_hover_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .product-button-area a:hover',
            ]
        );
        $this->end_controls_tab(); // End Controls tab
        $this->end_controls_tabs(); //  end controls tabs section

        $this->end_controls_section();
        
	}

	protected function render() {
        // get settings
        $settings = $this->get_settings_for_display();
        // WooCommerce Product template render
        if( \Enteraddons\Classes\Helper::is_woo_activated() ) {
            $obj = new Product_Grid_Template();
            $obj::setDisplaySettings( $settings );
            $obj->renderTemplate();
        } else {
            esc_html_e( 'Please install and activate the WooCommerce plugin.', 'enteraddons-pro' );
        }
    }
	
    public function get_style_depends() {
        return [ 'enteraddons-global-style' ];
    }

}
