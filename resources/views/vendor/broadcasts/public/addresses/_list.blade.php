<ul class="broadcast-address-list-list">
    @foreach ($items as $address)
    @include('broadcasts::public.addresses._list-item')
    @endforeach
</ul>
