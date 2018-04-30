<?php

namespace HG\CandidateCore\ACF\FieldGroups;

class FrontPage {
	private $prefix = 'frontpage';

	private $locations = [
		[
			[
				'param'    => 'page_template',
				'operator' => '==',
				'value'    => 'page-templates/front-page.php',
			],
		],
	];

	private $hide = [
		0 => 'the_content',
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
			'title'                 => 'Fields',
			'style'                 => 'default',
			'instruction_placement' => 'label',
			'label_placement'       => 'top',
			'position'              => 'normal',
			'location'              => $this->locations,
			'fields'                => $this->fields(),
			'hide_on_screen'        => $this->hide,
			'menu_order'            => 10,
		];
	}

	private function prefix( $field = '' ) {
		return "{$this->prefix}_{$field}";
	}

	private function fields() {
		return [
			// Hero Tab
			[
				'label' => 'Hero',
				'key'   => 'hero_tab',
				'name'  => 'hero_tab',
				'type'  => 'tab',
			],
			//Hero Form Alignment
			[
				'label'         => 'Hero Position',
				'key'           => 'hero_alignment',
				'name'          => 'hero_alignment',
				'type'          => 'radio',
				'choices'       => [
					'left'  => 'Left',
					'right' => 'Right',
				],
				'default_value' => 'right',
				'layout'        => 'horizontal',
			],
			// Hero Background Image
			[
				'label' => 'Desktop Background Image',
				'key'   => 'hero_image',
				'name'  => 'hero_image',
				'type'  => 'image',
			],
			// Mobile Hero Background Image
			[
				'label' => 'Mobile Background Image',
				'key'   => 'hero_image_mobile',
				'name'  => 'hero_image_mobile',
				'type'  => 'image',
			],
			// Hero Content Background Color
			[
				'label'         => 'Content Background',
				'key'           => 'hero_content_background',
				'name'          => 'hero_content_background',
				'type'          => 'radio',
				'choices'       => [
					'transparent'      => 'Transparent',
					'background_color_light' => 'Light',
					'background_color_dark' => 'Dark',
				],
				'default_value' => 'transparent',
				'layout'        => 'horizontal',
			],
			// Hero Title
			[
				'label' => 'Title',
				'key'   => 'hero_title',
				'name'  => 'hero_title',
				'type'  => 'text',
			],
			// // Hero Button One
			// [
			//     'label' => 'Hero Button One',
			//     'key'   => 'hero_button_one',
			//     'name'  => 'hero_button_one',
			//     'type'  => 'link',
			// ],
			// // Hero Button Two
			// [
			//     'label' => 'Hero Button Two',
			//     'key'   => 'hero_button_two',
			//     'name'  => 'hero_button_two',
			//     'type'  => 'link',
			// ],
			// Intro Tab
			[
				'label' => 'Intro',
				'key'   => 'intro_tab',
				'name'  => 'intro_tab',
				'type'  => 'tab',
			],
			// Intro Title
			[
				'label' => 'Title',
				'key'   => 'intro_title',
				'name'  => 'intro_title',
				'type'  => 'text',
			],
			// Intro Description
			[
				'label'        => 'Description',
				'key'          => 'about_description',
				'name'         => 'about_description',
				'type'         => 'wysiwyg',
				'toolbar'      => 'basic',
				'media_upload' => 0,
				'delay'        => 1,
			],
			// Feature One Tab
			[
				'label' => 'Feature One',
				'key'   => 'feature_one_tab',
				'name'  => 'feature_one_tab',
				'type'  => 'tab',
			],
			// Feature One Position
			[
				'label'         => 'Image Position',
				'key'           => 'feature_one_image_position',
				'name'          => 'feature_one_image_position',
				'type'          => 'radio',
				'layout'        => 'horizontal',
				'return_format' => 'value',
				'choices'       => [
					'left'  => 'Left',
					'right' => 'Right',
				],
				'default_value' => [
					0 => 'right',
				],
			],
			// Feature One Active
			[
				'label'         => 'Active',
				'key'           => 'feature_one_active',
				'name'          => 'feature_one_active',
				'type'          => 'radio',
				'layout'        => 'horizontal',
				'return_format' => 'value',
				'choices'       => [
					'yes' => 'Yes',
					'no'  => 'No',
				],
				'default_value' => [
					0 => 'no',
				],
			],
			// Feature One Image
			[
				'label' => 'Image',
				'key'   => 'feature_one_image',
				'name'  => 'feature_one_image',
				'type'  => 'image',
			],
			// Feature One Text
			[
				'label' => 'Text',
				'key'   => 'feature_one_text',
				'name'  => 'feature_one_text',
				'type'  => 'text',
			],
			// Feature One Description
			[
				'label'        => 'Description',
				'key'          => 'feature_one_description',
				'name'         => 'feature_one_description',
				'type'         => 'wysiwyg',
				'toolbar'      => 'basic',
				'media_upload' => 0,
				'delay'        => 1,
			],
			// Feature One Button
			[
				'label' => 'Button',
				'key'   => 'feature_one_button',
				'name'  => 'feature_one_button',
				'type'  => 'link',
			],
			// Feature Two Tab
			[
				'label' => 'Feature Two',
				'key'   => 'feature_two_tab',
				'name'  => 'feature_two_tab',
				'type'  => 'tab',
			],
			// Feature Two Position
			[
				'label'         => 'Image Position',
				'key'           => 'feature_two_image_position',
				'name'          => 'feature_two_image_position',
				'type'          => 'radio',
				'layout'        => 'horizontal',
				'return_format' => 'value',
				'choices'       => [
					'left'  => 'Left',
					'right' => 'Right',
				],
				'default_value' => [
					0 => 'left',
				],
			],
			// Feature Two Active
			[
				'label'         => 'Active',
				'key'           => 'feature_two_active',
				'name'          => 'feature_two_active',
				'type'          => 'radio',
				'layout'        => 'horizontal',
				'return_format' => 'value',
				'choices'       => [
					'yes' => 'Yes',
					'no'  => 'No',
				],
				'default_value' => [
					0 => 'no',
				],
			],
			// Feature Two Image
			[
				'label' => 'Image',
				'key'   => 'feature_two_image',
				'name'  => 'feature_two_image',
				'type'  => 'image',
			],
			// Feature Two Title
			[
				'label' => 'Title',
				'key'   => 'feature_two_title',
				'name'  => 'feature_two_title',
				'type'  => 'text',
			],
			// Feature Two Description
			[
				'label'        => 'Description',
				'key'          => 'feature_two_description',
				'name'         => 'feature_two_description',
				'type'         => 'wysiwyg',
				'toolbar'      => 'basic',
				'media_upload' => 0,
				'delay'        => 1,
			],
			// Feature Two Button
			[
				'label' => 'Button',
				'key'   => 'feature_two_button',
				'name'  => 'feature_two_button',
				'type'  => 'link',
			],
		];
	}
}
