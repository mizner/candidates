<?php

namespace HG\CandidateCore\TemplateData;

use HG\CandidateCore\Utils\Fallback;

class Intro
{
    public $id;

    public $title;

    public $description;

    public function __construct()
    {
        $this->id    = get_the_ID();
        $this->title = get_post_meta($this->id, 'about_title', true) ?: 'Why I\'m Running';
        $this->description = get_post_meta($this->id, 'about_description', true) ?: Fallback::paragraph();
    }
}