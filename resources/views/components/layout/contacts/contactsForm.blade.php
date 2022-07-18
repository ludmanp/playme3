<div class='contactsForm__block'>
    <div class='contactsForm__formBlock'>
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
    </div>
</div>
