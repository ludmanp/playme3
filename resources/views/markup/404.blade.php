@extends('markup.master')

@section('header')@endsection
@section('content')
    <div class='error__container'>
        <x-icons.error></x-icons.error>
        <div>
            <x-icons.404></x-icons.404>
            <div class='error__action'>
                <x-common.link :withImage="true" :uppercase="true">
                    <x-slot name="icon">
                        <x-icons.running></x-icons.running>
                    </x-slot>
                    заказать съемку
                </x-common.link>
            </div>
        </div>
    </div>
@endsection
@section('footer')@endsection






