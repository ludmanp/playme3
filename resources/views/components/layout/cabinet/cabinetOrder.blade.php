<div class='cabinetOrder__block'>
    <h5 class='cabinetOrder__header'>{{ $header ?? '' }}</h5>

    <div class='cabinetOrder__date'>
        <x-icons.calendar></x-icons.calendar>
        <p>{{ $date ?? '' }}</p>
    </div>
    <div class='cabinetOrder__location'>
        <x-icons.location></x-icons.location>
        <p>{{ $location ?? '' }}</p>
    </div>

    @if($actions ?? false)
    <div class='cabinetOrder__actions'>
        {{ $actions }}
    </div>
    @endif

    @if($link ?? false)
    <div class="cabinetOrder_copyLinkContainer copyParent">
        <input type="text" readonly value="{{ $link }}">
        <button type="button" data-clipboard-text='{{ $link }}' class="copyBtn">
            <x-icons.copy></x-icons.copy>
        </button>
    </div>
    @endif
</div>
