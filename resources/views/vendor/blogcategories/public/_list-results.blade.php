<ul class="blogcategory-list-results-list">
    @foreach ($items as $blogcategory)
    <li class="blogcategory-list-results-item">
        <a class="blogcategory-list-results-item-link" href="{{ $blogcategory->uri() }}" title="{{ $blogcategory->title }}">
            <span class="blogcategory-list-results-item-title">{{ $blogcategory->title }}</span>
        </a>
    </li>
    @endforeach
</ul>
