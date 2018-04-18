<?php

namespace HG\CandidateCore\InlineStyles;

class GoogleFonts
{
    public static function init()
    {
        $class = new self;
        add_action('get_footer', [$class, 'render']);
    }

    public function render()
    {
        echo $this->getStyles();
    }

    public function getStyles()
    {

        $prefix         = 'site_globals_';
        $font_primary   = str_replace('+', ' ', get_option($prefix.'font_primary'));
        $font_secondary = str_replace('+', ' ', get_option($prefix.'font_secondary'));

        if (!$font_primary || !$font_secondary) {
            return null;
        }

        ob_start();
        ?>
        <style>
            body {
                font-family: "<?php echo esc_html($font_primary); ?>", Helvetica, Arial, sans-serif;
            }
            h1, h2, h3, h4, h5, h6, .button, li.menu-item a {
                font-family: "<?php echo esc_html($font_secondary); ?>", Helvetica, Arial, sans-serif;
            }
        </style>
        <?php
        return ob_get_clean();
    }
}