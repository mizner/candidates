<?php

namespace HG\CandidateCore\Mailchimp\Forms;

class EmailOnly
{
    public static function render($title = null, $buttonText = 'Join', $actionUri = null)
    {
        $actionUri = get_option('site_globals_mailchimp_action_url') ?: 'https://miznerism.us9.list-manage.com/subscribe/post?u=8d0ace3dd99aad20424f2847b&amp;id=ebe571d749';
        ob_start();
        ?>
        <div id="mc_embed_signup">
            <form action="<?php echo esc_url_raw($actionUri); ?>"
                  method="post" id="mc-embedded-subscribe-form"
                  name="mc-embedded-subscribe-form"
                  class="validate mc-form-wrapper"
                  target="_blank"
                  novalidate>
                <div id="mc_embed_signup_scroll" class="mc-form-wrapper__inner">
                    <?php if ($title) : ?>
                        <div class="mailchimp-form__title">
                            <label for="mce-EMAIL"><?php echo esc_html($title); ?></label>
                        </div>
                    <?php endif; ?>
                    <div class="mc-form">
                        <div class="mc-form__primary">
                            <input type="email"
                                   value=""
                                   name="EMAIL"
                                   class="email"
                                   id="mce-EMAIL"
                                   placeholder="email address"
                                   required>
                        </div>
                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;" aria-hidden="true">
                            <input type="text" name="b_e797ab0e1eb7153715a4a4007_1a62ce0239" tabindex="-1" value="">
                        </div>
                        <div class="mc-form__footer">
                            <button class="button" type="submit" value="Subscribe"
                                    name="subscribe" id="mc-embedded-subscribe">
                                <span><?php echo esc_html($buttonText); ?></span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php
        return ob_get_clean();
    }
}