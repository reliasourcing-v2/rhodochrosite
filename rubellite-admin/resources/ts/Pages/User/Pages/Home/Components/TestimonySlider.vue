<template>
     <swiper
        :modules="modules"
        :slides-per-view="1"
        :space-between="32"
        :direction="'horizontal'"
        :navigation="true"
        :autoplay="{
            delay: 5000,
            disableOnInteraction: false,
        }"
        :loop="true"
        :speed="1000" class="testimony-swiper"
    >
        <swiper-slide v-for="item, index in items" :key="index">
            <div class="p-6 lg:p-14 bg-primary-50 rounded-2xl flex lg:space-x-11 items-center lg:flex-row flex-col space-y-6 lg:space-y-0">
                <div class="w-full lg:w-[340px] lg:h-[340px] flex items-center justify-center lg:p-0 p-10">
                    <div class="w-full max-w-[240px] m-auto relative">
                        <div class="absolute top-2 left-0 bg-primary-500 w-full h-full rounded-[2rem] rotate-45"></div>
                        <div class="aspect-w-1 aspect-h-1 w-full rounded-[2rem] rotate-45 overflow-hidden relative">
                            <div class="w-[135%] h-[135%] bg-white absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 -rotate-45">
                                <img 
                                    class="w-full object-cover" 
                                    :src="$page.props.storage_url + item.image"  
                                    alt="ceo"
                                    loading="lazy"
                                    decoding="async"
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-[calc(100%-384px)] relative">
                    <img
                        src="/icons/quote.svg" 
                        alt="quote"
                        class="absolute -top-4 lg:-top-8 left-0 lg:-left-8"
                        loading="lazy"
                        decoding="async"
                    >
                    <p class="text-xl lg:text-2xl font-medium poppins mb-4 animateUp">{{ item?.testimonial }}</p>
                    <p class="text-sm font-bold animateUp">{{ item?.name }}</p>
                    <p class="text-sm animateUp">{{ item?.position }}</p>
                </div>
            </div>
        </swiper-slide>
    </swiper>
</template>
<script setup lang="ts">
import { Autoplay, Navigation } from 'swiper/modules';
import { Swiper, SwiperSlide } from 'swiper/vue';

defineProps({
    items: {
        type: Object
    }
})

const modules = [Autoplay, Navigation];


</script>