@extends('markup.master')

@section('header')
    <x-common.header :mainPage="true"></x-common.header>
@endsection
@section('content')
    <x-common.container>
        <x-layout.home.videoBlock></x-layout.home.videoBlock>
        <x-layout.home.facts></x-layout.home.facts>
        <x-layout.home.clients></x-layout.home.clients>
        <x-layout.home.services></x-layout.home.services>
        <x-layout.home.partners></x-layout.home.partners>
        <x-layout.home.blog></x-layout.home.blog>
    </x-common.container>
@endsection
@section('footer')
    <x-common.footer></x-common.footer>
@endsection


