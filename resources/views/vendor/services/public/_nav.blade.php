<div class="tabBlock__tablist">
    <x-common.tabNav>
        @php
        /** @var \TypiCMS\Modules\Services\Models\Service $service */
        @endphp
        @foreach($services as $service)
            <x-common.link href='{{ url($service->uri()) }}' :class="optional($model ?? null)->id == $service->id ? 'active' : ''" :tab="true">
                <x-slot name="icon">
                    <x-icons.runningsmall></x-icons.runningsmall>
                </x-slot>
                <span class="focus">{{ $service->title }}</span>
            </x-common.link>
        @endforeach
    </x-common.tabNav>
</div>