export const InitMainVideo = () => {

    const btn = document.querySelector('.videoBlock__button');
    const btnClose = document.querySelector('.video__close');
    const overlay = document.querySelector(".video__overlay");

    const body = document.body;
    const launchVideo = () => {
        overlay.classList.add("show");
    }

    const stopVideo = () => {
        overlay.classList.remove("show");
    }

    if (btn) {
        btn.addEventListener('click', () => {
            launchVideo();
            body.classList.add('lock_scroll');
        });

        btnClose.addEventListener('click', () => {
            stopVideo();
            body.classList.remove('lock_scroll');
            $(".video__popupVideo").attr("src", $(".video__popupVideo").attr("src"));
        });
    }

}
