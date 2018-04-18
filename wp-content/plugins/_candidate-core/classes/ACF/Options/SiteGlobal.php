<?php

namespace HG\CandidateCore\ACF\Options;

class SiteGlobal
{
    public static function init()
    {
        $class = new self;
        add_action('acf/init', [$class, 'register']);
    }

    public function register()
    {
        $args = [
            'page_title'  => 'Site Globals',
            'menu_title'  => '',
            'menu_slug'   => '',
            'capability'  => 'edit_posts',
            'position'    => 1,
            'parent_slug' => '',
            'icon_url'    => false,
            'redirect'    => true,
            'post_id'     => 'site_globals',
            'autoload'    => false,
        ];

        acf_add_options_page($args);
    }
}