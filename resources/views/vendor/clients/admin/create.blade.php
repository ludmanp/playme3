@extends('core::admin.master')

@section('title', __('New client'))

@section('content')

    {!! BootForm::open()->action(route('admin::index-clients'))->multipart()->role('form') !!}
        @include('clients::admin._form')
    {!! BootForm::close() !!}

@endsection
