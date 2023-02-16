@extends('core::public.master')

@section('title', $model->title.' – '.__('Projects').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('ogImage', $model->present()->image(1200, 630))

@section('content')

    <x-common.container>
        <div class='client__container'>
            <x-common.contentBlock :row="true">
                <x-slot name="header">
                    <h3>@lang('Clients')</h3>
                </x-slot>
                <x-slot name="subheader">
                    <h3>@lang('Projects by hashtag')</h3>
                    <span class="contentBlock__headerTag">#Видеосъёмкамерроприятий</span>
                </x-slot>
            </x-common.contentBlock>
{{--            <div class='clientsProjects__tags'>--}}
{{--                <x-common.button :tag="true" :tagActive="true">#ВидеосъёмкаМерроприятий</x-common.button>--}}
{{--                <x-common.button :tag="true">#ВсеПроекты</x-common.button>--}}
{{--                <x-common.button :tag="true">#РекламныеРолики</x-common.button>--}}
{{--                <x-common.button :tag="true">#ДокументальноеКино</x-common.button>--}}
{{--                <x-common.button :tag="true">#ОрганизацияКонцертов</x-common.button>--}}
{{--                <x-common.button :tag="true">#ПромоРолики</x-common.button>--}}
{{--                <x-common.button :tag="true">#Кино</x-common.button>--}}
{{--                <x-common.button :tag="true">#Блоги</x-common.button>--}}
{{--            </div>--}}
            <div class='client__infoBlock'>
                <x-layout.clients.clientGallery :slides="$model->present()->showVideoData()"></x-layout.clients.clientGallery>
                <div class='client__info'>
                    <x-layout.clients.projectCard :transparent="true"
                                                  :date="$model->date->format('d.m.Y')"
                                                  :logo="optional($model->client)->image ? $model->client->present()->image() : ''"
                                                  :logoAlt="optional(optional($model->client)->image)->alt_attribute ?? optional($model->client)->title"
                                                  :projectName="$model->title"
                                                  >
                        <x-slot name="tags">
                            @foreach($model->tags as $tag)
                                <x-common.link :tag="true" href="javascript:void(0)">
                                    #{{ $tag->tag }}
                                </x-common.link>
                            @endforeach
                        </x-slot>
                        <x-slot name="location">
                            <p>{{ $model->location }}</p>
                        </x-slot>
                        <x-slot name="description">
                            {!! $model->present()->body() !!}
                        </x-slot>
{{--                        <x-slot name="action">--}}
{{--                            <x-common.link :withImage="true" :uppercase="true">--}}
{{--                                <x-slot name="icon">--}}
{{--                                    <x-icons.running></x-icons.running>--}}
{{--                                </x-slot>--}}
{{--                                Смотреть видео проекта--}}
{{--                            </x-common.link>--}}
{{--                        </x-slot>--}}
                    </x-layout.clients.projectCard>
                </div>
            </div>
            @if($model->team_members->count())
            <x-layout.clients.participants>
                <x-slot name="header">
                    <x-common.contentBlock>
                        <x-slot name="header">
                            <h3>@lang('Project participants')</h3>
                        </x-slot>
                    </x-common.contentBlock>
                </x-slot>
                <x-slot name="participant">
                    @foreach($model->team_members as $teamMember)
                        <x-layout.clients.participant :imageAlt="optional($teamMember->image)->alt_attribute ?? $teamMember->name"
                                                      :image="$teamMember->present()->image(64, 97)"
                                                      :name="$teamMember->name"
                                                      :position="$teamMember->title"
                                                      :href="url($teamMember->uri())"
                        >

                        </x-layout.clients.participant>
                    @endforeach
                </x-slot>
            </x-layout.clients.participants>
            @endif
            @if($otherProjects->count())
            <x-layout.clients.clientsAdditional>
                <x-slot name="title">
                    @if(count($selectedTags))
                        @lang('Other with hashtag')
                        @include('projects::public._tags_in_title', ['tags' => $model->tags, 'selectedTags' => $selectedTags])
                    @else
                        @lang('Other projects')
                    @endif
                </x-slot>

                @foreach($otherProjects as $project)
                    @include('projects::public._list-item')
                @endforeach
            </x-layout.clients.clientsAdditional>
            @endif
        </div>
    </x-common.container>
@endsection
