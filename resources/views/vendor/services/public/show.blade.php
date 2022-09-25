@extends('core::public.master')

@section('title', $model->title.' – '.__('Services').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('ogImage', $model->present()->image(1200, 630))
@section('bodyClass', 'body-services body-service-'.$model->id.' body-page body-page-'.$page->id)

@section('content')

<article class="service">
    <header class="service-header">
        <div class="service-header-container">
            <div class="service-header-navigator">
                @include('core::public._items-navigator', ['module' => 'Services', 'model' => $model])
            </div>
            <h1 class="service-title">{{ $model->title }}</h1>
        </div>
    </header>
    <div class="service-body">
        @include('services::public._json-ld', ['service' => $model])
        @empty(!$model->summary)
        <p class="service-summary">{!! nl2br($model->summary) !!}</p>
        @endempty
        @empty(!$model->image)
        <picture class="service-picture">
            <img class="service-picture-image" src="{{ $model->present()->image(2000) }}" width="{{ $model->image->width }}" height="{{ $model->image->height }}" alt="">
            @empty(!$model->image->description)
            <legend class="service-picture-legend">{{ $model->image->description }}</legend>
            @endempty
        </picture>
        @endempty
        @empty(!$model->body)
        <div class="rich-content">{!! $model->present()->body !!}</div>
        @endempty
        @include('files::public._documents')
        @include('files::public._images')
    </div>
</article>

@endsection
