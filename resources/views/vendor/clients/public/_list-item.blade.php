<li class="client-list-item">
    <a class="client-list-item-link" href="{{ $client->uri() }}" title="{{ $client->title }}">
        <div class="client-list-item-title">{{ $client->title }}</div>
        <div class="client-list-item-image-wrapper">
            @empty (!$client->image)
            <img class="client-list-item-image" src="{{ $client->present()->image(null, 200) }}" width="{{ $client->image->width }}" height="{{ $client->image->height }}" alt="{{ $client->image->alt_attribute }}">
            @endempty
        </div>
    </a>
</li>
