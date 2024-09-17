<template>
    <label class="flex items-center space-x-3">
        <input type="checkbox" :value="value" v-model="proxyChecked"
               class="border-gray-300 text-primary-800 focus:border-primary-800 focus:ring focus:ring-primary-700 focus:ring-opacity-50">
        <slot></slot>
    </label>
</template>

<script>
export default {
    emits: ['update:checked'],

    props: {
        checked: {
            type: [Array, Boolean],
            default: false,
        },
        value: {
            default: null,
        },
    },

    computed: {
        proxyChecked: {
            get() {
                return this.checked;
            },

            set(val) {
                this.$emit("update:checked", val);
            },
        },
    },
}
</script>
