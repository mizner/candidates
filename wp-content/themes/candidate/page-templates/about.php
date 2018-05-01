<?php
/**
 * Template Name: About
 */

use HG\CandidateCore\TemplateData\About;
use HG\CandidateCore\Utils\Esc;

get_header();
get_template_part('template-parts/page-header');

if (class_exists(About::class)) :
    $data = new About();
    ?>
        <section class="page__inner box-shadow">
            <div class="container about__container">
                <article class="content__inner">
				    <?php echo Esc::WYSIWYG($data->bio); ?>
                </article>
            </div>
        </section>
<?php
endif;
get_footer();
