<x-slot name="title">
    <span>@lang('Projects')</span>
    @include('projects::public._tags_in_title', ['tags' => $tags, 'selectedTags' => $selectedTags])
</x-slot>
@if($client)
    <x-slot name="titleImage">
    <span class='contentBlock__headerImage'>
        <img src="{{ $client->present()->image() }}"
             alt="{{ optional($client->image)->alt_attribute ?? $client->title }}"/>
    </span>
    </x-slot>
@endif
