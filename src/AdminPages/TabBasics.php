<?php
namespace tmc\sp\src\AdminPages;

/**
 * @author jakubkuranda@gmail.com
 * Date: 08.06.2018
 * Time: 11:05
 */

use shellpress\v1_2_6\src\Shared\AdminPageFramework\AdminPageTab;
use tmc\sp\src\App;
use WP_Post_Type;

class TabBasics extends AdminPageTab {

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
				'title'         =>  __( 'Basics', 'tmc_sp' )
			)
		);

	}

	/**
	 * Called while current component is loaded.
	 */
	public function load() {

		//  ----------------------------------------
		//  Actions
		//  ----------------------------------------

		add_action( 'admin_notices',        array( $this, '_a_displayLicenseNotification' ) );

		//  ----------------------------------------
		//  Sections
		//  ----------------------------------------

		$this->pageFactory->addSettingSections(
			array(
				'section_id'        =>  'searching',
				'title'             =>  __( 'Searching', 'tmc_sp' ),
				'page_slug'         =>  $this->pageSlug,
				'tab_slug'          =>  $this->tabSlug,
			),
			array(
				'section_id'        =>  'appearance',
				'title'             =>  __( 'Appearance', 'tmc_sp' ),
				'page_slug'         =>  $this->pageSlug,
				'tab_slug'          =>  $this->tabSlug,
			),
			array(
				'section_id'        =>  'shortcodes',
				'title'             =>  __( 'Shortcodes', 'tmc_sp' ),
				'page_slug'         =>  $this->pageSlug,
				'tab_slug'          =>  $this->tabSlug,
				'description'       =>  array(
					sprintf( '<p>%1$s <code>[tmc_sp_open]</code></p>',
						__( 'To display search button, use shortcode: ', 'tmc_sp' )
					),
					sprintf( '<p>%1$s</p>',
						__( 'This shortcode will work even in built in WordPress navigation menus.', 'tmc_sp' )
					),
					sprintf( '<p>%1$s <code>%2$s</code></p>',
						__( 'You can trigger shortcodes in your own code like this: ', 'tmc_sp' ),
						htmlentities( '<?php echo do_shortcode( \'[tmc_sp_open]\' ); ?>' )
					)
				)
			),
			array(
				'section_id'        =>  'thumbnails',
				'title'             =>  __( 'Thumbnails', 'tmc_sp' ),
				'page_slug'         =>  $this->pageSlug,
				'tab_slug'          =>  $this->tabSlug,
			),
			array(
				'section_id'        =>  'content',
				'title'             =>  __( 'Content', 'tmc_sp' ),
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

		$this->pageFactory->addSettingFields(
			'searching',
			array(
				'field_id'          =>  'postTypes',
				'type'              =>  'checkbox',
				'title'             =>  __( 'Post types', 'tmc_sp' ),
				'label'             =>  $this->getAllPostTypesNames()
			)
		);

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
			),
			array(
				'field_id'          =>  'colorAccentSecondary',
				'type'              =>  'color',
				'title'             =>  __( 'Secondary accent',   'tmc_sp' )
			)
		);

		$this->pageFactory->addSettingFields(
			'shortcodes',
			array(
				'field_id'          =>  'openBtnIcon',
				'type'              =>  'image',
				'title'             =>  __( 'Open button icon', 'tmc_sp' )
			),
			array(
				'field_id'          =>  'openBtnText',
				'type'              =>  'text',
				'title'             =>  __( 'Open button text', 'tmc_sp' ),
				'tip'               =>  __( 'If the icon is not set or could not be loaded, this text will be displayed instead of.', 'tmc_sp' )
			)
		);

		$this->pageFactory->addSettingFields(
			'thumbnails',
			array(
				'field_id'          =>  'position',
				'type'              =>  'radio',
				'title'             =>  __( 'Position', 'tmc_sp' ),
				'label'             =>  array(
					'right'             =>  __( 'Right', 'tmc_sp' ),
					'left'              =>  __( 'Left', 'tmc_sp' ),
					'disabled'          =>  __( 'Disable thumbnails', 'tmc_sp' ),
				)
			)
		);

		$this->pageFactory->addSettingFields(
			'content',
			array(
				'field_id'          =>  'resultTitleTag',
				'type'              =>  'select',
				'title'             =>  __( 'Result header tag', 'tmc_sp' ),
				'label'             =>  array(
					'h1'                =>  'h1',
					'h2'                =>  'h2',
					'h3'                =>  'h3',
					'h4'                =>  'h4',
					'h5'                =>  'h5',
					'h6'                =>  'h6',
				),
				'default'           =>  'h2'
			),
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
			),
			array(
				'field_id'          =>  'noResultsFoundText',
				'type'              =>  'text',
				'title'             =>  __( 'No results text', 'tmc_sp' ),
				'attributes'        =>  array(
					'class'             =>  'regular-text'
				)
			)
		);

		$this->pageFactory->addSettingFields(
			'submit',
			array(
				'field_id'          =>  'submit',
				'type'              =>  'submit',
				'save'              =>  false
			)
		);

	}

	/**
	 * Returns array of keys => value post types.
	 *
	 * @return array
	 */
	private function getAllPostTypesNames() {

		/** @var WP_Post_Type[] $postTypesObjects */
		$postTypesObjects = get_post_types( array( 'public' => true ), 'objects' );

		$postTypes      = array();
		$excludeList    = array( 'attachment' );

		foreach( $postTypesObjects as $postType ){
			if( ! in_array( $postType->name, $excludeList ) ){  //  Exclude if in list

				$postTypes[ $postType->name ] = sprintf( '<span  style="display: inline-block; width: 150px; margin-right: 1em;">%1$s</span> <i>( %2$s )</i>',
					$postType->label,
					$postType->name
				);

			}
		}

		return $postTypes;

	}

	//  ================================================================================
	//  ACTIONS
	//  ================================================================================

	/**
	 * Called on admin_notices.
	 *
	 * @return void
	 */
	public function _a_displayLicenseNotification() {

		if( App::i()->license->getKey() ) return;

		$linkHtml = sprintf( '<a href="%1$s">%2$s</a>',
			add_query_arg( 'tab', 'tools' ),
			__( 'Search engine needs active license to work properly.', 'tmc_sp' )
		);

		printf( '<div class="notice notice-error tmc-notice is-dismissible"><p>%1$s</p></div>', $linkHtml );

	}

}