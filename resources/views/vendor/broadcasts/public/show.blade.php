@extends('core::public.master')

@section('title', $model->title.' – '.__('Broadcasts').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('ogImage', $model->present()->image(1200, 630))
@section('bodyClass', 'body-broadcasts body-broadcast-'.$model->id.' body-page body-page-'.$page->id)

@section('content')

<article class="broadcast">
    <header class="broadcast-header">
        <div class="broadcast-header-container">
            <div class="broadcast-header-navigator">
                @include('core::public._items-navigator', ['module' => 'Broadcasts', 'model' => $model])
            </div>
            <h1 class="broadcast-title">{{ $model->title }}</h1>
        </div>
    </header>
    <div class="broadcast-body">
        @include('broadcasts::public._json-ld', ['broadcast' => $model])
        @empty(!$model->summary)
        <p class="broadcast-summary">{!! nl2br($model->summary) !!}</p>
        @endempty
        @empty(!$model->image)
        <picture class="broadcast-picture">
            <img class="broadcast-picture-image" src="{{ $model->present()->image(2000) }}" width="{{ $model->image->width }}" height="{{ $model->image->height }}" alt="">
            @empty(!$model->image->description)
            <legend class="broadcast-picture-legend">{{ $model->image->description }}</legend>
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
