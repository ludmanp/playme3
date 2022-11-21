@extends('core::admin.master')

@section('title', __('New social'))

@section('content')

    {!! BootForm::open()->action(route('admin::store-teammember_social', $teammember->id))->multipart()->role('form') !!}
    @include('teammembers::admin.socials._form')
    {!! BootForm::close() !!}

@endsection
