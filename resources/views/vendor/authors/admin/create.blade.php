@extends('core::admin.master')

@section('title', __('New author'))

@section('content')

    {!! BootForm::open()->action(route('admin::index-authors'))->multipart()->role('form') !!}
        @include('authors::admin._form')
    {!! BootForm::close() !!}

@endsection
