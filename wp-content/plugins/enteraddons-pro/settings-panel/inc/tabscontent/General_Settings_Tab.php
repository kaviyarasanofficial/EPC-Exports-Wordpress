<?php
namespace EnteraddonsPro\Settings_Panel\TabsContent;
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

class General_Settings_Tab extends \EnteraddonsPro\Settings_Panel\SettingsField\Settings_Fields_Base {

  public function get_option_name() {
    return 'speedupkit_options'; // set option name it will be same or different name
  }

   public function tab_setting_fields() {

        $this->start_fields_section([
            'title'   => '',
            'class'   => 'active',
            'id'      => 'general',
            'display' => 'block'
        ]);

        $this->number(
          [
            'title' => esc_html__( 'Jpg Image Quality', 'enteraddons-pro' ),
            'name'  => 'jpg-img-quality',
            'max'     => '100',
            'min'     => '1',
            'placeholder' => '70',
          ]
        );
        $this->number(
          [
            'title' => esc_html__( 'Png Image Quality', 'enteraddons-pro' ),
            'name'  => 'png-img-quality',
            'max'     => '9',
            'min'     => '-1',
            'placeholder' => '6',
          ]
        );
        $this->number(
          [
            'title' => esc_html__( 'Webp Image Quality', 'enteraddons-pro' ),
            'name'  => 'webp-img-quality',
            'max'     => '100',
            'min'     => '1',
            'placeholder' => '70',
          ]
        );
        $this->selectbox(
          [
            'title' => esc_html__( 'Image Compress Type', 'enteraddons-pro' ),
            'name'  => 'image-compress-type',
            'options' => [
              'self' =>  esc_html__( 'Self System', 'enteraddons-pro' ),
              'api' =>  esc_html__( '3rd party API', 'enteraddons-pro' ),
            ]
            
          ]
        );
        
        $this->end_fields_section(); // End fields section
   }
}
