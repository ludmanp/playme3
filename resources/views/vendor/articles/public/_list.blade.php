<ul class="article-list-list">
    @foreach ($items as $article)
    @include('articles::public._list-item')
    @endforeach
</ul>
