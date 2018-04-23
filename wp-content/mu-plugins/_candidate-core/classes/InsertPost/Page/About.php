<?php

namespace HG\CandidateCore\InsertPost\Page;

use HG\CandidateCore\Utils\GetPost;

class About
{
    public static function init()
    {
        $class = new self;
        add_action('admin_init', [$class, 'run'], 10);
    }

    public static function run()
    {
        $post_id = GetPost::bySlug('about', 'page');

        if ($post_id) {
            return;
        }

        $post_id = wp_insert_post([
            'post_type'      => 'page',
            'post_title'     => 'About',
            'post_name'      => 'about',
            'post_status'    => 'publish',
            'comment_status' => 'closed',
            'ping_status'    => 'closed',
        ]);

        if (!get_post_meta($post_id, '_wp_page_template')) {
            update_post_meta($post_id, '_wp_page_template', 'page-templates/about.php');
        }
    }
}