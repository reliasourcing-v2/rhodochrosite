<template>
    <div class="bg-primary-900 p-8 text-white rounded-2xl group/special hover:-translate-y-3 transition hover:shadow-lg duration-500">
        <div class="scaleUp w-fit">
            <img 
                class="w-24 mb-6 group-hover/special:scale-125 transition duration-500" 
                :src="$page.props.storage_url + item.image" 
                alt="icon"
                loading="lazy"
                decoding="async"
            >
        </div>
        <p class="font-bold text-xl mb-2">{{ item.title }}</p>
        <div class="leading-5" v-html="item.content" />
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