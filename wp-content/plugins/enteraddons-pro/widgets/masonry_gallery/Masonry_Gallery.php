<?php
namespace EnteraddonsPro\Widgets\Masonry_Gallery;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *
 * Enteraddons elementor Masonry Gallery widget.
 *
 * @since 1.0
 */

class Masonry_Gallery extends Widget_Base {
    
	public function get_name() {
		return 'enteraddons-masonry-gallery';
	}

	public function get_title() {
		return esc_html__( 'Masonry Gallery', 'enteraddons-pro' );
	}

	public function get_icon() {
		return 'entera entera-masonry-gallery';
	}

	public function get_categories() {
		return ['enteraddons-pro-elements-category'];
	}

	protected function register_controls() {

        // ----------------------------------------  Masonry Gallery content ------------------------------
        $this->start_controls_section(
            'enteraddons_masonry_gallery_content_settings',
            [
                'label' => esc_html__( 'Masonry Gallery Content', 'enteraddons-pro' ),
            ]
        );

        $this->add_control(
            'gallery_style',
            [
                'label' => esc_html__( 'Gallery Style', 'enteraddons-pro' ),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1'  => esc_html__( 'Category Tab', 'enteraddons-pro' ),
                    '2' => esc_html__( 'Gallery', 'enteraddons-pro' ),
                ],
            ]
        );

