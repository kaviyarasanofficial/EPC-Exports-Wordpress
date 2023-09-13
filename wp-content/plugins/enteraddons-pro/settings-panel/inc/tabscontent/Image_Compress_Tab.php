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

class Image_Compress_Tab extends \EnteraddonsPro\Settings_Panel\SettingsField\Settings_Fields_Base {

  public function tab_setting_fields() {

      $this->start_fields_section([
          'title'   => '',
          'class'   => '',
          'id'      => 'imagecompress',
          'display' => 'none'
      ]);
        
      //
      $obj = new \EnteraddonsPro\Modules\Media_Directory();      
      $allImg = $obj->getMedia();
      ?>
      <div class="webp-tab-img-list">
        <table class="admin_img_table display" style="width:100%">
            <thead>
              <tr>
                <th><?php esc_html_e( 'Select All','enteraddons-pro' ); ?><br><input class="eap-webp-all" type="checkbox" value="all"/></th>
                <th><?php esc_html_e( 'Preview', 'enteraddons-pro' ); ?></th>
                <th><?php esc_html_e( 'Size', 'enteraddons-pro' ); ?></th>
                <th><?php esc_html_e( 'Link', 'enteraddons-pro' ); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php 
              if( !empty( $allImg ) ) {
                foreach( $allImg as $img ) {
                  echo '<tr><td><input class="media-item" name="compress_media_item" type="checkbox" value="'.$img[0].','.$img[1].'"/></td> <td><img src="'.$img[1].'" /></td> <td>'.esc_html( $this->getFileSize( $img[0] ) ).'</td> <td><p>'.$img[1].'<p></td></tr>';

                }
              }
              ?>
            </tbody>
            <tfoot>
              <tr>
                <th><?php esc_html_e( 'Checkbox', 'enteraddons-pro' ); ?></th>
                <th><?php esc_html_e( 'Preview', 'enteraddons-pro' ); ?></th>
                <th><?php esc_html_e( 'Size', 'enteraddons-pro' ); ?></th>
                <th><?php esc_html_e( 'Link', 'enteraddons-pro' ); ?></th>
              </tr>
            </tfoot>
        </table>
      </div>

      <div class="loading-wrapper-top">
        <div class="loading-wrapper">
          <p>Compressing.........</p>
          <div id="loader">
            <div></div>
          </div>
        </div>
        <div class="work-complete">Done</div>
      </div>

      <?php

      echo '<span class="compress-image button button-primary">'.esc_html__( 'Compress Image', 'enteraddons-pro' ).'</span>';
      $this->end_fields_section(false); // End fields section
  }

  public function getFileSize( $url ) {
    $sizeInByte = filesize( $url );
    if ($sizeInByte >= 1024) {
      $sizeInKb = $sizeInByte / 1024;
      return round( $sizeInKb, 2)." Kb";
    } else {
      return round( $sizeInByte , 2)." bytes";
    }

  }

}
