<?php

use HG\CandidateCore\Mailchimp\Forms\EmailOnly;

use HG\CandidateCore\TemplateData\Feature;
use HG\CandidateCore\Utils\Esc;

$data = new Feature('feature_two');
if ($data->active === 'yes') :
    ?>
    <section class="feature template-part background-color__secondary">
        <div class="container">

            <div class="feature__content">
                <article class="feature__article">
                    <h3><?php echo Esc::title($data->title); ?></h3>
                    <?php echo EmailOnly::render(); ?>
                </article>
            </div>

            <div class="feature__image">
                <img src="<?php echo Esc::url($data->image->url); ?>">
            </div>

        </div>
    </section>
<?php
endif;