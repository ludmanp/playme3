<header class="header{{
        useModifiers('header', [
            'mainPage'=>$mainPage??false,
            ])
        }} {{$attributes['class'] ?? ''}}">
    <x-common.container :flex="true">
        <x-common.link :withImage="true">
            <x-slot name="icon">
                <x-icons.running></x-icons.running>
            </x-slot>
            <x-icons.logo></x-icons.logo>
        </x-common.link>
        <nav class='header__navigation'>
            <x-common.link :href="'#'">Услуги</x-common.link>
            <x-common.link :href="'#'">Клиенты</x-common.link>
            <x-common.link :href="'#'">Команда</x-common.link>
            <x-common.link :href="'#'">Блог</x-common.link>
            <x-common.link :href="'#'">Контакты</x-common.link>
        </nav>
        <div class='header__actions'>
            <div class='header__languages'>
                <x-common.link :currentLang="true" :href="'#'">RU</x-common.link>
                <x-common.link :href="'#'">EN</x-common.link>
            </div>
            <div class='header__office'>
                <x-common.link :withImageAfter="true" :href="'#'">
                    Личный кабинет
                    <x-slot name="iconAfter">
                        <x-icons.login></x-icons.login>
                    </x-slot>
                </x-common.link>
            </div>
        </div>
    </x-common.container>
</header>
