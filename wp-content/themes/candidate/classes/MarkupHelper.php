<?php

namespace HG\Candidate;

class MarkupHelper
{
    public static function init()
    {
        $class = new self;

        add_action('candidate_before_header', [$class, 'svgSprites']);

        add_action('candidate_after_header', [$class, 'afterHeader']);
        add_action('candidate_before_footer', [$class, 'beforeFooter']);

        add_action('candidate_before_header', [$class, 'beforeHeader']);
        add_action('candidate_after_footer', [$class, 'afterFooter']);
    }

    public function svgSprites()
    {
        if (!file_exists(PATH.'dist/svg/sprites.svg')) {
            return;
        }
        include_once PATH.'dist/svg/sprites.svg';
    }

    public function beforeHeader()
    {
        ?>
        <body <?php body_class() ?>>
        <div id="wrapper">
        <?php
    }

    public function afterHeader()
    {
        ?>
        <main id="content">
        <?php
    }

    public function beforeFooter()
    {
        ?>
        </main><!-- #content-->
        <?php
    }

    public function afterFooter()
    {
        ?>
        </div><!-- #wrapper-->
        </body>
        <?php
    }
}
