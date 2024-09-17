<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <div v-if="items.total > min">
        <div class="flex items-center space-x-1.5">
            <template v-for="(link, key) in items.links" :key="link">
                <template v-if="key === 0">
                    <a
                        v-if="key === 0"
                        :href="link.url ?? '#'"
                        @click.prevent="visit(link.url ?? '#')"
                        :disabled="!items.prev_page_url"
                    >
                        <span class="sr-only">Previous</span>
                        <ChevronLeftIcon
                            class="w-5 h-5"
                            :class="{ 'text-primary-500': !items.prev_page_url }"
                            aria-hidden="true"
                        />
                    </a>
                </template>

                <template v-else-if="key === items.links.length - 1">
                    <a
                        :href="link.url ?? '#'"
                        @click.prevent="visit(link.url ?? '#')"
                        :disabled="!items.next_page_url"
                    >
                        <span class="sr-only">Next</span>
                        <ChevronRightIcon
                            class="h-5 w-5"
                            :class="{ 'text-primary-500': !items.next_page_url }"
                            aria-hidden="true"
                        />
                    </a>
                </template>

                <a
                    v-else
                    :href="link.url ?? '#'"
                    @click.prevent="visit(link.url ?? '#')"
                    aria-current="page"
                    class="w-8 h-8 flex items-center justify-center text-sm font-semibold"
                    :class="link.active ? 'bg-primary-800 text-white' : ''"
                >
                    {{ link.label }}
                </a>
            </template>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ChevronLeftIcon, ChevronRightIcon } from "@heroicons/vue/24/solid";
import { router } from "@inertiajs/vue3";

/*--------------*
 * PROPS
 *--------------*/
defineProps({
    items: {
        type: Object,
    },
    min: {
        type: Number,
        default: 2,
    },
});

/*--------------*
 * METHODS
 *--------------*/
const visit = (url: string) => {
    router.visit(url, {
        preserveState: true,
        preserveScroll: true,
        replace: true,
    });
};
</script>
