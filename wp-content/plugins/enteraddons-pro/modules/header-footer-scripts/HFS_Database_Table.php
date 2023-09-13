<?php
namespace EnteraddonsPro\Modules;
/**
 * Enteraddons HHF_Database_Table class
 *
 * @package     EnterAddons Pro
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

class HFS_Database_Table {

	private const SNAPPETS_TABLENAME = 'hfs_snippets';

	private static function ModulesDB() {
		return new Modules_DB( self::SNAPPETS_TABLENAME );
	}

	public static function createTable() {

		$db = self::ModulesDB();

		$schema = [
			"id mediumint(9) NOT NULL AUTO_INCREMENT",
			"title varchar(100) NOT NULL",
			"status text NOT NULL",
			"snippet_type text NOT NULL",
			"snippets LONGTEXT",
			"location text DEFAULT '' NOT NULL",
			"display_on text DEFAULT '' NOT NULL",
			"exclude_pages LONGTEXT DEFAULT '' NOT NULL",
			"exclude_posts LONGTEXT DEFAULT '' NOT NULL",
			"created_by text NOT NULL",
			"created_time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL",
			"last_modified_time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL",
			"PRIMARY KEY  (id)"
		];

		$db->createTable( $schema );
	}

	public static function insertData( array $valus ) {
		
		$defaults = [
			'title' => '',
			'status' => '',
			'snippet_type' => '',
			'snippets' => '',
			'location' => '',
			'display_on' => '',
			'exclude_pages' => '',
			'exclude_posts' => ''
		];

		$data = wp_parse_args( $valus, $defaults );
		$data = array(
				
				'title' 		=> $data['title'],
				'status' 		=> $data['status'], 
				'snippet_type' 	=> $data['snippet_type'], 
				'snippets' 		=> $data['snippets'], 
				'location' 		=> $data['location'], 
				'display_on' 	=> $data['display_on'], 
				'exclude_pages' => $data['exclude_pages'], 
				'exclude_posts' => $data['exclude_posts'], 
				'created_by' 	=> get_current_user_id(),
				'created_time' 	=> current_time( 'mysql' ),
			);
		
		$db = self::ModulesDB();
		return $db->insertData( $data, ['%s','%s','%s','%s','%s','%s','%s','%s', '%s','%s'] );

	}

	public static function updateData( $id, $key, $value ) {
		$db = self::ModulesDB();
		$db->updateData( $id, $key, $value );
	}

	public static function getAllData( $args ) {
		$db = self::ModulesDB();
		return $db->getAllData( $args );
	}

	public static function getDataById( $snippetId ) {
		$db = self::ModulesDB();
		return $db->getDataById($snippetId);
	}

	public static function deleteItemById( $snippetId ) {
		$db = self::ModulesDB();
		return $db->deleteItemById($snippetId);
	}

	public static function getAllDataByMeta( $metaQuery ) {
		$db = self::ModulesDB();
		return $db->getDataByMetaQuery($metaQuery);

	}
	
	public static function getDataByMeta( $key, $value ) {
		$db = self::ModulesDB();
		return $db->getDataByMeta( $key, $value );
	}

}