        $this->add_control(
			'show_button',
			[
				'label' => esc_html__( 'Show Button', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
                'condition' => [ 'gallery_style' =>'2'  ],
				'label_on' => esc_html__( 'Show', 'enteraddons-pro' ),
				'label_off' => esc_html__( 'Hide', 'enteraddons-pro' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        $this->add_responsive_control(
			'gallery_column',
			[
				'label' => esc_html__( 'Gallery Column', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
                'condition' => [ 'gallery_style' =>'1'  ],
				'size_units' => [ 'px','%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 5,
					],
                    '%' => [
						'min' => 0,
						'max' => 100,
					],
					
				],
				'default' => [
					'unit' => '%',	
				],
				'selectors' => [
					'{{WRAPPER}} .ea-grid-item'  => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
            'gallery_gutter',
            [
                'label' => esc_html__( 'Gutter', 'enteraddons-pro' ),
                'condition' => [ 'gallery_style' =>'1'  ],
                'type' => \Elementor\Controls_Manager::NUMBER,
                'label_block' => false,
                'default' => 0
            ]
        );

        // Reapeater Category Filter 
        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
            'filter_btn_title', [
                'label' => esc_html__( 'Filter Button Title', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'UI/UX DESIGN' , 'enteraddons-pro' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
			'gallery_image',
			[
				'label' => esc_html__( 'Add Images', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'show_label' => false,
				'default' => [],
			]
		);
        
        $this->add_control(
            'filter_btn_settings',
            [
                'label' => esc_html__( 'Filter Menu List', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ filter_btn_title }}}',
                'condition' => [ 'gallery_style' =>'1'  ],
                'default' => [
                    [
                        'filter_btn_title'   => esc_html__( 'UI/UX DESIGN', 'enteraddons-pro' ),
                    ],
                    
                ]
            ]
        );

        // Repeater for Masonary Gallery
         $repeater_gallery = new \Elementor\Repeater();
    
         $repeater_gallery->add_control(
			'masonary_gallery_image',
			[
				'label' => esc_html__( 'Choose Image', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater_gallery->add_control(
            'gallery_image_title', [
                'label' => esc_html__( 'Title', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'DESIGN' , 'enteraddons-pro' ),
                'label_block' => true,
            ]
        );
        $repeater_gallery->add_control(
            'gallery_image_description', [
                'label' => esc_html__( 'Description', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Lorem ipsum dolor sit amet.' , 'enteraddons-pro' ),
                'label_block' => true,
            ]
        );
        $repeater_gallery->add_control(
            'gallery_btn_title', [
                'label' => esc_html__( ' Button Title', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'More Details' , 'enteraddons-pro' ),
                'label_block' => true,
            ]
        );
        $repeater_gallery->add_control(
            'masonary_button_link',
            [
                'label' => esc_html__( 'Link', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'enteraddons-pro' ),
                'show_external' => true,
                'default' => [
                    'url' => 'https://www.google.com/',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $repeater_gallery->add_control(
            'button_icon',
            [
                'label' => esc_html__( 'Icon', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );
         
         $this->add_control(
             'masonary_gallery_settings',
             [
                 'label' => esc_html__( 'Filter Menu List', 'enteraddons-pro' ),
                 'type' => \Elementor\Controls_Manager::REPEATER,
                 'fields' => $repeater_gallery->get_controls(),
                 'condition' => [ 'gallery_style' =>'2'  ],
                 'default' => [
                     [
                         'masonary_gallery_image'   => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                        'gallery_image_title' => 'DESIGN',
                        'gallery_image_description' => 'Lorem ipsum dolor sit amet.',
                        'masonary_button_link' => [
                            'url' => 'https://www.google.com/',
                            'is_external' => true,
                            'nofollow' => true,
                        ],
                        'button_icon' => [
                            'value' => 'fas fa-star',
                            'library' => 'solid',
                        ],
                     ],
                     
                 ]
             ]
         );

        $this->end_controls_section(); // End Masonry Gallery content

        /**
         * Style Tab
         * ------------------------------ Filter Button Style------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_filter_button_style', [
                'label' => esc_html__( 'Button', 'enteraddons-pro' ),
                'condition' => [ 'gallery_style' =>'1'  ],
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'filter_btn_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-gallery-filter .ea-btn',
            ]
        );
        $this->add_responsive_control(
            'filter_btn_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-gallery-filter .ea-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
       
        $this->add_responsive_control(
            'filter_btn_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-gallery-filter .ea-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // start controls tabs
        
        $this->start_controls_tabs( 'filter_btn_style' );

        //  Controls tab For Normal
        $this->start_controls_tab(
            'filter_btn_normal',
            [
                'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
            ]
        );

        $this->add_control(
            'filter_btn_color',
            [
                'label' => esc_html__( 'Text Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-gallery-filter .ea-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'filter_btn_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-gallery-filter .ea-btn',
            ]
        );
        $this->add_responsive_control(
            'filter_btn_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-gallery-filter .ea-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'filter_btn_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-gallery-filter .ea-btn',
            ]
        ); 
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'filter_btn_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .enteraddons-gallery-filter .ea-btn',
            ]
        );
        $this->end_controls_tab();


        //  Controls tab For Hover
        $this->start_controls_tab(
            'filter_btn_hover',
            [
                'label' => esc_html__( 'Hover', 'enteraddons-pro' ),
            ]
        );

        $this->add_control(
            'filter_btn_hover_color',
            [
                'label' => esc_html__( 'Hover Text Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-gallery-filter .ea-btn:hover, {{WRAPPER}} .enteraddons-gallery-filter .ea-btn.active' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'filter_btn_hover_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-gallery-filter .ea-btn:hover, {{WRAPPER}} .enteraddons-gallery-filter .ea-btn.active',
            ]
        );
        $this->add_responsive_control(
            'filter_btn_border_hover_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-gallery-filter .ea-btn:hover, {{WRAPPER}} .enteraddons-gallery-filter .ea-btn.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'filter_btn_box_hover_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-gallery-filter .ea-btn:hover, {{WRAPPER}} .enteraddons-gallery-filter .ea-btn.active',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'filter_btn_hover_background',
                'label' => esc_html__( 'Hover Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .enteraddons-gallery-filter .ea-btn:hover, {{WRAPPER}} .enteraddons-gallery-filter .ea-btn.active',
            ]
        );
        $this->end_controls_tabs(); //  end controls section
        $this->end_controls_section();

 /**
         * Style Tab
         * ------------------------------Template 1  Image Style------------------------------
         *
         */
        $this->start_controls_section(
            'filter_image_style', [
                'label' => esc_html__( 'Image', 'enteraddons-pro' ),
                'condition' => [ 'gallery_style' =>'1'  ],
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'filter_image_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-grid .ea-grid-item ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'filter_image_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-grid .ea-grid-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

       
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'filter_image_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-grid .ea-grid-item img',
            ]
        );
        $this->add_responsive_control(
            'filter_image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-grid .ea-grid-item img ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'filter_image_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-grid .ea-grid-item img ',
            ]
        );
        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------  Image Style------------------------------
         *
         */
        $this->start_controls_section(
            'gallery_image_style', [
                'label' => esc_html__( ' Gallery Image', 'enteraddons-pro' ),
                'condition' => [ 'gallery_style' =>'2'  ],
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
			'image_column_gap',
			[
				'label' => esc_html__( 'Image Gap', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .ea-masonry-grid' => 'column-gap: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .ea-masonry-grid-item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
            'gallery_image_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-masonry-grid-item ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'gallery_image_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-masonry-grid-item ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

       
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'gallery_image_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-masonry-grid-item  ',
            ]
        );
        $this->add_responsive_control(
            'gallery_image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-masonry-grid-item, .ea-masonry-grid-item .content  ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'gallery_image_overlay_color',
				'label' => esc_html__( ' Overlay Background', 'enteraddons-pro' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .ea-masonry-grid-item .content ',
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'gallery_image_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-masonry-grid-item ',
            ]
        );
        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Gallery Image Title Style------------------------------
         *
         */
        $this->start_controls_section(
            'gallery_image_title', [
                'label' => esc_html__( 'Image Title', 'enteraddons-pro' ),
                'condition' => [ 'gallery_style' =>'2'  ],
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gallery_image_title_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-masonry-grid-item .content h4' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'gallery_image_title_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-masonry-grid-item .content h4',
            ]
        );
        $this->add_responsive_control(
            'gallery_image_title_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-masonry-grid-item .content h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'gallery_image_title_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-masonry-grid-item .content h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_title_alignment',
            [
                'label' => esc_html__( 'Content Alignment', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__( 'Left', 'enteraddons-pro' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'enteraddons-pro' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__( 'Right', 'enteraddons-pro' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .ea-masonry-grid-item .content' => 'align-items: {{VALUE}} !important',
                ],
            ]
        );
        $this->end_controls_section();

         /**
         * Style Tab
         * ------------------------------ Gallery Image Description Style------------------------------
         *
         */
        $this->start_controls_section(
            'gallery_image_description', [
                'label' => esc_html__( 'Image Description', 'enteraddons-pro' ),
                'condition' => [ 'gallery_style' =>'2'  ],
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gallery_image_des_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-masonry-grid-item .content p' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'gallery_image_des_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-masonry-grid-item .content p',
            ]
        );
        $this->add_responsive_control(
            'gallery_image_des_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-masonry-grid-item .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'gallery_image_des_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-masonry-grid-item .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->end_controls_section();

         /**
         * Style Tab
         * ------------------------------ Gallery Button Style------------------------------
         *
         */
          $this->start_controls_section(
            'enteraddons_gallery_button_style', [
                'label' => esc_html__( 'Button', 'enteraddons-pro' ),
                'condition' => [ 'gallery_style' =>'2'  ],
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'gallery_btn_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-masonry-grid-item .ea-btn',
            ]
        );
        $this->add_responsive_control(
            'gallery_btn_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-masonry-grid-item .ea-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'gallery_btn_icxon_margin',
            [
                'label' => esc_html__( 'Icon Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-masonry-grid-item .ea-btn i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'gallery_btn_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-masonry-grid-item .ea-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                ],
                'selectors' => [
                    '{{WRAPPER}} .ea-masonry-grid-item .ea-btn i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // start controls tabs
        
        $this->start_controls_tabs( 'gallery_btn_style' );

        //  Controls tab For Normal
        $this->start_controls_tab(
            'gallery_btn_normal',
            [
                'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
            ]
        );

        $this->add_control(
            'gallery_btn_color',
            [
                'label' => esc_html__( 'Text Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-masonry-grid-item .ea-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'gallery_btn_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-masonry-grid-item .ea-btn i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'gallery_btn_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-masonry-grid-item .ea-btn',
            ]
        );
        $this->add_responsive_control(
            'gallery_btn_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-masonry-grid-item .ea-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'gallery_btn_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-masonry-grid-item .ea-btn',
            ]
        ); 
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'gallery_btn_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .ea-masonry-grid-item .ea-btn',
            ]
        );
        $this->end_controls_tab();


        //  Controls tab For Hover
        $this->start_controls_tab(
            'gallery_btn_hover',
            [
                'label' => esc_html__( 'Hover', 'enteraddons-pro' ),
            ]
        );

        $this->add_control(
            'gallery_btn_hover_color',
            [
                'label' => esc_html__( 'Hover Text Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-masonry-grid-item .ea-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'gallery_btn_icon_hover_color',
            [
                'label' => esc_html__( 'Hover Icon Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-masonry-grid-item .ea-btn:hover i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'gallery_btn_hover_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-masonry-grid-item .ea-btn:hover',
            ]
        );
        $this->add_responsive_control(
            'gallery_btn_border_hover_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-masonry-grid-item .ea-btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'gallery_btn_box_hover_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-masonry-grid-item .ea-btn:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'gallery_btn_hover_background',
                'label' => esc_html__( 'Hover Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .ea-masonry-grid-item .ea-btn:hover',
            ]
        );
        $this->end_controls_tabs(); //  end controls section
        $this->end_controls_section();

        


    }
	protected function render() {

        // get settings
        $settings = $this->get_settings_for_display();

        // Masonry Gallery template render
        $obj = new Masonry_Gallery_Template();
        $obj::setDisplaySettings( $settings );
        $obj->renderTemplate();

    }
    public function get_script_depends() {
        return [ 'enteraddons-pro-main', 'isotope-pkgd', 'packery-mode-pkgd' ];
    }
    
    public function get_style_depends() {
        return [ 'enteraddons-global-style'];
    }


}
