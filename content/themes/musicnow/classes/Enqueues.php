<?php

namespace Pyxl\Theme;

class Enqueues {

	public static $dist = URI . '/dist/';

	public function __construct() {
		add_action( 'init', [ $this, 'init' ] );
	}

	public function init() {

		add_action( 'wp_enqueue_scripts', [ $this, 'load_cdn_jquery' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'site_wide' ], 10 );
		add_action( 'get_footer', [ $this, 'site_wide_footer' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_enqueue' ] );
		add_filter( 'script_loader_tag', [ $this, 'script_modifier' ], 10, 2 );

	}

	public function script_modifier( $tag, $handle ) {

		if ( 'theme-js' === $handle ) {

			$tag = str_replace( ' src', ' async="async" src', $tag );
		}

		if ( 'jquery' === $handle ) {

			$tag = str_replace( ' src', ' async="async" src', $tag );
		}

		return $tag;
	}


	public function critical_styles() {
		ob_start();
		?>
		<style type="text/css"
		       data-type="critical-styles"><?php include_once PATH . '/dist/crit.min.css' ?></style>
		<?php
		echo ob_get_clean();
	}

	public function non_site_wide() {

		// Scripts
		wp_register_script( 'flickity', self::$dist . '/js/flickity.min.js', null, '2.0.5', true );
	}

	public function load_cdn_jquery() {
		// Swap jQuery from WordPress to CDN
		if ( ! is_user_logged_in() ) {
			// comment out the next two lines to load the local copy of jQuery
			wp_deregister_script( 'jquery' );
			wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false, '1.12.4', false );
		}
	}

	public function site_wide() {

		// Scripts

		wp_enqueue_script( 'theme-js', self::$dist . 'main.min.js', [ 'jquery' ], '1.0', true );

		wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Barlow+Condensed:400,600,700|Roboto+Mono:400,500|Roboto', [], '1.0' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Styles

		wp_enqueue_style( PROJECT, self::$dist . 'main.min.css', [], '1.0', 'all' );

	}

	public function site_wide_footer() {

		// wp_enqueue_style( PROJECT, self::$dist . 'main.min.css', [], '1.0', 'all' );

	}

	public function admin_enqueue() {

		// General Theme CSS Sheet, not required for frontend since we're handing that in the dist folder via webpack
		wp_enqueue_style( PROJECT . '-info', get_stylesheet_uri() );

		// wp_enqueue_style( PROJECT . '-admin', URI . '/dist/admin.min.css' );

	}

}