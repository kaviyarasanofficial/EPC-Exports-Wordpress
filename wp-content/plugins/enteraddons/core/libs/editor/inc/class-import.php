<?php
namespace Enteraddons\Editor;
/**
 * Enteraddons admin class
 *
 * @package     Enteraddons
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */
use Elementor\Core\Common\Modules\Ajax\Module as Ajax;

class Import {

	private $source;
	private static $purchaseKey;

	function __construct() {
		$this->source = ENTERADDONS_API_SOURCE;
		self::$purchaseKey = get_option('enteraddons_plugin_lic_Key');
		add_action('elementor/ajax/register_actions', array(
                $this,
                'register_ajax_actions'
            ) , 20);
	}

	private static function get_licence() {
		return [
			'license_key' 		=> get_option('enteraddons_plugin_lic_Key'),
			'package_type'		=> \Enteraddons\Classes\Helper::versionType()
		];
	}

	public static function get_remote_url( $endpoint ) {
		//init api object
		$api = new \Enteraddons\Classes\API();
		return $api->get_api_url( $endpoint );
	}

	public static function get_template_content( $epId ) {

		$actions 	    = isset( $_REQUEST['actions'] ) ? sanitize_text_field( $_REQUEST['actions'] ) : "";
		$getActionData  = json_decode( stripcslashes( $actions ), true );
		$getActionData  = reset( $getActionData );
		$template_id 	= !empty( $getActionData['data']['template_id'] ) ? $getActionData['data']['template_id'] : '';
		$remoteUrl = self::get_remote_url( 'template-data' );
		// Send remote request
		$response = wp_remote_post( $remoteUrl, [
			'method' => 'POST',
			'timeout' => 120,
			'headers' => [
				'Authorization' => 'Basic TL20ENTERADDONS21',
			],
			'body' => [
				'template_id' 	=> $template_id,
				'license_key' 	=> self::$purchaseKey,
				'package_type'	=> \Enteraddons\Classes\Helper::versionType()

			]
		] );

		if ( is_wp_error( $response ) ) {
			return $response;
		}

		$response_code = (int) wp_remote_retrieve_response_code( $response );

		if ( 200 !== $response_code ) {
			return new \WP_Error( 'response_code_error',  sprintf( esc_html__( 'The request returned with a status code of %s', 'enteraddons' ), $response_code ) );
		}

		$template_content = json_decode( wp_remote_retrieve_body( $response ), true );

		if ( isset( $template_content['error'] ) ) {
			return new \WP_Error( 'response_error', $template_content['error'] );
		}

		if ( empty( $template_content['data'] ) && empty( $template_content['content'] ) ) {
			return new \WP_Error( 'template_data_error', esc_html__( 'An invalid data was returned', 'enteraddons' ) );
		}

		$ls = new Library_Source();

		return $ls->get_data( [$template_content, $epId ]);

	}
	
	public function register_ajax_actions( $ajax ) {

		if ( ! current_user_can( 'edit_posts' ) ) {
			throw new \Exception( 'Access Denied' );
		}

		if ( !isset( $_REQUEST['actions'] ) ) {
            return;
        }

        $getActionData = json_decode( stripcslashes( $_REQUEST['actions'] ), true );

        $getActionData  = reset( $getActionData );

		if( !empty( $getActionData['data']['source'] ) && $this->source != $getActionData['data']['source'] ) {
        	return;
        } 

        if( 'get_template_data' != $getActionData['action'] ) {
        	return;
        }

 		$ajax->register_ajax_action('get_template_data', function ( $data ) {

 			if( !empty( $data['editor_post_id'] ) ) {

 				$epId = absint( $data['editor_post_id'] );

 				if( !empty( get_post( $epId ) ) ) {
 					\Elementor\Plugin::instance()->db->switch_to_post( $epId );
 				} else {
 					throw new \Exception( esc_html__( 'Post not found.', 'enteraddons' ) );
 				}

 			}
 			//
 			if ( empty( $data['template_id'] ) ) {
				throw new \Exception( esc_html__( 'Template id missing', 'enteraddons' ) );
			}

            return $this->get_template_content( $epId );
        });

    }

}




/*class Library_Source extends Source_Base {

	public function get_id() {
		return 'enteraddons-template-library-manager';
	}

	public function get_title() {
		return esc_html__( 'EnterAddons Template Library Manager', 'enteraddons' );
	}

	public function register_data() {}

	public function save_item( $template_data ) {
		return new \WP_Error( 'invalid_request', 'Cannot save template to a EnterAddons Library manager' );
	}

	public function update_item( $new_data ) {
		return new \WP_Error( 'invalid_request', 'Cannot update template to a EnterAddons Library manager' );
	}

	public function delete_template( $template_id ) {
		return new \WP_Error( 'invalid_request', 'Cannot delete template from a EnterAddons Library manager' );
	}

	public function export_template( $template_id ) {
		return new \WP_Error( 'invalid_request', 'Cannot export template from a EnterAddons Library manager' );
	}

	public function get_items( $args = array() ) {
		return array();
	}

	public function get_item( $template_id ) {
		$templates = $this->get_items();

		return $templates[ $template_id ];
	}

	public function get_data( $getdata, $context = 'display' ) {
		
		if( empty( $getdata[0] ) || empty( $getdata[0]['content'] ) ) {
			throw new \Exception( __( 'Template does not have any content', 'enteraddons' ) );
		}

		$data = $getdata[0];

		$data['content'] = $this->replace_elements_ids( $data['content'] );
		$data['content'] = $this->process_export_import_content( $data['content'], 'on_import' );

		$post_id  = $getdata[1];
		$document = \Elementor\Plugin::instance()->documents->get( $post_id );

		if ( $document ) {
			$data['content'] = $document->get_elements_raw_data( $data['content'], true );
		}

		return $data;
	}
}*/