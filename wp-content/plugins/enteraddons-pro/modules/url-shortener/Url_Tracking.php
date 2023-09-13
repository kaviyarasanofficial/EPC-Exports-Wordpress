<?php
namespace EnteraddonsPro\Modules;
/**
 * Enteraddons
 *
 * @package     EnterAddons Pro
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

class Url_Tracking {

	private const UT_TABLENAME = 'ea_url_tracking';

	private const BASE_URL = 'http://ip-api.com/json/';

	private const FIELDS = '?fields=status,message,continent,continentCode,country,countryCode,region,regionName,city,district,zip,lat,lon,timezone,offset,currency,isp,org,as,asname,reverse,mobile,proxy,hosting,query';

	private static $db;

	private static function ModulesDB() {
		return new Modules_DB( self::UT_TABLENAME );
	}

	public static function createDBTable() {
		$db = self::ModulesDB();
		// Example schema
		$schema = [
			'id mediumint(9) NOT NULL AUTO_INCREMENT',
			'shortener_id varchar(100) NOT NULL',
			'visitor_ip text NOT NULL',
			'visitor_country text NOT NULL',
			'visitor_timezone text NOT NULL',
			'device_info text NOT NULL',
			'browser text NOT NULL',
			'request_time text NOT NULL',
			'created_time datetime DEFAULT "0000-00-00 00:00:00" NOT NULL',
			'last_modified_time datetime DEFAULT "0000-00-00 00:00:00" NOT NULL',
			'PRIMARY KEY  (id)'
		];

		$db->createTable( $schema );
	}

	public static function insertVisitorData( $id ) {
		$db = self::ModulesDB();
		$info = self::getVisitorInfo();

		$data = [
			'shortener_id' 	=> absint( $id ),
			'visitor_ip' 	=> sanitize_text_field( $info['ip'] ),
			'visitor_country' => !empty( $info['country'] ) ? sanitize_text_field( $info['country'] ) : '',
			'visitor_timezone' => !empty( $info['timezone'] ) ? sanitize_text_field( $info['timezone'] ) : '',
			'device_info' 	  => sanitize_text_field( $info['device_info'] ),
			'browser'		  => sanitize_text_field( $info['browser'] ),
			'request_time'	  => sanitize_text_field( $info['request_time'] ),
			'created_time'	  => sanitize_text_field( current_time( 'mysql' ) ),
		];

		return $db->insertData( $data, ['%s','%s','%s','%s','%s','%s','%s','%s'] );

	}

	public static function getVisitorData( $id ) {
		$db = self::ModulesDB();
		return $db->getDataByMetaQuery([ 'query' => [ 'shortener_id' => $id ] ]);
	}
	public static function getVisitorInfo() {
		return self::serverRequestInfo();
	}

	private static function serverRequestInfo() {

		$getUserAgent = $_SERVER['HTTP_USER_AGENT'];
		$IP = self::getUserIpAddr();
		$serverInfo = [];

		// Get Device
		$DeviceStr 	=  strstr( $getUserAgent, '(' );
		$browser 	= self::browserName( $getUserAgent );
		$DeviceStr 	=  strstr( $DeviceStr, ')', true );

		$DeviceInfo = trim( $DeviceStr, '(');

		// Get location info
		
		$locationInfo = self::getLocationInfo($IP);

		$serverInfo['request_time'] = !empty( $_SERVER['REQUEST_TIME'] ) ? $_SERVER['REQUEST_TIME'] : '';
		$serverInfo['device_info'] = !empty( $DeviceInfo ) ? $DeviceInfo : '';
		$serverInfo['browser'] = !empty( $browser ) ? $browser : '';
		$serverInfo['ip'] = $IP;

		return array_merge( $serverInfo, $locationInfo );
	}

	private static function browserName( $user_agent ) {
	        // Make case insensitive.
	        $t = strtolower($user_agent);

	        // If the string *starts* with the string, strpos returns 0 (i.e., FALSE). Do a ghetto hack and start with a space.
	        // "[strpos()] may return Boolean FALSE, but may also return a non-Boolean value which evaluates to FALSE."
	        //     http://php.net/manual/en/function.strpos.php
	        $t = " " . $t;

	        // Humans / Regular Users     
	        if     (strpos($t, 'opera'     ) || strpos($t, 'opr/')     ) return 'Opera'            ;
	        elseif (strpos($t, 'edge'      )                           ) return 'Edge'             ;
	        elseif (strpos($t, 'chrome'    )                           ) return 'Chrome'           ;
	        elseif (strpos($t, 'safari'    )                           ) return 'Safari'           ;
	        elseif (strpos($t, 'firefox'   )                           ) return 'Firefox'          ;
	        elseif (strpos($t, 'msie'      ) || strpos($t, 'trident/7')) return 'Internet Explorer';

	        // Search Engines 
	        elseif (strpos($t, 'google'    )                           ) return '[Bot] Googlebot'   ;
	        elseif (strpos($t, 'bing'      )                           ) return '[Bot] Bingbot'     ;
	        elseif (strpos($t, 'slurp'     )                           ) return '[Bot] Yahoo! Slurp';
	        elseif (strpos($t, 'duckduckgo')                           ) return '[Bot] DuckDuckBot' ;
	        elseif (strpos($t, 'baidu'     )                           ) return '[Bot] Baidu'       ;
	        elseif (strpos($t, 'yandex'    )                           ) return '[Bot] Yandex'      ;
	        elseif (strpos($t, 'sogou'     )                           ) return '[Bot] Sogou'       ;
	        elseif (strpos($t, 'exabot'    )                           ) return '[Bot] Exabot'      ;
	        elseif (strpos($t, 'msn'       )                           ) return '[Bot] MSN'         ;

	        // Common Tools and Bots
	        elseif (strpos($t, 'mj12bot'   )                           ) return '[Bot] Majestic'     ;
	        elseif (strpos($t, 'ahrefs'    )                           ) return '[Bot] Ahrefs'       ;
	        elseif (strpos($t, 'semrush'   )                           ) return '[Bot] SEMRush'      ;
	        elseif (strpos($t, 'rogerbot'  ) || strpos($t, 'dotbot')   ) return '[Bot] Moz or OpenSiteExplorer';
	        elseif (strpos($t, 'frog'      ) || strpos($t, 'screaming')) return '[Bot] Screaming Frog';
	       
	        // Miscellaneous
	        elseif (strpos($t, 'facebook'  )                           ) return '[Bot] Facebook'     ;
	        elseif (strpos($t, 'pinterest' )                           ) return '[Bot] Pinterest'    ;
	       
	        // Check for strings commonly used in bot user agents  
	        elseif (strpos($t, 'crawler' ) || strpos($t, 'api'    ) ||
	                strpos($t, 'spider'  ) || strpos($t, 'http'   ) ||
	                strpos($t, 'bot'     ) || strpos($t, 'archive') ||
	                strpos($t, 'info'    ) || strpos($t, 'data'   )    ) return '[Bot] Other'   ;
	       
	        return 'Other (Unknown)';
	}

	private static function getUserIpAddr() {

	    if( !empty( $_SERVER['HTTP_CLIENT_IP'] ) ){
	        //ip from share internet
	        $ip = $_SERVER['HTTP_CLIENT_IP'];
	    }elseif( !empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ){
	        //ip pass from proxy
	        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    }else{
	        $ip = $_SERVER['REMOTE_ADDR'];
	    }

	    return $ip;
	}

	public static function getLocationInfo( $ip ) {

		$info = self::get_ip_location($ip);
		if( !empty( $info ) ) {
			return [ 'timezone' => $info['timezone'], 'country' => $info['country'] ];
		} else {
			return [];
		}

	}

	private static function get_ip_location( $ip ) {

		$url = self::BASE_URL.$ip.self::FIELDS;
		$location = wp_remote_get( $url, array(
	        'timeout'     => 120,
	        'httpversion' => '1.1',
    	) );

		if( ! is_wp_error( $location ) ) {
			$data = json_decode( $location['body'], true );

			if( !empty( $data['status'] ) &&  $data['status'] == 'success' ) {
				return $data;
			}
		}		
	}

}

