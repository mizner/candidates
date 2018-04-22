<?php
get_template_part('head');
do_action('candidate_before_header');

use HG\CandidateCore\TemplateData\Header;

if (class_exists(Header::class)) :
    $data = new Header();
    ?>
    <header id="siteHeader" class="site-header">
        <div class="container">
            <div class="site-header__primary">
                <?php if ($data->logo->url) : ?>
                    <figure id="logo" class="site-header__logo">
                        <img src="<?php echo esc_url($data->logo->url); ?>"
                             alt="<?php echo esc_html(get_bloginfo('name')); ?>">
                    </figure>
                <?php else : ?>
                    <h1 id="logo" class="site-header__logo-text"><?php echo esc_html(get_bloginfo('name')); ?></h1>
                <?php endif; ?>
            </div>
            <div class="site-header__secondary">
                <div class="site-header__buttons">
                    <a href="<?php echo esc_url($data->buttons[0]->url); ?>">
                        <button class="site-header__button button button__primary button__primary__ghosty"
                                role="button"
                                type="button">
                            <span><?php echo esc_html__($data->buttons[0]->title, 'candidate'); ?></span>
                        </button>
                    </a>
                    <a href="<?php echo esc_url($data->buttons[1]->url); ?>">
                        <button class="site-header__button button button__secondary"
                                role="button"
                                type="button">
                            <span><?php echo esc_html($data->buttons[1]->title, 'candidate'); ?></span>
                        </button>
                    </a>
                </div>
                <?php get_template_part('template-parts/navigation-primary'); ?>
            </div>
        </div>
    </header><!-- #siteHeader -->
    <?php
    unset($data);
endif;
do_action('candidate_after_header');