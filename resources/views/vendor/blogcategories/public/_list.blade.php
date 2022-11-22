<ul class="blogcategory-list-list">
    @foreach ($items as $blogcategory)
    @include('blogcategories::public._list-item')
    @endforeach
</ul>
