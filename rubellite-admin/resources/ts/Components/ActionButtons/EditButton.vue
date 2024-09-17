<template>
    <a
        :href="routeLink"
    >
        <action-button
            fill="outline"
            customClass="mx-1 !px-2"
            type="button"
        >
            <EyeIcon class="p-0.5 h-6 w-6 text-gray-500" aria-hidden="true" />
        </action-button>
    </a>
</template>

<script setup lang="ts">
import { EyeIcon } from "@heroicons/vue/24/outline";
const props = defineProps({
    routeLink: {
        type: String,
        required: true,
    },
});
</script>
