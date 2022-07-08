@extends('markup.master')

@section('content')
    <x-common.container>
        <div class='stream__container'>
            <x-common.contentBlock :row="true">
                <x-slot name="header">
                    <h3>личный кабинет</h3>
                </x-slot>
                <x-slot name="subheader">
                    <h3>заказать транслицию</h3>
                </x-slot>
            </x-common.contentBlock>
            <x-layout.stream.orderForm :order="true"></x-layout.stream.orderForm>
        </div>
    </x-common.container>
@endsection


