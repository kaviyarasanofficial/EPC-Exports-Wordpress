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

class Hooks_Callback {

    private $prmfun = 'continue';

    public function modules_register_setting() {
        register_setting(
            'enteraddons_modules_settings_option_group', // Option group
            'ea_modules_option' // Option name
        );  
    }

    //
    public function registered_category() {
        $test = $this->prmfun;

        if( !\EnteraddonsPro\Inc\Helper::$test() ) {
            return;
        }

        \Elementor\Plugin::instance()->elements_manager->add_category( 'enteraddons-pro-elements-category', [
            'title' => esc_html__( 'Enteraddons Pro', 'enteraddons-pro' ),
        ], 1 );
        
    }
	
    public function hf_header_template_id( $value ) {

        $obj = new \EnteraddonsPro\Modules\HF_Template_ID();
        $headerActiveStatus = $obj->getHeaderTemplateActiveStatus();

        //
        $tempId = '';
        if( !empty( $value ) && $headerActiveStatus != 'yes' ) {
            $tempId = $value;
        } else if( $headerActiveStatus == 'yes' ) {
            $tempId = $obj->getHeaderTemplateId();
        }

        return $tempId;
    }

    public function hf_footer_template_id( $value ) {
        $obj = new \EnteraddonsPro\Modules\HF_Template_ID();
        $footerActiveStatus = $obj->getFooterTemplateActiveStatus();
        //
        $tempId = '';
        if( !empty( $value ) && $footerActiveStatus != 'yes' ) {
            $tempId = $value;
        } else if( $footerActiveStatus == 'yes' ) {
            $tempId = $obj->getFooterTemplateId();
        }

        return $tempId;
    }

