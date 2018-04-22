<?php

use HG\CandidateCore\Mailchimp\Forms\EmailOnly;
use HG\Candidate\SVG;
use HG\CandidateCore\TemplateData\Hero;
use HG\CandidateCore\Utils\Esc;

$data = new Hero();

?>
<section class="hero template-part">
    <div class="background-image"
         style="background-image: url('<?php echo esc_url($data->background_image); ?>');
                 background-size: cover;
                 background-position: center"
    ></div>
    <div class="container">

        <div class="hero__cta">
            <h2><?php echo Esc::title($data->title); ?></h2>
            <div class="hero__cta-form">
                <?php
                if (class_exists(EmailOnly::class)) {
                    echo EmailOnly::render();
                };
                ?>
                <div class="hero__icons">
                    <?php
                    if (class_exists(SVG::class)) :
                        echo SVG::get('brands/facebook');
                        echo SVG::get('brands/twitter');
                        echo SVG::get('brands/youtube');
                        echo SVG::get('brands/instagram');
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
