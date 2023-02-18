<header class="header{{
        useModifiers('header', [
            'mainPage'=>$mainPage??false,
            ])
        }} {{$attributes['class'] ?? ''}}">
    <x-common.container :flex="true">
        <x-common.link :href="TypiCMS::homeUrl()" :withImage="true">
            <x-slot name="icon">
                <x-icons.running></x-icons.running>
            </x-slot>
            <x-icons.logo></x-icons.logo>
        </x-common.link>
        <nav class='header__navigation'>
            {{ $menu ?? '' }}
        </nav>
        <div class='header__actions'>
            {{ $langSwitcher ?? '' }}
            <div class='header__office' id="user-button-app">
                {{ $userButton ?? '' }}
            </div>
            <x-common.button class='header__hamburger' :withImage="true" :uppercase="true">
                <x-icons.hamburger></x-icons.hamburger>
            </x-common.button>
        </div>
    </x-common.container>
</header>

<x-common.mobileMenu>
    {{ $menu ?? '' }}
    <x-slot name="userButton">
        {{ $userButton ?? '' }}
    </x-slot>
</x-common.mobileMenu>

{{ $modals ?? '' }}
