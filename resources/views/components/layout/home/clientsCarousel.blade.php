<div class='clientsBlock__carousel' data-target-carousel='{{ $carouselId ?? '' }}'>
    @foreach ($clients as $client)
        <a class="clientsBlock__link" href='{{ $client["href"] }}'>
            <img src='{{ $client["image"] }}' alt='{{ $client["imageAlt"] }}'>
        </a>
    @endforeach
</div>
