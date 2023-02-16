@extends('core::admin.master')

@section('title', $model->present()->title)

@section('content')

    {!! BootForm::open()->put()->action(route('admin::update-broadcast_date', [$broadcast->id, $model->id]))->multipart()->role('form') !!}
    {!! BootForm::bind($model) !!}
    @include('broadcasts::admin.dates._form')
    {!! BootForm::close() !!}

@endsection
