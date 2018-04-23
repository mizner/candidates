<?php
/**
 * Template Name: Volunteer
 */

use HG\CandidateCore\TemplateData\Volunteer;
use HG\CandidateCore\Utils\Esc;

get_header();
get_template_part('template-parts/page-header');

if (class_exists(Volunteer::class)) :
    $data = new Volunteer();
    ?>
    <section class="volunteer background-color__primary"
             style="background-image: url('<?php echo esc_url($data->background_image); ?>');
                     background-size: cover;
                     background-position: center">
        <div class="container box-shadow">
            <article class="page__inner">
                <h3><?php echo Esc::title($data->subtitle); ?></h3>
                <?php echo Esc::WYSIWYG($data->description); ?>
            </article>
            <div class="content__inner mailchimp-form background-color__secondary">
                <div class="mailchimp-form__inner">
                    <?php if ($data->form) : ?>
                        <?php echo $data->form; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php
endif;
get_footer();