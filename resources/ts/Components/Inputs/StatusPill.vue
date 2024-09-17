<template>
    <div class="w-fit px-2 py-[2px] rounded-xl" :class="customClass">
        <p
            class="text-xs font-bold"
            :class="[textColor, nowrap ? 'whitespace-nowrap' : '']"
        >
            {{ text }}
        </p>
    </div>
</template>

<script setup lang="ts">
defineProps({
    customClass: {
        type: String,
        default: "black",
    },
    text: {
        type: String,
        required: true,
    },
    textColor: {
        type: String,
        default: "white",
    },
    nowrap: {
        type: Boolean,
        default: true,
    },
})
</script>
