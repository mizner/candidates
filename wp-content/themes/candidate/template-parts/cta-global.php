<?php
/**
 * Site CTA
 */

use HG\CandidateCore\TemplateData\CTAGlobal;
use HG\CandidateCore\Utils\Esc;

if (class_exists(CTAGlobal::class)) :
    $data = new CTAGlobal();
    ?>
    <section class="cta-global template-part background-color__primary">
        <div class="container">
            <article class="cta-global__inner">
                <h3><?php echo Esc::title($data->title); ?></h3>
                <p><?php echo Esc::WYSIWYG($data->description); ?></p>
                <div class="cta-global__buttons">
                    <a href="<?php echo esc_url($data->buttons[0]->url); ?>">
                        <button class="button button__secondary"
                                role="button"
                                type="button">
                            <span><?php echo esc_html__($data->buttons[0]->title, 'candidate'); ?></span>
                        </button>
                    </a>
                    <a href="<?php echo esc_url($data->buttons[1]->url); ?>">
                        <button class="button button__secondary"
                                role="button"
                                type="button">
                            <span><?php echo esc_html($data->buttons[1]->title, 'candidate'); ?></span>
                        </button>
                    </a>
                </div>
            </article>
    </section>
<?php
endif;