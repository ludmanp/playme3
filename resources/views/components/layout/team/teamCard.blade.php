<div class='teamCard__block'>
    <div class='teamCard__info'>
        <div class='teamCard__image'>
            <img src='{{ $image ?? '' }}' alt='{{ $imageAlt ?? '' }}'>
        </div>
        <div class='teamCard__socialNetworks'>
            @if ($twitterLink ?? '')
                <a href='{{ $twitterLink }}'>
                    <x-icons.twitter></x-icons.twitter>
                </a>
            @endif
            @if ($facebookLink ?? '')
                <a href='{{ $facebookLink }}'>
                    <x-icons.facebook></x-icons.facebook>
                </a>
            @endif
            @if ($vkLink ?? '')
                <a href='{{ $vkLink }}'>
                    <x-icons.vk></x-icons.vk>
                </a>
            @endif
            @if ($youtubeLink ?? '')
                <a href='{{ $youtubeLink }}'>
                    <x-icons.youtube></x-icons.youtube>
                </a>
            @endif
            @if ($instagramLink ?? '')
                <a href='{{ $instagramLink }}'>
                    <x-icons.instagram></x-icons.instagram>
                </a>
            @endif
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
        @if ($twitterLink ?? '')
            <a href='{{ $twitterLink }}'>
                <x-icons.twitter></x-icons.twitter>
            </a>
        @endif
        @if ($facebookLink ?? '')
            <a href='{{ $facebookLink }}'>
                <x-icons.facebook></x-icons.facebook>
            </a>
        @endif
        @if ($vkLink ?? '')
            <a href='{{ $vkLink }}'>
                <x-icons.vk></x-icons.vk>
            </a>
        @endif
        @if ($youtubeLink ?? '')
            <a href='{{ $youtubeLink }}'>
                <x-icons.youtube></x-icons.youtube>
            </a>
        @endif
        @if ($instagramLink ?? '')
            <a href='{{ $instagramLink }}'>
                <x-icons.instagram></x-icons.instagram>
            </a>
        @endif
    </div>
</div>
