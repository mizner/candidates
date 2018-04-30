<?php

namespace HG\CandidateCore\TemplateData;

use HG\CandidateCore\ACF\Options\SiteGlobal;

final class Header {
	private static $prefix = SiteGlobal::SLUG . '_';

	public $logo;

	public $buttons;

	public $header_background;

	public function __construct() {
		$this->logo();
		$this->button( self::$prefix . 'button_one', 'Volunteer', get_home_url() . '/volunteer' );
		$this->button( self::$prefix . 'button_two', 'Donate', get_home_url() . '/donate' );
		$this->header_background = $this->headerBackground();
	}

	public function headerBackground(){
		$class = '';
		$option = get_option( self::$prefix . 'header_background' );
		if ($option === 'color_primary') {
			$class = 'background-color__primary';
		}
		if ($option === 'color_secondary') {
			$class = 'background-color__secondary';
		}
		return $class;
	}

	public function button( $key = '', $default_title = '', $default_url = '#' ) {
		$button = get_option( $key );

		$this->buttons[] = (object) [
			'url'   => $button ? $button['url'] : $default_url,
			'title' => $button ? $button['title'] : $default_title,
		];
	}

	public function logo() {
		$id         = (string) get_option( self::$prefix . 'logo' );
		$this->logo = (object) [
			'url'   => wp_get_attachment_image_url( $id, 'medium' ),
			'title' => 'Logo',
		];
	}
}