<?php
namespace EnteraddonsPro\Widgets\Source_Code;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Modules\DynamicTags\Module as TagsModule;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 *
 *
 * @since 1.0
 */

class Source_Code extends Widget_Base {

	public function get_name() {
		return 'enteraddons-source-code';
	}

	public function get_title() {
		return esc_html__( 'Source Code', 'enteraddons-pro' );
	}

	public function get_icon() {
		return 'entera entera-source-code';
	}

	public function get_categories() {
		return ['enteraddons-pro-elements-category'];
	}

	protected function register_controls() {

        // ---------------------------------------- Source Code content ------------------------------
        $this->start_controls_section(
            'enteraddons_source_code_content',
            [
                'label' => esc_html__( 'Content Settings', 'enteraddons-pro' ),
            ]
        );

        $this->add_control(
            'language',
            [
                'label' => esc_html__( 'Language', 'enteraddons-pro' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => false,
                'options' => $this->languages(),
                'default' => 'javascript',
            ]
        );

        $this->add_control(
            'code',
            [
                'label' => esc_html__( 'Code', 'enteraddons-pro' ),
                'type' => Controls_Manager::CODE,
                'default' => 'console.log( \'Code is Poetry\' );',
                'dynamic' => [
                    'active' => true,
                    'categories' => [
                        TagsModule::TEXT_CATEGORY,
                    ],
                ],
            ]
        );

        $this->add_control(
            'line_numbers',
            [
                'label' => esc_html__( 'Line Numbers', 'enteraddons-pro' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'line-numbers',
                'default' => 'line-numbers',
            ]
        );

        $this->add_control(
            'copy_to_clipboard',
            [
                'label' => esc_html__( 'Copy to Clipboard', 'enteraddons-pro' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'On', 'enteraddons-pro' ),
                'label_off' => esc_html__( 'Off', 'enteraddons-pro' ),
                'return_value' => 'copy-to-clipboard',
                'default' => 'copy-to-clipboard',
            ]
        );

        $this->add_control(
            'highlight_lines',
            [
                'label' => esc_html__( 'Highlight Lines', 'enteraddons-pro' ),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'placeholder' => '1, 3-6',
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'word_wrap',
            [
                'label' => esc_html__( 'Word Wrap', 'enteraddons-pro' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'On', 'enteraddons-pro' ),
                'label_off' => esc_html__( 'Off', 'enteraddons-pro' ),
                'return_value' => 'word-wrap',
                'default' => '',
            ]
        );

        $this->add_control(
            'theme',
            [
                'label' => esc_html__( 'Theme', 'enteraddons-pro' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default'  => 'Solid',
                    'dark' => 'Dark',
                    'okaidia' => 'Okaidia',
                    'solarizedlight' => 'Solarizedlight',
                    'tomorrow' => 'Tomorrow',
                    'twilight' => 'Twilight',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'height',
            [
                'label' => esc_html__( 'Height', 'enteraddons-pro' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'vh', 'em' ],
                'range' => [
                    'px' => [
                        'min' => 115,
                        'max' => 1000,
                    ],
                    'em' => [
                        'min' => 6,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .highlight-height' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'font_size',
            [
                'label' => esc_html__( 'Font Size', 'enteraddons-pro' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem', 'vw' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 200,
                    ],
                    'vw' => [
                        'min' => 0.1,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                ],
                'responsive' => true,
                'selectors' => [
                    '{{WRAPPER}} pre, {{WRAPPER}} code, {{WRAPPER}} .line-numbers .line-numbers-rows' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section(); // End content
        
	}

	protected function render() {
        // get settings
        $settings = $this->get_settings_for_display();
        $obj = new Source_Code_Template();
        $obj::setDisplaySettings( $settings );
        $obj::setObj( $this );
        $obj->renderTemplate();
    }

    public function get_script_depends() {
        return [ 'enteraddons-pro-main','prism'];
    }

    public function get_style_depends() {
        return [ 'enteraddons-global-style' ];
    }

    protected function languages() {
        return [
            'markup' => 'Markup',
            'html' => 'HTML',
            'css' => 'CSS',
            'sass' => 'Sass (Sass)',
            'scss' => 'Sass (Scss)',
            'less' => 'Less',
            'javascript' => 'JavaScript',
            'typescript' => 'TypeScript',
            'jsx' => 'React JSX',
            'tsx' => 'React TSX',
            'php' => 'PHP',
            'ruby' => 'Ruby',
            'json' => 'JSON + Web App Manifest',
            'http' => 'HTTP',
            'xml' => 'XML',
            'svg' => 'SVG',
            'rust' => 'Rust',
            'csharp' => 'C#',
            'dart' => 'Dart',
            'git' => 'Git',
            'java' => 'Java',
            'sql' => 'SQL',
            'go' => 'Go',
            'kotlin' => 'Kotlin + Kotlin Script',
            'julia' => 'Julia',
            'python' => 'Python',
            'swift' => 'Swift',
            'bash' => 'Bash + Shell',
            'scala' => 'Scala',
            'haskell' => 'Haskell',
            'perl' => 'Perl',
            'objectivec' => 'Objective-C',
            'visual-basic,' => 'Visual Basic + VBA',
            'r' => 'R',
            'c' => 'C',
            'cpp' => 'C++',
            'aspnet' => 'ASP.NET (C#)',
        ];
    }

}
