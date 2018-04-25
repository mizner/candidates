<?php

namespace HG\Candidate;

use const HG\Candidate\PATH;

/**
 * Class SVG
 * @package Pyxl\Theme
 * @return HTML
 */
class SVG
{
    /**
     * @param $filename
     * @return string|void
     */
    public static function get($filename)
    {
        $filepath = PATH.'/svg/'.$filename.'.svg';

        if (!file_exists($filepath)) {
            return;
        }

        ob_start();

        include $filepath;

        return ob_get_clean();
    }
}
