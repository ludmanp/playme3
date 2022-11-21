<ul class="fact-list-results-list">
    @foreach ($items as $fact)
    <li class="fact-list-results-item">
        <a class="fact-list-results-item-link" href="{{ $fact->uri() }}" title="{{ $fact->title }}">
            <span class="fact-list-results-item-title">{{ $fact->title }}</span>
        </a>
    </li>
    @endforeach
</ul>
