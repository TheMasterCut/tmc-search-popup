<?php
namespace tmc\sp\src\Models;

/**
 * @author jakubkuranda@gmail.com
 * Date: 27.07.2018
 * Time: 11:12
 */

class SearchQuery {

	/** @var array */
	protected $data;

	public function __construct( $data = array() ) {

		$defaultData = array(
			'text'      =>  '',
			'count'     =>  1
		);

		$this->data = wp_parse_args( $data, $defaultData );

	}

	/**
	 * @return int
	 */
	public function getCount() {

		return (int) $this->data['count'];

	}

	/**
	 * @param int $num
	 */
	public function setCount( $num ) {

		$this->data['count'] = $num;

	}

	/**
	 * @return string
	 */
	public function getText() {

		return $this->data['text'];

	}

	/**
	 * @param string $string
	 */
	public function setText( $string ) {

		$this->data['text'] = $string;

	}

	/**
	 * @return array
	 */
	public function getAllData() {

		return $this->data;

	}

}