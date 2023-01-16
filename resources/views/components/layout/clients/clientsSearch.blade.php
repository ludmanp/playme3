<div class='clientsSearch__block'>
    <x-common.contentBlock>
        <x-slot name="header">
            <h3>{{ $title }}</h3>
        </x-slot>
    </x-common.contentBlock>
    <div class='clientsSearch__cards'>
        {{ $slot }}
    </div>
    {{ $paginate ?? '' }}
</div>
