<li class="fact-list-item">
    <a class="fact-list-item-link" href="{{ $fact->uri() }}" title="{{ $fact->title }}">
        <div class="fact-list-item-title">{{ $fact->title }}</div>
        <div class="fact-list-item-image-wrapper">
            @empty (!$fact->image)
            <img class="fact-list-item-image" src="{{ $fact->present()->image(null, 200) }}" width="{{ $fact->image->width }}" height="{{ $fact->image->height }}" alt="{{ $fact->image->alt_attribute }}">
            @endempty
        </div>
    </a>
</li>
