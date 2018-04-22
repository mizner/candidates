<?php
/**
 * Template Name: Contact
 */

get_header();
get_template_part('template-parts/page-header');
while (have_posts()) :
    the_post();
    ?>
    <section class="contact main_template">
        <div class="container">
            <article class="page__inner box-shadow">
                <?php the_content(); ?>
            </article>
        </div>
    </section>
<?php
endwhile;
get_footer();