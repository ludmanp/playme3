<ul class="fact-list-list">
    @foreach ($items as $fact)
    @include('facts::public._list-item')
    @endforeach
</ul>
