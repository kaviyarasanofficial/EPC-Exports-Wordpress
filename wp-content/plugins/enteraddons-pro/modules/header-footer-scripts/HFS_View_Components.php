<?php
namespace EnteraddonsPro\Modules;
/**
 * Enteraddons HHF_Database_Table class
 *
 * @package     EnterAddons Pro
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

class HFS_View_Components {

	public static function snippetPageTitle( $title, $linkTitle ) {
		echo '<h2 class="wp-heading-inline">'.esc_html( $title ).' <a href="'.esc_url( admin_url('/admin.php?page=header-footer-add-snippet') ).'" class="page-title-action">'.esc_html( $linkTitle ).'</a></h2>';
	}
	public static function snippetRisksWarning() {
		echo '<p class="notice notice-warning" style="padding:8px; margin-top:15px">'.esc_html__( 'Warning: Using improper code or untrusted sources code can break your site or create security risks.', 'enteraddons-pro' ).'</p>';
	}
	public static function snippetPageScripts() {
		?>
		<script type="text/javascript">
			(function($) {
				//
				if ($('#ea_hf_code_editor').length) {
			        var editorSettings = wp.codeEditor.defaultSettings ? _.clone(wp.codeEditor.defaultSettings) : {};
			        editorSettings.codemirror = _.extend(
			            {},
			            editorSettings.codemirror,
			            {
			                indentUnit: 2,
			                tabSize: 2
			            }
			        );
			        var editor = wp.codeEditor.initialize('ea_hf_code_editor', editorSettings);
			    }
			    //
			    $('.snippet-deletion').on( 'click', function( e ) {
			    	if( confirm( 'Do you want to delete the snippet?' ) != true ) {
			    		e.preventDefault();
			    		return;
			    	}
			    } )
		    })(jQuery)
		</script>
		<?php
	}
	public static function snippetStatusField( $val = '' ) {

		$opts = [
			'active' => esc_html__( 'Active', 'enteraddons-pro' ),
			'inactive' => esc_html__( 'Inactive', 'enteraddons-pro' )
		];

		echo '<div class="snippet-field-group">
    		<label class="" id="title-prompt-text" for="title">'.esc_html__( 'Status', 'enteraddons-pro' ).'</label>
    		<select name="snippet_status">';
    			foreach( $opts as $key => $opt ) {
    				echo '<option '.selected( $val, $key, false ).' value="'.esc_attr( $key ).'">'.esc_html( $opt ).'</option>';
    			}
    		echo '</select>
    	</div>';

	}

	public static function snippetSnippetTypeField( $val = '' ) {

		$opts = [
			'html' => esc_html__( 'Html', 'enteraddons-pro' ),
			'css' => esc_html__( 'CSS', 'enteraddons-pro' ),
			'js' => esc_html__( 'jQuery/Java-scripts', 'enteraddons-pro' )
		];
		
		echo '<div class="snippet-field-group">
    		<label class="" id="title-prompt-text" for="title">'.esc_html__( 'Snippet Type', 'enteraddons-pro' ).'</label>
    		<select name="snippet_type">';
    			foreach( $opts as $key => $opt ) {
    				echo '<option '.selected( $val, $key, false ).' value="'.esc_attr( $key ).'">'.esc_html( $opt ).'</option>';
    			}
    		echo '</select>
    	</div>';

	}

	public static function snippetLocationField( $val = '' ) {

		$opts = [
			'header' => esc_html__( 'Header', 'enteraddons-pro' ),
			'footer' => esc_html__( 'Footer', 'enteraddons-pro' )
		];
		
		echo '<div class="snippet-field-group">
    		<label class="" id="title-prompt-text" for="title">'.esc_html__( 'Location', 'enteraddons-pro' ).'</label>
    		<select name="snippet_location">';
    			foreach( $opts as $key => $opt ) {
    				echo '<option '.selected( $val, $key, false ).' value="'.esc_attr( $key ).'">'.esc_html( $opt ).'</option>';
    			}
    	echo '</select> </div>';
	}

	public static function snippetDispalyOnField( $val = '' ) {

		$opts = [
			'entire-site' => esc_html__( 'Entire Site', 'enteraddons-pro' ),
			'posts' => esc_html__( 'Posts', 'enteraddons-pro' ),
			'pages' => esc_html__( 'Pages', 'enteraddons-pro' ),
			'home-page' => esc_html__( 'Home Page', 'enteraddons-pro' )
		];
		
		echo '<div class="snippet-field-group">
    		<label class="" id="title-prompt-text" for="title">'.esc_html__( 'Display On', 'enteraddons-pro' ).'</label>
    		<select name="snippet_display_on">';
    			foreach( $opts as $key => $opt ) {
    				echo '<option '.selected( $val, $key, false ).' value="'.esc_attr( $key ).'">'.esc_html( $opt ).'</option>';
    			}
    	echo '</select> </div>';
	}

	public static function snippetExcludePagesField( $val = '' ) {
		
		$opts = self::getPages();
		echo '<div class="snippet-field-group">
    		<label class="" id="title-prompt-text" for="title">'.esc_html__( 'Exclude Pages', 'enteraddons-pro' ).'</label>
    		<select name="snippet_exclude_pages[]" class="ea-multiple-select" multiple="multiple">';
    			foreach( $opts as $key => $opt ) {
    				$getSaveVal = maybe_unserialize( $val );
					$getVal = '';
	                if( is_array( $getSaveVal ) && in_array( $key , $getSaveVal ) ) {
	                  $getVal = $key;
	                }
    				echo '<option '.selected( $getVal, $key, false ).' value="'.esc_attr( $key ).'">'.esc_html( $opt ).'</option>';
    			}
    	echo '</select> </div>';
	}

	public static function snippetExcludePostsField( $val = '' ) {

		$opts = self::getPosts();
		
		echo '<div class="snippet-field-group">
    		<label class="" id="title-prompt-text" for="title">'.esc_html__( 'Exclude Posts', 'enteraddons-pro' ).'</label>
    		<select name="snippet_exclude_posts[]" class="ea-multiple-select" multiple="multiple">';
    			foreach( $opts as $key => $opt ) {
    				$getSaveVal = maybe_unserialize( $val );
					$getVal = '';
	                if( is_array( $getSaveVal ) && in_array( $key , $getSaveVal ) ) {
	                  $getVal = $key;
	                }
    				echo '<option '.selected( $getVal, $key, false ).' value="'.esc_attr( $key ).'">'.esc_html( $opt ).'</option>';
    			}
    	echo '</select> </div>';
	}

	public static function getPages() {
		$pages = \Enteraddons\Classes\Helper::getPages();
		$getPages = [];
		if( !empty( $pages ) ) {
			foreach( $pages as $page ) {
				$getPages[$page->ID] = $page->post_title;
			}
		}
		return $getPages;
	}
	public static function getPosts() {
		$posts = get_posts();
		$getPosts = [];
		if( !empty( $posts ) ) {
			foreach( $posts as $post ) {
				$getPosts[$post->ID] = $post->post_title;
			}
		}
		return $getPosts;
	}

}