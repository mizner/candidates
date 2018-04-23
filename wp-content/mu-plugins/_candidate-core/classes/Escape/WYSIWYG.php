<?php

namespace HG\CandidateCore\Escape;

class WYSIWYG
{
    public static function init()
    {
        add_filter('WYSIWYG', 'wptexturize');
        add_filter('WYSIWYG', 'convert_smilies');
        add_filter('WYSIWYG', 'convert_chars');
        add_filter('WYSIWYG', 'wpautop');
        add_filter('WYSIWYG', 'shortcode_unautop');
        add_filter('WYSIWYG', 'prepend_attachment');
    }
}