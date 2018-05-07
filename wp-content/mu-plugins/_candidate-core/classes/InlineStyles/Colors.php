<?php

namespace HG\CandidateCore\InlineStyles;

class Colors
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

        $prefix          = 'site_globals_';
        $color_primary   = get_option($prefix.'color_primary');
        $color_secondary = get_option($prefix.'color_secondary');

        if (!$color_primary || !$color_secondary) {
            return null;
        }

        ob_start();
        ?>
        <style>
            .button__primary {
                background-color: <?php echo esc_attr($color_primary); ?>;
                border-color: <?php echo esc_attr($color_primary); ?>;
            }

            .background-color__primary {
                background-color: <?php echo esc_attr($color_primary); ?>;
            }

            .button__primary__ghosty {
                background-color: transparent;
                /*border-style: dashed;*/
                color: <?php echo esc_attr($color_primary); ?>;
            }

            .button__secondary {
                background-color: <?php echo esc_attr($color_secondary); ?>;
                border-color: <?php echo esc_attr($color_secondary); ?>;
            }

            .background-color__secondary {
                background-color: <?php echo esc_attr($color_secondary); ?>;
            }

            .page #wrapper {
                background-color: #777777;
            }
        </style>
        <?php
        return ob_get_clean();
    }
}