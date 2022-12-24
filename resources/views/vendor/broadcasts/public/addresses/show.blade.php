@extends('core::public.master')

@section('title', $model->title.' – '.__('Broadcast Addresses').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('ogImage', $model->present()->image(1200, 630))
@section('bodyClass', 'body-broadcasts body-broadcast-'.$model->id.' body-page body-page-'.$page->id)

@section('content')

<article class="broadcast-address">
    <header class="broadcast-address-header">
        <div class="broadcast-address-header-container">
            <div class="broadcast-address-header-navigator">
                @include('core::public._items-navigator', ['module' => 'Broadcast Addresses', 'model' => $model])
            </div>
            <h1 class="broadcast-address-title">{{ $model->title }}</h1>
        </div>
    </header>
    <div class="broadcast-address-body">
        @include('broadcasts::public.addresses._json-ld', ['address' => $model])
        @empty(!$model->summary)
        <p class="broadcast-address-summary">{!! nl2br($model->summary) !!}</p>
        @endempty
        @empty(!$model->image)
        <picture class="broadcast-address-picture">
            <img class="broadcast-address-picture-image" src="{{ $model->present()->image(2000, 1000) }}" width="{{ $model->image->width }}" height="{{ $model->image->height }}" alt="">
            @empty(!$model->image->description)
            <legend class="broadcast-address-picture-legend">{{ $model->image->description }}</legend>
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
