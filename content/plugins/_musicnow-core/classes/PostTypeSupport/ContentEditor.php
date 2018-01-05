<?php

namespace Pyxl\MNC\PostTypeSupport;

class ContentEditor {
	public function __construct() {
		add_action( 'admin_head', [ $this, 'remove_textarea' ] );
	}

	function remove_textarea() {

		$post_id      = (int) get_the_ID();
		$frontpage_id = (int) get_option( 'page_on_front' );

		if ( $post_id !== $frontpage_id ) {
			return;
		}
		// Remove content editor for page set as "Homepage"
		remove_post_type_support( 'page', 'editor' );
	}
}