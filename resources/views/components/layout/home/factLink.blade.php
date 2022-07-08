<a class="factLink" href='{{ $attributes['href'] ?? '' }}'>
    <div class='factLink__overlay'></div>
    <div class='factLinkBlock'>
        <div class='factLink__image'>
            <img src='{{ $image ?? '' }}' alt="{{ $imageAlt ?? '' }}">
            <div class='factLink__info'>
                <div class='factLink__number'>{{ $number ?? '' }}</div>
                <div class='factLink__description'>{{ $description }}</div>
            </div>
        </div>
    </div>
    <div class='factLink__circles'>
        <div class='factLink__outerCircle'>
            <div class='factLink__innerCircle'></div>
        </div>
        <div class='factLink__fact'><span>{{ $fact ?? '' }}</span></div>
    </div>
</a>
