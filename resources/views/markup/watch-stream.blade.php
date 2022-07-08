@extends('markup.master')

@section('content')
    <x-common.container>
        <div class='stream__container'>
            <x-common.contentBlock :row="true">
                <x-slot name="header">
                    <h3>личный кабинет</h3>
                </x-slot>
                <x-slot name="subheader">
                    <h3>Название</h3>
                </x-slot>
            </x-common.contentBlock>
            <x-layout.stream.watchStreamBlock :image="'../img/stream.jpg'" :imageAlt="'video'"
            :header="'Название'" :description="'Описание Описание Описание Описание Описание Описание  Описание Описание
             Описание Описание Описание Описание Описание Описание Описание Описание Описание Описание Описание Описание
             Описание Описание Описание Описание'">
            </x-layout.stream.watchStreamBlock>
        </div>
    </x-common.container>
@endsection


