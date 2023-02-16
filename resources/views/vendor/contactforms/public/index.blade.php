@extends('pages::public.master')

@section('page')

    <div class='contacts__container'>
        <div class='contacts__mapBlock'>
            <x-layout.contacts.contactsForm>
                @include('contactforms::public._form', ['title' => __('Contact us'), 'full' => true])
            </x-layout.contacts.contactsForm>
            <div class='contacts__map'></div>
        </div>
    </div>

@endsection
