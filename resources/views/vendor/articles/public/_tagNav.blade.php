@php
    $url = route(config('app.locale') . '::index-articles');
@endphp
@foreach($tags as $tag)
    <x-common.link href='{!! $url . makeQuery($tag) !!}' class="{{ in_array($tag->slug, $selectedTags) ? 'active' : '' }}" :tab="true">
        <x-slot name="icon">
            <x-icons.runningsmall></x-icons.runningsmall>
        </x-slot>
        <span class="focus">#{{ $tag->tag }}</span>
    </x-common.link>
@endforeach
