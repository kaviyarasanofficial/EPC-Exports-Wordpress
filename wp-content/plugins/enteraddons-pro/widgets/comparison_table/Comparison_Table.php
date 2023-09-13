<?php
namespace EnteraddonsPro\Widgets\Comparison_Table;

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
 * Enteraddons elementor Comparison Table widget.
 *
 * @since 1.0
 */

class Comparison_Table extends Widget_Base {
    
	public function get_name() {
		return 'enteraddons-comparison-table';
	}

	public function get_title() {
		return esc_html__( 'Comparison Table', 'enteraddons-pro' );
	}

	public function get_icon() {
		return 'entera entera-comparison-table';
	}

	public function get_categories() {
		return ['enteraddons-pro-elements-category'];
	}

	protected function register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Comparison Table Content ------------------------------
        $this->start_controls_section(
            'enteraddons_comparison_table_content_settings',
            [
                'label' => esc_html__( 'Comparison Table Heading', 'enteraddons-pro' ),
            ]
        );
        $repeater->add_control(
            'dp_heading_text', 
            [
                'label' => esc_html__( 'Title', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Enteraddons' , 'enteraddons-pro' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
			'show_icon',
			[
				'label' => esc_html__( 'Show Image', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'enteraddons-pro' ),
				'label_off' => esc_html__( 'Hide', 'enteraddons-pro' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
        $repeater->add_control(
            'dp_heading_image',
            [
                'label' => esc_html__( 'Image', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                     'show_icon' => 'yes'
                    ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'price',
            [
                'label' => esc_html__( 'Price', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( '49', 'enteraddons-pro' )
            ]
        );
        $repeater->add_control(
            'currency',
            [
                'label' => esc_html__( 'Currency', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'label_block' => true,
                'options' => \Enteraddons\Classes\Helper::getCurrencyList(),
                'default' => 'dollar'
            ]
        );
        $repeater->add_control(
            'custom_currency',
            [
                'label' => esc_html__( 'Custom Currency', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [ 'currency' => 'custom' ],
                'label_block' => true
            ]
        );
        $repeater->add_control(
            'duration',
            [
                'label' => esc_html__( 'Duration', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( '/Month', 'enteraddons-pro' )
            ]
        );
        $repeater->add_control(
            'show_badge',
            [
                'label' => esc_html__( 'Show Badge', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'enteraddons-pro' ),
                'label_off' => esc_html__( 'Hide', 'enteraddons-pro' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $repeater->add_control(
            'badge_style',
            [
                'label' => esc_html__( 'Badge Style', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'condition'=> ['show_badge' => 'yes'],
                'default' => 'ct-badge-style-1',
                'options' => [
                    'ct-badge-style-1' => esc_html__( 'Style 1', 'enteraddons-pro' ),
                    'ct-badge-style-2'  => esc_html__( 'Style 2', 'enteraddons-pro' ),
                    'ct-badge-style-3'  => esc_html__( 'Style 3', 'enteraddons-pro' ),
                ]
            ]
        );
        $repeater->add_control(
            'badge_text',
            [
                'label' => esc_html__( 'Badge Text', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition'=> ['show_badge' => 'yes'],
                'label_block' => true,
                'default' => esc_html__( 'Popular', 'enteraddons-pro' )
            ]
        );
        $this->add_control(
            'dp_heading_content_repetable',
            [
                'label' => esc_html__( 'Heading Title List', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'dp_heading_text' => esc_html__( 'Domain', 'enteraddons-pro' ),
                    ],
                    [
                        'dp_heading_text' => esc_html__( '1 Year', 'enteraddons-pro' ),
                        
                    ],
                    [
                        'dp_heading_text' => esc_html__( '2 Year', 'enteraddons-pro' ),
                        
                    ],
                    [
                        'dp_heading_text' => esc_html__( '2 Year', 'enteraddons-pro' ),
                        
                    ],
                    [
                        'dp_heading_text' => esc_html__( '2 Year', 'enteraddons-pro' ),
                        
                    ],      
                ],
                'title_field' => '{{{ dp_heading_text }}}',
            ]
        ); 
        $this->end_controls_section(); // End Comparison Table content

        // ---------------------------------------- Comparison Table content ------------------------------

        $this->start_controls_section(
            'table_body_content',
            [
                'label'	=> esc_html__('Comparison Table Content','enteraddons-pro'),
            ]
        );
        $_repeater = new \Elementor\Repeater();

        $_repeater->add_control(
            'tbody_condition',
            [
                'label' => esc_html__( 'Row/Column', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'row',
                'options' => [
                    'row' => esc_html__( 'Row', 'enteraddons-pro'),
                    'col' => esc_html__( 'Column', 'enteraddons-pro'),
                    
                ],
            ]
        );
        $_repeater->add_control(
            'tbody_content_condition',
            [
                'label' => esc_html__( 'Select', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'contents',
                'options' => [
                    'contents' => esc_html__( 'Content', 'enteraddons-pro'),
                    'btn' => esc_html__( 'Button', 'enteraddons-pro'),
                    
                ],
                'condition'=> [
                    'tbody_condition'	=> 'col'
                ],
            ]
        );
        $_repeater->add_control(
			'ea_show_icon',
			[
				'label' => esc_html__( 'Show Icon', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
                'condition'	=>[
                    'tbody_content_condition'	=> 'contents',
                ],
				'label_on' => esc_html__( 'Show', 'enteraddons-pro' ),
				'label_off' => esc_html__( 'Hide', 'enteraddons-pro' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
        $_repeater->add_control(
            'content_title', [
                'label' => esc_html__( 'Content Title', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Content Title' , 'enteraddons-pro' ),
                'label_block' => true,
                'condition'	=>[

                    'tbody_content_condition'	=> 'contents',
                ],
            ]
        );
        $_repeater->add_control(
            'btn_title', [
                'label' => esc_html__( 'Button Title', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Buy How' , 'enteraddons-pro' ),
                'label_block' => true,
                'condition'	=>[

                    'tbody_content_condition'	=> 'btn',
                ],
            ]
        );
        $_repeater->add_control(
            'btn_links',
            [
                'label' => esc_html__( 'Button Link', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'enteraddons-pro' ),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
                'condition'=> [
                    'tbody_content_condition'=>'btn'
                ],
            ]
        );
        $_repeater->add_control(
            'icon_type',
            [
                'label' => esc_html__( 'Icon Type', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'condition'	=>[

                    'tbody_content_condition'	=> 'contents',
                    'ea_show_icon'  => 'yes'
                ],
                'default' => 'icon',
                'options' => [
                    'icon' => esc_html__( 'Icon', 'enteraddons-pro' ),
                    'img'  => esc_html__( 'Image', 'enteraddons-pro' ),
                ],
            ]
        );
        $_repeater->add_control(
            'tbody_icon',
            [
                'label' => esc_html__( 'Icon', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-check',
                    'library' => 'solid',
                ],
                'condition'	=>[
                    'tbody_content_condition'	=> 'contents',
                    'icon_type'  => 'icon',
                    'ea_show_icon'  => 'yes'
                ],
            ]
        );
        $_repeater->add_control(
            'tbody_image',
            [
                'label' => esc_html__( 'Image', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                     'tbody_content_condition'	=> 'contents',
                     'icon_type' => 'img' ,
                     'ea_show_icon'  => 'yes'
                    ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'tbody_list',
            [
                'label' => esc_html__( 'Content List', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $_repeater->get_controls(),
                'default'=>[
                    [
                        'tbody_condition'=>'col',
                        'tbody_content_condition'=>'contents',
                        'content_title'=>esc_html__('Website','enteraddons-pro'),
                    ],
                    [
                        'tbody_condition'=>'col',
                        'tbody_content_condition'=>'contents',
                        'content_title'=>esc_html__('20 Website','enteraddons-pro'),
                    ],
                    [
                        'tbody_condition'=>'col',
                        'tbody_content_condition'=>'contents',
                        'content_title'=>esc_html__('30 Website','enteraddons-pro'),
                    ],
                    [
                        'tbody_condition'=>'col',
                        'tbody_content_condition'=>'contents',
                        'content_title'=>esc_html__('50 Website','enteraddons-pro'),
                    ],
                    [
                        'tbody_condition'=>'col',
                        'tbody_content_condition'=>'contents',
                        'content_title'=>esc_html__('70 Website','enteraddons-pro'),
                    ],
                    
                    [
                        'tbody_condition'=>'row',
                    ],
                    [
                        'tbody_condition'=>'col',
                        'tbody_content_condition'=>'contents',
                        'content_title'=>esc_html__('SSD Storage','enteraddons-pro'),
                    ],
                    
                    [
                        'tbody_condition'=>'col',
                        'tbody_content_condition'=>'contents',
                        'content_title'=>esc_html__('1 GB','enteraddons-pro'),
                    ],
                    [
                        'tbody_condition'=>'col',
                        'tbody_content_condition'=>'contents',
                        'content_title'=>esc_html__('2 GB','enteraddons-pro'),
                    ],
                    [
                        'tbody_condition'=>'col',
                        'tbody_content_condition'=>'contents',
                        'content_title'=>esc_html__('3 GB','enteraddons-pro'),
                    ],
                    [
                        'tbody_condition'=>'col',
                        'tbody_content_condition'=>'contents',
                        'content_title'=>esc_html__('5 GB','enteraddons-pro'),
                    ],
                    
                    [
                        'tbody_condition'=>'row',
                    ],
                    [
                        'tbody_condition'=>'col',
                        'tbody_content_condition'=>'contents',
                        'content_title'=>esc_html__(' ','enteraddons-pro'),
                    ],
                    [
                        'tbody_condition'=>'col',
                        'tbody_content_condition'=>'btn',
                        'btn_title'=>esc_html__( 'Buy Now', 'enteraddons-pro' ),
                    ],
                    [
                        'tbody_condition'=>'col',
                        'tbody_content_condition'=>'btn',
                        'btn_title'=>esc_html__( 'Buy Now', 'enteraddons-pro' ),
                    ],
                    [
                        'tbody_condition'=>'col',
                        'tbody_content_condition'=>'btn',
                        'btn_title'=>esc_html__( 'Buy Now', 'enteraddons-pro' ),
                    ],
                    [
                        'tbody_condition'=>'col',
                        'tbody_content_condition'=>'btn',
                        'btn_title'=>esc_html__( 'Buy Now', 'enteraddons-pro' ),
                    ],
  
                ],
                'title_field' => '{{{ tbody_condition }}}',
            ]
        );

        $this->end_controls_section();

         // ---------------------------------------- Comparison Table Wrapper Style ------------------------------

         $this->start_controls_section(
            'wrapper_style',
            [
                'label' => esc_html__( 'Wrapper Style', 'enteraddons-pro'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_responsive_control(
            'table_width',
            [
                'label'      => __('Width', 'enteraddons-pro'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['%', 'px'],
                'range'      => [
                    '%'  => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 1600,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .ea-ct-table-wrapper table' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'table_border',
                    'label' => esc_html__( 'Border', 'enteraddons-pro'),
                    'selector' => '{{WRAPPER}} .ea-ct-table-wrapper table ',
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
                    '{{WRAPPER}} .ea-ct-table-wrapper table ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_responsive_control(
            'table_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-table-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'table_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-table-wrapper table' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'table_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-ct-table-wrapper table',
            ]
        ); 
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'table_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .ea-ct-table-wrapper table',
            ]
        );
        $this->end_controls_section();

         // ---------------------------------------- Comparison Table Heading Style ------------------------------

         $this->start_controls_section(
            'table_heading_style',
            [
                'label' => esc_html__( 'Heading Style', 'enteraddons-pro'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_responsive_control(
            'data_table_header_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-table-wrapper table thead th' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                 'name' => 'data_table_header_title_typography',
                'selector' => '{{WRAPPER}} .ea-ct-table-wrapper table thead tr th .ea-ct-heading-content h4',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Text_Stroke::get_type(),
            [
                'name' => 'data_table_header_title_text_stroke',
                'selector' => '{{WRAPPER}} .ea-ct-table-wrapper table thead tr th .ea-ct-heading-content h4',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'table_heading_border',
                    'label' => esc_html__( 'Border', 'enteraddons-pro'),
                    'selector' => '{{WRAPPER}} .ea-ct-table-wrapper table thead tr th ',
                ]
        );
        $this->add_responsive_control(
            'table_section_header_radius',
            [
                'label' => esc_html__( 'Header Border Radius', 'enteraddons-pro'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 50,
                    ],
                ],

                'selectors' => [ 
                    '{{WRAPPER}} .ea-ct-table-wrapper table thead tr th:first-child' => 'border-radius: {{SIZE}}px 0px 0px 0px;',
                    '{{WRAPPER}} .ea-ct-table-wrapper table thead tr th:last-child' => 'border-radius: 0px {{SIZE}}px 0px 0px;',
                ],
            ]
        );
        $this->add_responsive_control(
            'data_table_header_title_alignment',
            [
                'label' => esc_html__( 'Title Alignment', 'enteraddons-pro'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label_block' => true,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'enteraddons-pro'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'enteraddons-pro'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'enteraddons-pro'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}}  .ea-ct-heading-content' => 'text-align: {{VALUE}}',
                ]
                
            ]
        );
        $this->start_controls_tabs('data_table_header_title_normal_tab');
        $this->start_controls_tab( 
            'data_table_header_title_normal',
            [
                'label' => esc_html__( 'Normal', 'enteraddons-pro') 
            ] 
        );
        $this->add_control(
            'data_table_header_title_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-table-wrapper table thead tr th .ea-ct-heading-content h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'data_table_header_title_bg_color',
            [
                'label' => esc_html__( 'Background Color', 'enteraddons-pro'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4a4893',
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-table-wrapper table thead' => 'background-color: {{VALUE}};'
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab( 
            'data_table_header_title_hover',
            [
                'label' => esc_html__( 'Hover', 'enteraddons-pro') 
            ]
        );
        $this->add_control(
            'data_table_header_title_hover_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-table-wrapper table thead tr th:hover .ea-ct-heading-content h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'data_table_header_title_hover_cell_bg_color',
            [
                'label' => esc_html__( 'Background Color', 'enteraddons-pro'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-table-wrapper table thead tr th:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Comparison Table Badge Style Settings ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_comparison_table_badge_settings', [
                'label' => esc_html__( 'Badge Style', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'badge_text_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-ct-price-badge',
            ]
        );
        $this->add_control(
            'badge_text_color',
            [
                'label' => esc_html__( 'Badge Text Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-ct-price-badge' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'badge_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-ct-price-badge' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_responsive_control(
            'badge_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-ct-price-badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'badge_bg_color',
                'label' => esc_html__( 'Badge Background Color', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .enteraddons-ct-price-badge',
            ]
        );
        $this->add_responsive_control(
            'badge_width',
            [
                'label' => esc_html__( 'Badge Width', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .enteraddons-ct-price-badge' => 'width: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'badge_height',
            [
                'label' => esc_html__( 'Badge Height', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .enteraddons-ct-price-badge' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'badge_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-ct-price-badge',
            ]
        ); 
        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Comparison Table Pricing Style Settings ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_comparison_table_pricing_settings', [
                'label' => esc_html__( 'Pricing Style', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'comparison_table_price_area_heading',
            [
                'label' => esc_html__( 'Pricing Area', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'price_area_display',
            [
                'label' => esc_html__( 'Display', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'block',
                'options' => [
                    'block'  => esc_html__( 'Block', 'enteraddons-pro' ),
                    'inline-flex' => esc_html__( 'Inline Block', 'enteraddons-pro' ),
                    'none'   => esc_html__( 'None', 'enteraddons-pro' ),
                ],
                'selectors' => [
                    '{{WRAPPER}}  .enteraddons-ct-price' => 'display: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'horizontal_align',
            [
                'label' => esc_html__( 'Alignment', 'enteraddons-pro' ),
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
                    '{{WRAPPER}}  .enteraddons-ct-price' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'price_area_width',
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
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-ct-price' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'price_area_height',
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
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}}  .enteraddons-ct-price' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'price_area_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}}  .enteraddons-ct-price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'price_area_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}}  .enteraddons-ct-price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'price_area_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}}  .enteraddons-ct-price',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'price_area_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}}  .enteraddons-ct-price',
            ]
        );
        $this->add_control(
            'pricing_table_price_heading',
            [
                'label' => esc_html__( 'Price', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'price_color',
            [
                'label' => esc_html__( 'Price Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-ct-price .price' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'price_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-ct-price .price',
            ]
        );
        $this->add_control(
            'pricing_table_currency_heading',
            [
                'label' => esc_html__( 'Currency', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'currency_color',
            [
                'label' => esc_html__( 'Currency Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-ct-price .ea-ct-currency' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'currency_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-ct-price .ea-ct-currency',
            ]
        );
        $this->add_responsive_control(
            'currency_align',
            [
                'label' => esc_html__( 'Vertical Alignment', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'super' => [
                        'title' => esc_html__( 'Top', 'enteraddons-pro' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'baseline' => [
                        'title' => esc_html__( 'Center', 'enteraddons-pro' ),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'sub' => [
                        'title' => esc_html__( 'Bottom', 'enteraddons-pro' ),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-ct-price .ea-ct-currency' => 'vertical-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'currency_margin',
            [
                'label' => esc_html__( 'Currency Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-ct-price .ea-ct-currency' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'pricing_table_duration_heading',
            [
                'label' => esc_html__( 'Duration', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'duration_color',
            [
                'label' => esc_html__( 'Duration Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-ct-price .ea-ct-duration' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'duration_typography',
                'label' => esc_html__( 'Typography', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .enteraddons-ct-price sub.ea-ct-duration',
            ]
        );
        $this->add_responsive_control(
            'duration_vertical_align',
            [
                'label' => esc_html__( 'Vertical Alignment', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'super' => [
                        'title' => esc_html__( 'Top', 'enteraddons-pro' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'baseline' => [
                        'title' => esc_html__( 'Center', 'enteraddons-pro' ),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'sub' => [
                        'title' => esc_html__( 'Bottom', 'enteraddons-pro' ),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-ct-price sub.ea-ct-duration' => 'vertical-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'duration_position',
            [
                'label' => esc_html__( 'Duration Position', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'inline-block' => [
                        'title' => esc_html__( 'Beside Price', 'enteraddons-pro' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'block' => [
                        'title' => esc_html__( 'Below Price', 'enteraddons-pro' ),
                        'icon' => ' eicon-v-align-bottom',
                    ],
                ],
                'default' => 'inline-block',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-ct-price .ct-duration-wrapper' => 'display: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'duration_margin',
            [
                'label' => esc_html__( 'Duration Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .enteraddons-ct-price .ct-duration-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    
        // /**
        //  * Style Tab
        //  * ----------------------------- Table Heading Image Style Settings -----------------------------
        //  *
        //  */

         $this->start_controls_section(
            'table_header_img_icon_settings', [
                'label' => esc_html__( 'Heading Image Style', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'table_header_img_width',
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
                    'size' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-heading-content img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'table_header_img_height',
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
                    '{{WRAPPER}} .ea-ct-heading-content img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        ); 
        $this->add_responsive_control(
            'table_header_img_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-heading-content img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'table_header_img_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-heading-content img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'table_header_img_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-ct-heading-content img',
            ]
        );
        $this->add_responsive_control(
            'table_header_img_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-heading-content img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // ---------------------------------------- Comparison Table Content Style ------------------------------

        $this->start_controls_section(
            'comparison_table_content_style_settings',
            [
                'label' => esc_html__( 'Comparison Content Style', 'enteraddons-pro'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                 'name' => 'comparison_table_content_typography',
                'selector' => '{{WRAPPER}} .ea-ct-table-wrapper table tbody td',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'comparison_table_cell_border',
                    'label' => esc_html__( 'Border', 'enteraddons-pro'),
                    'selector' => '{{WRAPPER}} .ea-ct-table-wrapper table tbody td',
                ]
        );
        $this->add_responsive_control(
            'comparison_table_each_cell_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em' ],
                'selectors' => [
                         '{{WRAPPER}} .ea-ct-table-wrapper table tbody td' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                 ],
            ]
        );
        $this->add_responsive_control(
            'comparison_content_icon_position',
            [
                'label' => esc_html__( 'Icon Position', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'row' => [
                        'title' => esc_html__( 'Left', 'enteraddons-pro' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'column' => [
                        'title' => esc_html__( 'Top', 'enteraddons-pro' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'column-reverse' => [
                        'title' => esc_html__( 'Bottom', 'enteraddons-pro' ),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                    'row-reverse' => [
                        'title' => esc_html__( 'Right', 'enteraddons-pro' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'row',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-td-content' => 'flex-direction: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'comparison_table_content_alignment',
            [
                'label' => esc_html__( 'Content Alignment', 'enteraddons-pro'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label_block' => true,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'enteraddons-pro'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'enteraddons-pro'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'enteraddons-pro'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-td-content' => 'justify-content: {{VALUE}}',
                ]
                
            ]
        );
        $this->start_controls_tabs(
            'style_tabs'
        );

        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'content_text_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-table-wrapper table tbody td' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'odd_main_bg_color_content',
            [
                'label' => esc_html__( 'Odd Row Background', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'odd_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .ea-ct-table-wrapper table tbody tr',
            ]
        ); 
        $this->add_control(
            'even_main_bg_color_content',
            [
                'label' => esc_html__( 'Even Row Background', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'even_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .ea-ct-table-wrapper table tbody tr:nth-child(even)',
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'even_text_hover_color',
            [
                'label' => esc_html__( 'Hover Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-table-wrapper table tbody td:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'even_bg_hover_color_heading',
            [
                'label' => esc_html__( 'Row Hover Background', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'even_bg_hover_color',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .ea-ct-table-wrapper table tbody tr:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Comparison Content Icon Style Settings ------------------------------
         *
         */
        $this->start_controls_section(
            'table_content_icon_settings', [
                'label' => esc_html__( 'Content Icon Style', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs( 'tab_table_content_icon' );

        //  Controls tab For Normal
        $this->start_controls_tab(
            'table_content_header_normal',
            [
                'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'table_content_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-td-content i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'table_content_icon_size',
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
                    'unit' => 'px',
                    'size' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-td-content i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'table_content_icon_width',
            [
                'label' => esc_html__( 'Icon Container Width', 'enteraddons-pro' ),
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
                    '{{WRAPPER}} .ea-ct-td-content i' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'table_content_icon_height',
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
                    'unit' => 'px',
                    'size' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-td-content i' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'table_content_icon_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-td-content i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'table_content_icon_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-td-content i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'table_content_icon_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-ct-td-content i',
            ]
        );
        $this->add_responsive_control(
            'content_icon_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-td-content i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'table_content_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .ea-ct-td-content i',
            ]
        );
        $this->end_controls_tab(); // End Controls tab

        //  Controls tab For Hover
        $this->start_controls_tab(
            'table_content_icon_hover',
            [
                'label' => esc_html__( 'Hover', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'table_content_icon_hover_color',
            [
                'label' => esc_html__( 'Icon Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-td-content:hover i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'table_content_hover_icon__background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .ea-ct-td-content:hover i',
            ]
        );
        $this->end_controls_tab(); // End Controls tab
        $this->end_controls_tabs(); //  end controls tabs section
        $this->end_controls_section();

        /**
         * Style Tab
         * ----------------------------- Image Style Settings ------------------------------
         *
         */

         $this->start_controls_section(
            'table_content_img_icon_settings', [
                'label' => esc_html__( 'Content Image Style', 'enteraddons-pro' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'img_icon_width',
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
                    'size' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-td-content img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'img_icon_height',
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
                    '{{WRAPPER}} .ea-ct-td-content img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        ); 
        $this->add_responsive_control(
            'img_icon_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-td-content img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'img_icon_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-td-content img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'img_icon_wrapper_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-ct-td-content img',
            ]
        );
        $this->add_responsive_control(
            'img_icon_wrapper_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-td-content img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // ---------------------------------------- Comparison Table Button Style ------------------------------

        $this->start_controls_section(
            'comparison_table_button_style',
            [
                'label' => esc_html__( 'Button Style', 'enteraddons-pro' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'table_cell_button_title_typography',
                'selector' => '{{WRAPPER}} .ea-ct-table-wrapper table a.ct-btn-custom-reverse',
            ]
        );
        $this->add_responsive_control(
            'table_cell_button_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-table-wrapper table a.ct-btn-custom-reverse' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'table_cell_button_margin',
            [
                'label' => esc_html__( 'Margin', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-table-wrapper table a.ct-btn-custom-reverse' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'table_cell_button_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-ct-table-wrapper table a.ct-btn-custom-reverse',
            ]
        );
        $this->add_responsive_control(
            'table_cell_button_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 4,
                ],
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-table-wrapper table a.ct-btn-custom-reverse' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'table_cell_button_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->start_controls_tabs(
            'table_cell_button_tabs',
        );
        $this->start_controls_tab(
            'table_cell_button_normal',
            [
                'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'table_cell_button_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-table-wrapper table a.ct-btn-custom-reverse' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'table_cell_button_bg',
            [
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-table-wrapper table a.ct-btn-custom-reverse' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'table_cell_button_tab_hover',
            [
                'label' => esc_html__( 'Hover', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'table_cell_button_hover_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-table-wrapper table a.ct-btn-custom-reverse:hover' => 'color: {{VALUE}}',
                ],
            ]
        );	
        $this->add_control(
            'table_cell_button_hover_bg',
            [
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-ct-table-wrapper table a.ct-btn-custom-reverse:hover' => 'background: {{VALUE}}',
                ],
            ]
        );	
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

	}

	protected function render() {

        // get settings
        $settings = $this->get_settings_for_display();

        // Tema template render
        $obj = new Comparison_Table_Template();
        $obj::setDisplaySettings( $settings );
        $obj->renderTemplate();

    }
    
    public function get_style_depends() {
        return [ 'enteraddons-global-style'];
    }
}
