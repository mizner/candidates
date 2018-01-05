<?php

namespace Pyxl\MNC\ACF\Page;

class About {

	public function __construct() {
		if ( ! function_exists( 'acf_add_local_field_group' ) ) {
			return;
		}
		add_action( 'init', [ $this, 'init' ] );
	}

	public function init() {
		acf_add_local_field_group( $this->fields() );
	}

	public function fields() {
		return [
			'key'                   => 'group_about',
			'title'                 => 'About',
			'fields'                => [
				[
					'key'          => 'field_about_content',
					'label'        => 'Content',
					'name'         => 'about_content',
					'type'         => 'wysiwyg',
					'instructions' => '',
					'tabs'         => 'all',
					'toolbar'      => 'basic',
					'media_upload' => 0,
					'delay'        => 1,
				],
				[
					'key'          => 'field_about_image',
					'label'        => 'Content',
					'name'         => 'about_image',
					'type'         => 'image',
				],
			],
			'location'              => [
				[
					[
						'param'    => 'page_template',
						'operator' => '==',
						'value'    => 'page-templates/homepage.php',
					],
				],
			],
			'menu_order'            => 30,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'left',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => 1,
			'description'           => '',

		];
	}

}