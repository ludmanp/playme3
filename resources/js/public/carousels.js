export const InitCarousels = () => {
    $(".factsBlock__carousel").slick({
        infinite: false,
        variableWidth: true,
        arrows:false,
        margin: 32,
    });

    $(".clientsBlock__carousel").slick({
        infinite: false,
        variableWidth: true,
        arrows:false,
        margin: 32,
    });

    $(".servicesBlock__carousel").slick({
        infinite: false,
        variableWidth: true,
        arrows:false,
        responsive: [
            {
                breakpoint: 767,
                settings: "unslick"
            }
        ]
    });

    $(".partnersBlock__carousel").slick({
        infinite: false,
        variableWidth: true,
        arrows:false,
    });

    $(".blogBlock__carousel").slick({
        infinite: false,
        variableWidth: true,
        arrows:false,
        responsive: [
            {
                breakpoint: 767,
                settings: "unslick"
            }
        ]
    });

    // $(".blogCard__tags").slick({
    //     variableWidth: true,
    //     arrows:true,
    //     infinite: false,
    //     swipeToSlide: true,
    // });

    const buttons = document.querySelectorAll('.blogCard__tags');



    if (buttons) {
        buttons.forEach((button) => {
            const carouselId = button.dataset.targetCarousel;

            $(`.blogCard__tags[data-target-carousel="${carouselId}"]`).slick({
                variableWidth: true,
                arrows:true,
                infinite: false,
                swipeToSlide: true,
                prevArrow:  $(`.blog__arrows[data-target-carousel="${carouselId}"] .previous`),
                nextArrow:  $(`.blog__arrows[data-target-carousel="${carouselId}"] .next`)
            });

        });
    }

    $(".tabBlock__filters").slick({
        variableWidth: true,
        arrows:true,
        infinite: false,
        swipeToSlide: true,
        mobileFirst: true,
        responsive: [
            {
                breakpoint: 768,
                settings: 'unslick'
            }
        ]
    });

    $(".participantsBlock__carousel").slick({
        infinite: false,
        variableWidth: true,
        arrows:false,
        margin: 32,
    });

    $(".clientsAdditional__carousel").slick({
        infinite: false,
        variableWidth: true,
        arrows:false,
        margin: 32,
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    variableWidth: false,
                }
            }
        ]
    });

    $(".team__portfolioLinks").slick({
        infinite: false,
        variableWidth: true,
        arrows:false,
        margin: 32,
        responsive: [
            {
                breakpoint: 767,
                settings: 'unslick'
            }
        ]
    });

    $(".projectCard__tags").slick({
        variableWidth: true,
        arrows:true,
        infinite: false,
        swipeToSlide: true
    });
}
