<header class="header{{
        useModifiers('header', [
            'mainPage'=>$mainPage??false,
            ])
        }} {{$attributes['class'] ?? ''}}">
    <x-common.container :flex="true">
        <x-common.link :href="url('/' . config('app.locale'))" :withImage="true">
            <x-slot name="icon">
                <x-icons.running></x-icons.running>
            </x-slot>
            <x-icons.logo></x-icons.logo>
        </x-common.link>
        <nav class='header__navigation'>
            {{ $menu }}
        </nav>
        <div class='header__actions'>
            {{ $langSwitcher }}
            <div class='header__office'>
                <x-common.link data-a11y-dialog-show="loginModal" :withImageAfter="true" :href="'#'">
                    Личный кабинет
                    <x-slot name="iconAfter">
                        <x-icons.login></x-icons.login>
                    </x-slot>
                </x-common.link>
            </div>
            <x-common.button class='header__hamburger' :withImage="true" :uppercase="true">
                <x-icons.hamburger></x-icons.hamburger>
            </x-common.button>
        </div>
    </x-common.container>
</header>

<x-common.mobileMenu>
    {{ $menu }}
</x-common.mobileMenu>

<x-common.modal :loginModal="true" id="loginModal" :wide="false" :title="'Log in'">
    <x-slot name="header">
        <div class='modal__header_large'>
            <span>Авторизация</span>
            <span class='dash'></span>
            <span>Регистрация</span>
        </div>
    </x-slot>
    <form action=''>
        <x-common.input :placeholder="'E-mail'" type='email'></x-common.input>
        <x-common.input :placeholder="'Пароль'" type='password'></x-common.input>
        <div class='modal__link'>
            <x-common.link :inlineText="true" data-a11y-dialog-show="registerModal" href='#'>Забыли пароль?</x-common.link>
        </div>
        <x-common.checkbox>
            <x-slot name="checkboxText">
                Запомнить меня
            </x-slot>
        </x-common.checkbox>
        <div class='modal__action'>
            <x-common.button type='submit' :withImage="true" :uppercase="true">
                <x-slot name="icon">
                    <x-icons.running></x-icons.running>
                </x-slot>
                Войти
            </x-common.button>
        </div>
    </form>
</x-common.modal>

<x-common.modal :loginModal="true" id="registerModal" :wide="false" :title="'Log in'">
    <x-slot name="header">
        <div class='modal__header_large modal__header_reverse'>
            <span>Авторизация</span>
            <span class='dash'></span>
            <span>Регистрация</span>
        </div>
    </x-slot>
    <form action=''>
        <x-common.input :placeholder="'Имя'" type='text'></x-common.input>
        <div class='modal__row'>
            <x-common.input :placeholder="'E-mail'" type='email'></x-common.input>
            <x-common.input :placeholder="'Телефон'" type='tel'></x-common.input>
        </div>
        <x-common.input :placeholder="'Пароль'" type='password'></x-common.input>
        <x-common.input :placeholder="'Введите пароль повторно'" type='password'></x-common.input>
        <div class='modal__link'>
            <x-common.link :inlineText="true" data-a11y-dialog-show="registerModal" href='#'>Забыли пароль?</x-common.link>
        </div>
        <x-common.checkbox>
            <x-slot name="checkboxText">
                Я согласен на обработку <x-common.link :inlineText="true" href='#'>персональных данных</x-common.link>
            </x-slot>
        </x-common.checkbox>
        <div class='modal__action'>
            <x-common.button type='submit' :withImage="true" :uppercase="true">
                <x-slot name="icon">
                    <x-icons.running></x-icons.running>
                </x-slot>
                отправить
            </x-common.button>
        </div>
    </form>
</x-common.modal>
