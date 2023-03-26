@extends('pages::public.master')

@section('page')

    <div class='contacts__container'>
        <div class='contacts__mapBlock'>
            <x-layout.contacts.contactsForm :title="data_get($page, 'title', __('Contacts'))">
                <div class="contactsForm__formBlock">
                    @include('contactforms::public._form', ['title' => __('Contact us'), 'full' => true])
                </div>
            </x-layout.contacts.contactsForm>
            <div class='contacts__map'></div>
        </div>
    </div>

@endsection
