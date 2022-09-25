<li class="service-list-item">
    <a class="service-list-item-link" href="{{ $service->uri() }}" title="{{ $service->title }}">
        <div class="service-list-item-title">{{ $service->title }}</div>
        <div class="service-list-item-image-wrapper">
            @empty (!$service->image)
            <img class="service-list-item-image" src="{{ $service->present()->image(null, 200) }}" width="{{ $service->image->width }}" height="{{ $service->image->height }}" alt="{{ $service->image->alt_attribute }}">
            @endempty
        </div>
    </a>
</li>
