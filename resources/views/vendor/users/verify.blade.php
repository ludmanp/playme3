@extends('core::public.master')

@section('title', __('Verify').' – '.$websiteTitle)

@section('content')

    <x-common.container>
        <div class="loginForm">
            <div class="modal__content">
                <div class="modal__header">
                    <div class='modal__header_large'>
                        <span>@lang('Verify Your Email Address')</span>
                    </div>
                </div>

                <div class="modal__text">
                @if (session('resent'))
                        <p>{{ __('A fresh verification link has been sent to your email address.') }}</p>
                @endif
                    <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
{{--                    <p>{{ __('If you did not receive the email') }}, <a href="{{ route(app()->getLocale().'::verification.resend') }}">{{ __('click here to request another') }}</a>.</p>--}}
                </div>

            </div>
        </div>
    </x-common.container>
@endsection
