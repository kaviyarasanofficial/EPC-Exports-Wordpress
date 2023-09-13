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

trait Number {

	protected static $args;

	public function number( $args ) {

		$default = [
			'title' => '',
			'name'	=> '',
			'description'	=> '',
			'class'			=> '',
			'default'		=> '',
			'max'			=> '',
			'min'			=> '',
			'placeholder'	=> '',
			'condition'		=> ''
		];

		self::$args = wp_parse_args( $args, $default );

		self::number_markup();
		
	}

	protected static function number_markup() {

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
			<input type="number" min="<?php echo esc_attr( $args['min'] );  ?>" max="<?php echo esc_attr( $args['max'] );  ?>" name="<?php echo esc_attr( $optionName ).'['.$fieldName.']'; ?>" placeholder="<?php echo esc_attr( $args['placeholder'] );  ?>" value="<?php echo esc_attr( $value ); ?>" />
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
