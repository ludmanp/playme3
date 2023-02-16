@extends('pages::public.master')

@section('page')

    @php
    $mainPage = true;
    @endphp
    @section('content')
        <x-layout.home.videoBlock
            :title="$pageOptions->present()->local('title')"
            :subtitle="$pageOptions->present()->local('subtitle')"
            :header-text="$pageOptions->present()->local('header_text')"
            :contact-link="$pageOptions->present()->local('contact_link')"
        ></x-layout.home.videoBlock>
        @include('facts::public._section')
        @include('clients::public._section')

        @include('services::public._carousel')


        @include('partners::public._section')
        <x-layout.home.blog></x-layout.home.blog>
        <x-layout.home.contacts>
            @include('contactforms::public._form', ['title' => __('Did not find what you were looking for?'), 'subtitle' => 'Write to us and we will call you back as soon as possible'])
        </x-layout.home.contacts>
    @endsection

@endsection
