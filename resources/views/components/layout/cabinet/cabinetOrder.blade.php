<a class='cabinetOrder__block' href="{{ $href ?? 'javascript::void(0)' }}">
    <h5 class='cabinetOrder__header'>{{ $header ?? '' }}</h5>

    <div class='cabinetOrder__date'>
        <x-icons.calendar></x-icons.calendar>
        <p>{{ $date ?? '' }}</p>
    </div>
    <div class='cabinetOrder__location'>
        <x-icons.location></x-icons.location>
        <p>{{ $location ?? '' }}</p>
    </div>
</a>
