<?php

namespace Pyxl\Theme;

require_once 'lib/autoload.php';

define( __NAMESPACE__ . '\PROJECT', 'music-now' );
define( __NAMESPACE__ . '\PATH', get_template_directory() );
define( __NAMESPACE__ . '\URI', get_template_directory_uri() );

add_action( 'after_setup_theme', function () {
	new Setup();
	new Logo();
	new MarkupHelper();
	new Enqueues();
	new Customizer\Social();
	new Customizer\FooterInfo();
} );