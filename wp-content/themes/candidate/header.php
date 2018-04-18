<?php
get_template_part('head');
do_action('sl_before_header');
$logo_id  = (string)get_option('site_globals_logo');
$logo_url = wp_get_attachment_image_url($logo_id, 'medium');

$button_one      = get_option('site_globals_button_one');
$button_one_link = $button_one ? $button_one['url'] : '#';
$button_one_text = $button_one ? $button_one['title'] : 'Volunteer';

$button_two      = get_option('site_globals_button_two');
$button_two_link = $button_two ? $button_two['url'] : '#';
$button_two_text = $button_two ? $button_two['title'] : 'Donate';
?>
    <header id="siteHeader" class="site-header">
        <div class="container">
            <div class="site-header__primary">
                <?php if ($logo_id) : ?>
                    <figure id="logo" class="site-header__logo">
                        <img src="<?php echo esc_url($logo_url); ?>"
                             alt="<?php echo esc_html(get_bloginfo('name')); ?>">
                    </figure>
                <?php else : ?>
                    <h1 id="logo" class="site-header__logo-text"><?php echo esc_html(get_bloginfo('name')); ?></h1>
                <?php endif; ?>
            </div>
            <div class="site-header__secondary">
                <div class="site-header__buttons">
                    <a href="<?php echo esc_url($button_one_link); ?>">
                        <button class="site-header__button site-header__button-one button button__primary" type="button">
                            <span><?php echo esc_html($button_one_text); ?></span>
                        </button>
                    </a>
                    <a href="<?php echo esc_url($button_two_link); ?>">
                        <button class="site-header__button site-header__button-two button button__secondary" type="button">
                            <span><?php echo esc_html($button_two_text); ?></span>
                        </button>
                    </a>
                </div>

                <?php if (has_nav_menu('primary-menu')) : ?>
                    <nav class="site-header__navigation">
                        <?php wp_nav_menu('primary-menu'); ?>
                    </nav>
                <?php endif; ?>
            </div>
        </div>
    </header><!-- #siteHeader -->
<?php
do_action('sl_after_header');
