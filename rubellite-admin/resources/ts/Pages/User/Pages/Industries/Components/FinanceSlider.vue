<template>
    <div>
        <swiper
            :modules="modules"
            :slides-per-view="1.2"
            :space-between="24"
            :free-mode="true"
            class="advantage-swiper !overflow-visible"
            :breakpoints="{
                '1024': {
                    slidesPerView: 3.5,
                    spaceBetween: 32,
                },
            }"
        >
            <swiper-slide v-for="item in items" class="radial-card2 relative rounded-xl generic-hover">
                <div 
                    class="p-8 rounded-xl text-white space-y-2.5 flex flex-col min-h-[394px] bg-[#051125] z-[10] relative" 
                    :class="item.customClass"
                >
                    <div class="w-24 h-24 relative">
                        <img
                            class="w-full h-full object-contain" 
                            :src="$page.props.storage_url + item.image" 
                            alt="icon"
                            loading="lazy"
                            decoding="async"
                        >
                    </div>
                    <p class="font-semibold text-2xl text-[#51D2CA]">{{ item.title }}</p>
                    <div>
                        <p>{{ item.content }}</p>
                    </div>
                </div>
                <div class="radial-bg"></div>
            </swiper-slide>
            <swiper-slide class="w-20 spacer"></swiper-slide>
        </swiper>
    </div>
</template>
<script lang="ts" setup>
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Autoplay, Navigation, FreeMode } from 'swiper/modules';

defineProps({
    items: {
        type: Object
    }
})

const modules = [Autoplay, Navigation, FreeMode];

</script>
