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
    <x-layout.home.videoBlock
        :title="'СОЗДАЕМ ВИДЕО'"
        :subtitle="'ДЛЯ ВАС И ВАШЕГО БИЗНЕСА'"
        :header-text="'Любое мероприятие, которое вы устраиваете, мы готовы снимать и транслировать в интернете.
                                Любой дело, которым вы занимаетесь,
                                мы покажем в лучшем свете!
                                Наша команда — это профессионалы в производстве видеоконтента!'"
    ></x-layout.home.videoBlock>
    <x-layout.home.facts :title="__('Facts')">
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
    <x-layout.home.clients :clients="[['href'=> '#', 'image'=> '../img/home/clients/coaom.svg', 'imageAlt'=> 'coaom-img'],
               ['href'=> '#', 'image'=> '../img/home/clients/ac.svg', 'imageAlt'=> 'ac-img'],
               ['href'=> '#', 'image'=> '../img/home/clients/am.svg', 'imageAlt'=> 'am-img'],
               ['href'=> '#', 'image'=> '../img/home/clients/mth.svg', 'imageAlt'=> 'mth-img'],
               ['href'=> '#', 'image'=> '../img/home/clients/m.svg', 'imageAlt'=> 'm-img'],
               ['href'=> '#', 'image'=> '../img/home/clients/rtv.svg', 'imageAlt'=> 'rtv-img'],
               ['href'=> '#', 'image'=> '../img/home/clients/ksc.svg', 'imageAlt'=> 'ksc-img'],
               ['href'=> '#', 'image'=> '../img/home/clients/imf.svg', 'imageAlt'=> 'imf-img'],
               ['href'=> '#', 'image'=> '../img/home/clients/w.svg', 'imageAlt'=> 'w-img'],
               ]"></x-layout.home.clients>
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
    <x-layout.home.partners :partners="[['href'=> '#', 'image'=> '../img/home/partners/sh.svg', 'imageAlt'=> 'sh-img'],
               ['href'=> '#', 'image'=> '../img/home/partners/p.svg', 'imageAlt'=> 'p-img'],
               ['href'=> '#', 'image'=> '../img/home/partners/r.svg', 'imageAlt'=> 'r-img'],
               ]"></x-layout.home.partners>
    <x-layout.home.blog></x-layout.home.blog>
    <x-layout.home.contacts>
        <form class='contactsBlock__form' action=''>
            <h3 class='contactsBlock__formHeader'>Не нашли, что искали?</h3>
            <p class='contactsBlock__formDescription'>Напишите нам и мы перезвоним
                Вам в ближайшее время</p>
            <x-common.input :placeholder="'Имя'" type='text'></x-common.input>
            <x-common.input :placeholder="'E-mail'" type='email'></x-common.input>
            <x-common.input :placeholder="'Телефон'" type='tel'></x-common.input>
            <x-common.textarea :placeholder="'Коментарий'"></x-common.textarea>
            <x-common.checkbox>
                <x-slot name="checkboxText">
                    Я согласен на обработку <x-common.link :inlineText="true" href='#'>персональных данных</x-common.link>
                </x-slot>
            </x-common.checkbox>
            <x-common.button type='submit' :withImage="true" :uppercase="true">
                <x-slot name="icon">
                    <x-icons.running></x-icons.running>
                </x-slot>
                отправить
            </x-common.button>
        </form>
    </x-layout.home.contacts>
@endsection


