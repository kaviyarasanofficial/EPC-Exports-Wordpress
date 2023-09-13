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
if( isset( $_POST['publish'] ) ) {
	do_action( 'ea_add_shorturl' );
}
$obj = new \EnteraddonsPro\Modules\Shortener_Components();
?>
<div id="wpbody-content">
<div class="wrap">
    <?php $obj::pageTitle( esc_html__( 'Add New', 'enteraddons-pro' ) ) ?>
    <hr class="wp-header-end">
    <form name="post" action="<?php echo esc_url( admin_url('admin.php?page=ea-add-short-url') ); ?>" method="post" id="urlshortener">
      <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">
	        <div id="post-body-content">
	            <div id="titlediv">
								<div id="titlewrap">
									<?php
									$obj::textField( [ 'name' => 'title', 'placeholder' => esc_html__( 'Add Title', 'enteraddons-pro' ), 'id' => 'title' ] );
									?>
								</div>
	            </div>
	            <div class="post-body-snippets-content">
	            	<?php
	            	$title = esc_html__( 'Slug', 'enteraddons-pro' );
	            	$obj::shortenerSlugField( [ 'title' => $title, 'name' => 'slug', 'placeholder' => $title ] );

	            	// shortable type
	            	$args = [
	            		'title' => esc_html__( 'Shortable Url Type', 'enteraddons-pro' ),
	            		'name' => 'shortable_type',
	            		'class' => 'shortable-url-type',
	            		'options' => [
										'custom' => esc_html__( 'Custom', 'enteraddons-pro' ),
										'post' 	 => esc_html__( 'Post', 'enteraddons-pro' ),
										'page' 	 => esc_html__( 'Page', 'enteraddons-pro' )
									]
	            	];
	            	$obj::selectField($args);
	            	//
	            	$title = esc_html__( 'Custom Shortable Url', 'enteraddons-pro' );
	            	$obj::textField( [ 'title' => $title, 'wrapperclass' => 'is-custom-shortable', 'name' => 'custom_shortable_url',  'placeholder' => $title ] );
	            	// shortable url from page
	            	$args = [
	            		'title' => esc_html__( 'Page Shortable Url', 'enteraddons-pro' ),
	            		'name' => 'page_shortable_url',
	            		'wrapperclass' => 'is-page-shortable',
	            		'options' => \EnteraddonsPro\Modules\Modules_Utility::getPagePermalinkInArray()
	            	];
	            	$obj::selectField($args);
	            	// shortable url from post
	            		            	
	            	$args = [
	            		'title' => esc_html__( 'Post Shortable Url', 'enteraddons-pro' ),
	            		'name' => 'post_shortable_url',
	            		'wrapperclass' => 'is-post-shortable',
	            		'options' => \EnteraddonsPro\Modules\Modules_Utility::getPostPermalinkInArray()
	            	];
	            	$obj::selectField($args);
	            	// Select Field
	            	$args = [
	            		'title' => esc_html__( 'Redirection', 'enteraddons-pro' ),
	            		'name' => 'redirections_type',
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
	            	$obj::textAreaField( [ 'title' => $title, 'name' => 'description' ] );
	            	?>
	            </div>
	        </div>
	        <!-- /post-body-content -->
	        <div id="postbox-container-1" class="postbox-container">
	            <div id="side-sortables" class="meta-box-sortables ui-sortable">
	            	<div id="submitdiv" class="postbox ">
	            	<?php wp_nonce_field( 'ea_add_shorturl_nonce', 'add_shorturl_nonce' ); ?>
	                <div class="postbox-header">
	                  <h2 class="hndle ui-sortable-handle"><?php esc_html_e( 'Publish', 'enteraddons-pro' ); ?></h2>
	                </div>
	                <div class="inside">
	                  <div class="submitbox" id="submitpost">
	                    <div id="major-publishing-actions">
	                      <div id="publishing-action">
	                        <span class="spinner"></span>
	                        <input name="shorturl_publish" type="hidden" id="shorturl_publish" value="publish">
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