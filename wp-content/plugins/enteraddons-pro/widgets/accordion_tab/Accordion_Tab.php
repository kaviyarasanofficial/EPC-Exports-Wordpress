<?php
namespace EnteraddonsPro\Widgets\Accordion_Tab;

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
 * Enteraddons elementor Accordion Tab widget.
 *
 * @since 1.0
 */

class Accordion_Tab extends Widget_Base {
    
    public function get_name() {
        return 'enteraddons-accordion-tab';
    }

    public function get_title() {
        return esc_html__( 'Accordion Tab', 'enteraddons-pro' );
    }

    public function get_icon() {
        return 'entera entera-accordion-tab';
    }

    public function get_categories() {
        return ['enteraddons-pro-elements-category'];
    }

    protected function register_controls() {

        // ----------------------------------------  Accordion Tab content ------------------------------
        $this->start_controls_section(
            'enteraddons_accordion_tab_content_settings',
            [
                'label' => esc_html__( 'Accordion Tab Content', 'enteraddons-pro' ),
            ]
        );
        
        // Reapeater for accordion Content section
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'enteraddons_accordion_tab_title', [
                'label' => esc_html__( 'Title', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default'       => esc_html__( 'Business Consulting', 'enteraddons-pro' )
            ]
        );
        $repeater->add_control(
            'count_number_style',
            [
                'label' => esc_html__( 'Count/Icon', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'number',
                'options' => [
                    'number' => esc_html__( 'Number', 'textdomain' ),
                    'icon' => esc_html__( 'Icon', 'textdomain' ),
                    '' => esc_html__( 'None', 'textdomain' ),
                ],
            ]
        );

        $repeater->add_control(
            'enteraddons_accordion_count_number', [
                'label' => esc_html__( 'Count Number', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => ['count_number_style' => 'number'],
                'default'       => esc_html__( '01', 'enteraddons-pro' )
            ]
        );
        $repeater->add_control(
            'enteraddons_accordion_icon',
            [
                'label' => esc_html__( 'Icon', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'condition' => ['count_number_style' => 'icon'],
                'default' => [
                    'value' => 'fas fa-arrow-right',
                    'library' => 'solid',
                ]
            ]
        );
        $repeater->add_control(
            'enteraddons_accordion_tab_description',
            [
                'label'         => esc_html__( 'Description', 'enteraddons-pro' ),
                'type'          => \Elementor\Controls_Manager::WYSIWYG,
                'default'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetempor incididunt ut labore et dolore magna aliqua.', 'enteraddons-pro' )
            ]
        );
        $this->add_control(
            'enteraddons_accordion_tab',
            [
                'label' => esc_html__( 'Content List', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ enteraddons_accordion_tab_title }}}',
                'default' => [
                    [
                        'enteraddons_accordion_tab_title'    => esc_html__( 'Business Consulting', 'enteraddons-pro' ),
                        'accordion_desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetempor incididunt ut labore et dolore magna aliqua.', 'enteraddons-pro' ),
                    ],
                    [
                        'enteraddons_accordion_tab_title'    => esc_html__( 'Automation Consulting', 'enteraddons-pro' ),
                        'accordion_desc'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetempor incididunt ut labore et dolore magna aliqua.', 'enteraddons-pro' ),
                    ],
                ],
            ]
        );

        // Reapeater for tab image Item
        $repeater_two = new \Elementor\Repeater();

        $repeater_two->add_control(
            'image',
            [
                'label' => esc_html__( 'Image', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater_two->add_control(
            'enteraddons_accordion_tab_card_title', [
                'label' => esc_html__( ' Card Title', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default'       => esc_html__( 'Business Consulting', 'enteraddons-pro' )
            ]
        );
        $repeater_two->add_control(
            'enteraddons_accordion_tab_Button_title', [
                'label' => esc_html__( 'Button Title', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default'       => esc_html__( 'View Project', 'enteraddons-pro' )
            ]
        ); 
        $repeater_two->add_control(
            'accordion_tab_image_link',
            [
                'label' => esc_html__( 'Image Link', 'enteraddons-pro' ),
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
        $repeater_two->add_control(
            'enteraddons_accordion_tab_Button_link',
            [
                'label' => esc_html__( 'Button Link', 'enteraddons-pro' ),
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
            'enteraddons_accordion_tab_image',
            [
                'label' => esc_html__( 'Image List', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater_two->get_controls(),
                'title_field' => '{{{ enteraddons_accordion_tab_card_title }}}',
                'default' => [
                    [
                        'enteraddons_accordion_tab_card_title'    => esc_html__( 'Business Consulting', 'enteraddons-pro' ),
                        'image'  =>[
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ], 
                    ],
                    [
                        'enteraddons_accordion_tab_card_title'    => esc_html__( 'Automation Consulting', 'enteraddons-pro' ),
                        'image'  =>[
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ], 
                    ],
                    
                ],
            ]
        );
       
        $this->end_controls_section(); // End Accordion Tab content

        /**
         * Style Tab
         * ------------------------------ Single  Accordion Wrapper Style------------------------------
         *
         */
        $this->start_controls_section(
            'accordion_tab_content_area', [
                'label' => esc_html__( ' Single Accordion Wrapper', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        //controls tabs start
        $this->start_controls_tabs( 'tab_accordion_area' );
        //  Controls tab For Normal
        $this->start_controls_tab(
            'normal_area',
            [
                'label' => esc_html__( 'Normal Style', 'enteraddons-pro' ),
            ]
        ); 

        $this->add_responsive_control(
            'sinlge_accordion_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'sinlge_accordion_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'sinlge_accordion_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq',
            ]
        );
        $this->add_responsive_control(
            'sinlge_accordion_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'sinlge_accordion_bg_color',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'show_label' => true,
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'sinlge_accordion_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq',
            ]
        );
        $this->end_controls_tab(); // End Controls tab

        //  Controls tab For title active
        $this->start_controls_tab(
            'active_single_accordion_area',
            [
                'label' => esc_html__( 'Active Style', 'enteraddons-pro' ),
            ]
        );
 
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'sinlge_accordion_active_bg_color',
                'label' => esc_html__( 'Title Background', 'enteraddons-pro' ),
                'show_label' => true,
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq.active',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'sinlge_accordion_active_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq.active',
            ]
        );

        $this->end_controls_tab(); // End Controls tab
        $this->end_controls_tabs(); //  end controls tabs
        $this->end_controls_section();



        /**
         * Style Tab
         * ------------------------------ Accordion  Title Style------------------------------
         *
         */
        $this->start_controls_section(
            'accordion_tab_content_title', [
                'label' => esc_html__( 'Accordion Title', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        //controls tabs start
        $this->start_controls_tabs( 'tab_accordion_title' );
        //  Controls tab For Normal
        $this->start_controls_tab(
            'normal_title',
            [
                'label' => esc_html__( 'Normal Style', 'enteraddons-pro' ),
            ]
        ); 
        $this->add_control(
            'name_color',
            [
                'label' => esc_html__( 'Title Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq .enteraddons-faq-title' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq .enteraddons-faq-title',
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
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq .enteraddons-faq-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq .enteraddons-faq-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'title_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq .enteraddons-faq-title',
            ]
        );
        $this->add_responsive_control(
            'title_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq .enteraddons-faq-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'title_bg_color',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'show_label' => true,
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq .enteraddons-faq-title',
            ]
        );
        $this->end_controls_tab(); // End Controls tab

        //  Controls tab For title active
        $this->start_controls_tab(
            'active_title',
            [
                'label' => esc_html__( 'Active Style', 'enteraddons-pro' ),
            ]
        );

        $this->add_control(
            'title_active_color',
            [
                'label' => esc_html__( 'Title Active Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq.style--two.active .enteraddons-faq-title' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'title_active_bg_color',
                'label' => esc_html__( 'Title Background', 'enteraddons-pro' ),
                'show_label' => true,
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq.style--two.active .enteraddons-faq-title',
            ]
        );

        $this->end_controls_tab(); // End Controls tab
        $this->end_controls_tabs(); //  end controls tabs
        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Accordion Count  Style------------------------------
         *
         */
        $this->start_controls_section(
            'accordion_tab_content_count', [
                'label' => esc_html__( 'Accordion Count/Icon ', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'count_width',
            [
                'label' => esc_html__( 'Count Width', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq.style--two .faq-count' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'count_height',
            [
                'label' => esc_html__( 'Count Height', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq.style--two .faq-count' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        ); 
        $this->add_responsive_control(
            'count_opacity',
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
                    'size' => .1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq.style--two .faq-count' => 'opacity: {{SIZE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'count_active_opacity',
            [
                'label' => esc_html__( 'Active Opacity', 'enteraddons-pro' ),
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
                    'size' => .3,
                ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq.style--two.active .faq-count' => 'opacity: {{SIZE}}',
                ],
            ]
        );

        $this->add_control(
            'count_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq.style--two .faq-count' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'count_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq.style--two .faq-count',
            ]
        );
        $this->add_responsive_control(
            'count_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq.style--two .faq-count' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'count_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq.style--two .faq-count' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'count_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq.style--two .faq-count',
            ]
        );
        $this->add_responsive_control(
            'count_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq.style--two .faq-count' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'count_bg_color',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'show_label' => true,
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq.style--two .faq-count',
            ]
        );
        $this->end_controls_section();


        /**
         * Style Tab
         * ------------------------------ Accordion  Description Style------------------------------
         *
         */
        $this->start_controls_section(
            'accordion_tab_content_description', [
                'label' => esc_html__( 'Accordion Description', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq .enteraddons-faq-content' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq .enteraddons-faq-content',
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
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq .enteraddons-faq-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq .enteraddons-faq-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'description_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq .enteraddons-faq-content',
            ]
        );
        $this->add_responsive_control(
            'description_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq .enteraddons-faq-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'description_bg_color',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'show_label' => true,
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-single-faq .enteraddons-faq-content',
            ]
        );
        $this->end_controls_section();


        /**
         * Style Tab
         * ------------------------------ Accordion Image Wrapper------------------------------
         *
         */
        $this->start_controls_section(
            'accordion_tab_image_area', [
                'label' => esc_html__( 'Image Wrapper', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'image_wrapper_width',
            [
                'label' => esc_html__( 'Image Wrapper Width', 'enteraddons-pro' ),
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
                ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-card' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_wrapper_height',
            [
                'label' => esc_html__( 'Image Wrapper Height', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-card' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        ); 

        $this->add_responsive_control(
            'image_area_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_area_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'image_area_bg_color',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'show_label' => true,
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-card',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'image_area_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-card',
            ]
        );
        $this->add_responsive_control(
            'image_area_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'image_area_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-card',
            ]
        );
        $this->end_controls_section();


         /**
         * Style Tab
         * ------------------------------ Accordion Image------------------------------
         *
         */
        $this->start_controls_section(
            'accordion_tab_image', [
                'label' => esc_html__( 'Image', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'image_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-card img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-card img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_control(
            'image_opacity',
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
                    'size' => .6,
                ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-card img' => 'opacity: {{SIZE}}',
                ],
            ]
        );
       
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-card img',
            ]
        );
        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-card img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'image_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-card img',
            ]
        );
        $this->end_controls_section();


        /**
         * Style Tab
         * ------------------------------ Accordion  Card Media Style------------------------------
         *
         */
        $this->start_controls_section(
            'accordion_tab_media_card', [
                'label' => esc_html__( 'Accordion Media Card', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );



        $this->add_responsive_control(
            'media_card_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .at-media' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'media_card_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .at-media' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'media_card_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .at-media',
            ]
        );
        $this->add_responsive_control(
            'media_card_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .at-media' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'media_card_bg_color',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'show_label' => true,
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .at-media',
            ]
        );
        $this->add_control(
            'media_card_hover_options',
            [
                'label' => esc_html__( ' Hover Background', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'media_card_hover_bg_color',
                'label' => esc_html__( ' Hover Background', 'enteraddons-pro' ),
                'show_label' => true,
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .at-media:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'media_card_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .at-media',
            ]
        );
        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Accordion  Card Title Style------------------------------
         *
         */
        $this->start_controls_section(
            'accordion_tab_card_title', [
                'label' => esc_html__( 'Accordion Media Card Title', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_title_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .at-card-body .at-media-body .ea-nunito' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'card_title_hover_color',
            [
                'label' => esc_html__( 'Hover Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .at-card-body:hover .at-media-body .ea-nunito' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'card_title_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .at-card-body .at-media-body .ea-nunito',
            ]
        );
        $this->add_responsive_control(
            'card_title_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .at-card-body .at-media-body .ea-nunito' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'card_title_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .at-card-body .at-media-body .ea-nunito' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'card_title_bg_color',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'show_label' => true,
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .at-card-body .at-media-body .ea-nunito',
            ]
        );
        $this->end_controls_section();

         /**
         * Style Tab
         * ------------------------------ Accordion  Button Style------------------------------
         *
         */
        $this->start_controls_section(
            'accordion_tab_button', [
                'label' => esc_html__( 'Accordion Card Button', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        //controls tabs start
        $this->start_controls_tabs( 'tab_accordion_button' );
        //  Controls tab For Normal
        $this->start_controls_tab(
            'button_title',
            [
                'label' => esc_html__( 'Normal Style', 'enteraddons-pro' ),
            ]
        ); 
        $this->add_control(
            'button_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-btn' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-btn',
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
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-btn',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'button_bg_color',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'show_label' => true,
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-btn',
            ]
        );
        $this->end_controls_tab(); // End Controls tab

        //  Controls tab For hover button
        $this->start_controls_tab(
            'Hover_button',
            [
                'label' => esc_html__( 'Hover Style', 'enteraddons-pro' ),
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => esc_html__( 'Hover Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-btn:hover' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'button_hover_bg_color',
                'label' => esc_html__( 'Button Background', 'enteraddons-pro' ),
                'show_label' => true,
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-btn:hover',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_hover_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-btn:hover',
            ]
        );
        $this->add_responsive_control(
            'button_hover_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con-at .enteraddons-btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );

        $this->end_controls_tab(); // End Controls tab
        $this->end_controls_tabs(); //  end controls tabs
        $this->end_controls_section();
    


    }

    protected function render() {

        // get settings
        $settings = $this->get_settings_for_display();
        
        // template render
        $obj = new Accordion_Tab_Template();
        $obj::setDisplaySettings( $settings );
        $obj->renderTemplate();

    }

    public function get_script_depends() {
        return ['enteraddons-pro-main'];
    }
    
    public function get_style_depends() {
        return [ 'enteraddons-global-style'];
    }


}