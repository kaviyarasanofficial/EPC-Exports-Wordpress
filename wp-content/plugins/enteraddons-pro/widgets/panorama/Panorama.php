<?php
namespace EnteraddonsPro\Widgets\Panorama;

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

class Panorama extends Widget_Base {
    
	public function get_name() {
		return 'enteraddons-panorama';
	}

	public function get_title() {
		return esc_html__( 'Panorama Viewer', 'enteraddons-pro' );
	}

	public function get_icon() {
		return 'entera entera-panorama';
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
            'title_one',
            [
                'label' => esc_html__( 'Title One', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => ''
            ]
        );
        $this->add_control(
            'title_two',
            [
                'label' => esc_html__( 'Title Two', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => ''
            ]
        );
        
        $this->end_controls_section(); // End Image Swap Content

		// ----------------------------------------  hot spots content ------------------------------

        $this->start_controls_section(
            'panorama_hot_spots',
            [
                'label' => esc_html__( 'Hot Spots', 'enteraddons-pro' ),
            ]
        );

        $this->add_control(
            'hot_spots_switch',
            [
                'label' => esc_html__( 'Show Hot Spots', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'enteraddons-pro' ),
                'label_off' => esc_html__( 'No', 'enteraddons-pro' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        // Reapeater Category Filter 
        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
            'text', [
                'label' => esc_html__( 'Title', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Title goes to here' , 'enteraddons-pro' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'type',
            [
                'label' => esc_html__( 'Type', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'info',
                'options' => [
                    'info' => esc_html__( 'Info', 'enteraddons-pro' ),
                    'scene' => esc_html__( 'Scene', 'enteraddons-pro' )
                    
                ]
            ]
        );
        $repeater->add_control(
            'URL',
            [
                'label' => esc_html__( 'Url', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'pitch',
            [
                'label' => esc_html__( 'Pitch', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
            ]
        );
        $repeater->add_control(
            'yaw',
            [
                'label' => esc_html__( 'Yaw', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
            ]
        );
        
        $this->add_control(
            'hot_spots',
            [
                'label' => esc_html__( 'Add Hot Spots', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'condition' => [ 'hot_spots_switch' => 'yes' ],
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ text }}}',
                'default' => [
                    [
                        'text'   => esc_html__( 'Title goes to here', 'enteraddons-pro' ),
                    ],
                    
                ]
            ]
        );

        $this->end_controls_section(); // End hot spot Content 

        // ----------------------------------------  Option content ------------------------------

        $this->start_controls_section(
            'control_option',
            [
                'label' => esc_html__( 'Option', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'autoload',
            [
                'label' => esc_html__( 'Auto Load', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'enteraddons-pro' ),
                'label_off' => esc_html__( 'No', 'enteraddons-pro' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'showzoomctrl',
            [
                'label' => esc_html__( 'Show Zoom Ctrl', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'enteraddons-pro' ),
                'label_off' => esc_html__( 'No', 'enteraddons-pro' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'showcontrols',
            [
                'label' => esc_html__( 'Show Controls', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'enteraddons-pro' ),
                'label_off' => esc_html__( 'No', 'enteraddons-pro' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section(); // End Option Content 

		/**
         * Style Tab
         * ------------------------------ Wrapper Wrapper Style ------------------------------
         *
         */
        
        $this->start_controls_section(
            'panorama_wrapper_style_settings', [
                'label' => esc_html__( 'Wrapper Style', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'panorama_alignment',
            [
                'label' => esc_html__( 'Image Alignment', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .ea-panorama-360-wrap' => 'display: flex;justify-content: {{VALUE}} !important',
                ],
            ]
        );
		$this->add_responsive_control(
            'panorama_wrapper_width',
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
                    '{{WRAPPER}} .ea-panorama-360-wrap' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'panorama_wrapper_height',
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
                    '{{WRAPPER}} .ea-panorama-360-wrap' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		$this->add_responsive_control(
			'panorama_wrapper_margin',
			[
				'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-panorama-360-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'panorama_wrapper_padding',
			[
				'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-panorama-360-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'      => 'panorama_wrapper_border',
				'label'     => esc_html__( 'Border', 'enteraddons-pro' ),
				'selector'  => '{{WRAPPER}} .ea-panorama-360-wrap',
			]
		);
		$this->add_responsive_control(
			'panorama_wrapper_radius',
			[
				'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-panorama-360-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'panorama_wrapper_shadow',
				'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
				'selector' => '{{WRAPPER}} .ea-panorama-360-wrap',
			]
		); 
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'panorama_wrapper_background',
				'label' => esc_html__( 'Background', 'enteraddons-pro' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ea-panorama-360-wrap',
			]
		);
		
        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Image Style ------------------------------
         *
         */
        $this->start_controls_section(
            'panorama_img_style_settings', [
                'label' => esc_html__( 'Image Style', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'panorama_img_width',
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
                    '{{WRAPPER}} .ea-panorama-360-view' => 'width: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'panorama_img_height',
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
                    'unit' => 'px',
                    'size' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ea-panorama-360-view' => 'height: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );
           
        $this->add_responsive_control(
            'panorama_img_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-panorama-360-view' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'panorama_img_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-panorama-360-view' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'      => 'wrapper_border',
                'label'     => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector'  => '{{WRAPPER}} .ea-panorama-360-view',
            ]
        );
        $this->add_responsive_control(
            'panorama_img_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-panorama-360-view' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'panorama_img_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-panorama-360-view',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'panorama_img_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .ea-panorama-360-view',
            ]
        );
        
        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------  Style ------------------------------
         *
         */
        $this->start_controls_section(
            'info_style_settings', [
                'label' => esc_html__( 'Info Style', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'info_area_tb_position',
            [
                'label' => esc_html__( 'Top, Bottom Position', 'enteraddons' ),
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
                    '{{WRAPPER}} .pnlm-panorama-info' => 'bottom:auto;top: {{SIZE}}{{UNIT}};'
                ],
            ]
        );
        $this->add_responsive_control(
            'info_area_lr_position',
            [
                'label' => esc_html__( 'Left, Right Position', 'enteraddons' ),
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
                    '{{WRAPPER}} .pnlm-panorama-info' => 'left: {{SIZE}}{{UNIT}};'
                ],
            ]
        );
        /******* Start ********/

        $this->start_controls_tabs( 'info_area_tabs' );

        // Controls tab For area
        $this->start_controls_tab(
            'info_area_tab',
            [
                'label' => esc_html__( 'Info Area', 'enteraddons-pro' ),
            ]
        );

        $this->add_responsive_control(
            'info_area_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .pnlm-panorama-info' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'info_area_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .pnlm-panorama-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'      => 'info_area_border',
                'label'     => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector'  => '{{WRAPPER}} .pnlm-panorama-info',
            ]
        );
        $this->add_responsive_control(
            'info_area_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .pnlm-panorama-info' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'info_area_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .pnlm-panorama-info',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'info_area_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .pnlm-panorama-info',
            ]
        );


        $this->end_controls_tab(); // Info Area tab

        /******* End ********/

        /******* Start ********/

        //  Controls tab For Hover
        $this->start_controls_tab(
            'info_text_tab',
            [
                'label' => esc_html__( 'Text', 'enteraddons-pro' ),
            ]
        );

        $this->add_control(
            'title_one_color',
            [
                'label' => esc_html__( 'Title One Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pnlm-panorama-info .pnlm-title-box' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_one_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .pnlm-panorama-info .pnlm-title-box',
            ]
        );

        $this->add_control(
            'title_two_color',
            [
                'label' => esc_html__( 'Title Two Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pnlm-panorama-info .pnlm-author-box' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_two_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .pnlm-panorama-info .pnlm-author-box',
            ]
        );

        $this->end_controls_tab(); // Info Area tab


        /******* End ********/
        $this->end_controls_section();


	}

	protected function render() {

        // get settings
        $settings = $this->get_settings_for_display();

        // template render
        $obj = new Panorama_Template();
        $obj::setDisplaySettings( $settings );
        $obj->renderTemplate();

    }

    public function get_script_depends() {
        return [ 'pannellum', 'enteraddons-pro-main' ];
    }
    
    public function get_style_depends() {
        return [ 'enteraddons-global-style', 'pannellum' ];
    }

}
