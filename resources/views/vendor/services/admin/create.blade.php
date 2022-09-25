@extends('core::admin.master')

@section('title', __('New service'))

@section('content')

    {!! BootForm::open()->action(route('admin::index-services'))->multipart()->role('form') !!}
        @include('services::admin._form')
    {!! BootForm::close() !!}

@endsection
