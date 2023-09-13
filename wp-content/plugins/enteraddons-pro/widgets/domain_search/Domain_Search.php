<?php
namespace EnteraddonsPro\Widgets\Domain_Search;

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
 * Enteraddons elementor Domain Search widget.
 *
 * @since 1.0
 */

class Domain_Search extends Widget_Base {
    
	public function get_name() {
		return 'enteraddons-domain-search';
	}

	public function get_title() {
		return esc_html__( 'Domain Search', 'enteraddons-pro' );
	}

	public function get_icon() {
		return 'entera entera-domain-search';
	}

	public function get_categories() {
		return ['enteraddons-pro-elements-category'];
	}

	protected function register_controls() {

        // ----------------------------------------  Domain Search Content Template 1 ------------------------------
        $this->start_controls_section(
            'enteraddons_domain_search_content_settings',
            [
                'label' => esc_html__( 'Domain Search Content', 'enteraddons-pro' ),
            ]
        );
		$this->add_control(
			'domain_temp_layout', [
				'label' => esc_html__( 'Select Style', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1' => esc_html__( 'Style 1', 'enteraddons-pro' ),
					'2' => esc_html__( 'Style 2', 'enteraddons-pro' )
				],
				
			]
		);

		//Template 1 
        $this->add_control(
			'placeholder_text',
			[
				'label' => esc_html__( 'Placeholder Text', 'enteraddons-pro' ),
				'condition' => [ 'domain_temp_layout' => '1'],
                'type' => Controls_Manager::TEXT,
                'default'  => esc_html__( 'Type Your Domain Name', 'enteraddons-pro' )
			]
        );
		$this->add_control(
			'button_text',
			[
				'label' => esc_html__( 'Button Text', 'enteraddons-pro' ),
				'condition' => [ 'domain_temp_layout' => '1'],
                'type' => Controls_Manager::TEXT,
                'default'  => esc_html__( 'Search Now', 'enteraddons-pro' )
			]
        );
		$this->add_control(
			'website_link',
			[
				'label' => esc_html__( 'Action Link', 'enteraddons-pro' ),
				'condition' => [ 'domain_temp_layout' => '1'],
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'enteraddons-pro' ),
				'show_external' => true,
				'default' => [
					'url' => 'http://billing.ywhmcs.com/domainchecker.php?systpl=EcoHostingWP',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		// Domain Type Repeater
		$this->add_control(
			'show_domain_type',
			[
				'label' => esc_html__( 'Show Domain Type?', 'enteraddons-pro' ),
				'condition' => [ 'domain_temp_layout' => '1'],
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'enteraddons-pro' ),
				'label_off' => esc_html__( 'Hide', 'enteraddons-pro' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'domain_type',
			[
				'label' => esc_html__( 'Domain Type', 'enteraddons-pro' ),
                'type' => Controls_Manager::TEXT,
                'default'  => esc_html__( '.Store', 'enteraddons-pro' ),	
			]
        );
		$repeater->add_control(
			'domain_price',
			[
				'label' => esc_html__( 'Domain Price', 'enteraddons-pro' ),
                'type' => Controls_Manager::TEXT,
                'default'  => esc_html__( '$8.99/yr', 'enteraddons-pro' ),
			]
        );
		$this->add_control(
			'domain_type_list',
			[
				'label' => esc_html__( 'Domain Type List', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'domain_type' => esc_html__( '.Com', 'enteraddons-pro' ),
						'domain_price' => esc_html__( '$8.99/yr', 'enteraddons-pro' ),
					],
				],
				'condition' => [ 'show_domain_type' => 'yes','domain_temp_layout' => '1'],
				'title_field' => '{{{ domain_type }}}',
			],
			
		);
		
		// ----------------------------------------  Domain Search Content Template 2 ------------------------------


		$this->add_control(
			'domain_heading_content_title',
			[
				'label' => esc_html__( 'Title', 'enteraddons-pro' ),
				'condition' => [ 'domain_temp_layout' => '2'],
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Domain Name ?', 'enteraddons-pro' ),
			]
		);
		$this->add_control(
			'domain_heading_content_subtitle',
			[
				'label' => esc_html__( 'Sub Title', 'enteraddons-pro' ),
				'condition' => [ 'domain_temp_layout' => '2'],
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Looking a Premium Quality', 'enteraddons-pro' ),
			]
		);
		$this->add_control(
			'domain_offer_condition',
			[
				'label' => esc_html__( 'Offer Show', 'enteraddons-pro' ),
				'condition' => [ 'domain_temp_layout' => '2'],
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'enteraddons-pro' ),
				'label_off' => esc_html__( 'Hide', 'enteraddons-pro' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'domain_offer_title',
			[
				'label' => esc_html__( ' Offer Title', 'enteraddons-pro' ),
				'condition' => [ 'domain_temp_layout' => '2'],
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'GET 10% OFF TODAY TO REGISTER A DOMAIN', 'enteraddons-pro' ),
				'label_block'=> true,
			]
		);
		$this->end_controls_section();

		// ----------------------------------------  Domain Search Form Content ------------------------------

		$this->start_controls_section(
			'search_content',
			[
				'label' => esc_html__( 'Search Form Content', 'enteraddons-pro' ),
				'condition' => [ 'domain_temp_layout' => '2'],
			]
		);
		$this->add_control(
			'search_form_placeholder',
			[
				'label' => esc_html__( 'Placeholder', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'separator' => 'before',
				'default' => esc_html__( 'Type your domain...', 'enteraddons-pro' ),
			]
		);
		$this->add_control(
			'bill_address_link',
			[
				'label' => esc_html__( 'Action Link', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'enteraddons-pro' ),
				'default' => [
					'url' => 'http://billing.ywhmcs.com/domainchecker.php?systpl=EcoHostingWP',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'button_type',
			[
				'label' => esc_html__( 'Button Type', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'text',
				'options' => [
					'icon' => esc_html__( 'Icon', 'enteraddons-pro' ),
					'text' => esc_html__( 'Text', 'enteraddons-pro' ),
				],
			]
		);
		$this->add_control(
			'ea_button_text',
			[
				'label' => esc_html__( 'Text', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Search', 'enteraddons-pro' ),
				'condition' => [
					'button_type' => 'text',
				],
			]
		);
		$this->add_control(
			'ea_button_icon',
			[
				'label' => esc_html__( 'Icon', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-search',
					'library' => 'fa-solid',
				],
				'condition' => [
					'button_type' => 'icon',
				],
			]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'domain_title', [
				'label' => esc_html__( 'Domain Title', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'enteraddons-pro' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'domain_name_lists',
			[
				'label' => esc_html__( 'Domain Type List', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'domain_title' => esc_html__( '.com', 'enteraddons-pro' ),
					],
					[
						'domain_title' => esc_html__( '.org', 'enteraddons-pro' ),
					],
					[
						'domain_title' => esc_html__( '.net', 'enteraddons-pro' ),
					],
					[
						'domain_title' => esc_html__( '.xyz', 'enteraddons-pro' ),
					],
				],
				'title_field' => '{{{ domain_title }}}',
			]
		);
		$this->end_controls_section();

		// ----------------------------------------  Domain  Type Name  ------------------------------

		$this->start_controls_section(
			'domain_name',
			[
				'label'	=> esc_html__('Domain Type Content','enteraddons-pro'),
				'condition' => [ 'domain_temp_layout' => '2'],

			]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'domain_names', [
				'label' => esc_html__( 'Name', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '.com' , 'enteraddons-pro' ),
			]
		);
		$repeater->add_control(
			'domain_price', [
				'label' => esc_html__( 'Price', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '$3.99/y' , 'enteraddons-pro' ),
			]
		);
		$this->add_control(
			'domain_details_list',
			[
				'label' => esc_html__( 'Domain Type List', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'prevent_empty' => false,
				'default' => [
					[
						'domain_names' => esc_html__( '.com', 'enteraddons-pro' ),
						'domain_price' => esc_html__( '$3.99/y', 'enteraddons-pro' ),
					],
					[
						'domain_names' => esc_html__( '.org', 'enteraddons-pro' ),
						'domain_price' => esc_html__( '$4.99/m', 'enteraddons-pro' ),
					],
					[
						'domain_names' => esc_html__( '.net', 'enteraddons-pro' ),
						'domain_price' => esc_html__( '$5.99/d', 'enteraddons-pro' ),
					],
					[
						'domain_names' => esc_html__( '.xyz', 'enteraddons-pro' ),
						'domain_price' => esc_html__( '$1.99/y', 'enteraddons-pro' ),
					],
				],
				'title_field' => '{{{ domain_names }}}',
			]
		);
        $this->end_controls_section();

		// ----------------------------------------  Domain Search  Wrapper Style ------------------------------

        $this->start_controls_section(
			'wrapper_style_section',
			[
				'label' => esc_html__( 'Wrapper Style', 'enteraddons-pro' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [ 'domain_temp_layout' => '1'],
			]
        );
        $this->add_responsive_control(
			'wrapper_margin',
			[
				'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-searchbox' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
        $this->add_responsive_control(
			'wrapper_padding',
			[
				'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-searchbox' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wrapper_border',
				'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-searchbox',
			]
		);
		$this->add_responsive_control(
			'wrapper_border_radius',
			[
				'label' 		=> esc_html__( 'Border Radius', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .ea-searchbox' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wrapper_box_shadow',
				'label' => __( 'Box Shadow', 'enteraddons-pro' ),
				'selector' => '{{WRAPPER}} .ea-searchbox',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'enteraddons-pro' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .ea-searchbox',
			]
		);
        $this->end_controls_section();

		// ----------------------------------------  Domain Search Box Style ------------------------------

        $this->start_controls_section(
			'search_box_style_section',
			[
				'label' => esc_html__( 'Search Form Style', 'enteraddons-pro' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [ 'domain_temp_layout' => '1'],
			]
        );
        $this->add_responsive_control(
	        'search_input_field_width',
	        [
	            'label'          => esc_html__('Input Field Width', 'enteraddons-pro'),
	            'type'           => Controls_Manager::SLIDER,
	            'default'        => [  'unit' => '%',],
	            'size_units'     => ['px', '%'],
	            'range'          => [
	                '%'  => [
	                    'min' => 0,
	                    'max' => 100,
	                ],
	                'px' => [
	                    'min' => 0,
	                    'max' => 1000,
	                ],
	            ],
	            'selectors' => [
	                '{{WRAPPER}} .ea-keyword-search .ea-form-control' => 'width: {{SIZE}}{{UNIT}};',
	            ],
	        ]
	    );

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'placeholder_typography',
				'selector' => '{{WRAPPER}} .ea-searchbox .ea-search-text',
			]
		);
		$this->add_control(
			'input_text_color',
			[
				'label' => esc_html__( 'Color', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ea-searchbox .ea-search-text' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_responsive_control(
			'search_box_margin',
			[
				'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-searchbox-main' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
        $this->add_responsive_control(
			'search_box_padding',
			[
				'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-searchbox-main' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'search_box_border',
				'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-searchbox-main',
			]
		);
		$this->add_responsive_control(
			'search_box_border_radius',
			[
				'label' 		=> esc_html__( 'Border Radius', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .ea-searchbox-main' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'search_box_box_shadow',
				'label' => __( 'Box Shadow', 'enteraddons-pro' ),
				'selector' => '{{WRAPPER}}.ea-searchbox-main',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'search_box_background',
				'label' => esc_html__( 'Background', 'enteraddons-pro' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .ea-searchbox-main',
			]
		);
        $this->end_controls_section();

		// ----------------------------------------  Domain Search Button Style ------------------------------

		$this->start_controls_section(
			'button_style_section',
			[
				'label' => esc_html__( 'Button Style', 'enteraddons-pro' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [ 'domain_temp_layout' => '1'],
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-searchbox .ea-ds-btn',
			]
        );
        $this->add_responsive_control(
			'button_margin',
			[
				'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-searchbox .ea-ds-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
        $this->add_responsive_control(
			'button_padding',
			[
				'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-searchbox .ea-ds-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-searchbox .ea-ds-btn',
			]
		);
		$this->add_responsive_control(
			'button_border_radius',
			[
				'label' 		=> esc_html__( 'Border Radius', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .ea-searchbox .ea-ds-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->start_controls_tabs(
            'domain_search_button_tabs',
        );
        $this->start_controls_tab(
            'domain_search_button_normal',
            [
                'label' => esc_html__( 'Normal', 'enteraddons' ),
            ]
        );
		$this->add_control(
			'button_color',
			[
				'label' => esc_html__( 'Color', 'enteraddons-pro' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ea-searchbox .ea-ds-btn' => 'color: {{VALUE}}',
                ],
			]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_bg_color',
				'label' => esc_html__( 'Background', 'enteraddons-pro' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .ea-searchbox .ea-ds-btn',
			]
		);
        $this->end_controls_tab();

        $this->start_controls_tab(
            'domain_search_button_tab_hover',
            [
                'label' => esc_html__( 'Hover', 'enteraddons' ),
            ]
        );
        $this->add_control(
			'button_hover_color',
			[
				'label' => esc_html__( 'Color', 'enteraddons-pro' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ea-searchbox .ea-ds-btn:hover' => 'color: {{VALUE}}',
                ],
			]
		);	
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_bg_hover_color',
				'label' => esc_html__( 'Background', 'enteraddons-pro' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .ea-searchbox .ea-ds-btn:hover',
			]
		);
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

		// ----------------------------------------  Domain Type Style ------------------------------

		$this->start_controls_section(
			'domain_type_style_section',
			[
				'label' => esc_html__( 'Domain Type Style', 'enteraddons-pro' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [ 'show_domain_type' => 'yes', 'domain_temp_layout' => '1'],
			]
			
        );

		$this->start_controls_tabs(
			'domain_type_style_tabs'
		);
		$this->start_controls_tab(
			'domain_type_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
			]
		);
		$this->add_responsive_control(
			'domain_Type_width',
			[
				'label' => esc_html__( 'Width', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
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
					'{{WRAPPER}} .ea-product-category .ea-product-one' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'domain_Type_height',
			[
				'label' => esc_html__( 'Height', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
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
					'{{WRAPPER}} .ea-product-category .ea-product-one' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'domain_type_margin',
			[
				'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-product-category .ea-product-one' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
		$this->add_responsive_control(
			'domain_type_padding',
			[
				'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-product-category .ea-product-one' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'domain_type_border',
				'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-product-category .ea-product-one',
			]
		);
		$this->add_responsive_control(
			'domain_type_border_radius',
			[
				'label' 		=> esc_html__( 'Border Radius', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .ea-product-category .ea-product-one' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'domain_type_box_shadow',
				'label' => __( 'Box Shadow', 'enteraddons-pro' ),
				'selector' => '{{WRAPPER}} .ea-product-category .ea-product-one',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'domain_type_bg_color',
				'label' => esc_html__( 'Background', 'enteraddons-pro' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .ea-product-category .ea-product-one',
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'domain_type_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'enteraddons-pro' ),
			]
		);
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'domain_type_hover_border',
				'label' => esc_html__( 'Hover Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-product-category .ea-product-one:hover',
			]
		);
		$this->add_responsive_control(
			'domain_type_hover_border_radius',
			[
				'label' 		=> esc_html__( 'Hover Border Radius', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .ea-product-category .ea-product-one:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'domain_type_hover_box_shadow',
				'label' => __( 'Box Shadow', 'enteraddons-pro' ),
				'selector' => '{{WRAPPER}} .ea-product-category .ea-product-one:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'domain_type_bg_hover_color',
				'label' => esc_html__( 'Background', 'enteraddons-pro' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .ea-product-category .ea-product-one:hover',
			]
		);
		$this->end_controls_tabs();
		$this->end_controls_section();

		// ----------------------------------------  Domain Type Name Style  ------------------------------

		$this->start_controls_section(
			'domain_type_name_style_section',
			[
				'label' => esc_html__( 'Domain Type Name Style', 'enteraddons-pro' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [ 'show_domain_type' => 'yes', 'domain_temp_layout' => '1'],
			]
			
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'type_typography',
				'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
				'selector' => '{{WRAPPER}} .product-category .type',
			]
		);
		$this->add_control(
			'type_color',
			[
				'label' => esc_html__( 'Color', 'enteraddons-pro' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .product-category .type' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'type_name_hover_color',
			[
				'label' => esc_html__( 'Hover Color', 'enteraddons-pro' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ea-product-one:hover .ea-ds-type' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'domain_type_name_margin',
			[
				'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-product-category .ea-ds-type' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'domain_type_name_padding',
			[
				'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-product-category .ea-ds-type' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->end_controls_section();

		// ----------------------------------------  Domain Type Price Style ------------------------------
		
		$this->start_controls_section(
			'domain_type_pricing_style_section',
			[
				'label' => esc_html__( 'Domain Type Pricing Style', 'enteraddons-pro' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [ 'show_domain_type' => 'yes', 'domain_temp_layout' => '1'],
			],
			
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'type_pricing_typography',
				'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-product-category .ea-ds-duration',
			]
        );
        $this->add_control(
			'type_pricing_color',
			[
				'label' => esc_html__( 'Color', 'enteraddons-pro' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ea-product-category .ea-ds-duration' => 'color: {{VALUE}}',
                ],
			]
        );
		$this->add_control(
			'type_pricing_hover_color',
			[
				'label' => esc_html__( 'Hover Color', 'enteraddons-pro' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ea-product-one:hover .ea-ds-duration' => 'color: {{VALUE}}',
                ],
			]
        );
		$this->add_responsive_control(
			'domain_type_pricing_margin',
			[
				'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-product-category .ea-ds-duration' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
		$this->add_responsive_control(
			'domain_type_pricing_padding',
			[
				'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-product-category .ea-ds-duration' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
        $this->end_controls_section(); // End Domain Search Content

		// ----------------------------------------  Domain Search Wrapper Style Template 2 ------------------------------

		$this->start_controls_section(
			'main_section',
			[
				'label' => esc_html__( 'Wrapper Style', 'enteraddons-pro' ),
				'condition' => [ 'domain_temp_layout' => '2'],
				'tab'	=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'main_section_margin',
			[
				'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-dm-offer' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
        $this->add_responsive_control(
			'main_section_padding',
			[
				'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-dm-offer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'main_section_border',
				'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-dm-offer',
			]
		);
		$this->add_responsive_control(
			'main_section_border_radius',
			[
				'label' 		=> esc_html__( 'Border Radius', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .ea-dm-offer' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'main_section_box_shadow',
				'label' => __( 'Box Shadow', 'enteraddons-pro' ),
				'selector' => '{{WRAPPER}} .ea-dm-offer',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'main_section_bg',
				'label' => esc_html__( 'Background', 'enteraddons-pro' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .ea-dm-offer',
			]
		);
		$this->end_controls_section();

		// ----------------------------------------  Domain Search Heading Style Template 2 ------------------------------

		$this->start_controls_section(
			'domain_heading_style',
			[
				'label' => esc_html__( 'Domain Heading Style', 'enteraddons-pro' ),
				'condition' => [ 'domain_temp_layout' => '2'],
				'tab'	=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'domain_heading_margin',
			[
				'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-dm-left-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
		$this->add_responsive_control(
			'domain_heading_padding',
			[
				'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-dm-left-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'domain_heading_border',
				'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-dm-left-content p',
			]
		);
		$this->add_responsive_control(
			'domain_heading_border_radius',
			[
				'label' 		=> esc_html__( 'Border Radius', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .ea-dm-left-content p' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'domain_heading_bg',
				'label' => esc_html__( 'Background', 'enteraddons-pro' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .ea-dm-offer .ea-dm-left-content p',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'domain_heading_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
				'selector' => '{{WRAPPER}} .ea-dm-offer .ea-dm-left-content p',
				'separator'	=> 'after',
			]
		);
		$this->add_control(
			'domain_heading_title',
			[
				'label' => esc_html__( 'Title', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'domain_heading_content_typography',
				'selector' => '{{WRAPPER}} .ea-dm-offer .ea-dm-left-content p',
			]
		);
		$this->add_control(
			'domain_heading_content_typography_title_color',
			[
				'label' => esc_html__( 'Title Color', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ea-dm-offer .ea-dm-left-content p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'domain_heading_subtitle',
			[
				'label' => esc_html__( 'Sub Title', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'domain_heading_content_sub_typography',
				'selector' => '{{WRAPPER}} .ea-dm-offer .ea-dm-left-content p span',
			]
		);
		$this->add_control(
			'domain_heading_content_typography_subtitle_color',
			[
				'label' => esc_html__( 'Title Color', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ea-dm-offer .ea-dm-left-content p span' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'domain_heading_title_margin',
			[
				'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-dm-offer .ea-dm-left-content p span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
		$this->end_controls_section();

		// ----------------------------------------  Domain Offer  Style Template 2 ------------------------------

		$this->start_controls_section(
			'domain_offer_style',
			[
				'label' => esc_html__( 'Domain Offer Style', 'enteraddons-pro' ),
				'condition' => [ 'domain_temp_layout' => '2','domain_offer_condition' =>'yes'],
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'offer_animation',
			[
				'label' => esc_html__( 'Animation Style', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'classic',
				'options' => [
					'classic' => esc_html__( 'Classic', 'enteraddons-pro' ),
					'animation' => esc_html__( 'Animation', 'enteraddons-pro' ),
					'shake' => esc_html__( 'Shake', 'enteraddons-pro' ),
				],
				'prefix_class' => 'elementor-search-form--skin-',
				'render_type' => 'template',
				'frontend_available' => true,
			]
		);
		$this->add_responsive_control(
			'domain_offer_width',
			[
				'label' => esc_html__( 'Offset X', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}}  .ea-dm-domain--offer' => 'right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'domain_offer_top',
			[
				'label' => esc_html__( 'Offset Y', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => -1,
					],
					'%' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}}  .ea-dm-domain--offer' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .ea-dm-domain--offer span',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}  .ea-dm-domain--offer span' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'domain_offer_margin',
			[
				'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default' => [
					'unit' => 'px',
					'top' => 10,
					'right'=>15,
					'bottom'=>10,
					'left'=>15,
					'isLinked'=> true,
				],
				'selectors' => [
					'{{WRAPPER}}  .ea-dm-domain--offer span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				
			]
		);
		$this->add_responsive_control(
			'domain_offer_padding',
			[
				'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default' => [
					'unit' => 'px',
					'top' => 10,
					'right'=>15,
					'bottom'=>10,
					'left'=>15,
					'isLinked'=> true,
				],
				'selectors' => [
					'{{WRAPPER}}  .ea-dm-domain--offer span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => esc_html__( 'Border', 'enteraddons-pro' ),
				'selector' => '{{WRAPPER}}  .ea-dm-domain--offer span',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'domain_offer_box_shadow',
				'label' => __( 'Box Shadow', 'enteraddons-pro' ),
				'selector' => '{{WRAPPER}} .ea-dm-domain--offer',
			]
		);
		$this->add_control(
			'offer_bg_color',
			[
				'label' => esc_html__( 'Background', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}  .ea-dm-domain--offer ' => 'background-color: {{VALUE}}',
					
				
				],
			]
		);
		$this->end_controls_section();

		// ----------------------------------------  Domain Search Form  Style Template 2 ------------------------------

		$this->start_controls_section(
			'domain_offer_search_style',
			[
				'label' => esc_html__( 'Search Form Style', 'enteraddons-pro' ),
				'condition' => [ 'domain_temp_layout' => '2'],
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'search_form_typography',
				'selector' => '{{WRAPPER}} .ea-dm-form-control',
			]
		);
		$this->add_control(
			'input_color',
			[
				'label' => esc_html__( 'Color', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}  .ea-dm-form-control' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'input_placeholder_color',
			[
				'label' => esc_html__( 'Placeholder Color', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}  .ea-dm-form-control::placeholder' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'input_select_arrow_color',
			[
				'label' => esc_html__( 'Select Arrow Color', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}  .ea-dm-domainSearchForm .ea-dm-select-box:before' => 'border-top: 6px solid {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'input_size',
			[
				'label' => esc_html__( 'Input height', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 55,
				],
				'selectors' => [
					'{{WRAPPER}} .ea-dm-domainSearchForm input[type="text"].ea-dm-form-control' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ea-dm-domainSearchForm select.ea-dm-form-control' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'before_array_position',
			[
				'label' => esc_html__( 'Select Arrow Icon Position', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
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
					'unit' => 'px',
					'size' => 26,
				],
				'selectors' => [
					'{{WRAPPER}} .ea-dm-domainSearchForm .ea-dm-select-box:before' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'second_input_border',
					'label' => esc_html__( 'Border', 'enteraddons-pro' ),
					'selector' => '{{WRAPPER}} .ea-dm-reset-gutter',
				]
		);
		$this->add_control(
			'input_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-dm-reset-gutter, {{WRAPPER}} .ea-dm-search-icon .ea-dm-form-control' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'domain_input_background',
				'label' => esc_html__( 'Background', 'enteraddons-pro' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .ea-dm-reset-gutter, .ea-dm-domainSearchForm .ea-dm-select-box',
			]
		);
		$this->end_controls_section();

		// ----------------------------------------  Domain Search Button Style Template 2 ------------------------------

		$this->start_controls_section(
			'button_style',
			[
				'label' => esc_html__( 'Search Button Style', 'enteraddons-pro' ),
				'condition' => [ 'domain_temp_layout' => '2'],
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'tabs_button_colors' );

		$this->start_controls_tab(
			'search_button_normal',
			[
				'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
			]
		);
		$this->add_control(
			'search_btn_text_color',
			[
				'label' => esc_html__( 'Color', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
				'{{WRAPPER}} .ea-dm-domainSearchForm button[type="submit"]' => 'color: {{VALUE}}',
				],
				'condition' => [
					'button_type' => 'text',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'ea_button_typography',
				'selector' => '{{WRAPPER}} .ea-dm-domainSearchForm button[type="submit"]',
				'condition' => [
					'button_type' => 'text',
				],
			]
		);
		$this->add_control(
			'btn_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ea-dm-domainSearchForm button[type="submit"] i' => 'color: {{VALUE}}',
				],
				'condition'	=> [
					'button_type' => 'icon',
				],
			]
		);
		$this->add_control(
			'btn_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ea-dm-domainSearchForm button[type="submit"]' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'btn_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ea-dm-domainSearchForm button[type="submit"] i' => 'font-size: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'button_type' => 'icon',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'button_width',
			[
				'label' => esc_html__( 'Button Width', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .ea-dm-domainSearchForm button[type="submit"] ' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'button_height',
			[
				'label' => esc_html__( 'Button Height', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 55,
				],
				'selectors' => [
					'{{WRAPPER}} .ea-dm-domainSearchForm button[type="submit"] ' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'btn_margin',
			[
				'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-dm-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'btn_padding',
			[
				'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-dm-domainSearchForm button[type="submit"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'btn_border',
				'label' => esc_html__( 'Border', 'enteraddons-pro' ),
				'selector' => '{{WRAPPER}} .ea-dm-domainSearchForm button[type="submit"]',
			]
		);
		$this->add_control(
			'btn_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-dm-domainSearchForm button[type="submit"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'search_btn_hover',
			[
				'label' => esc_html__( 'Hover', 'enteraddons-pro' ),
			]
		);
		$this->add_control(
			'btn_txt_hover',
			[
				'label' => esc_html__( 'Text Color', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ea-dm-domainSearchForm button[type="submit"]:hover' => 'color: {{VALUE}}',
				],
				'condition'	=> [
					'button_type' => 'text',
				],
			]
		);
		$this->add_control(
			'btn_icon_hover_color',
			[
				'label' => esc_html__( 'Icon Hover Color', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ea-dm-domainSearchForm button[type="submit"]:hover i' => 'color: {{VALUE}}',
				],
				'condition'	=> [
					'button_type' => 'icon',
				],
			]
		);
		$this->add_control(
			'btn_bg_hover_color',
			[
				'label' => esc_html__( 'Background Color', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ea-dm-domainSearchForm button[type="submit"]:hover' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'btn_hover_border',
				'label' => esc_html__( 'Border', 'enteraddons-pro' ),
				'selector' => '{{WRAPPER}} .ea-dm-domainSearchForm button[type="submit"]:hover',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		// ----------------------------------------  Domain Type Style Template 2 ------------------------------

		$this->start_controls_section(
			'domain_type_name',
			[
				'label' => esc_html__( 'Domain Type Style', 'enteraddons-pro' ),
				'condition' => [ 'domain_temp_layout' => '2'],
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'domain_name_content_typography_heading',
			[
				'label' => esc_html__( 'Domain Name', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'domain_name_content_typography',
				'selector' => '{{WRAPPER}} .ea-dm-offer .ea-dm-right-content .ea-dm-extension span.ea-dm-name',
			]
		);
		$this->add_control(
			'domain_name_title_color',
			[
				'label' => esc_html__( 'Title Color', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ea-dm-offer .ea-dm-right-content .ea-dm-extension span.ea-dm-name' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'domain_price_content_typography_heading',
			[
				'label' => esc_html__( 'Domain Price', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'domain_price_content_typography',
				'selector' => '{{WRAPPER}} .ea-dm-offer .ea-dm-right-content .ea-dm-extension span.ea-dm-price',
			]
		);
		$this->add_control(
			'domain_price_title_color',
			[
				'label' => esc_html__( 'Title Color', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ea-dm-offer .ea-dm-right-content .ea-dm-extension span.ea-dm-price' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'domain_type_hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_responsive_control(
			'domain_type_content_margin',
			[
				'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-dm-extension' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
        $this->add_responsive_control(
			'domain_type_content_padding',
			[
				'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-dm-extension' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'domain_content_border',
				'label' => esc_html__( 'Border', 'enteraddons-pro' ),
				'selector' => '{{WRAPPER}} .ea-dm-offer .ea-dm-right-content .ea-dm-extension',
			]
		);
		$this->add_responsive_control(
			'domain_content_border_radius',
			[
				'label' 		=> esc_html__( 'Border Radius', 'enteraddons-pro' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .ea-dm-extension' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'domain_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
				'selector' => '{{WRAPPER}} .ea-dm-extension',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'domain_type_background',
				'label' => esc_html__( 'Background', 'enteraddons-pro' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .ea-dm-extension',
			]
		);
		$this->end_controls_section();

	}

	protected function render() {

        // get settings
        $settings = $this->get_settings_for_display();

        // Tema template render
        $obj = new Domain_Search_Template();
        $obj::setDisplaySettings( $settings );
        $obj->renderTemplate();

    }
    
    public function get_style_depends() {
        return [ 'enteraddons-global-style'];
    }

}
