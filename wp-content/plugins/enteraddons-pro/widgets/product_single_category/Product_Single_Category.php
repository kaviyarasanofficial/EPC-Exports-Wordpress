<?php
namespace EnteraddonsPro\Widgets\Product_Single_Category;

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
 *
 * @since 1.0
 */

class Product_Single_Category extends Widget_Base {

	public function get_name() {
		return 'enteraddons-product-single-category';
	}

	public function get_title() {
		return esc_html__( 'Product Single Category', 'enteraddons-pro' );
	}

	public function get_icon() {
		return 'entera entera-single-category';
	}

	public function get_categories() {
		return ['enteraddons-pro-elements-category'];
	}

	protected function register_controls() {

        // ----------------------------------------  Product grid content ------------------------------
        $this->start_controls_section(
            'enteraddons_product_category_grid_content',
            [
                'label' => esc_html__( 'Content Settings', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'show_product_count',
            [
                'label' => esc_html__( 'Show Product Count', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'enteraddons-pro' ),
                'label_off' => esc_html__( 'No', 'enteraddons-pro' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'product_count_text',
            [
                'label' => esc_html__( 'Product Count Text', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Product Available'
            ]
        );
        $this->add_control(
            'product_cat',
            [
                'label' => esc_html__( 'Product Category', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'label_block' => false,
                'options' => \EnteraddonsPro\Inc\Helper::get_wc_cat()
            ]
        );

        $this->end_controls_section(); // End content

        /**
         * Style Tab
         * ------------------------------ Item Wrapper Settings ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_product_category_item_wrapper_settings', [
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
                        '{{WRAPPER}} .ea-wc-product-cat-single-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .ea-wc-product-cat-single-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'item_wrapper_border',
                    'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                    'selector' => '{{WRAPPER}} .ea-wc-product-cat-single-item',
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
                        '{{WRAPPER}} .ea-wc-product-cat-single-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'item_wrapper_shadow',
                    'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                    'selector' => '{{WRAPPER}} .ea-wc-product-cat-single-item',
                ]
            ); 
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'item_background',
                    'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .ea-wc-product-cat-single-item',
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
                    'selector' => '{{WRAPPER}} .ea-wc-product-cat-single-item:hover',
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
                        '{{WRAPPER}} .ea-wc-product-cat-single-item:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'item_wrapper_hover__shadow',
                    'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                    'selector' => '{{WRAPPER}} .ea-wc-product-cat-single-item:hover',
                ]
            ); 
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'item_hover_background',
                    'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .ea-wc-product-cat-single-item:hover',
                ]
            );
            $this->end_controls_tab(); // End Controls tab

            $this->end_controls_tabs(); //  end controls tabs section

        $this->end_controls_section();
        /**
         * Style Tab
         * ------------------------------  Item Image Settings ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_product_categories_item_image_settings', [
                'label' => esc_html__( 'Item Image Settings', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
                'item_img_width',
                [
                    'label' => esc_html__( 'Image Width', 'enteraddons-pro' ),
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
                        'size' => '',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ea-wc-product-cat-single-item img' => 'width: {{SIZE}}{{UNIT}};max-width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'item_img_height',
                [
                    'label' => esc_html__( 'Image Height', 'enteraddons-pro' ),
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
                        'size' => '',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ea-wc-product-cat-single-item img' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
            'item_image_alignment',
            [
                'label' => esc_html__( 'Image Alignment', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .ea-wc-product-cat-single-item' => 'text-align: {{VALUE}} !important;',
                ],
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
                        '{{WRAPPER}} .ea-wc-product-cat-single-item img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .ea-wc-product-cat-single-item img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'item_img_border',
                    'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                    'selector' => '{{WRAPPER}} .ea-wc-product-cat-single-item img',
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
                        '{{WRAPPER}} .ea-wc-product-cat-single-item img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'item_img_shadow',
                    'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                    'selector' => '{{WRAPPER}} .ea-wc-product-cat-single-item img',
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
                    'selector' => '{{WRAPPER}} .ea-wc-product-cat-single-item img:hover',
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
                        '{{WRAPPER}} .ea-wc-product-cat-single-item img:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'item_img_hover_shadow',
                    'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                    'selector' => '{{WRAPPER}} .ea-wc-product-cat-single-item img:hover',
                ]
            );
            $this->end_controls_tab(); // End Controls tab

            $this->end_controls_tabs(); //  end controls tabs section

        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Product Categories Label Settings ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_product_categories_category_label_wrapper_settings', [
                'label' => esc_html__( 'Category Label Wrapper', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'category_label_position_type',
            [
                'label' => esc_html__( 'Position Type', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'label_block' => false,
                'default' => 'pcat-non-floating-style',
                'options' => [
                    'pcat-non-floating-style' => esc_html__( 'Relative', 'enteraddons-pro' ),
                    'pcat-floating-style' => esc_html__( 'Absolute', 'enteraddons-pro' )
                ]
            ]
        );
        $this->add_responsive_control(
            'label_wrap_width',
            [
                'label' => esc_html__( 'Label Width', 'enteraddons-pro' ),
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
                    'size' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ea-cat-info' => 'width: {{SIZE}}{{UNIT}};max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'label_wrap_height',
            [
                'label' => esc_html__( 'Label Height', 'enteraddons-pro' ),
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
                    'size' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ea-cat-info' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'label_bottom_top_position',
            [
                'label' => esc_html__( 'Label Top Bottom Position', 'enteraddons-pro' ),
                'type' => Controls_Manager::SLIDER,
                'condition' => [ 'category_label_position_type' => 'pcat-floating-style' ],
                'size_units' => [ 'px','%' ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .pcat-floating-style .ea-cat-info' => 'top: {{SIZE}}{{UNIT}};bottom: auto;',
                ],
            ]
        );
        $this->add_responsive_control(
            'label_left_right_position',
            [
                'label' => esc_html__( 'Label Left Right Position', 'enteraddons-pro' ),
                'type' => Controls_Manager::SLIDER,
                'condition' => [ 'category_label_position_type' => 'pcat-floating-style' ],
                'size_units' => [ 'px','%' ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .pcat-floating-style .ea-cat-info' => 'left: {{SIZE}}{{UNIT}};right:auto;',
                ],
            ]
        );
        $this->add_responsive_control(
            'label_wrap_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-cat-info' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'label_wrap_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-cat-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'label_wrap_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-cat-info' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'      => 'label_wrap_border',
                'label'     => esc_html__( 'Title Wrapper Border', 'enteraddons-pro' ),
                'selector'  => '{{WRAPPER}} .ea-cat-info',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'label_wrap_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-cat-info',
            ]
        ); 
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'label_wrap_bg_color',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .ea-cat-info',
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------  Item Category Text Settings ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_product_categories_cat_text_settings', [
                'label' => esc_html__( 'Category Label Text', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'category_label_layout',
            [
                'label' => esc_html__( 'Layout', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'row' => [
                        'title' => esc_html__( 'Row Layout', 'enteraddons-pro' ),
                        'icon' => 'eicon-ellipsis-h',
                    ],
                    'column' => [
                        'title' => esc_html__( 'Column Layout', 'enteraddons-pro' ),
                        'icon' => 'eicon-ellipsis-v',
                    ]
                ],
                'default' => 'column',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .ea-cat-info h3' => 'flex-direction: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'category_label_alignment',
            [
                'label' => esc_html__( 'Alignment', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .ea-cat-info h3' => 'text-align: {{VALUE}} !important;justify-content: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'category_text_color',
            [
                'label' => esc_html__( 'Title Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-cat-info h3 a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'category_text_hover_color',
            [
                'label' => esc_html__( 'Title Hover Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-cat-info h3 a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'category_label_text_typography',
                'label' => esc_html__( 'Text Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-cat-info h3 a',
            ]
        );
        $this->add_control(
            'category_count_text_color',
            [
                'label' => esc_html__( 'Count Text Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-cat-info h3 span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'category_count_typography',
                'label' => esc_html__( 'Count Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-cat-info h3 span',
            ]
        );
            
        $this->end_controls_section();
		

	}

	protected function render() {
        // get settings
        $settings = $this->get_settings_for_display();
        // WooCommerce Product template render
        if( \Enteraddons\Classes\Helper::is_woo_activated() ) {
            $obj = new Product_Single_Category_Template();
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
