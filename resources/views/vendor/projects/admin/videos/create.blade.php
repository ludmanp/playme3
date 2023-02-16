@extends('core::admin.master')

@section('title', __('New video'))

@section('content')

    {!! BootForm::open()->action(route('admin::store-project_video', $project->id))->multipart()->role('form') !!}
    @include('projects::admin.videos._form')
    {!! BootForm::close() !!}

@endsection
