<template>
    <div>
        <div class="animateUp h-full">
            <div class="p-6 lg:p-8 h-full bg-white rounded-2xl text-left flex flex-col group/benefit hover:-translate-y-3 hover:shadow-lg duration-300 transition">
                <div class="flex items-center mb-6 mr-auto">
                    <div class="w-14 h-14 bg-primary-700 rounded-full flex items-center justify-center mr-4">
                        <img 
                            class="w-6 h-6 group-hover/benefit:scale-125 transition" 
                            :src="$page.props.storage_url + item.image" 
                            alt="icon"
                            loading="lazy"
                            decoding="async"
                        >
                    </div>
                    <p class="w-[calc(100%-72px)] text-xl font-bold transition">{{  item.title }}</p>
                </div>
                <div class="leading-6 transition" v-html="item.content" />
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>
defineProps({
    item: {
        type: Object,
        default: () => ({})
    }
})
</script>