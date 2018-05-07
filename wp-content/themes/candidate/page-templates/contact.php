<?php
/**
 * Template Name: Contact
 */

get_header();
get_template_part('template-parts/page-header');
while (have_posts()) :
    the_post();
    ?>
    <section class="page__inner box-shadow">
        <div class="container volunteer__container">
            <article class="content__inner">
                <?php the_content(); ?>
            </article>
        </div>
    </section>
<?php
endwhile;
get_footer();