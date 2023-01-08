<li class="broadcast-address-list-item">
    <a class="broadcast-address-list-item-link" href="{{ $address->uri() }}" title="{{ $address->title }}">
        <div class="broadcast-address-list-item-title">{{ $address->title }}</div>
        <div class="broadcast-address-list-item-image-wrapper">
            @empty (!$address->image)
            <img class="broadcast-address-list-item-image" src="{{ $address->present()->image(null, 200) }}" width="{{ $address->image->width }}" height="{{ $address->image->height }}" alt="{{ $address->image->alt_attribute }}">
            @endempty
        </div>
    </a>
</li>
