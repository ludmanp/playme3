<ul class="teammember-list-list">
    @foreach ($items as $teammember)
    @include('teammembers::public._list-item')
    @endforeach
</ul>
