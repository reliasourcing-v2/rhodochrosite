<template>
    <user-layout custom-class="!bg-[#0F193D]">
        <section class="relative">
            <div class="px-4 lg:px-20 pt-[141px] lg:pt-[250px] lg:absolute lg:top-0 lg:left-0 z-[2] lg:bg-transparent bg-[#0F193D]">
                <div class="w-full lg:w-[70vw] text-white">
                    <saas-text class="w-full lg:max-w-[53vw] mb-5 lg:mb-0" />
                    <div class="lg:max-w-[37vw] lg:mb-12">
                        <p class="text-base lg:text-[1.2vw] lg:leading-relaxed">{{ cms?.section1_content }}</p>
                    </div>
                </div>
            </div>
            <frame-one class="lg:w-full w-[170%] relative right-[70%] lg:right-0" />
        </section>
        <div class="bg-[#0F193D]">
            <section class="bg-[#172B75] relative saas-frame2 rounded-t-[2.25rem]">
                <saas-particle class="absolute top-[-200px] left-[-650px]" />
                <div class="max-w-[1440px] m-auto px-4 lg:px-20 flex items-center lg:space-x-20 py-16 lg:flex-row flex-col lg:py-20 w-full">
                    <div class="w-full lg:w-[540px] relative z-1">
                        <img 
                            class="w-full"
                            :src="$page.props.storage_url + cms?.section2_image" 
                            alt="saas"
                            loading="lazy"
                            decoding="async"
                        >
                    </div>
                    <div class="w-full lg:w-[calc(100%-620px)]">
                        <div class="text-white text-4xl lg:text-[3rem] leading-tight saas-highlight ck-editor mb-4 reveal-type" v-html="cms?.section2_header"></div>
                        <p class="text-white animateUp">{{ cms?.section2_content }}</p>
                    </div>
                </div>
            </section>
        </div>
        <section class="bg-gradient-to-b from-[#172B75] to-[#425FC5]">
            <div class="max-w-[1440px] m-auto lg:px-20 lg:py-20 px-4 py-16">
                <div class="text-white text-4xl lg:text-[3rem] leading-tight saas-highlight ck-editor mb-10 reveal-type" v-html="cms?.section3_header"></div>
                <div class="grid grid-cols-1 lg:grid-cols-6 gap-10">
                    <div 
                        v-for="solution in cms?.section3_items" 
                        class="p-8 rounded-lg bg-white/[0.03] text-white space-y-2.5 flex flex-col justify-start animateUp saas-frame3-element generic-hover" 
                    >
                        <div class="w-24 h-24 relative">
                            <img
                                class="w-full h-full object-contain" 
                                :src="$page.props.storage_url + solution.logo" 
                                alt="icon"
                                loading="lazy"
                                decoding="async"
                            >
                        </div>
                        <p class="font-semibold text-xl lg:text-2xl">{{ solution.title }}</p>
                        <p>{{ solution.content }}</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-gradient-to-b from-[#0F193D] to-[#2843A3] relative overflow-hidden">
            <saas-particle-two class="absolute lg:bottom-auto bottom-0 lg:top-[60%] left-1/2 -translate-x-1/2 z-1" />
            <div class="max-w-[1060px] m-auto lg:px-20 lg:py-20 px-4 py-16 relative z-[10]">
                <div class="text-white text-center text-4xl lg:text-[3rem] leading-tight saas-highlight ck-editor mb-16 reveal-type" v-html="cms?.section4_header"></div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-8">
                    <div v-for="expectation in cms?.section4_items" class="lg:even:translate-y-3 radial-card4 rounded-lg animateUp generic-hover">
                        <div class="p-6 rounded-lg bg-[#182948] flex space-x-4 h-full relative z-[10]">
                            <div class="w-10 h-10">
                                <img 
                                    class="w-full h-full object-contain" 
                                    :src="$page.props.storage_url + expectation.logo" 
                                    alt="expectation"
                                    loading="lazy"
                                    decoding="async"
                                >
                            </div>
                            <div class="w-[calc(100%-56px)] text-white">
                                <p class="text-lg font-semibold mb-4">{{expectation.title}}</p>
                                <p class="opacity-[0.65]">{{expectation.content}}</p>
                            </div>
                        </div>
                        <div class="radial-bg"></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-gradient-to-b from-[#0F193D] to-[#425FC5]">
            <div class="flex items-center lg:flex-row flex-col">
                <div class="w-full lg:w-1/2 h-full bg-white">
                    <img 
                        class="w-full h-full object-cover" 
                        :src="$page.props.storage_url + cms?.section5_image" 
                        alt="saas"
                        loading="lazy"
                        decoding="async"
                    >
                </div>
                <div class="w-full lg:w-1/2 text-white px-4 lg:px-20 py-16 lg:py-[100px]">
                    <p class="text-5xl font-bold mb-6 animateUp" v-html="cms?.section5_header"></p>
                    <div class="text-lg mb-12 animateUp" v-html="cms?.section5_content" />
                    <a href="/#contact-us">
                        <v-button class="animateUp" design-color="text-[#425FC5]">
                            Outsource with Us
                        </v-button>
                    </a>
                </div>
            </div>
        </section>
        <section class="relative z-1 bg-[#142150]">
            <div id="contact-form" class="-translate-y-20"></div>
            <div class="max-w-[1440px] m-auto relative z-[2] lg:px-0 px-4 py-10">
                <contact-form 
                    custom-class="!bg-[#0F193D]"
                    :title="cms?.section6_title"
                    :description="cms?.section6_content"
                />
            </div>
        </section>
    </user-layout>
</template>
<script lang="ts" setup>
import SaasText from './Components/SaasText.vue';
import FrameOne from './Components/SaasFrameOne.vue';
import SaasParticle from './Components/SaasParticle.vue';
import SaasParticleTwo from './Components/SaasParticleTwo.vue';
const props = defineProps({
    cms: {
        type: Object
    }
})
</script>