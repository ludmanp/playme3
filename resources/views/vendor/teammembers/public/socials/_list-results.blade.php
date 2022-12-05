<ul class="teammember-social-list-results-list">
    @foreach ($items as $social)
    <li class="teammember-social-list-results-item">
        <a class="teammember-social-list-results-item-link" href="{{ $social->uri() }}" title="{{ $social->title }}">
            <span class="teammember-social-list-results-item-title">{{ $social->title }}</span>
        </a>
    </li>
    @endforeach
</ul>
