<?php

namespace HG\CandidateCore\RemoveDefaults\Page;

use HG\CandidateCore\Utils\GetPost;

class SamplePage
{
    public static function init()
    {
        $class = new self;
        add_action('admin_init', [$class, 'run']);
    }

    public function run()
    {
        $post_id = GetPost::bySlug('sample-page', 'page');

        if (!$post_id) {
            return null;
        }

        wp_delete_post($post_id, true);
    }
}