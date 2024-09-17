<template>
    <div>
        <swiper
            :modules="modules"
            :slides-per-view="2.8"
            :space-between="32"
            :direction="'horizontal'"
            :autoplay="{
                delay: 5000,
                disableOnInteraction: false,
            }"
            :loop="true"
            :breakpoints="{
                '1024': {
                    slidesPerView: 6,
                    spaceBetween: 40,
                },
            }"
            :speed="1000" class="company-swiper"
        >
            <swiper-slide v-for="i,index in items" :key="index">
                <a 
                    :href="i.link" 
                    target="_blank" 
                    rel="noreferrer"
                    
                >
                    <div class="popAnimate w-fit m-auto">
                        <img 
                            class="w-[114px] grayscale transition hover:grayscale-0 hover:scale-125 duration-500"
                            :src="$page.props.storage_url + i.logo" 
                            alt="logo"
                            loading="lazy"
                            decoding="async"
                        >
                    </div>
                </a>
            </swiper-slide>
        </swiper>
    </div>
</template>
<script lang="ts" setup>
import { Swiper, SwiperSlide } from 'swiper/vue';
import "swiper/css/free-mode";
import 'swiper/css';
import { Autoplay, Navigation } from 'swiper/modules';

defineProps({
    items: {
        type: Object
    }
})

const modules = [Autoplay, Navigation];

</script>
