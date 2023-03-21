<div class='cliensBlock'>
    <x-common.container>
        <x-common.contentBlock>
            <x-slot name="header">
                <h3>@lang('Clients')</h3>
            </x-slot>
            <x-slot name="arrows">
                <div class='carousel__arrows clientsBlock__arrows' data-target-carousel='{{ $carouselId ?? '' }}'>
                    <button class='previous'>
                        <x-icons.arrowLeft></x-icons.arrowLeft>
                    </button>
                    <button class='next'>
                        <x-icons.arrowRight></x-icons.arrowRight>
                    </button>
                </div>
            </x-slot>
        </x-common.contentBlock>
        <x-layout.home.clientsCarousel :carousel-id="'clients'" :clients="$clients">
        </x-layout.home.clientsCarousel>
    </x-common.container>
</div>
