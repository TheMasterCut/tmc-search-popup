<?php
namespace tmc\sp\src\AdminPages;

/**
 * @author jakubkuranda@gmail.com
 * Date: 08.06.2018
 * Time: 11:17
 */

use shellpress\v1_2_6\src\Shared\AdminPageFramework\AdminPageTab;

class TabTools extends AdminPageTab {

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
				'title'         =>  __( 'Tools', 'tmc_sp' )
			)
		);

	}

	/**
	 * Called while current component is loaded.
	 */
	public function load() {
		// TODO: Implement load() method.
	}

}