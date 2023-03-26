<div class='partnersBlock__carousel' data-target-carousel='{{ $carouselId ?? '' }}'>
    @foreach ($partners as $partner)
        <a class="partnersBlock__Link" href='{{ $partner["href"] }}'>
            <img src='{{ $partner["image"] }}' alt='{{ $partner["imageAlt"] }}'>
        </a>
    @endforeach
</div>
