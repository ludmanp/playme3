@extends('core::admin.master')

@section('title', __('New shooting'))

@section('content')

    {!! BootForm::open()->action(route('admin::index-shootings'))->multipart()->role('form') !!}
        @include('shootings::admin._form')
    {!! BootForm::close() !!}

@endsection
