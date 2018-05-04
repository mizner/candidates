<?php

namespace HG\CandidateCore\TemplateData;

use HG\CandidateCore\Utils\Fallback;
use HG\CandidateCore\Utils\Meta;
use HG\CandidateCore\Utils\Esc;

class Issues
{
    public $id;

    public $issues_items;

    public $prefix;

    public function __construct()
    {
        $this->id           = get_the_ID();
        $this->prefix       = 'issues_';
        $this->issues_items = $this->issues();
    }

    public function issues()
    {
        $items = (object)[];

        $count = (int)get_post_meta($this->id, $this->prefix.'items', true);

        if ($count < 0) {
            return false;
        }
        for ($i = 0; $i < $count; ++$i) {
            $parent_prefix = "{$this->prefix}items_{$i}_";

            $title       = Meta::get($this->id, $parent_prefix.'title') ?: Fallback::title();
            $description = Meta::get($this->id, $parent_prefix.'content') ?: Fallback::paragraph();

            $items->$i = (object)[
                'title'       => $title,
                'description' => $description,
            ];
        }

        return $items;
    }
}