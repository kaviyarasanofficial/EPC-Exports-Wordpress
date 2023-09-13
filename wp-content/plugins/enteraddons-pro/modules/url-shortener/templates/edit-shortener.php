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

$sid = !empty( $_GET['shortener_id'] ) ? absint( $_GET['shortener_id'] ) : '';

if( isset( $_POST['update'] ) ) {
	do_action( 'ea_edit_shorturl', $sid );
}
//
$shorturlData = \EnteraddonsPro\Modules\Url_Shortener_DB::getDataById( $sid );

$title = !empty( $shorturlData->title ) ? $shorturlData->title : '';
$slug = !empty( $shorturlData->slug ) ? $shorturlData->slug : '';
$shortable_type  = !empty( $shorturlData->shortable_type ) ? $shorturlData->shortable_type : '';
$shortable_url  = !empty( $shorturlData->shortable_url ) ? $shorturlData->shortable_url : '';
$redirect_type = !empty( $shorturlData->redirect_type ) ? $shorturlData->redirect_type : '';
$description = !empty( $shorturlData->description ) ? $shorturlData->description : '';
$other_short_urls = !empty( $shorturlData->other_short_urls ) ? $shorturlData->other_short_urls : '';
//
$obj = new \EnteraddonsPro\Modules\Shortener_Components();
?>
<div id="wpbody-content">
<div class="wrap">
	<?php $obj::pageTitle( esc_html__( 'Edit', 'enteraddons-pro' ), esc_html__( 'Add New', 'enteraddons-pro' ) ) ?>
    <hr class="wp-header-end">
    <form name="post" action="#" method="post" id="snippets">
      <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">
	        <div id="post-body-content">
	            <div id="titlediv">
								<div id="titlewrap">
									<?php 
									$obj::textField( [ 'name' => 'title', 'val' => esc_html( $title ), 'placeholder' => esc_html__( 'Add Title', 'enteraddons-pro' ), 'id' => 'title' ] );
									?>
								</div>
	            </div>
	            <div class="post-body-snippets-content">
	            	<?php
	            	//
	            	$title = esc_html__( 'Slug', 'enteraddons-pro' );
	            	$obj::shortenerSlugField( [ 'title' => $title, 'val' => esc_html( $slug ), 'name' => 'slug', 'placeholder' => $title ] );
	            	// shortable type
	            	$args = [
	            		'title' => esc_html__( 'Shortable Url Type', 'enteraddons-pro' ),
	            		'name' => 'shortable_type',
	            		'class' => 'shortable-url-type',
	            		'val' => esc_html( $shortable_type ),
	            		'options' => [
										'custom' => esc_html__( 'Custom', 'enteraddons-pro' ),
										'post' 	 => esc_html__( 'Post', 'enteraddons-pro' ),
										'page' 	 => esc_html__( 'Page', 'enteraddons-pro' )
									]
	            	];
	            	$obj::selectField($args);
	            	//
	            	$title = esc_html__( 'Custom Shortable Url', 'enteraddons-pro' );
	            	$obj::textField( [ 'title' => $title, 'wrapperclass' => 'is-custom-shortable', 'val' => esc_html( $shortable_url ), 'name' => 'custom_shortable_url',  'placeholder' => $title ] );
	            	// shortable url from page
	            	$args = [
	            		'title' => esc_html__( 'Page Shortable Url', 'enteraddons-pro' ),
	            		'name' => 'page_shortable_url',
	            		'wrapperclass' => 'is-page-shortable',
	            		'val' => esc_html( $shortable_url ),
	            		'options' => \EnteraddonsPro\Modules\Modules_Utility::getPagePermalinkInArray()
	            	];
	            	$obj::selectField($args);
	            	// shortable url from post
	            	$args = [
	            		'title' => esc_html__( 'Post Shortable Url', 'enteraddons-pro' ),
	            		'name' => 'post_shortable_url',
	            		'wrapperclass' => 'is-post-shortable',
	            		'val' => esc_html( $shortable_url ),
	            		'options' => \EnteraddonsPro\Modules\Modules_Utility::getPostPermalinkInArray()
	            	];
	            	$obj::selectField($args);
	            	// Select Field
	            	$args = [
	            		'title' => esc_html__( 'Redirection', 'enteraddons-pro' ),
	            		'name' => 'redirections_type',
	            		'val' => esc_html( $redirect_type ),
	            		'options' => [
										'' => esc_html__( 'None', 'enteraddons-pro' ),
										'301' => esc_html__( '301 (Temporary)', 'enteraddons-pro' ),
										'302' => esc_html__( '302 (Temporary)', 'enteraddons-pro' ),
										'307' => esc_html__( '307 (Temporary)', 'enteraddons-pro' )
									]
	            	];

	            	$obj::selectField($args);
	            	
	            	//
	            	$title = esc_html__( 'Description', 'enteraddons-pro' );
	            	$obj::textAreaField( [ 'title' => $title, 'val' => $description, 'name' => 'description' ] );
	            	?>
	            </div>
	            <?php include __DIR__ .'/link-tracking.php'; ?>
	        </div>
	        <!-- /post-body-content -->
	        <div id="postbox-container-1" class="postbox-container">
	            <div id="side-sortables" class="meta-box-sortables ui-sortable">
	            	<div id="submitdiv" class="postbox ">
	            	<?php wp_nonce_field( 'ea_edit_shorturl_nonce', 'edit_shorturl_nonce' ); ?>
	                <div class="postbox-header">
	                  <h2 class="hndle ui-sortable-handle"><?php esc_html_e( 'Publish', 'enteraddons-pro' ); ?></h2>
	                </div>
	                <div class="inside">
	                  <div class="submitbox" id="submitpost">
	                    <div id="major-publishing-actions">
	                      <div id="delete-action">
	                      	<?php
			              	//
			              	$url = admin_url('/admin.php?page=ea-url-shortener&action=delete&shortener_id='.$sid );
			              	$getDeleteUrl = wp_nonce_url( $url, 'eaus_nonce', '_eausnonce' );
	                      	?>
	                        <a class="submitdelete snippet-deletion" href="<?php echo esc_url( $getDeleteUrl ); ?>"><?php esc_html_e( 'Move to Trash', 'enteraddons-pro' ); ?></a>
	                      </div>
	                      <div id="publishing-action">
	                        <span class="spinner"></span>
	                        <input name="shorturl_update" type="hidden" id="shorturl_update" value="update">
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