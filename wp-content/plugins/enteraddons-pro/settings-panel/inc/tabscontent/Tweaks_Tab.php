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

class Tweaks_Tab extends \EnteraddonsPro\Settings_Panel\SettingsField\Settings_Fields_Base {

  public function tab_setting_fields() {

      $this->start_fields_section([
          'title'   => '',
          'class'   => '',
          'id'      => 'tweaks',
          'display' => 'block'
      ]);

      $this->checkbox(
        [
          'title' => esc_html__( 'Disable self pingbacks', 'enteraddons-pro' ),
          'name'  => 'disable-pingbacks',
        ]
      );
      $this->checkbox(
        [
          'title' => esc_html__( 'Dequeue emoji scripts', 'enteraddons-pro' ),
          'name'  => 'dequeue-emoji',
        ]
      );
      $this->checkbox(
        [
          'title' => esc_html__( 'Dequeue Dashicons CSS', 'enteraddons-pro' ),
          'name'  => 'dequeue-dashicons-css'
        ]
      );
      $this->checkbox(
        [
          'title' => esc_html__( 'Dequeue the post embed script', 'enteraddons-pro' ),
          'name'  => 'dequeue-post-embed-script',
        ]
      );
      $this->checkbox(
        [
          'title' => esc_html__( 'Dequeue Gutenberg CSS', 'enteraddons-pro' ),
          'name'  => 'dequeue-gutenberg-css',
        ]
      );
      $this->checkbox(
        [
          'title' => esc_html__( 'Enable instant page', 'enteraddons-pro' ),
          'name'  => 'active-instant-page',
        ]
      );
      $this->checkbox(
        [
          'title' => esc_html__( 'Disable Oembed Resource', 'enteraddons-pro' ),
          'name'  => 'oembed-resource-disable',
        ]
      );
      $this->checkbox(
        [
          'title' => esc_html__( 'Remove Query Strings', 'enteraddons-pro' ),
          'name'  => 'remove-query-strings',
        ]
      );
      $this->checkbox(
        [
          'title' => esc_html__( 'Defer CSS', 'enteraddons-pro' ),
          'name'  => 'defer-css',
        ]
      );
      $this->checkbox(
        [
          'title' => esc_html__( 'Defer JS', 'enteraddons-pro' ),
          'name'  => 'defer-js',
        ]
      );

      $this->end_fields_section(); // End fields section
  }
}
