@extends('core::public.master')

@section('title', $model->title.' – '.__('Blogcategories').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('ogImage', $model->present()->image(1200, 630))
@section('bodyClass', 'body-blogcategories body-blogcategory-'.$model->id.' body-page body-page-'.$page->id)

@section('content')

<article class="blogcategory">
    <header class="blogcategory-header">
        <div class="blogcategory-header-container">
            <div class="blogcategory-header-navigator">
                @include('core::public._items-navigator', ['module' => 'Blogcategories', 'model' => $model])
            </div>
            <h1 class="blogcategory-title">{{ $model->title }}</h1>
        </div>
    </header>
    <div class="blogcategory-body">
        @include('blogcategories::public._json-ld', ['blogcategory' => $model])
        @empty(!$model->summary)
        <p class="blogcategory-summary">{!! nl2br($model->summary) !!}</p>
        @endempty
        @empty(!$model->image)
        <picture class="blogcategory-picture">
            <img class="blogcategory-picture-image" src="{{ $model->present()->image(2000) }}" width="{{ $model->image->width }}" height="{{ $model->image->height }}" alt="">
            @empty(!$model->image->description)
            <legend class="blogcategory-picture-legend">{{ $model->image->description }}</legend>
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
