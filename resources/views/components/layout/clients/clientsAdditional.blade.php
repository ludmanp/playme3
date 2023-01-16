<div class='clientsAdditional__block'>
    <x-common.contentBlock>
        <x-slot name="header">
            <h3>{{ $title ?? '' }}</h3>
        </x-slot>
    </x-common.contentBlock>
    <div class='clientsAdditional__carousel'>
        {{ $slot }}
    </div>
</div>
