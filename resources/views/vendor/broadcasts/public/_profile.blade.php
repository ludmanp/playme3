<div class='cabinet__orderBlock'>
    <x-common.contentBlock :row="true">
        <x-slot name="header">
            <h3>@lang('My broadcasts')</h3>
        </x-slot>
    </x-common.contentBlock>
    <div class='cabinet__orderActions'>
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
</div>
