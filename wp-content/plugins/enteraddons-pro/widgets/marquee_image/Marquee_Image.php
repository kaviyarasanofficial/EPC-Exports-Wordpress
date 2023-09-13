<?php
namespace EnteraddonsPro\Widgets\Marquee_Image;

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
 * EnteraddonsPro elementor Marquee Content widget.
 *
 * @since 1.0
 */

class Marquee_Image extends Widget_Base {
    
    public function get_name() {
        return 'enteraddons-marquee-image';
    }

    public function get_title() {
        return esc_html__( 'Marquee Image', 'enteraddons-pro' );
    }

    public function get_icon() {
        return 'entera entera-marquee-image';
    }

    public function get_categories() {
        return ['enteraddons-pro-elements-category'];
    }

    protected function register_controls() {


        // ----------------------------------------  Marquee content ------------------------------
        $this->start_controls_section(
            'enteraddons_marquee_content',
            [
                'label' => esc_html__( 'Content', 'enteraddons-pro' ),
            ]
        );

        $this->add_control(
            'content_type',
            [
                'label' => esc_html__( 'Content Type', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'image',
                'options' => [
                    'text' => esc_html__( 'Text', 'enteraddons-pro' ),
                    'image' => esc_html__( 'Image', 'enteraddons-pro' ),
                        
                ],

            ]
        );
        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__( 'Set HTML Tag', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                    'span' => 'span',
                    'p' => 'p',
                    'div' => 'div'
                ],
                'default' => 'h2'
            ]
        );
        // Image 
        $repeater = new \Elementor\Repeater();
        $this->add_control(
            'image_link_condition',
            [
                'label'         => esc_html__( 'Do you want to set Image Link?', 'enteraddons-pro' ),
                'type'          => \Elementor\Controls_Manager::SWITCHER,
                'condition' => ['content_type' => 'image'],
                'label_on'      => esc_html__( 'Yes', 'enteraddons-pro' ),
                'label_off'     => esc_html__( 'No', 'enteraddons-pro' ),
                'return_value'  => 'yes',
                'default'       => '',
            ]
        );
        $repeater->add_control(
            'image',
            [
                'label' => esc_html__( 'Image', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'image_caption',
            [
                'label' => esc_html__( 'Image Caption', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'EnterAddons'
            ]
        );
        $repeater->add_control(
            'image_link',
            [
                'label' => esc_html__( 'Link', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::URL,
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
            'image_list',
            [
                'label' => esc_html__( 'Image List', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'condition' => ['content_type' => 'image'],
                'prevent_empty'  => false,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ image_caption }}}',
                'default' => [
                    [
                        'image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                        'image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                        'image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                        'image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                        
                    ],
                ],
            ]
        );

        //Text Repeater
        $repeater_title = new \Elementor\Repeater();
        $this->add_control(
            'text_link_condition',
            [
                'label'         => esc_html__( 'Do you want to set Text Link?', 'enteraddons-pro' ),
                'type'          => \Elementor\Controls_Manager::SWITCHER,
                'condition' => ['content_type' => 'text'],
                'label_on'      => esc_html__( 'Yes', 'enteraddons-pro' ),
                'label_off'     => esc_html__( 'No', 'enteraddons-pro' ),
                'return_value'  => 'yes',
                'default'       => '',
            ]
        );

        $repeater_title->add_control(
            'title',
            [
                'label' => esc_html__( 'Text', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'EnterAddons  Ultimate Template Builder for Elementor'
            ]
        );
        $repeater_title->add_control(
            'desc',
            [
                'label' => esc_html__( 'Description', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'label_block' => true
            ]
        );
        $repeater_title->add_control(
            'icon',
            [
                'label' => esc_html__( 'Icon', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'far fa-window-close',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater_title->add_control(
            'text_link',
            [
                'label' => esc_html__( 'Link', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::URL,
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
            'text_list',
            [
                'label' => esc_html__( 'Text List', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'condition' => ['content_type' => 'text'],
                'prevent_empty'  => false,
                'fields' => $repeater_title->get_controls(),
                'title_field' => '{{{ title }}}',
                'default' => [
                    [
                        'title' =>'EnterAddons  Ultimate Template Builder for Elementor',
                        'icon' => [
                            'value' => 'fas fa-check',
                            'library' => 'solid',
                        ],
                        
                    ],
                    [
                        'title' =>'EnterAddons  Ultimate Template Builder for Elementor',
                        
                    ],
                ],
            ]
        );

     $this->end_controls_section(); // End Marquee Content content

      // ---------------------------------------- Marquee Content Option  Settings ------------------------------
      $this->start_controls_section(
        'enteraddons_marquee_Content_settings',
        [
            'label' => esc_html__( 'Marquee Content Settings', 'enteraddons-pro' ),
        ]
        );

        $this->add_control(
            'content_direction',
            [
                'label' => esc_html__( 'Content Direction', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    'mc-vertical' => esc_html__( 'Vertical', 'enteraddons-pro' ),
                    ''  => esc_html__( 'Horizontal', 'enteraddons-pro' ),
                ],
            ]
        );

        $this->add_control(
            'marquee_direction',
            [
                'label' => esc_html__( 'Scrolling direction', 'enteraddons-pro' ),
                'description' => esc_html__( 'Select First Content Direction ', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'right',
                'options' => [
                    'right' => esc_html__( 'Right', 'enteraddons-pro' ),
                    'left'  => esc_html__( 'Left', 'enteraddons-pro' ),
                    'up' => esc_html__( 'Up', 'enteraddons-pro' ),
                    'down'  => esc_html__( 'Down', 'enteraddons-pro' ),
                ],
            ]
        );
    
        $this->add_control(
            'marquee_animation_delay',
            [
                'label' => esc_html__( 'Animation Duration', 'enteraddons-pro' ),
                'description' => esc_html__( 'Default Animation Duration 50000', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 50000,
            ]
        );

        $this->add_control(
            'marquee_image_transform',
            [
                'label' => esc_html__( 'Animation Rotation', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 0,
                'selectors' => [
                    '{{WRAPPER}}  .ea-marquee-body' => 'transform: skewY({{VALUE}}deg);'
                ],
            ]
        );
        
        $this->add_control(
            'marquee_hover_pause',
            [
                'label' => esc_html__( 'Hover Pause ?', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Pause', 'enteraddons-pro' ),
                'label_off' => esc_html__( 'Not', 'enteraddons-pro' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

    $this->end_controls_section(); // End Marquee Content settings

    /**
     * Style Tab
     * ------------------------------ Marquee Content Wrapper Settings ------------------------------
     *
     */
    $this->start_controls_section(
        'enteraddons_marquee_image_wrapper_settings', [
            'label' => esc_html__( 'Wrapper Style', 'enteraddons-pro' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_responsive_control(
        'marquee_image_wrapper_width',
        [
            'label'          => esc_html__('Width', 'enteraddons-pro'),
            'type'           => Controls_Manager::SLIDER,
            'default'        => [  'unit' => '%',],
            'size_units'     => ['px', '%'],
            'range'          => [
                '%'  => [
                    'min' => 1,
                    'max' => 100,
                ],
                'px' => [
                    'min' => 1,
                    'max' => 2000,
                ],
            ],
            'selectors'      => [
                '{{WRAPPER}} .ea-marquee-body' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_responsive_control(
        'marquee_image_wrapper_height',
        [
            'label'          => esc_html__('Height', 'enteraddons-pro'),
            'type'           => Controls_Manager::SLIDER,
            'default'       => [  'unit' => '%', ],
            'size_units'     => ['px', '%'],
            'range'          => [
                '%'  => [
                    'min' => 1,
                    'max' => 100,
                ],
                'px' => [
                    'min' => 1,
                    'max' => 2000,
                ],
            ],
            'selectors'      => [
                '{{WRAPPER}} .ea-marquee-body' => 'height: {{SIZE}}{{UNIT}};',
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
                '{{WRAPPER}} .ea-marquee-body' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                '{{WRAPPER}} .ea-marquee-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Border::get_type(),
        [
            'name' => 'wrapper_border',
            'label' => esc_html__( 'Border', 'enteraddons-pro' ),
            'selector' => '{{WRAPPER}} .ea-marquee-body',
        ]
    );
    $this->add_responsive_control(
        'wrapper_border_radius',
        [
            'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
            'type' => Controls_Manager::DIMENSIONS,
            'devices' => [ 'desktop', 'tablet', 'mobile' ],
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .ea-marquee-body' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'wrapper_box_shadow',
            'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
            'selector' => '{{WRAPPER}} .ea-marquee-body',
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'wrapper_background',
            'label' => esc_html__( 'Background', 'enteraddons-pro' ),
            'types' => [ 'classic', 'gradient' ],
            'selector' => '{{WRAPPER}} .ea-marquee-body',
        ]
    );

    $this->end_controls_section(); // End Marquee Image Wrapper settings

    /**
     * Style Tab
     * ------------------------------ Marquee Image Style Settings ------------------------------
     *
     */
        $this->start_controls_section(
            'enteraddons_marquee_image_item_settings', [
                'label' => esc_html__( 'Item Wrapper', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'item_width',
            [
                'label' => esc_html__( 'Image Width', 'enteraddons-pro' ),
                'condition' => ['content_type' => 'image'],
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
                    'size' => '200',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ea-marquee__group img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'item_height',
            [
                'label' => esc_html__( 'Image Height', 'enteraddons-pro' ),
                'type' => Controls_Manager::SLIDER,
                'condition' => ['content_type' => 'image'],
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
                    '{{WRAPPER}} .ea-marquee__group img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        ); 
        $this->add_responsive_control(
            'item_gap',
            [
                'label' => esc_html__( 'Item Gap', 'enteraddons-pro' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => '100',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ea-marquee__group' => 'gap: {{SIZE}}{{UNIT}} !important;',
                    '{{WRAPPER}} .js-marquee' => 'margin-right: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );  
        $this->add_responsive_control(
            'item_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-marquee__group img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .ea-marquee-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'item_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-marquee__group img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .ea-marquee-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'item_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-marquee__group img, {{WRAPPER}} .ea-marquee-text',
            ]
        );
        $this->add_responsive_control(
            'item_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-marquee__group img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .ea-marquee-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'item_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-marquee__group img, {{WRAPPER}} .ea-marquee-text',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'item_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .ea-marquee__group img, {{WRAPPER}} .ea-marquee-text',
            ]
        );
        $this->end_controls_section(); // End Marquee Image Style


    /**
     * Style Tab
     * ------------------------------ Marquee Image Style Settings ------------------------------
     *
     */
        $this->start_controls_section(
            'enteraddons_marquee_image_style_settings', [
                'label' => esc_html__( 'Image Style', 'enteraddons-pro' ),
                'condition' => ['content_type' => 'image'],
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
                    'unit' => 'px',
                    'size' => '200',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ea-marquee__group img' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .ea-marquee__group img' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .ea-marquee__group img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .ea-marquee__group img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'img_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-marquee__group img',
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
                    '{{WRAPPER}} .ea-marquee__group img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'img_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-marquee__group img',
            ]
        );

        $this->end_controls_section(); // End Marquee Image Style

        /**
         * Style Tab
         * ------------------------------ Marquee Text Style Settings ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_marquee_image_title_style_settings', [
                'label' => esc_html__( 'Text Style', 'enteraddons-pro' ),
                'condition' => ['content_type' => 'text'],
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'text_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-marquee-content-wrap .ea-marquee-title' => 'color: {{VALUE}} !important',
                ],
            ]
        );  
        
        $this->add_control(
            'text__hover_color',
            [
                'label' => esc_html__( 'Hover Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-marquee-content-wrap:hover .ea-marquee-title' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Text_Stroke::get_type(),
            [
                'name' => 'text_stroke',
                'selector' => '{{WRAPPER}} .ea-marquee-content-wrap .ea-marquee-title',
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-marquee-content-wrap .ea-marquee-title',
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
                    '{{WRAPPER}} .ea-marquee-content-wrap .ea-marquee-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} .ea-marquee-content-wrap .ea-marquee-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'title_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-marquee-content-wrap .ea-marquee-title',
            ]
        );
        $this->add_responsive_control(
            'title_boder_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-marquee-content-wrap .ea-marquee-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'title_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .ea-marquee-content-wrap .ea-marquee-title',
            ]
        );
        $this->end_controls_section();// end Text Style
        /**
         * Style Tab
         * ------------------------------ Marquee Description Style Settings ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_marquee_desc_style_settings', [
                'label' => esc_html__( 'Description Style', 'enteraddons-pro' ),
                'condition' => ['content_type' => 'text'],
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'desc_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-marquee-content-wrap .ea-marquee-desc >*' => 'color: {{VALUE}} !important',
                ],
            ]
        );  
        
        $this->add_control(
            'desc_hover_color',
            [
                'label' => esc_html__( 'Hover Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-marquee-content-wrap:hover .ea-marquee-desc >*' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Text_Stroke::get_type(),
            [
                'name' => 'desc_stroke',
                'selector' => '{{WRAPPER}} .ea-marquee-content-wrap .ea-marquee-desc >*',
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-marquee-content-wrap .ea-marquee-desc >*',
            ]
        );
        $this->add_responsive_control(
            'desc_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-marquee-content-wrap .ea-marquee-desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'desc_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-marquee-content-wrap .ea-marquee-desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'desc_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-marquee-content-wrap .ea-marquee-desc',
            ]
        );
        $this->add_responsive_control(
            'desc_boder_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-marquee-content-wrap .ea-marquee-desc' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'desc_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .ea-marquee-content-wrap .ea-marquee-desc',
            ]
        );
        $this->end_controls_section();// end Text Style

        /**
         * Style Tab
         * ------------------------------ Marquee Image Caption Style Settings ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_marquee_image_caption_style', [
                'label' => esc_html__( 'Image Caption Style', 'enteraddons-pro' ),
                'condition' => ['content_type' => 'image'],
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'caption_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-marquee-image h5' => 'color: {{VALUE}}',
                ],
            ]
        );  
        
        $this->add_control(
            'caption_hover_color',
            [
                'label' => esc_html__( 'Hover Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-marquee-image:hover h5' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Text_Stroke::get_type(),
            [
                'name' => 'caption_stroke',
                'selector' => '{{WRAPPER}} .ea-marquee-image h5',
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'caption_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-marquee-image h5',
            ]
        );
        $this->add_responsive_control(
            'caption_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-marquee-image h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'caption_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-marquee-image h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'caption_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-marquee-image h5',
            ]
        );
        $this->add_responsive_control(
            'caption_boder_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-marquee-image h5' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'caption_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .ea-marquee-image h5',
            ]
        );
        $this->end_controls_section();// end Text Style

         /**
         * Style Tab
         * ------------------------------ Icon Style Settings ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_text_icon_settings', [
                'label' => esc_html__( 'Icon Style', 'enteraddons-pro' ),
                'condition' => [ 'content_type' => 'text' ],
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_position',
            [
                'label' => esc_html__( 'Icon Position', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'mc-left',
                'options' => [
                    'mc-bottom'   => esc_html__( 'Bottom', 'enteraddons-pro' ),
                    'mc-right'  => esc_html__( 'Right', 'enteraddons-pro' ),
                    'mc-left' => esc_html__( 'Left', 'enteraddons-pro' ),
                    'mc-top' => esc_html__( 'Top', 'enteraddons-pro' ),
                ],
            ]
        );
        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-marquee-text i' => 'color: {{VALUE}}',
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
                        'max' => 300,
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
                    '{{WRAPPER}} .ea-marquee-text i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_width',
            [
                'label' => esc_html__( 'Icon Container Width', 'enteraddons-pro' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
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
                    '{{WRAPPER}} .ea-marquee-text .text-icon' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_height',
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
                    '{{WRAPPER}} .ea-marquee-text .text-icon' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .ea-marquee-text .text-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-marquee-text .text-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'icon_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-marquee-text .text-icon',
            ]
        );
        $this->add_responsive_control(
            'icon_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-marquee-text .text-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'icon_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-marquee-text .text-icon',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .ea-marquee-text .text-icon',
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        // get settings
        $settings = $this->get_settings_for_display();

        // template render
        $obj = new Marquee_Image_Template();
        $obj::setDisplaySettings( $settings );
        $obj->renderTemplate();
    }

    public function get_script_depends() {
        return [ 'enteraddons-pro-main', 'marquee'];
    }
    
    public function get_style_depends() {
        return [ 'enteraddons-global-style'];
    }


}