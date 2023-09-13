<?php
namespace EnteraddonsPro\Widgets\Team_Carousel;

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
 * Enteraddons elementor Team Carousel widget.
 *
 * @since 1.0
 */

class Team_Carousel extends Widget_Base {
    
	public function get_name() {
		return 'enteraddons-team-carousel';
	}

	public function get_title() {
		return esc_html__( 'Team Carousel', 'enteraddons-pro' );
	}

	public function get_icon() {
		return 'entera entera-team-carousel';
	}

	public function get_categories() {
		return ['enteraddons-pro-elements-category'];
	}

	protected function register_controls() {

		$repeater = new \Elementor\Repeater();
        // ----------------------------------------  Team content ------------------------------
        $this->start_controls_section(
            'enteraddons_team_carousel_content_settings',
            [
                'label' => esc_html__( 'Team Content', 'enteraddons-pro' ),
            ]
        );

        $repeater->add_control(
            'name',
            [
                'label' => esc_html__( 'Name', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Kenneth Y. Pearson'
            ]
        );
        $repeater->add_control(
            'designation',
            [
                'label' => esc_html__( 'Designation', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Architecture Engineer'
            ]
        );
        $repeater->add_control(
            'experience',
            [
                'label' => esc_html__( 'Experience', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'EXP: 10 YEARS'
            ]
        );
        $repeater->add_control(
            'descriptions',
            [
                'label' => esc_html__( 'Descriptions', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'The general scientific approach has three The first is systematic empiricism lorem ipsum'
            ]
        );
        $repeater->add_control(
            'more_link',
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
        $repeater->add_control(
            'link_label',
            [
                'label' => esc_html__( 'Link Label', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true
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
            'social_options',
            [
                'label' => esc_html__( 'Social Icon', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $repeater->add_control(
            'show_social_icon',
            [
                'label' => esc_html__( 'Show Social Icon', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'enteraddons-pro' ),
                'label_off' => esc_html__( 'No', 'enteraddons-pro' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $repeater->add_control(
            'website_icon', [
                'label' => esc_html__( 'Website Icon', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
					'value' => 'fas fa-globe-africa',
					'library' => 'fa-solid',
				],
                'condition' => [ 'show_social_icon' => 'yes' ],
                
            ]
        );
        $repeater->add_control(
            'website_url',
            [
                'label' => esc_html__( ' Website Link', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'enteraddons-pro' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'condition' => [ 'show_social_icon' => 'yes' ],
            ]
        );
        $repeater->add_control(
            'email_icon', [
                'label' => esc_html__( 'Email Icon', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
					'value' => 'far fa-envelope',
					'library' => 'fa-solid',
				],
                'condition' => [ 'show_social_icon' => 'yes' ],
            ]
        );
        $repeater->add_control(
            'email_url',
            [
                'label' => esc_html__( ' Email Link', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'enteraddons-pro' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'condition' => [ 'show_social_icon' => 'yes' ],
            ]
        );

        $repeater->add_control(
            'facebook_icon', [
                'label' => esc_html__( 'Facebook Icon', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
					'value' => 'fab fa-facebook-f',
					'library' => 'fa-solid',
				],
                'condition' => [ 'show_social_icon' => 'yes' ],
            ]
        );
        $repeater->add_control(
            'facebook_url',
            [
                'label' => esc_html__( 'Facebook Link', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'enteraddons-pro' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'condition' => [ 'show_social_icon' => 'yes' ],
            ]
        );

        $repeater->add_control(
            'twitter_icon', [
                'label' => esc_html__( 'Twitter Icon', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
					'value' => 'fab fa-twitter',
					'library' => 'fa-solid',
				],
                'condition' => [ 'show_social_icon' => 'yes' ],
            ]
        );
        $repeater->add_control(
            'Twitter_url',
            [
                'label' => esc_html__( ' Twitter Link', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'enteraddons-pro' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'condition' => [ 'show_social_icon' => 'yes' ],
            ]
        );

        $repeater->add_control(
            'instagram_icon', [
                'label' => esc_html__( 'Instagram Icon', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
					'value' => 'fab fa-instagram',
					'library' => 'fa-solid',
				],
                'condition' => [ 'show_social_icon' => 'yes' ],
            ]
        );
        $repeater->add_control(
            'instagram_url',
            [
                'label' => esc_html__( 'Instagram Link', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'enteraddons-pro' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'condition' => [ 'show_social_icon' => 'yes' ],
            ]
        );

        $repeater->add_control(
            'github_icon', [
                'label' => esc_html__( 'Github Icon', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
					'value' => 'fab fa-github',
					'library' => 'fa-solid',
				],
                'condition' => [ 'show_social_icon' => 'yes' ],
            ]
        );
        $repeater->add_control(
            'github_url',
            [
                'label' => esc_html__( 'Github Link', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'enteraddons-pro' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'condition' => [ 'show_social_icon' => 'yes' ],
            ]
        );

        $repeater->add_control(
            'linkedin_icon', [
                'label' => esc_html__( 'LinkedIn Icon', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
					'value' => 'fab fa-linkedin-in',
					'library' => 'fa-solid',
				],
                'condition' => [ 'show_social_icon' => 'yes' ],
            ]
        );
        $repeater->add_control(
            'linkedin_url',
            [
                'label' => esc_html__( 'LinkedIn Link', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'enteraddons-pro' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'condition' => [ 'show_social_icon' => 'yes' ],
                
            ]
        );
 
        $this->add_control(
			'team_carousel_list',
			[
				'label' => esc_html__( 'Team Member List', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default' => [
					[
						'name' => esc_html__( 'Kenneth Y. Pearson', 'enteraddons-pro' ),
						'designation' => esc_html__( 'Architecture Engineer', 'enteraddons-pro' ),
						'experience' => esc_html__( 'EXP: 10 YEARS', 'enteraddons-pro' ),
						'descriptions' => esc_html__( 'The general scientific approach has three The first is systematic empiricism lorem ipsum', 'enteraddons-pro' ),
						'link_label' => '',
						'more_link' => [
                            'url' => '',
                            'is_external' => true,
                            'nofollow' => true,
                        ],
						'image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
					],
				],
				'title_field' => '{{{ name }}}',
			]
		);
       
        $this->end_controls_section(); // End Team content

        // ---------------------------------------- Slider content ------------------------------
        $this->start_controls_section(
            'enteraddons_image_slider_settings',
            [
                'label' => esc_html__( 'Slider Settings', 'enteraddons-pro' ),
            ]
        );

        // Slider Settings
        $this->add_responsive_control(
            'slider_items',
            [
                'label' => esc_html__( 'Items', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'label_block' => false,
                'default' => 3
            ]
        );
        $this->add_control(
            'slider_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'label_block' => false,
                'default' => 15
            ]
        );
        $this->add_control(
            'slider_autoplay',
            [
                'label'     => esc_html__( 'Autoplay', 'enteraddons-pro' ),
                'type'      => \Elementor\Controls_Manager::SWITCHER,
                'label_on'  => esc_html__( 'Yes', 'enteraddons-pro' ),
                'label_off' => esc_html__( 'NO', 'enteraddons-pro' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
       
        $this->add_control(
            'slider_mouseDrag',
            [
                'label'     => esc_html__( 'Mouse Drag', 'enteraddons-pro' ),
                'type'      => \Elementor\Controls_Manager::SWITCHER,
                'label_on'  => esc_html__( 'Yes', 'enteraddons-pro' ),
                'label_off' => esc_html__( 'NO', 'enteraddons-pro' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'slider_loop',
            [
                'label'     => esc_html__( 'Loop', 'enteraddons-pro' ),
                'type'      => \Elementor\Controls_Manager::SWITCHER,
                'label_on'  => esc_html__( 'Yes', 'enteraddons-pro' ),
                'label_off' => esc_html__( 'NO', 'enteraddons-pro' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'slider_center',
            [
                'label'     => esc_html__( 'Center', 'enteraddons-pro' ),
                'type'      => \Elementor\Controls_Manager::SWITCHER,
                'label_on'  => esc_html__( 'Yes', 'enteraddons-pro' ),
                'label_off' => esc_html__( 'NO', 'enteraddons-pro' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'slider_animateIn',
            [
                'label'     => esc_html__( 'Animate In', 'enteraddons-pro' ),
                'type'      => \Elementor\Controls_Manager::SWITCHER,
                'label_on'  => esc_html__( 'Yes', 'enteraddons-pro' ),
                'label_off' => esc_html__( 'NO', 'enteraddons-pro' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'slider_animateOut',
            [
                'label'     => esc_html__( 'Animate Out', 'enteraddons-pro' ),
                'type'      => \Elementor\Controls_Manager::SWITCHER,
                'label_on'  => esc_html__( 'Yes', 'enteraddons-pro' ),
                'label_off' => esc_html__( 'NO', 'enteraddons-pro' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'slider_nav',
            [
                'label'     => esc_html__( 'Nav', 'enteraddons-pro' ),
                'type'      => \Elementor\Controls_Manager::SWITCHER,
                'label_on'  => esc_html__( 'Yes', 'enteraddons-pro' ),
                'label_off' => esc_html__( 'NO', 'enteraddons-pro' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'slider_dots',
            [
                'label'     => esc_html__( 'Dots', 'enteraddons-pro' ),
                'type'      => \Elementor\Controls_Manager::SWITCHER,
                'label_on'  => esc_html__( 'Yes', 'enteraddons-pro' ),
                'label_off' => esc_html__( 'NO', 'enteraddons-pro' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'slider_autoWidth',
            [
                'label'     => esc_html__( 'Auto Width', 'enteraddons-pro' ),
                'type'      => \Elementor\Controls_Manager::SWITCHER,
                'label_on'  => esc_html__( 'Yes', 'enteraddons-pro' ),
                'label_off' => esc_html__( 'NO', 'enteraddons-pro' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'slider_autoplayTimeout',
            [
                'label' => esc_html__( 'Autoplay Timeout', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'label_block' => false,
                'default' => 8000
            ]
        );
        $this->add_control(
            'slider_smartSpeed',
            [
                'label' => esc_html__( 'Smart Speed', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'label_block' => false,
                'default' => 450
            ]
        ); 
        $this->end_controls_section(); // End Image Slider content

        /**
         * Style Tab
         * ------------------------------ Wrapper Style ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_team__darousel_wrapper_style_settings', [
                'label' => esc_html__( 'Wapper Settings', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
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
                    '{{WRAPPER}} .enteraddons-team-carousel' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .enteraddons-team-carousel' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
        \Elementor\Group_Control_Border::get_type(),
            [
                'name'      => 'wrapper_border',
                'label'     => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector'  => '{{WRAPPER}} .enteraddons-team-carousel',
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
                    '{{WRAPPER}} .enteraddons-team-carousel' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wrapper_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-team-carousel',
            ]
        ); 
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'wrapper_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .enteraddons-team-carousel',
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Slide Item  Style ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_team_wrapper_style_settings', [
                'label' => esc_html__( 'Slide Item Settings', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'team_layout_position',
            [
                'label' => esc_html__( 'Layout', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'row' => [
                        'title' => esc_html__( 'Left Layout', 'enteraddons-pro' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'column' => [
                        'title' => esc_html__( 'Top Layout', 'enteraddons-pro' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'column-reverse' => [
                        'title' => esc_html__( 'Bottom Layout', 'enteraddons-pro' ),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                    'row-reverse' => [
                        'title' => esc_html__( 'Right Layout', 'enteraddons-pro' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'column',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-single-team-carousel' => 'flex-direction: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'item_alignment',
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
                    '{{WRAPPER}} .enteraddons-wid-con .enteraddons-single-team-carousel' => 'text-align: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_responsive_control(
            'item_vertical_alignment',
            [
                'label' => esc_html__( 'Content Vertical Alignment', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__( 'Image Top', 'enteraddons-pro' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Image Center', 'enteraddons-pro' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__( 'Image Bottom', 'enteraddons-pro' ),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'center',
                'condition' => [ 'team_layout_position' => ['row','row-reverse'] ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-wid-con .enteraddons-single-team-carousel' => 'align-items: {{VALUE}} !important',
                ],
            ]
        );
        $this->start_controls_tabs( 'tab_team' );

        //  Controls tab For Normal
        $this->start_controls_tab(
            'item_normal',
            [
                'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
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
                        '{{WRAPPER}} .enteraddons-wid-con .enteraddons-single-team-carousel' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .enteraddons-wid-con .enteraddons-single-team-carousel' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
                [
                    'name'      => 'item_border',
                    'label'     => esc_html__( 'Border', 'enteraddons-pro' ),
                    'selector'  => '{{WRAPPER}} .enteraddons-wid-con .enteraddons-single-team-carousel',
                ]
            );
            $this->add_responsive_control(
                'item_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .enteraddons-wid-con .enteraddons-single-team-carousel' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'item_shadow',
                    'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                    'selector' => '{{WRAPPER}} .enteraddons-wid-con .enteraddons-single-team-carousel',
                ]
            ); 
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'item_background',
                    'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .enteraddons-wid-con .enteraddons-single-team-carousel',
                ]
            );

        $this->end_controls_tab(); // End Controls tab

        //  Controls tab For Hover
        $this->start_controls_tab(
            'item_hover',
            [
                'label' => esc_html__( 'Hover', 'enteraddons-pro' ),
            ]
        );
            $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
                [
                    'name'      => 'item_hover_border',
                    'label'     => esc_html__( 'Border', 'enteraddons-pro' ),
                    'selector'  => '{{WRAPPER}} .enteraddons-wid-con .enteraddons-single-team-carousel:hover',
                ]
            );
            $this->add_responsive_control(
                'item_hover_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .enteraddons-wid-con .enteraddons-single-team-carousel:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'item_hover_shadow',
                    'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                    'selector' => '{{WRAPPER}} .enteraddons-wid-con .enteraddons-single-team-carousel:hover',
                ]
            ); 
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'item_hover_background',
                    'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .enteraddons-wid-con .enteraddons-single-team-carousel:hover',
                ]
            );


        $this->end_controls_tab(); // End Controls tab

        $this->end_controls_tabs(); //  end controls tabs section

        $this->end_controls_section();

        //------------------------------ Team content area Style ------------------------------
        $this->start_controls_section(
            'enteraddons_team_content_area_style', [
                'label' => esc_html__( 'Content Area', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'content_area_align',
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
                    '{{WRAPPER}} .enteraddons-team-carousel-content' => 'text-align: {{VALUE}} !important',
                    '{{WRAPPER}} .enteraddons-content-front' => 'text-align: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_responsive_control(
            'content_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-team-carousel-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'content_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-team-carousel-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'content_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-team-carousel-content',
            ]
        );
        $this->add_responsive_control(
            'content_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-team-carousel-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .enteraddons-team-carousel-content',
            ]
        );
        $this->end_controls_section();

        //------------------------------ Team Image Style ------------------------------
        $this->start_controls_section(
            'enteraddons_team_image_style', [
                'label' => esc_html__( 'Image', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs( 'tab_team_image' );

        //  Controls tab For Normal
        $this->start_controls_tab(
            'item_image_normal',
            [
                'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .enteraddons-team-carousel-image img' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .enteraddons-team-carousel-image img' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .enteraddons-team-carousel-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .enteraddons-team-carousel-image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'img_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-team-carousel-image img',
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
                    '{{WRAPPER}} .enteraddons-team-carousel-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'img_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-team-carousel-image img',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'image_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .enteraddons-team-carousel-image img',
            ]
        );
        $this->end_controls_tab(); // End Controls tab

        //  Controls tab For Hover
        $this->start_controls_tab(
            'item_image_hover',
            [
                'label' => esc_html__( 'Hover', 'enteraddons-pro' ),
            ]
        );
        $this->add_responsive_control(
            'img_hover_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-single-team-carousel:hover .enteraddons-team-carousel-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'img_hover_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-single-team-carousel:hover .enteraddons-team-carousel-image img',
            ]
        );
        $this->end_controls_tab(); // End Controls tab

        $this->end_controls_tabs(); //  end controls tabs section

        $this->end_controls_section();

        //------------------------------ Team Title Style ------------------------------
        $this->start_controls_section(
            'enteraddons_team_title_style', [
                'label' => esc_html__( 'Title', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs( 'tab_team_carousel_title' );

        //  Controls tab For Normal
        $this->start_controls_tab(
            'item_title_normal',
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
                    '{{WRAPPER}} .enteraddons-single-team-carousel .enteraddons-team-carousel-content .team-carousel-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-single-team-carousel .enteraddons-team-carousel-content .team-carousel-title',
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
                    '{{WRAPPER}} .enteraddons-single-team-carousel .enteraddons-team-carousel-content .team-carousel-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .enteraddons-single-team-carousel .enteraddons-team-carousel-content .team-carousel-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .enteraddons-single-team-carousel:hover .enteraddons-team-carousel-content .team-carousel-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab(); // End Controls tab

        $this->end_controls_tabs(); //  end controls tabs section

        $this->end_controls_section();

        //------------------------------ Team Designation Style ------------------------------
        $this->start_controls_section(
            'enteraddons_team_designation_style', [
                'label' => esc_html__( 'Designation', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // start controls tabs
        $this->start_controls_tabs( 'tab_designation_style' );

        //  Controls tab For Normal
        $this->start_controls_tab(
            'tab_designation_normal',
            [
                'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'designation_color',
            [
                'label' => esc_html__( 'Title Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-single-team-carousel .enteraddons-team-carousel-content .team-carousel-designation' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'designation_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-single-team-carousel .enteraddons-team-carousel-content .team-carousel-designation',
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
                    '{{WRAPPER}} .enteraddons-single-team-carousel .enteraddons-team-carousel-content .team-carousel-designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .enteraddons-single-team-carousel .enteraddons-team-carousel-content .team-carousel-designation' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab(); // End Controls tab
        //  Controls tab For Hover
        $this->start_controls_tab(
            'item_designation_hover',
            [
                'label' => esc_html__( 'Hover', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'designation_hover_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-single-team-carousel:hover .enteraddons-team-carousel-content .team-carousel-designation' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab(); // End Controls tab
        $this->end_controls_tabs(); //  end controls tabs section
        $this->end_controls_section();

        //------------------------------ Team Experience Style ------------------------------
        $this->start_controls_section(
            'enteraddons_team_experience_style', [
                'label' => esc_html__( 'Experience', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // start controls tabs
        $this->start_controls_tabs( 'tab_experience_style' );

        //  Controls tab For Normal
        $this->start_controls_tab(
            'tab_experience_normal',
            [
                'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'experience_color',
            [
                'label' => esc_html__( 'Title Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-single-team-carousel .enteraddons-team-carousel-content .enteradd--experience' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'experience_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-single-team-carousel .enteraddons-team-carousel-content .enteradd--experience',
            ]
        );
        $this->add_responsive_control(
            'experience_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-single-team-carousel .enteraddons-team-carousel-content .enteradd--experience' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'experience_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-single-team-carousel .enteraddons-team-carousel-content .enteradd--experience' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab(); // End Controls tab
        //  Controls tab For Hover
        $this->start_controls_tab(
            'item_experience_hover',
            [
                'label' => esc_html__( 'Hover', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'experience_hover_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-single-team-carousel:hover .enteraddons-team-carousel-content .enteradd--experience' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab(); // End Controls tab
        $this->end_controls_tabs(); //  end controls tabs section
        $this->end_controls_section();

        //------------------------------ Team Descriptions Style ------------------------------
        $this->start_controls_section(
            'enteraddons_team_descriptions_style', [
                'label' => esc_html__( 'Descriptions', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // start controls tabs
        $this->start_controls_tabs( 'tab_descriptions_style' );

        //  Controls tab For Normal
        $this->start_controls_tab(
            'tab_descriptions_normal',
            [
                'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'descriptions_color',
            [
                'label' => esc_html__( 'Title Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .enteradd--descriptions' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'descriptions_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteradd--descriptions',
            ]
        );
        $this->add_responsive_control(
            'descriptions_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteradd--descriptions' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'descriptions_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteradd--descriptions' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab(); // End Controls tab
        //  Controls tab For Hover
        $this->start_controls_tab(
            'item_descriptions_hover',
            [
                'label' => esc_html__( 'Hover', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'descriptions_hover_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-single-team-carousel:hover .enteraddons-team-carousel-content .enteradd--descriptions' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab(); // End Controls tab
        $this->end_controls_tabs(); //  end controls tabs section
        $this->end_controls_section();

        //------------------------------ Team link Style ------------------------------
        $this->start_controls_section(
            'enteraddons_team_link_style', [
                'label' => esc_html__( 'Link', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'link_display',
            [
                'label' => esc_html__( 'Display', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'inline-block',
                'options' => [
                    'inline-block'  => esc_html__( 'Inline Block', 'enteraddons-pro' ),
                    'block' => esc_html__( 'block', 'enteraddons-pro' ),
                    'none' => esc_html__( 'None', 'enteraddons-pro' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-team-carousel-content .readme-more-link' => 'display: {{VALUE}};',
                ]
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'link_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-team-carousel-content .readme-more-link',
            ]
        );
        $this->add_responsive_control(
            'link_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-team-carousel-content .readme-more-link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'link_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-team-carousel-content .readme-more-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        // start controls tabs
        
        $this->start_controls_tabs( 'tab_team_carousel_link_style' );

        //  Controls tab For Normal
        $this->start_controls_tab(
            'tab_link_normal',
            [
                'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
            ]
        );

        $this->add_control(
            'link_color',
            [
                'label' => esc_html__( 'Link Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-team-carousel-content .readme-more-link' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'link_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .enteraddons-team-carousel-content .readme-more-link',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'link_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-team-carousel-content .readme-more-link',
            ]
        );
        $this->add_responsive_control(
            'link_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-team-carousel-content .readme-more-link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'link_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-team-carousel-content .readme-more-link',
            ]
        ); 

        $this->end_controls_tab();


        //  Controls tab For Hover
        $this->start_controls_tab(
            'tab_link_hover',
            [
                'label' => esc_html__( 'Hover', 'enteraddons-pro' ),
            ]
        );

        $this->add_control(
            'link_hover_color',
            [
                'label' => esc_html__( 'Link Hover Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-team-carousel-content .readme-more-link:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'link_hover_background',
                'label' => esc_html__( 'Hover Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .enteraddons-team-carousel-content .readme-more-link:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'link_hover_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-team-carousel-content .readme-more-link:hover',
            ]
        );
        $this->add_responsive_control(
            'link_border_hover_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-team-carousel-content .readme-more-link:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'link_box_hover_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-team-carousel-content .readme-more-link:hover',
            ]
        );
        $this->end_controls_tabs(); //  end controls section

        $this->end_controls_section();

        //------------------------------ Team Social Icon Style ------------------------------
        $this->start_controls_section(
            'enteraddons_team_social_icon_style', [
                'label' => esc_html__( 'Social Icon', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

         // start controls tabs
        
        $this->start_controls_tabs( 'tab_social_style' );

        //  Controls tab For Normal
        $this->start_controls_tab(
            'tab_social_normal',
            [
                'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
            ]
        );
        $this->add_responsive_control(
            'icon_width',
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
                    '{{WRAPPER}} .enteraddons-team-carousel-social-icon a' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_height',
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
                    '{{WRAPPER}} .enteraddons-team-carousel-social-icon a' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'social_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-team-carousel-social-icon a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_icon_size',
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
                    '{{WRAPPER}} .enteraddons-team-carousel-social-icon a i' => 'font-size: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .enteraddons-team-carousel-social-icon a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .enteraddons-team-carousel-social-icon a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'social_icon_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-team-carousel-social-icon a',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'social_icon_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-team-carousel-social-icon a',
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
                    '{{WRAPPER}} .enteraddons-team-carousel-social-icon a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'social_icon_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .enteraddons-team-carousel-social-icon a',
            ]
        );
        $this->add_responsive_control(
            'social_icon_alignment',
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
                    '{{WRAPPER}} .enteraddons-team-carousel-social-icon' => 'justify-content: {{VALUE}} !important',
                ],
            ]
        );

        $this->end_controls_tab();

        //  Controls tab For Hover
        $this->start_controls_tab(
            'tab_social_hover',
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
                    '{{WRAPPER}} .enteraddons-team-carousel-social-icon a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'social_hover_icon_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-team-carousel-social-icon a:hover',
            ]
        );
        $this->add_responsive_control(
            'social_icon_hover_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-team-carousel-social-icon a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'social_icon_hover_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-team-carousel-social-icon a:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'social_icon_hover_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .enteraddons-team-carousel-social-icon a:hover',
            ]
        );
        $this->end_controls_tab();

        $this->end_controls_tabs(); //  end controls section

        $this->end_controls_section();

         /**
         * Style Tab
         * ------------------------------ Slider Nav Style Settings ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_slider_nav_settings', [
                'label' => esc_html__( 'Nav Setings', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'nav_top_position',
            [
                'label' => esc_html__( 'Nav Top Position', 'enteraddons-pro' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px','%' ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-nav' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'nav_bottom_position',
            [
                'label' => esc_html__( 'Nav Bottom Position', 'enteraddons-pro' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px','%' ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-nav' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_control(
            'nav_wrapper_heading',
            [
                'label' => esc_html__( 'Nav Wrapper Settings', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'nav_item_heading',
            [
                'label' => esc_html__( 'Nav Item Settings', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'nav_width',
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
                    'size' => 30,
                ],
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-nav button' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'nav_height',
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
                'default' => [
                    'unit' => 'px',
                    'size' => 30,
                ],
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-nav button' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'nav_icon_size',
            [
                'label' => esc_html__( 'Icon Size', 'enteraddons-pro' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-nav button i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'nav_alignment',
            [
                'label' => esc_html__( 'Nav Alignment', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .owl-carousel .owl-nav' => 'text-align: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_responsive_control(
            'nav_prev_margin',
            [
                'label' => esc_html__( 'Margin Nav Prev', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-nav button.owl-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'nav_next_margin',
            [
                'label' => esc_html__( 'Margin Nav Next', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-nav button.owl-next' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'nav_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-nav button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'nav_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .owl-carousel .owl-nav button',
            ]
        );
        $this->add_responsive_control(
            'nav_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // start controls tabs

        $this->start_controls_tabs( 'tab_link_style' );

        //  Controls tab For Normal
        $this->start_controls_tab(
            'nav_normal',
            [
                'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
            ]
        );

        $this->add_control(
            'nav_color',
            [
                'label' => esc_html__( 'Nav Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-nav button' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'nav_bg_color',
                'label' => esc_html__( 'Nav Background', 'enteraddons-pro' ),
                'show_label' => false,
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .owl-carousel .owl-nav button',
            ]
        );

        $this->end_controls_tab(); // End Controls tab

        //  Controls tab For Hover
        $this->start_controls_tab(
            'nav_hover_normal',
            [
                'label' => esc_html__( 'Hover', 'enteraddons-pro' ),
            ]
        );

        $this->add_control(
            'nav_hover_color',
            [
                'label' => esc_html__( 'Nav Hover Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-nav button:hover' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'nav_hover_bg_color',
                'label' => esc_html__( 'Nav Hover Background', 'enteraddons-pro' ),
                'show_label' => true,
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .owl-carousel .owl-nav button:hover',
            ]
        );
        $this->end_controls_tab(); // End Controls tab
        $this->end_controls_tabs(); //  end controls tabs section
        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Slider dot Style Settings ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_slider_dot_settings', [
                'label' => esc_html__( 'Dot Setings', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'dot_alignment',
            [
                'label' => esc_html__( 'Alignment', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'enteraddons-pro' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'enteraddons-pro' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'enteraddons-pro' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-team-carousel.owl-carousel .owl-dots' => 'justify-content: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_responsive_control(
            'dot_width',
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
                    'size' => 15,
                ],
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-dots button.owl-dot' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'dot_height',
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
                'default' => [
                    'unit' => 'px',
                    'size' => 15,
                ],
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-dots button.owl-dot' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'dot_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-dots button.owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'dot_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-dots button.owl-dot' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'dot_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-dots button.owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // start controls tabs

        $this->start_controls_tabs( 'tab_dot_style' );

        //  Controls tab For Normal
        $this->start_controls_tab(
            'dot_normal',
            [
                'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'dot_normal_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .owl-carousel .owl-dots button.owl-dot',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'dot_bg_color',
                'label' => esc_html__( 'Dot Background', 'enteraddons-pro' ),
                'show_label' => false,
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .owl-carousel .owl-dots button.owl-dot',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'dot_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .owl-carousel .owl-dots button.owl-dot',
            ]
        );

        $this->end_controls_tab(); // End Controls tab

        //  Controls tab For Hover
        $this->start_controls_tab(
            'dot_active',
            [
                'label' => esc_html__( 'Active', 'enteraddons-pro' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'dot_ative_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-team-carousel .owl-dots .owl-dot.active',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'dot_active_bg_color',
                'label' => esc_html__( 'Dot Active Background', 'enteraddons-pro' ),
                'show_label' => true,
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .enteraddons-team-carousel .owl-dots .owl-dot.active',
            ]
        );
        $this->add_responsive_control(
            'dot_shadow_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-team-carousel .owl-dots .owl-dot.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'active_dot_box_shadow',
                'label' => esc_html__( ' Active Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .owl-carousel .owl-dots button.owl-dot.active',
            ]
        );
        $this->end_controls_tab(); // End Controls tab
        
        $this->end_controls_tabs(); //  end controls tabs section

        $this->end_controls_section();
	}

	protected function render() {

        // get settings
        $settings = $this->get_settings_for_display();

        // Tema template render
        $obj = new Team_Carousel_Template();
        $obj::setDisplaySettings( $settings );
        $obj->renderTemplate();

    }
    
    public function get_script_depends() {
        return [ 'enteraddons-pro-main', 'owl-carousel'];
    }
    
    public function get_style_depends() {
        return [ 'enteraddons-global-style', 'owl-carousel'];
    }

}
