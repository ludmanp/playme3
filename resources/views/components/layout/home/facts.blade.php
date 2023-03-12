<div class='factsBlock'>
    <x-common.container>
        <x-common.contentBlock :thin="true">
            <x-slot name="header">
                <h3>{{ $title }}</h3>
            </x-slot>
            <x-slot name="content">
                {{ $text }}
            </x-slot>
{{--            <x-slot name="actions">--}}
{{--                <x-common.link :withImage="true" :uppercase="true" href="{{ $href ?? '' }}">--}}
{{--                    <x-slot name="icon">--}}
{{--                        <x-icons.running></x-icons.running>--}}
{{--                    </x-slot>--}}
{{--                    @lang('Connect')--}}
{{--                </x-common.link>--}}
{{--            </x-slot>--}}
        </x-common.contentBlock>
        <div class='factsBlock__carousel'>
            {{ $facts }}
        </div>
    </x-common.container>
</div>
