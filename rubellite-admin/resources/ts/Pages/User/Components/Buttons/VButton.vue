<template>
    <button
        :type="btnType"
        class="inline-flex items-center font-semibold px-6 py-2 text-sm transition text-center justify-center border rounded-lg btn poppins relative group/button overflow-hidden"
        :class="[
            disabled ? 'pointer-events-none disabled:opacity-25' : '',
            fill ? 'hover:bg-primary-600 text-white active:text-white' : 'bg-transparent hover:text-white',
            fillColor == 'primary' ? 'bg-primary-600 border-0 active:bg-primary-600 hover:bg-primary-600' : '',
            size == 'lg' ? 'h-14' : 
            size == 'sm' ? 'h-10' : 
            size == 'md' ? 'h-12' : 'h-11',
            block ? 'flex w-full' : 'inline-flex',
            customClass,
        ]"
    >
    <svg class="absolute -top-2 -right-2 transition overlay" :class="designColor" width="40" height="39" viewBox="0 0 40 39" fill="transparent">
        <rect class="boxes box1" y="6.87891" width="9.17751" height="9.17751" transform="rotate(-45 0 6.87891)" fill="currentColor"/>
        <rect class="boxes box2" x="13.5625" y="19.6621" width="9.17751" height="9.17751" transform="rotate(-45 13.5625 19.6621)" fill="currentColor"/>
        <rect class="boxes box3" x="26.4102" y="32.5107" width="9.17751" height="9.17751" transform="rotate(-45 26.4102 32.5107)" fill="currentColor"/>
        <rect class="boxes box4" x="13.2383" y="6.48926" width="9.17751" height="9.17751" transform="rotate(-45 13.2383 6.48926)" fill="currentColor"/>
        <rect class="boxes box5" x="26.4102" y="19.6621" width="9.17751" height="9.17751" transform="rotate(-45 26.4102 19.6621)" fill="currentColor"/>
    </svg>
      <slot></slot>
    </button>
  </template>
  
<script setup lang="ts">
import { PropType } from 'vue';
export type ButtonType = 'button' | 'submit' | 'reset'

const props = defineProps ({
    btnType: {
        type: String as PropType<ButtonType>,
        default: "button",
    },
    disabled: {
        type: Boolean,
        default: false,
    },
    customClass: {
        type: String
    },
    size: {
        type: String, // sm, md, lg
        default: "lg"
    },
    fillColor: {
        type: String,
        default: "primary", // primary | gray | blue
    },
    fill: {
        type: Boolean,
        default: true
    },
    block: {
        type: Boolean,
        default: false,
    },
    designColor: {
        type: String,
        default: "text-primary-900"
    }
});
</script>
  