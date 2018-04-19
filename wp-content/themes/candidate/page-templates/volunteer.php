<?php
/**
 * Template Name: Volunteer
 */

get_header();
get_template_part('template-parts/page-header');
?>
    <section class="volunteer main_template template-part">
        <div class="container">
            <div class="content__inner">
                <form>
                    <input type="text" value="Name">
                    <input type="text" value="Email Address">
                    <input type="text" value="Phone Number">
                    <textarea cols="30" rows="10"></textarea>
                </form>
                <a href="#"><button class="button form-button">Submit</button></a>
            </div>
        </div>
    </section>
<?php
get_template_part('template-parts/cta');
get_footer();