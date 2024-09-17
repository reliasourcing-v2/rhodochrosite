<template>
    <div>
        <swiper
            :modules="modules"
            :slides-per-view="'auto'"
            :space-between="32"
            :free-mode="true"
            class="ecommerce-swiper !overflow-visible"
        >
            <swiper-slide v-for="item in items" class="lg:!w-fit">
                <div class="w-full lg:w-auto pt-[70%] lg:pt-0 lg:rounded-0 rounded-xl overflow-hidden relative">
                    <img 
                        class="w-full h-full object-cover lg:object-none lg:w-auto lg:h-full lg:relative absolute lg:top-auto lg:left-auto top-0 left-0"
                        :src="$page.props.storage_url + item.image" 
                        alt="ecommerce"
                        loading="lazy"
                        decoding="async"
                    >
                </div>
            </swiper-slide>
            <swiper-slide class="lg:!w-[400px]"/>
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
