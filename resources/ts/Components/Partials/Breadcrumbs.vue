<template>
    <div class="flex items-center space-x-4">
        <div v-for="(page, index) in pages" :key="page.name">
            <div class="flex items-center">
                <ChevronRightIcon
                    v-if="parseInt(index) != 0"
                    class="flex-shrink-0 h-4 w-4 mr-4 text-primary-600 stroke-2 stroke-primary-500"
                    aria-hidden="true"
                />
                <a
                    @click="router.visit(page.href)"
                    class="text-sm text-gray-500 hover:text-gray-700 cursor-pointer"
                    :aria-current="page.current ? 'page' : undefined"
                    >{{ page.name }}
                </a>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ChevronRightIcon } from "@heroicons/vue/24/solid";
import { router } from "@inertiajs/vue3";

defineProps({
    pages: {
        type: Object,
    },
})
</script>
