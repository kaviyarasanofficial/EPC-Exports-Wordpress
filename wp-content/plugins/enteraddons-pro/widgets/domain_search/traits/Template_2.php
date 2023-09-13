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

trait Template_2 {
	
	public static function markup_style_2() {
		$settings = self::getSettings();
		?>
			<div class="ea-dm-offer ea-dm-content">
				<?php self::domain_heading(); ?>
				<div class="ea-dm-right-content">
					<div class="ea-dm-form">                
						<!-- Offer Form Start -->
						<form action="<?php self::action_link(); ?>" method="post" class="ea-dm-domainSearchForm">
							<div class="ea-dm-reset-gutter">
								<div class="ea-dm-search-icon">
									<input class="ea-dm-form-control" name="domain" type="text" placeholder="<?php self::placeholder(); ?>" tp-type="username">
								</div>	
								<div class="ea-dm-select-box">
									<select class="ea-dm-form-control" name="ext">
										<?php
											if ( !empty( $settings['domain_name_lists'] ) ){
												foreach( $settings['domain_name_lists'] as $item ){
													self::domain_title ( $item );
												}
											}
										?>
									</select>
								</div>
								<div class="ea-dm-button">
									<button class="ea-dm-btn ea-dm-submit-button-custom" type="submit" tp-type="button">
										<?php self::search_button(); ?>
									</button>
								</div>
							</div>
						</form>
						<!-- Offer Form End -->
						<?php
						if ( !empty($settings['domain_offer_condition'] ) == 'yes' ) {
							self::domain_offer(); 
						}	
						?>
					</div>                   
					<div class="ea-dm-domain-ext">
						<?php
							if ( !empty( 'domain_details_list' ) ) {
								foreach( $settings['domain_details_list'] as $item ) {
									self::domain_type_name( $item );
								}
							}	
						?>
					</div>
				</div>
			</div>
		<?php
	}
}

