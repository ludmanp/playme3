@extends('markup.master')

@section('content')
    <x-common.container>
        <div class='client__container'>
            <x-common.contentBlock :row="true">
                <x-slot name="header">
                    <h3>клиенты</h3>
                </x-slot>
                <x-slot name="subheader">
                    <h3>проекты по хештегу</h3>
                    <span class="contentBlock__headerTag">#Видеосъёмкамерроприятий</span>
                </x-slot>
            </x-common.contentBlock>
            <div class='clientsProjects__tags'>
                <x-common.button :tag="true" :tagActive="true">#ВидеосъёмкаМерроприятий</x-common.button>
                <x-common.button :tag="true">#ВсеПроекты</x-common.button>
                <x-common.button :tag="true">#РекламныеРолики</x-common.button>
                <x-common.button :tag="true">#ДокументальноеКино</x-common.button>
                <x-common.button :tag="true">#ОрганизацияКонцертов</x-common.button>
                <x-common.button :tag="true">#ПромоРолики</x-common.button>
                <x-common.button :tag="true">#Кино</x-common.button>
                <x-common.button :tag="true">#Блоги</x-common.button>
            </div>
            <div class='client__infoBlock'>
                <x-layout.clients.clientGallery></x-layout.clients.clientGallery>
                <div class='client__info'>
                    <x-layout.clients.projectCard :transparent="true" :date="'01.01.2021'"
                                                  :logo="'../img/clients/rusbase-small.svg'" :logoAlt="'rubase'" :projectName="'Rusbase Young Awards 2020'">
                        <x-slot name="tags">
                            <x-common.link :tag="true">
                                #ВидеосъёмкаМерроприятий
                            </x-common.link>
                            <x-common.link :tag="true">
                                #ВсеПроекты
                            </x-common.link>
                            <x-common.link :tag="true">
                                #Видео
                            </x-common.link>
                        </x-slot>
                        <x-slot name="location">
                            <p>Локация<br> на две строчки</p>
                        </x-slot>
                        <x-slot name="description">
                            <p>
                                18 сентября в «Цифровом деловом пространстве» в Москве прошёл финал премии и конференция
                                Rusbase Young Awards 2020. Видеосъемка и монтаж отчетного видео под ключ
                            </p>
                            <p>Наша команда занималась видеосъёмкой премии и самой конференции, установкой</p>
                        </x-slot>
                        <x-slot name="action">
                            <x-common.link :withImage="true" :uppercase="true">
                                <x-slot name="icon">
                                    <x-icons.running></x-icons.running>
                                </x-slot>
                                Смотреть видео проекта
                            </x-common.link>
                        </x-slot>
                    </x-layout.clients.projectCard>
                </div>
            </div>
            <x-layout.clients.participants>
                <x-slot name="header">
                    <x-common.contentBlock>
                        <x-slot name="header">
                            <h3>участники проекта</h3>
                        </x-slot>
                    </x-common.contentBlock>
                </x-slot>
                <x-slot name="participant">
                    <x-layout.clients.participant :imageAlt="'participant'"
                                                  :image="'../img/clients/participant-1.jpg'"
                                                  :name="'Алексей Блок'" :position="'Видеомонтажёр'">

                    </x-layout.clients.participant>
                    <x-layout.clients.participant :imageAlt="'participant'"
                                                  :image="'../img/clients/participant-2.jpg'"
                                                  :name="'Ляйсан Мамедова'" :position="'Гримёр'">

                    </x-layout.clients.participant>
                    <x-layout.clients.participant :imageAlt="'participant'"
                                                  :image="'../img/clients/participant-1.jpg'"
                                                  :name="'Алексей Блок'" :position="'Видеомонтажёр'">

                    </x-layout.clients.participant>
                    <x-layout.clients.participant :imageAlt="'participant'"
                                                  :image="'../img/clients/participant-1.jpg'"
                                                  :name="'Алексей Блок'" :position="'Видеомонтажёр'">

                    </x-layout.clients.participant>
                    <x-layout.clients.participant :imageAlt="'participant'"
                                                  :image="'../img/clients/participant-1.jpg'"
                                                  :name="'Алексей Блок'" :position="'Видеомонтажёр'">

                    </x-layout.clients.participant>
                    <x-layout.clients.participant :imageAlt="'participant'"
                                                  :image="'../img/clients/participant-1.jpg'"
                                                  :name="'Алексей Блок'" :position="'Видеомонтажёр'">

                    </x-layout.clients.participant>
                    <x-layout.clients.participant :imageAlt="'participant'"
                                                  :image="'../img/clients/participant-1.jpg'"
                                                  :name="'Алексей Блок'" :position="'Видеомонтажёр'">

                    </x-layout.clients.participant>
                </x-slot>
            </x-layout.clients.participants>
            <x-layout.clients.clientsAdditional>
                <x-slot name="title">
                    Так же из категории <span class="contentBlock__headerTag">#Видеосъёмкамерроприятий</span>
                </x-slot>

            @for($i = 0; $i < 6; $i++)
                <x-layout.clients.projectCard :image="'../img/clients/project.jpg'" :imageAlt="'project'" :date="'01.01.2021'"
                                              :logo="'../img/clients/rusbase-small.svg'" :logoAlt="'rubase'" :projectName="'Rosbank Tech.Madness'">
                    <x-slot name="tags">
                        <x-common.link :tag="true">
                            #ВидеосъёмкаМерроприятий
                        </x-common.link>
                        <x-common.link :tag="true">
                            #ВсеПроекты
                        </x-common.link>
                        <x-common.link :tag="true">
                            #Видео
                        </x-common.link>
                    </x-slot>
                    <x-slot name="location">
                        <p>Локация<br> на две строчки</p>
                    </x-slot>
                    <x-slot name="description">
                        Rosbank Tech.Madness - отчетный ролик хакатона, который прошел 8 декабря 2019 года. Видеосъемка и монтаж
                    </x-slot>
                    <x-slot name="action">
                        <x-common.link :withImage="true" :uppercase="true">
                            <x-slot name="icon">
                                <x-icons.running></x-icons.running>
                            </x-slot>
                            посмотреть
                        </x-common.link>
                    </x-slot>
                </x-layout.clients.projectCard>
                @endfor
            </x-layout.clients.clientsAdditional>
        </div>
    </x-common.container>
@endsection


