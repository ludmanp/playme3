@extends('core::admin.master')

@section('title', __('New address'))

@section('content')

    {!! BootForm::open()->action(route('admin::store-shooting_address', $shooting->id))->multipart()->role('form') !!}
    @include('shootings::admin.addresses._form')
    {!! BootForm::close() !!}

@endsection
