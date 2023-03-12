export const InitToggleNavLink = () => {
    const navLinks = document.querySelectorAll('.header__navigation .link');
    const currentLink = window.location.pathname;

    navLinks.forEach(link => {
        const linkInnerText = link.innerText.split(' ')[0].toLowerCase();

        if (currentLink.includes(linkInnerText)) {
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
