<li class="broadcast-list-item">
    <a class="broadcast-list-item-link" href="{{ $broadcast->uri() }}" title="{{ $broadcast->title }}">
        <div class="broadcast-list-item-title">{{ $broadcast->title }}</div>
        <div class="broadcast-list-item-image-wrapper">
            @empty (!$broadcast->image)
            <img class="broadcast-list-item-image" src="{{ $broadcast->present()->image(null, 200) }}" width="{{ $broadcast->image->width }}" height="{{ $broadcast->image->height }}" alt="{{ $broadcast->image->alt_attribute }}">
            @endempty
        </div>
    </a>
</li>
