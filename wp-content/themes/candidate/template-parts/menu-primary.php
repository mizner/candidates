<?php
?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark bg-faded">
    <div class="container">
        <button type="button" aria-controls="siteNavigation" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
        wp_nav_menu([
            'menu'            => 'menu_primary',
            'theme_location'  => 'menu_primary',
            'container'       => 'div',
            'container_id'    => 'siteNavigation',
            'container_class' => '',
            'menu_id'         => false,
            'menu_class'      => '',
            'depth'           => 1,
        ]);
        ?>
    </div>
</nav>