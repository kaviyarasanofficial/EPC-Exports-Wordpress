<?php
namespace EnteraddonsPro\Settings_Panel;
/**
 * Enteraddons Post Type Meta class
 *
 * @package     EnterAddons Pro
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */


abstract class Settings_Panel_Base {

	public function getSettingsArea() {
		$this->settings_area();
	}
	public function getTabs() {}
	public function getTabsContent() {}
	public function settings_area() {
		echo '<div class="enteraddons-modules-settings-wrapper"><form id="enteraddons_modules_settings_from" action="options.php" method="post">';
            // check if the user have submitted the settings
            if ( isset( $_GET['settings-updated'] ) ) {
            // add settings saved message with the class of "updated"
            add_settings_error( 'enteraddons_modules_settings_messages', 'enteraddons_modules_settings_message', esc_html__( 'Settings Saved', 'enteraddons-pro' ), 'updated' );
            }
            // 
            settings_fields( 'enteraddons_modules_settings_option_group' ); 
            //
            do_settings_sections( 'enteraddons_modules_settings_option_group' ); 

            // show error/update messages
            settings_errors( 'enteraddons_modules_settings_messages' );

			echo '<div class="settings-wrapper">';
			$this->tabs();
			echo '<div class="content-wrapper">';
			$this->tabs_content();
			
			echo '</div></div>';

		echo '</form></div>';
	}
	public function tabs() {
		$tabs = $this->getTabs();
		if( !empty( $tabs ) ) {
		?>
		<div class="tab-settings-btn">
	        <ul class="list-unstyled">
	        	<?php
        		foreach( $tabs as $key => $tab ) {
        			echo '<li data-tab-select="'.esc_attr( $key ).'" class="'.esc_attr( $tab['class'] ).'"><i class="'.esc_attr( $tab['icon'] ).'"></i>'.esc_html( $tab['title'] ).'</li>';
        		}
	        	?>
	        </ul>
		</div>
		<?php
		}
	}

	public function tabs_content() {
		echo '<div class="tab-content">';
			$this->getTabsContent();
        echo '</div>';	
	}
	
}

