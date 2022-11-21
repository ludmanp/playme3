@extends('pages::public.master')

@section('page')

    @php
    $mainPage = true;
    @endphp
    @section('content')
        <x-layout.home.videoBlock></x-layout.home.videoBlock>
        @include('facts::public._section')
        <x-layout.home.clients></x-layout.home.clients>

        @include('services::public._carousel')

        <x-layout.home.partners></x-layout.home.partners>
        <x-layout.home.blog></x-layout.home.blog>
        <x-layout.home.contacts></x-layout.home.contacts>
    @endsection

@endsection
