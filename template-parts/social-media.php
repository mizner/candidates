<?php

use HG\CandidateCore\TemplateData\SocialMedia;
use HG\Candidate\SVG;
use HG\CandidateCore\Utils\Esc;

$data = new SocialMedia();

if (!empty(get_object_vars($data->social_media))) :
    ?>
    <section class="social-media">
        <?php
        foreach ($data->social_media as $media) :
            ?>
            <a href="<?php echo Esc::url($media->url); ?>">
                <span class="<?php echo Esc::attr($media->network); ?>">
                    <?php echo SVG::get('brands/'.Esc::attr($media->network)); ?>
                </span>
            </a>
        <?php
        endforeach;
        ?>
    </section>
<?php
endif;