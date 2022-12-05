<div class='teamCard__block'>
    <div class='teamCard__info'>
        <div class='teamCard__image'>
            <img src='{{ $image ?? '' }}' alt='{{ $imageAlt ?? '' }}'>
        </div>
        <div class='teamCard__socialNetworks'>
            {{ $social ?? '' }}
        </div>
    </div>
    <div class='teamCard__description'>
        <h4 class='teamCard__name'>{{ $name ?? '' }}</h4>
        <h5 class='teamCard__position'>{{ $position ?? '' }}</h5>
        <div class='teamCard__descriptionText'>{{ $description ?? '' }}</div>
        @if ($descriptionImage ?? '')
        <div class='teamCard__descriptionImage'>
            <img src='{{ $descriptionImage }}' alt='{{ $descriptionImageAlt ?? '' }}'>
        </div>
        @endif
    </div>
    <div class='teamCard__socialNetworks_tablet'>
        {{ $social ?? '' }}
    </div>
</div>
