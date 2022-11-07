@php
    /** @var \TypiCMS\Modules\Services\Models\Service $service */
@endphp
<x-layout.home.services
        title="@lang('Services')">
    @foreach(Services::published()->order()->get() as $service)
        <x-layout.home.serviceCard :link="$service->uri()" :header="$service->title" :subheader="$service->subtitle"
                                   :image="$service->present()->image()" :imageAlt="$service->title">
            <x-slot name="services">
                @foreach($service->details as $detail)
                <p>{{ $detail->title }}</p>
                @endforeach
            </x-slot>

        </x-layout.home.serviceCard>
    @endforeach
</x-layout.home.services>
