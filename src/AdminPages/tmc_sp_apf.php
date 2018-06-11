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
		$this->setPageTitleVisibility( false );

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

		add_filter( 'content_top_tmc_sp_settings', array( $this, '_f_addDescriptionToPage' ) );

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

	//  ================================================================================
	//  FILTERS
	//  ================================================================================

	/**
	 * Adds page title and description to content_top.
	 *
	 * @param string $html
	 *
	 * @return string
	 */
	public function _f_addDescriptionToPage( $html ) {

		$description = '';
		$description .= sprintf( '<h1>%1$s</h1>', 'Search Popup TMC' );
		$description .= sprintf( '<p>%1$s <code>[tmc_sp_open]</code></p>', __( 'To display search button, use shortcode: ', 'tmc_sp' ) );
		$description .= sprintf( '<p>%1$s <code>%2$s</code></p>', __( 'You can trigger shortcodes in your own code like this: ', 'tmc_sp' ), htmlentities( '<?php echo do_shortcode( \'[tmc_sp_open]\' ); ?>' ) );

		return $description . $html;

	}

}