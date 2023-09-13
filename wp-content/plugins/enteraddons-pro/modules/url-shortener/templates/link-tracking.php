<?php
/**
 * Enteraddons 
 *
 * @package     EnterAddons Pro
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

?>
<div class="link-traking-wrap">
  <h3><?php esc_html_e( 'Visitor Information', 'enteraddons-pro' ); ?></h3>
   <table class="admin_img_table display" style="width:100%">
         <thead>
           <tr>
             <th><?php esc_html_e( 'No','enteraddons-pro' ); ?></th>
             <th><?php esc_html_e( 'IP', 'enteraddons-pro' ); ?></th>
             <th><?php esc_html_e( 'Country', 'enteraddons-pro' ); ?></th>
             <th><?php esc_html_e( 'Time Zone', 'enteraddons-pro' ); ?></th>
             <th><?php esc_html_e( 'Device Info', 'enteraddons-pro' ); ?></th>
             <th><?php esc_html_e( 'Browser', 'enteraddons-pro' ); ?></th>
             <th><?php esc_html_e( 'Date', 'enteraddons-pro' ); ?></th>
           </tr>
         </thead>
         <tbody>
         <?php
         $data = \EnteraddonsPro\Modules\Url_Tracking::getVisitorData( $sid );
         if( !empty( $data ) ) {
            foreach( $data as $val ) {
               echo '<tr><td>1</td> <td>'.esc_html( $val['visitor_ip'] ).'</td> <td>'.esc_html( $val['visitor_country'] ).'</td> <td>'.esc_html( $val['visitor_timezone'] ).'</td><td>'.esc_html( $val['device_info'] ).'</td><td>'.esc_html( $val['browser'] ).'</td><td>'.esc_html( $val['created_time'] ).'</td></tr>';
            }
         }
         ?>
         </tbody>
         <tfoot>
           <tr>
             <th><?php esc_html_e( 'No', 'enteraddons-pro' ); ?></th>
             <th><?php esc_html_e( 'IP', 'enteraddons-pro' ); ?></th>
             <th><?php esc_html_e( 'Country', 'enteraddons-pro' ); ?></th>
             <th><?php esc_html_e( 'Time Zone', 'enteraddons-pro' ); ?></th>
             <th><?php esc_html_e( 'Device Info', 'enteraddons-pro' ); ?></th>
             <th><?php esc_html_e( 'Browser', 'enteraddons-pro' ); ?></th>
             <th><?php esc_html_e( 'Date', 'enteraddons-pro' ); ?></th>
           </tr>
         </tfoot>
   </table>
</div>

