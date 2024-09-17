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
        <section class="relative bg-primary-50">
            <img 
                class="absolute top-0 left-0 w-full h-full z-1 object-cover" 
                src="/icons/grid.png" 
                alt="grid"
                loading="lazy"
                decoding="async"
            >
            <div class="max-w-[1440px] m-auto px-4 lg:px-20 relative z-[2] py-16">
                <div class="flex lg:flex-row flex-col items-center justify-between image-text">
                    <div class="w-full lg:w-7/12 mb-8 lg:mb-0 order-2 lg:ml-20">
                        <div class="text-5xl font-bold mb-6 title reveal-type leading-tight" v-html="cms?.section2_title" />
                        <div class="text-xl animateUp" v-html="cms?.section2_content" />
                        <div class="pt-6">
                            <v-button 
                                @click="showCalculatorModal = true" 
                                custom-class="h-14 px-6 !text-base animateUp" 
                                design-color="text-primary-50"
                            >
                                Get Started
                            </v-button>
                        </div>
                    </div>
                    <div class="w-full lg:w-5/12 max-w-[540px] animateUp order-1">
                        <img 
                            class="w-full" 
                            :src="$page.props.storage_url + cms?.section2_image" 
                            alt="image"
                            loading="lazy"
                            decoding="async"
                        >
                    </div>
                </div>
            </div>
        </section>

        <calculator-modal 
            :show="showCalculatorModal"
            @close="showCalculatorModal = false"
            maxWidth="calculator"
            :items="items"
        />
    </user-layout>
</template>
<script setup lang="ts">
import { ref, onMounted } from 'vue';
const props = defineProps({
    items: {
        type: Object,
        default: () => ({})
    },
    cms: {
        type: Object,
        default: () => ({})
    }
});

const showCalculatorModal = ref(false);

onMounted(()=> {
    setTimeout(() => {
        showCalculatorModal.value = true;
    }, 2000)
})
</script>