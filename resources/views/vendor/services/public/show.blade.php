@extends('core::public.master')

@php
    /** @var \TypiCMS\Modules\Services\Models\Service $model */
@endphp

@section('title', $model->title.' – '.__('Services').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('ogImage', $model->present()->image(1200, 630))
@section('bodyClass', 'body-services body-service-'.$model->id.' body-page body-page-'.$page->id)

@section('content')

    <x-common.container>
        <div class='services__container'>
            <div class="services__tabs">
                <x-common.contentBlock>
                    <x-slot name="header">
                        <h3>@lang('Our Services')</h3>
                    </x-slot>
                    <x-slot name="content">
                        @include('services::public._nav')
                    </x-slot>
                </x-common.contentBlock>

                <x-common.contentContainer>
                    <div class='tabBlock__tabPanels'>
                        <div class='tabBlock__header'>
                            <span class='tabBlock__header__icon'>
                                <x-icons.runningsmallgreen></x-icons.runningsmallgreen>
                            </span>
                            <h3>{{ $model->title }}</h3>
                        </div>

                        <x-core::common.tabPanel :image="$model->present()->image()" :imageAlt="$model->title"
                                           :description="''">
                            <x-slot name="filters">
                                @include('services::public.details._nav', ['service' => $model])
                            </x-slot>
                            <x-slot name="action">
                                @include('services::public._discuss-button')
                            </x-slot>
                        </x-core::common.tabPanel>
                    </div>

                </x-common.contentContainer>
            </div>
        </div>
    </x-common.container>

@endsection
