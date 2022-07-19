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

    $(".blogCard__tags").slick({
        variableWidth: true,
        arrows:true,
        infinite: false,
        swipeToSlide: true
    });

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
