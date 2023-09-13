<?php
namespace EnteraddonsPro\Widgets\Advanced_Data_Table;

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
 * Enteraddons elementor Advanced Data Table widget.
 *
 * @since 1.0
 */

class Advanced_Data_Table extends Widget_Base {
    
	public function get_name() {
		return 'enteraddons-advanced-data-table';
	}

	public function get_title() {
		return esc_html__( 'Advanced Data Table', 'enteraddons-pro' );
	}

	public function get_icon() {
		return 'entera entera-advance-data-table';
	}

	public function get_categories() {
		return ['enteraddons-pro-elements-category'];
	}

	protected function register_controls() {

        // ---------------------------------------- Advanced Data Table ------------------------------

        $this->start_controls_section(
            'enteraddons_data_table_content',
            [
                'label' => esc_html__( 'Advanced Data Table', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'advanced_table_style',
            [
                'label' => esc_html__( 'Table Type', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => esc_html__( 'Custom', 'enteraddons-pro'),
                    '2' => esc_html__( 'Google Sheet', 'enteraddons-pro'),
                    '3' => esc_html__( 'Import Data', 'enteraddons-pro'),
                    
                ],
            ]
        );

        //Custom Type
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'dp_heading_text', 
            [
                'label' => esc_html__( 'Title', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Enteraddons' , 'enteraddons-pro' ),
                'label_block' => true,
            ]
        );  
        $this->add_control(
            'heading_content_repetable',
            [
                'label' => esc_html__( 'Heading Title', 'enteraddons-pro' ),
                'condition' => ['advanced_table_style' => '1'],
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [ 'dp_heading_text' => esc_html__( 'Domain', 'enteraddons-pro' ) ],
                    [ 'dp_heading_text' => esc_html__( '1 Year', 'enteraddons-pro' ) ],
                    [ 'dp_heading_text' => esc_html__( '2 Year', 'enteraddons-pro' ) ],
                    [ 'dp_heading_text' => esc_html__( '3 Year', 'enteraddons-pro' ) ],
                    [ 'dp_heading_text' => esc_html__( '4 Year', 'enteraddons-pro' ) ],
                    [ 'dp_heading_text' => esc_html__( '5 Year', 'enteraddons-pro' ) ]   
                ],
                'title_field' => '{{{ dp_heading_text }}}',
            ]
        );

        //Google Sheet 

        $this->add_control(
            'google_sheet_id', 
            [
                'label' => esc_html__( 'Google Sheet ID', 'enteraddons-pro' ),
                'condition' => ['advanced_table_style' => '2'],
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'google_api_key', 
            [
                'label' => esc_html__( 'Google API Key', 'enteraddons-pro' ),
                'condition' => ['advanced_table_style' => '2'],
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'description' => sprintf( esc_html__( '%s Get google API Key %s', 'enteraddons-pro' ), '<a target="_blank" href="https://console.cloud.google.com/apis/dashboard">', '</a>' )
            ]
        );
        $this->add_control(
            'google_sheet_range', 
            [
                'label' => esc_html__( 'Google Sheet Range', 'enteraddons-pro' ),
                'condition' => ['advanced_table_style' => '2'],
                'type' => \Elementor\Controls_Manager::TEXT,
                'description' => esc_html__( 'Set Google Sheet Range like: Sheet1!A1:f31' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'ea_remove_cash',
            [
                'label' => esc_html__( 'Reset Google Sheet ', 'enteraddons-pro' ),
                'condition' => ['advanced_table_style' => '2'],
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'enteraddons-pro' ),
                'label_off' => esc_html__( 'No', 'enteraddons-pro' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        
        //CSV  Data Formate
        $this->add_control(
			'import_table_data',
			[
				'label' => esc_html__( 'Add Table Data', 'enteraddons-pro' ),
                'condition' => ['advanced_table_style' => '3'],
                'description' => esc_html__( 'Paste Data CSV formate. First Row will be Header ', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
			]
		);
        $this->end_controls_section();
        
        // ---------------------------------------- Advanced Data Table content ------------------------------

        $this->start_controls_section(
            'table_body_content',
            [
                'label'	=> esc_html__('Table Content','enteraddons-pro'),
                'condition' => ['advanced_table_style' => '1'],
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
            'content_title', [
                'label' => esc_html__( 'Content Title', 'enteraddons-pro' ),
                'condition'	=>[

                    'tbody_condition'	=> 'col',
                ],
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Enteraddons' , 'enteraddons-pro' ),
                'label_block' => true,
                
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
                        'content_title'=>esc_html__('Content 1','enteraddons-pro'),
                    ],
                    [
                        'tbody_condition'=>'col',
                        'content_title'=>esc_html__('Content 2','enteraddons-pro'),
                    ],
                    [
                        'tbody_condition'=>'col',
                        'content_title'=>esc_html__('Content 3','enteraddons-pro'),
                    ],
                    [
                        'tbody_condition'=>'col',
                        'content_title'=>esc_html__('Content 4','enteraddons-pro'),
                    ],
                    [
                        'tbody_condition'=>'col',
                        'content_title'=>esc_html__('Content 5','enteraddons-pro'),
                    ],
                    [
                        'tbody_condition'=>'col',
                        'content_title'=>esc_html__('Content 6','enteraddons-pro'),
                    ],   
  
                ],
                'title_field' => '{{{ tbody_condition }}}',
            ]
        );
        $this->end_controls_section();

        // ---------------------------------------- Advanced Data Table Settings ------------------------------
        $this->start_controls_section(
            'enteraddons_advanced_data_table_settings',
            [
                'label' => esc_html__( 'Table Settings', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'show_pagination',
            [
                'label' => esc_html__( 'Enable Pagination', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'enteraddons-pro' ),
                'label_off' => esc_html__( 'No', 'enteraddons-pro' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_searchbar',
            [
                'label' => esc_html__( 'Enable Search', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'enteraddons-pro' ),
                'label_off' => esc_html__( 'No', 'enteraddons-pro' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'data_ordering',
            [
                'label' => esc_html__( 'Data Ordering', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'enteraddons-pro' ),
                'label_off' => esc_html__( 'No', 'enteraddons-pro' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'table_info',
            [
                'label' => esc_html__( 'Table Info Show', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'enteraddons-pro' ),
                'label_off' => esc_html__( 'No', 'enteraddons-pro' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'enable_export_button',
            [
                'label' => esc_html__( 'Enable Export Button', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__( 'Yes', 'enteraddons-pro'),
                    'ea-display' => esc_html__( 'No', 'enteraddons-pro'),
                    
                    
                ],
            ]
        );
        

        $this->end_controls_section(); // End Advanced Data Table Settings

        // ---------------------------------------- Advanced  Data Table Wrapper Style ------------------------------

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
                'label'      => esc_html__('Width', 'enteraddons-pro'),
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
                    '{{WRAPPER}} .ea-adt-data-table-wrapper' => 'max-width: {{SIZE}}{{UNIT}} !important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'table_border',
                    'label' => esc_html__( 'Border', 'enteraddons-pro'),
                    'selector' => '{{WRAPPER}} .ea-adt-data-table-wrapper',
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
                    '{{WRAPPER}} .ea-adt-data-table-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
                    '{{WRAPPER}} .ea-adt-data-table-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'table_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-adt-data-table-wrapper',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'wrapper_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .ea-adt-data-table-wrapper',
            ]
        );
        $this->end_controls_section();

        // ---------------------------------------- Advanced Data Table Heading Style ------------------------------

        $this->start_controls_section(
            'table_heading_style',
            [
                'label' => esc_html__( 'Heading Style', 'enteraddons-pro'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                 'name' => 'data_table_header_title_typography',
                'selector' => '{{WRAPPER}} table.dataTable thead th',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Text_Stroke::get_type(),
            [
                'name' => 'data_table_header_title_text_stroke',
                'selector' => '{{WRAPPER}} table.dataTable thead th',
            ]
        );
        $this->add_responsive_control(
            'data_table_each_header_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} table.dataTable thead th' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}}  table.dataTable thead th' => 'text-align: {{VALUE}}',
                ]
                
            ]
        );
        $this->start_controls_tabs('data_table_header_title_adt');

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
                    '{{WRAPPER}} table.dataTable thead th' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} table.dataTable thead th' => 'background-color: {{VALUE}};'
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
                    '{{WRAPPER}} table.dataTable thead th:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'data_table_header_title_hover_cell_bg_color',
            [
                'label' => esc_html__( 'Cell Background Color', 'enteraddons-pro'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} table.dataTable thead th:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // ---------------------------------------- Advanced  Data Table Content Style ------------------------------

        $this->start_controls_section(
            'section_data_table_content_style_settings',
            [
                'label' => esc_html__( 'Table Content Style', 'enteraddons-pro'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                 'name' => 'ea_data_table_content_typography',
                'selector' => '{{WRAPPER}} table.dataTable tbody td',
            ]
        );
        $this->add_responsive_control(
            'ea_data_table_each_cell_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em' ],
                'selectors' => [
                         '{{WRAPPER}} table.dataTable tbody td' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                 ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'ea_data_table_cell_border',
                    'label' => esc_html__( 'Border', 'enteraddons-pro'),
                    'selector' => '{{WRAPPER}} table.dataTable tbody tr td,{{WRAPPER}} table thead:first-child tr:first-child th, {{WRAPPER}} table.dataTable thead th'
                ]
        );
        $this->add_responsive_control(
            'ea_data_table_content_alignment',
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
                    '{{WRAPPER}} table.dataTable tbody td' => 'text-align: {{VALUE}}',
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
            'content_even_row_text_color',
            [
                'label' => esc_html__( 'Even Row Text Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} table.dataTable tbody tr.even td' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'even_background',
            [
                'label' => esc_html__( 'Even Row Background', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} table.dataTable tbody tr.even' => 'background: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'content_odd_row_text_color',
            [
                'label' => esc_html__( 'Odd Row Text Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} table.dataTable tbody tr.odd td' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'odd_background',
            [
                'label' => esc_html__( 'Odd Row Background', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} table.dataTable tbody tr.odd' => 'background: {{VALUE}} !important',
                ],
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
            'even_row_text_hover_color',
            [
                'label' => esc_html__( 'Even Row Hover Text Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} table.dataTable tbody tr:hover.even td' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'even_row_bg_hover_color',
            [
                'label' => esc_html__( 'Even Row Hover Background', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} table.dataTable tbody tr:hover.even' => 'background: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'odd_row_text_hover_color',
            [
                'label' => esc_html__( 'Odd Row Hover Text Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} table.dataTable tbody tr:hover.odd td' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'odd_row_bg_hover_color',
            [
                'label' => esc_html__( 'Odd Row Hover Background', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} table.dataTable tbody tr:hover.odd' => 'background: {{VALUE}} !important',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Table Export Button Style ------------------------------
         *
         */
        $this->start_controls_section(
            'enteraddons_table_export_button_settings', [
                'label' => esc_html__( 'Export Button Style', 'enteraddons-pro' ),
                'condition' => ['enable_export_button' => ''],
                'tab' => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->start_controls_tabs( 'tab_export_button' );

        //  Controls tab For Normal
        $this->start_controls_tab(
            'export_button_normal',
            [
                'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
            ]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .ea-adt-btn',
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
					'{{WRAPPER}} .ea-adt-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .ea-adt-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'      => 'button_border',
				'label'     => esc_html__( 'Border', 'enteraddons-pro' ),
				'selector'  => '{{WRAPPER}} .ea-adt-btn',
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
					'{{WRAPPER}} .ea-adt-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_shadow',
				'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
				'selector' => '{{WRAPPER}} .ea-adt-btn',
			]
		); 

		$this->add_control(
			'button_text_color',
			[
				'label' => esc_html__( 'Color', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ea-adt-btn' => 'color: {{VALUE}} !important',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_background',
				'label' => esc_html__( 'Background', 'enteraddons-pro' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ea-adt-btn',
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
                'selector'  => '{{WRAPPER}} .ea-adt-btn:hover',
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
                    '{{WRAPPER}} .ea-adt-btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_hover_shadow',
                'label' => esc_html__( 'Box Shadow', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .ea-adt-btn:hover',
            ]
        ); 
        $this->add_control(
            'button_hover_text_color',
            [
                'label' => esc_html__( 'Hover Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ea-adt-btn:hover' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'button_hover_background',
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .ea-adt-btn:hover',
            ]
        );
        $this->end_controls_tab(); // End Controls tab
        $this->end_controls_tabs(); //  end controls tabs section
        $this->end_controls_section();

         // ---------------------------------------- Advanced  Data Table Option Style ------------------------------

         $this->start_controls_section(
            'section_data_table_option_style_settings',
            [
                'label' => esc_html__( 'Options Style', 'enteraddons-pro'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_control(
			'search_options',
			[
				'label' => esc_html__( 'Search', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]  
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'table_search_label_title_typography',
                'selector' => '{{WRAPPER}} .dataTables_filter label,{{WRAPPER}} .dataTables_wrapper .dataTables_filter input',
            ]
        );
        $this->add_control(
            'table_search_input_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .dataTables_wrapper .dataTables_filter input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'table_search_input_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .dataTables_wrapper .dataTables_filter input',
                
            ]
        );
        $this->add_responsive_control(
            'table_search_input_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .dataTables_wrapper .dataTables_filter input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ],
            ]
        );
        $this->add_control(
            'table_search_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dataTables_filter label, {{WRAPPER}} .dataTables_wrapper .dataTables_filter input' => 'color: {{VALUE}}',
                ],
            ]
        );	
        $this->add_control(
            'table_search_input_bg',
            [
                'label' => esc_html__( 'Input Background', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dataTables_wrapper .dataTables_filter input' => 'background: {{VALUE}}',
                ],
            ]
        );	
        $this->add_control(
			'pagination_options',
			[
				'label' => esc_html__( 'Pagination', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]  
		);
        $this->add_responsive_control(
            'top_space',
            [
                'label'      => esc_html__('Top Space', 'enteraddons-pro'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['%', 'px'],
                'range'      => [
                    '%'  => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 500,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .dataTables_paginate, {{WRAPPER}} .dataTables_info' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'between_space',
            [
                'label'      => esc_html__('Between Space', 'enteraddons-pro'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['%', 'px'],
                'range'      => [
                    '%'  => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .dataTables_wrapper .dataTables_paginate .paginate_button' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'table_search_pagination_typography',
                'selector' => '{{WRAPPER}} .dataTables_wrapper .dataTables_paginate .paginate_button',
            ]
        );
        $this->add_control(
            'table_pagination_padding',
            [
                'label' => esc_html__( 'Padding', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .dataTables_wrapper .dataTables_paginate .paginate_button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'table_pagination_border',
                'label' => esc_html__( 'Border', 'enteraddons-pro' ),
                'selector' => '{{WRAPPER}} .dataTables_wrapper .dataTables_paginate .paginate_button',
                
            ]
        );
        $this->add_responsive_control(
            'table_pagination_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'enteraddons-pro' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .dataTables_wrapper .dataTables_paginate .paginate_button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ],
            ]
        );
        $this->start_controls_tabs(
            'style_tabs_pagination'
        );
        $this->start_controls_tab(
            'style_pagination_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'table_pagination_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .dataTables_wrapper .dataTables_paginate .paginate_button' => 'color: {{VALUE}} !important',
                ],
            ]
        );	
        $this->add_control(
            'table_pagination_bg',
            [
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dataTables_wrapper .dataTables_paginate .paginate_button' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'style_pagination_active_tab',
            [
                'label' => esc_html__( 'Active', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'table_active_pagination_bg',
            [
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .paginate_button.current' => 'background: {{VALUE}} !important',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'style_pagination_disabled_tab',
            [
                'label' => esc_html__( 'Disabled', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'table_disabled_pagination_bg',
            [
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .paginate_button.disabled' => 'background: {{VALUE}} !important',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'style_hover_pagination_tab',
            [
                'label' => esc_html__( 'Hover', 'enteraddons-pro' ),
            ]
        );
        $this->add_control(
            'table_hover_pagination_color',
            [
                'label' => esc_html__( 'Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .dataTables_wrapper .dataTables_paginate .paginate_button:hover' => 'color: {{VALUE}} !important',
                ],
            ]
        );	
        $this->add_control(
            'table_hover_pagination_bg',
            [
                'label' => esc_html__( 'Background', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dataTables_wrapper .dataTables_paginate .paginate_button:hover' => 'background: {{VALUE}} !important',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_control(
			'entries_options',
			[
				'label' => esc_html__( 'Entries', 'enteraddons-pro' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]  
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'table_entries_typography',
                'selector' => '{{WRAPPER}} .dataTables_length label, {{WRAPPER}} .dataTables_length label select, .dataTables_info',
            ]
        );
        $this->add_control(
            'table_entries_color',
            [
                'label' => esc_html__( 'Show Entries Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dataTables_length label, {{WRAPPER}} .dataTables_length label select' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'table_counter_color',
            [
                'label' => esc_html__( 'Data Counter Color', 'enteraddons-pro' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dataTables_info' => 'color: {{VALUE}}',
                ],
            ]
        );	
        $this->end_controls_section();
	}

	protected function render() {

        // get settings
        $settings = $this->get_settings_for_display();
        
        //Template render
        $obj = new Advanced_Data_Table_Template();
        $obj::setDisplaySettings( $settings );
        $obj::setWidgetObject( $this );
        $obj->renderTemplate();

    }
    public function get_script_depends() {
        return ['enteraddons-pro-main','dataTables','table2excel'];
    }

    public function get_style_depends() {
        return ['enteraddons-global-style','dataTables'];
    }

}
