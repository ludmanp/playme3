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
                <x-common.link data-a11y-dialog-show="loginModal" :withImageAfter="true" :href="'#'">
                    Личный кабинет
                    <x-slot name="iconAfter">
                        <x-icons.login></x-icons.login>
                    </x-slot>
                </x-common.link>
            </div>
        </div>
    </x-common.container>
</header>

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
