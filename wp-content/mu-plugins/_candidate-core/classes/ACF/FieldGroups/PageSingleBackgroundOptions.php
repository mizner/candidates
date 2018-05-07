<?php
/**
 * Single Page Background Options
 */

namespace HG\CandidateCore\ACF\FieldGroups;

class PageSingleBackgroundOptions {

	const PREFIX = 'background_options';

	private $locations = [
		[
			[
				'param'    => 'post_type',
				'operator' => '==',
				'value'    => 'page',
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
			'title'                 => 'Background Options',
			'style'                 => 'default',
			'instruction_placement' => 'label',
			'label_placement'       => 'top',
			'position'              => 'side',
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
				'label'        => 'Background Image',
				'key'          => $this->prefix( 'image' ),
				'name'         => $this->prefix( 'image' ),
				'type'         => 'image',
				'preview_size' => 'medium',
			],
		];
	}
}
