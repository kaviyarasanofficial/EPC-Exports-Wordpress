<?php
namespace EnteraddonsPro\Inc;

/**
 * Enteraddons
 *
 * @package     Enteraddons Pro
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */


if( !defined( 'WPINC' ) ) {
    die;
}

use Elementor\Controls_Stack;
use Elementor\Plugin;
use Elementor\Utils;


class Cross_CP {

	public function __construct() {
		add_action( 'wp_ajax_ea_ccp_content', array( $this, 'ccp_content' ) );
	}

	public function ccp_content() {
		
		check_ajax_referer( 'ea_ccp_content_nonce', 'nonce' );

		if ( ! current_user_can( 'edit_posts' ) ) {
			wp_send_json_error( esc_html__( 'Not a Valid User', 'enteraddons-pro' ),403 );
		}

		$copiedData = isset( $_POST['cross_copy_data'] ) ? wp_unslash( $_POST['cross_copy_data'] ) : '';

		if ( empty( $copiedData ) ) {
			wp_send_json_error( esc_html__( 'No Content Found', 'enteraddons-pro' ) );
		}

		$copiedData = array( json_decode( $copiedData, true ) );
		
		$copiedData = $this->replace_elements_ids( $copiedData );
		$copiedData = $this->create_copy_content( $copiedData );

		wp_send_json_success( $copiedData );

	}

	protected function replace_elements_ids( $copiedData ) {

		return Plugin::instance()->db->iterate_data( $copiedData, function ( $element ) {
				$element['id'] = Utils::generate_random_string();
				return $element;
			}
		);

	}

	protected function create_copy_content( $copiedData ) {

		return Plugin::instance()->db->iterate_data( $copiedData, function ( $element_data ) {
				$elements = Plugin::instance()->elements_manager->create_element_instance( $element_data );

				if ( ! $elements ) {
					return null;
				}

				return $this->process_media( $elements );
			}
		);

	}

	protected function process_media( Controls_Stack $element, $method = 'on_import' ) {

		$getElement = $element->get_data();

		if ( method_exists( $element, $method ) ) {
			$getElement = $element->{$method}( $getElement );
		}

		foreach ( $element->get_controls() as $get_control ) {

			$control_type = Plugin::instance()->controls_manager->get_control( $get_control['type'] );
			$control_name = $get_control['name'];

			if ( ! $control_type ) {
				return $getElement;
			}

			if ( method_exists( $control_type, $method ) ) {
				$getElement['settings'][ $control_name ] = $control_type->{$method}( $element->get_settings( $control_name ), $get_control );
			}
		}

		return $getElement;

	}

}
