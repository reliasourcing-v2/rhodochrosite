<template>
    <div class="p-8 rounded-lg bg-white">
        <p class="text-xl font-bold mb-2">{{ item.title }}</p>
        <p class="text-neutral-600 leading-6 mb-6" v-html="item.content" />
            
        <v-button @click="$emit('apply')" designColor='text-white' size="md">Apply Now</v-button>
    </div>
</template>
<script setup lang="ts">
const props = defineProps({
    item: {
        type: Object,
        default: () => ({})
    }
})
</script>