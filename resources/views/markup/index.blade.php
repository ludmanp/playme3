@extends('markup.master')

@section('header')
    <x-common.header :mainPage="true"></x-common.header>
@endsection
@section('content')
    <x-layout.home.videoBlock></x-layout.home.videoBlock>
    <x-layout.home.facts></x-layout.home.facts>
    <x-layout.home.clients></x-layout.home.clients>
    <x-layout.home.services
            title="Сервисы"
    >
        <x-layout.home.serviceCard :link="'#'" :header="'Подготовка к съемке'" :subheader="'Preproduction'"
                                   :image="'../img/home/services/service.jpg'" :imageAlt="'service-image'">
            <x-slot name="services">
                <p>Создаем концепции</p>
                <p>Оформляем проекты</p>
                <p>Пишем сценарии</p>
            </x-slot>

        </x-layout.home.serviceCard>
        <x-layout.home.serviceCard :link="'#'" :header="'Подготовка к съемке'" :subheader="'Preproduction'"
                                   :image="'../img/home/services/service.jpg'" :imageAlt="'service-image'">
            <x-slot name="services">
                <p>Создаем концепции</p>
                <p>Оформляем проекты</p>
                <p>Пишем сценарии</p>
                <p>Пишем сценарии</p>
                <p>Пишем сценарии</p>
            </x-slot>

        </x-layout.home.serviceCard>
        <x-layout.home.serviceCard :link="'#'" :header="'Подготовка к съемке'" :subheader="'Preproduction'"
                                   :image="'../img/home/services/service.jpg'" :imageAlt="'service-image'">
            <x-slot name="services">
                <p>Создаем концепции</p>
                <p>Оформляем проекты</p>
                <p>Пишем сценарии</p>
            </x-slot>

        </x-layout.home.serviceCard>
    </x-layout.home.services>
    <x-layout.home.partners></x-layout.home.partners>
    <x-layout.home.blog></x-layout.home.blog>
    <x-layout.home.contacts></x-layout.home.contacts>
@endsection
@section('footer')
    <x-common.footer></x-common.footer>
@endsection


