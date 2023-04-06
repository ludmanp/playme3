export const InitCarousels = () => {
    const facts = document.querySelector('.factsBlock__carousel');
    const clients = document.querySelector('.clientsBlock__carousel');
    const services = document.querySelector('.servicesBlock__carousel');
    const partners = document.querySelector('.partnersBlock__carousel');
    const blogs = document.querySelector('.blogBlock__carousel');
    const participants = document.querySelector('.participantsBlock__carousel');
    const clientsAdditional = document.querySelector('.clientsAdditional__carousel');
    const teamPortfolioLinks = document.querySelector('.team__portfolioLinks');
    const projects = document.querySelector('.projectCard__tags');

    if (facts) {
        const carouselId = facts.dataset.targetCarousel;

        $(`.factsBlock__carousel[data-target-carousel="${carouselId}"]`).slick({
            variableWidth: true,
            arrows:true,
            infinite: false,
            swipeToSlide: true,
            prevArrow:  $(`.factsBlock__arrows[data-target-carousel="${carouselId}"] .previous`),
            nextArrow:  $(`.factsBlock__arrows[data-target-carousel="${carouselId}"] .next`)
        });
    }

    if (clients) {
        const carouselId = clients.dataset.targetCarousel;

        $(`.clientsBlock__carousel[data-target-carousel="${carouselId}"]`).slick({
            variableWidth: true,
            arrows:true,
            infinite: false,
            swipeToSlide: true,
            prevArrow:  $(`.carousel__arrows[data-target-carousel="${carouselId}"] .previous`),
            nextArrow:  $(`.carousel__arrows[data-target-carousel="${carouselId}"] .next`)
        });
    }

    if (services) {
        const carouselId = services.dataset.targetCarousel;

        $(`.servicesBlock__carousel[data-target-carousel="${carouselId}"]`).slick({
            variableWidth: true,
            arrows:true,
            infinite: false,
            swipeToSlide: true,
            prevArrow:  $(`.carousel__arrows[data-target-carousel="${carouselId}"] .previous`),
            nextArrow:  $(`.carousel__arrows[data-target-carousel="${carouselId}"] .next`),
            responsive: [
                {
                    breakpoint: 767,
                    settings: "unslick"
                }
            ]
        });
    }

    if (partners) {
        const carouselId = partners.dataset.targetCarousel;

        $(`.partnersBlock__carousel[data-target-carousel="${carouselId}"]`).slick({
            variableWidth: true,
            arrows:true,
            infinite: false,
            swipeToSlide: true,
            prevArrow:  $(`.carousel__arrows[data-target-carousel="${carouselId}"] .previous`),
            nextArrow:  $(`.carousel__arrows[data-target-carousel="${carouselId}"] .next`)
        });
    }

    if (blogs) {
        const carouselId = blogs.dataset.targetCarousel;

        $(`.blogBlock__carousel[data-target-carousel="${carouselId}"]`).slick({
            variableWidth: true,
            arrows:true,
            infinite: false,
            swipeToSlide: true,
            prevArrow:  $(`.carousel__arrows[data-target-carousel="${carouselId}"] .previous`),
            nextArrow:  $(`.carousel__arrows[data-target-carousel="${carouselId}"] .next`),
            responsive: [
                {
                    breakpoint: 767,
                    settings: "unslick"
                }
            ]
        });
    }

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


    if (participants) {
        const carouselId = participants.dataset.targetCarousel;

        $(`.participantsBlock__carousel[data-target-carousel="${carouselId}"]`).slick({
            margin: 32,
            variableWidth: true,
            arrows:true,
            infinite: false,
            swipeToSlide: true,
            prevArrow:  $(`.carousel__arrows[data-target-carousel="${carouselId}"] .previous`),
            nextArrow:  $(`.carousel__arrows[data-target-carousel="${carouselId}"] .next`)
        });
    }

    if (clientsAdditional) {
        const carouselId = clientsAdditional.dataset.targetCarousel;

        $(`.clientsAdditional__carousel[data-target-carousel="${carouselId}"]`).slick({
            margin: 32,
            variableWidth: true,
            arrows:true,
            infinite: false,
            swipeToSlide: true,
            prevArrow:  $(`.carousel__arrows[data-target-carousel="${carouselId}"] .previous`),
            nextArrow:  $(`.carousel__arrows[data-target-carousel="${carouselId}"] .next`),
            responsive: [
                {
                    breakpoint: 768,
                    settings: 'unslick'
                }
            ]
        });
    }

    if (teamPortfolioLinks) {
        const carouselId = teamPortfolioLinks.dataset.targetCarousel;

        $(`.team__portfolioLinks[data-target-carousel="${carouselId}"]`).slick({
            margin: 32,
            variableWidth: true,
            arrows:true,
            infinite: false,
            swipeToSlide: true,
            mobileFirst: true,
            prevArrow:  $(`.carousel__arrows[data-target-carousel="${carouselId}"] .previous`),
            nextArrow:  $(`.carousel__arrows[data-target-carousel="${carouselId}"] .next`),
            responsive: [
                {
                    breakpoint: 320,
                    settings: 'unslick'
                },
                {
                    breakpoint: 768,
                    settings: 'slick'
                },
                {
                    breakpoint: 1280,
                    settings: 'unslick'
                },
            ]
        });
    }

    if (projects) {
        const projectTags = document.querySelectorAll('.projectCard__tags');

        if (projectTags) {
            projectTags.forEach((projectTag) => {
                const carouselId = projectTag.dataset.targetCarousel;

                $(`.projectCard__tags[data-target-carousel="${carouselId}"]`).slick({
                    variableWidth: true,
                    arrows:true,
                    infinite: false,
                    swipeToSlide: true,
                    prevArrow:  $(`.carousel__arrows[data-target-carousel="${carouselId}"] .previous`),
                    nextArrow:  $(`.carousel__arrows[data-target-carousel="${carouselId}"] .next`)
                });

            });
        }
    }
}
