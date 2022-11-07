@extends('core::admin.master')

@section('title', __('New detail'))

@section('content')

    {!! BootForm::open()->action(route('admin::store-service_detail', $service->id))->multipart()->role('form') !!}
    @include('services::admin.details._form')
    {!! BootForm::close() !!}

@endsection
