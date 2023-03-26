<div class='servicesBlock'>
    <x-common.container>
        <x-common.contentBlock>
            <x-slot name="header">
                <h3>Сервисы</h3>
            </x-slot>
            <x-slot name="arrows">
                <div class='carousel__arrows servicesBlock__arrows' data-target-carousel='{{ $carouselId ?? '' }}'>
                    <button class='previous'>
                        <x-icons.arrowLeft></x-icons.arrowLeft>
                    </button>
                    <button class='next'>
                        <x-icons.arrowRight></x-icons.arrowRight>
                    </button>
                </div>
            </x-slot>
        </x-common.contentBlock>
        <div class='servicesBlock__carousel' data-target-carousel='{{ $carouselId ?? '' }}'>
            {{ $slot ?? '' }}
        </div>
    </x-common.container>
</div>
