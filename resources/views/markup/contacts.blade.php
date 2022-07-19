@extends('markup.master')

@section('content')
        <div class='contacts__container'>
            <div class='contacts__mapBlock'>
                <x-layout.contacts.contactsForm></x-layout.contacts.contactsForm>
                <div class='contacts__map'></div>
            </div>
        </div>
@endsection


