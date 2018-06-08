<?php
namespace tmc\sp\src\AdminPages;

/**
 * @author jakubkuranda@gmail.com
 * Date: 08.06.2018
 * Time: 11:05
 */

use shellpress\v1_2_3\src\Shared\AdminPageFramework\AdminPageTab;

class TabBasics extends AdminPageTab {

	/**
	 * Declaration of current element.
	 */
	public function setUp() {

		$this->pageFactory->addInPageTab(
			array(
				'page_slug'     =>  $this->pageSlug,
				'tab_slug'      =>  $this->tabSlug,
				'title'         =>  __( 'Basics', 'tmc_sp' )
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
				'section_id'        =>  'appearance',
				'title'             =>  __( 'Appearance', 'tmc_sp' )
			)
		);

		//  ----------------------------------------
		//  Fields
		//  ----------------------------------------

		$this->pageFactory->addSettingFields(
			'appearance',
			array(
				'field_id'          =>  'bgColor',
				'type'              =>  'color',
				'title'             =>  __( 'Background color', 'tmc_sp' )
			)
		);

	}

}