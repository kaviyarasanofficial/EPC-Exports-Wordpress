<?php
namespace EnteraddonsPro\Settings_Panel\TabsContent;
/**
 * Enteraddons class
 *
 * @package     EnterAddons Pro
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

class Url_Shortener_Tab extends \EnteraddonsPro\Settings_Panel\SettingsField\Settings_Fields_Base {

  public function tab_setting_fields() {

      $this->start_fields_section([
          'title'   => '',
          'class'   => '',
          'id'      => 'urlshortener',
          'display' => 'block'
      ]);
      
      ?>
      <div class="webp-tab-img-list">
        <table class="admin_img_table display" style="width:100%">
            <thead>
              <tr>
                <th><input class="eap-webp-all" type="checkbox" value="all"/><?php esc_html_e( 'Title','enteraddons-pro' ); ?></th>
                <th><?php esc_html_e( 'Clicks', 'enteraddons-pro' ); ?></th>
                <th><?php esc_html_e( 'Created On', 'enteraddons-pro' ); ?></th>
                <th><?php esc_html_e( 'Link', 'enteraddons-pro' ); ?></th>
                <th><?php esc_html_e( 'Action', 'enteraddons-pro' ); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php 
              echo '<tr>
              <td>This Is Title</td> 
              <td>4</td>
              <td>01/02/2023</td>
              <td><span>http//test.com</span> <span>Copy</span></td>
              <td><button>View</button></td>
              </tr>';
              ?>
            </tbody>
            <tfoot>
              <tr>
                <th><input class="eap-webp-all" type="checkbox" value="all"/><?php esc_html_e( 'Title', 'enteraddons-pro' ); ?></th>
                <th><?php esc_html_e( 'Clicks', 'enteraddons-pro' ); ?></th>
                <th><?php esc_html_e( 'Created On', 'enteraddons-pro' ); ?></th>
                <th><?php esc_html_e( 'Link', 'enteraddons-pro' ); ?></th>
                <th><?php esc_html_e( 'Action', 'enteraddons-pro' ); ?></th>
              </tr>
            </tfoot>
          </table>
        </div>
        <div class="loading-wrapper-top">
          <div class="loading-wrapper">
            <p><?php esc_html_e( 'Compressing.........', 'enteraddons-pro' ); ?></p>
            <div id="loader">
              <div></div>
            </div>
          </div>
          <div class="work-complete"><?php esc_html_e( 'Done', 'enteraddons-pro' ); ?></div>
        </div>
      <?php
      $this->end_fields_section(); // End fields section
  }
}
