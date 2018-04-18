<section class="no-results not-found">
    <div class="container">
        <header>
            <h1><?php esc_html_e('Nothing Found'); ?></h1>
        </header>
        <div class="page-content">
            <?php
            if (is_search()) : ?>
                <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.'); ?></p>
                <?php
                get_search_form();

            else : ?>
                <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.'); ?></p>
                <?php
                get_search_form();

            endif; ?>
        </div>
    </div>
</section>
