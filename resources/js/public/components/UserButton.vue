<template>
    <div>
        <a href="javascript:void(0)" class="link link_withImageAfter" @click="showLogin">
            <span class="link__label">
                Личный кабинет
            </span>
            <span class="link__icon">
                <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.7786 6.53083L10.445 11.78C9.96875 12.2486 9.14331 11.9206 9.14331 11.2488V8.24929H4.82564C4.40339 8.24929 4.06369 7.91498 4.06369 7.49942V4.49992C4.06369 4.08436 4.40339 3.75004 4.82564 3.75004H9.14331V0.75054C9.14331 0.0819011 9.96557 -0.249294 10.445 0.219378L15.7786 5.46851C16.0738 5.76221 16.0738 6.23713 15.7786 6.53083ZM6.09554 11.6237V10.3739C6.09554 10.1677 5.9241 9.999 5.71457 9.999H3.04777C2.48584 9.999 2.03185 9.5522 2.03185 8.99917V3.00017C2.03185 2.44713 2.48584 2.00033 3.04777 2.00033H5.71457C5.9241 2.00033 6.09554 1.83161 6.09554 1.62539V0.375602C6.09554 0.169387 5.9241 0.000664533 5.71457 0.000664533H3.04777C1.36515 0.000664533 0 1.34419 0 3.00017V8.99917C0 10.6551 1.36515 11.9987 3.04777 11.9987H5.71457C5.9241 11.9987 6.09554 11.8299 6.09554 11.6237Z" fill="#525252"/>
                </svg>
            </span>
        </a>
        <login-modal ref="loginModal"></login-modal>
        <register-modal ref="registerModal"></register-modal>
        <forgot-password-modal ref="forgotPasswordModal"></forgot-password-modal>
    </div>
</template>

<script>
import LoginModal from "./UserButton/LoginModal";
import RegisterModal from "./UserButton/RegisterModal";
import ForgotPasswordModal from "./UserButton/ForgotPasswordModal";

export default {
    name: "UserButton",
    components: {LoginModal, RegisterModal, ForgotPasswordModal},
    data() {
      return {
          modals: {},
      }
    },
    mounted() {
        this.modals.loginModal = this.$refs.loginModal.modal;
        this.modals.registerModal = this.$refs.registerModal.modal;
        this.modals.forgotPasswordModal = this.$refs.forgotPasswordModal.modal;
    },
    methods: {
        showLogin() {
            this.showModal('loginModal');
        },
        showRegister() {
            this.showModal('registerModal');
        },
        showForgotPassword() {
            this.showModal('forgotPasswordModal');
        },
        showModal(name)
        {
            for(const modal in this.modals) {
                if(modal !== name && this.modals[modal]) {
                    this.modals[modal].hide();
                }
            }
            if(name && this.modals[name]) {
                this.modals[name].show();
            }
        },
        hideAll()
        {
            this.showModal('');
        }
    }
}
</script>
