<template>
    <button
        :type="type"
        class="
            inline-flex
            items-center
            px-4
            py-3
            border
            ring-0
            rounded-lg
            text-sm
            font-semibold
            transition
        "
        :class="[
            secondary
                ? 'bg-white border-primary-600 text-primary-600 hover:text-gray-700 focus:outline-none active:text-gray-800 active:bg-gray-50 disabled:opacity-25 '
                : import_export ? 'bg-white border-gray-100 text-gray-500 hover:text-gray-700 focus:outline-none active:text-gray-800 active:bg-gray-50 disabled:opacity-25 '
                : textButton ? 'bg-white border-none text-primary-600 hover:text-primary-700 focus:outline-none active:text-primary-800 active:bg-gray-50 disabled:opacity-25'
                :'border-primary-600 focus:outline-none focus:border-gray-900 disabled:opacity-25 bg-primary-600 hover:bg-primary-700 active:bg-primary-900 text-white'
        ]"
    >
        <slot></slot>
        <ArrowRightIcon v-if="arrowIcon" class="ml-2 h-4 w-4"  aria-hidden="true" />
        <CheckCircleIcon v-if="checkCircleIcon" class="ml-2 h-4 w-4"  aria-hidden="true" />
    </button>
</template>

<script setup lang="ts">
import { ArrowRightIcon, CheckCircleIcon } from "@heroicons/vue/24/solid";
const props = defineProps({
    type: {
        type: String,
        default: "submit",
    },
    secondary: {
        type: Boolean,
        default: false,
    },
    arrowIcon:{
        type: Boolean,
        default: false,
    },
    checkCircleIcon:{
        type: Boolean,
        default: false,
    },
    import_export:{
        type: Boolean,
        default:false,
    },
    textButton:{
        type:Boolean,
        default:false,
    }
});
</script>
