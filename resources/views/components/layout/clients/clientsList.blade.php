@php
    $clients = [['href' => '#', 'image' => '../img/clients/rubase.svg', 'imageAlt' => 'rubase'],
            ['href' => '#', 'image' => '../img/clients/vtb.svg', 'imageAlt' => 'vtb'],
            ['href' => '#', 'image' => '../img/clients/sber.svg', 'imageAlt' => 'sber'],
            ['href' => '#', 'image' => '../img/clients/qiwi.svg', 'imageAlt' => 'qiwi'],
            ['href' => '#', 'image' => '../img/clients/rosbank.svg', 'imageAlt' => 'rosbank'],
            ['href' => '#', 'image' => '../img/clients/audiomania.svg', 'imageAlt' => 'audiomania'],
            ]
@endphp


<div class='clientsList__block'>
    <x-common.contentBlock>
        <x-slot name="header">
            <h3>клиенты</h3>
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
