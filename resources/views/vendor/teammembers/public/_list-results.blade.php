<ul class="teammember-list-results-list">
    @foreach ($items as $teammember)
    <li class="teammember-list-results-item">
        <a class="teammember-list-results-item-link" href="{{ $teammember->uri() }}" title="{{ $teammember->title }}">
            <span class="teammember-list-results-item-title">{{ $teammember->title }}</span>
        </a>
    </li>
    @endforeach
</ul>
