<?php

namespace HG\CandidateCore\TemplateData;

use HG\CandidateCore\ACF\Options\SiteGlobal;
use HG\CandidateCore\Utils\Esc;

class SocialMedia
{
    public $prefix;

    public $social_media;

    public function __construct()
    {
        $this->prefix       = SiteGlobal::SLUG.'_social_media_';
        $this->social_media = $this->socialMedia();
    }

    public function socialMedia()
    {
        $items = (object)[];

        $count = (int)get_option($this->prefix.'items');

        if ($count < 0) {
            return false;
        }

        for ($i = 0; $i < $count; ++$i) {
            $parent_prefix = "{$this->prefix}items_{$i}_";

            $network = get_option($parent_prefix.'network');
            $url     = get_option($parent_prefix.'url');

            $items->$i = (object)[
                'network' => $network,
                'url'     => $url,
            ];
        }

        return $items;
    }
}