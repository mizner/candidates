<?php

namespace Pyxl\MNC\ACF\Page;

class Hero {

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
			'key'                   => 'group_hero',
			'title'                 => 'Hero / Banner',
			'fields'                => [
				[
					'key'          => 'field_hero_gallery',
					'label'        => 'Slider Images',
					'name'         => 'hero_gallery',
					'type'         => 'gallery',
					'instructions' => '',
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
			'menu_order'            => 5,
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