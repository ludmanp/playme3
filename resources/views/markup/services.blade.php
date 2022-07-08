@extends('markup.master')

@section('content')
    <x-common.container>
        <div class='services__container'>
            <div class="services__tabs">
                <x-common.contentBlock :row="true">
                    <x-slot name="header">
                        <h3>Наши услуги</h3>
                    </x-slot>
                    <x-slot name="subheader">
                        <h3>подготовка к съемке</h3>
                    </x-slot>
                </x-common.contentBlock>

                <x-common.contentContainer>
                    <div class="tabBlock__tablist">

                        <x-common.tabNav>
                            <x-common.link href='#' class='active' :tab="true">
                                <x-slot name="icon">
                                    <x-icons.runningsmall></x-icons.runningsmall>
                                </x-slot>
                                <span class="focus">подготовка к съемке</span>
                            </x-common.link>
                            <x-common.link href='#' :tab="true">
                                <x-slot name="icon">
                                    <x-icons.runningsmall></x-icons.runningsmall>
                                </x-slot>
                                <span class="focus">съемка</span>
                            </x-common.link>
                            <x-common.link href='#' :tab="true">
                                <x-slot name="icon">
                                    <x-icons.runningsmall></x-icons.runningsmall>
                                </x-slot>
                                <span class="focus">Создание видео</span>
                            </x-common.link>
                            <x-common.link href='#' :tab="true">
                                <x-slot name="icon">
                                    <x-icons.runningsmall></x-icons.runningsmall>
                                </x-slot>
                                <span class="focus">ПРЯМОЙ ЭФИР</span>
                            </x-common.link>
                        </x-common.tabNav>

                    </div>

                    <div class='tabBlock__tabPanels'>
                        <x-common.tabPanel :image="'../img/services/service.jpg'" :imageAlt="'service-image'"
                                           :description="'Придумываем сценарии, Оформляем проекты'">
                            <x-slot name="filters">
                                <x-common.button :tag="true" :tagActive="true">Режиссура</x-common.button>
                                <x-common.button :tag="true">Режиссура</x-common.button>
                                <x-common.button :tag="true">Съемка в павильоне</x-common.button>
                                <x-common.button :tag="true">Выбор места съемки</x-common.button>
                                <x-common.button :tag="true">Съемка</x-common.button>
                                <x-common.button :tag="true">Свет</x-common.button>
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


