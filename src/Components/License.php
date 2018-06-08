<?php
namespace tmc\sp\src\Components;

/**
 * @author jakubkuranda@gmail.com
 * Date: 04.06.2018
 * Time: 12:57
 */

use shellpress\v1_2_4\src\Shared\Components\LicenseManagerSLM;

class License extends LicenseManagerSLM {

	/**
	 * Called on creation of component.
	 *
	 * @return void
	 */
	protected function onSetUp() {

		$this->registerAutomaticChecker();

		if( is_admin() ){

			$this->registerNotices();
			$this->registerAPFForm( 'tmc_sp_apf', 'tmc_sp_settings', 'tools' );

		}

	}

	/**
	 * Called when key has been activated.
	 *
	 * @return void
	 */
	protected function onKeyActivationCallback() {
		// TODO: Implement onKeyActivationCallback() method.
	}

	/**
	 * Called when key has been deactivated.
	 *
	 * @return void
	 */
	protected function onKeyDeactivationCallback() {
		// TODO: Implement onKeyDeactivationCallback() method.
	}

}