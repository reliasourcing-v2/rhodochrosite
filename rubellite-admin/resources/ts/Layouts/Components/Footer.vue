<template>
    <footer class="bg-primary-900">
        <div class="px-4 lg:px-20 pb-7 pt-16 lg:py-16 flex lg:flex-row flex-col lg:justify-between">
            <div class="lg:max-w-[373px]">
                <div class="py-3 mb-2">
                    <a href="/">
                        <img 
                            class="w-[250px] lg:w-[260px]" 
                            :src="$page.props.storage_url + footer.section1_logo" 
                            alt="footer-logo"
                            loading="lazy"
                            decoding="async"
                        >
                    </a>
                </div>
                <p class="text-white leading-5 mb-8">{{ footer?.section1_address }}</p>
                <div class="flex items-center space-x-6 mb-12 lg:mb-0">
                    <img 
                        v-for="accreditation in footer.section1_accreditation"
                        class="h-[40px] lg:h-[50px] w-fit"
                        :src="$page.props.storage_url + accreditation.logo" 
                        alt="icon"
                        loading="lazy"
                        decoding="async"
                    >
                </div>
            </div>
            <div class="max-w-[780px] w-full grid grid-cols-1 lg:grid-cols-4 gap-12 lg:gap-16 text-white text-sm">
                <div class="space-y-3">
                    <p class="font-bold text-base">Solutions</p>
                    <div><a class="hover:text-primary-600 transition" href="/pages/solutions/contact-center">Contact Center</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/pages/solutions/managed-services">Managed Services</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/pages/solutions/staff-leasing">Staff Leasing</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/pages/solutions/workforce-management">Workforce Management</a></div>
                </div>
                <div class="space-y-3">
                    <p class="font-bold text-base">Specializations</p>
                    <div><a class="hover:text-primary-600 transition" href="/pages/specialization/creative-services">Creative Services</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/pages/specialization/sales-and-customer-support">Sales and Customer Support</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/pages/specialization/sales-and-customer-support/sales-development-services">Sales Development Services</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/pages/specialization/sales-and-customer-support/customer-success-services">Customer Success Services</a></div>
                </div>
                <div class="space-y-3">
                    <p class="font-bold text-base">Industries</p>
                    <div><a class="hover:text-primary-600 transition" href="/industries/gaming">Entertainment & Gaming</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/industries/saas">Product & SaaS</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/industries/e-commerce">E-Commerce</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/industries/finance">Finance</a></div>
                </div>
                <div class="space-y-3">
                    <p class="font-bold text-base">Others</p>
                    <div><a class="hover:text-primary-600 transition" href="/resources">Resources</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/pages/about-us/our-advantages">About Us</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/careers">Careers</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/contact-us">Contact Us</a></div>
                </div>
            </div>
        </div>
        <div class="px-4 pt-4 pb-12 lg:px-20 lg:py-12 flex lg:flex-row flex-col lg:items-center justify-between text-white text-sm lg:text-base lg:space-y-0 space-y-6">
            <div class="flex lg:items-center lg:space-x-16 lg:flex-row flex-col lg:space-y-0 space-y-6">
                <p>{{ footer?.section1_copyright }}</p>
                <div class="flex items-start lg:items-center space-x-4 lg:w-auto w-fit">
                    <a class="hover:text-primary-600 transition" href="/privacy-policy">Privacy Policy</a>
                    <a class="hover:text-primary-600 transition" href="/terms-and-conditions">Terms</a>
                </div>
            </div>
            <div class="flex items-center space-x-3.5">
                <a 
                    v-for="social in footer?.section2_social_accounts"
                    :href="social.link"
                    target="_blank"
                    rel="noreferrer"
                >
                    <img 
                        class="w-5" 
                        :src="$page.props.storage_url + social.icon" 
                        alt="icon"
                        loading="lazy"
                        decoding="async"
                    >
                </a>
            </div>
        </div>
    </footer>
</template>


<script setup lang="ts">
import { ref } from 'vue';
defineProps({
    footer: {
        type: Object
    }
})


</script>