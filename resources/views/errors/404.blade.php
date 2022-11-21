@extends('core::public.master')

@section('title', 'Error 404 – '.$websiteTitle)

@section('bodyClass', 'error-404')

@section('content')

    <div class='error__container'>
        <div><x-icons.error></x-icons.error></div>
        <div>
            <x-icons.404></x-icons.404>
            <div class='error__action'>
                <x-common.link :withImage="true" :uppercase="true" href="javascript:void(0)">
                    <x-slot name="icon">
                        <x-icons.running></x-icons.running>
                    </x-slot>
                    @lang('Order video')
                </x-common.link>
            </div>
        </div>
    </div>

@endsection
