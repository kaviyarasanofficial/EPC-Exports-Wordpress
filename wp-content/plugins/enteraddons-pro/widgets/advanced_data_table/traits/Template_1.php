<?php 
namespace EnteraddonsPro\Widgets\Advanced_Data_Table\Traits;
/**
 * Enteraddons Advanced Data Table template class
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
        $TableSettings = self::tableSettings();
		?>
        <div class="ea-adt-data-table-wrapper">
            <button class="ea-adt-btn <?php echo esc_attr( $settings['enable_export_button'] ); ?>"><?php esc_html_e( 'Export to Excel', 'enteraddons-pro' ); ?></button>
            <table class="ea-adt-data-table nowrap" style="width: 100%;" data-tablesettings="<?php echo htmlspecialchars( $TableSettings, ENT_QUOTES, 'UTF-8'); ?>">
                <thead>
                    <tr>
                        <?php
                        if ( !empty( $settings['heading_content_repetable'] ) ) {
                            foreach( $settings['heading_content_repetable'] as $item ) {
                                self::header( $item );                                  
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
                                self:: Content( $item );
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