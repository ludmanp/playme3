<template>
    <div class="textareaField">
        <label v-if="label">{{ label }}</label>
        <textarea :placeholder='placeholder' @input="onInput">{{ value }}</textarea>
    </div>
</template>

<script>
export default {
    name: "TextareaField",
    props: {
        label: {
            type: String,
            default: null,
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
