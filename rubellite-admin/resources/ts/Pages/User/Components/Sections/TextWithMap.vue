<template>
    <section class="bg-primary-50">
        <div class="flex lg:flex-row flex-col items-center px-4 lg:px-20 lg:space-x-20 py-10 max-w-[1440px] m-auto relative">
            <div class="w-full lg:w-[calc(100%-620px)] image-text">
                <div class="text-5xl font-bold mb-6 title animateUp reveal-type" v-html="item.title" />
                <div class="text-xl animateUp" v-html="item.content" />
            </div>
            <div class="w-full lg:w-[540px]">
                <img 
                    class="w-full banner-image" 
                    :src="$page.props.storage_url + item.image" 
                    alt="map"
                    loading="lazy"
                    decoding="async"
                >
            </div>
            <img 
                class="absolute lg:bottom-auto bottom-0 lg:scale-100 scale-[150%] lg:top-1/2 right-0 lg:-translate-y-1/2 translate-x-1/2"
                src="/icons/ph-design.svg" 
                alt="design"
                loading="lazy"
                decoding="async"
            >
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