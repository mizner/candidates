<?php

namespace Pyxl\Theme;

class Logo {

	public $type;

	public $uri;

	public $file;

	public $src;

	public $alt;

	public function __construct() {
		$this->init();
	}

	function init() {

		$this->uri = esc_url( home_url( '/' ) );
		$this->alt = get_bloginfo( 'name' );

		if ( file_exists( PATH . '/images/logo.svg' ) ):

			ob_start();
			include( PATH . '/images/logo.svg' );
			$this->file = ob_get_clean();
			$this->type = 'svg';
			remove_theme_support( 'custom-logo' );

		elseif ( file_exists( PATH . '/images/logo.png' ) ):
			$this->src  = URI . '/images/logo.png';
			$this->type = 'png';
			remove_theme_support( 'custom-logo' );

		elseif ( file_exists( PATH . '/images/logo.jpg' ) ):
			$this->src  = URI . '/images/logo.jpg';
			$this->type = 'jpg';
			remove_theme_support( 'custom-logo' );

		elseif ( has_custom_logo() ):
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$this->src      = wp_get_attachment_image_src( $custom_logo_id, 'full' )[0];
			$this->type     = 'media-library';

		else:
			$this->type = 'text';

		endif;

	}
}