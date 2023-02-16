@extends('core::public.master')

@section('title', __('Register').' – '.$websiteTitle)

@section('content')

    <x-common.container>
        <div class="loginForm">
            <div class="modal__content">
                <div class="modal__header">
                    <div class='modal__header_large'>
                        <span>@lang('Register')</span>
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

                <form method="post">
                    @csrf()
                    {!! Honeypot::generate('my_name', 'my_time') !!}

                    <x-common.input :placeholder="__('Name')" name="first_name" type="text" required autofocus value="{{ old('first_name') }}"></x-common.input>
                    <div class='modal__row'>
                        <x-common.input :placeholder="__('Email')" name="email" type="email" required  value="{{ old('email') }}"></x-common.input>
                        <x-common.input :placeholder="__('Phone')" name="phone" type="tel" value="{{ old('phone') }}"></x-common.input>
                    </div>
                    <x-common.input :placeholder="__('Password')" name="password" type="password" required autocomplete="new-password"></x-common.input>
                    <x-common.input :placeholder="__('Password confirmation')" name="password_confirmation" type="password" required autocomplete="new-password"></x-common.input>

                    <div class='modal__action'>
                        <x-common.button type='submit' :withImage="true" :uppercase="true">
                            <x-slot name="icon">
                                <x-icons.running></x-icons.running>
                            </x-slot>
                            @lang('Register')
                        </x-common.button>
                    </div>
                </form>
            </div>
        </div>
    </x-common.container>

@endsection
