<div class='partnersBlock'>
    <x-common.container>
        <x-common.contentBlock>
            <x-slot name="header">
                <h3>Партнеры</h3>
            </x-slot>
            <x-slot name="arrows">
                <div class='carousel__arrows partnersBlock__arrows' data-target-carousel='{{ $carouselId ?? '' }}'>
                    <button class='previous'>
                        <x-icons.arrowLeft></x-icons.arrowLeft>
                    </button>
                    <button class='next'>
                        <x-icons.arrowRight></x-icons.arrowRight>
                    </button>
                </div>
            </x-slot>
        </x-common.contentBlock>
        <x-layout.home.partnersCarousel :carousel-id="'partners'" :partners="$partners">
        </x-layout.home.partnersCarousel>
    </x-common.container>
</div>
