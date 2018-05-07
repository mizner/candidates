<?php
/**
 * Site CTA
 */

use HG\CandidateCore\TemplateData\CTAGlobal;
use HG\CandidateCore\Utils\Esc;

if (class_exists(CTAGlobal::class)) :
    $data = new CTAGlobal();
    ?>
    <section class="contact_cta template-part">
        <div class="container contact_cta__container">
            <h3><?php echo Esc::title($data->inner_title); ?></h3>
	        <div class="contact_cta__inner">
		        <?php get_template_part( 'template-parts/social-media' ); ?>
            </div>
        </div>
    </section>
    <section class="cta-global template-part background-color__primary">
        <div class="container">
            <article class="cta-global__inner">
                <h3><?php echo Esc::title($data->title); ?></h3>
                <p><?php echo Esc::WYSIWYG($data->description); ?></p>
                <div class="cta-global__buttons">
                    <a href="https://tnmap.tn.gov/voterlookup/">
                        <button class="button button__secondary"
                                role="button"
                                type="button">
                            <span>Find Your Polling Station</span>
                        </button>
                    </a>
                    <a href="http://www.govotetn.com/">
                        <button class="button button__secondary"
                                role="button"
                                type="button">
                            <span>Register To Vote</span>
                        </button>
                    </a>
                </div>
            </article>
    </section>
<?php
endif;