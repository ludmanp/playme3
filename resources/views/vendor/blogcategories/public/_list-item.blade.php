<li class="blogcategory-list-item">
    <a class="blogcategory-list-item-link" href="{{ $blogcategory->uri() }}" title="{{ $blogcategory->title }}">
        <div class="blogcategory-list-item-title">{{ $blogcategory->title }}</div>
        <div class="blogcategory-list-item-image-wrapper">
            @empty (!$blogcategory->image)
            <img class="blogcategory-list-item-image" src="{{ $blogcategory->present()->image(null, 200) }}" width="{{ $blogcategory->image->width }}" height="{{ $blogcategory->image->height }}" alt="{{ $blogcategory->image->alt_attribute }}">
            @endempty
        </div>
    </a>
</li>
