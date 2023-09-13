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

class Webp_Convert_Tab extends \EnteraddonsPro\Settings_Panel\SettingsField\Settings_Fields_Base {

  public function tab_setting_fields() {

      $this->start_fields_section([
          'title'   => '',
          'class'   => '',
          'id'      => 'webpconvert',
          'display' => 'block'
      ]);
      
      $this->number(
        [
          'title' => esc_html__( 'Webp Image Quality', 'enteraddons-pro' ),
          'name'  => 'webp-img-quality',
          'max'     => '100',
          'min'     => '1',
          'placeholder' => '70',
        ]
      );
      //
      $obj = new \EnteraddonsPro\Modules\Media_Directory();
      $allImg = $obj->getAttachmentFromDatabase();

      // echo '<pre>';
      // print_R( $allImg );
      // echo '</pre>';

      ?>
      <div class="webp-tab-img-list">
        <table class="admin_img_table display" style="width:100%">
            <thead>
              <?php 
              $this->TableHeaderHtml('header');
              ?>
            </thead>
            <tbody>
              <?php
              if( !empty( $allImg ) ) {
                foreach( $allImg as $key => $img ) {
                  
                  $val = json_encode($img['files']);
                  $url = $img['url'];
                  $mainImgWithPath = end( $img['files'] );
                  $filePathWithoutExt   = substr( $mainImgWithPath, 0, strrpos( $mainImgWithPath, '.' ) );
                  $webpPath = '';
                  $webpUrl = '';
                  $webpExt = '.webp';
                  $oldExt = substr( $url, strrpos( $url, '.' ) +1 );
                  //
                  if( file_exists( $filePathWithoutExt.'.webp' ) ) {

                    $getWebpPath = substr( $img['file'], 0, strrpos( $img['file'], '.' ) );
                    $webpPath = $getWebpPath.$webpExt;

                    //
                    $getWebpUrl = substr( $url, 0, strrpos( $url, '.' ) );
                    $webpUrl = $getWebpUrl.$webpExt;
                  }
                  
                  //
                  echo '<tr><td><input class="media-item" name="media_item" type="checkbox" value="'.htmlspecialchars( $val, ENT_QUOTES, 'UTF-8').'"/></td> <td><img src="'.esc_url( $url ).'" /></td> <td><p>'.esc_url( $url ).'</p></td><td>'.esc_url( $webpUrl ).'</td><td>';
                    if( !empty( $webpPath ) ) {
                      $getStatus = get_post_meta( $key, 'eap_webp_use_status', true );
                      $status = !empty( $getStatus ) && $getStatus == 1 ? [ 'text' => esc_html__( 'Webp Already used', 'enteraddons-pro' ), 'is_disabled' => 'disabled' ] : [ 'text' => esc_html__('Use Webp', 'enteraddons-pro'), 'is_disabled' => '' ];
                      echo '<button '.esc_attr( $status['is_disabled'] ).' data-webp="'.esc_attr( $webpPath ).'" data-id="'.esc_attr( $key ).'" class="use-webp">'.esc_html( $status['text'] ).'</button>';

                      //
                      if( !empty( $getStatus ) && $getStatus == 1 ) {
                        echo '<button data-id="'.esc_attr( $key ).'" data-prevext="'.esc_attr( $oldExt ).'" class="back-webp-toimg">'.esc_html__( 'Reset', 'enteraddons-pro' ).'</button>';
                      }

                    }
                  echo '</td></tr>';
                }
              }
              ?>
            </tbody>
            <tfoot>
              <?php 
              $this->TableHeaderHtml('footer');
              ?>
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
      echo '<span class="convert-webp button button-primary">'.esc_html__( 'Convert to Webp', 'enteraddons-pro' ).'</span>';
      $this->end_fields_section(false); // End fields section
  }

  protected function TableHeaderHtml( $type = '' ) {
    ?>
    <tr>
      <?php 
      if( $type == 'header' ) {
        echo '<th>'.esc_html__( 'Select All','enteraddons-pro' ).' <br> <input class="eap-webp-all" type="checkbox" value="all"/></th>';
      } else {
        echo '<th>'.esc_html__( 'Checkbox', 'enteraddons-pro' ).'</th>';
      }
      ?>
      <th><?php esc_html_e( 'Preview', 'enteraddons-pro' ); ?></th>
      <th><?php esc_html_e( 'Image Link', 'enteraddons-pro' ); ?></th>
      <th><?php esc_html_e( 'Webp Link', 'enteraddons-pro' ); ?></th>
      <th><?php esc_html_e( 'Action', 'enteraddons-pro' ); ?></th>
    </tr>
    <?php
  }

}
