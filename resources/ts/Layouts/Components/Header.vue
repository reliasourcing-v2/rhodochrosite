<template>
    <header 
        ref="headRef" 
        class="w-full fixed top-0 left-0 z-[90] transition"
        :class="[headerScroll ? '!bg-white shadow-md' : 'bg-primary-900', customClass]"
    >
        <div class="px-4 lg:px-4 xl:px-20 mx-auto lg:py-4 flex items-center justify-between transition header-wrapper" :class="headerScroll ? 'py-2' : 'py-6'">
            <div class="hdr-logo lg:w-auto">
                <a href="/">
                    <img 
                        :src="$page.props.storage_url + header.section1_logo" 
                        alt="logo"
                        class="lg:h-[68px] max-w-full mx-auto transition duration-700 header-logo"
                        :class="headerScroll ? 'h-[64px]' : 'brightness-0 invert h-[61px]'"
                        async
                    > 
                </a>
            </div>
            <div @click="toggleMenu" class="hamburger-menu pr-3 lg:hidden" :class="menuOpen ? 'active' : ''">
                <div class="bar" :class="headerScroll ? 'scroll' : ''"></div>
            </div>
            <div
                class="lg:flex items-center font-medium lg:space-y-0 space-y-6 lg:space-x-4 xl:space-x-8 transition lg:relative fixed nav-menu lg:top-auto"
                :class="[
                    headerScroll ? 'text-primary-900 top-[80px] scroll' : 'lg:text-white top-[109px]',
                    menuOpen ? 'translate-x-0' : 'translate-x-[110%] lg:translate-x-0'
                ]"
            >
                <div 
                v-for="parent_page in parent_pages"
                :key="parent_page.id"
                class="relative group-hover text-sm">
                    <div class="flex items-center space-x-1 hover:text-primary-600 cursor-pointer transition lg:w-fit w-full lg:justify-normal justify-between">
                        <a 
                        :href="parent_page.sub_pages.length == 0 ? route('web.pages.parent-page', {
                            parentPage: parent_page.slug
                        }) : '#'">
                            {{ parent_page.title }}
                        </a>
                        <svg 
                        v-if="parent_page.sub_pages.length > 0 || parent_page.title === 'Industries'"
                        class="rotate-180 lg:rotate-0" width="16" height="16" viewBox="0 0 16 16" fill="transparent" stroke="currentColor">
                            <path d="M12 6L8 10L4 6" stroke-width="2"/>
                        </svg>
                    </div>
                    <div 
                    v-if="parent_page.sub_pages.length > 0"
                    class="bg-white px-6 py-4 text-sm text-black flex flex-col space-y-4 min-w-[220px] rounded-b-xl lg:shadow-md absolute top-[40px] left-0 hover-child">
                        <template v-for="sub_page in parent_page.sub_pages">
                            <div 
                            v-if="sub_page.child_pages.length > 0"
                            class="relative group-hover2">
                                <div class="flex items-center space-x-2.5 hover:text-primary-600 transition lg:justify-normal justify-between">
                                    <p class="whitespace-nowrap">{{ sub_page.title }}</p>
                                    <div>
                                        <svg class="lg:block hidden" width="24" height="24" viewBox="0 0 24 24" fill="transparent" stroke="currentColor">
                                            <path d="M9 6L15 12L9 18" stroke-width="2"/>
                                        </svg>
                                        <svg class="lg:hidden block rotate-180 lg:rotate-0" width="16" height="16" viewBox="0 0 16 16" fill="transparent" stroke="currentColor">
                                            <path d="M12 6L8 10L4 6" stroke-width="2"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="bg-white px-6 py-4 text-sm text-black flex flex-col space-y-4 min-w-[275px] rounded-b-xl lg:shadow-md absolute -top-1 left-[calc(100%+24px)] hover-child2">
                                    <a 
                                    v-for="child_page in sub_page.child_pages"
                                    class="hover:text-primary-600 transition" 
                                    :href="route('web.pages.child-page', {
                                        parentPage: parent_page.slug,
                                        subPage: sub_page.slug,
                                        childPage: child_page.slug
                                    })">
                                        {{ child_page.title }}
                                    </a>
                                </div>
                            </div>
                            <a 
                            v-else
                            class="hover:text-primary-600 transition" 
                            :href="route('web.pages.sub-page', {
                                parentPage: parent_page.slug,
                                subPage: sub_page.slug
                            })">
                                {{ sub_page.title }}
                            </a>
                        </template>    
                    </div>
                    <div v-if="parent_page.title === 'Industries'" class="bg-white px-6 py-4 text-sm text-black flex flex-col space-y-4 min-w-[250px] rounded-b-xl lg:shadow-md absolute top-[40px] left-0 hover-child">
                        <a 
                            class="hover:text-primary-600 transition" 
                            :href="route('web.pages.gaming')"
                        >
                            Gaming and Entertainment
                        </a>
                        <a 
                            class="hover:text-primary-600 transition" 
                            :href="route('web.pages.saas')"
                        >
                            SaaS
                        </a>
                        <a 
                            class="hover:text-primary-600 transition" 
                            :href="route('web.pages.ecommerce')"
                        >
                            E-Commerce
                        </a>
                        <a 
                            class="hover:text-primary-600 transition" 
                            :href="route('web.pages.finance')"
                        >
                            Finance
                        </a>
                    </div>
                </div>
                <div class="relative group-hover text-sm">
                    <div class="flex items-center space-x-1 hover:text-primary-600 cursor-pointer transition lg:w-fit w-full lg:justify-normal justify-between">
                        <a :href="route('web.resources.index')">
                            Resources
                        </a>
                    </div>
                </div>
                <div class="relative group-hover text-sm">
                    <div class="flex items-center space-x-1 hover:text-primary-600 cursor-pointer transition lg:w-fit w-full lg:justify-normal justify-between">
                        <a :href="route('web.pages.careers')">
                            Careers
                        </a>
                    </div>
                </div>
                <div class="relative group-hover text-sm">
                    <div class="flex items-center space-x-1 hover:text-primary-600 cursor-pointer transition lg:w-fit w-full lg:justify-normal justify-between">
                        <a :href="route('web.pages.calculator')">
                            Calculator
                        </a>
                    </div>
                </div>
                <div>
                    <div class="button-header px-5 py-4 lg:px-0 lg:py-0 text-sm">
                        <a @click.prevent="handleContactClick" href="/contact-us/#contact-form">
                            <v-button custom-class="w-full lg:w-auto" v-if="headerScroll ? '': 'hidden'" size="md">Contact Us</v-button>
                            <v-button custom-class="w-full lg:w-auto" v-if="headerScroll ? 'hidden': ''" size="md" design-color="text-white">Contact Us</v-button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>


