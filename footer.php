<?php

use HG\CandidateCore\TemplateData\Footer;
use HG\CandidateCore\Utils\Esc;

do_action('candidate_before_footer');
get_template_part('template-parts/cta-global');

$data = new Footer();

?>
    <footer id="siteFooter" class="site-footer">
        <div class="container">
            <p class="site-footer__copyright">
                <?php echo Esc::WYSIWYG($data->copyright); ?>
            </p>
        </div>
    </footer><!-- #siteFooter -->
<?php
do_action('candidate_after_footer');
wp_footer();
