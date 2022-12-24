<ul class="broadcast-list-results-list">
    @foreach ($items as $broadcast)
    <li class="broadcast-list-results-item">
        <a class="broadcast-list-results-item-link" href="{{ $broadcast->uri() }}" title="{{ $broadcast->title }}">
            <span class="broadcast-list-results-item-title">{{ $broadcast->title }}</span>
        </a>
    </li>
    @endforeach
</ul>
