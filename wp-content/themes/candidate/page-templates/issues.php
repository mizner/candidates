<?php
/**
 * Template Name: Issues
 */

use HG\CandidateCore\TemplateData\Issues;
use HG\CandidateCore\Utils\Esc;

$data = new Issues();

get_header();
get_template_part('template-parts/page-header');
?>
    <section class="page__inner box-shadow">
        <div class="container">
            <div class="content__inner">
                <?php
                if (empty(get_object_vars($data->issues_items))) :
                    ?>
                    <article>
                        <h2><?php echo __('Coming soon'); ?></h2>
                    </article>
                <?php
                else :
                    foreach ($data->issues_items as $issue) : ?>
                        <article class="issue">
                            <h3><?php echo Esc::title($issue->title); ?></h3>
                            <p><?php echo wp_kses_post($issue->description); ?></p>
                        </article>
                    <?php
                    endforeach;
                endif;
                ?>
            </div>
            <div class="image__inner">
            </div>
        </div>
    </section>
<?php
get_footer();