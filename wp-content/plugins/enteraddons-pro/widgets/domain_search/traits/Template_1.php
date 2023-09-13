<?php 
namespace EnteraddonsPro\Widgets\Domain_Search\Traits;
/**
 * Enteraddons domain search template class
 *
 * @package     Enteraddons
 * @author      ThemeLooks
 * @copyright   2022 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

trait Template_1 {
	
	public static function markup_style_1() {
		$settings = self::getSettings();
		?>
			<div class="ea-searchbox">
				<form action="<?php self::link(); ?>" method="post">
					<div class="ea-searchbox-main ea-form-group">
						<div class="ea-keyword-search">
							<input type="text" class="ea-form-control ea-search-text" name="domain" placeholder="<?php self::text(); ?>">
						</div>
							<?php self::button(); ?>	
					</div>
				</form>
			</div>
			<?php if ( $settings['show_domain_type'] == 'yes' ) {
				echo '<div class="ea-product-category">';
					 if( !empty( $settings['domain_type_list'] ) ) {
						foreach( $settings['domain_type_list'] as $item ) {
							self::domain_type( $item );
						}
						
					} 
						
				echo '</div>';
				} ?>
		<?php
	}

}

