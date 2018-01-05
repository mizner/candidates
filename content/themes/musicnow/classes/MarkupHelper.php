<?php

namespace Pyxl\Theme;

class MarkupHelper {

	public function __construct() {
		add_action( 'init', [ $this, 'init' ] );
	}

	public function init() {
		add_action( 'pyxl_before_header', [ $this, 'font_awesome_svg' ] );

		add_action( 'pyxl_after_header', [ $this, 'after_header' ] );
		add_action( 'pyxl_before_footer', [ $this, 'before_footer' ] );

		add_action( 'pyxl_before_header', [ $this, 'before_header' ] );
		add_action( 'pyxl_after_footer', [ $this, 'after_footer' ] );
	}

	public function font_awesome_svg() {
		include_once PATH . '/svg/font-awesome-sprites.svg';
	}

	public function after_header() {
		?>
		<main id="content">
		<?php
	}

	public function before_footer() {
		?>
		</main><!-- #content-->
		<?php
	}

	public function before_header() {
		?>
		<body <?php body_class() ?>>
		<div id="wrapper">
		<?php
		get_template_part( 'template-parts/top-bar' );
	}

	public function after_footer() {
		?>
		</div><!-- #wrapper-->
		</body>
		<?php
	}
}
