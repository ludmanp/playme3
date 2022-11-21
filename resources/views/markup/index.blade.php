@extends('markup.master')

@section('header')
    <x-common.header :mainPage="true">
        <x-slot name="menu">
            <x-common.link :href="'#'">Услуги</x-common.link>
            <x-common.link :href="'#'">Клиенты</x-common.link>
            <x-common.link :href="'#'">Команда</x-common.link>
            <x-common.link :href="'#'">Блог</x-common.link>
            <x-common.link :href="'#'">Контакты</x-common.link>
        </x-slot>
        <x-slot name="langSwitcher">
            <div class='header__languages'>
                <x-common.link :currentLang="true" :href="'#'">RU</x-common.link>
                <x-common.link :href="'#'">EN</x-common.link>
            </div>
        </x-slot>
        <x-slot name="userButton">
            <x-common.link data-a11y-dialog-show="loginModal" :withImageAfter="true" :href="'#'">
                Личный кабинет
                <x-slot name="iconAfter">
                    <x-icons.login></x-icons.login>
                </x-slot>
            </x-common.link>
        </x-slot>
    </x-common.header>
@endsection
@section('content')
    <x-layout.home.videoBlock></x-layout.home.videoBlock>
    <x-layout.home.facts>
        <x-slot name="text">
            <p>Нашей командой реализовано более 300+ крупнейших проектов. Мы пишем, делаем, организуем, проводим, оформляем и создаём продукт любой сложности
                и в любых условиях!</p>
        </x-slot>
        <x-slot name="facts">
            <x-layout.home.factLink href='#' :description="'Трансляций'" :number="'115'"
                                    :fact="'Промо ролики'" :imageAlt="'image'"
                                    :image="'../img/home/fact.jpg'"
            >
            </x-layout.home.factLink>
            <x-layout.home.factLink href='#' :description="'Трансляций'" :number="'115'"
                                    :fact="'Промо ролики'" :imageAlt="'image'"
                                    :image="'../img/home/fact.jpg'"
            >
            </x-layout.home.factLink>
            <x-layout.home.factLink href='#' :description="'Трансляций'" :number="'115'"
                                    :fact="'Промо ролики'" :imageAlt="'image'"
                                    :image="'../img/home/fact.jpg'"
            >
            </x-layout.home.factLink>
            <x-layout.home.factLink href='#' :description="'Трансляций'" :number="'115'"
                                    :fact="'Промо ролики'" :imageAlt="'image'"
                                    :image="'../img/home/fact.jpg'"
            >
            </x-layout.home.factLink>
        </x-slot>
    </x-layout.home.facts>
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


