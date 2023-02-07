@extends('core::public.master')

@section('content')
    <x-common.container>
        <div class='cabinet__container'>
            <x-common.contentBlock :row="true">
                <x-slot name="header">
                    <h3>@lang('Profile')</h3>
                </x-slot>
            </x-common.contentBlock>
            <form class='cabinet__form__userInfo' method="post" action='{{ route(config('app.locale') . '::customer-profile-save') }}'>
                @csrf()
                <input type="hidden" value="profile" name="form">
                @if ($errors->any() && old('form') == 'profile')
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class='cabinet__formRow'>
                    <div class='cabinet__formColumn'>
                        <x-common.input :column="true" :label="__('Name')" :value="old('first_name', $user->first_name)" :labelBig="true" labelFor="first_name" name="first_name"></x-common.input>
                    </div>
                    <div class='cabinet__formColumn'>
                        <x-common.input :column="true" :label="__('Email')" :value="old('email', $user->email)" type='email' :labelBig="true" labelFor="email" name="email"></x-common.input>
                        <x-common.input :column="true" :label="__('Phone')" :value="old('phone', $user->phone)" type='tel' :labelBig="true" labelFor="phone" name="phone"></x-common.input>
                    </div>
                </div>
                <div class='cabinet__formAction'>
                    <x-common.button type='submit' :withImage="true" :uppercase="true">
                        <x-slot name="icon">
                            <x-icons.running></x-icons.running>
                        </x-slot>
                        @lang('Save')
                    </x-common.button>
                </div>
            </form>

            <form class='cabinet__form__password' method="post" action='{{ route(config('app.locale') . '::customer-password-change') }}'>
                @csrf()
                <input type="hidden" value="password" name="form">
                <h4>@lang('Password')</h4>
                @if ($errors->any() && old('form') == 'password')
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class='cabinet__formRow cabinet__formRow_row'>
                    <div class='cabinet__formColumn'>
                        <x-common.input :column="true" type='password' :label="'Enter your old password'" labelFor="old_password" name="old_password"></x-common.input>
                    </div>
                    <div class='cabinet__formColumn'>
{{--                        <x-common.button :white="true" :alignEnd="true">@lang('Forgot password')</x-common.button>--}}
                    </div>
                </div>
                <div class='cabinet__formRow'>
                    <div class='cabinet__formColumn'>
                        <x-common.input :column="true" type='password' :label="__('New password')" labelFor="password" name="password"></x-common.input>
                    </div>
                    <div class='cabinet__formColumn'>
                        <x-common.input :column="true" type='password' :label="__('Repeat new password')" labelFor="password_confirmation" name="password_confirmation"></x-common.input>
                    </div>
                </div>
                <div class='cabinet__formAction'>
                    <x-common.button type='submit' :withImage="true" :uppercase="true">
                        <x-slot name="icon">
                            <x-icons.running></x-icons.running>
                        </x-slot>
                        @lang('Change password')
                    </x-common.button>
                </div>
            </form>

            <div class='cabinet__orderBlock'>
                <x-common.contentBlock :row="true">
                    <x-slot name="header">
                        <h3>@lang('My orders')</h3>
                    </x-slot>
                </x-common.contentBlock>
                <div class='cabinet__orderActions'>
                    <x-common.link :withImage="true" :uppercase="true" :href="route(config('app.locale') . '::create-shooting')">
                        <x-slot name="icon">
                            <x-icons.running></x-icons.running>
                        </x-slot>
                        @lang('Order video')
                    </x-common.link>
                    <x-common.link :withImage="true" :uppercase="true" :href="route(config('app.locale') . '::create-broadcast')">
                        <x-slot name="icon">
                            <x-icons.running></x-icons.running>
                        </x-slot>
                        @lang('Order broadcast')
                    </x-common.link>
                </div>
                <div class='cabinet__orders'>
                    @php
                        /** @var \TypiCMS\Modules\Broadcasts\Models\Broadcast $broadcast */
                    @endphp
                    @foreach($user->broadcasts as $broadcast)
                    <x-layout.cabinet.cabinetOrder
                        :date="optional($broadcast->first_date)->date"
                        :location="$broadcast->first_address->address"
                        :link="$broadcast->isSharable ? url($broadcast->uri()) : false"
                        :status="$broadcast->status"
                    >
                        <x-slot name="header">
                            {{ $broadcast->title }}
                        </x-slot>

                        <x-slot name="actions">
                            <x-common.link type='submit' :withImage="true" :uppercase="true" href="{{ route(config('app.locale') . '::edit-broadcast', $broadcast->slug) }}">
                                <x-slot name="icon">
                                    <x-icons.running></x-icons.running>
                                </x-slot>
                                @lang('Edit')
                            </x-common.link>
                            @if($broadcast->isSharable)
                            <x-common.link type='submit' :withImage="true" :uppercase="true" href="{{ url($broadcast->uri()) }}">
                                <x-slot name="icon">
                                    <x-icons.running></x-icons.running>
                                </x-slot>
                                @lang('View')
                            </x-common.link>
                            @endif
                        </x-slot>
                    </x-layout.cabinet.cabinetOrder>
                    @endforeach
                </div>
{{--                <x-common.button :withImage="true" :uppercase="true">--}}
{{--                    <x-slot name="icon">--}}
{{--                        <x-icons.running></x-icons.running>--}}
{{--                    </x-slot>--}}
{{--                    показать еще--}}
{{--                </x-common.button>--}}
            </div>
        </div>
    </x-common.container>
@endsection


