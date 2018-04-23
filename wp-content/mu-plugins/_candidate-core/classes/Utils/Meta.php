<?php

namespace HG\CandidateCore\Utils;

class Meta
{
    public static function get($post_id, $key)
    {
        return get_post_meta($post_id, $key, true);
    }
}