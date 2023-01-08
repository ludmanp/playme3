<template>
    <div class="checkboxItem" :class="{'checkboxItem_greenText': greenText}">
        <label class="checkboxBlock">
            <input type="checkbox" :checked="isChecked" :value="value" @change="onChange">
            <span class="checkbox__checkmark"></span>
            <span class="checkbox__text"><slot name="label"></slot></span>
        </label>
    </div>
</template>

<script>
export default {
    name: "CheckboxItem",
    model: {
        prop: 'modelValue',
        event: 'change'
    },
    props: {
        value: {
            type: [Boolean],
        },
        modelValue: { default: "" },
        trueValue: { default: true },
        falseValue: { default: false },
        greenText: { default: false },
    },
    computed: {
        isChecked() {
            if (this.modelValue instanceof Array) {
                return this.modelValue.includes(this.value)
            }
            // Note that `true-value` and `false-value` are camelCase in the JS
            return this.modelValue === this.trueValue
        }
    },
    methods: {
        onChange() {
            let isChecked = event.target.checked
            if (this.modelValue instanceof Array) {
                let newValue = [...this.modelValue]
                if (isChecked) {
                    newValue.push(this.value)
                } else {
                    newValue.splice(newValue.indexOf(this.value), 1)
                }
                this.$emit('change', newValue)
            } else {
                this.$emit('change', isChecked ? this.trueValue : this.falseValue)
            }
        }
    }}
</script>

