<x-slot name="title">
    <span>@lang('Projects')</span>
    @if($client)
        <span class='contentBlock__headerImage'>
                            <img src="{{ $client->present()->image() }}"
                                 alt="{{ optional($client->image)->alt_attribute ?? $client->title }}"/>
                        </span>
    @endif
    @foreach($tags->filter(function ($tag) use ($selectedTags) {
        return in_array($tag->slug, $selectedTags);
    }) as $tag)
        <span class='contentBlock__headerTag'>#{{ $tag->tag }}</span>
    @endforeach
</x-slot>
