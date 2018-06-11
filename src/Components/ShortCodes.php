<?php
namespace tmc\sp\src\Components;
use shellpress\v1_2_4\src\Shared\Components\IComponent;
use tmc\sp\src\App;

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
	 * Renders shortcode output HTML.
	 *
	 * @return string
	 */
	public function getOpenPopupShortcode( $attrs ) {

		$iconUrl    = App::i()->settings->getOpenButtonIconUrl();
		$btnText    = App::i()->settings->getOpenButtonText();

		if( $iconUrl ){

			return sprintf( '<span data-tmc_sp_open style="cursor: pointer; display: inline-block;"><img src="%1$s" alt="%2$s"></span>', $iconUrl, $btnText );

		} else {

			return sprintf( '<span data-tmc_sp_open style="cursor: pointer;">%1$s</span>', $btnText );

		}

	}

}