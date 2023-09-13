<?php 
namespace EnteraddonsPro\Widgets\Team_Carousel\Traits;
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
        $settings       = self::getDisplaySettings();
        $sliderSettings = self::carouselSettings();
		?>
            <div class="enteraddons-team-carousel enteraddons-slider owl-carousel dots-style--one" data-slidersettings="<?php echo htmlspecialchars( $sliderSettings, ENT_QUOTES, 'UTF-8'); ?>">
                <?php if( $settings['team_carousel_list'] ):
                    foreach( $settings['team_carousel_list'] as $team_item ):
                ?>
                    <div class="enteraddons-wid-con">
                        <div class="enteraddons-single-team-carousel">
                            <div class="enteraddons-team-carousel-image mb-0">
                                <?php
                                // Image
                                self::image( $team_item );                    
                                ?>
                            </div>
                            <div class="enteraddons-team-carousel-content">
                                <?php
                                // experience
                                self::experience( $team_item );
                                // Name
                                self::name( $team_item );
                                // Designation
                                self::designation( $team_item );
                                // descriptions
                                self::descriptions( $team_item );
                                // Social Icon
                                ?>
                                <div class="enteraddons-team-carousel-social-icon">
                                    <?php
                                    self::socialIcons1( $team_item );
                                    self::socialIcons2( $team_item );
                                    self::socialIcons3( $team_item );
                                    self::socialIcons4( $team_item );
                                    self::socialIcons5( $team_item );
                                    self::socialIcons6( $team_item );
                                    self::socialIcons7( $team_item );
                                    ?>
                               </div>
                                <?php 
                                // Link
                                self::link( $team_item );
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; endif; ?>
            </div>
		<?php
	}

}