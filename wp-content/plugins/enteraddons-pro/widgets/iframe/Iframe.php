<?php
namespace EnteraddonsPro\Widgets\Iframe;

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

class Iframe extends Widget_Base {

	public function get_name() {
		return 'enteraddons-iframe';
	}

	public function get_title() {
		return esc_html__( 'Iframe', 'enteraddons-pro' );
	}

	public function get_icon() {
		return 'entera entera-iframe';
	}

	public function get_categories() {
		return ['enteraddons-pro-elements-category'];
	}

	protected function register_controls() {

        // ----------------------------------------  iframe content ------------------------------
        $this->start_controls_section(
            'iframe_content',
            [
                'label' => esc_html__( 'Iframe Settings', 'enteraddons-pro' ),
            ]
        );
        
        $this->add_control(
            'iframe_url',
            [
                'label' => esc_html__( 'Url', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => ''
            ]
        );
        $this->add_control(
            'loading', [
                'label' => esc_html__( 'Loading', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'auto',
                'options' => [
                    'auto' => esc_html__( 'Auto', 'enteraddons-pro' ),
                    'lazy' => esc_html__( 'Lazy', 'enteraddons-pro' ),
                    'eager' => esc_html__( 'Eager', 'enteraddons-pro' )
                ],
                
            ]
        );
        $this->add_control(
            'allowfullscreen',
            [
                'label' => esc_html__( 'Allow Full Screen', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'enteraddons-pro' ),
                'label_off' => esc_html__( 'No', 'enteraddons-pro' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'scrolling',
            [
                'label' => esc_html__( 'Scrolling', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'enteraddons-pro' ),
                'label_off' => esc_html__( 'No', 'enteraddons-pro' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'active-preloader',
            [
                'label' => esc_html__( 'Active Preloader', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'enteraddons-pro' ),
                'label_off' => esc_html__( 'No', 'enteraddons-pro' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->end_controls_section(); // End content

        /**
         * Style Tab
         * ------------------------------ Product Categories Content area Settings ------------------------------
         *
         */
        $this->start_controls_section(
            'iframe_wrap_style_settings', [
                'label' => esc_html__( 'Wrapper Style', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
                'iframe_wrap_width',
                [
                    'label' => esc_html__( 'Iframe Wrapper Width', 'enteraddons-pro' ),
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
                        '{{WRAPPER}} .ea-iframe-wrap' => 'width: {{SIZE}}{{UNIT}};max-width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'iframe_wrap_height',
                [
                    'label' => esc_html__( 'Iframe Wrapper Height', 'enteraddons-pro' ),
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
                        '{{WRAPPER}} .ea-iframe-wrap' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
        $this->add_responsive_control(
            'iframe_wrap_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-iframe-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'iframe_wrap_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-iframe-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'iframe_wrap_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-iframe-wrap',
            ]
        );
        $this->add_responsive_control(
            'iframe_wrap_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-iframe-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'iframe_wrap_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-iframe-wrap',
            ]
        ); 
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'iframe_wrap_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .ea-iframe-wrap',
            ]
        );
        
        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ iframe Style Settings ------------------------------
         *
         */
        $this->start_controls_section(
            'iframe_style_settings', [
                'label' => esc_html__( 'Iframe Style Settings', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'iframe_item_width',
            [
                'label' => esc_html__( 'Iframe Width', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .ea-iframe' => 'width: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'iframe_item_height',
            [
                'label' => esc_html__( 'Iframe Height', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .ea-iframe' => 'height: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );
            
        $this->add_responsive_control(
            'iframe_item_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-iframe' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'iframe_item_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-iframe' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'iframe_item_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-iframe',
            ]
        );
        $this->add_responsive_control(
            'iframe_item_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-iframe' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'iframe_item_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-iframe',
            ]
        ); 
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'iframe_item_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .ea-iframe',
            ]
        );
        $this->end_controls_section();
        

        /**
         * Style Tab
         * ------------------------------ Preloader Style Settings ------------------------------
         *
         */
        $this->start_controls_section(
            'preloader_style_settings', [
                'label' => esc_html__( 'Preloader Settings', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'iframe_preloader_color',
            [
                'label' => esc_html__( 'Spring Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-iframe-preloader-spinner div:after' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'iframe_preloader_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .ea-iframe-preloader',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {
        // get settings
        $settings = $this->get_settings_for_display();

        $obj = new Iframe_Template();
        $obj::setDisplaySettings( $settings );
        $obj->renderTemplate();

    }
    
    public function get_script_depends() {
        return [ 'enteraddons-pro-main' ];
    }

    public function get_style_depends() {
        return [ 'enteraddons-global-style' ];
    }

}
