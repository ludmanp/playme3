@extends('pages::public.master')

@section('page')
    <x-common.container>
        <div class='clients__container'>
            <x-layout.clients.clientsList
                :clients="$clients"></x-layout.clients.clientsList>
            <x-layout.clients.clientsProjects>
                @foreach($tags as $tag)
                    <x-common.link :href="url()->current() . makeQuery($tag)" :tab="true" class="{{ in_array($tag->slug, $selectedTags) ? 'active' : '' }}">#{{ $tag->tag }}</x-common.link>
                @endforeach
            </x-layout.clients.clientsProjects>
            <x-layout.clients.clientsSearch>
                @include('projects::public._title')
                @includeWhen($models->count() > 0, 'projects::public._list', ['models' => $models])
            </x-layout.clients.clientsSearch>
        </div>
    </x-common.container>
@endsection
