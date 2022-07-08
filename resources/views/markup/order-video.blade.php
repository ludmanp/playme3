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
                        <p class='orderForm__formSubheader'>Общее описание трансляции</p>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Сторис вайны
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Сторис вайны
                            </x-slot>
                        </x-common.checkbox>
                        <x-common.checkbox :greenText="true">
                            <x-slot name="checkboxText">
                                Сторис вайны
                            </x-slot>
                        </x-common.checkbox>
                    </div>
                </form>
            </x-layout.stream.orderForm>
        </div>
    </x-common.container>
@endsection


