<?php

namespace HG\CandidateCore\Redirect\Page;

use HG\CandidateCore\TemplateData\ActBlue;

class Donate
{
    public static function init()
    {
        $class = new self;
        add_action('init', [$class, 'redirect']);
    }

    public function redirect()
    {
        $act_blue = new ActBlue();
        if (stristr($_SERVER['REQUEST_URI'], '/donate') !== false) {
            wp_redirect($act_blue->form_url);
            die;
        }
    }
}