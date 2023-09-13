<?php
/**
 * Enteraddons Header_Footer_Scripts class
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
   <?php \EnteraddonsPro\Modules\HFS_View_Components::snippetPageTitle( esc_html__( 'Snippets', 'enteraddons-pro' ), esc_html__( 'Add New Snippet', 'enteraddons-pro' ) ); ?>

    	<table class="wp-list-table widefat fixed striped table-view-list pages">
    	<thead>
            <tr>
               <td id="cb" class="manage-column column-cb check-column">
                  <label class="screen-reader-text" for="cb-select-all-1"><?php esc_html_e( 'Select All', 'enteraddons-pro' ); ?></label>
                  <input id="cb-select-all-" type="checkbox">
               </td>
               <th id="title" class="manage-column column-title column-primary">
                  <span><?php esc_html_e( 'Title', 'enteraddons-pro' ); ?></span>
               </th>
               <th id="location" class="manage-column column-author"><?php esc_html_e( 'Location', 'enteraddons-pro' ); ?></th>
               <th id="status" class="manage-column column-author"><?php esc_html_e( 'Status', 'enteraddons-pro' ); ?></th>
               <th id="author" class="manage-column column-author"><?php esc_html_e( 'Author', 'enteraddons-pro' ); ?></th>
               <th scope="col" id="date" class="manage-column">
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
			$snippetAll = \EnteraddonsPro\Modules\HFS_Database_Table::getAllData( $args );			
			if( !empty( $snippetAll['data'] ) ){
				foreach( $snippetAll['data'] as $snippet ) {

				$sid = $snippet['id'];
				
              	$url = admin_url('/admin.php?page=header-footer-edit-snippet&id='.$sid );
              	$getEditUrl = wp_nonce_url( $url, 'eahfs_nonce', '_eahfsnonce' );
              	//
              	$url = admin_url('/admin.php?page=header-footer-scripts&action=delete&id='.$sid );
              	$getDeleteUrl = wp_nonce_url( $url, 'eahfs_nonce', '_eahfsnonce' );
         	?>
            <tr id="post-" class="iedit author-self level-0 post-1435">
            	<th scope="row" class="check-column">
                	<label class="screen-reader-text" for="cb-select-1435"><?php esc_html_e( 'Select snippet', 'enteraddons-pro' ); ?></label>
                	<input id="cb-select-all-" type="checkbox">
            	</th>
            	<td class="title column-title has-row-actions column-primary page-title" data-colname="Title">
					<strong>
						<a class="row-title" href="<?php echo esc_url( $getEditUrl ); ?>"><?php echo !empty( $snippet['title'] ) ? $snippet['title'] : ''; ?></a>
					</strong>
                	<div class="row-actions">
						<span class="edit"> <a href="<?php echo esc_url( $getEditUrl ); ?>"><?php esc_html_e( 'Edit', 'enteraddons-pro' ); ?></a> |</span>
						<span class="trash snippet-deletion"><a href="<?php echo esc_url( $getDeleteUrl ); ?>" class="submitdelete"><?php esc_html_e( 'Delete', 'enteraddons-pro' ); ?></a></span>
                	</div>
               </td>
               <td class="author column-author"><?php echo esc_html( $snippet['location'] ); ?></td>
               <td class="author column-author"><?php echo esc_html( $snippet['status'] ); ?></td>
               <td class="author column-author"><?php echo get_the_author_meta( 'display_name', $snippet['created_by'] ); ?></td>
               <td class="date column-date" data-colname="Date"><?php esc_html_e( 'Published', 'enteraddons-pro' ); ?><br><?php echo !empty( $snippet['created_time'] ) ? $snippet['created_time'] : '';  ?></td>
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
               <th id="title" class="manage-column column-title column-primary">
                  <span><?php esc_html_e( 'Title', 'enteraddons-pro' ); ?></span>
               </th>
               <th id="location" class="manage-column column-author"><?php esc_html_e( 'Location', 'enteraddons-pro' ); ?></th>
               <th id="status" class="manage-column column-author"><?php esc_html_e( 'Status', 'enteraddons-pro' ); ?></th>
               <th id="author" class="manage-column column-author"><?php esc_html_e( 'Author', 'enteraddons-pro' ); ?></th>
               <th id="date" class="manage-column">
                  <span><?php esc_html_e( 'Date', 'enteraddons-pro' ); ?></span>
               </th>
            </tr>
         </tfoot>
      </table>
      <?php 
      $mp = !empty( $snippetAll['max_page'] ) ? $snippetAll['max_page'] : '';
      \EnteraddonsPro\Modules\Modules_Utility::customModulePagination( $mp );
      ?>
</div>
<?php 
\EnteraddonsPro\Modules\HFS_View_Components::snippetPageScripts();
?>
