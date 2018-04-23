<?php

namespace HG\CandidateCore\SetOption;

use HG\CandidateCore\Utils\GetPost;

class PageOnFront
{
    public static function init()
    {
        $class = new self;
        add_action('admin_init', [$class, 'set'], 100);
    }

    public function set()
    {
        $post_id = GetPost::bySlug('home', 'page');
        if (!$post_id) {
            return;
        }
        update_option('page_on_front', $post_id, false);
    }
}