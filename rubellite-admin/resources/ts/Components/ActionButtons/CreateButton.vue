<template>
    <a :href="routeLink">
        <action-button
        :trailing-icon="PlusIcon">
            {{ text }}
        </action-button>
    </a>
</template>

<script setup lang="ts">
import { PlusIcon } from "@heroicons/vue/24/solid";
import ActionButton from "@/Components/ActionButtons/ActionButton.vue";

const props = defineProps({
    routeLink: {
        type: String,
        required: true,
    },
    text: {
        type: String,
        default: "Create",
    },
});
</script>
