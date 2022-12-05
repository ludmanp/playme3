@extends('core::public.master')

@section('title', $model->title.' – '.__('Facts').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('ogImage', $model->present()->image(1200, 630))
@section('bodyClass', 'body-facts body-fact-'.$model->id.' body-page body-page-'.$page->id)

@section('content')

<article class="fact">
    <header class="fact-header">
        <div class="fact-header-container">
            <div class="fact-header-navigator">
                @include('core::public._items-navigator', ['module' => 'Facts', 'model' => $model])
            </div>
            <h1 class="fact-title">{{ $model->title }}</h1>
        </div>
    </header>
    <div class="fact-body">
        @include('facts::public._json-ld', ['fact' => $model])
        @empty(!$model->summary)
        <p class="fact-summary">{!! nl2br($model->summary) !!}</p>
        @endempty
        @empty(!$model->image)
        <picture class="fact-picture">
            <img class="fact-picture-image" src="{{ $model->present()->image(2000) }}" width="{{ $model->image->width }}" height="{{ $model->image->height }}" alt="">
            @empty(!$model->image->description)
            <legend class="fact-picture-legend">{{ $model->image->description }}</legend>
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
