@extends('markup.master')

@section('content')
    <x-common.container>
        <div class='clients__container'>
            <x-layout.clients.clientsList></x-layout.clients.clientsList>
            <x-layout.clients.clientsProjects></x-layout.clients.clientsProjects>
            <x-layout.clients.clientsSearch></x-layout.clients.clientsSearch>
        </div>
    </x-common.container>
@endsection


