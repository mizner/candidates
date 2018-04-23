<?php

namespace HG\CandidateCore\SetOption;

class ShowOnFront
{
    public static function init()
    {
        $class = new self;
        add_action('admin_init', [$class, 'run'], 10);
    }

    public function run()
    {
        update_option('show_on_front', 'page', false);
    }
}