export const InitClientGallery = () => {
    let itemMain = $('#itemMain');

    itemMain
        .owlCarousel({
            items: 1,
            slideSpeed: 2000,
            appendDots: $('#carousel-custom-dots'),
            nav: false,
            autoWidth:true,
            autoplay: false,
            center: true,
            dots: true,
            loop: false,
            responsiveRefreshRate: 200,
        })

    $('.owl-dot').click(function () {
        itemMain.trigger('to.owl.carousel', [$(this).index(), 300]);
    });

}
