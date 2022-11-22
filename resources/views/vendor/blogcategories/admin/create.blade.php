@extends('core::admin.master')

@section('title', __('New blog category'))

@section('content')

    {!! BootForm::open()->action(route('admin::index-blogcategories'))->multipart()->role('form') !!}
        @include('blogcategories::admin._form')
    {!! BootForm::close() !!}

@endsection
