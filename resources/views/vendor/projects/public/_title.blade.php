<x-slot name="title">
    <span>@lang('Projects')</span>
    @if($client)
        <span class='contentBlock__headerImage'>
                            <img src="{{ $client->present()->image() }}"
                                 alt="{{ optional($client->image)->alt_attribute ?? $client->title }}"/>
                        </span>
    @endif
    @include('projects::public._tags_in_title', ['tags' => $tags, 'selectedTags' => $selectedTags])
</x-slot>
