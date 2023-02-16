@extends('core::public.master')

@section('title', __('Login').' – '.$websiteTitle)

@section('content')

    <x-common.container>
        <div class="loginForm">
            <div class="modal__content">
                <div class="modal__header">
                    <div class='modal__header_large'>
                        <span>Авторизация</span>
                        <span class='dash'></span>
                        <span>Регистрация</span>
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

                <form action='' class='' method="post">
                    @csrf()
                    <x-common.input :placeholder="__('Email')" name="email" type="email"></x-common.input>
                    <x-common.input :placeholder="__('Password')" name="password" type="password"></x-common.input>
                    <div class='modal__link'>
                        <x-common.link :inlineText="true" :href="route(app()->getLocale().'::password.request')">{{ __('Forgot Your Password?') }}</x-common.link>
                    </div>
                    <x-common.checkbox name="remember">
                        <x-slot name="checkboxText">
                            @lang('Remember me')
                        </x-slot>
                    </x-common.checkbox>
                    <div class='modal__link'>
                        <x-common.link :inlineText="true" :href="route(app()->getLocale().'::register')">{{ __('Register') }}</x-common.link>
                    </div>
                    <div class='modal__action'>
                        <x-common.button type='submit' :withImage="true" :uppercase="true">
                            <x-slot name="icon">
                                <x-icons.running></x-icons.running>
                            </x-slot>
                            @lang('Login')
                        </x-common.button>
                    </div>
                </form>
            </div>
        </div>
    </x-common.container>


{{--    <div id="login" class="container-login auth auth-sm">--}}

{{--            @include('users::_auth-header')--}}

{{--    {!! BootForm::open()->addClass('auth-form') !!}--}}

{{--        <h1 class="auth-title">{{ __('Login') }}</h1>--}}

{{--        @include('users::_status')--}}

{{--        {!! BootForm::email(__('Email'), 'email')->addClass('form-control-lg')->autofocus(true)->required()->autocomplete('username') !!}--}}
{{--        {!! BootForm::password(__('Password'), 'password')->addClass('form-control-lg')->required()->autocomplete('current-password') !!}--}}

{{--        <div class="mb-3">--}}
{{--            {!! BootForm::checkbox(__('Remember Me'), 'remember') !!}--}}
{{--        </div>--}}

{{--        <div class="mb-3 d-grid">--}}
{{--            {!! BootForm::submit(__('Login'), 'btn-primary')->addClass('btn-lg') !!}--}}
{{--        </div>--}}

{{--        <a class="form-text mt-0 d-block" href="{{ route(app()->getLocale().'::password.request') }}">{{ __('Forgot Your Password?') }}</a>--}}

{{--    {!! BootForm::close() !!}--}}

{{--    @if (config('typicms.register'))--}}
{{--    <p class="alert alert-warning alert-not-a-member">--}}
{{--        @lang('Not a member?') <a class="alert-link" href="{{ route(app()->getLocale().'::register') }}">@lang('Become a member')</a> @lang('and get access to all the content of our website.')--}}
{{--    </p>--}}
{{--    @endif--}}

{{--    <p class="auth-back-to-website">--}}
{{--        <a class="auth-back-to-website-link" href="{{ TypiCMS::homeUrl() }}">--}}
{{--            <svg class="me-1" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
{{--                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>--}}
{{--            </svg>{{ __('Back to the website') }}--}}
{{--        </a>--}}
{{--    </p>--}}

{{--</div>--}}

@endsection
