<li class="broadcast-date-list-item">
    <a class="broadcast-date-list-item-link" href="{{ $date->uri() }}" title="{{ $date->title }}">
        <div class="broadcast-date-list-item-title">{{ $date->title }}</div>
        <div class="broadcast-date-list-item-image-wrapper">
            @empty (!$date->image)
            <img class="broadcast-date-list-item-image" src="{{ $date->present()->image(null, 200) }}" width="{{ $date->image->width }}" height="{{ $date->image->height }}" alt="{{ $date->image->alt_attribute }}">
            @endempty
        </div>
    </a>
</li>
