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

class Helper {

    public static function header_templates() {

        $args = [
            'post_type'        => 'ea_builder_template',
            'posts_per_page'   => '-1',
            'meta_query'    => array(
                'relation'  => 'AND',
                array(
                    'key'    => '_ea_hf_type',
                    'value' => 'header',
                    'compare'    => '=',
                ),
                array(
                    'key'    => '_ea_use_on_header',
                    'value' => 'global',
                    'compare'    => '!=',
                )
            ),
        ];
        
        $posts = get_posts($args);

        $list = [ '' => esc_html__('Select a Header','enteraddons-pro') ];
        if( !empty( $posts ) ) {
            foreach( $posts as $post ) {
                $list[ $post->ID ] = $post->post_title;
            }
        }

        return $list;
    }

    public static function footer_templates() {
        
        $args = [
            'post_type'        => 'ea_builder_template',
            'posts_per_page'   => '-1',
            'meta_query'    => array(
                'relation'  => 'AND',
                array(
                    'key'    => '_ea_hf_type',
                    'value' => 'footer',
                    'compare'    => '=',
                ),
                array(
                    'key'    => '_ea_use_on_header',
                    'value' => 'global',
                    'compare'    => '!=',
                )
            ),
        ];

        $posts = get_posts($args);

        $list = [ '' => esc_html__('Select a Footer','enteraddons-pro') ];
        if( !empty( $posts ) ) {

            foreach( $posts as $post ) {
                $list[ $post->ID ] = $post->post_title;
 
            }

        }

        return $list;
    }

    public static function get_wc_cat() {

        if( !\Enteraddons\Classes\Helper::is_woo_activated() ) {
            return;
        }
        
        $pc = get_terms( 'product_cat', [ 'hide_empty' => true ] );
        
        $getCat = [];
        if( !empty( $pc ) ) {
            foreach( $pc as $val ) {
                $getCat[$val->term_id] = $val->name;
            }
        }
        return $getCat;
    }

    /**
     *
     * Get plugin data
     *
     * @return array
     *
     */
    public static function enteraddons_get_plugin_data() {
        $elementorFile = WP_PLUGIN_DIR.'/enteraddons-pro/enteraddons-pro.php';
        $data = get_plugin_data( $elementorFile );
        return $data;
    }

    /**
     * Helper Functions
     *
     * Get Enteraddons latest version
     *
     * @return string
     *
     */
    public static function enteraddons_get_plugin_latest_version() {
        $obj = new \Enteraddons\Admin\Admin_API();
        $content = $obj->get_data( 'changelog-data/?versionstype=42' );
        return !empty( $content[0]['log_version'] ) ? $content[0]['log_version'] : '';
    }

    /**
     * [updatedSuccessNotice description]
     * @return [type] [description]
     */
    public static function updatedSuccessNotice() {
        self::noticeHtml( 'success', esc_html__( 'Updated successful.', 'enteraddons-pro' ) );
    }
    /**
     * [updatedErrorNotice description]
     * @return [type] [description]
     */
    public static function updatedErrorNotice() {
        self::noticeHtml( 'error', esc_html__( 'Update failed.', 'enteraddons-pro' ) );
    }
    /**
     * [addSuccessNotice description]
     */
    public static function addSuccessNotice() {
        self::noticeHtml( 'success', esc_html__( 'Successful added.', 'enteraddons-pro' ) );
    }
    /**
     * [addErrorNotice description]
     */
    public static function addErrorNotice() {
        self::noticeHtml( 'error', esc_html__( 'Not added, Please try again.', 'enteraddons-pro' ) );
    }
    /**
     * [noticeHtml description]
     * @param  [type] $type [description]
     * @param  [type] $text [description]
     * @return [type]       [description]
     */
    private static function noticeHtml( $type, $text ) {
        echo '<div id="message" class="updated notice notice-'.esc_attr( $type ).' is-dismissible"><p>'.esc_html($text).'</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">'.esc_html__( 'Dismiss this notice.', 'enteraddons-pro' ).'</span></button></div>';
    }

    public static function continue() {
        $licenseKey   = get_option('enteraddons_plugin_lic_Key');
        $licenseEmail = get_option('enteraddons_plugin_lic_email');
        $responseObj = null;
        $error = '';
        $t = base64_decode('XEVudGVyYWRkb25zQmFzZTo6Q2hlY2tXUFBsdWdpbg==');
        return $t( sanitize_text_field( $licenseKey ), sanitize_email( $licenseEmail ), $error, $responseObj, ENTERADDONSPRO_FILE  );
    }

    public static function taskflag() {

        return [
            [
                'condition' => '',
                'name' => '\EnteraddonsPro\Classes\Editor_Widgets_Assets'
            ],
            [
                'condition' => 'header_footer_snippets',
                'name' => '\EnteraddonsPro\Modules\Header_Footer_Snippets'
            ],
            [
                'condition' => '',
                'name' => '\EnteraddonsPro\Modules\Webp_Upload_Support'
            ],
            [
                'condition' => 'accessibilities',
                'name' => '\EnteraddonsPro\Modules\Accessibilities'
            ],
            [
                'condition' => 'speedup',
                'name' => '\EnteraddonsPro\Modules\Speedup'
            ],
            [
                'condition' => 'image_compressor',
                'name' => '\EnteraddonsPro\Modules\Image_Compress'
            ],
            [
                'condition' => 'webp_converter',
                'name' => '\EnteraddonsPro\Modules\Convert_Webp'
            ],
            [
                'condition' => 'url_shortener',
                'name' => '\EnteraddonsPro\Modules\Url_Shortener'
            ],
            [
                'condition' => 'maintenance_mode',
                'name' => '\EnteraddonsPro\Modules\Maintenance_Mode'
            ],
            [
                'condition' => '',
                'name' => '\EnteraddonsPro\Inc\Cross_CP'
            ]
        ];

    }

}