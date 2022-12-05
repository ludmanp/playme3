<ul class="partner-list-results-list">
    @foreach ($items as $partner)
    <li class="partner-list-results-item">
        <a class="partner-list-results-item-link" href="{{ $partner->uri() }}" title="{{ $partner->title }}">
            <span class="partner-list-results-item-title">{{ $partner->title }}</span>
        </a>
    </li>
    @endforeach
</ul>
