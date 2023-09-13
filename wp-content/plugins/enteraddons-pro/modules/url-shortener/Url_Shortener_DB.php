<?php
namespace EnteraddonsPro\Modules;
/**
 * Enteraddons Url_Shortener_DB class
 *
 * @package     EnterAddons Pro
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

class Url_Shortener_DB {

	private const URLS_TABLENAME = 'ea_url_shortener';

	private static function ModulesDB() {
		return new Modules_DB( self::URLS_TABLENAME );
	}
	
	public static function createTable() {
		$db = self::ModulesDB();
		// Example schema
		$schema = [
			'id mediumint(9) NOT NULL AUTO_INCREMENT',
			'title varchar(100) NOT NULL',
			'slug text NOT NULL',
			'shortable_type text NOT NULL',
			'shortable_url text NOT NULL',
			'other_short_urls text NOT NULL',
			'description text NOT NULL',
			'redirect_type varchar(100) NOT NULL',
			'created_by text NOT NULL',
			'created_time datetime DEFAULT "0000-00-00 00:00:00" NOT NULL',
			'last_modified_time datetime DEFAULT "0000-00-00 00:00:00" NOT NULL',
			'PRIMARY KEY  (id)'
		];

		$db->createTable( $schema );
	}

	public static function insertData( array $valus ) {

		$defaults = [
			'title' 			=> '',
			'slug' 				=> '',
			'shortable_type'	=> '',
			'shortable_url'		=> '',
			'other_short_urls' 	=> '',
			'description' 		=> '',
			'redirect_type' 	=> '',
			'created_by' 		=> ''
		];

		$data = wp_parse_args( $valus, $defaults );
		
		$data = [
			'title' 		=> $data['title'],
			'slug' 		=> $data['slug'], 
			'shortable_type' 	=> $data['shortable_type'], 
			'shortable_url' 	=> $data['shortable_url'], 
			'other_short_urls' 	=> $data['other_short_urls'], 
			'description' 		=> $data['description'], 
			'redirect_type' 	=> $data['redirect_type'],
			'created_by' 	=> get_current_user_id(),
			'created_time' 	=> current_time( 'mysql' ),
		];
		$db = self::ModulesDB();
		return $db->insertData( $data, ['%s','%s','%s','%s','%s','%s','%s','%s', '%s'] );

	}

	public static function updateData( $id, $key, $value ) {
		$db = self::ModulesDB();
		$db->updateData( $id, $key, $value );
	}

	public static function getAllData( $args = [] ) {
		$db = self::ModulesDB();
		return $db->getAllData($args);
	}

	public static function getDataById( $id ) {
		$db = self::ModulesDB();
		return $db->getDataById($id);
	}

	public static function deleteItemById( $id ) {
		$db = self::ModulesDB();
		return $db->deleteItemById($id);
	}

	public static function getAllDataByMeta( $metaQuery ) {

		// Example Data Set
		/*$metaQuery = [
			'relation' => 'AND',
			'query' => [
				'status' => 'active',
				'location' => 'footer'
			]
		];*/

		$db = self::ModulesDB();
		return $db->getDataByMetaQuery($metaQuery);
	}

	public static function getDataByMeta( $key, $value ) {
		$db = self::ModulesDB();
		return $db->getDataByMeta( $key, $value );
	}

}