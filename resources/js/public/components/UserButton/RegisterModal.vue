<template>
    <div class="modal modal_wide modal_loginModal" aria-hidden="true" hidden ref="registrationModal">
        <div class="modal__curtain" @click="hide"></div>
        <div class="modal__wrapper">
            <div class="modal__body" role="document">
                <div class="modal__content">
                    <close-button/>
                    <div class="modal__header">
                        <div class='modal__header_large modal__header_reverse'>
                            <span>Авторизация</span>
                            <span class='dash'></span>
                            <span>Регистрация</span>
                        </div>
                    </div>
                    <form @submit="submit" method="post">
                        <input-field type="text" placeholder="Имя" v-model="name"></input-field>
                        <div class='modal__row'>
                            <input-field type="email" placeholder="E-mail" v-model="email"></input-field>
                            <input-field type="tel" placeholder="Телефон" v-model="phone"></input-field>
                        </div>
                        <input-field type="password" placeholder="Пароль" v-model="password"></input-field>
                        <input-field type="password" placeholder="Введите пароль повторно" v-model="password_confirmation"></input-field>


                        <checkbox-item v-model="accept">
                            <template v-slot:label>
                                Я согласен на обработку <a href="#" class="link link_inlineText">персональных данных</a>
                            </template>
                        </checkbox-item>
                        <div class='modal__link'>
                            <a href="javascript:void(0)" class="link link_inlineText" @click="login">Уже зарегистрирован</a>
                        </div>
                        <div class='modal__action'>
                            <button-default type="submit" caption="Зарегистрироваться"></button-default>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import A11yDialog from "a11y-dialog";
import InputField from "../Form/InputField";
import CheckboxItem from "../Form/CheckboxItem";
import ButtonDefault from "../Form/ButtonDefault";
import CloseButton from "../Modal/CloseButton";

export default {
    name: "RegisterModal",
    components: {InputField, ButtonDefault, CheckboxItem, CloseButton},
    data() {
        return {
            name: null,
            email: null,
            phone: null,
            password: null,
            password_confirmation: null,
            accept: false,
            modal: null,
        }
    },
    mounted() {
        this.modal = new A11yDialog(this.$refs.registrationModal);
    },
    methods: {
        hide() {
            this.$parent.hideAll();
        },
        login() {
            this.$parent.showLogin();
        },
        submit(e) {
            e.preventDefault();
            console.log('Registration from submit')
        }
    },
}
</script>
