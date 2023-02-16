<template>
    <div class="inputField" :class="{'inputField_location': location, 'inputField_date': date, 'inputField_time': time}">
        <input :placeholder='placeholder' :type='type' :value="value" @input="onInput" :readonly="readonly">
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
        location: {
            type: Boolean,
        },
        date: {
            type: Boolean,
        },
        time: {
            type: Boolean,
        },
        readonly: {
            type: Boolean,
            default: false,
        },
    },
    methods: {
        onInput() {
            this.$emit('input', event.target.value);
        }
    }
}
</script>
