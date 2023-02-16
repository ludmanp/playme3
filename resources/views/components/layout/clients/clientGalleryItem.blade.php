<div class='clientGallery__item'>
    <div class='clientGallery__videoBlock'>
        <a class='clientGallery__videoLink' href={{$clinetVideo ?? ''}}>
            <div class='informationImage'>
                <img class='clientGallery__videoImage' src='{{ $image ?? '' }}' alt='{{ $imageAlt ?? '' }}'>
            </div>
        </a>
        <button class='clientGallery__videoButton videoBlock__button'>
            <div class='circle__outer'>
                <div class='circle__middle'>
                    <div class='circle__inner'></div>
                </div>
            </div>
            <div class='circle__icon'>
                <x-icons.playSmall></x-icons.playSmall>
            </div>
        </button>
    </div>

</div>
