<ul class="client-list-results-list">
    @foreach ($items as $client)
    <li class="client-list-results-item">
        <a class="client-list-results-item-link" href="{{ $client->uri() }}" title="{{ $client->title }}">
            <span class="client-list-results-item-title">{{ $client->title }}</span>
        </a>
    </li>
    @endforeach
</ul>
