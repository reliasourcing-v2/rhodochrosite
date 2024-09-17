<template>
    <label
        class="flex"
        :class="customLabelClass"
    >
        <input 
            type="radio" 
            :id="id" 
            :value="value" 
            class="mr-2.5 w-5 h-5 text-primary-800 focus:ring-primary-800" 
            :class="customInputClass" 
            :name="name"
        >
        <slot></slot>
    </label>
</template>

<script setup lang="ts">

defineProps({
    modelValue: {
        default: null,
        required: true,
    },
    label: {
        type: String,
        default: null,
    },
    name: {
        type: String,
        default: null,
    },
    value: {
        type: String,
        default: null,
    },
    id: {
        type: String,
        default: null,
    },
    customInputClass: {
        type: String,
        default: null,
    },
    disabled: {
        type: Boolean,
        default: false,
    },
    customLabelClass: {
        type: String,
        default: null,
    },
});
</script>
