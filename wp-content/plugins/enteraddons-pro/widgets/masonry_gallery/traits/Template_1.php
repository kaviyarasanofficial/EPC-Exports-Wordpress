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

trait Template_1 {
	
	public static function markup_style_1() {
        $settings   = self::getSettings();
        $gallerysettings = self:: gallerysettings();
		?>
            <div class="enteraddons-gallery-filter toolbar mb2 mt2">
                <div class="ea-btn fil-cat filter active" href=""  data-filter="*">All</div>
                    <?php
                        $getGallery_Image = [];
                        if( !empty ( $settings['filter_btn_settings'] ) ):
                        foreach( $settings['filter_btn_settings'] as $masonary_image ):
                            $tabTitle = sanitize_title( $masonary_image['filter_btn_title'] );
                        $getGallery_Image[$tabTitle] = $masonary_image['gallery_image'];
                    ?>
                <div class="ea-btn fil-cat filter" data-filter=".<?php echo esc_attr( $tabTitle ); ?>">
                    <?php self::Title( $masonary_image); ?>
                </div>
                    <?php endforeach; endif; ?>
            </div> 

            <div class="ea-grid" data-gallerysettings="<?php echo htmlspecialchars( $gallerysettings, ENT_QUOTES, 'UTF-8'); ?>"> 
                <?php if( !empty ( $getGallery_Image ) ):
                    foreach( $getGallery_Image as $key => $gallery_image ):       
                    foreach( $gallery_image as $img ):
                ?>
                    <div class="gutter-sizer"></div>
                    <div class="grid-sizer"></div>
                    <div class="ea-grid-item  scale-anm <?php echo esc_attr( $key ); ?>" >
                        <?php self::gallery($img); ?> 
                    </div>
                <?php endforeach; endforeach; endif; ?>
            </div>
            
		<?php
	}

}

