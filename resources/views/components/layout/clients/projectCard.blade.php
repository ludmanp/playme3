<div class="projectCard__block{{
        useModifiers('projectCard__block', [
            'transparent'=>$transparent??false,
            ])
        }} {{$attributes['class']}}" {{$attributes->except(['class'])}}>
    @if ($image ?? '')
        <div class='projectCard__image'>
            <img src='{{ $image ?? '' }}' alt='{{ $imageAlt ?? '' }}'>
        </div>
    @endif
    <div class='projectCard__content'>
        <div class="projectCard__actions">
            <div class='projectCard__tags' data-target-carousel='{{ $carouselId ?? '' }}'>
                {{ $tags ?? '' }}
            </div>
            <div class='projectCard__arrows carousel__arrows' data-target-carousel='{{ $carouselId ?? '' }}'>
                <button class='previous'>
                    <x-icons.arrowLeft></x-icons.arrowLeft>
                </button>
                <button class='next'>
                    <x-icons.arrowRight></x-icons.arrowRight>
                </button>
            </div>
        </div>
        <div class='projectCard__info'>
            @if(($location ?? false) || ($date ?? false))
            <div class='projectCard__infoCol'>
                @if($date ?? false)
                <div class='projectCard__date'>
                    {{ $date ?? '' }}
                </div>
                @endif
                @if($location ?? false)
                <div class='projectCard__location'>
                    <x-icons.location></x-icons.location>
                    {{ $location }}
                </div>
                @endif
            </div>
            @endif
            @if($logo ?? false)
            <div class='projectCard__logo'>
                <img src='{{ $logo ?? '' }}' alt='{{ $logoAlt ?? '' }}'>
            </div>
            @endif
        </div>
        <h4 class='projectCard__name'>{{ $projectName ?? '' }}</h4>
        <div class='projectCard__description'>
            {{ $description ?? '' }}
        </div>
        <div class='projectCard__action'>
            {{ $action ?? '' }}
        </div>
    </div>
</div>
