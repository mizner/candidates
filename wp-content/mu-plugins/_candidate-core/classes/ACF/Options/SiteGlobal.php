<?php

namespace HG\CandidateCore\ACF\Options;

class SiteGlobal
{
    const SLUG = 'site_globals';

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
            'icon_url'    => 'dashicons-admin-site',
            'redirect'    => true,
            'post_id'     => self::SLUG,
            'autoload'    => false,
        ];

        acf_add_options_page($args);
    }
}