<?php

namespace Mizner\Candidate\InlineStyles;

class Fonts
{
    public static function render()
    {
        ob_start();
        ?>
        <style>
            body {
                font-family: Baskerville, "Baskerville Old Face", "Hoefler Text", Garamond, "Lucida Grande", Verdana, Arial, "Bitstream Vera Sans", sans-serif;
            }

            h1, h2, h3, h4, h5, h6, button, .button, [type="button"], li.menu-item a {
                /*font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;*/
                font-family: 'Oswald', sans-serif;
            }
        </style>
        <?php
        return ob_get_clean();
    }
}