<template>
    <div class="border border-gray-100 rounded-lg overflow-hidden">
        <div class="px-6 py-4" v-if="showHeader">
            <slot name="header" />
        </div>

        <div>
            <slot name="body" />
        </div>

        <div class="px-6 py-4" v-if="showFooter">
            <slot name="footer" />
        </div>
    </div>
</template>

<script setup lang="ts">
defineProps({
    showHeader: {
        type: Boolean,
        default: true
    },
    showFooter: {
        type: Boolean,
        default: true
    }
})
</script>