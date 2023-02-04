@extends('core::public.master')

@php
/** @var \TypiCMS\Modules\Broadcasts\Models\Broadcast $model */
@endphp
@section('title', $model->title.' – '.__('Broadcasts').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('ogImage', $model->present()->image(1200, 630))

@section('content')
    <x-common.container>
        <div class='stream__container'>
            <x-common.contentBlock :row="true">
                <x-slot name="header">
                    <h3>{{ $model->title }}</h3>
                </x-slot>
            </x-common.contentBlock>
            <div class='watchStreamContainer'>
                @if($model->embed_script || $model->image)
                    <div class='watchStreamBlock'>
                        <div class='watchStreamBlock__videoBlock'>
                            <div class='clientGallery__item'>
                                <div class='clientGallery__videoBlock'>
                                    @if($model->embed_script)
                                        {!! $model->present()->prepareScript() !!}
                                    @elseif($model->image)
                                        <div class='informationImage'>
                                            <img class='clientGallery__videoImage' src='{{ $model->present()->image() }}' alt='{{ $$model->image->alt_attribute }}'>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class='watchStream__infoBlock'>
                    <div class='watchStreamBlock__videoDescription'>
                        <h3 class='watchStreamBlock__descriptionHeader'>
                            {{ $model->title }}
                        </h3>
                        <p class='watchStreamBlock__description'>
                            {{ $model->summary }}
                        </p>
                    </div>
                    <div class='watchStream__streamTimetable'>
                        @if($model->first_date)
                        <div>
                            <p>@lang('Broadcast starts at'): {{ optional($model->first_date->starts_at)->format('d.m.Y H:i') }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </x-common.container>
@endsection
