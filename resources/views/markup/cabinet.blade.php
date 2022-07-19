@extends('markup.master')

@section('content')
    <x-common.container>
        <div class='cabinet__container'>
            <x-common.contentBlock :row="true">
                <x-slot name="header">
                    <h3>личный кабинет</h3>
                </x-slot>
            </x-common.contentBlock>
            <form class='cabinet__form__userInfo' action=''>
                <div class='cabinet__formRow'>
                    <div class='cabinet__formColumn'>
                        <x-common.input :column="true" :label="'имя'" :placeholder="'Иван'" :labelBig="true"></x-common.input>
                    </div>
                    <div class='cabinet__formColumn'>
                        <x-common.input :column="true" :label="'E-mail'" :placeholder="'ivan.123@mail.ru'" type='email' :labelBig="true"></x-common.input>
                        <x-common.input :column="true" :label="'телефон'" :placeholder="'+ 7 999 999 99 99'" type='tel' :labelBig="true"></x-common.input>
                    </div>
                </div>
                <div class='cabinet__formAction'>
                    <x-common.button type='submit' :withImage="true" :uppercase="true">
                        <x-slot name="icon">
                            <x-icons.running></x-icons.running>
                        </x-slot>
                        сохранить
                    </x-common.button>
                </div>
            </form>

            <form class='cabinet__form__password' action=''>
                <h4>пароль</h4>
                <div class='cabinet__formRow cabinet__formRow_row'>
                    <div class='cabinet__formColumn'>
                        <x-common.input :column="true" type='password' :label="'введите старый пароль'" :placeholder="'*****************'"></x-common.input>
                    </div>
                    <div class='cabinet__formColumn'>
                        <x-common.button :white="true" :alignEnd="true">Забыл пароль</x-common.button>
                    </div>
                </div>
                <div class='cabinet__formRow'>
                    <div class='cabinet__formColumn'>
                        <x-common.input :column="true" type='password' :label="'введите пароль'" :placeholder="'*****************'"></x-common.input>
                    </div>
                    <div class='cabinet__formColumn'>
                        <x-common.input :column="true" type='password' :label="'введите пароль повторно'" :placeholder="'*****************'"></x-common.input>
                    </div>
                </div>
                <div class='cabinet__formAction'>
                    <x-common.button type='submit' :withImage="true" :uppercase="true">
                        <x-slot name="icon">
                            <x-icons.running></x-icons.running>
                        </x-slot>
                        изменить пароль
                    </x-common.button>
                </div>
            </form>

            <div class='cabinet__streamBlock'>
                <x-common.contentBlock :row="true">
                    <x-slot name="header">
                        <h3>мои трансляции</h3>
                    </x-slot>
                </x-common.contentBlock>
                <div class='cabinet__streams'>
                    <x-layout.cabinet.cabinetStream :date="'01.01.2021'">
                        <x-slot name="header">
                            заголовок<br>
                            две строчки
                        </x-slot>
                        <x-slot name="actions">
                            <x-common.button type='submit' :withImage="true" :uppercase="true">
                                <x-slot name="icon">
                                    <x-icons.running></x-icons.running>
                                </x-slot>
                                редактировать
                            </x-common.button>
                            <x-common.button type='submit' :withImage="true" :uppercase="true">
                                <x-slot name="icon">
                                    <x-icons.running></x-icons.running>
                                </x-slot>
                                смотреть
                            </x-common.button>
                        </x-slot>
                    </x-layout.cabinet.cabinetStream>
                    <x-layout.cabinet.cabinetStream :date="'01.01.2021'">
                        <x-slot name="header">
                            заголовок<br>
                            две строчки
                        </x-slot>
                        <x-slot name="actions">
                            <x-common.button type='submit' :withImage="true" :uppercase="true">
                                <x-slot name="icon">
                                    <x-icons.running></x-icons.running>
                                </x-slot>
                                редактировать
                            </x-common.button>
                            <x-common.button type='submit' :withImage="true" :uppercase="true">
                                <x-slot name="icon">
                                    <x-icons.running></x-icons.running>
                                </x-slot>
                                смотреть
                            </x-common.button>
                        </x-slot>
                    </x-layout.cabinet.cabinetStream>
                    <x-layout.cabinet.cabinetStream :date="'01.01.2021'">
                        <x-slot name="header">
                            заголовок<br>
                            две строчки
                        </x-slot>
                        <x-slot name="actions">
                            <x-common.button type='submit' :withImage="true" :uppercase="true">
                                <x-slot name="icon">
                                    <x-icons.running></x-icons.running>
                                </x-slot>
                                редактировать
                            </x-common.button>
                            <x-common.button type='submit' :withImage="true" :uppercase="true">
                                <x-slot name="icon">
                                    <x-icons.running></x-icons.running>
                                </x-slot>
                                смотреть
                            </x-common.button>
                        </x-slot>
                    </x-layout.cabinet.cabinetStream>
                    <x-layout.cabinet.cabinetStream :date="'01.01.2021'">
                        <x-slot name="header">
                            заголовок<br>
                            две строчки
                        </x-slot>
                        <x-slot name="actions">
                            <x-common.button type='submit' :withImage="true" :uppercase="true">
                                <x-slot name="icon">
                                    <x-icons.running></x-icons.running>
                                </x-slot>
                                редактировать
                            </x-common.button>
                            <x-common.button type='submit' :withImage="true" :uppercase="true">
                                <x-slot name="icon">
                                    <x-icons.running></x-icons.running>
                                </x-slot>
                                смотреть
                            </x-common.button>
                        </x-slot>
                    </x-layout.cabinet.cabinetStream>
                </div>
                <x-common.button :withImage="true" :uppercase="true">
                    <x-slot name="icon">
                        <x-icons.running></x-icons.running>
                    </x-slot>
                    показать еще
                </x-common.button>
            </div>
            <div class='cabinet__orderBlock'>
                <x-common.contentBlock :row="true">
                    <x-slot name="header">
                        <h3>мои заказы</h3>
                    </x-slot>
                </x-common.contentBlock>
                <div class='cabinet__orderActions'>
                    <x-common.button :withImage="true" :uppercase="true">
                        <x-slot name="icon">
                            <x-icons.running></x-icons.running>
                        </x-slot>
                        показать еще
                    </x-common.button>
                    <x-common.button :withImage="true" :uppercase="true">
                        <x-slot name="icon">
                            <x-icons.running></x-icons.running>
                        </x-slot>
                        показать еще
                    </x-common.button>
                </div>
                <div class='cabinet__orders'>
                    <x-layout.cabinet.cabinetOrder :date="'01.01.2021'" :location="'Локация'">
                        <x-slot name="header">
                            заголовок<br>
                            две строчки
                        </x-slot>
                    </x-layout.cabinet.cabinetOrder>
                    <x-layout.cabinet.cabinetOrder :date="'01.01.2021'" :location="'Локация'">
                        <x-slot name="header">
                            заголовок<br>
                            две строчки
                        </x-slot>
                    </x-layout.cabinet.cabinetOrder>
                    <x-layout.cabinet.cabinetOrder :date="'01.01.2021'" :location="'Локация'">
                        <x-slot name="header">
                            заголовок<br>
                            две строчки
                        </x-slot>
                    </x-layout.cabinet.cabinetOrder>
                    <x-layout.cabinet.cabinetOrder :date="'01.01.2021'" :location="'Локация'">
                        <x-slot name="header">
                            заголовок<br>
                            две строчки
                        </x-slot>
                    </x-layout.cabinet.cabinetOrder>
                </div>
                <x-common.button :withImage="true" :uppercase="true">
                    <x-slot name="icon">
                        <x-icons.running></x-icons.running>
                    </x-slot>
                    показать еще
                </x-common.button>
            </div>
        </div>
    </x-common.container>
@endsection


