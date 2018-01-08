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
				// [
				// 	'key'          => 'field_hero_gallery',
				// 	'label'        => 'Slider Images',
				// 	'name'         => 'hero_gallery',
				// 	'type'         => 'gallery',
				// 	'instructions' => '',
				// ],
				[
					'key'          => 'hero_slider',
					'name'         => 'hero_slider',
					'label'        => 'Slides',
					'type'         => 'repeater',
					'layout'       => 'row',
					'button_label' => 'Add Slide',
					'sub_fields'   => [
						[
							'key'   => 'image',
							'name'  => 'image',
							'label' => 'Image',
							'type'  => 'image',
						],
						[
							'key'   => 'link',
							'name'  => 'link',
							'label' => 'Link',
							'type'  => 'link',
						]
					]
				]
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