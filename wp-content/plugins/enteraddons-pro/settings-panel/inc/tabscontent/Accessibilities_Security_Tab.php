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

class Accessibilities_Security_Tab extends \EnteraddonsPro\Settings_Panel\SettingsField\Settings_Fields_Base {

  public function tab_setting_fields() {

      $this->start_fields_section([
          'title'   => '',
          'class'   => '',
          'id'      => 'security',
          'display' => 'block'
      ]);

      $this->checkbox(
        [
          'title' => esc_html__( 'Remove WP Version', 'enteraddons-pro' ),
          'name'  => 'remove-wp-version',
        ]
      );
      $this->checkbox(
        [
          'title' => esc_html__( 'Remove Rsd Link', 'enteraddons-pro' ),
          'name'  => 'remove-rsd-link',
        ]
      );
      $this->checkbox(
        [
          'title' => esc_html__( 'Remove Rest Output Link', 'enteraddons-pro' ),
          'name'  => 'remove-rest-output-link',
        ]
      );
      $this->checkbox(
        [
          'title' => esc_html__( 'Remove oEmbed links', 'enteraddons-pro' ),
          'name'  => 'remove-oembed-add-discovery-links',
        ]
      );
      $this->checkbox(
        [
          'title' => esc_html__( 'Remove REST API in HTTP Headers', 'enteraddons-pro' ),
          'name'  => 'remove-rest-api-output-link',
        ]
      );
      $this->checkbox(
        [
          'title' => esc_html__( 'Remove WLW Manifest', 'enteraddons-pro' ),
          'name'  => 'remove-wlwmanifest-link',
        ]
      );
      $this->checkbox(
        [
          'title' => esc_html__( 'Remove Shortlink', 'enteraddons-pro' ),
          'name'  => 'remove-shortlink-wp',
        ]
      );

      $this->end_fields_section(); // End fields section
  }
}
