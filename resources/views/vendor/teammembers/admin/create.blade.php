@extends('core::admin.master')

@section('title', __('New teammember'))

@section('content')

    {!! BootForm::open()->action(route('admin::index-teammembers'))->multipart()->role('form') !!}
        @include('teammembers::admin._form')
    {!! BootForm::close() !!}

@endsection
