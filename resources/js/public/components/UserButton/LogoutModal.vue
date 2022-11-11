<template>
    <div class="modal modal_wide modal_loginModal" aria-hidden="true" hidden ref="logoutModal">
        <div class="modal__curtain" @click="hide"></div>
        <div class="modal__wrapper">
            <div class="modal__body" role="document">
                <div class="modal__content">
                    <div class="modal__header">
                        <div class='modal__header_large'>
                            <span>Выход</span>
                        </div>
                    </div>
                    <div class="modal__text">
                        <p>Вы уверенны, что хотите выйти из личного кабинета?</p>
                    </div>
                    <div class='modal__action'>
                        <button-default type="button" caption="да, я хочу выйти" @click="logout"></button-default>
                        <button-default type="button" caption="нет, я хочу остаться" @click="hide"></button-default>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ButtonDefault from "../Form/ButtonDefault";
import A11yDialog from "a11y-dialog";

export default {
    name: "LogoutModal",
    components: {ButtonDefault},
    data() {
        return {
            modal: null,
        }
    },
    mounted() {
        this.modal = new A11yDialog(this.$refs.logoutModal);
    },
    methods: {
        hide() {
            this.$parent.hideAll();
        },
        logout() {
            axios.
            post(
                '/' + window.TypiCMS.locale + '/logout', [])
                .then((response) => {
                    this.$parent.userData = null;
                    this.$parent.hideAll();
                    window.EventBus.$emit('user.logout');
                })
                .catch((error) => {
                    console.log('Cannot logout: ', error);
                });
        }
    },
}
</script>

