<?php

namespace Pyxl\MNC\ACF\Page;

class Donations {

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
			'key'                   => 'group_donations',
			'title'                 => 'Donations',
			'fields'                => [
				[
					'key'          => 'field_donation_title',
					'label'        => 'Title',
					'name'         => 'donation_title',
					'type'         => 'text',
					'instructions' => '',
				],
				[
					'key'          => 'field_donation_content',
					'label'        => 'Content',
					'name'         => 'donation_content',
					'type'         => 'wysiwyg',
					'instructions' => '',
					'tabs'         => 'all',
					'toolbar'      => 'basic',
					'media_upload' => 0,
					'delay'        => 1,
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
			'menu_order'            => 20,
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