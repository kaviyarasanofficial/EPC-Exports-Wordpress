<?php 
namespace EnteraddonsPro\Widgets\Advanced_Data_Table\Traits;
/**
 * Enteraddons template class
 *
 * @package     Enteraddons
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

trait Templates_Components {
	
    // Set Settings options
    protected static function getSettings() {
        return self::getDisplaySettings();
    }

    //Table  Option
    public static function tableSettings() {

        $settings = self::getDisplaySettings();
        $tableSettings = [ 
            'paging'          => !empty( $settings['show_pagination'] ) && $settings['show_pagination'] == 'yes' ? true : false,
            'searching'       => !empty( $settings['show_searchbar'] ) && $settings['show_searchbar'] == 'yes' ? true : false,
            'ordering'        => !empty( $settings['data_ordering'] ) && $settings['data_ordering'] == 'yes' ? true : false,
            'bInfo'           => !empty( $settings['table_info'] ) && $settings['table_info'] == 'yes' ? true : false,
        ];

        return json_encode( $tableSettings );
    }

    // Header 
    public static function header( $item ) {
        
        if (!empty( $item['dp_heading_text'] ) ) {
            echo "<th>";
                echo  esc_html( $item['dp_heading_text']);
            echo "</th>"; 
        }
    }

    // Table Content 
    public static function Content( $item ) {
        
        if( !empty( $item['content_title'] ) ) {
            echo "<td>";  
                echo esc_html( $item['content_title'] );
            echo "</td>";
        }
    }   
}