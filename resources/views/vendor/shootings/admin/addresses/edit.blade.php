@extends('core::admin.master')

@section('title', $model->present()->title)

@section('content')

    {!! BootForm::open()->put()->action(route('admin::update-shooting_address', [$shooting->id, $model->id]))->multipart()->role('form') !!}
    {!! BootForm::bind($model) !!}
    @include('shootings::admin.addresses._form')
    {!! BootForm::close() !!}

@endsection
