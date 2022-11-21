<div class='cliensBlock'>
    <x-common.container>
        <x-common.contentBlock>
            <x-slot name="header">
                <h3>@lang('Clients')</h3>
            </x-slot>
        </x-common.contentBlock>
        <x-layout.home.clientsCarousel :clients="$clients">
        </x-layout.home.clientsCarousel>
    </x-common.container>
</div>
