<?php
/**
 * Template Name: Front Page
 */

get_header();
$post_id = get_the_ID();


get_template_part('template-parts/hero');
?>

    <section class="about">
        <div class="container">
            <div class="about__inner">
                <?php get_template_part('components/act-blue'); ?>
                <?php get_template_part('template-parts/about'); ?>
            </div>
            <?php

            $title       = get_post_meta($post_id, 'title', true);
            $description = get_post_meta($post_id, 'site_globals_about', true);
            ?>
            <article>
                <h3>Why I'm Running</h3>
                <?php echo apply_filters('the_content', $content); ?>
            </article>
        </div>
    </section>
<?php
get_footer();
