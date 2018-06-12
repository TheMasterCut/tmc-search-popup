<?php

namespace tmc\sp\src\Components;

/**
 * @author jakubkuranda@gmail.com
 * Date: 04.06.2018
 * Time: 13:18
 */

use shellpress\v1_2_4\src\Shared\Components\IComponent;

class Settings extends IComponent {

	/**
	 * Called on creation of component.
	 *
	 * @return void
	 */
	protected function onSetUp() {

		$this::s()->options->setDefaultOptions(
			array(
				'searching'                     =>  array(
					'postTypes'                     =>  array(
						'post'                          =>  1
					)
				),
				'shortcodes'                    =>  array(
					'openBtnIcon'                   =>  $this::s()->getUrl( 'assets/img/icon-search.png' ),
					'openBtnText'                   =>  __( 'Search', 'tmc_sp' ),
				),
				'appearance'                    =>  array(
					'bgColor'                       =>  '#ffffff',
					'textColor'                     =>  '#000000',
					'colorAccentPrimary'            =>  '#2c3e50',
					'colorAccentSecondary'          =>  '#ffffff'
				),
				'thumbnails'                    =>  array(
					'position'                      =>  'right'
				),
				'content'                       =>  array(
					'inputSearchTextPlaceholder'    =>  __( 'I am looking for...', 'tmc_sp' ),
					'inputSearchButtonText'         =>  __( 'Search', 'tmc_sp' ),
					'inputSearchButtonLoadingText'  =>  __( 'Searching...', 'tmc_sp' ),
					'noResultsFoundText'            =>  __( 'No results found.', 'tmc_sp' ),
				)
			)
		);

		$this::s()->event->addOnActivate( array( $this, '_a_fillSettingsOnPluginActivation' ) );

	}

	/**
	 * @return string|null
	 */
	public function getBackgroundColor() {

		return $this::s()->options->get( 'appearance/bgColor' );

	}

	/**
	 * @return string|null
	 */
	public function getTextColor() {

		return $this::s()->options->get( 'appearance/textColor' );

	}

	/**
	 * @return string|null
	 */
	public function getColorAccentPrimary() {

		return $this::s()->options->get( 'appearance/colorAccentPrimary' );

	}

	/**
	 * @return string|null
	 */
	public function getColorAccentSecondary() {

		return $this::s()->options->get( 'appearance/colorAccentSecondary' );

	}

	/**
	 * @return string|null
	 */
	public function getSearchPlaceholder() {

		return $this::s()->options->get( 'content/inputSearchTextPlaceholder' );

	}

	/**
	 * @return string|null
	 */
	public function getSearchButtonText() {

		return $this::s()->options->get( 'content/inputSearchButtonText' );

	}

	/**
	 * @return string|null
	 */
	public function getSearchButtonLoadingText() {

		return $this::s()->options->get( 'content/inputSearchButtonLoadingText' );

	}
	/**
	 * @return string|null
	 */
	public function getNoResultsFoundText() {

		return $this::s()->options->get( 'content/noResultsFoundText' );

	}

	/**
	 * @return string|bool
	 */
	public function getThumbnailsPosition() {

		$option = $this::s()->options->get( 'thumbnails/position' );

		if( ! $option || $option === 'disabled' ){
			return false;
		} else {
			return $option;
		}

	}

	/**
	 * @return array
	 */
	public function getSupportedPostTypes() {

		$postTypes  = (array) $this::s()->options->get( 'searching/postTypes' );
		$supported  = array();

		foreach( $postTypes as $type => $value ){

			if( $value ){
				$supported[] = $type;
			}

		}

		return $supported;

	}

	/**
	 * @return string
	 */
	public function getOpenButtonIconUrl() {

		return $this::s()->options->get( 'shortcodes/openBtnIcon', '' );

	}

	/**
	 * @return string
	 */
	public function getOpenButtonText() {

		return $this::s()->options->get( 'shortcodes/openBtnText', '' );

	}

	//  ================================================================================
	//  ACTIONS
	//  ================================================================================

	/**
	 * Called on plugin activation.
	 *
	 * @internal
	 */
	public function _a_fillSettingsOnPluginActivation() {

		$this::s()->log->info( 'Filled settings differences.', $this::s()->options->getDefaultOptions() );

		$this::s()->options->fillDifferencies();
		$this::s()->options->flush();

	}

}