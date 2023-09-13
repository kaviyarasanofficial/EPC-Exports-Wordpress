<?php 
namespace EnteraddonsPro\Widgets\Comparison_Table\Traits;
/**
 * Enteraddons Comparison Table template class
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
            <div class="ea-ct-table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <?php
                                if ( !empty( $settings['dp_heading_content_repetable'] ) ) {
                                    foreach( $settings['dp_heading_content_repetable'] as $item ) {
                                        echo "<th><div class='ea-ct-heading-content'>";
                                            self::badge( $item );
                                            self::header( $item );  
                                            self::price( $item ); 
                                        echo "</div></th>";                                
                                    }                                 
                                }   
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ( !empty( $settings['tbody_list'] ) ) {
                                echo "<tr>";
                                foreach( $settings['tbody_list'] as $item) {
                                    if ( $item['tbody_content_condition'] == 'contents' ) {
                                        self:: Content( $item );
                                        } elseif ($item['tbody_content_condition'] == 'btn') {
                                            self::button( $item );
                                        } 
                                    if ( $item['tbody_condition'] == 'row' ) {
                                        echo "</tr>";
                                    }
                                }
                            }
                        ?>
                    </tbody>
                    
                </table>
            </div>
		<?php
	}

}