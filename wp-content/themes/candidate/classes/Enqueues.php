<?php

namespace HG\Candidate;

class Enqueues
{
    public static function init()
    {
        $class = new self;
        add_action('wp_enqueue_scripts', [$class, 'register'], 25);
        add_action('wp_enqueue_scripts', [$class, 'head'], 50);
        add_action('get_footer', [$class, 'footer'], 50);
        add_filter('clean_url', [$class, 'asyncScripts'], 11, 1);
        add_filter('clean_url', [$class, 'deferScripts'], 11, 1);
    }

    public function register()
    {
        // JavaScript
        $js_global = URI.'dist/main.min.js';
        wp_register_script('global', $js_global, [], VERISON, true);
        wp_localize_script(
            'global',
            'globals',
            [
                'urls'    => [
                    'root'  => home_url(),
                    'ajax'  => admin_url('admin-ajax.php'),
                    'theme' => URI,
                ],
                'post_id' => get_the_ID(),
            ]
        );

        $google_maps_key = 'AIzaSyBJ0jH-euSUoDHMTRdaky1n2VxzYH1Y6qc';
        $js_google_maps  = '//maps.googleapis.com/maps/api/js?key='.$google_maps_key;
        wp_register_script('google-maps', $js_google_maps, [], null, true);


        $css_google_fonts = '//fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700';
        wp_register_style('google-fonts', $css_google_fonts);

        // CSS
        $css_global = URI.'dist/main.min.css';
        wp_enqueue_style('global', $css_global, [], VERISON, 'all');
    }

    public function head()
    {
        wp_enqueue_script('jquery');
        wp_enqueue_style('global');
        wp_enqueue_style('google-fonts');
    }

    public function footer()
    {
        wp_enqueue_script('global');
    }

    public function asyncScripts($url)
    {
        if (strpos($url, '#asyncload') === false) {
            return $url;
        } else {
            if (is_admin()) {
                return str_replace('#asyncload', '', $url);
            } else {
                return str_replace('#asyncload', '', $url)."' async='async";
            }
        }
    }

    public function deferScripts($url)
    {
        if (strpos($url, '#deferload') === false) {
            return $url;
        } else {
            if (is_admin()) {
                return str_replace('#deferload', '', $url);
            } else {
                return str_replace('#deferload', '', $url)."' defer='defer";
            }
        }
    }
}
