<ul class="service-list-results-list">
    @foreach ($items as $service)
    <li class="service-list-results-item">
        <a class="service-list-results-item-link" href="{{ $service->uri() }}" title="{{ $service->title }}">
            <span class="service-list-results-item-title">{{ $service->title }}</span>
        </a>
    </li>
    @endforeach
</ul>
