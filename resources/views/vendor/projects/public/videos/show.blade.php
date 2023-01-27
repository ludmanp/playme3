@extends('core::public.master')

@section('title', $model->title.' – '.__('Project Videos').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('ogImage', $model->present()->image(1200, 630))
@section('bodyClass', 'body-projects body-project-'.$model->id.' body-page body-page-'.$page->id)

@section('content')

<article class="project-video">
    <header class="project-video-header">
        <div class="project-video-header-container">
            <div class="project-video-header-navigator">
                @include('core::public._items-navigator', ['module' => 'Project Videos', 'model' => $model])
            </div>
            <h1 class="project-video-title">{{ $model->title }}</h1>
        </div>
    </header>
    <div class="project-video-body">
        @include('projects::public.videos._json-ld', ['video' => $model])
        @empty(!$model->summary)
        <p class="project-video-summary">{!! nl2br($model->summary) !!}</p>
        @endempty
        @empty(!$model->image)
        <picture class="project-video-picture">
            <img class="project-video-picture-image" src="{{ $model->present()->image(2000, 1000) }}" width="{{ $model->image->width }}" height="{{ $model->image->height }}" alt="">
            @empty(!$model->image->description)
            <legend class="project-video-picture-legend">{{ $model->image->description }}</legend>
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
