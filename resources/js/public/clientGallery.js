export const InitClientGallery = () => {
    const numberOfSlides = $('.clientGallery__carouselDot').length;

    $('.clientGallery__slider').slick({
        autoplay: false,
        slidesToScroll: 1,
        slidesToShow: 1,
        arrows: false,
        dots: false,
        asNavFor: '.clientGallery__carouselDots',
    });

    $('.clientGallery__carouselDots').slick({
        autoplay: false,
        slidesToShow: numberOfSlides,
        slidesToScroll: 1,
        asNavFor: '.clientGallery__slider',
        dots: true,
        focusOnSelect: true,
        variableWidth: true,
    });

// Remove active class from all thumbnail slides
    $('.clientGallery__carouselDots .slick-slide').removeClass('slick-active');

// Set active class to first thumbnail slides
    $('.clientGallery__carouselDots .slick-slide').eq(0).addClass('slick-active');

// On before slide change match active thumbnail to current slide
    $('.clientGallery__slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
        let mySlideNumber = nextSlide;
        $('.clientGallery__carouselDots .slick-slide').removeClass('slick-active');
        $('.clientGallery__carouselDots .slick-slide').eq(mySlideNumber).addClass('slick-active');
    });



}
