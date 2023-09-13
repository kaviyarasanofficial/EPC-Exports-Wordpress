<?php
namespace EnteraddonsPro\Widgets\Image_Swap;

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
 * Enteraddons elementor Image Swap  widget.
 *
 * @since 1.0
 */

class Image_Swap extends Widget_Base {
    
	public function get_name() {
		return 'enteraddons-image-swap';
	}

	public function get_title() {
		return esc_html__( 'Image Swap', 'enteraddons-pro' );
	}

	public function get_icon() {
		return 'entera entera-image-swap';
	}

	public function get_categories() {
		return ['enteraddons-pro-elements-category'];
	}

	protected function register_controls() {

        // ----------------------------------------  Image Swap Template Two content ------------------------------
        $this->start_controls_section(
            'enteraddons_image_content_settings',
            [
                'label' => esc_html__( 'Upload Image', 'enteraddons-pro' ),
            ]
        );

        $this->add_control(
            'first_image',
            [
                'label' => esc_html__( 'First Image', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        
        $this->add_control(
            'second_image',
            [
                'label' => esc_html__( 'Second Image', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        
        $this->end_controls_section(); // End Image Swap Content

		// ----------------------------------------  Image Swap Template one content ------------------------------

        $this->start_controls_section(
            'enteraddons_image_swap_effect_settings',
            [
                'label' => esc_html__( 'Effect Settings', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'image_swap_template',
            [
                'label' => esc_html__( 'Animation Type', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'markup_one',
                'options' => [
                    'markup_one' => esc_html__( 'Effect', 'enteraddons-pro' ),
                    'markup_two' => esc_html__( 'Slide', 'enteraddons-pro' ),
                ],
            ]
        );
        $this->add_control(
            'image_swap_event',
            [
                'label' => esc_html__( 'Trigger Type', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'ea-on-hover',
                'options' => [
                    'ea-on-hover' => esc_html__( 'Hover', 'enteraddons-pro' ),
                    'ea-on-click' => esc_html__( 'Click', 'enteraddons-pro' )
                ],
            ]
        );

        $this->add_control(
            'image_slide_style',
            [
                'label' => esc_html__( ' Image Slide Style ', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'condition' => [
                    'image_swap_template' => ['markup_two'],
                ],
                'default' => 'ea-imageBox-bottom',
                'options' => [
                    'ea-imageBox-bottom' => esc_html__( 'Bottom To Top', 'enteraddons-pro' ),
                    'ea-imageBox-up'     => esc_html__( 'Top To Bottom', 'enteraddons-pro' ),
                    'ea-imageBox-right'  => esc_html__( 'Right To Left', 'enteraddons-pro' ),
                    'ea-imageBox-left'   => esc_html__( 'Left To Right', 'enteraddons-pro' ),
                ],
            ]
        );

		$this->add_control(
			'img_swap_effect_style',
			[
				'label' => esc_html__( 'Animation Effect', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::SELECT,
                'condition' => [
                    'image_swap_template' => ['markup_one'],
                ],
				'default' => 'ea-effect-fade',
				'options' => [
					'ea-effect-fade'       => esc_html__( 'Fade', 'enteraddons-pro' ),
					'ea-effect-zoominout'  => esc_html__( 'ZoomIn ZoomOut', 'enteraddons-pro' ),
                    'ea-effect-rotation'   => esc_html__( 'Rotation', 'enteraddons-pro' )
				],
			]
		);       
        $this->end_controls_section(); // End Image Swap Content 

		 /**
         * Style Tab
         * ------------------------------ Image Swap Content Wrapper Style ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_team_wrapper_style_settings', [
                'label' => esc_html__( 'Wrapper Style', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_responsive_control(
            'img_wrapper_width',
            [
                'label' => esc_html__( 'Wrapper Width', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .ea-swap--wrapper' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'img_wrapper_height',
            [
                'label' => esc_html__( 'Wrapper Height', 'enteraddons-pro' ),
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
                    'unit' => 'px',
                    'size' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ea-swap--wrapper' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        ); 
           
		$this->add_responsive_control(
			'wrapper_margin',
			[
				'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-swap--wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'wrapper_padding',
			[
				'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-swap--wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'      => 'wrapper_border',
				'label'     => esc_html__( 'Border', 'enteraddons-pro' ),
				'selector'  => '{{WRAPPER}} .ea-swap--wrapper',
			]
		);
		$this->add_responsive_control(
			'wrapper_radius',
			[
				'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-swap--wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wrapper_shadow',
				'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
				'selector' => '{{WRAPPER}} .ea-swap--wrapper',
			]
		); 
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'wrapper_background',
				'label' => esc_html__( 'Background', 'enteraddons-pro' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ea-swap--wrapper',
			]
		);
		
        $this->end_controls_section();

		 /**
         * Style Tab
         * ------------------------------ Image Swap Image Style ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_image_style', [
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
                    '{{WRAPPER}} .ea-swap--wrapper img' => 'width: {{SIZE}}{{UNIT}};',
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
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ea-swap--wrapper img' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .ea-swap--wrapper img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .ea-swap--wrapper img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'img_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-swap--wrapper img',
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
                    '{{WRAPPER}} .ea-swap--wrapper img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'img_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-swap--wrapper img',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'image_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .ea-swap--wrapper img',
            ]
        );

        $this->end_controls_section();

		 /**
         * Style Tab
         * ------------------------------ Image Swap Animation Style ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_image_animation_style', [
                'label' => esc_html__( 'Animation Style', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'animation_transition',
			[
				'label' => esc_html__( 'Amination transition', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 20,
				'step' => .5,
                'default' => 1,
				'selectors' => [
                    '{{WRAPPER}} .ea-swap--wrapper img' => 'transition: all {{VALUE}}s ease-in-out;',
                ],
			]
		);

		$this->add_control(
			'animation_auto_duration',
			[
				'label' => esc_html__( 'Animatiuon Duration', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
                'description' => esc_html__( 'Only for timer effect', 'enteraddons-pro' ),
				'min' => 5,
				'max' => 200,
				'step' => 5,
				'default' => 5,
				'selectors' => [
                    '{{WRAPPER}} .ea-swap--wrapper img' => 'animation-duration: {{VALUE}}s;',
                ],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

        // get settings
        $settings = $this->get_settings_for_display();

        // template render
        $obj = new Image_Swap_Template();
        $obj::setDisplaySettings( $settings );
        $obj->renderTemplate();

    }

    public function get_script_depends() {
        return [ 'enteraddons-pro-main'];
    }
    
    public function get_style_depends() {
        return [ 'enteraddons-global-style'];
    }

}
