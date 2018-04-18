<?php

use HG\CandidateCore\Mailchimp\Forms\EmailOnly;

?>

<section class="newsletter">
    <div class="container">
        <?php
        if (class_exists(EmailOnly::class)) {
            echo EmailOnly::render();
        };
        ?>
    </div>
</section>
