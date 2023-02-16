@if(($selected = $tags->filter(function ($tag) use ($selectedTags) {
                            return in_array($tag->slug, $selectedTags);
                        }))->count())
    @foreach($selected as $tag)
        <span class='contentBlock__headerTag'>#{{ $tag->tag }}</span>
    @endforeach
@endif
