<?php

namespace Pyxl\MNC\ACF\Page;

class Events {

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
			'key'                   => 'group_event_grid_info',
			'title'                 => 'Event Grid Information',
			'fields'                => [
				[
					'key'               => 'field_event_tracks',
					'label'             => '',
					'name'              => 'event_tracks',
					'type'              => 'repeater',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'collapsed'         => '',
					'min'               => 0,
					'max'               => 3,
					'layout'            => 'block',
					'button_label'      => 'Add Day (3 Maximum)',
					'sub_fields'        => [
						[
							'key'               => 'field_event_day',
							'label'             => 'Event Day',
							'name'              => 'event_day',
							'type'              => 'date_picker',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => 0,
							'display_format'    => 'F j, Y',
							'return_format'     => 'Y-m-d',
							'first_day'         => 1,
						],
						[
							'key'               => 'field_events',
							'label'             => 'Events',
							'name'              => 'events',
							'type'              => 'repeater',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => 0,
							'collapsed'         => 'event_title',
							'min'               => 0,
							'max'               => 0,
							'layout'            => 'table',
							'button_label'      => 'Add Event',
							'sub_fields'        => [
								[
									'key'               => 'field_event_title',
									'label'             => 'Title',
									'name'              => 'event_title',
									'type'              => 'text',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'default_value'     => '',
									'placeholder'       => '',
									'prepend'           => '',
									'append'            => '',
									'maxlength'         => '',
								],
								[
									'key'               => 'field_event_venue_link',
									'label'             => 'Venue Info Link',
									'name'              => 'event_venue_link',
									'type'              => 'url',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'default_value'     => '',
									'placeholder'       => '',
								],
								[
									'key'               => 'field_event_ticket_link',
									'label'             => 'Buy Ticket Link',
									'name'              => 'event_ticket_link',
									'type'              => 'url',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'default_value'     => '',
									'placeholder'       => '',
								],
							],
						],
					],
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
			'menu_order'            => 10,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => 1,
			'description'           => '',
		];
	}
}