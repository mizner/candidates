<?php
/**
 * Template Name: Contact
 */

get_header();
get_template_part('template-parts/page-header');
?>
    <section class="contact main_template template-part">
        <div class="container">
            <div class="content__inner">
                <div class="content_left">
                    <div class="info-item">
                        <span>Address:</span><br>
                        1234 Main Street<br>
                        New York, NY 11001
                    </div>
                    <div class="info-item">
                        <span>Phone:</span><br>
                        (123) 456-7890
                    </div>
                    <div class="info-item">
                        <span>Email Address:</span><br>
                        voteforme@candidate.com
                    </div>
                </div>
                <div class="content_right">
                    <form>
                        <input type="text" value="Name">
                        <input type="text" value="Email Address">
                        <input type="text" value="Phone Number">
                        <textarea cols="30" rows="10"></textarea>
                    </form>
                    <a href="#"><button class="button form-button">Submit</button></a>
                </div>
            </div>
        </div>
    </section>
<?php
get_template_part('template-parts/cta');
get_footer();