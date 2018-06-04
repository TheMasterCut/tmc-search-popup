<?php
namespace tmc\sp\src;

/**
 * @author jakubkuranda@gmail.com
 * Date: 04.06.2018
 * Time: 12:02
 */

use shellpress\v1_2_3\ShellPress;

class App extends ShellPress {

	/**
	 * Called automatically after core is ready.
	 *
	 * @return void
	 */
	protected function onSetUp() {

		//  ----------------------------------------
		//  Autoloading
		//  ----------------------------------------

		$this::s()->autoloading->addNamespace( 'tmc\sp', dirname( $this::s()->getMainPluginFile() ) );

	}

}