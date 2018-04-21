<?php

use HG\CandidateCore\Mailchimp\Forms\EmailOnly;
use HG\Candidate\SVG;

$post_id                   = get_the_ID();
$background_image_fallback = 'https://via.placeholder.com/1920x700/CC0000/ffffff';
$background_image_id       = get_post_meta($post_id, 'hero_image', true);
$background_image          = $background_image_id ?
    wp_get_attachment_image_url($background_image_id, 'full') :
    $background_image_fallback;
?>
<section class="hero template-part">
    <div class="background-image" style="background-image: url('<?php echo esc_url($background_image); ?>'); background-size: cover; background-position: center"></div>
    <div class="container">

        <div class="hero__cta">
            <h2>Join Our Campaign</h2>
            <div class="hero__cta-form">
                <?php
                if (class_exists(EmailOnly::class)) {
                    echo EmailOnly::render();
                };
                ?>
                <div class="hero__icons">
                    <?php
                    if (class_exists(SVG::class)):
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
