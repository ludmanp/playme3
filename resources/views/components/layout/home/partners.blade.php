<div class='partnersBlock'>
    <x-common.container>
        <x-common.contentBlock>
            <x-slot name="header">
                <h3>Партнеры</h3>
            </x-slot>
        </x-common.contentBlock>
        <x-layout.home.partnersCarousel :partners="$partners">
        </x-layout.home.partnersCarousel>
    </x-common.container>
</div>
