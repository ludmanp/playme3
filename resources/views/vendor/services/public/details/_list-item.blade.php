<li class="service-detail-list-item">
    <a class="service-detail-list-item-link" href="{{ $detail->uri() }}" title="{{ $detail->title }}">
        <div class="service-detail-list-item-title">{{ $detail->title }}</div>
        <div class="service-detail-list-item-image-wrapper">
            @empty (!$detail->image)
            <img class="service-detail-list-item-image" src="{{ $detail->present()->image(null, 200) }}" width="{{ $detail->image->width }}" height="{{ $detail->image->height }}" alt="{{ $detail->image->alt_attribute }}">
            @endempty
        </div>
    </a>
</li>
