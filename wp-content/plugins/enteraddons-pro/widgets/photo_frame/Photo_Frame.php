<?php
namespace EnteraddonsPro\Widgets\Photo_Frame;

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
 * EnteraddonsPro elementor Photo Frame widget.
 *
 * @since 1.0
 * 
 */
class Photo_Frame extends Widget_Base {

	public function get_name() {
		return 'enteraddons-pro-photo-frame';
	}

	public function get_title() {
		return esc_html__( 'Photo Frame', 'enteraddons-pro' );
	}

	public function get_icon() {
		return 'entera entera-photo-frame';
	}

	public function get_categories() {
		return ['enteraddons-pro-elements-category'];
	}

	protected function register_controls() {

        //------------------------------ Photo Frame Content ------------------------------
        $this->start_controls_section( 
            'enteraddons_photo_frame_content', [
                'label' => esc_html__( 'Content', 'enteraddons-pro' )
            ]
        );
        $this->add_control(
            'photo_frame_type', [
                'label' => esc_html__( 'Select Photo Frame', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '1' => esc_html__( 'Frame Style 1', 'enteraddons-pro' ),
                    '2' => esc_html__( 'Frame Style 2', 'enteraddons-pro' ),
                    '3' => esc_html__( 'Frame Style 3', 'enteraddons-pro' )
                ],
                'default' => '3'
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
                'label' => esc_html__( 'Name', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'ROBERTO ALVAREZ',
                'condition' => [
                    'photo_frame_type' => '1',
                ],
            ]
        );
        $this->add_control(
            'designation',
            [
                'label' => esc_html__( 'Designation', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'CREATOR',
                'condition' => [
                    'photo_frame_type' => '1',
                ],
            ]
        );
        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Photo Frame Wrapper Style ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_photo_frame_wrapper_style_settings', [
                'label' => esc_html__( ' Wrapper', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'photo_frame_width',
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
                    
                ],
                'selectors' => [
                    '{{WRAPPER}} .ea-markone .ea-snipimage' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .ea-marktwo' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .ea-markthree' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'photo_frame_height',
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
                    'unit' => '%',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ea-markone .ea-snipimage' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .ea-marktwo' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .ea-markthree' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );    
        $this->add_responsive_control(
            'photo_frame_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-markone .ea-snipimage' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .ea-marktwo' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .ea-markthree' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'photo_frame_wrapper_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-markone .ea-snipimage' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .ea-marktwo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .ea-markthree' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
           \Elementor\Group_Control_Border::get_type(),
           [
            'name'      => 'photo_frame_wrapper_border',
            'label'     => esc_html__( 'Border', 'enteraddons-pro' ),
            'selector'  => '{{WRAPPER}} .ea-markone .ea-snipimage, .ea-marktwo, .ea-markthree',
        ]
    );
        $this->add_responsive_control(
            'photo_frame_wrapper_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-markone .ea-snipimage' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .ea-marktwo' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .ea-markthree' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'photo_frame_wrapper_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-markone .ea-snipimage, .ea-marktwo, .ea-markthree',
            ]
        ); 
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'photo_frame_wrapper_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .ea-markone, .ea-marktwo, .ea-markthree',
            ]
        );

        $this->end_controls_section();

         /**
         * Style Tab
         * ------------------------------ Photo Frame Image Style ------------------------------
         *
         */
         $this->start_controls_section(
            'enteraddons_photo_frame_image_style', [
                'label' => esc_html__( 'Image', 'enteraddons-pro' ),
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
                    'size' => '350',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ea-markone .ea-snipimage.ea-red img' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .ea-marktwo .ea-framed img' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .ea-markthree img' => 'width: {{SIZE}}{{UNIT}};'
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
                    '{{WRAPPER}} .ea-markone .ea-snipimage.ea-red img' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .ea-marktwo .ea-framed img' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .ea-markthree img' => 'height: {{SIZE}}{{UNIT}};'
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
                    '{{WRAPPER}} .ea-markone .ea-snipimage img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .ea-marktwo .ea-framed img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .ea-markthree img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .ea-markone .ea-snipimage img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .ea-marktwo .ea-framed img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .ea-markthree img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
         $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'img_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-markone .ea-snipimage.ea-red img, .ea-markthree img, .ea-marktwo .ea-framed img',

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
                    '{{WRAPPER}} .ea-markone .ea-snipimage img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .ea-marktwo .ea-framed img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .ea-markthree img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
         $this->add_responsive_control(
             'img_outline',
             [
                'label' => esc_html__( 'Outline', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'condition' => [
                    'photo_frame_type' => '3',
                ],
                'range' => [
                   'px' => [
                      'min' => 0,
                      'max' => 50,
                      'step' => 1,
                  ],
              ],
              'default' => [
               'unit' => 'px',
           ],
           'selectors' => [
               '{{WRAPPER}} .ea-markthree img' => 'outline: {{SIZE}}{{UNIT}} solid #000;',
           ],
       ]
   );
         $this->add_responsive_control(
             'img_outline_offset',
             [
                'label' => esc_html__( 'Outline Offset', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'condition' => [
                    'photo_frame_type' => '3',
                ],
                'range' => [
                   'px' => [
                      'min' => -100,
                      'max' => 100,
                      'step' => 1,
                  ],
              ],
              'default' => [
               'unit' => 'px',
               'size' =>-10, 
           ],
           'selectors' => [
               '{{WRAPPER}} .ea-markthree img' => 'outline-offset: {{SIZE}}{{UNIT}};',
           ],
       ]
   );
         $this->add_control(
             'img_outline_color',
             [
                'label' => esc_html__( 'Outline Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'photo_frame_type' => '3',
                ],
                'selectors' => [
                   '{{WRAPPER}} .ea-markthree img' => 'outline-color: {{VALUE}}',
               ],
           ]
       );
         $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'img_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'description' => esc_html__( '-50px -50px 0 -40px tomato For Frame Style Two', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-marktwo .ea-framed img, .ea-markone .ea-snipimage img, .ea-markthree img ',
            ]
        );

         $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'img_box_shadow_two',
                'label' => esc_html__( 'Box Shadow Two', 'enteraddons-pro' ),
                'description' => esc_html__( '50px 50px 0 -40px tomato For Frame Style Two', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-marktwo .ea-framed img',
                'condition' => [
                    'photo_frame_type' => '2',
                ],
            ]
        );
         $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'image_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .ea-markone .ea-snipimage.ea-red',
                'condition' => [
                    'photo_frame_type' => '1',
                ],
            ]
        );
         $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Photo Frame Title Style ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_photo_frame_title_style', [
                'label' => esc_html__( 'Title', 'enteraddons-pro' ),
                'condition' => [
                    'photo_frame_type' => '1',
                ],
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs( 'tab_photo_frame_title' );

