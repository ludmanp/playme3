@extends('core::admin.master')

@section('title', __('New broadcast'))

@section('content')

    {!! BootForm::open()->action(route('admin::index-broadcasts'))->multipart()->role('form') !!}
        @include('broadcasts::admin._form')
    {!! BootForm::close() !!}

@endsection
