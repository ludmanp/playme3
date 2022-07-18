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
        <div class='projectCard__tags'>
            {{ $tags ?? '' }}
        </div>
        <div class='projectCard__info'>
            <div class='projectCard__infoCol'>
                <div class='projectCard__date'>
                    {{ $date ?? '' }}
                </div>
                <div class='projectCard__location'>
                    <x-icons.location></x-icons.location>
                    {{ $location }}
                </div>
            </div>
            <div class='projectCard__logo'>
                <img src='{{ $logo ?? '' }}' alt='{{ $logoAlt ?? '' }}'>
            </div>
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
