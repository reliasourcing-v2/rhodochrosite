<template>
    <user-layout>
        <general-banner 
            :item="{
                image: $page.props.storage_url + cms?.section1_image,
                title: cms?.section1_title
            }"
        />  
        <offset-banner 
            :item="{
                title: cms?.section1_header,
                description: cms?.section1_content,
                customClass: '-translate-y-[100px]'
            }"
        />
        <section class="bg-primary-50">
            <div class="px-4 lg:px-20 pb-[120px] max-w-[1440px] m-auto">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <career-card 
                        v-for="item in cms?.section2_items"
                        :item="item"
                        @apply="apply(item.title)"
                    />
                </div>
            </div>
        </section>
        <div class="bg-primary-900">
            <div class="max-w-[1440px] m-auto lg:px-20 lg:py-32 px-4 py-16">
                <div class="text-center text-white mb-10">
                    <p class="text-28 font-bold">{{ cms?.section3_header }}</p>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-10 lg:gap-20">
                    <div v-for="i in cms?.section3_items" class="text-white">
                        <div class="w-24 m-auto mb-6">
                            <img
                                class="w-full h-full object-contain"
                                :src="$page.props.storage_url + i.image" 
                                alt="iso"
                                loading="lazy"
                                decoding="async"
                            >
                        </div>
                        <div class="text-center">
                            <p class="font-bold text-xl mb-2">{{i.title}}</p>
                            <p>{{ i.content }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <section class="relative z-[2] bg-primary-50">
            
            <div class="max-w-[1440px] m-auto lg:pb-20 px-4 py-16 lg:px-20">
                <div class="text-center mb-10 lg:mb-10">
                    <p class="text-5xl font-bold">{{cms?.section4_header}}</p>
                </div>
                <div>
                    <Lightgallery
                        :settings="{ 
                            speed: 500,
                            plugins: plugins
                        }"
                    >
                        <a 
                            :href="cms?.section4_video_link"
                        >
                            <div class="w-full aspect-w-4 aspect-h-3 lg:aspect-w-16 lg:aspect-h-9 rounded-xl lg:rounded-lg overflow-hidden">
                                <img 
                                    class="image image-thumb w-full h-full object-cover" 
                                    :src="$page.props.storage_url + cms?.section4_image" 
                                    alt="thumbnail"
                                    loading="lazy"
                                    decoding="async"
                                >
                            </div>
                        </a>
                    </Lightgallery>
                </div>
                <div class="relative pt-20">
                    <img 
                        class="absolute bottom-[1300px] lg:bottom-0 left-0 lg:scale-100 scale-[200%] -translate-x-[50%] z-1"
                        src="/icons/contact-bg.svg" 
                        alt="contact"
                        loading="lazy"
                        decoding="async"
                    >
                    <div id="career-form" class="spacer -translate-y-20"></div>
                    <career-form 
                        :position="position" 
                        :title="cms?.section5_title "
                        :description="cms?.section5_content"
                    />
                </div>
            </div>
        </section>
    </user-layout>
</template>
<script lang="ts" setup>
import { ref } from 'vue';
import Lightgallery from 'lightgallery/vue';
import lgThumbnail from 'lightgallery/plugins/thumbnail';
import lgZoom from 'lightgallery/plugins/zoom';
import lgVideo from 'lightgallery/plugins/video';

const props = defineProps({
    cms: {
        type: Object,
    }
})

const position = ref('');

const plugins: {} [] = [lgThumbnail, lgZoom, lgVideo];

const apply = (title) => {
    position.value = title;
    const careerForm = document.getElementById('career-form');
    setTimeout(() => {
        careerForm.scrollIntoView({ behavior: 'smooth' });
    }, 300)
}
</script>