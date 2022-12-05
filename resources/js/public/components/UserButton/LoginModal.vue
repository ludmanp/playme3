<template>
    <div class="modal modal_wide modal_loginModal" aria-hidden="true" hidden ref="loginModal">
        <div class="modal__curtain" @click="hide"></div>
        <div class="modal__wrapper">
            <div class="modal__body" role="document">
                <div class="modal__content">
                    <close-button/>
                    <div class="modal__header">
                        <div class='modal__header_large'>
                            <span>Авторизация</span>
                            <span class='dash'></span>
                            <span>Регистрация</span>
                        </div>
                    </div>
                    <form @submit="submit" method="post">
                        <input-field type="email" placeholder="E-mail" v-model="email"></input-field>
                        <input-field type="password" placeholder="Пароль" v-model="password"></input-field>
                        <div class='modal__link'>
                            <a href="javascript:void(0)" class="link link_inlineText" @click="forgotPassword">Забыли пароль?</a>
                        </div>
                        <checkbox-item v-model="rememberMe">
                            <template v-slot:label>
                                Запомнить меня
                            </template>
                        </checkbox-item>
                        <div class='modal__link' v-if="$parent.allowRegister">
                            <a href="javascript:void(0)" class="link link_inlineText" @click="register">Зарегистрироваться</a>
                        </div>
                        <div class='modal__action'>
                            <button-default type="submit" caption="Войти"></button-default>
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
    name: "LoginModal",
    components: {InputField, ButtonDefault, CheckboxItem, CloseButton},
    data() {
        return {
            email: null,
            password: null,
            rememberMe: false,
            modal: null,
        }
    },
    mounted() {
        this.modal = new A11yDialog(this.$refs.loginModal);
    },
    methods: {
        hide() {
            this.$parent.hideAll();
        },
        forgotPassword() {
            this.$parent.showForgotPassword();
        },
        register() {
            this.$parent.showRegister();
        },
        submit(e) {
            e.preventDefault();

            axios
                .post('/' + window.TypiCMS.locale + '/login', {
                    'email': this.email,
                    'password': this.password,
                    'remember': this.rememberMe,
                })
                .then((response) => {
                    this.$parent.userData = true;
                    this.hide();
                    window.EventBus.$emit('user.login', response.data);
                })
                .catch((error) => {
                    console.log('Cannot login: ', error);

                    // this.showMessage = 'error';
                    // if(error.response.data) {
                    //     this.alertMessage = '<ul>'
                    //     for(var key in error.response.data) {
                    //         this.alertMessage += '<li>' + error.response.data[key] + '</li>';
                    //     }
                    //     this.alertMessage += '</ul>';
                    //
                    // }else if(error.response.data.message) {
                    //     this.alertMessage = error.response.data.message;
                    // } else {
                    //     this.alertMessage = 'Unknown error';
                    // }

                });
        }
    },
}
</script>
