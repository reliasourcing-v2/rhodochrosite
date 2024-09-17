<template>
    <user-layout custom-class="!bg-[#051125]">
        <section class="relative bg-[#051125]">
            <div class="px-4 lg:px-20 pt-[141px] lg:pt-[165px] lg:absolute lg:top-0 lg:left-0 z-[2] lg:bg-transparent bg-[#051125]">
                <div class="w-full lg:w-[70vw] text-white">
                    <h1 
                    class="text-5xl leading-tight lg:text-[3.5vw] lg:leading-[4.5vw] mb-4 ck-content ecommerce-highlight text-[#51D2CA]" 
                    v-html="cms?.section1_header" />
                    <div class="lg:max-w-[45vw] mb-8 lg:mb-12">
                        <p class="text-base lg:text-[1.2vw] lg:leading-relaxed">{{ cms?.section1_content }}</p>
                    </div>
                </div>
            </div>
            <frame-one class="lg:w-full w-[200%] relative right-[105%] lg:right-0" />
        </section>
        <div class="bg-[#051125]">
            <section class="bg-primary-900 relative saas-frame2 rounded-t-[2.25rem]">
                <div class="m-auto px-4 lg:px-20 flex lg:flex-row flex-col items-center space-x-0 lg:space-x-16 pt-16 lg:pt-[120px] pb-16 lg:pb-20 w-full xl:max-w-[1440px] xl:m-auto">
                    <div class="w-full lg:w-1/2">
                        <div class="text-white text-3xl leading-normal lg:text-[1.7vw] lg:leading-[2.5vw] ecommerce-highlight ck-editor mb-4 reveal-type" v-html="cms?.section2_header"></div>
                    </div>
                    <div class="w-full lg:w-1/2 text-white animateUp">
                        <p>{{ cms?.section2_content }}</p>
                    </div>
                </div>
                <div class="fadeIn xl:max-w-[1440px] xl:m-auto">
                    <eco-slider :items="cms?.section2_items" />
                </div>
            </section>
        </div>
        <section class="bg-gradient-to-b from-[#1C2C36] to-[#283F4E] e-commerce-frame">
            <div class="max-w-[1440px] m-auto lg:px-20 lg:py-20 px-4 py-16">
                <div class="text-white text-3xl ecommerce-highlight ck-editor lg:mb-20 lg:text-center reveal-type" v-html="cms?.section3_header"></div>
            </div>
            <div class="xl:max-w-[1440px] xl:m-auto lg:block hidden">
                <advantage-slider :items="cms?.section3_items"/>
            </div>
            <div class="space-y-4 px-4 pb-16 lg:hidden block">
                <div v-for="item in cms?.section3_items" class="animateUp">
                    <div 
                        class="p-8 rounded-xl bg-[#191919]/[0.60] advantage-card text-white space-y-2.5 flex flex-col justify-end border-[3px] border-[#191919]/[0.60] hover:border-[#51D2CA]" 
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
                        <p class="font-semibold text-xl text-primary-500 lg:text-2xl">{{ item.title }}</p>
                        <div class="content">
                            <p>{{ item.content }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-primary-900">
            <div class="max-w-[1440px] m-auto lg:px-20 lg:py-20 px-4 py-16">
                <div class="text-white text-3xl ecommerce-highlight ck-editor mb-16 text-center reveal-type" v-html="cms?.section4_header"></div>
                <div class="grid grid-cols-1 lg:grid-cols-6 gap-4">
                    <div 
                        v-for="service in cms?.section4_items" 
                        class="radial-card3 rounded-lg animateUp ecommerce-frame4-element generic-hover" 
                    >
                        <div class="flex space-x-4 bg-[#232627] p-6 rounded-lg relative z-[10] h-full">
                            <div class="w-11 h-11 bg-primary-700 flex items-center rounded-full justify-center">
                                <img 
                                    class="w-6 h-6 group-hover/benefit:scale-125 transition" 
                                    :src="$page.props.storage_url +  service.image" 
                                    alt="icon"
                                    loading="lazy"
                                    decoding="async"
                                >
                            </div>
                            <div class="w-[calc(100%-60px)] text-white">
                                <p class="font-semibold text-lg mb-4">{{ service.title  }}</p>
                                <p>{{service.content}}</p>
                            </div>
                        </div>
                        <div class="radial-bg"></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-gradient-to-b from-[#1C2C36] to-[#304958]">
            <div class="flex items-center lg:flex-row flex-col">
                <div class="w-full lg:w-1/2 h-full bg-white">
                    <img 
                        class="w-full h-full object-cover" 
                        :src="$page.props.storage_url + cms?.section5_image" 
                        alt="ecommerce"
                        loading="lazy"
                        decoding="async"
                    >
                </div>
                <div class="w-full lg:w-1/2 text-white px-4 lg:px-20 py-16 lg:py-[100px]">
                    <p class="text-5xl leading-tight font-bold mb-6 animateUp" v-html="cms?.section5_header"></p>
                    <div class="text-lg mb-12 animateUp" v-html="cms?.section5_content" />
                    <a href="/#contact-us">
                        <v-button class="animateUp" design-color="text-[#304958]">
                            Outsource with Us
                        </v-button>
                    </a>
                </div>
            </div>
        </section>
        <section class="relative z-1 bg-[#1B2B35] overflow-hidden">
            <div id="contact-form" class="-translate-y-20"></div>
            <img 
                class="absolute lg:top-0 top-[150px] lg:scale-100 scale-[200%] lg:bottom-0 left-0 -translate-x-[50%] z-1"
                src="/icons/contact-bg.svg" 
                alt="contact"
                loading="lazy"
                decoding="async"
            >
            <div class="max-w-[1440px] m-auto relative z-[2] lg:px-0 px-4 py-10">
                <contact-form 
                    custom-class="!bg-[#142129]"
                    :title="cms?.section6_header"
                    :description="cms?.section6_content"
                />
            </div>
        </section>
    </user-layout>
</template>
<script lang="ts" setup>
import FrameOne from './Components/ECommerceFrameOne.vue';
import EcoSlider from './Components/EcommerceSlider.vue';
import AdvantageSlider from './Components/EcommerceAdvantageSlider.vue';

const props = defineProps({
    cms: {
        type: Object
    }
})
</script>