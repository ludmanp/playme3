<div class='cabinetStream__block'>
    <div class='cabinetStream__date'>
        <x-icons.calendar></x-icons.calendar>
        <p>{{ $date ?? '' }}</p>
    </div>
    <h5 class='cabinetStream__header'>{{ $header ?? '' }}</h5>
    <div class='cabinetStream__actions'>
        {{ $actions ?? '' }}
    </div>
</div>
