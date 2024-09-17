<template>
    <section class="bg-primary-900">
        <div class="max-w-[1440px] m-auto px-4 pt-[100px] pb-[265px] lg:pl-32 lg:pr-20 lg:py-[100px] flex lg:flex-row flex-col items-center justify-between">
            <img 
                class="lg:max-w-[300px] banner-image object-contain min-h-[434px]" 
                :src="item.image" 
                alt="banner-image"
            >
            <div class="max-w-[755px] w-full text-banner">
                <h1 class="font-bold text-white mb-8 text-h1" v-html="item.title" />
                <a @click.prevent="handleContactClick" href="/contact-us/#contact-form">
                    <v-button>
                        Inquire Now
                    </v-button>
                </a>
            </div>
        </div>
    </section>
</template>
<script lang="ts" setup>
import { router } from '@inertiajs/vue3'
defineProps({
    item: {
        type: Object,
        default: () => ({})
    }
})

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
</script>