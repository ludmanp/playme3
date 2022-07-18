import A11yDialog from 'a11y-dialog';

export const InitModals = () => {
    const modalElements = document.querySelectorAll('[data-modal]');
    const menu = document.querySelector('.mobileMenu');

    if (modalElements) {
        modalElements.forEach((modalElement) => {
            const modal = new A11yDialog(modalElement);
            modal.hide();
            if (window.location.href.indexOf(modalElement.id) > 0) {
                modal.show();
            }

            modal.on('show', function (dialogEl, triggerEl) {
                console.log(dialogEl);
                console.log(triggerEl);
                menu.classList.remove('mobileMenu_shown');
            });
            const wrapper = modalElement.querySelector('.modal__wrapper');
            if (wrapper) {
                wrapper.addEventListener('click', (event) => {
                    if (event.target === wrapper || (event.target.tagName === "SPAN" && event.target.className !== "checkbox__checkmark")) {
                        modal.hide();
                    }
                });
            }
        });
    }
};
