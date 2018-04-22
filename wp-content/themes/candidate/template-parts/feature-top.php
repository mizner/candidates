<?php

use HG\CandidateCore\Mailchimp\Forms\EmailOnly;

use HG\CandidateCore\TemplateData\Feature;
use HG\CandidateCore\Utils\Esc;

$data = new Feature('feature_one');
if ($data->active) :
    ?>
    <section class="feature template-part background-color__primary">
        <div class="container">
            <div class="feature__image">
                <img src="<?php echo Esc::url($data->image->url); ?>">
            </div>
            <div class="feature__content">
                <article class="feature__article">
                    <h3><?php echo Esc::title($data->title); ?></h3>
                    <?php echo Esc::WYSIWYG($data->description); ?>
                    <?php if ($data->button) : ?>
                        <a href="<?php echo Esc::url($data->button->url); ?>">
                            <button class="button">
                                <span><?php echo Esc::title($data->button->title); ?></span>
                            </button>
                        </a>
                    <?php endif; ?>
                </article>
            </div>
        </div>
    </section>
<?php
endif;