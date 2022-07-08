<div class='participantBlock'>
    <div class='participantsBlock__image'>
        <img src='{{ $image ?? '' }}' alt='{{ $imageAlt ?? '' }}'>
    </div>
    <div class='participantsBlock__info'>
        <div class='participantBlock__name'>
            {{ $name ?? '' }}
        </div>
        <div class='participantBlock__position'>
            {{ $position ?? '' }}
        </div>
    </div>
</div>
