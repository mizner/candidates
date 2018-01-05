<?php

namespace Pyxl\Theme;

use WP_Customize_Control;

Class Social {

	const PLATFORMS = [
		'facebook'  => 'facebook',
		'twitter'   => 'twitter',
		'instagram' => 'instagram',
	];

	public function __construct() {
		add_action( 'init', [ $this, 'init' ] );
	}

	public function init() {
		add_action( 'customize_register', [ $this, 'register_platforms' ], 10, 1 );
		// add_action( 'customize_register', [ $this, 'register_phone' ], 10, 1 );
	}

	public function platforms() {
		$data = [];
		foreach ( self::PLATFORMS as $platform => $icon ) {
			$link = get_theme_mod( $platform );
			if ( $link ) {
				$data[ $icon ] = $link;
			}

		}

		return $data;
	}

	public function register_platforms( $wp_customize ) {
		// Add Social Media Section
		$wp_customize->add_section( 'social-media', array(
			'title'       => __( 'Social Media' ),
			'priority'    => 21,
			'description' => __( 'Enter details here.' )
		) );

		foreach ( self::PLATFORMS as $platform => $icon ) {
			$wp_customize->add_setting(
				$platform,
				[
					'default' => ''
				]
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					$platform,
					[
						'label'    => __( ucfirst( $platform ) ),
						'section'  => 'social-media',
						'settings' => $platform,
					]
				)
			);
		}
	}
}