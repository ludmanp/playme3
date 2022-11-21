<ul class="client-list-list">
    @foreach ($items as $client)
    @include('clients::public._list-item')
    @endforeach
</ul>
