@extends('core::public.master')

@section('title', $model->title.' – '.__('Service Details').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('ogImage', $model->present()->image(1200, 630))
@section('bodyClass', 'body-services body-service-'.$model->id.' body-page body-page-'.$page->id)

@section('content')

<article class="service-detail">
    <header class="service-detail-header">
        <div class="service-detail-header-container">
            <div class="service-detail-header-navigator">
                @include('core::public._items-navigator', ['module' => 'Service Details', 'model' => $model])
            </div>
            <h1 class="service-detail-title">{{ $model->title }}</h1>
        </div>
    </header>
    <div class="service-detail-body">
        @include('services::public.details._json-ld', ['detail' => $model])
        @empty(!$model->summary)
        <p class="service-detail-summary">{!! nl2br($model->summary) !!}</p>
        @endempty
        @empty(!$model->image)
        <picture class="service-detail-picture">
            <img class="service-detail-picture-image" src="{{ $model->present()->image(2000, 1000) }}" width="{{ $model->image->width }}" height="{{ $model->image->height }}" alt="">
            @empty(!$model->image->description)
            <legend class="service-detail-picture-legend">{{ $model->image->description }}</legend>
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
