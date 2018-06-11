<?php

use tmc\sp\src\AdminPages\TabBasics;
use tmc\sp\src\AdminPages\TabTools;
use tmc\sp\src\App;

/**
 * @author jakubkuranda@gmail.com
 * Date: 04.06.2018
 * Time: 12:48
 */

class tmc_sp_apf extends TMC_v1_0_3_AdminPageFramework {

	public function setUp() {

		//  ----------------------------------------
		//  Definition
		//  ----------------------------------------

		$this->oProp->bShowDebugInfo = false;
		$this->setInPageTabTag( 'h2' );

		$this->setRootMenuPage( 'Settings' );
		$this->addSubMenuItem(
			array(
				'title'     =>  __( 'Search Popup TMC' ),
				'page_slug' =>  'tmc_sp_settings'
			)
		);

		//  ----------------------------------------
		//  Tabs
		//  ----------------------------------------

		new TabBasics( $this, 'tmc_sp_settings', 'basics' );
		new TabTools( $this, 'tmc_sp_settings', 'tools' );

	}

	public function load() {

		//  ----------------------------------------
		//  Styles and scripts
		//  ----------------------------------------

		$this->enqueueStyle(
			App::s()->getUrl( 'lib/ShellPress/assets/css/AdminPage/style.css' ),
			'',
			'',
			array(
				'version'   =>  App::s()->getFullPluginVersion()
			)
		);

	}

}