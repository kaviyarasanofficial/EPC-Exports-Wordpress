<?php
/**
 * TicketCreatedFluentSupport.
 * php version 5.6
 *
 * @category TicketCreatedFluentSupport
 * @package  SureTriggers
 * @author   BSF <username@example.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @link     https://www.brainstormforce.com/
 * @since    1.0.0
 */

namespace SureTriggers\Integrations\FluentSupport\Triggers;

use SureTriggers\Controllers\AutomationController;
use SureTriggers\Traits\SingletonLoader;

if ( ! class_exists( 'TicketCreatedFluentSupport' ) ) :

	/**
	 * TicketCreatedFluentSupport
	 *
	 * @category TicketCreatedFluentSupport
	 * @package  SureTriggers
	 * @author   BSF <username@example.com>
	 * @license  https://www.gnu.org/licenses/gpl-3.0.html GPLv3
	 * @link     https://www.brainstormforce.com/
	 * @since    1.0.0
	 *
	 * @psalm-suppress UndefinedTrait
	 */
	class TicketCreatedFluentSupport {

		/**
		 * Integration type.
		 *
		 * @var string
		 */
		public $integration = 'FluentSupport';

		/**
		 * Trigger name.
		 *
		 * @var string
		 */
		public $trigger = 'ticket_created_fluent_support';

		use SingletonLoader;

		/**
		 * Constructor
		 *
		 * @since  1.0.0
		 */
		public function __construct() {
			add_filter( 'sure_trigger_register_trigger', [ $this, 'register' ] );
		}

		/**
		 * Register action.
		 *
		 * @param array $triggers trigger data.
		 * @return array
		 */
		public function register( $triggers ) {
			$triggers[ $this->integration ][ $this->trigger ] = [
				'label'         => __( 'Ticket Created', 'suretriggers' ),
				'action'        => 'ticket_created_fluent_support',
				'common_action' => 'fluent_support/ticket_created',
				'function'      => [ $this, 'trigger_listener' ],
				'priority'      => 10,
				'accepted_args' => 2,
			];

			return $triggers;
		}

		/**
		 * Trigger listener
		 *
		 * @param object $ticket ticket.
		 * @param object $customer customer.
		 *
		 * @return void
		 */
		public function trigger_listener( $ticket, $customer ) {

			$context = array_merge(
				[
					'ticket'   => $ticket,
					'customer' => $customer,
				]
			);

			AutomationController::sure_trigger_handle_trigger(
				[
					'trigger' => $this->trigger,
					'context' => $context,
				]
			);
		}
	}

	/**
	 * Ignore false positive
	 *
	 * @psalm-suppress UndefinedMethod
	 */
	TicketCreatedFluentSupport::get_instance();

endif;
