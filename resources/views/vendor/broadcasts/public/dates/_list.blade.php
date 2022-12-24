<ul class="broadcast-date-list-list">
    @foreach ($items as $date)
    @include('broadcasts::public.dates._list-item')
    @endforeach
</ul>
