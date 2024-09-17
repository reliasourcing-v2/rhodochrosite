<template>
    <user-layout custom-class="!bg-[#04193C]">
        <section class="relative bg-[#04193C]">
            <div class="px-4 lg:px-20 pt-[141px] lg:pt-[165px] lg:absolute lg:top-0 lg:left-0 z-[2] lg:bg-transparent bg-[#04193C]">
                <div class="w-full lg:w-[70vw] text-white">
                    <h1 class="text-5xl leading-tight lg:text-[5vw] lg:leading-[4.5vw] mb-4 ck-content finance-highlight text-[#10B8AD]">
                        <p>
                            {{cms?.section1_uppertext}}<br>
                            <strong :data-shadow=cms?.section1_middletext>{{cms?.section1_middletext}}</strong>
                            <br>{{cms?.section1_lowertext}}
                        </p>
                    </h1>
                    <div class="lg:max-w-[42vw] mb-8 lg:mb-12">
                        <p class="text-base lg:text-[1.2vw] lg:leading-relaxed">{{ cms?.section1_content }}</p>
                    </div>
                </div>
            </div>
            <frame-one class="lg:w-full w-[200%] relative right-[100%] lg:right-0" />
        </section>
        <div class="bg-[#04193C]">
            <section class="bg-[#051125] relative saas-frame2 rounded-t-[2.25rem]">
                <div class="max-w-[1440px] m-auto px-4 lg:px-20 flex lg:flex-row flex-col items-center space-x-0 lg:space-x-20 py-16 lg:py-20 w-full">
                    <div class="w-full lg:w-[540px]">
                        <img 
                            class="w-full"
                            :src="$page.props.storage_url + cms?.section2_image" 
                            alt="finance"
                            loading="lazy"
                            decoding="async"
                        >
                    </div>
                    <div class="w-full lg:w-[calc(100%-620px)]">
                        <div class="text-white text-3xl leading-tight lg:text-[2.2vw] lg:leading-[3vw] finance-highlight ck-editor mb-4 reveal-type" v-html="cms?.section2_header"></div>
                        <p class="text-white reveal-type font-base">{{ cms?.section2_content }}</p>
                    </div>
                </div>
            </section>
        </div>
        <section class="bg-[#04193C]">
            <div class="max-w-[1440px] m-auto px-4 lg:px-20 py-16 lg:py-20">
                <div class="text-white text-3xl leading-tight lg:text-[1.7vw] lg:leading-[2.5vw] finance-highlight ck-editor mb-16 text-center reveal-type" v-html="cms?.section3_header"></div>
                <div class="max-w-[1000px] m-auto grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-11">
                    <div class="radial-card1 relative rounded-xl animateUp generic-hover"
                        v-for="i in cms?.section3_items" 
                    >
                        <div 
                            class="p-8 rounded-xl bg-[#051d42] text-white space-y-2.5 flex flex-col justify-end h-full z-[10] relative"
                        >
                            <div class="w-24 h-24 relative">
                                <img
                                    class="w-full h-full object-contain" 
                                    :src="$page.props.storage_url + i.image" 
                                    alt="icon"
                                    loading="lazy"
                                    decoding="async"
                                >
                            </div>
                            <p class="font-semibold text-2xl text-[#51D2CA]">{{i.title}}</p>
                            <div class="content">
                                <p>{{ i.content }}</p>
                            </div>
                        </div>
                        <div class="radial-bg rounded-xl"></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-[#051125] finance-frame">
            <div class="xl:max-w-[1440px] xl:m-auto">
                <div class="m-auto lg:px-20 lg:pt-20 px-4 pt-16">
                    <div class="text-white text-3xl leading-tight lg:text-[2.3vw] lg:leading-[2.5vw] finance-highlight ck-editor mb-6 lg:mb-20 reveal-type" v-html="cms?.section4_header"></div>
                </div>
                <div class="animateUp lg:block hidden">
                    <finance-slider :items="cms?.section4_items"/>
                </div>
                <div class="space-y-4 px-4 lg:hidden block pb-16">
                    <div v-for="item in cms?.section4_items" class="radial-card2 relative rounded-xl generic-hover">
                        <div 
                            class="p-8 rounded-xl text-white space-y-2.5 flex flex-col bg-[#051125] z-[10] relative" 
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
                            <p class="font-semibold text-xl text-[#51D2CA]">{{ item.title }}</p>
                            <div>
                                <p>{{ item.content }}</p>
                            </div>
                        </div>
                        <div class="radial-bg"></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-[#04193C]">
            <div class="flex items-center lg:flex-row flex-col">
                <div class="w-full lg:w-1/2 h-full bg-white">
                    <img 
                        class="w-full h-full object-cover" 
                        :src="$page.props.storage_url + cms?.section5_image" 
                        alt="finance"
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
        <section class="relative z-1 bg-[#051125] overflow-hidden">
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
                    custom-class="!bg-[#000A2F]"
                    :title="cms?.section6_title"
                    :description="cms?.section6_content"
                />
            </div>
        </section>
    </user-layout>
</template>
<script lang="ts" setup>
import FrameOne from './Components/FinanceFrameOne.vue';
import FinanceSlider from './Components/FinanceSlider.vue';

const props = defineProps({
    cms: {
        type: Object
    }
})

</script>