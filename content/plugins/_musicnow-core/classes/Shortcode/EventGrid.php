<?php

namespace Pyxl\MNC\Shortcode;

use const Pyxl\MNC\PATH;

class EventGrid {

	public function __construct() {
		add_action( 'init', [ $this, 'init' ] );
	}

	public function init() {
		add_shortcode( 'event-grid', [ $this, 'shortcode' ] );
	}

	public function shortcode() {
		ob_start();
		include_once PATH . 'template-parts/event-grid.php';

		return ob_get_clean();
	}


}