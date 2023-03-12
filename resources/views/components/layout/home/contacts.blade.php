<div class='contactsBlock'>
    <x-common.container>
        <div class='contactsBlock__content'>
            <div class='contactsBlock__formBlock'>
                <x-common.contentBlock>
                    <x-slot name="header">
                        <h3>Контакты</h3>
                    </x-slot>
                </x-common.contentBlock>
                {{ $slot }}
            </div>
        </div>
    </x-common.container>
    <div class='contactsBlock__image'>
        <img src='{{ asset('../img/home/contacts-texture.png') }}' alt=''>
    </div>
</div>
