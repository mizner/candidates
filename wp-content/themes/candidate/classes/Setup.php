<?php

namespace HG\Candidate;

class Setup
{
    public static function init()
    {
        self::general();
        self::registerMenus();
        self::registerSidebars();
    }

    private static function general()
    {

        add_theme_support('title-tag');

        add_theme_support('automatic-feed-links');

        add_theme_support('post-thumbnails');

        add_theme_support(
            'html5',
            [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            ]
        );
    }

    private static function registerMenus()
    {
        register_nav_menus([
            'menu_primary' => __('Primary Menu', 'candidate-theme'),
        ]);
    }

    private static function registerSidebars()
    {
        register_sidebar([
            'name'          => esc_html__('Sidebar', 'candidate-theme'),
            'id'            => 'sidebar',
            'description'   => esc_html__('Add widgets here.', 'candidate-theme'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ]);
    }
}