<?php
namespace EnteraddonsPro\Settings_Panel\TabsContent;
/**
 * Enteraddons Tweaks_Tab
 *
 * @package     EnterAddons Pro
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

class Maintenance_Mode_Tab extends \EnteraddonsPro\Settings_Panel\SettingsField\Settings_Fields_Base {

  public function tab_setting_fields() {

      $this->start_fields_section([
          'title'   => '',
          'class'   => '',
          'id'      => '',
          'display' => 'block'
      ]);

      $this->checkbox(
        [
          'title' => esc_html__( 'Active Maintenance Mode', 'enteraddons-pro' ),
          'name'  => 'active-maintenance-mode',
        ]
      );
      $this->selectbox(
        [
          'title' => esc_html__( 'Set Maintenance Mode Page', 'enteraddons-pro' ),
          'name'  => 'mm-page',
          'description' => esc_html__( 'Make sure you have created a page for Maintenance Mode using the Elementor page builder.', 'enteraddons-pro' ),
          'options' => \Enteraddons\Classes\Helper::getPagesIdTitle()
          
        ]
      );
      $this->end_fields_section(); // End fields section
  }
}
