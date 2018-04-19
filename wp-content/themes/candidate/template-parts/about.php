<?php
$post_id     = get_the_ID();
$title       = get_post_meta($post_id, 'title', true) ?: 'Why I\'m Running';
$description = get_post_meta($post_id, 'site_globals_about', true);
?>
<section class="home-about">
    <div class="container">
        <div class="home-about__inner">
            <header>
                <?php get_template_part('components/act-blue'); ?>
            </header>
            <article>
                <h3><?php echo esc_html__($title); ?></h3>
                <?php echo apply_filters('the_content', $description); ?>
            </article>
        </div>
    </div>
</section>