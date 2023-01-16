@extends('core::public.master')

@section('title', $model->title.' – '.__('Teammembers').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('ogImage', $model->present()->image(1200, 630))
@section('bodyClass', 'body-teammembers body-teammember-'.$model->id.' body-page body-page-'.$page->id)

@section('content')

    <x-common.container>
        <div class='team__container'>
            <x-common.contentBlock :row="true">
                <x-slot name="header">
                    <h3>@lang('Team')</h3>
                </x-slot>
                <x-slot name="subheader">
                    <h3>{{ $model->title }}</h3>
                </x-slot>
            </x-common.contentBlock>
            <x-common.contentContainer>
                <x-common.tabNav>
                    @foreach($models as $teamMember)
                    <x-common.link :href='url($teamMember->uri())' :class='$model->id == $teamMember->id ? "active" : ""' :tab="true">
                        <x-slot name="icon">
                            <x-icons.runningsmall></x-icons.runningsmall>
                        </x-slot>
                        <span class="focus">{{ $teamMember->title }}</span>
                    </x-common.link>
                    @endforeach
                </x-common.tabNav>
                <div class='team__descriptionBlock'>
                    <x-layout.team.teamCard :image="$model->present()->image()"
                                            :imageAlt="optional($model->image)->alt_attribute"
                                            :name="$model->name" :position="$model->title"
                                            :descriptionImage="optional(optional($model->signature_image)->present())->image()"
                                            :descriptionImageAlt="optional($model->signature_image)->alt_attribute">
                        <x-slot name="description">
                            {!! $model->present()->body() !!}
                        </x-slot>
                        <x-slot name="social">
                            @foreach($model->socials as $social)
                                <a href='{{ $social->link }}' target="_blank" rel="nofollow noopener">
                                    <img src="{{ $social->present()->image() }}" alt="{{ optional($social->image)->alt_attribute ?? $social->title }}">
                                </a>
                            @endforeach
                        </x-slot>
                    </x-layout.team.teamCard>
                </div>
            </x-common.contentContainer>
            @if($model->projects->count())
            <div class='team__portfolio'>
                <x-common.contentBlock :row="true">
                    <x-slot name="header">
                        <h3>@lang('Portfolio')</h3>
                    </x-slot>
                </x-common.contentBlock>
                <div class='team__portfolioLinks'>
                    @foreach($model->projects as $project)
                    <x-layout.team.portfolioLink :link="url($project->uri())" :imageAlt="optional($project->image)->alt_attribute ?? $project->title"
                                                 :image="$project->present()->image()">
                    </x-layout.team.portfolioLink>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </x-common.container>

@endsection
