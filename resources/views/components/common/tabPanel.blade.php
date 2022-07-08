<div class='tabBlock__tabpanel'>
    <div class='tabBlock__filters'>
        {{ $filters ?? '' }}
    </div>
    <div class='tabDescription'>
        <div class='tabDescription__image'>
            <img src='{{ $image ?? '' }}' alt='{{ $imageAlt ?? '' }}'>
        </div>
        <p class='tabDescription__description'>{{ $description ?? '' }}</p>
        @if ($action ?? '')
            <div class='tabDescription__action'>
                {{ $action }}
            </div>
        @endif
    </div>
</div>
