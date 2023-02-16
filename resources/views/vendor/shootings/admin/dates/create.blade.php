@extends('core::admin.master')

@section('title', __('New date'))

@section('content')

    {!! BootForm::open()->action(route('admin::store-shooting_date', $shooting->id))->multipart()->role('form') !!}
    @include('shootings::admin.dates._form')
    {!! BootForm::close() !!}

@endsection
