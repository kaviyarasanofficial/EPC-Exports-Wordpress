<?php
/**
 * Plugin Name:       Enter Addons Pro
 * Plugin URI:        https://themelooks.org/demo/enteraddons
 * Description:       Preferred Addons For Elementor And WordPress
 * Version:           1.0.4
 * Author:            ThemeLooks
 * Author URI:        https://themelooks.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       enteraddons-pro
 * Domain Path:       /languages
 *
 */

/**
 * Define all constant
 *
 */

// Version constant
if( !defined( 'ENTERADDONSPRO_VERSION' ) ) {
	define( 'ENTERADDONSPRO_VERSION', '1.0.4' );
}
// Dynamic Version constant
if( !defined( 'ENTERADDONSPRO_DYNAMIC_VERSION' ) ) {
	define( 'ENTERADDONSPRO_DYNAMIC_VERSION', time() );
}
// Version Type constant ( PRO, LITE )
if( !defined( 'ENTERADDONSPRO_VERSION_TYPE' ) ) {
	define( 'ENTERADDONSPRO_VERSION_TYPE', 'PRO' );
}
// Version plugin mode constant ( PRODUCTION, DEV )
if( !defined( 'ENTERADDONSPRO_PLUGIN_MODE' ) ) {
	define( 'ENTERADDONSPRO_PLUGIN_MODE', 'PRODUCTION' );
}

// Dir FILE
if( !defined( 'ENTERADDONSPRO_FILE' ) ) {
	define( 'ENTERADDONSPRO_FILE', __FILE__ );
}
// Plugin dir path constant
if( !defined( 'ENTERADDONSPRO_DIR_PATH' ) ) {
	define( 'ENTERADDONSPRO_DIR_PATH', trailingslashit( plugin_dir_path( ENTERADDONSPRO_FILE ) ) );
}
// Plugin dir url constant
if( !defined( 'ENTERADDONSPRO_DIR_URL' ) ) {
	define( 'ENTERADDONSPRO_DIR_URL', trailingslashit( plugin_dir_url( ENTERADDONSPRO_FILE ) ) );
}
// Admin dir path
if( !defined( 'ENTERADDONSPRO_DIR_ADMIN' ) ) {
	define( 'ENTERADDONSPRO_DIR_ADMIN', trailingslashit( ENTERADDONSPRO_DIR_PATH.'admin' ) );
}

// Inc dir path
if( !defined( 'ENTERADDONSPRO_DIR_INC' ) ) {
	define( 'ENTERADDONSPRO_DIR_INC', trailingslashit( ENTERADDONSPRO_DIR_PATH.'inc' ) );
}
// Widgets dir path
if( !defined( 'ENTERADDONSPRO_DIR_WIDGETS' ) ) {
	define( 'ENTERADDONSPRO_DIR_WIDGETS', trailingslashit( ENTERADDONSPRO_DIR_PATH.'widgets' ) );
}
// Assets dir url
if( !defined( 'ENTERADDONSPRO_DIR_ASSETS_URL' ) ) {
	define( 'ENTERADDONSPRO_DIR_ASSETS_URL', trailingslashit( ENTERADDONSPRO_DIR_URL.'assets' ) );
}

// Widgets dir url
if( !defined( 'ENTERADDONSPRO_DIR_WIDGETS_URL' ) ) {
	define( 'ENTERADDONSPRO_DIR_WIDGETS_URL', trailingslashit( ENTERADDONSPRO_DIR_URL.'widgets' ) );
}

// Include autoloader
require_once( ENTERADDONSPRO_DIR_PATH.'vendor/autoload.php' );
require_once( ENTERADDONSPRO_DIR_PATH.'EnteraddonsBase.php' );

/**
 * Enteraddons Final Class
 * 
 */
final class Enteraddons_PRO {

	private static $instance = null;

