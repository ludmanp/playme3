@extends('pages::public.master')

@section('page')

    <x-common.container>
        <div class='text__container'>
            <x-common.contentBlock :row="true">
                <x-slot name="header">
                    <h3>{{ $page->present()->title  }}</h3>
                </x-slot>
            </x-common.contentBlock>
            {!! $page->present()->body !!}

        </div>
    </x-common.container>
@endsection
