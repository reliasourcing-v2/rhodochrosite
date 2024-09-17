<template>
    <action-button 
    type="button" 
    @click="action"
    fill="secondary"
    :leading-icon="ArrowDownTrayIcon">
        Export
    </action-button>
</template>

<script setup lang="ts">
import { ArrowDownTrayIcon } from "@heroicons/vue/24/solid";

const props = defineProps({
    routeLink: {
        type: String,
        required: true,
    },
});

const emit = defineEmits(['click'])

const action = () => {
    window.open(props.routeLink, "_blank");
    emit("click");
}
</script>
