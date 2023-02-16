@extends('core::admin.master')

@section('title', __('New contactform'))

@section('content')

    {!! BootForm::open()->action(route('admin::index-contactforms'))->multipart()->role('form') !!}
        @include('contactforms::admin._form')
    {!! BootForm::close() !!}

@endsection
