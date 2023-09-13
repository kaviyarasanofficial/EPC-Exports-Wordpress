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

$sid = !empty( $_GET['id'] ) ? $_GET['id'] : '';

do_action( 'ea_edit_snippets', $sid );
//
$snippetData = \EnteraddonsPro\Modules\HFS_Database_Table::getDataById( $sid );
$status = !empty( $snippetData->status ) ? $snippetData->status : '';
$snippetType = !empty( $snippetData->snippet_type ) ? $snippetData->snippet_type : '';
$location  = !empty( $snippetData->location ) ? $snippetData->location : '';
$dispalyOn = !empty( $snippetData->display_on ) ? $snippetData->display_on : '';
$excludePages = !empty( $snippetData->exclude_pages ) ? $snippetData->exclude_pages : '';
$excludePosts = !empty( $snippetData->exclude_posts ) ? $snippetData->exclude_posts : '';
//
?>
<div id="wpbody-content">
<div class="wrap">
	<?php \EnteraddonsPro\Modules\HFS_View_Components::snippetPageTitle( esc_html__( 'Edit', 'enteraddons-pro' ), esc_html__( 'Add New Snippet', 'enteraddons-pro' ) ); ?>
    <hr class="wp-header-end">
    <form name="post" action="#" method="post" id="snippets">
      <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">
	        <div id="post-body-content">
	            <div id="titlediv">
					<div id="titlewrap">
						<input type="text" placeholder="Add Title" name="snippet_title" size="30" value="<?php echo !empty( $snippetData->title ) ? $snippetData->title : ''; ?>" id="title">
					</div>
	            </div>
	            <div class="post-body-snippets-content">
	            	<?php
	            	$obj = new \EnteraddonsPro\Modules\HFS_View_Components();
	            	$obj::snippetStatusField( $status );
	            	$obj::snippetSnippetTypeField( $snippetType );
	            	$obj::snippetLocationField( $location );
	            	$obj::snippetDispalyOnField( $dispalyOn );
	            	$obj::snippetExcludePagesField( $excludePages );
	            	$obj::snippetExcludePostsField( $excludePosts );
	            	?>
	            </div>
	            <div class="post-body-snippets-content post-body-snippets-code-editor">
	            	<h3><?php esc_html_e( 'Write your Code', 'enteraddons-pro' ); ?></h3>
	            	<textarea name="ea_hf_code" id="ea_hf_code_editor" rows="20"><?php echo html_entity_decode( isset( $snippetData->snippets ) ? $snippetData->snippets : '' ); ?></textarea>
	            </div>
	            <?php $obj::snippetRisksWarning(); ?>
	        </div>
	        <!-- /post-body-content -->
	        <div id="postbox-container-1" class="postbox-container">
	            <div id="side-sortables" class="meta-box-sortables ui-sortable">
	            	<div id="submitdiv" class="postbox ">
	            	<?php wp_nonce_field( 'ea_edit_snippet_nonce', 'edit_snippet_nonce' ); ?>
	                <div class="postbox-header">
	                  <h2 class="hndle ui-sortable-handle"><?php esc_html_e( 'Publish', 'enteraddons-pro' ); ?></h2>
	                </div>
	                <div class="inside">
	                  <div class="submitbox" id="submitpost">
	                    <div id="major-publishing-actions">
	                      <div id="delete-action">
	                      	<?php
			              	//
			              	$url = admin_url('/admin.php?page=header-footer-scripts&action=delete&id='.$sid );
			              	$getDeleteUrl = wp_nonce_url( $url, 'eahfs_nonce', '_eahfsnonce' );
	                      	?>
	                        <a class="submitdelete snippet-deletion" href="<?php echo esc_url( $getDeleteUrl ); ?>"><?php esc_html_e( 'Move to Trash', 'enteraddons-pro' ); ?></a>
	                      </div>
	                      <div id="publishing-action">
	                        <span class="spinner"></span>
	                        <input name="snippet_update" type="hidden" id="snippet_update" value="update">
	                        <input type="submit" name="update" id="update" class="button button-primary button-large" value="<?php esc_html_e( 'Update', 'enteraddons-pro' ); ?>">
	                      </div>
	                      <div class="clear"></div>
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>
	        </div>
        </div>
        <!-- /post-body -->
        <br class="clear">
      </div>
      <!-- /poststuff -->
    </form>
  </div>

</div>
<?php 
\EnteraddonsPro\Modules\HFS_View_Components::snippetPageScripts();
?>