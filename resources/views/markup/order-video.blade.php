@extends('markup.master')

@section('content')
    <x-common.container>
        <div class='stream__container'>
            <x-common.contentBlock :row="true">
                <x-slot name="header">
                    <h3>личный кабинет</h3>
                </x-slot>
                <x-slot name="subheader">
                    <h3>заказать съемку</h3>
                </x-slot>
            </x-common.contentBlock>
            <x-layout.stream.orderForm>
                <form action='' class='orderForm__form'>
                    <h2 class='orderForm__formHeader'>ЗАКАЗАТЬ СЪЕМКУ</h2>
                    <div class='orderForm__row'>
                        <p class='orderForm__formSubheader'>Общее описание трансляции</p>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Сторис вайны
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Интервью
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Промо ролик
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Съемка производства
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Съемка мероприятия
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Документальный фильм
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Концерт
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Музыкальный клип
                            </x-slot>
                        </x-common.checkbox>
                        <p class='orderForm__formSubheader'>Общее описание</p>
                        <x-common.textarea :placeholder="'Общее описание'"></x-common.textarea>
                        <p class='orderForm__formSubheader'>Место съемки</p>
                        <x-common.input :location="true" :placeholder="'Адрес'"></x-common.input>
                        <x-common.button :withImage="true" :green="true">
                            <x-slot name="icon">
                                <x-icons.plus></x-icons.plus>
                            </x-slot>
                            Добавить адрес
                        </x-common.button>
                        <p class='orderForm__formSubheader'>Дата съемки</p>
                        <x-common.input :date="true" :placeholder="'01.01.2022'"></x-common.input>
                        <x-common.button :withImage="true" :green="true">
                            <x-slot name="icon">
                                <x-icons.plus></x-icons.plus>
                            </x-slot>
                            Добавить адрес
                        </x-common.button>
                        <div class='orderForm__action'>
                            <x-common.button type='button' :withImage="true" :uppercase="true">
                                <x-slot name="icon">
                                    <x-icons.running></x-icons.running>
                                </x-slot>
                                Придумайте все сами
                            </x-common.button>
                        </div>
                    </div>
                    <div class='orderForm__row'>
                        <p class='orderForm__formSubheader'>ПОДГОТОВКА К СЪЕМКЕ</p>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Подготовка, творческие идеи съемки
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Детальный сценарий ролика до 3х минут - хронометраж, описание, текст
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Раскадровка
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Детальный сценарий готов
                            </x-slot>
                        </x-common.checkbox>
                    </div>
                    <div class='orderForm__row'>
                        <p class='orderForm__formSubheader'>СЪЕМКА</p>
                        <x-common.selectField :options="10">Количество видео камер для съемки</x-common.selectField>
                        <x-common.selectField :options="10">Количество камер для фотосъемки</x-common.selectField>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Работа режиссера на съемочной площадке
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Работа со светом время съемки
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Работа со звуком во время съемки
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Услуги стилиста, визажиста, гримера
                            </x-slot>
                        </x-common.checkbox>
                    </div>
                    <div class='orderForm__row'>
                        <p class='orderForm__formSubheader'>СЪЕМКА</p>
                        <x-common.selectField :options="10">Количество видео камер для съемки</x-common.selectField>
                        <x-common.selectField :options="10">Количество камер для фотосъемки</x-common.selectField>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Работа режиссера на съемочной площадке
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Работа со светом время съемки
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Работа со звуком во время съемки
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Услуги стилиста, визажиста, гримера
                            </x-slot>
                        </x-common.checkbox>
                    </div>
                    <div class='orderForm__row'>
                        <p class='orderForm__formSubheader'>СЪЕМКА</p>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Доставка оборудования на съемку /со съемки на склад
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Трансляция на платформе PLAYME
                            </x-slot>
                        </x-common.checkbox>
                    </div>
                    <div class='orderForm__row'>
                        <p class='orderForm__formSubheader'>POST PRODUCTION</p>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Видеоролик для социальных сетей (stories)
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Отчетный видеоролик мероприятия не более 4х минут
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Корпоративый видеоролик не более 5и минут
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Промо видео не более 2х минут
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Конференция / лекция до 2х камер
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Конференция / лекция до 4х камер
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Шаблонные элементы графики (заставка in\out, отбивка, титры, переход)
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Авторские элементы графики (заставка in\out, отбивка, титры, переход)
                            </x-slot>
                        </x-common.checkbox>
                    </div>
                    <div class='orderForm__row'>
                        <p class='orderForm__formSubheader'>Руководитель проекта – контактная персона проекта:</p>
                        <div class='orderForm__row_contacts'>
                            <div class='orderForm__row_contacts__col'>
                                <x-common.input :placeholder="'ФИО'"></x-common.input>
                            </div>
                            <div class='orderForm__row_contacts__col'>
                                <x-common.input :placeholder="'Телефон'" type="tel"></x-common.input>
                                <x-common.input :placeholder="'E-mail'" type='email'></x-common.input>
                            </div>
                        </div>
                        <p class='orderForm__formSubheader'>Организация Заказчик (выставления счетов):</p>
                        <div class='orderForm__row_contacts'>
                            <div class='orderForm__row_contacts__col'>
                                <x-common.input :placeholder="'Название организации'"></x-common.input>
                            </div>
                            <div class='orderForm__row_contacts__col'>
                                <x-common.input :placeholder="'ИНН / ОГРН'" type="tel"></x-common.input>
                            </div>
                        </div>
                        <div class='orderForm__row_contacts'>
                            <div class='orderForm__row_contacts__col'>
                                <x-common.input :location="true" :placeholder="'Юридический Адрес'"></x-common.input>
                            </div>
                            <div class='orderForm__row_contacts__col'>
                                <x-common.input :placeholder="'Телефон'" type="tel"></x-common.input>
                                <x-common.input :placeholder="'E-mail'" type='email'></x-common.input>
                            </div>
                        </div>
                    </div>
                    <x-common.button type='submit' :withImage="true" :uppercase="true">
                        <x-slot name="icon">
                            <x-icons.running></x-icons.running>
                        </x-slot>
                        заказать съемку
                    </x-common.button>
                </form>
            </x-layout.stream.orderForm>
        </div>
    </x-common.container>
@endsection


