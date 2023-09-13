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

trait Template_2 {
	
	public static function markup_style_2() {
		$settings = self::getSettings();
        $TableSettings = self::tableSettings();

        // Get Google Sheet Content
        $base_link = 'https://sheets.googleapis.com/v4/spreadsheets/';
        $sheet_id  = esc_html( $settings['google_sheet_id'] );
        $Api_key   = esc_html( $settings['google_api_key'] );
        $range     = esc_html( $settings['google_sheet_range'] );
        $sheet_url = $base_link. $sheet_id .'/values/'. $range . '?key='. $Api_key;

        // Error Check 
        $error_check  = [];
        if( empty( $Api_key ) ) {
            $error_check[] = esc_html__( 'Add Google Api Key','enteraddons-pro' );  
        } elseif ( empty( $sheet_id ) ) {
            $error_check[] = esc_html__( 'Add Google Sheet ID','enteraddons-pro' );
        } elseif ( empty( $range ) ) {
            $error_check[] = esc_html__( 'Add Google Sheet Range','enteraddons-pro' );
        }
        if( !empty( $error_check ) ) {
           return printf ( '<div class="ea-adt-error-check">%s</div>',$error_check[0] );
        }

        $id = self::getWidgetObject()->get_id();
        $transient_key = $id .'_adt_cash';
        $responseBody = get_transient( $transient_key );
        
        // Get Data from google sheet
        if( false === $responseBody ) {
            $Content = wp_remote_get( $sheet_url );
            $responseBody = json_decode( wp_remote_retrieve_body( $Content ), true );
            set_transient( $transient_key, $responseBody, 0 );
        }
        if ( $settings['ea_remove_cash'] == 'yes' ) {
			delete_transient( $transient_key );
		}
        if ( is_array( $responseBody ) && ! is_wp_error( $responseBody ) ) {
            $table_header = $responseBody['values'][0];
            $table_content = array_splice($responseBody['values'], 1, count( $responseBody['values'] ) );
        } 
		?>
        <div class="ea-adt-data-table-wrapper">
            <button class="ea-adt-btn <?php echo esc_attr( $settings['enable_export_button'] ); ?>"><?php esc_html_e( 'Export to Excel', 'enteraddons-pro' ); ?></button>
            <table class="ea-adt-data-table" style="width: 100%;" data-tablesettings="<?php echo htmlspecialchars( $TableSettings, ENT_QUOTES, 'UTF-8'); ?>">
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
                            foreach( $table_content as $item => $content ) {
                                echo "<tr>";
                                    for ( $i = 0; $i < count( $table_header ); $i++ ) {
                                        $cellData = !empty( $content[$i] ) ? $content[$i] : '';
                                        echo '<td>'.esc_html($cellData).'</td>';
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