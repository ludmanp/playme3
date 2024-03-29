@extends('core::public.master')

@php
    /** @var \TypiCMS\Modules\Shootings\Models\Shooting $model */
@endphp

@section('title', __('New Shooting').' – '.$websiteTitle)

@section('content')

    <x-common.container>
        <div class='stream__container'>
            <x-common.contentBlock :row="true">
                <x-slot name="header">
                    <h3><a href="{{ route(config('app.locale') . '::customer-profile') }}">@lang('Profile')</a></h3>
                </x-slot>
                <x-slot name="subheader">
                    <h3>{{ $model->title }}</h3>
                </x-slot>
            </x-common.contentBlock>
            <x-layout.stream.orderForm>
                <div id="shooting-form-app">
                    <shooting-form
                        csrf-token="{{ csrf_token() }}"
                        form-title="@lang('Order shooting')"
                        label-title="@lang('Shooting title')"
                        label-description="@lang('Shooting description')"
                        title-product="@lang('Product')"
                        :products-list="{{ json_encode(\TypiCMS\Modules\Shootings\Enums\ProductEnum::forForm()) }}"
                        label-address="@lang('Address')"
                        label-addresses="@lang('Shooting place')"
                        label-add-address="@lang('Add address')"
                        label-date="@lang('Shooting date')"
                        label-add-date="@lang('Add date')"
                        label-name="@lang('Name')"
                        label-phone="@lang('Phone')"
                        label-email="@lang('Email')"
                        title-shooting-preparation="@lang('Preproduction')"
                        label-creative-idea="@lang('Creative Idea')"
                        label-detailed-scenario="@lang('Detailed Scenario')"
                        label-story-board="@lang('Story Board')"
                        label-scenario-is-ready="@lang('Detailed Scenario is Ready')"

                        title-shooting-parameters="@lang('Shooting parameters')"
                        label-shooting-cameras="@lang('Quantity of shooting cameras')"
                        label-photo-cameras="@lang('Quantity of photo cameras')"
                        label-director-on-set="@lang('Director on set')"
                        label-video-light="@lang('Work with light on set')"
                        label-video-sound="@lang('Work with sound on set')"
                        label-makeup="@lang('Make up')"

                        title-logistics="@lang('Logistics')"
                        label-equipment-delivery="@lang('Equipment delivery')"
                        title-post-Production="@lang('Post products')"
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
                        label-registration-number="@lang('Registration number')"
                        label-legal-address="@lang('Legal address')"
                        label-create-shooting="@lang('Create shooting')"
                        label-edit-shooting="@lang('Edit shooting')"
                        label-think-yourself="@lang('Figure it all out yourself')"
                        label-cannot-edit="@lang('To make other changes please contact us')"
                        label-declined="@lang('Your order is declined')"

                        :data-model="{{ $model->present()->toJs() }}"
                    >
                    </shooting-form>
                </div>
            </x-layout.stream.orderForm>
        </div>
    </x-common.container>
@endsection
