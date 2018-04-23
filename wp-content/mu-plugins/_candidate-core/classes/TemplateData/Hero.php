<?php

namespace HG\CandidateCore\TemplateData;

use HG\CandidateCore\Utils\Fallback;

class Hero
{

    public $title;

    public $background_image;

    public function __construct()
    {
        $post_id                = get_the_ID();
        $this->title            = get_post_meta($post_id, 'hero_title', true) ?: Fallback::title();
        $background_image_id    = get_post_meta($post_id, 'hero_image', true);
        $this->background_image = $background_image_id ?
            wp_get_attachment_image_url($background_image_id, 'full') :
            Fallback::image('1920x700');
    }
}