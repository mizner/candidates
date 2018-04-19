<?php

use HG\CandidateCore\Mailchimp\Forms\EmailOnly;
use Mizner\Candidate\SVG;
$post_id = get_the_ID();
$background_image = '//i.imgur.com/a1wepVI.jpg';
$background_image = 'https://media.gannett-cdn.com/nashville/35553607001/201701/3591/35553607001_5291901418001_5291895049001-vs.jpg';
$background_image_id = get_post_meta($post_id,'hero_image',true);
$background_image = wp_get_attachment_image_url($background_image_id, 'full');
?>
<section class="hero template-part">
    <div class="background-image" style="background-image: url('<?php echo esc_url($background_image); ?>')"></div>
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
