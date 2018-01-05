<?php

namespace Pyxl\Theme\Customizer;

use WP_Customize_Control;

use WP_Customize_Image_Control;

class FooterInfo {
	public function __construct() {
		add_action( 'customize_register', [ $this, 'register' ], 10, 1 );
	}

	public function register( $wp_customize ) {
		$wp_customize->add_section( 'footer-section', array(
			'title'    => __( 'Footer' ),
			'priority' => 21,
			//'description' => __( 'Enter details here.', Core\TEXTDOMAIN )
		) );

		$wp_customize->add_setting(
			'copyright', [ 'default' => '' ]
		);
		$wp_customize->add_control( new WP_Customize_Control(
				$wp_customize,
				'copyright',
				[
					'label'    => __( '' ),
					'section'  => 'footer-section',
					'settings' => 'copyright',
					'type'     => 'textarea',
				]
			)
		);
		$wp_customize->add_setting(
			'footer_logo', [ 'default' => '' ]
		);

		$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize, 'image_upload_test',
				[
					'label'    => __( 'Footer Logo' ),
					'section'  => 'footer-section',
					'settings' => 'footer_logo',
				]
			)
		);
	}

}