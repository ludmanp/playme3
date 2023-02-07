<div class='cabinet__orderBlock'>
    <x-common.contentBlock :row="true">
        <x-slot name="header">
            <h3>@lang('My shootings')</h3>
        </x-slot>
    </x-common.contentBlock>
    <div class='cabinet__orderActions'>
        <x-common.link :withImage="true" :uppercase="true" :href="route(config('app.locale') . '::create-shooting')">
            <x-slot name="icon">
                <x-icons.running></x-icons.running>
            </x-slot>
            @lang('Order video')
        </x-common.link>
    </div>
    <div class='cabinet__orders'>
        @php
            /** @var \TypiCMS\Modules\Shootings\Models\Shooting $shooting */
        @endphp
        @foreach($user->shootings as $shooting)
            <x-layout.cabinet.cabinetOrder
                :date="optional($shooting->first_date)->title"
                :location="$shooting->first_address->address"
                :status="$shooting->status"
            >
                <x-slot name="header">
                    {{ $shooting->title }}
                </x-slot>

                <x-slot name="actions">
                    <x-common.link type='submit' :withImage="true" :uppercase="true" href="{{ route(config('app.locale') . '::edit-shooting', $shooting->slug) }}">
                        <x-slot name="icon">
                            <x-icons.running></x-icons.running>
                        </x-slot>
                        @lang('Edit')
                    </x-common.link>
                </x-slot>
            </x-layout.cabinet.cabinetOrder>
        @endforeach
    </div>
</div>
