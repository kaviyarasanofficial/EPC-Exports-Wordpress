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


class Hooks {
    
    public static function hooks() {
        $obj = new Hooks_Callback();
        $is_active = get_option(ENTERADDONS_OPTION_KEY);
        
        add_filter( 'ea_admin_scripts_hooks', [ $obj, 'admin_scripts_hooks' ], 10, 2 );
        add_action( 'ea_admin_scripts_after', [ $obj, 'add_admin_scripts' ] );
        add_action( 'ea_general_tab_content_before', [ $obj, 'general_tab_content_before' ] );
        if( \EnteraddonsPro\Inc\Helper::continue() ) {
            add_filter( 'enteraddons_is_pro', [ $obj, 'is_pro' ], 10, 1  );
            //
            $activeExt = !empty( $is_active['extensions'] ) ? $is_active['extensions'] : [];
            if( in_array( 'header-footer' , $activeExt ) ) {
                //
                add_action( 'elementor/element/wp-page/document_settings/after_section_end', [ $obj, 'addElementorPageSettingsControls' ], 10, 1 );
                //
                add_filter( 'ea_hf_header_template_id', [ $obj, 'hf_header_template_id' ], 10, 1 );
                add_filter( 'ea_hf_footer_template_id', [ $obj, 'hf_footer_template_id' ], 10, 1  );
            }
            add_action( 'elementor/elements/categories_registered', [ $obj, 'registered_category'] );
            add_filter( 'woocommerce_add_to_cart_fragments', [ $obj, 'wc_add_to_cart_fragment' ] );
            add_filter( 'ea_pro_widgets_list', [ $obj, 'widgets_list' ], 10, 1  );
            add_filter( 'ea_pro_extensions_list', [ $obj, 'extensions_list' ], 10, 1  );
            add_filter( 'ea_css_assets_path_inject', [ $obj, 'widgets_assets_path_inject' ], 10, 2  );
            add_action( 'elementor/editor/after_enqueue_scripts', array( $obj, 'editor_scripts' ), 1 );
            add_action( 'elementor/frontend/after_register_scripts', array( $obj, 'enqueue_scripts' ), 1 );
            add_action( 'ea_admin_pro_license_before', [$obj, 'plugin_update_notice'] );
            add_action( 'admin_init', [$obj, 'modules_register_setting'] );
            add_action( 'ea_admin_support_tab_after_content', [$obj, 'support_tab_after_content'] );
            
        }
        //
        add_action( 'wp_ajax_eap_license_activation_action',  [$obj , 'eap_license_activation'] );
        add_action( 'wp_ajax_eap_license_deactivate_action',  [$obj , 'eap_license_deactivate'] );
    }
}
