<?php

namespace HG\CandidateCore\TemplateData;

use HG\CandidateCore\ACF\Options\SiteGlobal;
use HG\CandidateCore\Utils\Fallback;
use HG\CandidateCore\Utils\Meta;
use HG\CandidateCore\Utils\Esc;
use HG\CandidateCore\ACF\FieldGroups\PageBackgroundOptions as GlobalOptions;
use HG\CandidateCore\ACF\FieldGroups\PageSingleBackgroundOptions as PageOptions;

class PageBackgroundOptions {

	public $post_id;

	public $background_image;

	public function __construct() {
		$this->post_id          = get_the_ID();
		$this->background_image = $this->background_image();
	}

	public function background_image() {

		$image_key_global = SiteGlobal::SLUG . '_' . GlobalOptions::PREFIX . '_default_image';
		$image_key_page   = PageOptions::PREFIX . '_image';


		$image_id_global = get_option( $image_key_global );
		$image_id_page   = Meta::get( $this->post_id, $image_key_page );

		return $image_id_page ?: $image_id_global;


	}
}