@extends('core::public.master')

@section('title', __('Verify').' – '.$websiteTitle)

@section('content')

    <x-common.container>
        <div class="loginForm">
            <div class="modal__content">
                <div class="modal__header">
                    <div class='modal__header_large'>
                        <span>@lang('Your email address has been verified.')</span>
                    </div>
                </div>

                <div class='modal__action'>
                    <x-common.link :withImage="true" :uppercase="true"
                                   :href="TypiCMS::homeUrl()">
                        <x-slot name="icon">
                            <x-icons.running></x-icons.running>
                        </x-slot>

                        {{ __('Go to our homepage') }}
                    </x-common.link>
                </div>

            </div>
        </div>
    </x-common.container>

@endsection
