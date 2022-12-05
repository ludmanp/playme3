@extends('core::public.master')

@section('title', $model->title.' – '.__('Clients').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('ogImage', $model->present()->image(1200, 630))
@section('bodyClass', 'body-clients body-client-'.$model->id.' body-page body-page-'.$page->id)

@section('content')

<article class="client">
    <header class="client-header">
        <div class="client-header-container">
            <div class="client-header-navigator">
                @include('core::public._items-navigator', ['module' => 'Clients', 'model' => $model])
            </div>
            <h1 class="client-title">{{ $model->title }}</h1>
        </div>
    </header>
    <div class="client-body">
        @include('clients::public._json-ld', ['client' => $model])
        @empty(!$model->summary)
        <p class="client-summary">{!! nl2br($model->summary) !!}</p>
        @endempty
        @empty(!$model->image)
        <picture class="client-picture">
            <img class="client-picture-image" src="{{ $model->present()->image(2000) }}" width="{{ $model->image->width }}" height="{{ $model->image->height }}" alt="">
            @empty(!$model->image->description)
            <legend class="client-picture-legend">{{ $model->image->description }}</legend>
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
