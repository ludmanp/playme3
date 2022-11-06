<template>
    <div class="modal modal_wide modal_loginModal" aria-hidden="true" hidden ref="forgotPasswordModal">
        <div class="modal__curtain" @click="hide"></div>
        <div class="modal__wrapper">
            <div class="modal__body" role="document">
                <div class="modal__content">
                    <close-button/>
                    <div class="modal__header">
                        <div class='modal__header_large'>
                            <span>Восстановление пароля</span>
                        </div>
                    </div>
                    <div class="modal__text">
                        <p>Введите адрес электронной почты, указанный при регистрации,
                            и мы на него вышлем пароль</p>
                    </div>
                    <form @submit="submit" method="post">
                        <input-field type="email" placeholder="E-mail" v-model="email"></input-field>
                        <div class='modal__link'>
                            <a href="javascript:void(0)" class="link link_inlineText" @click="login">Я знаю пароль</a>
                        </div>
                        <div class='modal__action'>
                            <button-default type="submit" caption="Отправить"></button-default>
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
    name: "ForgotPassword",
    components: {InputField, ButtonDefault, CloseButton},
    data() {
        return {
            email: null,
            modal: null,
        }
    },
    mounted() {
        this.modal = new A11yDialog(this.$refs.forgotPasswordModal);
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
            console.log('Forgot from submit')
        }
    },
}
</script>
