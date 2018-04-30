<?php

use HG\CandidateCore\TemplateData\ActBlue;
use HG\CandidateCore\Utils\Esc;

$data = new ActBlue();

if ($data->active) :
    ?>
    <section class="act-blue component donation">
        <div class="container">
            <div class="donation__primary">
                <h3><?php echo Esc::title($data->title); ?></h3>
                <p><?php echo Esc::title($data->description); ?></p>
            </div>
            <div class="donation__secondary">
                <?php foreach ($data->amounts as $amount) : ?>
                    <a href="<?php echo esc_url("{$data->form_url}/?amount={$amount}"); ?>">
                        <button class="button button__secondary">
                            <span><?php echo __('$'.Esc::title($amount)); ?></span>
                        </button>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php
endif;