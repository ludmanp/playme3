<div class='contactsBlock'>
    <div class='contactsBlock__content'>
        <div class='contactsBlock__formBlock'>
            <x-common.contentBlock>
                <x-slot name="header">
                    <h3>блог</h3>
                </x-slot>
            </x-common.contentBlock>
            <form class='contactsBlock__form' action=''>
                <h3 class='contactsBlock__formHeader'>Не нашли, что искали?</h3>
                <p class='contactsBlock__formDescription'>Напишите нам и мы перезвоним
                    Вам в ближайшее время</p>
                <x-common.input :placeholder="'Имя'" type='text'></x-common.input>
                <x-common.input :placeholder="'E-mail'" type='email'></x-common.input>
                <x-common.input :placeholder="'Телефон'" type='tel'></x-common.input>
                <x-common.textarea :placeholder="'Телефон'"></x-common.textarea>
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
        <div class='contactsBlock__image'>
            <img src='{{ asset('../img/home/contacts-texture.png') }}' alt=''>
        </div>
    </div>
</div>
