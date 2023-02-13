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
        <x-layout.home.contacts></x-layout.home.contacts>
    @endsection

@endsection
