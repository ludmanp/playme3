@extends('core::admin.master')

@section('title', __('New address'))

@section('content')

    {!! BootForm::open()->action(route('admin::store-broadcast_address', $broadcast->id))->multipart()->role('form') !!}
    @include('broadcasts::admin.addresses._form')
    {!! BootForm::close() !!}

@endsection
