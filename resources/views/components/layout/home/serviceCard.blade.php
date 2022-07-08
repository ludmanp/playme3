<div>
    <a class="serviceCard" href='{{ $link ?? '' }}'>
        <div class='serviceCard'>
            <div class='serviceCard__header'>
                <p>{{ $header ?? '' }}</p>
            </div>
            <div class='serviceCard__subheader'>
                <p>{{ $subheader ?? '' }}</p>
            </div>
            <div class='serviceCard__services'>
                {{ $services ?? '' }}
            </div>
            <div class='serviceCard__image'>
                <img src='{{ $image ?? '' }}' alt='{{ $imageAlt ?? '' }}'>
            </div>
        </div>
    </a>
</div>
