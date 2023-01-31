@extends('core::admin.master')

@section('title', __('New date'))

@section('content')

    {!! BootForm::open()->action(route('admin::store-broadcast_date', $broadcast->id))->multipart()->role('form') !!}
    @include('broadcasts::admin.dates._form')
    {!! BootForm::close() !!}

@endsection