	private function __construct() {
		if( self::is_enteraddons_active() == 'active' ) {
			add_action( 'plugins_loaded', [$this, 'initTask'] );
		} else {
			add_action( 'admin_notices', [ __CLASS__, 'adminNotice' ] );
		}
		//
		register_activation_hook( __FILE__, [ __CLASS__, 'installationTask'] );
	}

	public static function getInstance() {
		if( is_null( self::$instance ) ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	public function initTask() {
		$is_active = get_option(ENTERADDONS_OPTION_KEY);
		$extensions = !empty( $is_active['extensions'] ) ? $is_active['extensions'] : [];
		$c = 'continue';
		EnteraddonsPro\Inc\Hooks::hooks();

		if( \EnteraddonsPro\Inc\Helper::$c() ) {

			foreach( \EnteraddonsPro\Inc\Helper::taskflag() as $val ) {

				if( !empty( $val['condition'] ) ) {

					if( in_array( $val['condition'] , $extensions ) ) {
						$name = $val['name'];
						new $name();
					}

				} else {
					$name = $val['name'];
					new $name();
				}

			}

		}
	}

	public static function adminNotice() {
		$is_active = self::is_enteraddons_active();
		$btn = self::enteraddons_installation_button();
		if( $is_active != 'active' ):

			if( $is_active == 'notinstalled' ) {
				$getBtn = $btn['install'];
			} else {
				$getBtn = $btn['active'];
			}
		?>
		<div class="notice notice-warning is-dismissible" style="padding-bottom: 15px;background: #ffe2e6;">
			<?php
			printf( '<p style="padding: 13px 0"><strong style="font-size: 20px;">EnterAddons Pro </strong> %1$s <strong>EnterAddons</strong> %2$s</p>', esc_html__( 'requires', 'enteraddons-pro' ), esc_html__( 'to be installed and activated to work properly.', 'enteraddons-pro' ) );

			echo '<a href="'.esc_url( $getBtn['url'] ).'" class="btn s-btn">'.esc_html( $getBtn['label'] ).'</a>';
			?>
		</div>
		<?php
		endif;
	}

	/**
	 * [enteraddons_check_elementor description]
	 * @return string
	 * 
	 */
	public static function is_enteraddons_active() {
		$path = 'enteraddons/enteraddons.php';
		$enteraddonsFile = WP_PLUGIN_DIR.'/'.$path;
		$activatedPlugin = get_option('active_plugins');
		$is_file_exists = file_exists( $enteraddonsFile );

		if( ! $is_file_exists ) {
			$has_enteraddons = 'notinstalled';
		} else if(  $is_file_exists &&  !in_array( $path, $activatedPlugin) ) {
			$has_enteraddons = 'deactive';
		} else {
			$has_enteraddons = 'active';
		}
		return $has_enteraddons;
	}

	/**
	 * [enteraddons_installation_button description]
	 * @return array
	 * 
	 */
	private static function enteraddons_installation_button() {
		
		return [
			'install' => [
				'url'   => wp_nonce_url( 'update.php?action=install-plugin&plugin=enteraddons', 'install-plugin_enteraddons'),
				'label' => esc_html__( 'Install EnterAddons', 'enteraddons-pro' )
			],
			'active' => [
				'url'   => wp_nonce_url( 'plugins.php?action=activate&plugin=enteraddons/enteraddons.php&plugin_status=all&paged=1', 'activate-plugin_enteraddons/enteraddons.php' ),
				'label' => esc_html__( 'Activate EnterAddons', 'enteraddons-pro' )
			]
		];
	}
	
	/**
	 * [installationTask description]
	 * @return [type] [description]
	 */
	public static function installationTask() {
		// Create Database Table for header footer scripts
		\EnteraddonsPro\Modules\HFS_Database_Table::createTable();
		// Create Database Table for Url Shortener
		\EnteraddonsPro\Modules\Url_Shortener_DB::createTable();
		// Create Database Table for Url Shortener tracking
		\EnteraddonsPro\Modules\Url_Tracking::createDBTable();
	}
}

/**
 * Init Enteraddons PRO
 * 
 */
Enteraddons_PRO::getInstance();
