<ul class="broadcast-address-list-results-list">
    @foreach ($items as $address)
    <li class="broadcast-address-list-results-item">
        <a class="broadcast-address-list-results-item-link" href="{{ $address->uri() }}" title="{{ $address->title }}">
            <span class="broadcast-address-list-results-item-title">{{ $address->title }}</span>
        </a>
    </li>
    @endforeach
</ul>
