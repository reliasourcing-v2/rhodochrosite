<template>
    <section class="bg-primary-50">
        <div class="max-w-[1440px] m-auto px-4 lg:px-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-8 direction-rtl">
                <benefit-card 
                    v-for="item in items"
                    :class="items.length % 2 == 0 ? '' : 'lg:even:translate-y-[127px]'"
                    class="benefit-card"
                    :item="item"
                />
            </div>
        </div>
    </section>
</template>
<script lang="ts" setup>
defineProps({
    items: {
        type: Object,
        default: () => ({})
    }
})
</script>