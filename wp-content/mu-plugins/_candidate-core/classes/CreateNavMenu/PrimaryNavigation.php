<?php

namespace HG\CandidateCore\CreateNavMenu;

class PrimaryNavigation
{
    const TITLE = 'Primary Navigation';

    public $menu;

    public static function init()
    {
        $class = new self;
        add_action('init', [$class, 'getMenu'], 50);
        add_action('init', [$class, 'createMenu'], 51);
        add_action('init', [$class, 'setMenuToNavigation'], 52);
    }

    public function getMenu()
    {
        $this->menu = wp_get_nav_menu_object(self::TITLE);
    }

    public function setMenuToNavigation()
    {
        $new_locations = [
            'menu_primary' => $this->menu->term_id,
        ];
        $locations     = (array)get_theme_mod('nav_menu_locations');
        set_theme_mod('nav_menu_locations', array_merge($locations, $new_locations));
    }

    public function createMenu()
    {
        if ($this->menu) {
            // Menu exists, exit early.
            return;
        }

        $menu_id = wp_create_nav_menu(self::TITLE);

        // Set up default menu items
        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title'   => __('Home'),
            'menu-item-classes' => 'home',
            'menu-item-url'     => home_url('/'),
            'menu-item-status'  => 'publish',
        ]);

        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title'  => __('About'),
            'menu-item-url'    => home_url('/about/'),
            'menu-item-status' => 'publish',
        ]);

        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title'  => __('Contact'),
            'menu-item-url'    => home_url('/contact/'),
            'menu-item-status' => 'publish',
        ]);

        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title'  => __('Issues'),
            'menu-item-url'    => home_url('/issues/'),
            'menu-item-status' => 'publish',
        ]);
    }
}