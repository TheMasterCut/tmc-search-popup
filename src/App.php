<?php
namespace tmc\sp\src;

/**
 * @author jakubkuranda@gmail.com
 * Date: 04.06.2018
 * Time: 12:02
 */

use shellpress\v1_2_4\ShellPress;
use tmc\sp\src\Components\Display;
use tmc\sp\src\Components\License;
use tmc\sp\src\Components\Settings;
use tmc\sp\src\Components\Updates;
use tmc_sp_apf;

class App extends ShellPress {

	/** @var License */
	public $license;

	/** @var Settings */
	public $settings;

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

		//  ----------------------------------------
		//  Components
		//  ----------------------------------------

		$this->settings = new Settings( $this );
		$this->license = new License( $this );

		new Updates( $this );
		new Display( $this );

		//  ----------------------------------------
		//  Options pages
		//  ----------------------------------------

		if( is_admin() && ! wp_doing_ajax() && ! wp_doing_cron() ){ //  Keep it lightweight.

			$this::s()->requireFile( 'lib/tmc-admin-page-framework/admin-page-framework.php', 'TMC_v1_0_3_AdminPageFramework' );
			$this::s()->requireFile( 'src/AdminPages/tmc_sp_apf.php' );

			new tmc_sp_apf( $this::s()->options->getOptionsKey(), $this::s()->getMainPluginFile() );

		}

	}

}