<div class='clientsList__block'>
    <x-common.contentBlock>
        <x-slot name="header">
            <h3>@lang('Clients')</h3>
        </x-slot>
    </x-common.contentBlock>
    <div class='clientsList__list'>
        @foreach ($clients as $client)
            <a class="clients__link" href='{{ $client["href"] }}'>
                <img src='{{ $client["image"] }}' alt='{{ $client["imageAlt"] }}'>
            </a>
        @endforeach
    </div>

</div>
