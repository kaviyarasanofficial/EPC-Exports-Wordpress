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

trait Template_3 {
	
	public static function markup_style_3() {
		$settings = self::getSettings();
        $TableSettings = self::tableSettings();

        if ( empty ( $settings['import_table_data'] ) ) {
            return printf ( '<div class="ea-adt-error-check">%s</div>',esc_html__('Paste Table Data in CSV formate','enteraddons-pro') );
        }

        $Content = explode( "\n", $settings['import_table_data'] );
        $table_content = array_map( function( $x ) {
            return str_getcsv( $x );
        }, $Content );

		$table_header = array_shift( $table_content );
        ?> 
        <div class="ea-adt-data-table-wrapper">
            <button class="ea-adt-btn <?php echo esc_attr( $settings['enable_export_button'] ); ?>"<?php esc_html_e( 'Export to Excel', 'enteraddons-pro' ); ?></button>
            <table class="ea-adt-data-table"  data-tablesettings="<?php echo htmlspecialchars( $TableSettings, ENT_QUOTES, 'UTF-8'); ?>">
                <thead>
                    <tr>
                        <?php
                            if( !empty( $table_header ) ) {
                                foreach( $table_header as $header ) {
                                    echo  '<th>'.esc_html( $header ).'</th>';                               
                                }
                            }                                 
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if( !empty( $table_content ) ) {                 
                            foreach( $table_content as  $content ) {
                                echo "<tr>";
                                    foreach ( $content as $row ) {
                                        echo '<td>'.esc_html($row).'</td>';
                                    } 
                                echo "</tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
		<?php
	}
}