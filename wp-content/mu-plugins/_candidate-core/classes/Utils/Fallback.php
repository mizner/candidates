<?php

namespace HG\CandidateCore\Utils;

class Fallback
{

    public static function paragraph()
    {
        return 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.';
    }

    public static function title()
    {
        return 'Lorem ipsum dolor sit amet.';
    }

    public static function image($size = '1920x700')
    {
        return 'https://via.placeholder.com/'.$size.'/555555/ffffff';
    }
}