<template>
    <div>
        <swiper
            :modules="modules"
            :slides-per-view="1"
            :space-between="24"
            :free-mode="true"
            :disabled="true"
            class="advantage-swiper !overflow-visible"
            :breakpoints="{
                '1024': {
                    slidesPerView: 3.5,
                    spaceBetween: 32,
                },
            }"
        >
            <swiper-slide v-for="item in items">
                <div 
                        class="p-8 rounded-xl bg-[#191919]/[0.60] advantage-card text-white space-y-2.5 flex flex-col justify-end min-h-[515px] border-[3px] border-[#191919]/[0.60] hover:border-[#51D2CA]" 
                        :class="item.customClass"
                    >
                        <div class="space-y-2.5 image-text">
                            <div class="w-24 h-24 relative">
                                <img
                                    class="w-full h-full object-contain" 
                                    :src="$page.props.storage_url + item.image" 
                                    alt="icon"
                                    loading="lazy"
                                    decoding="async"
                                >
                            </div>
                            <p class="font-semibold text-2xl">{{ item.title }}</p>
                        </div>
                        <div class="content">
                            <p>{{ item.content }}</p>
                        </div>
                    </div>
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
