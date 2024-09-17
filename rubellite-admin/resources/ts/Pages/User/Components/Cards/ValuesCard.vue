<template>
    <div class="text-center values-card">
        <div class="img-cntnr">
            <img 
                class="m-auto mb-6 values-image scaleUp"
                :src="$page.props.storage_url + item.image" 
                alt="icon"
                loading="lazy"
                decoding="async"
                width="96"
                height="96"
            >
        </div>
        <p class="font-bold text-xl mb-2">{{ item.title }}</p>
        <p>{{ item.content }}</p>
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