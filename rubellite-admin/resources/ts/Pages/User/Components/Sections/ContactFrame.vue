<template>
    <section class="relative z-1">
    <div id="contact-form" class="-translate-y-20"></div>
        <img 
            class="absolute lg:top-auto top-[150px] lg:scale-100 scale-[200%] lg:bottom-0 left-0 -translate-x-[50%] z-1"
            src="/icons/contact-bg.svg" 
            alt="contact"
            loading="lazy"
            decoding="async"
        >
        <div class="max-w-[1440px] m-auto relative z-[2] lg:px-0 px-4">
            <contact-form />
        </div>
    </section>
</template>
<script lang="ts" setup>
defineProps({
    item: {
        type: Object,
        default: () => ({})
    }
})
</script>