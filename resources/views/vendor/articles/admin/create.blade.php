@extends('core::admin.master')

@section('title', __('New article'))

@section('content')

    {!! BootForm::open()->action(route('admin::index-articles'))->multipart()->role('form') !!}
        @include('articles::admin._form')
    {!! BootForm::close() !!}

@endsection
