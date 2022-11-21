@extends('core::public.master')

@section('title', $model->title.' – '.__('Partners').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('ogImage', $model->present()->image(1200, 630))
@section('bodyClass', 'body-partners body-partner-'.$model->id.' body-page body-page-'.$page->id)

@section('content')

<article class="partner">
    <header class="partner-header">
        <div class="partner-header-container">
            <div class="partner-header-navigator">
                @include('core::public._items-navigator', ['module' => 'Partners', 'model' => $model])
            </div>
            <h1 class="partner-title">{{ $model->title }}</h1>
        </div>
    </header>
    <div class="partner-body">
        @include('partners::public._json-ld', ['partner' => $model])
        @empty(!$model->summary)
        <p class="partner-summary">{!! nl2br($model->summary) !!}</p>
        @endempty
        @empty(!$model->image)
        <picture class="partner-picture">
            <img class="partner-picture-image" src="{{ $model->present()->image(2000) }}" width="{{ $model->image->width }}" height="{{ $model->image->height }}" alt="">
            @empty(!$model->image->description)
            <legend class="partner-picture-legend">{{ $model->image->description }}</legend>
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
