<template>
    <div class="offer-card">
        <div 
            class="p-8 rounded-2xl h-full min-h-[358px] overflow-hidden relative group/offer hover:-translate-y-3 transition hover:shadow-lg duration-500 wrapper"
            :class="item.accent ? 'bg-primary-500 text-white' : 'bg-white'"
        >
            <div class="text-cntnr w-[80%]">
                <p class="mb-2 font-bold text-lg">{{ item.title }}</p>
                <div v-html="item.content" />
            </div>
            <img 
                class="w-[152px] absolute bottom-0 right-0 transition duration-500 group-hover/offer:scale-110" 
                :src="$page.props.storage_url + item.image" 
                alt="icon"
                loading="lazy"
                decoding="async"
            >
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