<script setup lang="ts">
import { onMounted, ref, computed } from 'vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
    header: {
        type: Object
    },
    parent_pages: {
        type: Object
    },
    customClass: {
        type: String
    }
})

const headerAnimation = ref(false);

const menuOpen = ref(false);
const toggleMenu = () => {
    menuOpen.value = !menuOpen.value;
}

const headRef = ref<any>(null);
const headerScroll = ref(false);

const handleContactClick = () => {
    if (window.location.pathname === '/contact-us') {
        const contactForm = document.getElementById('contact-form');
        if (contactForm) {
            contactForm.scrollIntoView({ behavior: 'smooth' });
        }
    } else {
        router.visit('/contact-us', { 
            preserveState: true,
            preserveScroll: true,
            onSuccess: () => {
                setTimeout(() => {
                    const contactForm = document.getElementById('contact-form');
                    if (contactForm) {
                        contactForm.scrollIntoView({ behavior: 'smooth' });
                    }
                }, 100);
            }
        });
    }
}

onMounted(() => {
	var prev = window.pageYOffset;
	window.addEventListener("scroll", () => {
		var curr = window.pageYOffset;
		if (prev < 200) {
            headerScroll.value = false
			
		} else {
            headerScroll.value = true
		}
		prev = curr;
	});

    setTimeout(() => {
        headerAnimation.value = true;
    }, 4000)

    
});


</script>