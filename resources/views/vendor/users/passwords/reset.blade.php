@extends('core::public.master')

@section('title', __('New password').' – '.$websiteTitle)

@section('content')

    <x-common.container>
        <div class="loginForm">
            <div class="modal__content">
                <div class="modal__header">
                    <div class='modal__header_large'>
                        <span>@lang('New password')</span>
                    </div>
                </div>

                @include('users::_status')

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action='{{ route(app()->getLocale().'::password.request') }}' class='' method="post">
                    @csrf()
                    <x-common.input :placeholder="__('Email')" name="email" type="email" required autofocus autocomplete="username"></x-common.input>
                    <x-common.input :placeholder="__('Password')" name="password" type="password" required autocomplete="new-password"></x-common.input>
                    <x-common.input :placeholder="__('Password confirmation')" name="password_confirmation" type="password" required autocomplete="new-password"></x-common.input>
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class='modal__action'>
                        <x-common.button type='submit' :withImage="true" :uppercase="true">
                            <x-slot name="icon">
                                <x-icons.running></x-icons.running>
                            </x-slot>
                            @lang('Change Password')
                        </x-common.button>
                    </div>
                </form>
            </div>
        </div>
    </x-common.container>
@endsection
