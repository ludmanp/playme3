<div class='clientsAdditional__block'>
    <x-common.contentBlock>
        <x-slot name="header">
            <h3>{{ $title ?? '' }}</h3>
        </x-slot>
        <x-slot name="arrows">
            <div class='carousel__arrows clientsAdditional__arrows' data-target-carousel='{{ $carouselId ?? '' }}'>
                <button class='previous'>
                    <x-icons.arrowLeft></x-icons.arrowLeft>
                </button>
                <button class='next'>
                    <x-icons.arrowRight></x-icons.arrowRight>
                </button>
            </div>
        </x-slot>
    </x-common.contentBlock>
    <div class='clientsAdditional__carousel' data-target-carousel='{{ $carouselId ?? '' }}'>
        {{ $slot }}
    </div>
</div>
