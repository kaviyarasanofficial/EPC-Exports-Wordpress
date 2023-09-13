<?php
namespace EnteraddonsPro\Classes;

/**
 * Enteraddons Pro Editor_Widgets_Assets class
 *
 * @package     Enteraddons
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

class Deactivation {

	public function deleteLicenceActivation() {

		if( \EnteraddonsBase::RemoveLicenseKey( ENTERADDONSPRO_FILE ) ) {
			update_option( "enteraddons_plugin_lic_Key", "" ) || add_option( "enteraddons_plugin_lic_Key", "" );
			update_option( '_site_transient_update_plugins', '' );
			delete_option('eap_lic_Key_validation_status');
			return [ 'status' => true, 'msg' => esc_html__( 'License successfully deactivate', 'enteraddons-pro' ) ];
		} else {
			return [ 'status' => false, 'msg' => esc_html__( 'Deactivation failed, Please try again.', 'enteraddons-pro' ) ];
		}
	}

} // END CLASS
