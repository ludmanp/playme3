@extends('core::public.master')

@php
    /** @var \TypiCMS\Modules\Broadcasts\Models\Broadcast $model */
@endphp

@section('title', __('New Broadcast').' – '.$websiteTitle)

@section('content')

    <x-common.container>
        <div class='stream__container'>
            <x-common.contentBlock :row="true">
                <x-slot name="header">
                    <h3>@lang('Profile')</h3>
                </x-slot>
                <x-slot name="subheader">
                    <h3>{{ $model->title }}</h3>
                </x-slot>
            </x-common.contentBlock>
            <x-layout.stream.orderForm>
                <div id="broadcast-form-app">
                    <broadcast-form
                        csrf-token="{{ csrf_token() }}"
                        form-title="@lang('Order broadcast')"
                        label-title="@lang('Broadcast title')"
                        label-description="@lang('Broadcast description')"
                        label-address="@lang('Address')"
                        label-addresses="@lang('Broadcast place')"
                        label-add-address="@lang('Add address')"
                        label-date="@lang('Broadcast date')"
                        label-starts-at="@lang('Shooting start')"
                        label-arrive-at="@lang('Arrival')"
                        label-add-date="@lang('Add date')"
                        label-contact-person="@lang('Contact person')"
                        label-name="@lang('Name')"
                        label-phone="@lang('Phone')"
                        label-email="@lang('Email')"
                        label-camera="@lang('Camera')"
                        label-camera-quantity="@lang('Quantity of cameras')"
                        label-available-to-all="@lang('Available to all')"
                        label-password-required="@lang('Password required')"
                        title-logistics="@lang('Logistics')"
                        label-equipment-delivery="@lang('Equipment delivery')"
                        label-broadcast-on-platform="@lang('Broadcast on platform')"
                        title-decoration="@lang('Decoration')"
                        label-makeup="@lang('Make up')"
                        label-design="@lang('Graphics design')"
                        title-final-video="@lang('Final video preparation')"
                        label-video-light="@lang('Work with light')"
                        label-video-sound="@lang('Work with sound')"
                        title-post-productsion="@lang('Post products')"
                        label-social-video="@lang('Video for social media')"
                        label-reporting-video="@lang('Reporting video')"
                        label-corporate-video="@lang('Corporate video')"
                        label-promo-video="@lang('Promo video')"
                        label-conference2h="@lang('Conference till 2 hrs')"
                        label-conference4h="@lang('Conference till 4 hrs')"
                        label-template-elements="@lang('Template elements')"
                        label-custom-elements="@lang('Custom elements')"
                        title-leader="@lang('Project contact person')"
                        title-company="@lang('Company')"
                        label-company-name="@lang('Company name')"
                        label-registration-number="@lang('Company name')"
                        label-legal-address="@lang('Legal address')"
                        label-create-broadcast="@lang('Create broadcast')"

                        :data-model="{{ $model->present()->toJs() }}"
                    >
                        <template slot="broadcast-description">
                            <div class='orderForm__row'>
                                <p class='orderForm__formSubheader'>@lang('Broadcast')</p>
                                <div class='orderForm__recommendation'>
                                    <p class='orderForm__recommendation__header'>
                                        @lang('Broadcast recommendation')
                                    </p>
                                    <div class='orderForm__recommendationsList'>
                                        <p><span class='green'>@lang('1 camera')</span> – @lang('1 camera text')</p>
                                        <p><span class='green'>@lang('2 cameras')</span> – @lang('2 cameras text')</p>
                                        <p><span class='green'>@lang('3 cameras and more')</span> – @lang('3 cameras text')</p>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </broadcast-form>
                </div>
            </x-layout.stream.orderForm>
        </div>
    </x-common.container>
@endsection
