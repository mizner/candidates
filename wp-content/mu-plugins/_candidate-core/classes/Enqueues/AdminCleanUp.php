<?php

namespace HG\CandidateCore\Enqueues;

use const HG\CandidateCore\URI;

class AdminCleanUp
{
    public static function init()
    {
        $class = new self;
        add_action('admin_enqueue_scripts', [$class, 'enqueue']);
    }

    public function enqueue()
    {
        $css_cleanup = URI.'/css/cleanup.css';
        wp_enqueue_style('cleanup', $css_cleanup);
    }
}
