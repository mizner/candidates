<?php

namespace HG\CandidateCore\TemplateData;

use HG\CandidateCore\Utils\Fallback;
use HG\CandidateCore\Utils\Meta;
use HG\CandidateCore\Utils\Esc;

class About
{
    public $id;

    public $prefix;

    public $bio;

    public function __construct()
    {
        $this->id     = get_the_ID();
        $this->prefix = 'about_';
        $this->bio    = Meta::get($this->id, $this->prefix.'bio') ?: Fallback::paragraph();
    }
}