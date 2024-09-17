<template>
    <div class="md:grid md:grid-cols-12 md:gap-6">
        <jet-section-title>
            <template #title><slot name="title"></slot></template>
            <template #description><slot name="description"></slot></template>
        </jet-section-title>

        <div class="col-span-full mt-5 md:mt-0 md:col-span-7">
            <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
                <slot name="content"></slot>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import JetSectionTitle from "@/Components/Partials/JetSectionTitle.vue";

</script>
