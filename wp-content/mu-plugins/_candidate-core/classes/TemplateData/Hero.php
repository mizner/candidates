<?php

namespace HG\CandidateCore\TemplateData;

use HG\CandidateCore\Utils\Fallback;

use HG\CandidateCore\Utils\Meta;

class Hero
{

    public $title;

    public $background_image;

    public $background_image_mobile;

    public $hero_alignment;

    public function __construct()
    {
        $post_id                = get_the_ID();
        $this->title            = Meta::get($post_id, 'hero_title') ?: Fallback::title();
        $background_image_id    = Meta::get($post_id, 'hero_image');
        $this->background_image = $background_image_id ?
            wp_get_attachment_image_url($background_image_id, 'full') :
            Fallback::image('1920x700');
	    $background_image_mobile_id    = Meta::get($post_id, 'hero_image_mobile');
	    $this->background_image_mobile = $background_image_mobile_id ?
		    wp_get_attachment_image_url($background_image_mobile_id, 'full') :
		    Fallback::image('500x700');
	    $this->hero_alignment = Meta::get($post_id, 'hero_alignment') ?: 'right';
    }
}