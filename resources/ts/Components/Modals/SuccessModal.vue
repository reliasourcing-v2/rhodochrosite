<template>
    <modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="$emit('close')">
        <div class="bg-white p-6 rounded-lg border">
            <div class="text-center mb-6">
                <div
                    class="
                    mx-auto
                    flex-shrink-0 flex
                    items-center
                    justify-center
                    h-12
                    w-12
                    rounded-full
                    bg-primary-50
                    "
                >
                    <CheckIcon
                        class="h-6 w-6 text-primary-800"
                        aria-hidden="true"
                    />
                </div>
                <div class="justify-center my-6">
                    <p class="text-[18px] font-bold text-gray-900">{{  title }}</p>
                    <p class="text-gray-500 text-sm">{{ description }}</p>
                </div>
            </div>
            <slot name="content" class="mb-6"></slot>
            <div class="flex space-x-2 justify-center">
                <slot name="button"></slot>
            </div>
        </div>
    </modal>
</template>

<script setup lang="ts">
import Modal from '@/Components/Modals/Modal.vue'
import { CheckIcon } from "@heroicons/vue/24/solid"

defineProps({
    id: {
        type: String
    },
    title: {
        type: String,
        default: null
    },
    description: {
        type: String,
        default: null
    },
    show: {
        default: false
    },
    maxWidth: {
        default: 'lg'
    },
    closeable: {
        default: true
    },
})
</script>
