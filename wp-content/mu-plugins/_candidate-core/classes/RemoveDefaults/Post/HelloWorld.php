<?php

namespace HG\CandidateCore\RemoveDefaults\Post;

use HG\CandidateCore\Utils\GetPost;

class HelloWorld
{
    public static function init()
    {
        $class = new self;
        add_action('admin_init', [$class, 'run']);
    }

    public function run()
    {
        $post_id = GetPost::bySlug('hello-world', 'post');

        if (!$post_id) {
            return null;
        }

        wp_delete_post($post_id, true);
    }
}