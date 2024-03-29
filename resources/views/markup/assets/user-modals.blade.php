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

<x-common.modal :loginModal="true" id="" :wide="false" :title="'Log in'">
    <form class='contactsForm__form' action=''>
        <h3>Связаться с нами</h3>
        <div class='contactsForm__formInfo'>
            <div class='contactsForm__formInfoRow'>
                <x-icons.location></x-icons.location>
                <span>121059 г.Москва, ул.Б.Дорогомиловская 4 - 59</span>
            </div>
            <div class='contactsForm__formInfoRow'>
                <x-icons.email></x-icons.email>
                <x-common.link href='mailto:info@playme.live'>
                    info@playme.live
                </x-common.link>
            </div>
            <div class='contactsForm__formInfoRow'>
                <x-icons.phone></x-icons.phone>
                <x-common.link href='tel:+7 906 788 48 74'>
                    +7 906 788 48 74
                </x-common.link>
            </div>
        </div>
        <x-common.input :placeholder="'Имя'" type='text'></x-common.input>
        <x-common.input :placeholder="'E-mail'" type='email'></x-common.input>
        <x-common.input :placeholder="'Телефон'" type='tel'></x-common.input>
        <x-common.textarea :placeholder="'Коментарий'"></x-common.textarea>
        <div class='contactsBlock__checkbox'>
            <x-common.checkbox>
                <x-slot name="checkboxText">
                    Я согласен на обработку <x-common.link :inlineText="true" href='#'>персональных данных</x-common.link>
                </x-slot>
            </x-common.checkbox>
        </div>
        <div class='contactsBlock__formAction'>
            <x-common.button type='submit' :withImage="true" :uppercase="true">
                <x-slot name="icon">
                    <x-icons.running></x-icons.running>
                </x-slot>
                отправить
            </x-common.button>
        </div>
    </form>
</x-common.modal>

