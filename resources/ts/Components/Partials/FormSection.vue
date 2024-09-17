<template>
    <div class="w-[552px] mx-auto mt-6 border rounded-lg p-6">
        <jet-section-title class="mb-6">
            <template #title>
                <slot name="title"></slot>
            </template>
            <template #description>
                <slot name="description"></slot>
            </template>
        </jet-section-title>

        <div class="">
            <form @submit.prevent="$emit('submitted')">
                <div class="grid grid-cols-12 gap-6">
                    <slot name="form"></slot>
                </div>

                <div class="flex items-center mt-6 space-x-2" v-if="hasActions">
                    <slot name="actions"></slot>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup lang="ts">
import JetSectionTitle from "@/Components/Partials/JetSectionTitle.vue";

defineProps({
    hasActions: {
        type: Boolean,
        default: true,
    },
});
</script>
