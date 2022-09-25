<ul class="service-list-list">
    @foreach ($items as $service)
    @include('services::public._list-item')
    @endforeach
</ul>
