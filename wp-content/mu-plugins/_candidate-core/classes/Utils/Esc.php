<?php

namespace HG\CandidateCore\Utils;

class Esc {
	public static function WYSIWYG( $content = '' ) {
		return apply_filters( 'WYSIWYG', wp_kses_post( $content ) );
	}

	public static function url( $url ) {
		return esc_url( $url );
	}

	public static function attr( $url ) {
		return esc_attr( $url );
	}

	public static function title( $content ) {
		$allowed = [
			'a'      => [
				'href'  => [],
				'title' => [],
			],
			'p'      => [],
			'span'   => [],
			'br'     => [],
			'em'     => [],
			'strong' => [],
		];

		return wp_kses( $content, $allowed );
	}
}