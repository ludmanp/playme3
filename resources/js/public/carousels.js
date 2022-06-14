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
    });

}
