export const InitToggleMenu = () => {
    const openMenu = document.querySelector('.header__hamburger');
    const menu = document.querySelector('.mobileMenu');
    const closeMenu = document.querySelector('.mobileMenu__header');

    openMenu.addEventListener('click', () => {
        menu.classList.add('mobileMenu_shown');
    });

    closeMenu.addEventListener('click', () => {
        menu.classList.remove('mobileMenu_shown');
    })
}
