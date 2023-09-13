<?php 
namespace EnteraddonsPro\Widgets\Modal_Popup\Traits;
/**
 * Enteraddons Modal Popup template class
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
		$settings   = self::getSettings();
		?>

			<div class="ea-modal-wrapper">
				<?php 
					if( $settings['trigger_type'] == 'button' ) {
						echo'<div class="ea-btn-wrapper">';
							echo '<a class="ea-modal-btn" data-toggle="ea-modal" data-effect="'.esc_attr( $settings['modal_effect_style'] ).'">';
								self::btn_text(); 
							echo '</a>';
						echo '</div>';
					} 
					else {
						self::trigger_image();
					}
				?>
				<div class="ea-modal">
					<div class="ea-modal-dialog">
						<span class="ea-modal-close">
							<?php self::close_icon(); ?>	
						</span>
						<?php if ( 'yes' === $settings['header_show'] ) : ?>
							<div class="ea-modal-header">
								<?php 
									self::header();
								?>
							</div>
						<?php endif; ?>
						<div class="ea-modal-body <?php echo esc_attr( $settings['modal_layout'] ); ?>">
							<?php 
							if( $settings['content_type'] != 'template' ) {
								if ( 'yes' === $settings['modal_popup_image_show'] ) {
								self::modal_image();
								}
								echo '<div class="ea-modal-content">';
									self::title();
									self::subtitle();
									echo '<div class="enteraddons-modal-icon ">';
										if( !empty( $settings['social_icon'] ) ) {
											foreach( $settings['social_icon'] as $icons ) {
												self::linkOpen($icons);
												self::icon($icons);
												self::linkClose();
											}
										}
									echo '</div>';
									self::description();
									echo '<div class="ea-popup-button">';
										self::modal_button();
									echo '</div>';
								
								echo '</div>';
							} else {
								if( !empty( $settings['template_id'] ) ) {
					                echo \Enteraddons\Classes\Helper::elementor_content_display( absint( $settings['template_id'] ) );
					            }
							}
							?>
						</div>
					</div>
				</div>
			</div>
		<?php
	}

}