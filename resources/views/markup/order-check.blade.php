@extends('markup.master')

@section('content')
    <x-common.container>
        <div class='stream__container'>
            <x-common.contentBlock :row="true">
                <x-slot name="header">
                    <h3>личный кабинет</h3>
                </x-slot>
                <x-slot name="subheader">
                    <h3>название №ххххх</h3>
                </x-slot>
            </x-common.contentBlock>
            <x-layout.stream.orderForm>
                <div action='' class='orderForm__form'>
                    <h2 class='orderForm__formHeader'>ЗАКАЗАТЬ ТРАНСЛЯЦИЮ</h2>
                    <div class='orderForm__row'>
                        <p class='orderForm__formSubheader'>Общее описание трансляции</p>
                        <x-common.textarea :placeholder="'Общее описание трансляции'"></x-common.textarea>
                        <p class='orderForm__formSubheader'>Место трансляции</p>
                        <x-common.input :location="true" :placeholder="'Адрес'"></x-common.input>
                        <x-common.button :withImage="true" :green="true">
                            <x-slot name="icon">
                                <x-icons.plus></x-icons.plus>
                            </x-slot>
                            Добавить адрес
                        </x-common.button>
                        <div class='orderForm__row_timetable'>
                            <div class='orderForm__col'>
                                <p class='orderForm__formSubheader'>Дата трансляции</p>
                                <x-common.input :date="true" :placeholder="'01.01.2021'" type="date"></x-common.input>
                            </div>
                            <div class='orderForm__col'>
                                <p class='orderForm__formSubheader'>Начало съемки</p>
                                <x-common.input :time="true" :placeholder="'01.01.2021'" type="time"></x-common.input>
                            </div>
                            <div class='orderForm__col'>
                                <p class='orderForm__formSubheader'>Заезд на место</p>
                                <x-common.input :time="true" :placeholder="'01.01.2021'" type="time"></x-common.input>
                            </div>
                        </div>
                        <x-common.button :withImage="true" :green="true">
                            <x-slot name="icon">
                                <x-icons.plus></x-icons.plus>
                            </x-slot>
                            Добавить дату и время
                        </x-common.button>
                        <p class='orderForm__formSubheader'>Контактное лицо</p>
                        <div class='orderForm__row_contacts'>
                            <div class='orderForm__row_contacts__col'>
                                <x-common.input :placeholder="'ФИО'"></x-common.input>
                            </div>
                            <div class='orderForm__row_contacts__col'>
                                <x-common.input :placeholder="'Телефон'" type="tel"></x-common.input>
                                <x-common.input :placeholder="'E-mail'" type='email'></x-common.input>
                            </div>
                        </div>
                    </div>
                    <div class='orderForm__row'>
                        <p class='orderForm__formSubheader'>ТРАНСЛЯЦИЯ</p>
                        <div class='orderForm__recommendation'>
                            <p class='orderForm__recommendation__header'>
                                Для того чтобы ваша трансляция прошла успешно, мы рекомендуем:
                            </p>
                            <div class='orderForm__recommendationsList'>
                                <p><span class='green'>1 камера</span> – небольшое мероприятие, вебинар</p>
                                <p><span class='green'>2 камеры</span> – конференция</p>
                                <p><span class='green'>3 камеры и более</span> – масштабное мероприятие</p>
                            </div>
                        </div>
                    </div>
                    <div class='orderForm__row'>
                        <p class='orderForm__formSubheader'>камера</p>
                        <x-common.selectField :options="10">Количество видеокамер для съемки</x-common.selectField>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Доспупно всем зрителям
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Доступ по паролю
                            </x-slot>
                        </x-common.checkbox>
                    </div>
                    <div class='orderForm__row'>
                        <p class='orderForm__formSubheader'>ЛОГИСТИКА</p>
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
                        <p class='orderForm__formSubheader'>ОФОРМЛЕНИЕ ТРАНСЛЯЦИИ</p>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Услуги стилиста, визажиста, гримера
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Графическое оформление трансляции
                            </x-slot>
                        </x-common.checkbox>
                    </div>
                    <div class='orderForm__row'>
                        <p class='orderForm__formSubheader'>ПОДГОТОВКА ИТОГОВОГО ВИДЕО КЛИПА</p>
                        <x-common.selectField :options="10">Количество видеокамер для съемки</x-common.selectField>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Работа со светом
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Работа со звуком
                            </x-slot>
                        </x-common.checkbox>
                    </div>
                    <div class='orderForm__row'>
                        <p class='orderForm__formSubheader'>ОФОРМЛЕНИЕ ТРАНСЛЯЦИИ</p>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Видеоролик для социальных сетей (stories; reels; tiktok; пост в Instagram, FB, VK, Youtube)
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Отчетный видеоролик мероприятия не более 4х минут
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Корпоративный видеоролик не более 5и минут
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
                </div>
            </x-layout.stream.orderForm>
        </div>
    </x-common.container>
@endsection


