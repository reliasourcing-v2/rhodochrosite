<template>
    <div>
        <a :href="item.link">
            <div class="p-8 bg-primary-100 rounded-2xl min-h-[297px] h-[297px] relative group/service hover:bg-primary-500 transition duration-500 cursor-pointer hover:-translate-y-3 hover:shadow-lg">
                <div class="flex justify-between space-x-10">
                    <div class="max-w-[237px]">
                        <p class="text-xl font-bold mb-2 group-hover/service:text-white transition">{{ item.title }}</p>
                        <p class="text-primary-700 group-hover/service:text-white transition">{{ item.content }}</p>
                    </div>
                    <div>
                        <svg class="text-primary-900 group-hover/service:text-white transition" width="32" height="32" viewBox="0 0 32 32" fill="currentColor">
                            <path d="M21.6569 10.9899L21.6569 9.98986L22.6569 9.98986L22.6569 10.9899L21.6569 10.9899ZM11.9498 22.1111C11.5593 22.5017 10.9261 22.5017 10.5356 22.1111C10.1451 21.7206 10.1451 21.0875 10.5356 20.6969L11.9498 22.1111ZM10.3431 9.98986L21.6569 9.98986L21.6569 11.9899L10.3431 11.9899L10.3431 9.98986ZM22.6569 10.9899L22.6569 22.3036L20.6569 22.3036L20.6569 10.9899L22.6569 10.9899ZM22.364 11.697L11.9498 22.1111L10.5356 20.6969L20.9497 10.2828L22.364 11.697Z"/>
                        </svg>
                    </div>
                </div>
                <div class="absolute bottom-0 right-0">
                    <img 
                        class="w-[152px]" 
                        :src="$page.props.storage_url + item.image" 
                        :alt="item.title"
                        loading="lazy"
                        decoding="async"
                    >
                </div>
            </div>
        </a>
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