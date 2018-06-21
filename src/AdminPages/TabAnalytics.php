<?php
namespace tmc\sp\src\AdminPages;

/**
 * @author jakubkuranda@gmail.com
 * Date: 20.06.2018
 * Time: 15:35
 */

use shellpress\v1_2_4\src\Shared\AdminPageFramework\AdminPageTab;
use tmc\sp\src\App;
use TMC_v1_0_3_RadioRevealFieldType;
use TMC_v1_0_3_ToggleCustomFieldType;

class TabAnalytics extends AdminPageTab {

	/**
	 * Declaration of current element.
	 */
	public function setUp() {

		//  ----------------------------------------
		//  Definition
		//  ----------------------------------------

		$this->pageFactory->addInPageTab(
			array(
				'page_slug'     =>  $this->pageSlug,
				'tab_slug'      =>  $this->tabSlug,
				'title'         =>  __( 'Analytics', 'tmc_sp' )
			)
		);

	}

	/**
	 * Called while current component is loaded.
	 */
	public function load() {

		//  ----------------------------------------
		//  Sections
		//  ----------------------------------------

		$this->pageFactory->addSettingSections(
			array(
				'section_id'        =>  'googleAnalytics',
				'title'             =>  'Google Analytics',
				'page_slug'         =>  $this->pageSlug,
				'tab_slug'          =>  $this->tabSlug,
				'description'       =>  array(
					__( 'This plugin uses existing GA script to send "pageview" event every time someone uses search form.', 'tmc_sp' ),
					sprintf( __( 'You need to load javascript %1$s or by using %2$s.', 'tmc_sp' ),
						sprintf( '<a href="%1$s" target="_blank">%2$s</a>',
							'https://developers.google.com/analytics/devguides/collection/analyticsjs/',
							__( 'manually', 'tmc_sp' )
						),
						sprintf( '<a href="%1$s" target="_blank">%2$s</a>',
							'https://wordpress.org/plugins/ga-google-analytics/',
							__( 'plugin', 'tmc_sp' )
						)
					),
					__( 'Your results will be visible under page visits as a typical url with default WordPress search parameter.', 'tmc_sp' ),
					sprintf( '%1$s: <code>%2$s</code>',
						__( 'Example', 'tmc_sp' ),
						add_query_arg( array( 's' => 'hello' ), get_home_url() )
					)
				)
			),
			array(
				'section_id'        =>  'submit',
				'page_slug'         =>  $this->pageSlug,
				'tab_slug'          =>  $this->tabSlug,
				'save'              =>  false
			)
		);

		//  ----------------------------------------
		//  Fields
		//  ----------------------------------------

		App::s()->requireFile( 'lib/tmc-admin-page-framework/custom-field-types/radio-reveal-field-type/RadioRevealFieldType.php', 'TMC_v1_0_3_RadioRevealFieldType' );
		App::s()->requireFile( 'lib/tmc-admin-page-framework/custom-field-types/toggle-custom-field-type/ToggleCustomFieldType.php', 'TMC_v1_0_3_ToggleCustomFieldType' );

		new TMC_v1_0_3_RadioRevealFieldType();
		new TMC_v1_0_3_ToggleCustomFieldType();

		$this->pageFactory->addSettingFields(
			'googleAnalytics'
		);

	}

}