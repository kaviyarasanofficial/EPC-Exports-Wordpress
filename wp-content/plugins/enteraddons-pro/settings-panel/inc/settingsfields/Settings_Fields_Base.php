<?php
namespace EnteraddonsPro\Settings_Panel\SettingsField;
/**
 * Enteraddons Post Type Meta class
 *
 * @package     EnterAddons Pro
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */
 
abstract class Settings_Fields_Base {

  public static  $optionName;

  public static $getOptionData;

  use Checkbox;
  use Colorpicker;
  use MediaUpload;
  use MultipleSelect;
  use Number;
  use Selectbox;
  use Textarea;
  use Text;
  
  public function __construct() {

    self::$optionName = 'ea_modules_option';
    self::$getOptionData = get_option(self::$optionName);
    $this->tab_setting_fields();
    
  }

  public function tab_setting_fields() {}

  public function start_fields_section( $args ) {

    $default = [
      'title'     => esc_html__( 'Title goes here', 'enteraddons-pro' ),
      'class'     => '',
      'icon'      => '',
      'id'        => '',
      'display'   => 'none',
    ];

    $args = wp_parse_args( $args, $default );

    ?>
    <div id="<?php echo esc_attr( $args['id'] ); ?>" data-tab="<?php echo esc_attr( $args['id'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>" style="display: <?php echo esc_attr( $args['display'] ); ?>;">
      <div class="container">
        <div class="dashboard-content-wrap">
    <?php
  }

  public function end_fields_section( $is_button = true ) {
    if( $is_button ) {
      submit_button( 'Save Settings' );
    }
    echo '</div></div></div>';
  }

}