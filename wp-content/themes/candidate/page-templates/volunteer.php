<?php
/**
 * Template Name: Volunteer
 */

use HG\CandidateCore\TemplateData\Volunteer;
use HG\CandidateCore\Utils\Esc;

get_header();

if (class_exists(Volunteer::class)) :
    $data = new Volunteer();
    ?>
    <section class="volunteer">
        <header class="page-header template-part">
            <div class="container">
                <div class="page-header__inner">
                    <h1><?php the_title(); ?></h1>
                    <hr class="pageHR">
                </div>
            </div>
        </header>
        <div class="container volunteer__container">
            <article class="page__inner">
                <h3><?php echo Esc::title($data->subtitle); ?></h3>
				<?php echo Esc::WYSIWYG($data->description); ?>
            </article>
            <div class="content__inner mailchimp-form">
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