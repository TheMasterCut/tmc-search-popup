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
				'title'             =>  __( 'Appearance', 'tmc_sp' ),
				'page_slug'         =>  $this->pageSlug,
				'tab_slug'          =>  $this->tabSlug,
			),
			array(
				'section_id'        =>  'content',
				'title'             =>  __( 'Content', 'tmc_sp' ),
				'page_slug'         =>  $this->pageSlug,
				'tab_slug'          =>  $this->tabSlug,
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
			),
			array(
				'field_id'          =>  'textColor',
				'type'              =>  'color',
				'title'             =>  __( 'Text color',   'tmc_sp' )
			),
			array(
				'field_id'          =>  'colorAccentPrimary',
				'type'              =>  'color',
				'title'             =>  __( 'Primary accent',   'tmc_sp' )
			)
		);

		$this->pageFactory->addSettingFields(
			'content',
			array(
				'field_id'          =>  'inputSearchTextPlaceholder',
				'type'              =>  'text',
				'title'             =>  __( 'Search placeholder', 'tmc_sp' ),
				'attributes'        =>  array(
					'class'             =>  'regular-text'
				)
			),
			array(
				'field_id'          =>  'inputSearchButtonText',
				'type'              =>  'text',
				'title'             =>  __( 'Search button text' ),
				'attributes'        =>  array(
					'class'             =>  'regular-text'
				)
			),
			array(
				'field_id'          =>  'inputSearchButtonLoadingText',
				'type'              =>  'text',
				'title'             =>  __( 'Search button loading', 'tmc_sp' ),
				'attributes'        =>  array(
					'class'             =>  'regular-text'
				)
			)
		);

	}

}