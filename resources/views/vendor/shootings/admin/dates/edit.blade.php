@extends('core::admin.master')

@section('title', $model->present()->title)

@section('content')

    {!! BootForm::open()->put()->action(route('admin::update-shooting_date', [$shooting->id, $model->id]))->multipart()->role('form') !!}
    {!! BootForm::bind($model) !!}
    @include('shootings::admin.dates._form')
    {!! BootForm::close() !!}

@endsection
