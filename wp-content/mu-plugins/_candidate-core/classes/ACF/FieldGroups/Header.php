<?php

namespace HG\CandidateCore\ACF\FieldGroups;

class Header {
	private $prefix = 'header';

	private $locations = [
		[
			[
				'param'    => 'options_page',
				'operator' => '==',
				'value'    => 'acf-options-site-globals',
			],
		],
	];

	private $hide = [
	];

	public static function init() {
		$class = new self;
		add_action( 'acf/init', [ $class, 'register' ] );
	}

	public function register() {
		acf_add_local_field_group( $this->fieldGroup() );
	}

	private function fieldGroup() {
		return [
			'key'                   => $this->prefix,
			'title'                 => 'Header',
			'style'                 => 'default',
			'instruction_placement' => 'label',
			'label_placement'       => 'top',
			'position'              => 'normal',
			'location'              => $this->locations,
			'fields'                => $this->fields(),
			'hide_on_screen'        => $this->hide,
			'menu_order'            => 1,
		];
	}

	private function prefix( $field = '' ) {
		return "{$this->prefix}_{$field}";
	}

	private function fields() {
		return [
			[
				'label'         => 'Header Background',
				'key'           => 'header_background',
				'name'          => 'header_background',
				'type'          => 'radio',
				'choices'       => [
					'white'           => 'White',
					'color_primary'   => 'Primary Color',
					'color_secondary' => 'Secondary Color',
				],
				'default_value' => 'light',
				'layout'        => 'horizontal',
			],
			[
				'label'        => 'Logo',
				'key'          => $this->prefix( 'logo' ),
				'name'         => 'logo',
				'type'         => 'image',
				'preview_size' => 'medium',
			],
			[
				'label' => 'Button One',
				'key'   => $this->prefix( 'button_one' ),
				'name'  => 'button_one',
				'type'  => 'link',
			],
			[
				'label' => 'Button Two',
				'key'   => $this->prefix( 'button_two' ),
				'name'  => 'button_two',
				'type'  => 'link',
			],
		];
	}
}
