<?php

/**
 * Template Name: Homepage
 */

get_header();

while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/hero' );

	get_template_part( 'template-parts/intro' );

	echo do_shortcode( '[event-grid]' );

	get_template_part( 'template-parts/donations' );

	get_template_part( 'template-parts/about' );

endwhile;

get_footer();