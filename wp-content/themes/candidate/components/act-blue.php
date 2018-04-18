<?php
$prefix    = 'site_globals_';
$title     = get_option($prefix.'title');
$form_name = get_option($prefix.'form_name');
$form_url  = 'https://secure.actblue.com/contribute/page/'.$form_name;
$amounts   = explode(',', get_option($prefix.'amounts'));
if ($form_name) :
    ?>
    <section class="act-blue component donation">
        <div class="donation__primary">
            <h3><strong>Support</strong> Our Campaign</h3>
        </div>
        <div class="donation__secondary">
            <?php foreach ($amounts as $amount) : ?>
                <a href="<?php echo esc_url("{$form_url}/?amount={$amount}"); ?>">
                    <button class="button button__secondary">
                        <span><?php echo esc_html('$'.$amount); ?></span>
                    </button>
                </a>
            <?php endforeach; ?>
        </div>
    </section>
<?php
endif;