<?php
namespace EnteraddonsPro\Modules;
/**
 * Enteraddons Modules Utility class
 *
 * @package     EnterAddons Pro
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

class Modules_Utility {

	public static function customModulePagination( $maxPage ) {

		$p = explode('&', $_SERVER['QUERY_STRING'] );
		$link = add_query_arg( $p[0], '', admin_url( '/admin.php' ) );
		?>
		<div class="ea-custom-pagination tablenav bottom">
        	<ul class="tablenav-pages">
            <?php 
            if( !empty( $maxPage ) && $maxPage > 1 ) {
               for( $i = 1; $i <= $maxPage; $i++ ) {
               	
               	$current = !empty( $_GET['paged'] ) && $_GET['paged'] == $i || ( empty( $_GET['paged'] ) && $i < 2 ) ? 'active' : '';
                echo '<li class="pagination-item next-page button '.esc_attr( $current ).'"><a href="'.esc_url( $link.'&paged='.esc_attr( $i ) ).'">'.esc_html( $i ).'</a></li>';
               }
            }
            ?>
        	</ul>
    	</div>
		<?php

	}

   public static function getPagePermalinkInArray() {
      $pages = get_pages();
      $getList = [];
      if( !empty( $pages ) ) {
         foreach( $pages as $page ) {
            $url = get_the_permalink( $page->ID );
            $getList[$url] = $page->post_title;
         }
      }
      return $getList;
   }

   public static function getPostPermalinkInArray() {
      $posts = get_posts();
      $getList = [];
      if( !empty( $posts ) ) {
         foreach( $posts as $post ) {
            $url = get_the_permalink( $post->ID );
            $getList[$url] = $post->post_title;
         }
      }
      return $getList;
   }

}