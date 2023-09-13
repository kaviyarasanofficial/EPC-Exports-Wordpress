<?php 
namespace EnteraddonsPro\Widgets\Marquee_Image\Traits;
/**
 * EnteraddonsPro Marquee Content template class
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
    $marqueeSettings = self:: marqueeSettings();
    ?>
      <div class="ea-marquee-body" data-marqueesettings ="<?php echo htmlspecialchars( $marqueeSettings, ENT_QUOTES, 'UTF-8'); ?>">
        <?php if( $settings['content_type'] == 'image' ) { ?>
          <div aria-hidden="true" class="ea-marquee">
            <div class="ea-marquee__group <?php echo esc_attr( $settings['content_direction'] ); ?>">
              <?php if( !empty( $settings['image_list'] ) ) {
                    foreach ( $settings['image_list'] as $item ) {
                    echo '<div class="ea-marquee-image">';
                        if( 'yes' == $settings['image_link_condition'] ) {
                          echo self::linkOpen( $item ); 
                      }
                      //
                      self::image( $item );
                      if( 'yes' == $settings['image_link_condition'] ) {
                          echo self::linkClose(); 
                      }
                    self::image_caption( $item );
                    echo '</div>';
                    }
                  } 
              ?>
            </div>
          </div>
          <?php } else { ?>
            <div class="ea-marquee">
              <div aria-hidden="true" class="ea-marquee__group <?php echo esc_attr( $settings['content_direction'] ); ?> ">
                <?php   if( !empty($settings['text_list'] )) {
                  foreach ( $settings['text_list'] as $item_text ) {
                      if( 'yes' == $settings['text_link_condition'] ) {
                        echo self::linkOpenText( $item_text ); 
                      }
                    echo '<div class="ea-marquee-text '.esc_attr( $settings['icon_position'] ).'">';
                        echo '<div class="ea-marquee-content-wrap">';
                          self::title( $item_text );
                          echo '<div class="ea-marquee-desc">';
                            self::descriptions( $item_text );
                          echo '</div>';
                        echo '</div>';
                      
                        self::icon( $item_text );
                    echo '</div>';
                      if( 'yes' == $settings['text_link_condition'] ) {
                        echo self::linkClose(); 
                      }
                    }
                  }
                ?>
              </div>
           </div>
        <?php  } ?>  
      </div>
    <?php
  }

}