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
<div class="wrap">
   <?php \EnteraddonsPro\Modules\Shortener_Components::pageTitle( esc_html__( 'Url Shortener', 'enteraddons-pro' ), esc_html__( 'Add New', 'enteraddons-pro' ) ); ?>
    	<table class="wp-list-table widefat fixed striped table-view-list pages">
       	<thead>
               <tr>
                  <td id="cb" class="manage-column column-cb check-column">
                     <label class="screen-reader-text" for="cb-select-all-1"><?php esc_html_e( 'Select All', 'enteraddons-pro' ); ?></label>
                     <input id="cb-select-all-" type="checkbox">
                  </td>
                  <th scope="col" class="manage-column column-title column-primary">
                     <span><?php esc_html_e( 'Title', 'enteraddons-pro' ); ?></span>
                  </th>
                  <th scope="col" class="manage-column column-title column-primary">
                     <span><?php esc_html_e( 'Description', 'enteraddons-pro' ); ?></span>
                  </th>
                  <th scope="col" class="manage-column column-author"><?php esc_html_e( 'Slug', 'enteraddons-pro' ); ?></th>
                  <th scope="col" class="manage-column column-author"><?php esc_html_e( 'Short Link', 'enteraddons-pro' ); ?></th>
                  <th scope="col" class="manage-column column-author"><?php esc_html_e( 'Author', 'enteraddons-pro' ); ?></th>
                  <th scope="col" class="manage-column">
                     <span><?php esc_html_e( 'Date', 'enteraddons-pro' ); ?></span>
                  </th>
               </tr>
       	</thead>
         
         <tbody id="snippets-list">
         <?php
         $args = [
            'pagination' => true,
            'limit' => 10,
            'paged' => !empty( $_GET['paged'] ) ? absint( $_GET['paged'] ) : '',
            'order_by' => 'id'
         ];
			$shortenerAll = \EnteraddonsPro\Modules\Url_Shortener_DB::getAllData($args);

			if( !empty( $shortenerAll['data'] ) ) {
				foreach( $shortenerAll['data'] as $shorturl ) {

				$sid = $shorturl['id'];
              	$url = admin_url('/admin.php?page=ea-edit-short-url&shortener_id='.$sid );
              	$getEditUrl = wp_nonce_url( $url, 'eaus_nonce', '_eausnonce' );
              	//
              	$url = admin_url('/admin.php?page=ea-url-shortener&action=delete&shortener_id='.$sid );
              	$getDeleteUrl = wp_nonce_url( $url, 'eaus_nonce', '_eausnonce' );

               $shortUrl = site_url('/').$shorturl['slug'];
         	?>
            <tr id="post-" class="iedit author-self level-0 post-1435">
            	<th scope="row" class="check-column">
                	<label class="screen-reader-text" for="cb-select-1435"><?php esc_html_e( 'Select snippet', 'enteraddons-pro' ); ?></label>
                	<input id="cb-select-all-" type="checkbox">
            	</th>
            	<td class="title column-title has-row-actions column-primary page-title" data-colname="Title">
   					<strong>
   						<a class="row-title" href="<?php echo esc_url( $getEditUrl ); ?>"><?php echo !empty( $shorturl['title'] ) ? $shorturl['title'] : ''; ?></a>
   					</strong>
                	<div class="row-actions">
						<span class="edit"> <a href="<?php echo esc_url( $getEditUrl ); ?>"><?php esc_html_e( 'Edit', 'enteraddons-pro' ); ?></a> |</span>
						<span class="trash snippet-deletion"><a href="<?php echo esc_url( $getDeleteUrl ); ?>" class="submitdelete"><?php esc_html_e( 'Delete', 'enteraddons-pro' ); ?></a></span>
                	</div>
               </td>
               <td class="author column-author"><?php echo esc_html( $shorturl['description'] ); ?></td>
               <td class="author column-author"><?php echo esc_html( $shorturl['slug'] ); ?></td>
               <td class="author column-author" data-shorturl="<?php echo esc_url( $shortUrl ); ?>"><?php echo esc_url( $shortUrl ); ?><span class="shorturl-copy"><span class="dashicons dashicons-admin-page"></span></span></td>
               <td class="author column-author"><?php echo get_the_author_meta( 'display_name', $shorturl['created_by'] ); ?></td>
               <td class="date column-date" data-colname="Date"><?php esc_html_e( 'Published', 'enteraddons-pro' ); ?><br><?php echo !empty( $shorturl['created_time'] ) ? $shorturl['created_time'] : '';  ?></td>
            </tr>
            <?php 
            }
            }
            ?>
         </tbody>
         <tfoot>
            <tr>
               <td id="cb" class="manage-column column-cb check-column">
                  <label class="screen-reader-text" for="cb-select-all-1"><?php esc_html_e( 'Select All', 'enteraddons-pro' ); ?></label>
                  <input id="cb-select-all-" type="checkbox">
               </td>
               <th scope="col" class="manage-column column-title column-primary">
                  <span><?php esc_html_e( 'Title', 'enteraddons-pro' ); ?></span>
               </th>
               <th scope="col" class="manage-column column-title column-primary">
                  <span><?php esc_html_e( 'Description', 'enteraddons-pro' ); ?></span>
               </th>
               <th scope="col" class="manage-column column-author"><?php esc_html_e( 'Slug', 'enteraddons-pro' ); ?></th>
               <th scope="col" class="manage-column column-author"><?php esc_html_e( 'Short Link', 'enteraddons-pro' ); ?></th>
               <th scope="col" class="manage-column column-author"><?php esc_html_e( 'Author', 'enteraddons-pro' ); ?></th>
               <th scope="col" class="manage-column">
                  <span><?php esc_html_e( 'Date', 'enteraddons-pro' ); ?></span>
               </th>
            </tr>
         </tfoot>
      </table>
      <?php 
      $mp = !empty( $shortenerAll['max_page'] ) ? $shortenerAll['max_page'] : '';
      \EnteraddonsPro\Modules\Modules_Utility::customModulePagination( $mp );
      ?>
</div>

