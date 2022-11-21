<li class="partner-list-item">
    <a class="partner-list-item-link" href="{{ $partner->uri() }}" title="{{ $partner->title }}">
        <div class="partner-list-item-title">{{ $partner->title }}</div>
        <div class="partner-list-item-image-wrapper">
            @empty (!$partner->image)
            <img class="partner-list-item-image" src="{{ $partner->present()->image(null, 200) }}" width="{{ $partner->image->width }}" height="{{ $partner->image->height }}" alt="{{ $partner->image->alt_attribute }}">
            @endempty
        </div>
    </a>
</li>
