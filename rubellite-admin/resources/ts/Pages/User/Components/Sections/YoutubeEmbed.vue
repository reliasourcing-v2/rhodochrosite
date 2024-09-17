<template>
    <section class="bg-primary-900 relative z-[2]">
        <div class="max-w-[1440px] m-auto lg:pb-20 px-4 pb-16 lg:px-20">
            <div class="text-center mb-10 lg:mb-20">
                <p class="text-5xl text-white font-bold">{{ title }}</p>
            </div>
            <div>
                <Lightgallery
                    :settings="{ 
                        speed: 500,
                        plugins: plugins
                    }"
                >
                    <a 
                        :href="item.buttonLink"
                    >
                        <img 
                            class="image image-thumb w-full h-full object-cover" 
                            :src="$page.props.storage_url + item.image" 
                            alt="thumbnail"
                            loading="lazy"
                            decoding="async"
                        >
                    </a>
                </Lightgallery>
            </div>
        </div>
    </section>
</template>
<script lang="ts" setup>
import Lightgallery from 'lightgallery/vue';
import lgThumbnail from 'lightgallery/plugins/thumbnail';
import lgZoom from 'lightgallery/plugins/zoom';
import lgVideo from 'lightgallery/plugins/video';

const plugins: {} [] = [lgThumbnail, lgZoom, lgVideo];

defineProps({
    item: {
        type: Object,
        default: () => ({})
    },
    title: {
        type: String
    },
})
</script>