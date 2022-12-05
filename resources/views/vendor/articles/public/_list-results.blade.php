<ul class="article-list-results-list">
    @foreach ($items as $article)
    <li class="article-list-results-item">
        <a class="article-list-results-item-link" href="{{ $article->uri() }}" title="{{ $article->title }}">
            <span class="article-list-results-item-title">{{ $article->title }}</span>
        </a>
    </li>
    @endforeach
</ul>
