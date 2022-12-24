<ul class="broadcast-list-list">
    @foreach ($items as $broadcast)
    @include('broadcasts::public._list-item')
    @endforeach
</ul>
