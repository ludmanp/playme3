@extends('core::admin.master')

@section('title', __('New address'))

@section('content')

    <div class="header">
        @include('core::admin._button-back', ['url' => route('admin::edit-broadcast', $broadcast)])
        <h1 class="header-title">@lang('New broadcast')</h1>
    </div>

    {!! BootForm::open()->action(route('admin::store-broadcast_address', $broadcast->id))->multipart()->role('form') !!}
    @include('broadcasts::admin.addresses._form')
    {!! BootForm::close() !!}

@endsection
