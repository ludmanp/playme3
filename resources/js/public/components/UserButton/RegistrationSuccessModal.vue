<template>
    <div class="modal modal_wide modal_loginModal" aria-hidden="true" hidden ref="registrationSuccessModal">
        <div class="modal__curtain" @click="hide"></div>
        <div class="modal__wrapper">
            <div class="modal__body" role="document">
                <div class="modal__content">
                    <div class="modal__header">
                        <div class='modal__header_large'>
                            <span>Благодарим<br/>
                                Вас за регистрацию!</span>
                        </div>
                    </div>
                    <div class="modal__text">
                        <p>{{ message }}</p>
                    </div>
                    <div class='modal__action'>
                        <button-default type="button" caption="Хорошо" @click="hide"></button-default>
                    </div>
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
    name: "RegistrationSuccessModal",
    components: {ButtonDefault},
    data() {
        return {
            message: null,
            modal: null,
        }
    },
    mounted() {
        this.modal = new A11yDialog(this.$refs.registrationSuccessModal);
    },
    methods: {
        hide() {
            this.$parent.hideAll();
        },
    },
}
</script>
