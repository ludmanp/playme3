export const InitToggleNavLink = () => {
    const navLinks = document.querySelectorAll('.header__navigation .link');
    const currentLink = window.location.pathname;

    const getLastPart = (url) => {
        const parts = url.split('/');
        return parts.at(-1);
    }

    const lastPartOfLink = getLastPart(currentLink);

    navLinks.forEach(link => {
        const anchorLink = link.href;

        const navLink = getLastPart(anchorLink);

        if (lastPartOfLink.includes(navLink)) {
            link.classList.add('active');
        }

        link.addEventListener('click', (event) => {
            removeActive();
            event.target.classList.add('active');
        })
    })

    const removeActive = () => {
        navLinks.forEach(link => {
            link.classList.remove('active');
        })
    }
}
