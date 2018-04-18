<?php
/**
 * Template Name: Front Page
 */

get_header();
get_template_part('template-parts/hero');
?>

    <section class="about">
        <?php
        $content = get_option('site_globals_about');
        ?>
        <div class="container">
            <div class="about__inner">
                <section class="donation">
                    <div class="container">
                        <?php get_template_part('components/act-blue'); ?>
                    </div>
                </section>
                <article>
                    <h3>Why I'm Running</h3>
                    <?php echo apply_filters('the_content', $content); ?>
                </article>
            </div>
        </div>
    </section>
<?php
get_footer();
