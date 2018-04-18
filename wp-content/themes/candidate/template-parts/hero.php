<?php

use Mizner\CandidateCore\Mailchimp\Forms\EmailOnly;
use Mizner\Candidate\SVG;

$background_image = '//i.imgur.com/a1wepVI.jpg';
$background_image = 'https://media.gannett-cdn.com/nashville/35553607001/201701/3591/35553607001_5291901418001_5291895049001-vs.jpg';
$background_image = '/wp-content/uploads/2018/04/Susan-Sneed-8-1.jpg';
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