    public function addElementorPageSettingsControls( \Elementor\Core\DocumentTypes\Page $page ) {
        $test = $this->prmfun;
        if( !\EnteraddonsPro\Inc\Helper::$test() ) {
            return;
        }

        $page->start_controls_section(
            'ea_header_option',
            [
                'label'     => esc_html__( 'Header Option', 'enteraddons-pro' ),
                'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
            ]
        );

        $page->add_control(
            'ea_header_choice',
            [
                'label'         => esc_html__( 'Enable Header?', 'enteraddons-pro' ),
                'type'          => \Elementor\Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Yes', 'enteraddons-pro' ),
                'label_off'     => esc_html__( 'No', 'enteraddons-pro' ),
                'return_value'  => 'yes',
                'default'       => 'no',
            ]
        );
        
        $page->add_control(
            'ea_header_builder_option',
            [
                'label'     => esc_html__( 'Header Name', 'enteraddons-pro' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'options'   => \EnteraddonsPro\Inc\Helper::header_templates(),
                'condition' => [ 'ea_header_choice' => 'yes' ],
                'default'   => ''
            ]
        );

        $page->end_controls_section();

        $page->start_controls_section(
            'ea_footer_option',
            [
                'label'     => esc_html__( 'Footer Option', 'enteraddons-pro' ),
                'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
            ]
        );
        $page->add_control(
            'ea_footer_choice',
            [
                'label'         => esc_html__( 'Enable Footer?', 'enteraddons-pro' ),
                'type'          => \Elementor\Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Yes', 'enteraddons-pro' ),
                'label_off'     => esc_html__( 'No', 'enteraddons-pro' ),
                'return_value'  => 'yes',
                'default'       => 'no',
            ]
        );
        $page->add_control(
            'ea_footer_builder_option',
            [
                'label'     => esc_html__( 'Footer Name', 'enteraddons-pro' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'options'   => \EnteraddonsPro\Inc\Helper::footer_templates(),
                'condition' => [ 'ea_footer_choice' => 'yes' ],
                'default'   => ''
            ]
        );

        $page->end_controls_section();

    }
    
    public function is_pro( $val ) {
        return true;
    }

    public function editor_scripts() {

        wp_enqueue_script(
            'xdlocalstorage', 
            ENTERADDONSPRO_DIR_ASSETS_URL. 'js/xdLocalStorage.min.js', 
            array(), 
            ENTERADDONSPRO_DYNAMIC_VERSION,
            true
        );
        wp_enqueue_script(
            'enteraddonspro-editor-script', 
            ENTERADDONSPRO_DIR_ASSETS_URL. 'js/editor-pro.min.js', 
            array( 'elementor-editor' ), 
            ENTERADDONSPRO_DYNAMIC_VERSION,
            true
        );
        wp_localize_script(
            'enteraddonspro-editor-script',
            'ea_ccp',
            [
                'ajax_url' => admin_url( 'admin-ajax.php' ),
                'nonce'    => wp_create_nonce( 'ea_ccp_content_nonce' ),
                'cross_past_success_msg'  => esc_html__( 'Successfully Pasted', 'enteraddons-pro' )
                
            ]
        );

    }
    
    public function enqueue_scripts() {

        wp_register_style(
            'dataTables', 
            ENTERADDONSPRO_DIR_ASSETS_URL. 'vandor/dataTables/jquery.dataTables.min.css', 
            array(), 
            '1.0',
            false
        );

        wp_register_style(
            'imagehover', 
            ENTERADDONSPRO_DIR_ASSETS_URL. 'vandor/image-hover-effect/imagehover.min.css', 
            array(), 
            '1.0',
            false
        );
        wp_register_style(
            'pannellum', 
            ENTERADDONSPRO_DIR_ASSETS_URL. 'vandor/panolens/pannellum.css', 
            array(), 
            '1.0',
            false
        );
        
        //
        wp_register_script(
            'prism', 
            ENTERADDONSPRO_DIR_ASSETS_URL. 'vandor/prism/prism.js', 
            array( 'jquery' ), 
            '1.0',
            true
        );
        wp_register_script(
            'marquee', 
            ENTERADDONSPRO_DIR_ASSETS_URL. 'vandor/marquee/jquery.marquee.min.js', 
            array( 'jquery' ), 
            '1.0',
            true
        );
        wp_register_script(
            'perfect-scrollbar', 
            ENTERADDONSPRO_DIR_ASSETS_URL. 'vandor/perfect/perfect-scrollbar.js', 
            array( 'jquery' ), 
            '1.0',
            true
        );
        wp_register_script(
            'dataTables', 
            ENTERADDONSPRO_DIR_ASSETS_URL. 'vandor/dataTables/jquery.dataTables.min.js', 
            array( 'jquery' ), 
            '1.0',
            true
        );
        wp_register_script(
            'table2excel', 
            ENTERADDONSPRO_DIR_ASSETS_URL. 'vandor/dataTables/table2excel.min.js', 
            array( 'jquery' ), 
            '1.0',
            true
        );
        wp_register_script(
            'spritespin', 
            ENTERADDONSPRO_DIR_ASSETS_URL. 'vandor/spritespin/spritespin.min.js', 
            array( 'jquery' ), 
            '1.0',
            true
        );
        wp_register_script(
            'pannellum', 
            ENTERADDONSPRO_DIR_ASSETS_URL. 'vandor/panolens/pannellum.js', 
            array(), 
            '1.0',
            true
        );
        wp_register_script(
            'enteraddons-pro-main', 
            ENTERADDONSPRO_DIR_ASSETS_URL. 'js/enteraddons-pro.min.js', 
            array( 'jquery', 'enteraddons-main' ), 
            ENTERADDONSPRO_VERSION,
            true
        );
    }

    public function widgets_list( $widgets ) {
        return Widgets_Flag::getWidgets();
    }

    public function extensions_list( $extensions ) {
        return Extensions_Flag::getExtensions();
    }

    public function widgets_assets_path_inject( $path, $widgetName ) {

        $getWidgets = Widgets_Flag::getWidgets();
        $getWidgetsName = array_column( $getWidgets, 'name' );

        $proWidgets = array_map( function( $v ) {
            return str_replace( '_', '-', $v );
        }, $getWidgetsName );

        if( in_array( $widgetName, $proWidgets ) ) {

            $getFile = ENTERADDONSPRO_PLUGIN_MODE == 'DEV' ? "css/{$widgetName}.css" : "min-css/{$widgetName}.min.css";
            $path = ENTERADDONSPRO_DIR_PATH."assets/widgets-css/{$getFile}";
        }
        
        return $path;
    }

    public function wc_add_to_cart_fragment( $fragments ) {
        ob_start(); 
        echo '<span class="cart-count ea-mini-cart-count">'.esc_html( WC()->cart->get_cart_contents_count() ).'</span>';  
        $fragments['.ea-mini-cart-count'] = ob_get_clean();
        
        return $fragments;
    }

    /**
     * Admin Notices
     *
     * Pro plugin update notice
     *
     * Inform user about new version of plugin
     *
     */
    public function plugin_update_notice() {

        $plugin_data = \EnteraddonsPro\Inc\Helper::enteraddons_get_plugin_data();
        $latestVersion = \EnteraddonsPro\Inc\Helper::enteraddons_get_plugin_latest_version();
        if( $plugin_data['Version'] < $latestVersion ):
        ?>
        <div class="notice notice-warning notice-alt is-dismissible" style="width: 454px; margin: auto auto 30px;">
            <p style="font-weight: 600;">
            <?php echo sprintf( esc_html__( '%1$s New version %2$s is now available. You current version is %3$s. Please Download the new version and re-active.', 'enteraddons-pro' ), esc_html( $plugin_data['Name'] ), esc_html( $latestVersion ), esc_html( $plugin_data['Version'] ) ); ?>
            </p>
        </div>
        <?php
        endif;
    }

    /**
     * [admin_scripts_hooks description]
     * @param  [type] $hookStack [description]
     * @return [type]            [description]
     */
    public function admin_scripts_hooks( $hookStack, $hook ) {
            
        $newHookStack = [
            'enteraddons_page_header-footer-scripts',
            'admin_page_header-footer-add-snippet',
            'admin_page_header-footer-edit-snippet',
            'enteraddons_page_ea-accessibilities',
            'enteraddons_page_ea-image-compress',
            'enteraddons_page_ea-convert-webp',
            'enteraddons_page_ea-url-shortener',
            'enteraddons_page_ea-speedup',
            'enteraddons_page_ea-maintenance-mode',
            'admin_page_ea-add-short-url',
            'admin_page_ea-edit-short-url'
        ];

        return array_merge( $hookStack, $newHookStack );

    }

    public function add_admin_scripts() {
        wp_enqueue_style( 'modules-admin-common', plugin_dir_url(__FILE__). '../modules/assets/modules-admin-common.css', array(), ' 1.0.0', false );
        wp_enqueue_script( 'modules-admin-common', plugin_dir_url(__FILE__). '../modules/assets/modules-admin-common.js', array('jquery'), ' 1.0.0', true );

        wp_localize_script( 'modules-admin-common', 'eapAdminObject', [
            'nonce'   => wp_create_nonce( 'eap-admin-settings-nonce' ),
            'ajaxurl' => admin_url('admin-ajax.php')
        ] );
    }

    public function general_tab_content_before() {

        $purchaseKey   = get_option( "enteraddons_plugin_lic_Key");
        $class = !empty( $purchaseKey ) ? ' valid-activation': '';
        $savedPurchaseEmail   = get_option( "enteraddons_plugin_lic_email");
        $purchaseEmail   = !empty( $savedPurchaseEmail ) ? $savedPurchaseEmail : get_option( "enteraddons_lic_email", get_bloginfo( 'admin_email' ));

        do_action('ea_admin_pro_license_before');
        ?>
        <div class="active-theme-wrap">
            <div class="active-theme<?php echo esc_attr( $class ); ?>">
                <?php
                $demoKey = '';
                if( !empty( $purchaseKey ) ):
                    $k = explode('-', $purchaseKey);
                    $demoKey = 'XXXXXXXX-XXXXXXXX-XXXXXXXX-'.end($k);
                ?>
                <div class="overlay-content">
                    <div class="valid-card">
                        <p><?php esc_html_e( 'License Valid', 'enteraddons-pro' ); ?></p>
                    </div>
                    <span class="btn deactivate-plugin"><?php esc_html_e( 'Deactivate', 'enteraddons-pro' ); ?></span>
                </div>
                <?php
                endif;
                ?>
                <input type="text" class="theme-input-style" name="el_license_key" value="<?php echo esc_html( $demoKey ); ?>" placeholder="<?php esc_attr_e( 'Entre Your Purchase Code', 'enteraddons-pro' ); ?>">
                <input type="text" class="theme-input-style" name="el_license_email" value="<?php echo esc_html( $purchaseEmail ); ?>" placeholder="<?php esc_attr_e( 'Email', 'enteraddons-pro' ); ?>">
                <?php 
                //wp_nonce_field( 'el-license' ); 
                if( empty( $purchaseKey ) ):
                ?>
                <span class="btn active-plugin"><?php esc_html_e( 'Activate', 'enteraddons-pro' ); ?></span>
                <?php
                endif;
                ?>
            </div>
        </div>
        <?php
    }

    public function eap_license_activation() {

            check_ajax_referer( 'eap-admin-settings-nonce', 'security' );

            if( isset( $_POST['purchase_key'] ) ) {
                
                $licenseKey   = !empty( $_POST['purchase_key'] ) ? esc_html($_POST['purchase_key']) : '';
                $licenseEmail = !empty( $_POST['user_email'] ) ? esc_html( $_POST['user_email'] ) : '';

                $error = "";
                $responseObj = null;

                if( \EnteraddonsBase::CheckWPPlugin( sanitize_text_field( $licenseKey ), sanitize_email( $licenseEmail ), $error, $responseObj, ENTERADDONSPRO_FILE  ) ) {

                    update_option( "enteraddons_plugin_lic_Key", sanitize_text_field( $licenseKey ) ) || add_option( "enteraddons_plugin_lic_Key", sanitize_text_field( $licenseKey ) );
                    update_option( "enteraddons_plugin_lic_email", sanitize_email( $licenseEmail ) ) || add_option( "enteraddons_plugin_lic_email", sanitize_email( $licenseEmail ) );
                    update_option( "eap_lic_Key_validation_status", sanitize_text_field( 'yes' ) );
                    update_option( '_site_transient_update_plugins', '' );

                    $result = [ 'status' => true, 'msg' => esc_html__( 'Your activation has been successfully completed
                    ', 'enteraddons-pro' ) ];
                } else {
                    $result = [ 'status' => false, 'msg' => $error ];
                }

            } else {
                $result = [ 'status' => false, 'msg' => esc_html__( 'Your purchase key input field is empty.', 'enteraddons-pro' ) ];
            }

            echo json_encode($result);

            exit();

    }

    public function eap_license_deactivate() {
        check_ajax_referer( 'eap-admin-settings-nonce', 'security' );
        $r = new \EnteraddonsPro\Classes\Deactivation();
        $res = $r->deleteLicenceActivation();
        echo json_encode( $res, true );
        exit();
    }

    public function support_tab_after_content() {

        if( !\Enteraddons\Classes\Helper::checkPhpV81()  ) {
           
        $obj = new \Enteraddons\Admin\Admin_API();
        $changelogContent = $obj->get_data( 'changelog-data/?versionstype=42' );

        ?>
        <!-- Changelog -->
        <div class="changelog">
            <?php 
            if( !empty( $changelogContent ) ):
                echo '<h3>'.esc_html__( 'Enter Addons Pro Change-log (Updates)', 'enteraddons-pro' ).'</h3>';
                $i = 0;
                foreach( $changelogContent as  $changelog ):
                    $i++;
            ?>
            <div class="changelog-inner">
                <?php 
                if( !empty( $changelog['title']['rendered'] ) ) {
                    $new = $i == 1 ? '<span class="latest-version-tag">'.esc_html__( 'Latest version', 'enteraddons-pro' ).'</span>' : '';
                    echo '<p>'.esc_html( $changelog['title']['rendered'] ).$new.'</p>';
                }
                //
                if( !empty( $changelog['change_log_meta'] ) ):
                ?>
                <ul class="list-unstyled update-lists">
                    <?php 
                    foreach( $changelog['change_log_meta'] as $lists ) {

                        if( $lists['change_type'] == 'added' ) {

                            $typeClass = 'added';
                            $typeText = 'Added';

                        } else if( $lists['change_type'] == 'improved' ) {

                            $typeClass = 'improve';
                            $typeText = 'Improved';

                        } else {
                            $typeClass = 'fixed';
                            $typeText = 'Fixed';
                        }

                        if( !empty( $lists['title'] ) ) {
                            echo '<li><span class="'.esc_attr( $typeClass ).'">'.esc_html( $typeText ).'</span>: '.esc_html( $lists['title'] ).'</li>';
                        }
                    }
                    ?>
                </ul>
                <?php 
                endif;
                ?>
            </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
        <!-- End Changelog -->
        <?php
        }
    }

}