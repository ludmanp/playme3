@extends('core::public.master')

@section('title', __('Reset Password').' – '.$websiteTitle)

@section('content')

    <x-common.container>
        <div class="loginForm">
            <div class="modal__content">
                <div class="modal__header">
                    <div class='modal__header_large'>
                        <span>@lang('Reset Password')</span>
                    </div>
                </div>
                <div class="modal__text">
                    <p>{{ __('Please enter email provided during registration and we will send you password reset link')  }}</p>
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

                <form action='{{ route(app()->getLocale().'::password.email') }}' class='' method="post">
                    @csrf()
                    <x-common.input :placeholder="__('Email')" name="email" type="email" required autofocus autocomplete="username"></x-common.input>
                    <div class='modal__link'>
                        <x-common.link :inlineText="true" :href="route(app()->getLocale().'::login')">{{ __('I know password') }}</x-common.link>
                    </div>
                    <div class='modal__action'>
                        <x-common.button type='submit' :withImage="true" :uppercase="true">
                            <x-slot name="icon">
                                <x-icons.running></x-icons.running>
                            </x-slot>
                            @lang('Send Password Reset Link')
                        </x-common.button>
                    </div>
                </form>
            </div>
        </div>
    </x-common.container>
@endsection
