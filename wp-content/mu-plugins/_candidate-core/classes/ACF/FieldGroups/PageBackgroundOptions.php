<?php
/**
 * Page Background Options
 */

namespace HG\CandidateCore\ACF\FieldGroups;

class PageBackgroundOptions {

	const PREFIX = 'page_background';

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
			'key'                   => self::PREFIX,
			'title'                 => 'Page Background Options',
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
		$prefix = self::PREFIX;
		return "{$prefix}_{$field}";
	}

	private function fields() {
		return [
			[
				'label'        => ' Default Image',
				'key'          => $this->prefix( 'default_image' ),
				'name'         => $this->prefix( 'default_image' ),
				'type'         => 'image',
				'preview_size' => 'medium',
			],
		];
	}
}
