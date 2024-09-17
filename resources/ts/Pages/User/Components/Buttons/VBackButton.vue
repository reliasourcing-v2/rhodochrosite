<template>
    <a :href="routeLink" class="group flex items-center space-x-2 max-w-fit">
        <ArrowLeftIcon
            class="text-gray-600 transition group-hover:text-primary-800 w-6 h-6"
            aria-hidden="true"
        />
        <span class="text-gray-600 transition group-hover:text-primary-800 font-semibold text-sm">
            <slot></slot>
        </span>
    </a>
</template>
<script setup lang="ts">
import { ArrowLeftIcon } from "@heroicons/vue/24/outline";

const props = defineProps ({
    routeLink: {
        type: String,
        default: "#"
    },
});
</script>