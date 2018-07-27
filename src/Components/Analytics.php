<?php
namespace tmc\sp\src\Components;

/**
 * @author jakubkuranda@gmail.com
 * Date: 21.06.2018
 * Time: 09:24
 */

use shellpress\v1_2_6\src\Shared\Components\IComponent;
use tmc\sp\src\App;
use tmc\sp\src\Models\SearchQuery;

class Analytics extends IComponent {

	/**
	 * Called on creation of component.
	 *
	 * @return void
	 */
	protected function onSetUp() {

		//  TODO - implement internal database collection.

	}

	/**
	 * Returns saved queries as packed objects.
	 *
	 * @return SearchQuery[]
	 */
	public function getAllStoredQueries() {

		$options = App::i()->settings->getStoredQueries();
		$queries = array();

		foreach( $options as $data ){ /** @var array $data */

			$queries[] = new SearchQuery( $data );

		}

		return $queries;

	}

	/**
	 * Adds another query to storage.
	 * If query exists it will add count num.
	 *
	 * @param string $text
	 * @param int    $count
	 *
	 * @return void
	 */
	public function addStoredQuery( $text, $count = 1 ) {

		$isNewTextInDatabase    = false;
		$allQueries             = $this->getAllStoredQueries();
		$allQueriesAsArrays     = array();

		if( count( $allQueries ) >= App::i()->settings->getNumOfMaxStoredQueries() ) return;    //  Bail early.

		//  ----------------------------------------
		//  Let's look at all queries
		//  ----------------------------------------

		foreach( $allQueries as &$query ){

			if( $query->getText() === $text ){
				$query->setCount( $query->getCount() + $count );    //  Add count.
				$isNewTextInDatabase = true;                        //  Yes, we found it.
			}

			$allQueriesAsArrays[] = $query->getAllData();

		}

		//  ----------------------------------------
		//  If query was not inside database
		//  ----------------------------------------

		if( ! $isNewTextInDatabase ){

			$newQuery = new SearchQuery();
			$newQuery->setCount( $count );
			$newQuery->setText( $text );

			$allQueriesAsArrays[] = $newQuery->getAllData();

		}

		//  ----------------------------------------
		//  Update settings
		//  ----------------------------------------

		App::i()->settings->setStoredQueries( $allQueriesAsArrays );

	}

	/**
	 * @return void
	 */
	public function clearStoredQueries() {

		App::i()->settings->setStoredQueries( array() );

	}

}