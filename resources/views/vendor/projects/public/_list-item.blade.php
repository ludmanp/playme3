@php
    /** @var \TypiCMS\Modules\Projects\Models\Project $project */
@endphp
<x-layout.clients.projectCard
    :image="$project->image ? $project->present()->image() : ''"
    :imageAlt="optional($project->image)->alt_attribute ?? $project->title"
    :date="$project->date->format('d.m.Y')"
    :logo="optional($project->client)->image ? $project->client->present()->image() : ''"
    :logoAlt="optional(optional($project->client)->image)->alt_attribute ?? optional($project->client)->title"
    :projectName="$project->title"
>
    <x-slot name="tags">
        @foreach($project->tags as $tag)
            <x-common.link :tag="true" href="javascript:void(0)">
                #{{ $tag->tag }}
            </x-common.link>
        @endforeach
    </x-slot>
    @if($project->location)
        <x-slot name="location">
            <p>{{ $project->location }}</p>
        </x-slot>
    @endif
    <x-slot name="description">
        {{ $project->summary }}
    </x-slot>
    <x-slot name="action">
        <x-common.link :withImage="true" :uppercase="true" :href="url($project->uri())">
            <x-slot name="icon">
                <x-icons.running></x-icons.running>
            </x-slot>
            @lang('More')
        </x-common.link>
    </x-slot>
</x-layout.clients.projectCard>
