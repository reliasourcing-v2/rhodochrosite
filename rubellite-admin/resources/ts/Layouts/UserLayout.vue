<template>
    <div>
        <Header 
        :header="header"
        :parent_pages="parent_pages"
        :custom-class="customClass"
        />
        
        <slot />

        <Footer
        :footer="footer"
        />
    </div>
</template>

<script setup lang="ts">
import { onMounted, computed, defineAsyncComponent } from "vue";
import { usePage } from "@inertiajs/vue3";

import Lenis from '@studio-freight/lenis';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import SplitType from 'split-type';

const Header = defineAsyncComponent(() => import('./Components/Header.vue'));
const Footer = defineAsyncComponent(() => import('./Components/Footer.vue'));

gsap.registerPlugin(ScrollTrigger);

defineProps({
    seoTitle: {
        type: String,
        default: 'Home'
    },
    seoDescription: {
        type: String
    },
    seoImage: {
        type: String
    },
    seoKeywords: {
        type: String
    },
    customClass: {
        type: String
    }
})


const header = computed(() => usePage().props.cms_header);
const footer = computed(() => usePage().props.cms_footer);
const parent_pages = computed(() => usePage().props.parent_pages);

const lenis = new Lenis({
    duration: 1.5
})

function raf(time) {
    lenis.raf(time)
    requestAnimationFrame(raf)
}

requestAnimationFrame(raf)

onMounted(() => {
    // fetchLayout();
    setTimeout(() => {
        const animateUp = gsap.utils.toArray('.animateUp');
        animateUp.forEach(grow => {
            gsap.from(grow, {
                scrollTrigger: {
                    trigger: grow,
                    start: 'bottom 100%',
                },
                y: 20,
                opacity: 0,
                duration: 2,
                ease: "Expo.easeOut",
            });
        });

        const showLeft = gsap.utils.toArray('.showLeft');
        showLeft.forEach(grow => {
            gsap.from(grow, {
                scrollTrigger: {
                    trigger: grow,
                    start: 'bottom 100%',
                },
                x: -40,
                opacity: 0,
                duration: 2,
                ease: "Expo.easeOut",
            });
        });

        const scaleUp = gsap.utils.toArray('.scaleUp');
        scaleUp.forEach(grow => {
            gsap.from(grow, {
                scrollTrigger: {
                    trigger: grow,
                    start: 'bottom 100%',
                },
                scale: 0,
                opacity: 0,
                duration: 2,
                ease: "Expo.easeOut",
            });
        });

        const fadeIn = gsap.utils.toArray('.fadeIn');
        fadeIn.forEach(grow => {
            gsap.from(grow, {
                scrollTrigger: {
                    trigger: grow,
                    start: 'bottom 100%',
                },
                opacity: 0,
                duration: 2,
                ease: "Expo.easeOut",
            });
        });

        const splitTypes = document.querySelectorAll('.reveal-type')

        splitTypes.forEach((word,i) => {

            const text = new SplitType(word, { types: 'words'})

            gsap.from(text.words, {
                scrollTrigger: {
                    trigger: word,
                    start: 'top 80%',
                    end: 'top 20%',
                    scrub: true,
                    markers: false,
                },
                opacity: .2,
                color: '#a1a1a1',
                stagger: 0.1
            })
        })
        
        const wordSplit = document.querySelectorAll('.word-split')

        wordSplit.forEach((word,i) => {

            const text = new SplitType(word, { types: 'words'})

            gsap.from(text.words, {
                scrollTrigger: {
                    trigger: word,
                    start: 'top 80%',
                    end: 'top 50%',
                    scrub: true,
                    markers: false,
                },
                opacity: .2,
                color: '#a1a1a1',
                stagger: 0.1
            })
        })

    }, 500)
    
})
</script>