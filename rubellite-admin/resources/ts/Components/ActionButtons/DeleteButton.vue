<template>
    <action-button
        fill="outline"
        :customClass="icon ? 'mx-1 !px-2' : ''"
    >
        <TrashIcon 
        v-if="icon"
        class="p-0.5 h-6 w-6 text-gray-500" aria-hidden="true" />
        <p v-else>Delete</p>
    </action-button>
   
</template>

<script setup lang="ts">
import { TrashIcon } from "@heroicons/vue/24/outline";
import { router } from "@inertiajs/vue3";
import { ref } from 'vue'

const props = defineProps({
    modalTitle: {
        type: String,
        default: 'Archive Item'
    },
    modalName: {
        type: String,
        default: 'Item #1'
    },
    routeLink: {
        type: String,
        required: true
    },
    icon:{
        type: Boolean,
        default: true
    },
    customClass:{
        type: String,
        default: false
    },
    showDeleteModal: {
        type: Boolean,
        default: true
    }
});

const show = ref<boolean>(false)
</script>
