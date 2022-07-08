<div class='clientGallery__item'>
    <img src='{{ $image ?? '' }}' alt='{{ $imageAlt ?? '' }}'>
    <button class='videoBlock__button'>
        <div class='circle__outer'>
            <div class='circle__middle'>
                <div class='circle__inner'>
                </div>
            </div>
        </div>
        <div class='circle__icon'>
            <x-icons.playSmall></x-icons.playSmall>
        </div>
    </button>
</div>
