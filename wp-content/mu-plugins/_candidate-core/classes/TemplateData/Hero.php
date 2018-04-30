<?php

namespace HG\CandidateCore\TemplateData;

use HG\CandidateCore\Utils\Fallback;

use HG\CandidateCore\Utils\Meta;

class Hero {

	public $post_id;

	public $title;

	public $background_image;

	public $background_image_mobile;

	public $hero_alignment;

	public $hero_content_background;

	public function __construct() {
		$this->post_id                 = get_the_ID();
		$this->title                   = Meta::get( $this->post_id, 'hero_title' ) ?: Fallback::title();
		$background_image_id           = Meta::get( $this->post_id, 'hero_image' );
		$this->background_image        = $background_image_id ?
			wp_get_attachment_image_url( $background_image_id, 'full' ) :
			Fallback::image( '1920x700' );
		$background_image_mobile_id    = Meta::get( $this->post_id, 'hero_image_mobile' );
		$this->background_image_mobile = $background_image_mobile_id ?
			wp_get_attachment_image_url( $background_image_mobile_id, 'full' ) :
			Fallback::image( '500x700' );
		$this->hero_alignment          = Meta::get( $this->post_id, 'hero_alignment' ) ?: 'right';
		$this->hero_content_background = $this->heroContentBackground();

	}

	public function heroContentBackground() {
		$class  = '';
		$option = Meta::get( $this->post_id, 'hero_content_background' ) ?: 'transparent';
		if ( $option === 'background_color_light' ) {
			$class = 'hero-content-bg-light';
		}
		if ( $option === 'background_color_dark' ) {
			$class = 'hero-content-bg-dark';
		}

		return $class;
	}

}