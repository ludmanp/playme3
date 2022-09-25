@extends('pages::public.master')

@section('bodyClass', 'body-services body-services-index body-page body-page-'.$page->id)

@section('page')

    <x-common.container>
        <div class='services__container'>
            <div class="services__tabs">
                <x-common.contentBlock>
                    <x-slot name="header">
                        <h3>@lang('Our Services')</h3>
                    </x-slot>
                    <x-slot name="content">
                        @include('services::public._nav')
                    </x-slot>
                </x-common.contentBlock>

                <x-common.contentContainer>
                    <div class='tabBlock__tabPanels'>
                        <div class='tabBlock__header'>
                            <span class='tabBlock__header__icon'>
                                <x-icons.runningsmallgreen></x-icons.runningsmallgreen>
                            </span>
                            <h3>@lang('No services found')</h3>
                        </div>

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
