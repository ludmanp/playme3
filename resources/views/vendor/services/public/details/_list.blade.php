<ul class="service-detail-list-list">
    @foreach ($items as $detail)
    @include('services::public.details._list-item')
    @endforeach
</ul>
