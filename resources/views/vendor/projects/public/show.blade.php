@extends('core::public.master')

@section('title', $model->title.' – '.__('Projects').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('ogImage', $model->present()->image(1200, 630))
@section('bodyClass', 'body-projects body-project-'.$model->id.' body-page body-page-'.$page->id)

@section('content')

<article class="project">
    <header class="project-header">
        <div class="project-header-container">
            <div class="project-header-navigator">
                @include('core::public._items-navigator', ['module' => 'Projects', 'model' => $model])
            </div>
            <h1 class="project-title">{{ $model->title }}</h1>
        </div>
    </header>
    <div class="project-body">
        @include('projects::public._json-ld', ['project' => $model])
        @empty(!$model->summary)
        <p class="project-summary">{!! nl2br($model->summary) !!}</p>
        @endempty
        @empty(!$model->image)
        <picture class="project-picture">
            <img class="project-picture-image" src="{{ $model->present()->image(2000) }}" width="{{ $model->image->width }}" height="{{ $model->image->height }}" alt="">
            @empty(!$model->image->description)
            <legend class="project-picture-legend">{{ $model->image->description }}</legend>
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
