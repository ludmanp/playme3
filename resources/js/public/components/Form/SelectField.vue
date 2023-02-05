<template>
    <div class='selectField'>
        <label v-if="label">{{ label}}</label>
        <select @change="onChange" :disabled="disabled">
            <option v-for="option in options" :selected="option===value" :value="option">{{ option }}</option>
        </select>
    </div>
</template>

<script>
export default {
    name: "SelectField",
    props: {
        label: {
            type: String,
            default: null,
        },
        value: {
            type: String,
        },
        options: {
            type: Array,
            default: () => [],
        },
        disabled: {
            type: Boolean,
            default: false,
        },
    },
    methods: {
        onChange() {
            this.$emit('input', event.target.value);
        }
    }
}
</script>
