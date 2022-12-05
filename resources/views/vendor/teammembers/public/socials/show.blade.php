@extends('core::public.master')

@section('title', $model->title.' – '.__('Teammember Socials').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('ogImage', $model->present()->image(1200, 630))
@section('bodyClass', 'body-teammembers body-teammember-'.$model->id.' body-page body-page-'.$page->id)

@section('content')

<article class="teammember-social">
    <header class="teammember-social-header">
        <div class="teammember-social-header-container">
            <div class="teammember-social-header-navigator">
                @include('core::public._items-navigator', ['module' => 'Teammember Socials', 'model' => $model])
            </div>
            <h1 class="teammember-social-title">{{ $model->title }}</h1>
        </div>
    </header>
    <div class="teammember-social-body">
        @include('teammembers::public.socials._json-ld', ['social' => $model])
        @empty(!$model->summary)
        <p class="teammember-social-summary">{!! nl2br($model->summary) !!}</p>
        @endempty
        @empty(!$model->image)
        <picture class="teammember-social-picture">
            <img class="teammember-social-picture-image" src="{{ $model->present()->image(2000, 1000) }}" width="{{ $model->image->width }}" height="{{ $model->image->height }}" alt="">
            @empty(!$model->image->description)
            <legend class="teammember-social-picture-legend">{{ $model->image->description }}</legend>
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
