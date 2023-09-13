<?php
namespace EnteraddonsPro\Widgets\Modal_Popup;

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
 * Enteraddons elementor Modal Popup Widget.
 *
 * @since 1.0
 *
 * 
 */

class Modal_Popup extends Widget_Base {
    
	public function get_name() {
		return 'enteraddons-modal-popup';
	}

	public function get_title() {
		return esc_html__( 'Modal Popup', 'enteraddons-pro' );
	}

	public function get_icon() {
		return 'entera entera-modal-popup';
	}

	public function get_categories() {
		return ['enteraddons-pro-elements-category'];
	}

	protected function register_controls() {

        // ----------------------------------------  Modal Trigger Content ------------------------------
        $this->start_controls_section(
            'enteraddons_modal_trigger_content_settings',
            [
                'label' => esc_html__( 'Modal Trigger Content', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
			'trigger_type',
			[
				'label' => esc_html__( 'Trigger Type', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'button',
				'options' => [
					'button' => esc_html__( 'Button', 'enteraddons-pro' ),
					'image' => esc_html__( 'Image', 'enteraddons-pro' ),
						
				],

			]
		);
        $this->add_control(
			'trigger_type_effect',
			[
				'label' => esc_html__( 'Image Effect Type', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::SELECT,
                'condition' => ['trigger_type' => 'image'],
				'default' => 'ea-trigger-eff2',
				'options' => [
					'ea-trigger-eff2' => esc_html__( 'Shine', 'enteraddons-pro' ),
					'ea-trigger-eff3' => esc_html__( 'Flashing', 'enteraddons-pro' ),
					'ea-trigger-eff1'  => esc_html__( 'Circle', 'enteraddons-pro' ),
					''  => esc_html__( 'None', 'enteraddons-pro' ),
						
				],

			]
		);
		$this->add_control(
            'button_title',
            [
                'label' => esc_html__( 'Button Title', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => ['trigger_type' => 'button'],
                'label_block' => true,
                'default' => esc_html__('View More','enteraddons-pro')
            ]
        );
		$this->add_control(
            'trigger_image',
            [
                'label' => esc_html__( 'Image', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
				'condition' => ['trigger_type' => 'image'],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'trigger_title',
            [
                'label' => esc_html__( 'Title', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => ['trigger_type' => 'image'],
                'label_block' => true,
                'default' => esc_html__('Rahi Saiful','enteraddons-pro')
            ]
        );
        $this->add_control(
            'trigger_subtitle',
            [
                'label' => esc_html__( 'Sub Title', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => ['trigger_type' => 'image'],
                'label_block' => true,
                'default' => esc_html__('WP Developer','enteraddons-pro')
            ]
        );
		$this->end_controls_section(); // End Modal Trigger Content

		// ----------------------------------------  Modal Popup Content ------------------------------
		$this->start_controls_section(
            'enteraddons_modal_popup_content_settings',
            [
                'label' => esc_html__( 'Modal Popup Content', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
			'modal_effect_style',
			[
				'label' => esc_html__( 'Modal Effect Style', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'fade',
				'options' => [
					'fade' => esc_html__( 'Fade', 'enteraddons-pro' ),
					'newspaper'  => esc_html__( 'Newspaper', 'enteraddons-pro' ),
					'slide-in-top' => esc_html__( 'Slide-In-Top', 'enteraddons-pro' ),
					'slide-in-left' => esc_html__( 'Slide-In-left', 'enteraddons-pro' ),
					'slide-in-right' => esc_html__( 'Slide-In-Right', 'enteraddons-pro' ),
					'slide-in-bottom' => esc_html__( 'Slide-In-Bottom', 'enteraddons-pro' ),
					'expand-horiz' => esc_html__( 'Expand-Horiz', 'enteraddons-pro' ),
					'expand-vert' => esc_html__( 'Expand-Vert', 'enteraddons-pro' ),
					'sticky-top' => esc_html__( 'Sticky-Top', 'enteraddons-pro' ),
					'sticky-bottom' => esc_html__( 'Sticky-Bottom', 'enteraddons-pro' ),
					'rotate-top' => esc_html__( 'Rotate-Top', 'enteraddons-pro' ),
					'rotate-bottom' => esc_html__( 'Rotate-Bottom', 'enteraddons-pro' ),
					
				],

			]
		);
		$this->add_control(
			'header_show',
			[
				'label' => esc_html__( 'Show Header', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'enteraddons-pro' ),
				'label_off' => esc_html__( 'Hide', 'enteraddons-pro' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
            'header_title',
            [
                'label' => esc_html__( 'Header', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => ['header_show' => 'yes'],
                'label_block' => true,
                'default' => esc_html__('Enteraddons-Pro','enteraddons-pro')
            ]
        );
        $this->add_control(
			'content_type',
			[
				'label' => esc_html__( 'Content Type', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'content',
				'options' => [
					'content' => esc_html__( 'Content', 'enteraddons-pro' ),
					'template'  => esc_html__( 'Template', 'enteraddons-pro' ),
				],

			]
		);
        $this->add_control(
			'template_id',
			[
				'label' => esc_html__( 'Templates', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'condition' => [ 'content_type' => 'template' ],
				'options' => \Enteraddons\Classes\Helper::getElementorTemplates(),
			]
		);
		
		$this->add_control(
			'modal_popup_image_show',
			[
				'label' => esc_html__( 'Show Image', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'condition' => [ 'content_type' => 'content' ],
				'label_on' => esc_html__( 'Show', 'enteraddons-pro' ),
				'label_off' => esc_html__( 'Hide', 'enteraddons-pro' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'modal_layout',
			[
				'label' => esc_html__( 'Image Layout', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'condition' => [ 'modal_popup_image_show' => 'yes', 'content_type' => 'content' ],
				'default' => '',
				'options' => [
					'ea-modal-layout' => esc_html__( 'Horizontal', 'enteraddons-pro' ),
					''  => esc_html__( 'Vertical', 'enteraddons-pro' ),
						
				],

			]
		);
		$this->add_control(
            'modal_image',
            [
                'label' => esc_html__( 'Image', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'modal_popup_image_show' => 'yes',
					'content_type' => 'content'
				],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
		$this->add_control(
            'modal_title',
            [
                'label' => esc_html__( 'Title', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [ 'content_type' => 'content' ],
                'label_block' => true,
                'default' => esc_html__('Rahi Saiful','enteraddons-pro')
            ]
        );
		$this->add_control(
            'modal_subtitle',
            [
                'label' => esc_html__( 'Sub Title', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [ 'content_type' => 'content' ],
                'label_block' => true,
                'default' => esc_html__('WP Developer','enteraddons-pro')
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__( 'Icon', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-facebook',
                    'library' => 'fa-solid',
                ],
            ]
        );
        $repeater->add_control(
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
            'social_icon',
            [
                'label' => esc_html__( 'Social Icon', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'condition' => [ 'content_type' => 'content' ],
                'fields' => $repeater->get_controls(),
                'prevent_empty' => false,
                'default' => [
                    [
                        'icon' => [
                            'value' => 'fab fa-facebook-square',
                            'library' => 'fa-solid',
                        ],
                        
                    ],
                    [
                        'icon' => [
                            'value' => 'fab fa-twitter-square',
                            'library' => 'fa-solid',
                        ],
                        
                    ],
                    [
                        'icon' => [
                            'value' => 'fab fa-linkedin',
                            'library' => 'fa-solid',
                        ],
                        
                    ],
                    [
                        'icon' => [
                            'value' => 'fab fa-google-plus-square',
                            'library' => 'fa-solid',
                        ],
                        
                    ],
                    
                    
                ]
            ]
        );
		$this->add_control(
			'modal_description',
			[
				'label' => esc_html__( 'Description', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'condition' => [ 'content_type' => 'content' ],
				'rows' => 10,
				'default' => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                Lorem Ipsum has been the industry s standard dummy text ever since the 1500s,
                 when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                  It has survived not only five centuries, but also the leap into electronic typesetting,
                   remaining essentially unchanged', 'enteraddons-pro' ),
			]
		);
        $this->add_control(
            'more_link',
            [
                'label' => esc_html__( 'Button Link', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::URL,
                'condition' => [ 'content_type' => 'content' ],
                'placeholder' => esc_html__( 'https://your-link.com', 'enteraddons-pro' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'link_label',
            [
                'label' => esc_html__( 'Button Label', 'enteraddons-pro' ),
                'condition' => [ 'content_type' => 'content' ],
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true
            ]
        );
        $this->end_controls_section(); // End Modal Popup Content

        // ---------------------------------------- Modal Popup Close Button ------------------------------
		$this->start_controls_section(
            'enteraddons_modal_popup_close_button_icon_settings',
            [
                'label' => esc_html__( 'Modal Popup Close Button Icon', 'enteraddons-pro' ),
            ]
        );
		$this->add_control(
            'close_icon',
            [
                'label' => esc_html__( 'Close Icon', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-times',
                    'library' => 'fa-solid',
                ],
            ]
        );
        $this->end_controls_section(); // End Modal Popup Content

		/**
         * Style Tab
         * ------------------------------ Trigger Button Style ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_trigger_button_settings', [
                'label' => esc_html__( 'Trigger Button', 'enteraddons-pro' ),
				'condition' => ['trigger_type' => 'button'],
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs( 'tab_button' );

        //  Controls tab For Normal
        $this->start_controls_tab(
            'button_normal',
            [
                'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
            ]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .ea-modal-wrapper .ea-modal-btn',
			]
		);
		$this->add_responsive_control(
			'button_margin',
			[
				'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-modal-wrapper .ea-modal-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'button_padding',
			[
				'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-modal-wrapper .ea-modal-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'      => 'button_border',
				'label'     => esc_html__( 'Border', 'enteraddons-pro' ),
				'selector'  => '{{WRAPPER}} .ea-modal-wrapper .ea-modal-btn',
			]
		);
		$this->add_responsive_control(
			'button_radius',
			[
				'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-modal-wrapper .ea-modal-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_shadow',
				'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
				'selector' => '{{WRAPPER}} .ea-modal-wrapper .ea-modal-btn',
			]
		); 
		$this->add_control(
			'button_text_color',
			[
				'label' => esc_html__( 'Color', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ea-modal-wrapper .ea-modal-btn' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_background',
				'label' => esc_html__( 'Background', 'enteraddons-pro' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ea-modal-wrapper .ea-modal-btn',
			]
		);
		$this->add_responsive_control(
			'btn_alignment',
			[
				'label' => esc_html__( 'Button Alignment', 'enteraddons-pro' ),
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
					'{{WRAPPER}} .ea-btn-wrapper' => 'text-align: {{VALUE}} ',
				],
			]
		);
        $this->end_controls_tab(); // End Controls tab

        //  Controls tab For Hover
        $this->start_controls_tab(
            'btn_hover',
            [
                'label' => esc_html__( 'Hover', 'enteraddons-pro' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'      => 'button_hover_border',
                'label'     => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector'  => '{{WRAPPER}} .ea-modal-wrapper .ea-modal-btn:hover',
            ]
        );
        $this->add_responsive_control(
            'button_hover_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-modal-wrapper .ea-modal-btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_hover_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-modal-wrapper .ea-modal-btn:hover',
            ]
        ); 
        $this->add_control(
            'button_hover_text_color',
            [
                'label' => esc_html__( 'Hover Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-modal-wrapper .ea-modal-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'button_hover_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .ea-modal-wrapper .ea-modal-btn:hover',
            ]
        );
        $this->end_controls_tab(); // End Controls tab
        $this->end_controls_tabs(); //  end controls tabs section
        $this->end_controls_section();

		 /**
         * Style Tab
         * ------------------------------ Modal Trigger Image Content Style ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_trigger_image_style', [
                'label' => esc_html__( 'Trigger Content Style', 'enteraddons-pro' ),
				'condition' => ['trigger_type' => 'image'],
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
			'trigger_image_options',
			[
				'label' => esc_html__( 'Image', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
        $this->add_responsive_control(
            'trigger_img_width',
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
                    'unit' => 'px',

                ],
                'selectors' => [
                    '{{WRAPPER}} .ea-modal-wrapper .ea-trigger-img-main' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'trigger_img_height',
            [
                'label' => esc_html__( 'Image Height', 'enteraddons-pro' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px','%'],
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
                    '{{WRAPPER}} .ea-modal-wrapper .ea-trigger-img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );   
        $this->add_responsive_control(
            'trigger_img_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-modal-wrapper .ea-trigger-img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'trigger_img_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-modal-wrapper .ea-trigger-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'trigger_img_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-modal-wrapper .ea-trigger-img',
            ]
        );
        $this->add_responsive_control(
            'trigger_img_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-modal-wrapper .ea-trigger-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'trigger_img_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-modal-wrapper .ea-trigger-img',
            ]
        );
        $this->add_control(
			'trigger_content_options',
			[
				'label' => esc_html__( 'Content Wrapper', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_responsive_control(
            'trigger_content_padding',
            [
                'label' => esc_html__( ' Content Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-trigger-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'trigger_title_alignment',
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
                    '{{WRAPPER}} .ea-trigger-content' => 'text-align: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'trigger_content_shadow',
				'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
				'selector' => '{{WRAPPER}} .ea-trigger-content',
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'trigger_wrapper_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .trigger-img-wrapper',
            ]
        );
        $this->add_control(
			'trigger_title_options',
			[
				'label' => esc_html__( 'Title', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
            'trigger_title_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-trigger-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'trigger_title_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-trigger-title',
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'trigger_title_stroke',
				'selector' => '{{WRAPPER}} .ea-trigger-title',
			]
		);
        $this->add_responsive_control(
            'trigger_title_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-trigger-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
			'trigger_title_after_options',
			[
				'label' => esc_html__( 'Title After', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
            'title_after_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-trigger-title:after ' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_after_width',
            [
                'label' => esc_html__( 'Width', 'enteraddons-pro' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
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
                    '{{WRAPPER}}  .ea-trigger-title:after ' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_after_height',
            [
                'label' => esc_html__( 'Height', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .ea-trigger-title:after' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_after_offset_y',
            [
                'label'      => esc_html__('Offset Y', 'enteraddons-pro'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => -1000,
                        'max'  => 1000,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .ea-trigger-title:after'=> 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_after_x',
            [
                'label'      => esc_html__('Offset X', 'enteraddons-pro'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => -1000,
                        'max'  => 1000,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .ea-trigger-title:after' => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
			'trigger_subtitle_options',
			[
				'label' => esc_html__( ' Sub Title', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
            'trigger_subtitle_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-trigger-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'trigger_subtitle_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-trigger-subtitle',
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'trigger_subtitle_stroke',
				'selector' => '{{WRAPPER}} .ea-trigger-subtitle',
			]
		);
        $this->add_responsive_control(
            'trigger_subtitle_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-trigger-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

		 /**
         * Style Tab
         * ------------------------------ Modal Popup Wrapper Style ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_modal_wrapper_style_settings', [
                'label' => esc_html__( 'Popup Wrapper Style', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_responsive_control(
            'popup_wrapper_width',
            [
                'label' => esc_html__( 'Popup Width', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .ea-modal .ea-modal-dialog' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .ea-modal .ea-modal-dialog' => 'min-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		$this->add_responsive_control(
            'popup_wrapper_height',
            [
                'label' => esc_html__( 'Popup Height', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .ea-modal .ea-modal-dialog' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .ea-modal .ea-modal-dialog' => 'min-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		$this->add_responsive_control(
			'popup_wrapper_padding',
			[
				'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-modal .ea-modal-dialog' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'      => 'popup_wrapper_border',
				'label'     => esc_html__( 'Border', 'enteraddons-pro' ),
				'selector'  => '{{WRAPPER}} .ea-modal .ea-modal-dialog',
			]
		);
		$this->add_responsive_control(
			'popup_wrapper_radius',
			[
				'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-modal .ea-modal-dialog' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'popup_wrapper_shadow',
				'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
				'selector' => '{{WRAPPER}} .ea-modal .ea-modal-dialog',
			]
		); 
		$this->add_control(
			'popup_overlay_color',
			[
				'label' => esc_html__( 'Overlay Color', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ea-modal' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'popup_wrapper_background',
				'label' => esc_html__( 'Background', 'enteraddons-pro' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ea-modal .ea-modal-dialog',
			]
		);
        $this->end_controls_section();

		/**
         * Style Tab
         * ------------------------------ Modal Popup Header Style ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_popup_header_style_settings', [
                'label' => esc_html__( 'Popup Header Style', 'enteraddons-pro' ),
				'condition' => ['header_show' => 'yes'],
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'popup_header_typography',
				'selector' => '{{WRAPPER}} .ea-modal .ea-modal-dialog .ea-modal-header h4',
			]
		);
		$this->add_responsive_control(
			'popup_header_margin',
			[
				'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-modal .ea-modal-dialog .ea-modal-header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'popup_header_padding',
			[
				'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-modal .ea-modal-dialog .ea-modal-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'      => 'popup_header_border',
				'label'     => esc_html__( 'Border', 'enteraddons-pro' ),
				'selector'  => '{{WRAPPER}} .ea-modal .ea-modal-dialog .ea-modal-header',
			]
		);
		$this->add_responsive_control(
			'popup_header_radius',
			[
				'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-modal .ea-modal-dialog .ea-modal-header' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'popup_header_shadow',
				'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
				'selector' => '{{WRAPPER}} .ea-modal .ea-modal-dialog .ea-modal-header',
			]
		); 
		$this->add_control(
			'popup_header_color',
			[
				'label' => esc_html__( 'Color', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ea-modal .ea-modal-dialog .ea-modal-header h4' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'popup_header_background',
				'label' => esc_html__( 'Background', 'enteraddons-pro' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ea-modal .ea-modal-dialog .ea-modal-header',
			]
		);
        $this->end_controls_section();

		//------------------------------ Popup Content Style ------------------------------

        $this->start_controls_section(
            'enteraddons_popup_content_style', [
                'label' => esc_html__( ' Popup Content Style', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
			'popup_content_wrapper',
			[
				'label' => esc_html__( 'Popup Content Wrapper', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_responsive_control(
            'popup_content_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-modal-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'popup_content_padding',
            [
                'label' => esc_html__( 'Content Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-modal-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
			'popup_content_title',
			[
				'label' => esc_html__( 'Title', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-modal-body .ea-modal-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-modal-body .ea-modal-title',
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
                    '{{WRAPPER}} .ea-modal-body .ea-modal-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->add_responsive_control(
			'popup_title_alignment',
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
					'{{WRAPPER}} .ea-modal-body .ea-modal-title' => 'text-align: {{VALUE}} ',
				],
			]
		);
        $this->add_control(
			'popup_content_subtitle',
			[
				'label' => esc_html__( 'Sub Title', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-modal-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-modal-subtitle',
            ]
        );
        $this->add_responsive_control(
            'subtitle_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-modal-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        ); 
		$this->add_responsive_control(
			'popup_subtitle_alignment',
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
					'{{WRAPPER}} .ea-modal-subtitle' => 'text-align: {{VALUE}} ',
				],
			]
		);
        $this->add_control(
			'popup_content_description',
			[
				'label' => esc_html__( 'Description', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
            'description_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-modal-description' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-modal-description',
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
                    '{{WRAPPER}} .ea-modal-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .ea-modal-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->add_responsive_control(
			'popup_description_alignment',
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
					'{{WRAPPER}}  .ea-modal-description' => 'text-align: {{VALUE}} ',
				],
			]
		);
        $this->end_controls_section();
		/**
         * Style Tab
         * ------------------------------ Modal Popup Image Style ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_popup_image_style', [
                'label' => esc_html__( 'Popup Image Style', 'enteraddons-pro' ),
				'condition' => ['modal_popup_image_show' => 'yes',],
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'popup_img_width',
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
                    '{{WRAPPER}} .ea-modal-img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'popup_img_height',
            [
                'label' => esc_html__( 'Image Height', 'enteraddons-pro' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px','%'],
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
                    '{{WRAPPER}} .ea-modal-img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );   
        $this->add_responsive_control(
            'popup_img_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-modal-img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'popup_img_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-modal-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'popup_img_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-modal-img',
            ]
        );
        $this->add_responsive_control(
            'popup_img_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-modal-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'popup_img_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-modal-img',
            ]
        );
        $this->add_responsive_control(
            'popup_modal_image_alignment',
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
                    '{{WRAPPER}} .ea-modal-img-wrapper' => 'text-align: {{VALUE}} !important',
                ],
            ]
        );
        $this->end_controls_section();
        /**
         * Style Tab
         * ------------------------------ Social  Icon Style Settings ------------------------------
         *
         */
        $this->start_controls_section(
            'social_icon_style_settings', [
                'label' => esc_html__( 'Social Icon Style', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs( 'tab_icon_wrap' );
        //  Controls tab For Normal
        $this->start_controls_tab(
            'icon_normal',
            [
                'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
            ]
        );
        $this->add_responsive_control(
            'social_icon_width',
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
                
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-modal-icon a' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_icon_height',
            [
                'label' => esc_html__( 'Height', 'enteraddons-pro' ),
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
                
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-modal-icon a' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_icon_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-modal-icon a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_icon_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-modal-icon a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'social_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-modal-icon a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_icon_size',
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
                    '{{WRAPPER}} .enteraddons-modal-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'social_icon_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-modal-icon a',
            ]
        );
        $this->add_responsive_control(
            'social_icon_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-modal-icon a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'social_icon_box_bg',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .enteraddons-modal-icon a',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'social_icon_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-modal-icon a',
            ]
        );
        $this->add_responsive_control(
            'popup_icon_alignment',
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
                    '{{WRAPPER}} .enteraddons-modal-icon' => 'justify-content: {{VALUE}} !important',
                ],
            ]
        );
        $this->end_controls_tab(); // End Controls tab

        //  Controls tab For Hover
        $this->start_controls_tab(
            'social_icon_hover',
            [
                'label' => esc_html__( 'Hover', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'social_icon_hover_color',
            [
                'label' => esc_html__( 'Icon Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-modal-icon a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'social_icon_hover_box_bg',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .enteraddons-modal-icon a:hover ',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'social_icon_hover_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-modal-icon a:hover',
            ]
        );
        $this->end_controls_tab(); // End Controls tab
        $this->end_controls_tabs(); //  end controls tabs section
        $this->end_controls_section(); 
        /**
         * Style Tab
         * ------------------------------ Modal Popup Button  Style ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_popup_button_style', [
                'label' => esc_html__( 'Button Style', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs( 'tab_popup_button' );

        //  Controls tab For Normal
        $this->start_controls_tab(
            'popup_button_normal',
            [
                'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
            ]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'popup_button_typography',
				'selector' => '{{WRAPPER}} .ea-modal-button',
			]
		);
		$this->add_responsive_control(
			'popup_button_margin',
			[
				'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-modal-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'popup_button_padding',
			[
				'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-modal-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'      => 'popup_button_border',
				'label'     => esc_html__( 'Border', 'enteraddons-pro' ),
				'selector'  => '{{WRAPPER}} .ea-modal-button',
			]
		);
		$this->add_responsive_control(
			'popup_button_radius',
			[
				'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
				'type' => Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ea-modal-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'popup_button_shadow',
				'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
				'selector' => '{{WRAPPER}} .ea-modal-button',
			]
		); 
		$this->add_control(
			'popup_button_text_color',
			[
				'label' => esc_html__( 'Color', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ea-modal-button' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'popup_button_background',
				'label' => esc_html__( 'Background', 'enteraddons-pro' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ea-modal-button',
			]
		);
        $this->add_responsive_control(
            'popup_button_alignment',
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
                    '{{WRAPPER}} .ea-popup-button' => 'text-align: {{VALUE}} !important',
                ],
            ]
        );
        $this->end_controls_tab(); // End Controls tab

        //  Controls tab For Hover
        $this->start_controls_tab(
            'popup_btn_hover',
            [
                'label' => esc_html__( 'Hover', 'enteraddons-pro' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'      => 'popup_button_hover_border',
                'label'     => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector'  => '{{WRAPPER}} .ea-modal-button:hover',
            ]
        );
        $this->add_responsive_control(
            'popup_button_hover_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-modal-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'popup_button_hover_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-modal-button:hover',
            ]
        ); 
        $this->add_control(
            'popup_button_hover_text_color',
            [
                'label' => esc_html__( 'Hover Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-modal-button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'popup_button_hover_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .ea-modal-button:hover',
            ]
        );
        $this->end_controls_tab(); // End Controls tab
        $this->end_controls_tabs(); //  end controls tabs section
        $this->end_controls_section();

        //------------------------------ Modal Close Icon Style ------------------------------
        $this->start_controls_section(
            'enteraddons_modal_close_icon_style', [
                'label' => esc_html__( 'Close Icon Style', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_responsive_control(
            'close_icon_top',
            [
                'label'      => esc_html__('Top', 'enteraddons-pro'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => -1000,
                        'max'  => 1000,
                        'step' => 5,
                    ],
                    '%'  => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'default'    => [
                    'unit' => '%',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .ea-modal-close'=> 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		$this->add_responsive_control(
            'close_icon_left',
            [
                'label'      => esc_html__('Left', 'enteraddons-pro'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => -1000,
                        'max'  => 1000,
                        'step' => 5,
                    ],
                    '%'  => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'default'    => [
                    'unit' => '%',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .ea-modal-close'=> 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_wrapper_width',
            [
                'label' => esc_html__( 'Icon Wrapper Width', 'enteraddons-pro' ),
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
                
                'selectors' => [
                    '{{WRAPPER}} .ea-modal-close' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_wrapper_height',
            [
                'label' => esc_html__( 'Icon Wrapper Height', 'enteraddons-pro' ),
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
                
                'selectors' => [
                    '{{WRAPPER}} .ea-modal-close' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'modal_close_icon_size',
            [
                'label' => esc_html__( 'Font Size', 'enteraddons-pro' ),
                'type' => Controls_Manager::SLIDER,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
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
                    'unit' => 'px',
                    'size' => 15,
                ],
                'selectors' => [
                    '{{WRAPPER}} .ea-modal-close i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'modal_close_icon_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-modal-close' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'modal_close_icon_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-modal-close' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'modal_close_icon_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-modal-close',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'modal_close_icon_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-modal-close',
            ]
        );
        $this->add_responsive_control(
            'modal_close_icon_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-modal-close' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->add_control(
            'modal_close_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-modal-close i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'modal_close_icon_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .ea-modal-close',
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {

        // get settings
        $settings = $this->get_settings_for_display();

        // Template render
        $obj = new Modal_Popup_Template();
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