        //  Controls tab For Normal
        $this->start_controls_tab(
            'photo_frame_title_normal',
            [
                'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-markone .ea-snipimage h3' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'title_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .ea-markone .ea-snipimage h3',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-markone .ea-snipimage h3',
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
                    '{{WRAPPER}} .ea-markone .ea-snipimage h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .ea-markone .ea-snipimage h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'photo_frame_title_align',
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
                    '{{WRAPPER}} .ea-markone .ea-snipimage h3' => 'text-align: {{VALUE}} !important',
                    
                ],
            ]
        );
        $this->end_controls_tab(); // End Controls tab

        //  Controls tab For Hover
        $this->start_controls_tab(
            'item_title_hover',
            [
                'label' => esc_html__( 'Hover', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'title_hover_color',
            [
                'label' => esc_html__( 'Title Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-markone:hover .ea-snipimage h3' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab(); // End Controls tab

        $this->end_controls_tabs(); //  end controls tabs section

        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Photo Frame Designation Style ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_photo_frame_designation_style', [
                'label' => esc_html__( 'Designation', 'enteraddons-pro' ),
                'condition' => [
                    'photo_frame_type' => '1',
                ],
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'designation_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-markone .ea-snipimage h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'designation_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-markone .ea-snipimage h4',
            ]
        );
        $this->add_responsive_control(
            'designation_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-markone .ea-snipimage h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'designation_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-markone .ea-snipimage h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'photo_frame_designation_align',
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
                    '{{WRAPPER}} .ea-markone .ea-snipimage h4' => 'text-align: {{VALUE}} !important',
                    
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        // get settings
        $settings = $this->get_settings_for_display();

        // Tema template render
        $obj = new Photo_Frame_Template();
        $obj::setDisplaySettings( $settings );
        $obj->renderTemplate();

    }

    public function get_style_depends() {
        return [ 'enteraddons-global-style' ];
    }


}