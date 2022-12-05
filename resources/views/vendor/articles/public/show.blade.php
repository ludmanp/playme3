@extends('core::public.master')

@section('title', $model->title.' – '.__('Articles').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('ogImage', $model->present()->image(1200, 630))

@section('content')

    <x-common.container>
        <div class='blogArticle__container'>
            <x-common.contentBlock :row="true">
                <x-slot name="header">
                    <h3><a href="{{ route(config('app.locale') . '::index-articles') }}">{{ $page->title }}</a></h3>
                </x-slot>
{{--                <x-slot name="subheader">--}}
{{--                    <h3>стримы</h3>--}}
{{--                </x-slot>--}}
                <x-slot name="additionalHeader">
                    <h3>{{ $model->title }}</h3>
                </x-slot>
            </x-common.contentBlock>
            <x-common.contentContainer>
                <x-common.tabNav>
                    @include('articles::public._tagNav')
                </x-common.tabNav>
                <div class='blogArticle__content'>
                    <x-layout.blog.blogArticleHeader :author="$model->author ? $model->author->title : ''" :date="$model->publishedDate"
                                                     :authorImage="optional($model->author)->image ? $model->author->present()->image(24, 24) : ''"
                                                     :authorImageAlt="optional($model->author)->image ? $model->author->image->alt_attribute : ''"
                                                     :header="$model->title" :location="$model->location">
                        <x-slot name="tags">
                            @foreach($model->tags as $tag)
                                <x-common.link :tag="true" href="javascript:void(0)">
                                    #{{ $tag->tag }}
                                </x-common.link>
                            @endforeach
                        </x-slot>
                    </x-layout.blog.blogArticleHeader>
                    <x-layout.blog.blogArticleContent>
                        @if($model->image)
                        <x-layout.blog.blogArticleImage :image="$model->present()->image()" :imageAlt="$model->image->alt_attribute">
                        </x-layout.blog.blogArticleImage>
                        @endif

                        <x-layout.blog.blogSingleText>
                            <x-slot name="html">
                                {!! $model->present()->body !!}
                            </x-slot>
                        </x-layout.blog.blogSingleText>
                    </x-layout.blog.blogArticleContent>
                </div>
            </x-common.contentContainer>
            <x-layout.clients.clientsAdditional></x-layout.clients.clientsAdditional>
        </div>
    </x-common.container>

@endsection
