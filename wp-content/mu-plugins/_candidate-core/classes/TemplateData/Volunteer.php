<?php

namespace HG\CandidateCore\TemplateData;

use HG\CandidateCore\Utils\Fallback;
use HG\CandidateCore\Utils\Meta;
use HG\CandidateCore\Utils\Esc;

class Volunteer
{
    public $title;

    public $subtitle;

    public $description;

    public $form;

    public $background_image;

    public function __construct()
    {
        $id                     = get_the_ID();
        $prefix                 = 'volunteer_';
        $this->title            = get_the_title($id);
        $this->subtitle         = Meta::get($id, $prefix.'subtitle') ?: Fallback::title();
        $background_image_id    = Meta::get($id, $prefix.'background_image');
        $this->description      = Meta::get($id, $prefix.'description') ?: Fallback::paragraph();
        $this->form             = Meta::get($id, $prefix.'form');

        $this->background_image = $background_image_id ?
            wp_get_attachment_image_url($background_image_id, 'full') :
            Fallback::image('1920x700');
    }
}