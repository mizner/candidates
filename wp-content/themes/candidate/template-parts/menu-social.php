<?php

if (has_nav_menu('menu_social')) :
    wp_nav_menu([
        'theme_location'  => 'menu_social',
        'container'       => 'nav',
        'container_id'    => 'menuSocialWrapper',
        'container_class' => 'menu-social__wrapper',
        'menu_id'         => 'menuSocial',
        'menu_class'      => 'menu-social',
        'depth'           => 1,
        'fallback_cb'     => '',
    ]);
endif;
