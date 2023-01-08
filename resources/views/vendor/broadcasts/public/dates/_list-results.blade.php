<ul class="broadcast-date-list-results-list">
    @foreach ($items as $date)
    <li class="broadcast-date-list-results-item">
        <a class="broadcast-date-list-results-item-link" href="{{ $date->uri() }}" title="{{ $date->title }}">
            <span class="broadcast-date-list-results-item-title">{{ $date->title }}</span>
        </a>
    </li>
    @endforeach
</ul>
