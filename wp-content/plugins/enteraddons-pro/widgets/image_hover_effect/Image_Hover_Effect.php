<?php
namespace EnteraddonsPro\Widgets\Image_Hover_Effect;

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

class Image_Hover_Effect extends Widget_Base {
    
	public function get_name() {
		return 'enteraddons-image-hover-effect';
	}

	public function get_title() {
		return esc_html__( 'Image Hover Effect', 'enteraddons-pro' );
	}

	public function get_icon() {
		return 'entera entera-image-hover-effect';
	}

	public function get_categories() {
		return ['enteraddons-pro-elements-category'];
	}

	protected function register_controls() {

        // ---------------------------------------- content ------------------------------
        $this->start_controls_section(
            'enteraddons_image_content_settings',
            [
                'label' => esc_html__( 'Content', 'enteraddons-pro' ),
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__( 'Image', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'enteraddons-pro' ),
                'type' => Controls_Manager::TEXT,
                'default'  => esc_html__( 'This is title', 'enteraddons-pro' )
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__( 'Description', 'enteraddons-pro' ),
                'type' => Controls_Manager::TEXTAREA,
                'default'  => esc_html__( 'Description goes to here....', 'enteraddons-pro' )
            ]
        );
        $this->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Text', 'enteraddons-pro' ),
                'type' => Controls_Manager::TEXT,
                'default'  => esc_html__( 'View All', 'enteraddons-pro' )
            ]
        );
        $this->add_control(
            'link',
            [
                'label' => esc_html__( 'Link', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'enteraddons-pro' ),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
            ]
        );

        $this->add_control(
            'button_icon',
            [
                'label' => esc_html__( 'Button Icon', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-arrow-right',
                    'library' => 'solid',
                ]
            ]
        );
        $this->add_control(
            'icon_position',
            [
                'label' => esc_html__( 'Icon Position', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'row',
                'options' => [
                    'column' => esc_html__( 'Top', 'enteraddons-pro' ),
                    'column-reverse' => esc_html__( 'Bottom', 'enteraddons-pro' ),
                    'row' => esc_html__( 'Left', 'enteraddons-pro' ),
                    'row-reverse' => esc_html__( 'Right', 'enteraddons-pro' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .imghvrbtn-link a' => 'flex-direction: {{VALUE}};'
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_alignment_position',
            [
                'label' => esc_html__( 'Alignment', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'center',
                'options' => [
                    'flex-start' => esc_html__( 'Left', 'enteraddons-pro' ),
                    'center'     => esc_html__( 'Center', 'enteraddons-pro' ),
                    'flex-end'   => esc_html__( 'Right', 'enteraddons-pro' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .imghvrbtn-link a' => 'align-items: {{VALUE}};'
                ],
            ]
        );
        $this->end_controls_section(); // End Image Swap Content

		// ----------------------------------------  Hover effect ------------------------------

        $this->start_controls_section(
            'enteraddons_image_hover_effect_settings',
            [
                'label' => esc_html__( 'Effect Settings', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'image_hover_effect',
            [
                'label' => esc_html__( 'Animation Type', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'imghvr-fade',
                'options' => [
                    'imghvr-fade' => esc_html__( 'Fade', 'enteraddons-pro' ),
                    'imghvr-push-up' => esc_html__( 'Push Up', 'enteraddons-pro' ),
                    'imghvr-push-down' => esc_html__( 'Push Down', 'enteraddons-pro' ),
                    'imghvr-push-left' => esc_html__( 'Push Left', 'enteraddons-pro' ),
                    'imghvr-push-right' => esc_html__( 'Push Right', 'enteraddons-pro' ),
                    'imghvr-slide-up' => esc_html__( 'Slide Up', 'enteraddons-pro' ),
                    'imghvr-slide-down' => esc_html__( 'Slide Down', 'enteraddons-pro' ),
                    'imghvr-slide-left' => esc_html__( 'Slide Left', 'enteraddons-pro' ),
                    'imghvr-slide-right' => esc_html__( 'Slide Right', 'enteraddons-pro' ),
                    'imghvr-reveal-up' => esc_html__( 'Reveal Up', 'enteraddons-pro' ),
                    'imghvr-reveal-down' => esc_html__( 'Reveal Down', 'enteraddons-pro' ),
                    'imghvr-reveal-left' => esc_html__( 'Reveal Left', 'enteraddons-pro' ),
                    'imghvr-reveal-right' => esc_html__( 'Reveal Right', 'enteraddons-pro' ),
                    'imghvr-hinge-up' => esc_html__( 'Hinge Up', 'enteraddons-pro' ),
                    'imghvr-hinge-down' => esc_html__( 'Hinge Down', 'enteraddons-pro' ),
                    'imghvr-hinge-left' => esc_html__( 'Hinge Left', 'enteraddons-pro' ),
                    'imghvr-hinge-right' => esc_html__( 'Hinge Right', 'enteraddons-pro' ),
                    'imghvr-flip-horiz' => esc_html__( 'Flip Horiz', 'enteraddons-pro' ),
                    'imghvr-flip-vert' => esc_html__( 'Flip Vert', 'enteraddons-pro' ),
                    'imghvr-flip-diag-1' => esc_html__( 'Flip Diag 1', 'enteraddons-pro' ),
                    'imghvr-flip-diag-2' => esc_html__( 'Flip Diag 2', 'enteraddons-pro' ),
                    'imghvr-shutter-out-horiz' => esc_html__( 'Shutter Out Horiz', 'enteraddons-pro' ),
                    'imghvr-shutter-out-vert' => esc_html__( 'Shutter Out Vert', 'enteraddons-pro' ),
                    'imghvr-shutter-out-diag-1' => esc_html__( 'Shutter Out Diag 1', 'enteraddons-pro' ),
                    'imghvr-shutter-out-diag-2' => esc_html__( 'Shutter Out Diag 2', 'enteraddons-pro' ),
                    'imghvr-shutter-in-horiz' => esc_html__( 'Shutter In Horiz', 'enteraddons-pro' ),
                    'imghvr-shutter-in-vert' => esc_html__( 'Shutter In Vert', 'enteraddons-pro' ),
                    'imghvr-shutter-in-out-horiz' => esc_html__( 'Shutter In Out Horiz', 'enteraddons-pro' ),
                    'imghvr-shutter-in-out-vert' => esc_html__( 'Shutter In Out Vert', 'enteraddons-pro' ),
                    'imghvr-shutter-in-out-diag-1' => esc_html__( 'Shutter In Out Diag 1', 'enteraddons-pro' ),
                    'imghvr-shutter-in-out-diag-2' => esc_html__( 'Shutter In Out Diag 2', 'enteraddons-pro' ),
                    'imghvr-fold-up' => esc_html__( 'Fold Up', 'enteraddons-pro' ),
                    'imghvr-fold-down' => esc_html__( 'Fold Down', 'enteraddons-pro' ),
                    'imghvr-fold-left' => esc_html__( 'Fold Left', 'enteraddons-pro' ),
                    'imghvr-fold-right' => esc_html__( 'Fold Right', 'enteraddons-pro' ),
                    'imghvr-zoom-in' => esc_html__( 'Zoom In', 'enteraddons-pro' ),
                    'imghvr-zoom-out' => esc_html__( 'Zoom Out', 'enteraddons-pro' ),
                    'imghvr-zoom-out-up' => esc_html__( 'Zoom Out Up', 'enteraddons-pro' ),
                    'imghvr-zoom-out-down' => esc_html__( 'Zoom Out Down', 'enteraddons-pro' ),
                    'imghvr-zoom-out-left' => esc_html__( 'Zoom Out Left', 'enteraddons-pro' ),
                    'imghvr-zoom-out-right' => esc_html__( 'Zoom Out Right', 'enteraddons-pro' ),
                    'imghvr-zoom-out-flip-horiz' => esc_html__( 'Zoom Out Flip Horiz', 'enteraddons-pro' ),
                    'imghvr-zoom-out-flip-vert' => esc_html__( 'Zoom Out Flip Vert', 'enteraddons-pro' ),
                    'imghvr-blur' => esc_html__( 'Blur', 'enteraddons-pro' ),
                ],
            ]
        );

        $this->end_controls_section(); // End Image Swap Content 

        // ----------------------------------------  Ribbon ------------------------------
        $this->start_controls_section(
            'image_ribbon',
            [
                'label' => esc_html__( 'Ribbon', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'ihve_ribbon_switch',
            [
                'label'         => esc_html__( 'Show Ribbon', 'enteraddons-pro' ),
                'type'          => \Elementor\Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Show', 'enteraddons-pro' ),
                'label_off'     => esc_html__( 'Hide', 'enteraddons-pro' ),
                'return_value'  => 'yes',
                'default'       => '',
            ]
        );
        $this->add_control(
            'ihve_ribbon_title',
            [
                'label' => esc_html__( 'Ribbon Title', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'New', 'enteraddons-pro' )
            ]
        );
        $this->end_controls_section(); // End Ribbon

		 /**
         * Style Tab
         * ------------------------------ Content Wrapper Style ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_img_wrapper_style_settings', [
                'label' => esc_html__( 'Wrapper Style', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'img_wrapper_content_horizontal_alignment',
            [
                'label' => esc_html__( 'Content Horizontal Alignment', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => esc_html__( 'Left', 'enteraddons-pro' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'enteraddons-pro' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'end' => [
                        'title' => esc_html__( 'Right', 'enteraddons-pro' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .ea-imghvreffect-wrap .imghvrcontent' => 'align-items: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_responsive_control(
            'img_wrapper_content_vertical_alignment',
            [
                'label' => esc_html__( 'Content Vertical Alignment', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => esc_html__( 'Top', 'enteraddons-pro' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'enteraddons-pro' ),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'end' => [
                        'title' => esc_html__( 'Bottom', 'enteraddons-pro' ),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .ea-imghvreffect-wrap .imghvrcontent' => 'justify-content: {{VALUE}} !important',
                ],
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
                    '{{WRAPPER}} .ea-imghvreffect-wrap' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .ea-imghvreffect-wrap' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .ea-imghvreffect-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .ea-imghvreffect-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'      => 'wrapper_border',
				'label'     => esc_html__( 'Border', 'enteraddons-pro' ),
				'selector'  => '{{WRAPPER}} .ea-imghvreffect-wrap',
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
					'{{WRAPPER}} .ea-imghvreffect-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wrapper_shadow',
				'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
				'selector' => '{{WRAPPER}} .ea-imghvreffect-wrap',
			]
		);
        $this->add_control(
            'img_background_heading',
            [
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'wrapper_background',
				'label' => esc_html__( 'Background', 'enteraddons-pro' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ea-imghvreffect-wrap',
			]
		);
        $this->add_control(
            'img_hover_background_heading',
            [
                'label' => esc_html__( 'Hover Background', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
		$this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'img_hover_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .ea-imghvreffect-wrap .imghvrcontent,{{WRAPPER}} .ea-imghvreffect-wrap:before,{{WRAPPER}} .ea-imghvreffect-wrap:after',
            ]
        );
        $this->end_controls_section();

		/**
         * Style Tab
         * ------------------------------ Image style ------------------------------
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
                    '{{WRAPPER}} .ea-imghvreffect-wrap img' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .ea-imghvreffect-wrap img' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .ea-imghvreffect-wrap img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .ea-imghvreffect-wrap img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'img_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-imghvreffect-wrap img',
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
                    '{{WRAPPER}} .ea-imghvreffect-wrap img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'img_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-imghvreffect-wrap img',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'image_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .ea-imghvreffect-wrap img',
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Title style ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_image_hover_title_style', [
                'label' => esc_html__( 'Title', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .imghvrcontent h2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .imghvrcontent h2',
            ]
        );
        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .imghvrcontent h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .imghvrcontent h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Description style ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_image_hover_description_style', [
                'label' => esc_html__( 'Description', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'description_color',
            [
                'label' => esc_html__( 'Title Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .imghvrcontent p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .imghvrcontent p',
            ]
        );
        $this->add_responsive_control(
            'description_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .imghvrcontent p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'description_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .imghvrcontent p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Link/Button style ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_image_hover_button_style', [
                'label' => esc_html__( 'Button', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        //  Controls tab start
        $this->start_controls_tabs( 'btn_tabs_start' );

        //  Controls tab For Normal
        $this->start_controls_tab(
            'btn_normal',
            [
                'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'btn_color',
            [
                'label' => esc_html__( 'Text Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .imghvrcontent .imghvrbtn-link a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'btn_text_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .imghvrcontent .imghvrbtn-link a',
            ]
        );
        
        $this->add_responsive_control(
            'btn_margin',
            [
                'label' => esc_html__( 'Button Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .imghvrcontent .imghvrbtn-link a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_padding',
            [
                'label' => esc_html__( 'Button Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .imghvrcontent .imghvrbtn-link a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'btn_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .imghvrcontent .imghvrbtn-link a',
            ]
        );
        $this->add_responsive_control(
            'btn_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .imghvrcontent .imghvrbtn-link a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'btn_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .imghvrcontent .imghvrbtn-link a',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'btn_bg_color',
                'label' => esc_html__( 'Button Background Color', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .imghvrcontent .imghvrbtn-link a',
            ]
        );
        $this->end_controls_tab(); // End Controls tab

        //  Controls tab For Hover
        $this->start_controls_tab(
            'btn_hover_normal',
            [
                'label' => esc_html__( 'Hover', 'enteraddons-pro' ),
            ]
        );

        $this->add_control(
            'btn_hover_color',
            [
                'label' => esc_html__( 'Hover Text Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .imghvrcontent .imghvrbtn-link a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'btn_hover_border',
                'label' => esc_html__( 'Hover Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .imghvrcontent .imghvrbtn-link a:hover',
            ]
        );
        $this->add_responsive_control(
            'btn_hover_radius',
            [
                'label' => esc_html__( 'Hover Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .imghvrcontent .imghvrbtn-link a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'btn_hover_box_shadow',
                'label' => esc_html__( 'Hover Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .imghvrcontent .imghvrbtn-link a:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'btn_hover_bg_color',
                'label' => esc_html__( 'Hover Button Background Color', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .imghvrcontent .imghvrbtn-link a:hover',
            ]
        );

        $this->end_controls_tab(); // End Controls tab

        $this->end_controls_tabs(); //  end controls tabs section
        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Icon Style Settings ------------------------------
         *
         */
        $this->start_controls_section(
            'btn_icon_settings', [
                'label' => esc_html__( 'Icon', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs( 'tab_infobox_icon' );
        //  Controls tab For Normal
        $this->start_controls_tab(
            'icon_normal',
            [
                'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .imghvrbtn-link a .imghvrbtn-icons i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_size',
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
                    '{{WRAPPER}} .imghvrbtn-link a .imghvrbtn-icons i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'icon_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .imghvrbtn-link a .imghvrbtn-icons' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        

        $this->end_controls_tab(); // End Controls tab

        //  Controls tab For Hover
        $this->start_controls_tab(
            'icon_hover',
            [
                'label' => esc_html__( 'Hover', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'icon_hover_color',
            [
                'label' => esc_html__( 'Icon Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .imghvrbtn-link a:hover .imghvrbtn-icons i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab(); // End Controls tab

        $this->end_controls_tabs(); //  end controls tabs section
        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Ribbon Style Settings ------------------------------
         *
         */
        $this->start_controls_section(
            'ihve_ribbon_settings', [
                'label' => esc_html__( 'Ribbon', 'enteraddons-pro' ),
                'condition' => [ 'ihve_ribbon_switch' => 'yes' ],
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'ribbon_text_color',
            [
                'label' => esc_html__( 'Text Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ihve-card-ribbon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ribbon_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ihve-card-ribbon',
            ]
        );
        $this->add_responsive_control(
            'ribbon_width',
            [
                'label' => esc_html__( 'Width', 'enteraddons-pro' ),
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
                    'size' => '70',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ihve-card-ribbon' => 'width: {{SIZE}}{{UNIT}};'
                ],
            ]
        );
        $this->add_responsive_control(
            'ribbon_top_bottom_position',
            [
                'label' => esc_html__( 'Top, Bottom Position', 'enteraddons-pro' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -80,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -80,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => '90',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ihve-card-ribbon' => 'top: {{SIZE}}{{UNIT}};'
                ],
            ]
        );
        $this->add_responsive_control(
            'ribbon_left_right_position',
            [
                'label' => esc_html__( 'Left, Right Position', 'enteraddons-pro' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -80,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -80,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => '90',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ihve-card-ribbon' => 'left: {{SIZE}}{{UNIT}};'
                ],
            ]
        );

        $this->add_responsive_control(
            'ribbon_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ihve-card-ribbon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'ribbon_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ihve-card-ribbon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'ribbon_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ihve-card-ribbon',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'ribbon_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .ihve-card-ribbon',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

        // get settings
        $settings = $this->get_settings_for_display();

        // template render
        $obj = new Image_Hover_Effect_Template();
        $obj::setDisplaySettings( $settings );
        $obj->renderTemplate();

    }

    public function get_style_depends() {
        return [ 'enteraddons-global-style','imagehover' ];
    }

}
