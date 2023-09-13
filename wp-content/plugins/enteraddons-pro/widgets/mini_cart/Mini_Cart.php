<?php
namespace EnteraddonsPro\Widgets\Mini_Cart;

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
 * Enteraddons elementor Mini Cart widget.
 *
 * @since 1.0
 */

class Mini_Cart extends Widget_Base {
    
	public function get_name() {
		return 'enteraddons-mini-cart';
	}

	public function get_title() {
		return esc_html__( 'Mini Cart', 'enteraddons-pro' );
	}

	public function get_icon() {
		return 'entera entera-mini-cart';
	}

	public function get_categories() {
		return ['enteraddons-header-footer-category'];
	}

	protected function register_controls() {


        // ----------------------------------------  Mini Cart button content ------------------------------
        $this->start_controls_section(
            'enteraddons_cart_button_content_settings',
            [
                'label' => esc_html__( 'Cart Button Content', 'enteraddons-pro' ),
            ]
        );

        $this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-shopping-cart',
					'library' => 'fa-solid',
				],
			]
		);

		$this->add_responsive_control(
			'logo_alignment',
			[
				'label' 		=> esc_html__( 'Alignment', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'options' 		=> [
					'left' 		=> [
						'title' 	=> esc_html__( 'Left', 'enteraddons-pro' ),
						'icon' 		=> 'fa fa-align-left',
					],
					'center' 	=> [
						'title' 	=> esc_html__( 'Center', 'enteraddons-pro' ),
						'icon' 		=> 'fa fa-align-center',
					],
					'right' 	=> [
						'title' 	=> esc_html__( 'Right', 'enteraddons-pro' ),
						'icon' 		=> 'fa fa-align-right',
					],
				],
				'selectors' 	=> [
					'{{WRAPPER}} .ea-cart-button-wrapper' => 'text-align: {{VALUE}} !important;',
				],
				'default'			=> 'right',
				'toggle' 		=> true,
			]
		);


        $this->end_controls_section();

		 // ----------------------------------------  Mini Cart Offcanvas Logo content ------------------------------

		$this->start_controls_section(
            'enteraddons_minicart_offcanvas_content_settings',
            [
                'label' => esc_html__( 'Minicart Offcanvas Content', 'enteraddons-pro' ),
            ]
        );
		$this->add_control(
			'title_icon',
			[
				'label' => esc_html__( 'Offcanvas Title Logo', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-shopping-cart',
					'library' => 'fa-solid',
				],
			]
		);

		$this->add_control(
			'Close_button_icon',
			[
				'label' => esc_html__( 'Close Button Icon', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-times',
					'library' => 'fa-solid',
				],
			]
		);

		$this->end_controls_section();

		/**
         * Style Tab
         * ------------------------------ Mini Cart Icon Style ------------------------------
         *
         */

        $this->start_controls_section(
			'icon_style_section',
			[
				'label' 	=> esc_html__( 'Icon Style', 'enteraddons-pro' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_responsive_control(
			'width',
			[
				'label' 		=> esc_html__( 'Width', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 	=> [
						'min' 	=> 0,
						'step' 	=> 1,
					],
                ],
                'selectors'  	=> [
                    '{{WRAPPER}} .ea-cart-button-wrapper a'  => 'width: {{SIZE}}{{UNIT}};'
                ]
			]
        );

        $this->add_responsive_control(
			'height',
			[
				'label' 		=> esc_html__( 'Height', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 	=> [
						'min' 	=> 0,
						'step' 	=> 1,
					],
                ],
                'selectors'  	=> [
                    '{{WRAPPER}} .ea-cart-button-wrapper a'  => 'height: {{SIZE}}{{UNIT}};'
                ]
			]
        );

        $this->add_responsive_control(
            'cart_button_icon_size',
            [
                'label' => esc_html__( 'Icon Size', 'enteraddons-pro' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
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
                    '{{WRAPPER}} .ea-cart-button-wrapper a' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
			'icon_style_color',
			[
				'label' 		=> esc_html__( 'Icon Color', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} a svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .ea-cart-button-wrapper a' => 'color: {{VALUE}}',
                ]
			]
        );

        $this->add_control(
			'icon_bg_color',
			[
				'label' 		=> esc_html__( 'Icon Background Color', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .ea-cart-button-wrapper a' => 'background-color: {{VALUE}}',
                ]
			]
        );

        $this->add_responsive_control(
			'icon_style_margin',
			[
				'label' 		=> esc_html__( 'Icon Margin', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .ea-cart-button-wrapper a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'icon_style_padding',
			[
				'label' 		=> esc_html__( 'Icon Padding', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .ea-cart-button-wrapper a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'border',
				'label' 		=> esc_html__( 'Icon Border', 'enteraddons-pro' ),
				'selector' 		=> '{{WRAPPER}} .ea-cart-button-wrapper a',
			]
        );

        $this->add_responsive_control(
			'border_radius',
			[
				'label' 		=> esc_html__( 'Border Radius', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .ea-cart-button-wrapper a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );

        $this->end_controls_section();

		/**
         * Style Tab
         * ------------------------------ Mini Cart Count Style ------------------------------
         *
         */ 

        $this->start_controls_section(
			'count_style_section',
			[
				'label' 	=> esc_html__( 'Count Style', 'enteraddons-pro' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'count_color',
			[
				'label' 		=> esc_html__( 'Count Color', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .cart-count' => 'color: {{VALUE}}',
                ]
			]
        );

        $this->add_control(
			'count_bg_color',
			[
				'label' 		=> esc_html__( 'Count Background Color', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .cart-count' => 'background-color: {{VALUE}}',
                ]
			]
        );


        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'count_border',
				'label' 		=> esc_html__( 'Count Border', 'enteraddons-pro' ),
				'selector' 		=> '{{WRAPPER}} .cart-count',
			]
        );

		$this->add_responsive_control(
			'count_width',
			[
				'label' 		=> esc_html__( 'Count Width', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 	=> [
						'min' 	=> 0,
						'max' 	=> 100,
						'step' 	=> 5,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 25,
				],
				'selectors' => [
					'{{WRAPPER}} .cart-count' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'count_height',
			[
				'label' 		=> esc_html__( 'Count Height', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 	=> [
						'min' 	=> 0,
						'max' 	=> 100,
						'step' 	=> 5,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 25,
				],
				'selectors' => [
					'{{WRAPPER}} .cart-count' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'count_font_size',
			[
				'label' 		=> esc_html__( 'Count Font Size', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 	=> [
						'min' 	=> 0,
						'max' 	=> 100,
						'step' 	=> 5,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 12,
				],
				'selectors' => [
					'{{WRAPPER}} .cart-count' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'count_left_position',
			[
				'label' 		=> esc_html__( 'Count Left Position', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ '%' ],
				'range' 		=> [
					'%' 	=> [
						'min' 	=> 0,
						'max' 	=> 100,
					],
				],
				'default' 	=> [
					'unit' 		=> '%',
					'size' 		=> 50,
				],
				'selectors' => [
					'{{WRAPPER}} .cart-count' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'count_top_position',
			[
				'label' 		=> esc_html__( 'Count Top Position', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 	=> [
						'min' 	=> -50,
						'max' 	=> 100,
						'step' 	=> 1,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> -7.5,
				],
				'selectors' => [
					'{{WRAPPER}} .cart-count' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);
       
        $this->end_controls_section();

		 /**
         * Style Tab
         * ------------------------------ Mini Cart Offcanvas Style ------------------------------
         *
         */

        $this->start_controls_section(
            'enteraddons_offcanvas_body_style_settings', [
                'label' => esc_html__( 'Mini Cart Offcanvas Style', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_responsive_control(
            'offcanvas_body_width',
            [
                'label' => esc_html__( 'Offcanvas Width', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .offcanvas-panel .panel' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

		$this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'offcanvas_body_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .offcanvas-panel .panel',
            ]
        );
            
        $this->add_responsive_control(
            'offcanvas_body_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .offcanvas-panel .panel' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'offcanvas_body_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .offcanvas-panel .panel' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'      => 'offcanvas_body_border',
                'label'     => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector'  => '{{WRAPPER}} .offcanvas-panel .panel',
            ]
        );
        $this->add_responsive_control(
            'offcanvas_body_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .offcanvas-panel .panel' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'offcanvas_body_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .offcanvas-panel .panel',
            ]
        ); 

        $this->end_controls_section();

		 /**
         * Style Tab
         * ------------------------------ Mini Cart Offcanvas Item  Style ------------------------------
         *
         */

		$this->start_controls_section(
            'enteraddons_mini_cart_item_style_settings', [
                'label' => esc_html__( 'Mini Cart Item Style', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_responsive_control(
            'mini_cart_min_width',
            [
                'label' => esc_html__( 'Min Width', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item a:nth-child(2)' => 'min-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

		$this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'mini_cart_item_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item',
            ]
        );
            
        $this->add_responsive_control(
            'mini_cart_item_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'mini_cart_item_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'      => 'mini_cart_item_border',
                'label'     => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector'  => '{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item',
            ]
        );
        $this->add_responsive_control(
            'mini_cart_item_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'mini_cart_item_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item',
            ]
        ); 

        $this->end_controls_section();

		 /**
         * Style Tab
         * ------------------------------ Mini Cart Offcanvas Title Style ------------------------------
         *
         */

        $this->start_controls_section(
            'enteraddons_offcanvas_title_style', [
                'label' => esc_html__( 'Mini Cart Offcanvas Title', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'offcanvas_title_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offcanvas-panel .panel .offcanvas-header .offcanvas-title h3' => 'color: {{VALUE}}',
                ],
            ]
        );
		$this->add_control(
            'offcanvas_title_hover_color',
            [
                'label' => esc_html__( 'Hover Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offcanvas-panel .panel .offcanvas-header .offcanvas-title:hover h3' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'offcanvas_title_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .offcanvas-panel .panel .offcanvas-header .offcanvas-title h3',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'offcanvas_title_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .offcanvas-panel .panel .offcanvas-header .offcanvas-title h3',
            ]
        );
        $this->add_responsive_control(
            'offcanvas_title_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .offcanvas-panel .panel .offcanvas-header .offcanvas-title h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'offcanvas_title_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .offcanvas-panel .panel .offcanvas-header .offcanvas-title h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

		 /**
         * Style Tab
         * ------------------------------ Mini Cart Title Logo Style Settings ------------------------------
         *
         */

        $this->start_controls_section(
            'enteraddons_mini_cart_logo_settings', [
                'label' => esc_html__( 'Offcanvas Logo Style', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs( 'tab_mini_cart_logo' );

        //  Controls tab For Normal
        $this->start_controls_tab(
            'mini_cart_logo_normal',
            [
                'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'mini_cart_logo_color',
            [
                'label' => esc_html__( 'Icon Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offcanvas-panel .panel .offcanvas-header .offcanvas-title i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'mini_cart_logo_size',
            [
                'label' => esc_html__( 'Icon Size', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .offcanvas-panel .panel .offcanvas-header .offcanvas-title i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'mini_cart_logo_width',
            [
                'label' => esc_html__( 'Icon Container Width', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .offcanvas-panel .panel .offcanvas-header .offcanvas-title' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'mini_cart_logo_height',
            [
                'label' => esc_html__( 'Icon Container Height', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .offcanvas-panel .panel .offcanvas-header .offcanvas-title' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'mini_cart_logo_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .offcanvas-panel .panel .offcanvas-header .offcanvas-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'mini_cart_logo_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .offcanvas-panel .panel .offcanvas-header .offcanvas-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'mini_cart_logo_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .offcanvas-panel .panel .offcanvas-header .offcanvas-title',
            ]
        );
        $this->add_responsive_control(
            'mini_cart_logo_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .offcanvas-panel .panel .offcanvas-header .offcanvas-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'mini_cart_logo_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .offcanvas-panel .panel .offcanvas-header .offcanvas-title',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'mini_cart_logo_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .offcanvas-panel .panel .offcanvas-header .offcanvas-title',
            ]
        );

        $this->end_controls_tab(); // End Controls tab

        //  Controls tab For Hover
        $this->start_controls_tab(
            'mini_cart_logo_hover',
            [
                'label' => esc_html__( 'Hover', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'mini_cart_logo_hover_color',
            [
                'label' => esc_html__( 'Hover Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offcanvas-panel .panel .offcanvas-header .offcanvas-title:hover i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab(); // End Controls tab

        $this->end_controls_tabs(); //  end controls tabs section

        $this->end_controls_section();

		 /**
         * Style Tab
         * ------------------------------ Mini Cart  Close Icon Style Settings ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_mini_cart_close_icon_settings', [
                'label' => esc_html__( 'Offcanvas Close Button', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'mini_cart_close_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offcanvas-panel .panel .offcanvas-header .btn_close i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'mini_cart_close_icon_size',
            [
                'label' => esc_html__( 'Icon Size', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .offcanvas-panel .panel .offcanvas-header .btn_close i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'mini_cart_close_icon_width',
            [
                'label' => esc_html__( 'Icon Container Width', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .offcanvas-panel .panel .offcanvas-header .btn_close' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'mini_cart_close_icon_height',
            [
                'label' => esc_html__( 'Icon Container Height', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .offcanvas-panel .panel .offcanvas-header .btn_close' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		$this->add_responsive_control(
			'mini_cart_close_icon_opacity',
			[
				'label' => esc_html__( 'Opacity', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1,
						'step' => .1,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .offcanvas-panel .panel .offcanvas-header .btn_close' => 'opacity: {{SIZE}}',
				],
			]
		);
        $this->add_responsive_control(
            'mini_cart_close_icon_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .offcanvas-panel .panel .offcanvas-header .btn_close' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'mini_cart_close_icon_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .offcanvas-panel .panel .offcanvas-header .btn_close' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'mini_cart_close_icon_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .offcanvas-panel .panel .offcanvas-header .btn_close',
            ]
        );
        $this->add_responsive_control(
            'mini_cart_close_icon_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .offcanvas-panel .panel .offcanvas-header .btn_close' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'mini_cart_close_icon_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .offcanvas-panel .panel .offcanvas-header .btn_close',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'mini_cart_close_icon_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .offcanvas-panel .panel .offcanvas-header .btn_close',
            ]
        );

        $this->end_controls_section();

		//------------------------------ Mini Cart Image Style ------------------------------

        $this->start_controls_section(
            'enteraddons_mini_cart_image_style', [
                'label' => esc_html__( 'Image Style', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
      
        $this->add_responsive_control(
            'img_width',
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
                    '{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'img_height',
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
                    '{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );   
        $this->add_responsive_control(
            'img_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'img_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'img_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item img',
            ]
        );
        $this->add_responsive_control(
            'img_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'img_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item img',
            ]
        );
        $this->end_controls_section();

		/**
         * Style Tab
         * ------------------------------  Mini Cart Item Remove Icon Style ------------------------------
         *
         */

        $this->start_controls_section(
			'remove_icon_style_section',
			[
				'label' 	=> esc_html__( 'Item Remove Button Style', 'enteraddons-pro' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_responsive_control(
			'remove_icon_width',
			[
				'label' 		=> esc_html__( 'Width', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 	=> [
						'min' 	=> 0,
						'step' 	=> 1,
					],
                ],
                'selectors'  	=> [
                    '{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item .remove'  => 'width: {{SIZE}}{{UNIT}};'
                ]
			]
        );

        $this->add_responsive_control(
			'remove_icon_height',
			[
				'label' 		=> esc_html__( 'Height', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 	=> [
						'min' 	=> 0,
						'step' 	=> 1,
					],
                ],
                'selectors'  	=> [
                    '{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item .remove'  => 'height: {{SIZE}}{{UNIT}};'
                ]
			]
        );

		$this->add_responsive_control(
            'remove_icon_size',
            [
                'label' => esc_html__( 'Icon Size', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item .remove' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
			'remove_icon_style_color',
			[
				'label' 		=> esc_html__( 'Icon Color', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} a svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item .remove' => 'color: {{VALUE}}',
                ]
			]
        );

        $this->add_control(
			'remove_icon_bg_color',
			[
				'label' 		=> esc_html__( 'Icon Background Color', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item .remove' => 'background-color: {{VALUE}}',
                ]
			]
        );

        $this->add_responsive_control(
			'remove_icon_style_margin',
			[
				'label' 		=> esc_html__( 'Icon Margin', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item .remove' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'remove_icon_style_padding',
			[
				'label' 		=> esc_html__( 'Icon Padding', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item .remove' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'remove_border',
				'label' 		=> esc_html__( 'Icon Border', 'enteraddons-pro' ),
				'selector' 		=> '{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item .remove',
			]
        );

		$this->add_responsive_control(
			'remove_icon_border_radius',
			[
				'label' 		=> esc_html__( 'Border Radius', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item .remove' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );

        $this->end_controls_section();

		/**
         * Style Tab
         * ------------------------------ Mini Cart Item Title Style ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_offcanvas_item_title_style', [
                'label' => esc_html__( 'Mini Cart Item Title', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'offcanvas_item_title_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item a' => 'color: {{VALUE}}',
                ],
            ]
        );
		$this->add_control(
            'offcanvas_item_title_hover_color',
            [
                'label' => esc_html__( 'Hover Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item a:hover' => 'color: {{VALUE}}',
                ],
            ]
			);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'offcanvas_item_title_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item a',
            ]
        );
        $this->add_responsive_control(
            'offcanvas_item_title_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'offcanvas_item_title_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

		 /**
         * Style Tab
         * ------------------------------ Mini Cart Offcanvas Quantity Style ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_offcanvas_quantity_style', [
                'label' => esc_html__( 'Mini Cart Quantity Style', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'offcanvas_quantity_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item .quantity' => 'color: {{VALUE}}',
                ],
            ]
        );
		$this->add_control(
            'offcanvas_quantity_hover_color',
            [
                'label' => esc_html__( 'Hover Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item .quantity:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'offcanvas_quantity_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item .quantity',
            ]
        );
        $this->add_responsive_control(
            'offcanvas_quantity_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item .quantity' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'offcanvas_quantity_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart .mini_cart_item .quantity' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

		/**
         * Style Tab
         * ------------------------------ Offcanvas View Cart Button Button Style ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_button_content_style_settings', [
                'label' => esc_html__( ' View Cart Button Style', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'btn_width',
            [
                'label' => esc_html__( 'Button Width', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .woocommerce-mini-cart__buttons .button' => 'width: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_height',
            [
                'label' => esc_html__( 'Button Height', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .woocommerce-mini-cart__buttons .button' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'btn_content_typography',
				'selector' => '{{WRAPPER}} .woocommerce-mini-cart__buttons .button',
			]
		);
        $this->start_controls_tabs( 'tab_button' );


        //  Controls tab For Normal
        $this->start_controls_tab(
            'cart_button_normal',
            [
                'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
            ]
        );
		$this->add_control(
			'cart_button_color',
			[
				'label' => esc_html__( 'Text Color', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-mini-cart__buttons .button' => 'color: {{VALUE}}',
				],
			]
		);

            $this->add_responsive_control(
                'cart_button_margin',
                [
                    'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .woocommerce-mini-cart__buttons .button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'cart_button_padding',
                [
                    'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .woocommerce-mini-cart__buttons .button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name'      => 'cart_button_border',
                    'label'     => esc_html__( 'Border', 'enteraddons-pro' ),
                    'selector'  => '{{WRAPPER}} .woocommerce-mini-cart__buttons .button',
                ]
            );
            $this->add_responsive_control(
                'cart_button_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .woocommerce-mini-cart__buttons .button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'cart_button_shadow',
                    'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                    'selector' => '{{WRAPPER}} .woocommerce-mini-cart__buttons .button',
                ]
            ); 
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'cart_button_background',
                    'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .woocommerce-mini-cart__buttons .button',
                ]
            );

        $this->end_controls_tab(); // End Controls tab

        //  Controls tab For Hover
        $this->start_controls_tab(
            'cart_button_hover',
            [
                'label' => esc_html__( 'Hover', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'cart_button_hover_color',
            [
                'label' => esc_html__( 'Text Hover Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart__buttons .button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'      => 'cart_button_hover_border',
                'label'     => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector'  => '{{WRAPPER}} .woocommerce-mini-cart__buttons .button:hover',
            ]
        );
        $this->add_responsive_control(
            'cart_button_hover_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart__buttons .button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'cart_button_hover_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .woocommerce-mini-cart__buttons .button:hover',
            ]
        ); 
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'cart_button_hover_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .woocommerce-mini-cart__buttons .button:hover',
            ]
        );

        $this->end_controls_tab(); // End Controls tab

        $this->end_controls_tabs(); //  end controls tabs section

        $this->end_controls_section();	

		/**
         * Style Tab
         * ------------------------------ Offcanvas Checkout Button Button Style ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_checkout_button_content_style_settings', [
                'label' => esc_html__( 'CheckOut Button Style', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'checkout_btn_width',
            [
                'label' => esc_html__( 'Button Width', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .woocommerce-mini-cart__buttons .button.checkout' => 'width: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'checkout_height',
            [
                'label' => esc_html__( 'Button Height', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .woocommerce-mini-cart__buttons .button.checkout' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'checkout_btn_content_typography',
				'selector' => '{{WRAPPER}} .woocommerce-mini-cart__buttons .button.checkout',
			]
		);
        $this->start_controls_tabs( 'tab_checkout_button' );


        //  Controls tab For Normal
        $this->start_controls_tab(
            'checkout_cart_button_normal',
            [
                'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
            ]
        );
		$this->add_control(
			'checkout_cart_button_color',
			[
				'label' => esc_html__( 'Text Color', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-mini-cart__buttons .button.checkout' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_responsive_control(
            'checkout_cart_button_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart__buttons .button.checkout' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'checkout_cart_button_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart__buttons .button.checkout' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
        \Elementor\Group_Control_Border::get_type(),
            [
                'name'      => 'checkout_cart_button_border',
                'label'     => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector'  => '{{WRAPPER}} .woocommerce-mini-cart__buttons .button.checkout',
            ]
        );
        $this->add_responsive_control(
            'checkout_cart_button_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart__buttons .button.checkout' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'checkout_cart_button_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .woocommerce-mini-cart__buttons .button.checkout',
            ]
        ); 
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'checkout_cart_button_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .woocommerce-mini-cart__buttons .button.checkout',
            ]
        );

        $this->end_controls_tab(); // End Controls tab

        //  Controls tab For Hover
        $this->start_controls_tab(
            'checkout_cart_button_hover',
            [
                'label' => esc_html__( 'Hover', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'checkout_cart_button_hover_color',
            [
                'label' => esc_html__( 'Text Hover Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart__buttons .button.checkout:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'      => 'checkout_cart_button_hover_border',
                'label'     => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector'  => '{{WRAPPER}} .woocommerce-mini-cart__buttons .button.checkout:hover',
            ]
        );
        $this->add_responsive_control(
            'checkout_cart_button_hover_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-mini-cart__buttons .button.checkout:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'checkout_cart_button_hover_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .woocommerce-mini-cart__buttons .button.checkout:hover',
            ]
        ); 
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'checkout_cart_button_hover_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .woocommerce-mini-cart__buttons .button.checkout:hover',
            ]
        );

        $this->end_controls_tab(); // End Controls tab

        $this->end_controls_tabs(); //  end controls tabs section

        $this->end_controls_section();
	}

	protected function render() {

		if( \Enteraddons\Classes\Helper::is_woo_activated() ) {
	        // get settings
	        $settings = $this->get_settings_for_display();

	        // Tema template render
	        $obj = new Mini_Cart_Template();
	        $obj::setDisplaySettings( $settings );
	        $obj->renderTemplate();
    	} else {
    		echo '<p>'.esc_html__( 'Please install and active WooCommerce plugin', 'enteraddons-pro' ).'</p>';
    	}

    }
    
    public function get_script_depends() {
        return [ 'enteraddons-pro-main','perfect-scrollbar'];
    }

    public function get_style_depends() {
        return [ 'enteraddons-global-style' ];
    }


}
