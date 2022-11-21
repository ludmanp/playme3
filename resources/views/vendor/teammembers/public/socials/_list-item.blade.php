<li class="teammember-social-list-item">
    <a class="teammember-social-list-item-link" href="{{ $social->uri() }}" title="{{ $social->title }}">
        <div class="teammember-social-list-item-title">{{ $social->title }}</div>
        <div class="teammember-social-list-item-image-wrapper">
            @empty (!$social->image)
            <img class="teammember-social-list-item-image" src="{{ $social->present()->image(null, 200) }}" width="{{ $social->image->width }}" height="{{ $social->image->height }}" alt="{{ $social->image->alt_attribute }}">
            @endempty
        </div>
    </a>
</li>
