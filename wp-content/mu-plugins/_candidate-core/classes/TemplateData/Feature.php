<?php

namespace HG\CandidateCore\TemplateData;

use HG\CandidateCore\Utils\Fallback;
use HG\CandidateCore\Utils\Meta;

class Feature
{
    public $prefix;

    public $title;

    public $button;

    public $description;

    public $active;

    public $image;

    public $image_position;

    public function __construct($prefix)
    {
        $id                   = get_the_ID();
        $this->prefix         = $prefix.'_';
        $this->image_position = Meta::get($id, $this->prefix.'image_position');
        $this->active         = Meta::get($id, $this->prefix.'active');
        $this->title          = Meta::get($id, $this->prefix.'title') ?: Fallback::title();
        $this->image          = (object)[
            'url' => wp_get_attachment_image_url(Meta::get($id, $this->prefix.'image')) ?: Fallback::image('650x450'),
            'alt' => $this->title,
        ];
        $button               = Meta::get($id, $this->prefix.'button');
        $this->description    = Meta::get($id, $this->prefix.'description') ?: Fallback::paragraph();

        $this->button = $button ? (object)[
            'url'   => $button['url'],
            'title' => $button['title'],
        ] : false;
    }

}