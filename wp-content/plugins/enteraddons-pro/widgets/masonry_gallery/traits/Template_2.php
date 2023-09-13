<?php 
namespace EnteraddonsPro\Widgets\Masonry_Gallery\Traits;
/**
 * Enteraddons team template class
 *
 * @package     Enteraddons
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

trait Template_2 {
	
	public static function markup_style_2() {
        $settings   = self::getSettings();
		?>
            <div class="ea-masonry-grid">
                <?php if( !empty ( $settings['masonary_gallery_settings'] ) ):
                    foreach( $settings['masonary_gallery_settings'] as $masonary_gallery_image ):       
                ?>
                    <div class="ea-masonry-grid-item">
                            <div class="overlay align-items-center justify-content-center">
                                    <div class="overlay-inner text-center"> 
                                        <?php
                                            self::image( $masonary_gallery_image );
                                         ?>
                                        <div class="content">
                                            <?php 
                                            self::image_title( $masonary_gallery_image );
                                            self::imageDescription( $masonary_gallery_image );
                                            if( $settings['show_button'] == 'yes' ) {
                                            echo self::linkOpen( $masonary_gallery_image );
                                            self::button( $masonary_gallery_image );
                                            echo self::icon( $masonary_gallery_image );
                                            echo self::linkClose();
                                            }
                                            ?>  
                                        </div>
                                    </div>
                            </div>
                    </div>
                <?php endforeach; endif; ?>   
            </div>    
		<?php
	}

}


