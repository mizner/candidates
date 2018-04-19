<?php
do_action('sl_before_footer');
?>
    <footer id="siteFooter" class="site-footer">
        <div class="container">
            <p class="site-footer__copyright">
                <?php echo wp_kses_post(sprintf(
                    '%s | All Rights Reserved &copy; %s',
                    get_bloginfo('name'),
                    date('Y')
                )); ?>
            </p>
            <p>P.O. Box 7130, Maryville TN 37802</p>
            <p class="footer_paid">Paid for by Susan Sneed for TN State District</p>
            <p>Lisa Thomas, Treasurer</p>
            <?php // get_template_part('template-parts/newsletter'); ?>
        </div>
    </footer><!-- #siteFooter -->
<?php
do_action('sl_after_footer');
wp_footer();
