<?php


if ( ! class_exists( 'Tailor_Haven_Settings_Panel' ) ) {

	/**
	 * Tailor Custom Panel class.
	 */
	class Tailor_Haven_Settings_Panel extends Tailor_Panel {

		/**
		 * Type of item to display.
		 *
		 * @var string
		 */
		//public $type = 'library';

		/**
		 * Prints the Underscore template for the items section of the panel.
		 *
		 * @since 1.0.0
		 * @access protected
		 *
		 * @see Tailor_Panel::to_json()
		 * @see Tailor_Panel::print_template()
		 */
		protected function items_template() {

			?>
			test
<ul class="list list--primary" id="items"></ul>
			<?php
		}

		/**
		 * Prints the Underscore template for individual panel items.
		 *
		 * @access protected
		 *
		 * @see Tailor_Panel::to_json()
		 * @see Tailor_Panel::print_template()
		 */
		protected function item_template() { ?>
		    <li class="list__item">
			    <h3 class="list__label"><%= title %></h3>
		    </li>

			<?php
		}

		/**
		 * Prints the Underscore template for the panel empty state.
		 *
		 * @access protected
		 *
		 * @see Tailor_Panel::to_json()
		 * @see Tailor_Panel::print_template()
		 */
		protected function empty_template() { ?>

			<p><?php _e( 'There are no elements to display.', 'tailor' ); ?></p>

			<?php
		}
	}
}