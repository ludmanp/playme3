<template>
    <div class="inputField">
        <input :placeholder='placeholder' :type='type' :value="value" @input="onInput" >
    </div>
</template>

<script>
export default {
    name: "InputField",
    props: {
        type: {
            type: String,
            default: "text",
        },
        placeholder: {
            type: String,
            default: null,
        },
        value: {
            type: String,
        },
    },
    methods: {
        onInput() {
            this.$emit('input', event.target.value);
        }
    }
}
</script>
