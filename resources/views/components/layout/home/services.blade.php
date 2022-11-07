<div class='servicesBlock'>
    <x-common.container>
        <x-common.contentBlock>
            <x-slot name="header">
                <h3>Сервисы</h3>
            </x-slot>
        </x-common.contentBlock>
        <div class='servicesBlock__carousel'>
            {{ $slot ?? '' }}
        </div>
    </x-common.container>
</div>
