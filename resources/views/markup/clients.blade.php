@extends('markup.master')

@section('content')
    <x-common.container>
        <div class='clients__container'>
            <x-layout.clients.clientsList :clients="[['href' => '#', 'image' => '../img/clients/rubase.svg', 'imageAlt' => 'rubase'],
            ['href' => '#', 'image' => '../img/clients/vtb.svg', 'imageAlt' => 'vtb'],
            ['href' => '#', 'image' => '../img/clients/sber.svg', 'imageAlt' => 'sber'],
            ['href' => '#', 'image' => '../img/clients/qiwi.svg', 'imageAlt' => 'qiwi'],
            ['href' => '#', 'image' => '../img/clients/rosbank.svg', 'imageAlt' => 'rosbank'],
            ['href' => '#', 'image' => '../img/clients/audiomania.svg', 'imageAlt' => 'audiomania'],
            ]"></x-layout.clients.clientsList>
            <x-layout.clients.clientsProjects>
                <x-common.button :tag="true" :tagActive="true">#ВидеосъёмкаМерроприятий</x-common.button>
                <x-common.button :tag="true">#ВсеПроекты</x-common.button>
                <x-common.button :tag="true">#РекламныеРолики</x-common.button>
                <x-common.button :tag="true">#ДокументальноеКино</x-common.button>
                <x-common.button :tag="true">#ОрганизацияКонцертов</x-common.button>
                <x-common.button :tag="true">#ПромоРолики</x-common.button>
                <x-common.button :tag="true">#Кино</x-common.button>
                <x-common.button :tag="true">#Блоги</x-common.button>
            </x-layout.clients.clientsProjects>
            <x-layout.clients.clientsSearch>
                <x-slot name="title">
                    <span>проекты по хештегу</span> <span class='contentBlock__headerTag'>#Видеосъёмкамерроприятий</span>
                </x-slot>

                <x-slot name="paginate">
                    <div class='clientsSearch__action'>
                        <x-common.button :withImage="true" :uppercase="true">
                            <x-slot name="icon">
                                <x-icons.running></x-icons.running>
                            </x-slot>
                            Показать еще
                        </x-common.button>
                    </div>
                </x-slot>

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
                <x-layout.clients.projectCard :image="'../img/clients/project.jpg'" :imageAlt="'project'" :date="'01.01.2021'"
                                              :logo="'../img/clients/rusbase-small.svg'" :logoAlt="'rubase'" :projectName="'Rosbank Tech.Madness'">
                    <x-slot name="tags">
                        <x-common.link :tag="true">
                            #ВидеосъёмкаМерроприятий
                        </x-common.link>
                        <x-common.link :tag="true">
                            #ВсеПроекты
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
            </x-layout.clients.clientsSearch>
        </div>
    </x-common.container>
@endsection


