<?php

use HG\CandidateCore\TemplateData\Intro;
use HG\CandidateCore\Utils\Esc;

$data = new Intro();
?>
<section class="intro">
    <div class="container">
        <div class="intro__inner">
            <header>
                <?php get_template_part('components/act-blue'); ?>
            </header>
            <article class="box-shadow">
                <h3><?php echo Esc::title($data->title); ?></h3>
                <?php echo Esc::WYSIWYG($data->description); ?>
            </article>
        </div>
    </div>
</section>