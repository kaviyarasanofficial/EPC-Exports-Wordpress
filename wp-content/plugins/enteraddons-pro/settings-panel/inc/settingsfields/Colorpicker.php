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

trait Colorpicker {

	protected static $args;

	public function colorpicker( $args ) {

		$default = [
			'title' => '',
			'name'	=> '',
			'description'	=> '',
			'class'			=> '',
			'condition'		=> ''
		];

		self::$args = wp_parse_args( $args, $default );
		self::colorpicker_markup();
	}

	protected static function colorpicker_markup() {

		$optionName = self::$optionName;
	    $args = self::$args;
	    $getData = self::$getOptionData;
	    $fieldName  = $args['name'];
	    $value = !empty( $getData[$fieldName] ) ? $getData[$fieldName] : '';

	    $conditionData = '';
	    if( !empty( $args['condition'] ) ) {
	      $conditionData = json_encode( $args['condition'] );
	    }

		?>
		<div class="eap-admin-field" data-condition="<?php echo esc_html($conditionData); ?>">
			<h4><?php echo esc_html( $args['title'] ); ?></h4>
			<div class="fb-field-group">
			<input type="text" class="fb-color-field" name="<?php echo esc_attr( $optionName ).'['.$fieldName.']'; ?>" value="<?php echo esc_html( $value ); ?>" />
			<?php 
			if( !empty( $args['description'] ) ) {
				echo '<p>'.esc_html( $args['description'] ).'</p>';
			}
			?>
			</div>
		</div>
		<?php
	}
}
