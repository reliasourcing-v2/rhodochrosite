<template>
    <div class="">
        <!-- <div class="flex items-center justify-center mb-6">
            <img 
            class="flex-shrink-0"
            src="/icons/logo.png" 
            alt="logo">
        </div> -->
        <p class="text-2xl font-black" v-if="title">{{ title }}</p>
        <p class="text-sm text-gray-500 mb-6" v-if="description">{{ description }}</p>
        
        <slot />
    </div>
</template>


<script setup lang="ts">
defineProps({
    title: {
        type: String
    },
    description: {
        type: String
    }
})
</script>