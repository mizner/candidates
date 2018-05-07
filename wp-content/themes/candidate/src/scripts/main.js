(($) => {
    const button = document.getElementById('menuMobileButton');
    const menu = document.getElementById('menuPrimary');
    button.addEventListener('click', ev => {
        menuExpand(ev);
    }, false);

    const elementToggleAria = e => {
        'true' === e.getAttribute('aria-expanded') ?
            e.setAttribute('aria-expanded', 'false') :
            e.setAttribute('aria-expanded', 'true');
    };

    const menuExpand = ev => {
        elementToggleAria(menu);
        elementToggleAria(button);
    };

})(jQuery);