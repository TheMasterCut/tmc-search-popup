<?php
namespace tmc\sp\src\Components;

/**
 * @author jakubkuranda@gmail.com
 * Date: 04.06.2018
 * Time: 12:53
 */

use shellpress\v1_2_4\src\Shared\Components\IComponent;
use tmc\sp\src\App;

class Updates extends IComponent {

	/**
	 * Called on creation of component.
	 *
	 * @return void
	 */
	protected function onSetUp() {

		$this::s()->update->setFeedSource( 'https://raw.githubusercontent.com/TheMasterCut/tmc-search-popup/master/updates.json' );

		if( ! App::i()->license->isActive() ){
			$this::s()->update->disableUpdateOfPackage();
		}

	}

}