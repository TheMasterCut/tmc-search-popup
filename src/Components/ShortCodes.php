<?php
namespace tmc\sp\src\Components;
use shellpress\v1_2_4\src\Shared\Components\IComponent;

/**
 * @author jakubkuranda@gmail.com
 * Date: 11.06.2018
 * Time: 14:35
 */

class ShortCodes extends IComponent {

	const SHORTCODE_TAG = 'tmc_sp_open';

	/**
	 * Called on creation of component.
	 *
	 * @return void
	 */
	protected function onSetUp() {

		add_action( 'init', array( $this, '_a_initShortcodes' ) );

	}

	/**
	 * Registers shortcodes.
	 * Called on init.
	 *
	 * @return void
	 */
	public function _a_initShortcodes() {

		add_shortcode( $this::SHORTCODE_TAG, array( $this, 'getOpenPopupShortcode' ) );

	}

	/**
	 * @return string
	 */
	public function getOpenPopupShortcode( $attrs ) {

		return sprintf( '<span data-tmc_sp_open style="cursor: pointer;">Search &#128269;</span>' );

	}

}