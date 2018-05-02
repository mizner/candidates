<?php

namespace HG\CandidateCore\TemplateData;

use HG\CandidateCore\ACF\Options\SiteGlobal;

class ActBlue {
	private static $prefix = SiteGlobal::SLUG . '_';

	public $title;

	public $form_name;

	public $form_url;

	public $amounts;

	public $active;

	public $description;

	public function __construct() {
		$this->title       = get_option( self::$prefix . 'title' );
		$this->form_name   = get_option( self::$prefix . 'form_name' );
		$this->form_url    = 'https://secure.actblue.com/contribute/page/' . $this->form_name;
		$this->amounts     = explode( ',', get_option( self::$prefix . 'amounts' ) );
		$this->active      = $this->form_name ?: false;
		$this->description = get_option( self::$prefix . 'description' );
	}
}