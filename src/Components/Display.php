<?php
namespace tmc\sp\src\Components;

/**
 * @author jakubkuranda@gmail.com
 * Date: 04.06.2018
 * Time: 13:21
 */

use shellpress\v1_2_3\src\Shared\Components\IComponent;

class Display extends IComponent {

	/**
	 * Called on creation of component.
	 *
	 * @return void
	 */
	protected function onSetUp() {

		add_action( 'wp_footer',            array( $this, '_a_displayPopupRoot' ) );
		add_action( 'wp_enqueue_scripts',   array( $this, '_a_enqueueScripts' ) );

	}

	/**
	 * Checks if current page should display popup HTML.
	 *
	 * @return bool
	 */
	protected function shouldDisplayPopup() {

		return ! is_admin();

	}

	//  ================================================================================
	//  ACTIONS
	//  ================================================================================

	/**
	 * Called on wp_footer.
	 *
	 * @internal
	 *
	 * @return void
	 */
	public function _a_displayPopupRoot() {

		if( ! $this->shouldDisplayPopup() ) return;

		?>

		<div class="tmc_sp_root" id="tmc_sp_root">

            <div class="close-root">

                <span class="close" id="tmc_sp_close">
                    <img width="32px" height="32px" src="<?php echo $this::s()->getUrl( 'assets/img/cross-remove-sign.svg' ); ?>">
                </span>

            </div>

            <div class="wrapper-inner">

                <form id="tmc_sp_form">
                    <div class="inputs-row">
                        <div>
                            <input type="text" class="input-text" placeholder="I am looking for...">
                        </div>
                        <div>
                            <input type="submit" class="input-button" value="Search">
                        </div>
                    </div>
                </form>

                <div class="results" id="tmc_sp_results">

                </div>

            </div>

		</div>

		<?php

	}

	/**
	 * Called on wp_enqueue_scripts.
     *
     * @internal
     *
     * @return void
	 */
	public function _a_enqueueScripts() {

	    if( ! $this->shouldDisplayPopup() ) return;

	    wp_enqueue_style( 'tmc_sp_style', $this::s()->getUrl( 'assets/css/style.css' ), array(), $this::s()->getFullPluginVersion() );

	    wp_enqueue_script( 'tmc_sp_search', $this::s()->getUrl( 'assets/js/front.js' ), array( 'jquery' ), $this::s()->getFullPluginVersion(), true );

    }

}