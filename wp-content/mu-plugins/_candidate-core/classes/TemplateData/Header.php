<?php

namespace HG\CandidateCore\TemplateData;

use HG\CandidateCore\ACF\Options\SiteGlobal;

final class Header
{
    private static $prefix = SiteGlobal::SLUG.'_';

    public $logo;

    public $buttons;

    public function __construct()
    {
        $this->logo();
        $this->button(self::$prefix.'button_one', 'Volunteer', get_home_url().'/volunteer');
        $this->button(self::$prefix.'button_two', 'Donate', get_home_url().'/donate');
    }

    public function button($key = '', $default_title = '', $default_url = '#')
    {
        $button = get_option($key);

        $this->buttons[] = (object)[
            'url'   => $button ? $button['url'] : $default_url,
            'title' => $button ? $button['title'] : $default_title,
        ];
    }

    public function logo()
    {
        $id = (string)get_option(self::$prefix.'logo');
        $this->logo = (object)[
            'url'   => wp_get_attachment_image_url($id, 'medium'),
            'title' => 'Logo',
        ];
    }
}