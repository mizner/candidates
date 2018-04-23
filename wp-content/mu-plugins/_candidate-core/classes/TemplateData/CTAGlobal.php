<?php

namespace HG\CandidateCore\TemplateData;

use HG\CandidateCore\ACF\Options\SiteGlobal;
use HG\CandidateCore\Utils\Fallback;
use HG\CandidateCore\Utils\Meta;
use HG\CandidateCore\Utils\Esc;

class CTAGlobal
{

    private static $prefix = SiteGlobal::SLUG.'_';

    public $title;

    public $description;

    public $buttons;

    public function __construct()
    {
        $this->title = get_option(self::$prefix.'cta_title') ?: Fallback::title();
        $this->description = get_option(self::$prefix.'cta_title') ?: Fallback::paragraph();
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
}