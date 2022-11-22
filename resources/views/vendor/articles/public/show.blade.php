@extends('core::public.master')

@section('title', $model->title.' – '.__('Articles').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('ogImage', $model->present()->image(1200, 630))
@section('bodyClass', 'body-articles body-article-'.$model->id.' body-page body-page-'.$page->id)

@section('content')

<article class="article">
    <header class="article-header">
        <div class="article-header-container">
            <div class="article-header-navigator">
                @include('core::public._items-navigator', ['module' => 'Articles', 'model' => $model])
            </div>
            <h1 class="article-title">{{ $model->title }}</h1>
        </div>
    </header>
    <div class="article-body">
        @include('articles::public._json-ld', ['article' => $model])
        @empty(!$model->summary)
        <p class="article-summary">{!! nl2br($model->summary) !!}</p>
        @endempty
        @empty(!$model->image)
        <picture class="article-picture">
            <img class="article-picture-image" src="{{ $model->present()->image(2000) }}" width="{{ $model->image->width }}" height="{{ $model->image->height }}" alt="">
            @empty(!$model->image->description)
            <legend class="article-picture-legend">{{ $model->image->description }}</legend>
            @endempty
        </picture>
        @endempty
        @empty(!$model->body)
        <div class="rich-content">{!! $model->present()->body !!}</div>
        @endempty
        @include('files::public._document-list')
        @include('files::public._image-list')
    </div>
</article>

@endsection
