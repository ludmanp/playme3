@extends('pages::public.master')

@section('page')

    @section('header')
        <x-common.header :mainPage="true"></x-common.header>
    @endsection
    @section('content')
        <x-layout.home.videoBlock></x-layout.home.videoBlock>
        <x-layout.home.facts></x-layout.home.facts>
        <x-layout.home.clients></x-layout.home.clients>

        @include('services::public._carousel')

        <x-layout.home.partners></x-layout.home.partners>
        <x-layout.home.blog></x-layout.home.blog>
        <x-layout.home.contacts></x-layout.home.contacts>
    @endsection
    @section('footer')
        <x-common.footer></x-common.footer>
    @endsection

@endsection
