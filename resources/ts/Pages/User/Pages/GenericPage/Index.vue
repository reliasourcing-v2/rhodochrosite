<template>
    <user-layout>
        <section class="min-h-screen">
            <div class="w-[90%] lg:w-[70%] 2xl:w-[50%] mx-auto py-[150px]">
                <h1 class="text-2xl lg:text-4xl font-extrabold mb-8 lg:mb-12 text-center">
                    {{ cms?.section1_title }}
                </h1>

                <div 
                    class="ck-content w-full" 
                    v-html="cms?.section1_content" 
                />
            </div>
        </section>
    </user-layout>
</template>

<script setup lang="ts">
defineProps({
    cms: {
        type: Object
    }
})
</script>
