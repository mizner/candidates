<button id="menuMobileButton" class="button"><span>MENU</span></button>

<?php
if (has_nav_menu('menu_primary')) :
    wp_nav_menu([
        'menu'            => 'menu_primary',
        'theme_location'  => 'menu_primary',
        'container'       => 'nav',
        'container_id'    => 'menuPrimary',
        'container_class' => 'site-header__navigation',
        'menu_id'         => false,
        'menu_class'      => 'navigation',
        'depth'           => 2,
    ]);
endif;
