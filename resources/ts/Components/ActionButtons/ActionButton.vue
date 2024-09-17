<template>
    <button
        :type="btnType"
        :disabled="disabled"
        class="
            items-center 
            justify-center 
            border 
            rounded-lg
            text-sm 
            text-center 
            font-semibold
            transition 
            disabled:opacity-25 
        "
        :class="[
            disabled ? 'pointer-events-none' : '',
            customClass,
            // color
            fill == 'danger' ? 'bg-red-600 border-red-600 text-white hover:bg-red-700 hover:border-red-700 focus:outline-none active:bg-red-800 active:border-red-800' :
            fill == 'primary' ? 'bg-primary-500 border-primary-500 text-white hover:brightness-90 focus:outline-none active:bg-primary-800 active:border-primary-800' :
            fill == 'outline' ? 'bg-white border-gray-100 text-gray-500 hover:bg-gray-50 focus:outline-none active:bg-gray-100' : '',
            fill == 'none' ? 'bg-white border-white text-gray-900 hover:bg-gray-50 hover:border-gray-50 focus:outline-none active:bg-gray-100 active:border-gray-100' : '',
            // block
            block ? 'flex w-full' : 'inline-flex',
            // size
            size == 'small' ? 'h-9 px-4' :
            size == 'large' ? 'h-14 px-4' : 'h-11 px-4'
        ]"
    >
        <component
        v-if="leadingIcon"
        :is="leadingIcon" 
        aria-hidden="true"
        class="h-5 w-5 mr-2"/>
        <slot></slot>

        <component
        v-if="trailingIcon"
        :is="trailingIcon" 
        aria-hidden="true"
        class="h-5 w-5 ml-2"/>
    </button>
  </template>
  
<script setup lang="ts">
import { PropType } from 'vue';


export type ButtonType = 'button' | 'submit' | 'reset'

defineProps({
    btnType: {
        type: String as PropType<ButtonType>,
        default: "submit",
    },
    disabled: {
        type: Boolean,
        default: false,
    },
    customClass: {
        type: String,
        default: "",
    },
    block: {
        type: Boolean,
        default: false,
    },
    size: {
        type: String,
        default: "default", // small | default | large
    },
    fill: {
        type: String,
        default: "primary", // primary | secondary
    },
    leadingIcon: {
        default: null,
    },
    trailingIcon: {
        default: null,
    }
});
</script>
  