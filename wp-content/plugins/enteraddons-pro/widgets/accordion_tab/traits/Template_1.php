<?php 
namespace EnteraddonsPro\Widgets\Accordion_Tab\Traits;
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
        $settings = self::getSettings();

        ?>
            <!-- Business Case Study -->
            <div class="enteraddons-wid-con-at at-bg-overlay after-opacity-9">
                <div class="ea-at-container">
                    <div class="enteraddons-grid-row">
                        <div class="ea-grid-left">
                            <!-- Case Study Nav -->
                            <ul class="list-unstyled">
                                <?php 
                                     $i= 1;
                                    if( !empty( $settings['enteraddons_accordion_tab'] ) ):
                                    foreach( $settings['enteraddons_accordion_tab'] as $accordion_tab ):
                                ?>
                                    <li class="enteraddons-single-faq style--two <?php if( $i == 1 ){echo esc_attr( 'active' );} ?>" data-accordion-tab="toggle"
                                        data-tab-select="edonsSingleCase<?php echo esc_attr( $i ); ?>">
                                        <h3 class="enteraddons-faq-title ea-nunito"> 
                                            <?php if( !empty( $accordion_tab['enteraddons_accordion_count_number'] || $accordion_tab['enteraddons_accordion_icon'] )): ?>
                                            <span
                                                class="faq-count mont">
                                                    <?php 
                                                    echo esc_html( $accordion_tab['enteraddons_accordion_count_number'] );
                                                     self::count_icon($accordion_tab);
                                                    ?>
                                            </span>
                                                <?php endif; echo esc_html( $accordion_tab['enteraddons_accordion_tab_title'] ); ?>
                                        </h3>
                
                                        <div class="enteraddons-faq-content ea-nunito" >
                                            <?php self::description( $accordion_tab ); ?>
                                        </div>
                                    </li>

                                <?php $i++; endforeach; endif; ?>
                            </ul>
                            <!-- End Case Study Nav -->
                        </div>
            
                        <div class="grid-right">
                            <?php 
                                 $j= 1;
                                if( !empty( $settings['enteraddons_accordion_tab_image'] ) ):
                                foreach( $settings['enteraddons_accordion_tab_image'] as $accordion_image ):
                                ?>
                                    <!-- Single Case Studies -->
                                    <div data-tab="edonsSingleCase<?php echo esc_attr( $j ); ?>" class="enteraddons-card <?php if( $j == 1 ){echo esc_attr( 'active' );} ?>">
                                        <!-- Image -->
                                        <?php 
                                            echo self::linkOpen($accordion_image); 
                                            self::image( $accordion_image );
                                            echo self::linkClose(); 
                                            
                                         ?>
                                        <!-- End Image -->
                                        <!-- Content -->
                                        <div class="at-card-body at-media at-align-items-center">
                                            <div class="at-media-body">
                                                <h5 class="ea-nunito">
                                                    <?php echo esc_html( $accordion_image['enteraddons_accordion_tab_card_title'] );?>
                                                </h5>
                                            </div>
                    
                                            <!-- Button -->
                                            <?php 
                                                echo self::button_linkOpen($accordion_image); 
                                                echo esc_html( $accordion_image['enteraddons_accordion_tab_Button_title'] );
                                                echo self::linkClose(); 
                                            ?>
                                            <!-- End Button -->
                                        </div>
                                        <!-- End Content -->
                                    </div>
                                    <!-- End Single Case Studies -->
                                <?php $j++; endforeach; endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Business Case Study -->
        <?php
    }
    
}