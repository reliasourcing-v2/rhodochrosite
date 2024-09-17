<template>
    <section class="bg-primary-50 lg:h-auto min-h-[150px]">
            <div id="offset-cntnr" class="max-w-[1440px] m-auto px-4 lg:px-20">
                <div id="element" class="flex lg:space-y-0 space-y-6 lg:flex-row flex-col lg:space-x-10 p-6 lg:p-12 bg-white rounded-2xl -translate-y-[200px] lg:-translate-y-16 relative z-[2]" :class="item.customClass">
                    <div class="w-full lg:w-5/12 font-semibold lg:font-bold" v-html="item.title"/>
                    <div class="w-full lg:w-7/12" v-html="item.description" />
                </div>
            </div>
        </section>
</template>
<script lang="ts" setup>
import { onMounted } from 'vue';
defineProps({
    item: {
        type: Object,
        default: () => ({})
    }
})


onMounted(()=>{
    const mediaQuery = window.matchMedia('(max-width: 1024px)')
    if (mediaQuery.matches) {
        const element = document.getElementById("element");
        document.getElementById("offset-cntnr").style.height = element.offsetHeight - 150 + 'px';
    }
}) 
</script>