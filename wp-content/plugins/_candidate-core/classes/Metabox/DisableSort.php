<?php

namespace HG\CandidateCore\Metabox;

class DisableSort
{
    public static function init()
    {
        $class = new self;
        add_action('admin_footer', [$class, 'inlineScript']);
    }

    public function inlineScript()
    {
        ?>
        <script>
            (function ($) {
                $('.meta-box-sortables').sortable({
                    disabled: true
                });

                $('.postbox .hndle').css('cursor', 'pointer');
            })(jQuery);
        </script>
        <?php
    }
}