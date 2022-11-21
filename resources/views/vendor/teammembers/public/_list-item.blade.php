<li class="teammember-list-item">
    <a class="teammember-list-item-link" href="{{ $teammember->uri() }}" title="{{ $teammember->title }}">
        <div class="teammember-list-item-title">{{ $teammember->title }}</div>
        <div class="teammember-list-item-image-wrapper">
            @empty (!$teammember->image)
            <img class="teammember-list-item-image" src="{{ $teammember->present()->image(null, 200) }}" width="{{ $teammember->image->width }}" height="{{ $teammember->image->height }}" alt="{{ $teammember->image->alt_attribute }}">
            @endempty
        </div>
    </a>
</li>
