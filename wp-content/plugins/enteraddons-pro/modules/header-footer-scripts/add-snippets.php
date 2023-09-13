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

do_action( 'ea_add_snippets' );
?>
<div id="wpbody-content">

<div class="wrap">

    <h1 class="wp-heading-inline"><?php esc_html_e( 'Add New', 'enteraddons-pro' ); ?></h1>
    <hr class="wp-header-end">
    <form name="post" action="<?php echo esc_url( admin_url('admin.php?page=header-footer-add-snippet') ); ?>" method="post" id="snippets">
      <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">
	        <div id="post-body-content">
	            <div id="titlediv">
					<div id="titlewrap">
						<input type="text" placeholder="<?php esc_attr_e( 'Add Title', 'enteraddons-pro' ); ?>" name="snippet_title" size="30" value="" id="title">
					</div>
	            </div>
	            <div class="post-body-snippets-content">
	            	<?php
	            	$obj = new \EnteraddonsPro\Modules\HFS_View_Components();
	            	$obj::snippetStatusField();
	            	$obj::snippetSnippetTypeField();
	            	$obj::snippetLocationField();
	            	$obj::snippetDispalyOnField();
	            	$obj::snippetExcludePagesField();
	            	$obj::snippetExcludePostsField();
	            	?>
	            </div>
	            <div class="post-body-snippets-content post-body-snippets-code-editor">
	            	<h3><?php esc_html_e( 'Write your Code', 'enteraddons-pro' ); ?></h3>
	            	<textarea name="ea_hf_code" id="ea_hf_code_editor" rows="20"></textarea>
	            </div>
	            <?php $obj::snippetRisksWarning(); ?>
	        </div>
	        <!-- /post-body-content -->
	        <div id="postbox-container-1" class="postbox-container">
	            <div id="side-sortables" class="meta-box-sortables ui-sortable">
	            	<div id="submitdiv" class="postbox ">
	            	<?php wp_nonce_field( 'ea_add_snippet_nonce', 'add_snippet_nonce' ); ?>
	                <div class="postbox-header">
	                  <h2 class="hndle ui-sortable-handle"><?php esc_html_e( 'Publish', 'enteraddons-pro' ); ?></h2>
	                </div>
	                <div class="inside">
	                  <div class="submitbox" id="submitpost">
	                    <div id="major-publishing-actions">
	                      <div id="publishing-action">
	                        <span class="spinner"></span>
	                        <input name="snippet_publish" type="hidden" id="snippet_publish" value="publish">
	                        <input type="submit" name="publish" id="publish" class="button button-primary button-large" value="<?php esc_html_e( 'Publish', 'enteraddons-pro' ); ?>">
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