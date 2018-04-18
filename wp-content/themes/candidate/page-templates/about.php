<?php
/**
 * Template Name: About
 */

get_header();
get_template_part('template-parts/hero');
?>
    <section class="donation">
        <div class="container">

        </div>
    </section>
    <section class="about">
        <?php
        $content = get_option('site_globals_about');
        ?>
        <div class="container">
            <div class="about__inner">
                <div class="donation">
                    <div class="donation__primary">
                        <h3><strong>Support</strong> Our Campaign</h3>
                    </div>
                    <div class="donation__secondary">
                        <button class="button button__secondary">
                            <span>$5</span>
                        </button>
                        <button class="button button__secondary">
                            <span>$15</span>
                        </button>
                        <button class="button button__secondary">
                            <span>$25</span>
                        </button>
                        <button class="button button__secondary">
                            <span>$50</span>
                        </button>
                    </div>
                </div>
                <article>
                    <h3>Why I'm Running</h3>
                    <?php echo apply_filters('the_content', $content); ?>
                </article>
            </div>
        </div>
    </section>
<?php
get_footer();
