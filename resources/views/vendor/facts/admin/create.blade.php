@extends('core::admin.master')

@section('title', __('New fact'))

@section('content')

    {!! BootForm::open()->action(route('admin::index-facts'))->multipart()->role('form') !!}
        @include('facts::admin._form')
    {!! BootForm::close() !!}

@endsection
