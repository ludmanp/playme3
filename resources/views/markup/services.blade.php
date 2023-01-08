@extends('markup.master')

@section('content')
    <x-common.container>
        <div class='services__container'>
            <div class="services__tabs">
                <x-common.contentBlock>
                    <x-slot name="header">
                        <h3>Наши услуги</h3>
                    </x-slot>
                    <x-slot name="content">
                        <div class="tabBlock__tablist">

                            <x-common.tabNav  :service="true">
                                <x-common.link href='#' class='active' :service-tab="true">
                                    <x-slot name="icon">
                                        <x-icons.runningsmall></x-icons.runningsmall>
                                    </x-slot>
                                    <span class="focus">подготовка к съемке</span>
                                </x-common.link>
                                <x-common.link href='#' :service-tab="true">
                                    <x-slot name="icon">
                                        <x-icons.runningsmall></x-icons.runningsmall>
                                    </x-slot>
                                    <span class="focus">съемка</span>
                                </x-common.link>
                                <x-common.link href='#' :service-tab="true">
                                    <x-slot name="icon">
                                        <x-icons.runningsmall></x-icons.runningsmall>
                                    </x-slot>
                                    <span class="focus">Создание видео</span>
                                </x-common.link>
                                <x-common.link href='#' :service-tab="true">
                                    <x-slot name="icon">
                                        <x-icons.runningsmall></x-icons.runningsmall>
                                    </x-slot>
                                    <span class="focus">ПРЯМОЙ ЭФИР</span>
                                </x-common.link>
                            </x-common.tabNav>

                        </div>
                    </x-slot>
                </x-common.contentBlock>

                <x-common.contentContainer>
                    <div class='tabBlock__tabPanels'>
                        <div class='tabBlock__header'>
                            <span class='tabBlock__header__icon'>
                                <x-icons.runningsmallgreen></x-icons.runningsmallgreen>
                            </span>
                            <h3>подготовка к съемке</h3>
                        </div>

                        <x-common.tabPanel :image="'../img/services/service.jpg'" :imageAlt="'service-image'"
                                           :description="'Придумываем сценарии, Оформляем проекты'">
                            <x-slot name="filters">
                                <x-common.link :service-tag="true" :tagActive="true">Режиссура</x-common.link>
                                <x-common.link :service-tag="true">Режиссура</x-common.link>
                                <x-common.link :service-tag="true">Съемка в павильоне</x-common.link>
                                <x-common.link :service-tag="true">Выбор места съемки</x-common.link>
                                <x-common.link :service-tag="true">Съемка</x-common.link>
                                <x-common.link :service-tag="true">Свет</x-common.link>
                            </x-slot>
                            <x-slot name="action">
                                <x-common.link :withImage="true" :uppercase="true">
                                    <x-slot name="icon">
                                        <x-icons.running></x-icons.running>
                                    </x-slot>
                                    Обсудить свой проект
                                </x-common.link>
                            </x-slot>
                        </x-common.tabPanel>
                    </div>

                </x-common.contentContainer>
            </div>
        </div>
    </x-common.container>
@endsection


