@extends('core::public.master')

@section('title', $model->title.' – '.__('Broadcast Dates').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('ogImage', $model->present()->image(1200, 630))
@section('bodyClass', 'body-broadcasts body-broadcast-'.$model->id.' body-page body-page-'.$page->id)

@section('content')

<article class="broadcast-date">
    <header class="broadcast-date-header">
        <div class="broadcast-date-header-container">
            <div class="broadcast-date-header-navigator">
                @include('core::public._items-navigator', ['module' => 'Broadcast Dates', 'model' => $model])
            </div>
            <h1 class="broadcast-date-title">{{ $model->title }}</h1>
        </div>
    </header>
    <div class="broadcast-date-body">
        @include('broadcasts::public.dates._json-ld', ['date' => $model])
        @empty(!$model->summary)
        <p class="broadcast-date-summary">{!! nl2br($model->summary) !!}</p>
        @endempty
        @empty(!$model->image)
        <picture class="broadcast-date-picture">
            <img class="broadcast-date-picture-image" src="{{ $model->present()->image(2000, 1000) }}" width="{{ $model->image->width }}" height="{{ $model->image->height }}" alt="">
            @empty(!$model->image->description)
            <legend class="broadcast-date-picture-legend">{{ $model->image->description }}</legend>
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
