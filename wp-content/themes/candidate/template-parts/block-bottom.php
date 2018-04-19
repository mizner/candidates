<?php
use HG\CandidateCore\Mailchimp\Forms\EmailOnly;
?>
<section class="content_block_bottom template-part">
    <div class="container">

        <div class="block_content content_left">
            <div class="block_content_inner">
            <h2>Sign Up Today</h2>
	            <?php
	            if (class_exists(EmailOnly::class)) {
		            echo EmailOnly::render();
	            };
	            ?>
            </div>
        </div>

        <div class="block_image image_right">
            <img src="/wp-content/uploads/2018/04/jamie-block2.jpg">
        </div>

    </div>
</section>
