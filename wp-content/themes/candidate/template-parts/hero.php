<?php

use HG\CandidateCore\Mailchimp\Forms\EmailOnly;
use HG\CandidateCore\TemplateData\Hero;
use HG\CandidateCore\Utils\Esc;

$data = new Hero();

$classes   = [];
$classes[] = 'hero';
$classes[] = 'template-part';
$classes[] = 'background-color__secondary';
$classes[] = 'hero-alignment-' . $data->hero_alignment;
$classes[] = $data->hero_content_background;
?>

<section class="hero template-part background-color__secondary <?php echo esc_attr( implode( ' ', $classes ) ) ?>">
    <img class="hero-background-image" src="<?php echo esc_url( $data->background_image ); ?>"
         alt="<?php echo Esc::title( $data->title ); ?>">
    <img class="hero-mobile-image" src="<?php echo esc_url( $data->background_image_mobile ); ?>"
         alt="<?php echo Esc::title( $data->title ); ?>">
    <div class="container">

        <div class="hero__cta">
            <h2><?php echo Esc::title( $data->title ); ?></h2>
            <div class="hero__cta-form">
				<?php
				if ( class_exists( EmailOnly::class ) ) {
					echo EmailOnly::render();
				};
				?>
                <div class="hero__icons">
					<?php get_template_part( 'template-parts/social-media' ); ?>
                </div>
            </div>
        </div>
    </div>
</section>
