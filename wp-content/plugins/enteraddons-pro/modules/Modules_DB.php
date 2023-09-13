<?php
namespace EnteraddonsPro\Modules;
/**
 * Enteraddons Modules_DB class
 *
 * @package     EnterAddons Pro
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

class Modules_DB {

	private $tableName;
	private $schema;

	function __construct( $tableName ) {
		$this->tableName = $tableName;
	}

	private function wpdb() {
		global $wpdb;
		return $wpdb;
	}
	private function getTableName() {
		return $this->wpdb()->prefix.$this->tableName;
	}
	public function createTable( $schema ) {
		$this->schema = $schema;
		$this->DbTableMaping();
	}
	private function DbTableMaping() {

		$table_name = $this->getTableName();
		$charset_collate = $this->wpdb()->get_charset_collate();

		/*// Example schema
		$schema = [
			'title varchar(100) NOT NULL',
			'slug text NOT NULL',
			'shortable_url text NOT NULL',
			'created_time datetime DEFAULT "0000-00-00 00:00:00" NOT NULL',
		];*/

		$getS = implode( ',', $this->schema );

		$sql = "CREATE TABLE $table_name (
		  $getS
		) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
	}

	public function insertData( $data, $format ) {

		$table_name = $this->getTableName();
		$wpdb = $this->wpdb();
		$wpdb->insert(
			$table_name, 
			$data,
			$format
		);

		if( !$wpdb->last_error ) {
			return $wpdb->insert_id;
		} else {
			return 'error';
		}
	}

	public function updateData( $id, $key, $value, $format = '%s' ) {
		$table_name = $this->getTableName();
		$data = [ $key 	=> $value ];
		$where = [ 'id' => $id ];
		return $this->wpdb()->update( $table_name, $data, $where , [$format] );
	}

	public function getAllData( $args = [] ) {
		$table_name = $this->getTableName();
		// DESC | ASC
		
		$default = [
			'limit' => 10,
			'pagination' => false,
			'paged'  => '',
			'order_by' => ''
		];

		$a = wp_parse_args( $args, $default );
		$limit = $a['limit'];

		// Pagination 
		$offset = $orderBy = $max_page = '';

		//
		if( !empty( $a['pagination'] ) ) {
			$max_page = $this->paginationQuery( $limit );
			//
			if( !empty( $a['paged'] ) && $a['paged'] <= $max_page ) {
				$offsetNumber = ($a['paged']-1) * $limit;
				$offset = 'OFFSET '.esc_html( $offsetNumber );
			}
			
		}
		//
		if( !empty( $a['order_by'] ) ) {
			$orderBy = 'ORDER BY '.$a['order_by'].' DESC';
		}

		$result = $this->wpdb()->get_results( "SELECT * FROM {$table_name} {$orderBy} LIMIT {$limit} {$offset}", ARRAY_A );
		if( !$this->wpdb()->last_error ) {
			return [ 'max_page' => $max_page, 'data' => $result ];
		} else {
			return;
		}

	}

	public function getDataById( $id ) {
		$table_name = $this->getTableName();
		return $this->wpdb()->get_row( $this->wpdb()->prepare( "SELECT * FROM {$table_name} WHERE id = %d", $id ) );
	}

	public function deleteItemById( $id ) {
		$table_name = $this->getTableName();
		return $this->wpdb()->delete( $table_name, ['id' => $id ],['%d'] );
	}

	public function getDataByMetaQuery( $metaQuery ) {
		$table_name = $this->getTableName();

		// Example Data Set
		/*$metaQuery = [
			'relation' => 'AND',
			'query' => [
				'status' => 'active',
				'location' => 'footer'
			]
		];*/

		$placeHolderVal = array_values( $metaQuery['query'] );
		$m = $metaQuery['query'];
		array_walk( $m, function( &$value, $key ) {
		 	$value = $key.'=%s';
		});

		$relation = !empty( $metaQuery['relation'] ) ? $metaQuery['relation'] : '';

		$query = implode( " {$relation} ", $m );

		return $this->wpdb()->get_results( $this->wpdb()->prepare( "SELECT * FROM {$table_name} WHERE {$query}", $placeHolderVal ), ARRAY_A );
	}
	public function getDataByMeta( $key, $value ) {
		$table_name = $this->getTableName();
		return $this->wpdb()->get_row( $this->wpdb()->prepare( "SELECT * FROM {$table_name} WHERE $key=%s", $value ), ARRAY_A );
	}

	private function paginationQuery( $per_page ) {
		$table_name = $this->getTableName();
		$sql_posts_total = $this->wpdb()->get_var( "SELECT COUNT(*) FROM {$table_name}" );
    	return ceil($sql_posts_total / $per_page);
	}
}