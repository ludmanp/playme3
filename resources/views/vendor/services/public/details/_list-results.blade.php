<ul class="service-detail-list-results-list">
    @foreach ($items as $detail)
    <li class="service-detail-list-results-item">
        <a class="service-detail-list-results-item-link" href="{{ $detail->uri() }}" title="{{ $detail->title }}">
            <span class="service-detail-list-results-item-title">{{ $detail->title }}</span>
        </a>
    </li>
    @endforeach
</ul>
