@extends('pages::public.master')

@section('bodyClass', 'body-facts body-facts-index body-page body-page-'.$page->id)

@section('page')

<div class="page-body">

    <div class="page-body-container">

        <div class="rich-content">{!! $page->present()->body !!}</div>

        @include('files::public._document-list', ['model' => $page])
        @include('files::public._image-list', ['model' => $page])

        @include('facts::public._itemlist-json-ld', ['items' => $models])

        @includeWhen($models->count() > 0, 'facts::public._list', ['items' => $models])

    </div>

</div>

@endsection
