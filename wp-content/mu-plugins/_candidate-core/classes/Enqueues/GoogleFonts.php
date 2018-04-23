<?php

namespace HG\CandidateCore\Enqueues;

class GoogleFonts
{
    public static function init()
    {
        $class = new self;
        add_action('wp_enqueue_scripts', [$class, 'enqueue']);
    }

    public function enqueue()
    {
        $css_google_fonts_base_url = 'https://fonts.googleapis.com/css?family=';
        $prefix                    = 'site_globals_';
        $font_primary              = get_option($prefix.'font_primary');
        $font_secondary              = get_option($prefix.'font_secondary');
        if ($font_primary) {
            $css_google_fonts_base_url = $css_google_fonts_base_url.$font_primary;
        }
        $font_secondary = get_option($prefix.'font_secondary');
        if ($font_primary) {
            $css_google_fonts_base_url = $css_google_fonts_base_url.'|'.$font_secondary;
        }
        if ($font_primary) {
            wp_enqueue_style('google-fonts', $css_google_fonts_base_url);
        }
    }
}
