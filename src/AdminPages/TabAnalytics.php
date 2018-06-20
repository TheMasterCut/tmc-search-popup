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
				'section_id'        =>  'analytics',
				'title'             =>  __( 'Analytics', 'tmc_sp' ),
				'page_slug'         =>  $this->pageSlug,
				'tab_slug'          =>  $this->tabSlug,
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

		new TMC_v1_0_3_RadioRevealFieldType();

		$this->pageFactory->addSettingFields(
			'analytics',
			array(
				'field_id'          =>  'type',
				'title'             =>  __( 'Type', 'tmc_sp' ),
				'type'              =>  'radioreveal',
				'label'             =>  array(
					'0'                 =>  __( 'Disabled', 'tmc_sp' ),
					'google'            =>  __( 'Google Analytics', 'tmc_sp' ),
					'internal'          =>  __( 'Internal database', 'tmc_sp' ),
					'both'              =>  __( 'Both', 'tmc_sp' )
				)
			)
		);

	}

}