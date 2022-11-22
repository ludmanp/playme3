<li class="article-list-item">
    <a class="article-list-item-link" href="{{ $article->uri() }}" title="{{ $article->title }}">
        <div class="article-list-item-title">{{ $article->title }}</div>
        <div class="article-list-item-image-wrapper">
            @empty (!$article->image)
            <img class="article-list-item-image" src="{{ $article->present()->image(null, 200) }}" width="{{ $article->image->width }}" height="{{ $article->image->height }}" alt="{{ $article->image->alt_attribute }}">
            @endempty
        </div>
    </a>
</li>
