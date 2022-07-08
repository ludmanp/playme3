<div>
    <a class="serviceCard" href='{{ $link ?? '' }}'>
        <div class='serviceDescription'>
            <div class='serviceDescription__header'>
                <p>{{ $header ?? '' }}</p>
            </div>
            <div class='serviceDescription__subheader'>
                <p>{{ $subheader ?? '' }}</p>
            </div>
            <div class='serviceDescription__services'>
                {{ $services ?? '' }}
            </div>
            <div class='serviceDescription__image'>
                <img src='{{ $image ?? '' }}' alt='{{ $imageAlt ?? '' }}'>
            </div>
        </div>
    </a>
</div>
