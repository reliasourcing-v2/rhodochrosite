<template>
    <user-layout custom-class="gaming">
        <div class="spacer h-[100px] lg:block hidden"></div>
        <section class="relative">
            <div class="px-4 lg:px-20 pt-[141px] lg:pt-[250px] lg:absolute lg:top-0 lg:left-0 z-[2] lg:bg-transparent">
                <div class="w-full lg:w-[70vw]">
                    <div class="pulse2">
                        <img 
                            class="lg:-translate-x-16 mb-4 lg:w-[50vw]"
                            :src="$page.props.storage_url + cms?.section1_header" 
                            alt="game"
                            loading="lazy"
                            decoding="async"
                        >
                    </div>
                    <div class="lg:max-w-[39vw] mb-8 lg:mb-12">
                        <h1 class="text-base lg:text-[1.2vw] lg:leading-relaxed">{{cms?.section1_content}}</h1>
                    </div>
                </div>
            </div>
            <frame-one class="lg:w-full w-[170%] relative right-[70%] lg:right-0 lg:pb-0 pb-20" />
            <img 
                class="absolute bottom-0 w-[900%] lg:w-full max-w-max lg:max-w-full"
                :src="$page.props.storage_url + cms?.section1_footer" 
                alt="footer"
                loading="lazy"
                decoding="async"
            >
        </section>
        <section class="bg-[#11CEBB] relative gaming-frame2">
            <div class="max-w-[1440px] m-auto px-4 lg:px-20 flex items-center lg:flex-row flex-col lg:space-x-20 py-16 lg:py-20 w-full lg:space-y-0 space-y-8">
                <div class="lg:w-[540px] fadeIn">
                    <img 
                        class="w-full"
                        :src="$page.props.storage_url + cms?.section2_image" 
                        alt="iceberg"
                        loading="lazy"
                        decoding="async"
                    >
                </div>
                <div class="w-full lg:w-[calc(100%-620px)]">
                    <div class="text-white text-4xl lg:text-[3rem] leading-tight gaming-highlight ck-editor mb-4 reveal-type" v-html="cms?.section2_header"></div>
                    <p class="text-white animateUp">{{cms?.section2_content}}</p>
                </div>
            </div>
        </section>
        <section class="relative">
            <div class="max-w-[1440px] m-auto px-4 lg:px-20 pt-16 lg:pt-20 pb-[154px]">
                <div class="grid grid-cols-1 lg:grid-cols-6 gap-3 lg:gap-10 w-full">
                    <div class="flex items-center gaming-frame3-element">
                        <div class="text-4xl lg:text-[3rem] leading-tight gaming-highlight ck-editor mb-3 reveal-type" v-html="cms?.section3_header"></div>
                    </div>
                    <div 
                        v-for="solution in cms?.section3_items" 
                        class="p-8 rounded-lg bg-[#2D4959] text-white space-y-2.5 flex flex-col justify-start animateUp gaming-frame3-element generic-hover" 
                    >
                        <div class="w-24 h-24 relative">
                            <img
                                class="w-full h-full object-contain" 
                                :src="$page.props.storage_url + solution?.logo" 
                                alt="icon"
                                loading="lazy"
                                decoding="async"
                            >
                        </div>
                        <p class="font-semibold text-2xl">{{ solution?.title }}</p>
                        <p>{{ solution?.content }}</p>
                    </div>
                </div>
            </div>
            <img 
                class="absolute bottom-0 w-[900%] lg:w-full max-w-max lg:max-w-full"
                :src="$page.props.storage_url + cms?.section3_footer" 
                alt="footer"
                loading="lazy"
                decoding="async"
            >
        </section>
        <section class="bg-[#11CEBB] relative">
            <div class="max-w-[1440px] m-auto px-4 lg:px-20 py-16 lg:py-20 flex space-x-0 lg:flex-row flex-col lg:space-x-20">
                <div class="w-full lg:w-1/2 lg:order-1 order-2">
                    <div class="text-white text-4xl lg:text-[3rem] leading-tight gaming-highlight ck-editor mb-6 lg:mb-12 reveal-type lg:text-left text-center" v-html="cms?.section4_header"></div>
                    <div class="space-y-4">
                        <div v-for="expectation in cms?.section4_items" class="radial-card5 rounded-lg animateUp generic-hover">
                            <div class="flex space-x-4 bg-[#146a68] p-6 rounded-lg relative z-[10]">
                                <div class="w-11 h-11 bg-primary-700 flex items-center rounded-full justify-center">
                                    <img 
                                        class="w-6 h-6 group-hover/benefit:scale-125 transition" 
                                        :src="$page.props.storage_url + expectation?.logo" 
                                        alt="icon"
                                    >
                                </div>
                                <div class="w-[calc(100%-60px)] text-white">
                                    <p class="font-semibold text-lg mb-4">{{ expectation.title  }}</p>
                                    <p class="opacity-[0.65]">{{expectation.content}}</p>
                                </div>
                            </div>
                            <div class="radial-bg"></div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 relative block order-1 lg:order-2">
                    <img 
                        class="w-full lg:sticky lg:top-20"
                        :src="$page.props.storage_url + cms?.section4_image" 
                        alt="gaming"
                        loading="lazy"
                        decoding="async"
                    >
                </div>
            </div>
        </section>
        <section>
            <div class="flex items-center lg:flex-row flex-col">
                <div class="w-full lg:w-1/2 h-full bg-white">
                    <img 
                        class="w-full h-full object-cover" 
                        :src="$page.props.storage_url + cms?.section5_image" 
                        alt="gaming"
                        loading="lazy"
                        decoding="async"
                    >
                </div>
                <div class="w-full lg:w-1/2 px-4 lg:px-20 py-6 lg:py-[100px]">
                    <p class="text-5xl font-bold mb-6 animateUp" v-html="cms?.section5_header"></p>
                    <div class="text-lg mb-12 animateUp">
                        <p>{{ cms?.section5_content }}</p>
                    </div>
                    <a href="/#contact-us">
                        <v-button class="animateUp" design-color="text-white">
                            Outsource with Us
                        </v-button>
                    </a>
                </div>
            </div>
        </section>
        <section class="relative z-1 overflow-hidden">
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
                    custom-class="!bg-[#2D4959]"
                    design-color="!text-[#2D4959]"
                    :title="cms?.section6_title "
                    :description="cms?.section6_content"
                />
            </div>
        </section>
    </user-layout>
</template>
<script lang="ts" setup>
import FrameOne from './Components/GamingFrameOne.vue';
const props = defineProps({
    cms: {
        type: Object
    },
})
</script>