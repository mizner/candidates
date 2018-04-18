<?php

namespace HG\CandidateCore\Utils;

class GetPost
{
    public static function bySlug($post_title = '', $post_type = 'post')
    {
        global $wpdb;

        if (is_array($post_type)) {
            $post_type           = esc_sql($post_type);
            $post_type_in_string = "'".implode("','", $post_type)."'";
            $sql                 = $wpdb->prepare("
			SELECT ID
			FROM $wpdb->posts
			WHERE post_name = %s
			AND post_type IN ($post_type_in_string)
		", $post_title);
        } else {
            $sql = $wpdb->prepare("
			SELECT ID
			FROM $wpdb->posts
			WHERE post_name = %s
			AND post_type = %s
		", $post_title, $post_type);
        }

        $post_id = $wpdb->get_var($sql);


        return boolval($post_id) ? $post_id : null;
    }
}