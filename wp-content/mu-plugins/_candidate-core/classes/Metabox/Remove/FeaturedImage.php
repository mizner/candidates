<?php

namespace HG\CandidateCore\Metabox\Remove;

class FeaturedImage
{
    public static function init()
    {
        $class = new self;
        add_action('admin_head', [$class, 'run']);
    }

    public function run()
    {
        remove_meta_box('postimagediv', 'page', 'side');
    }
}