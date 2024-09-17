<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <div v-if="items.total > 10">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <selector
                    :options="options"
                    :modelValue="rows"
                    @update:modelValue="updatePagination"
                    id="pagination-id"
                    name="pagination-name"
                    class="w-[auto] mr-4"
                    placeholder="10 Rows"
                    topOptions
                />

                <p class="text-sm text-gray-500">
                    Showing
                    {{ " " }}
                    <span class="text-gray-900">{{ items.from }}</span>
                    {{ " " }}
                    to
                    {{ " " }}
                    <span class="text-gray-900">{{ items.to }}</span>
                    {{ " " }}
                    of
                    {{ " " }}
                    <span class="text-gray-900">{{ items.total }}</span>
                    {{ " " }}
                    results
                </p>
            </div>
            <div class="relative flex -space-x-px">
                <template v-for="(link, key) in items.links" :key="link">
                    <template v-if="key === 0">
                        <a
                            v-if="key === 0"
                            :href="link.url ?? '#'"
                            class="relative inline-flex items-center justify-center w-11 h-11 border border-gray-100 bg-white text-gray-500 hover:bg-gray-50 rounded-l-lg"
                            >
                            <span class="sr-only">Previous</span>
                            <ChevronLeftIcon class="h-4 w-4" aria-hidden="true" />
                        </a>
                    </template>
                    
                    <template v-else-if="key === items.links.length - 1">
                        <a
                            :href="link.url ?? '#'"
                            class="relative inline-flex items-center justify-center w-11 h-11 border border-gray-100 bg-white text-gray-500 hover:bg-gray-50 rounded-r-lg"
                        >
                            <span class="sr-only">Next</span>
                            <ChevronRightIcon class="h-4 w-4" aria-hidden="true" />
                        </a>
                    </template>

                    <a
                        v-else
                        :href="link.url ?? '#'"
                        aria-current="page"
                        class="relative inline-flex items-center justify-center border border-gray-100 w-11 py-2 text-sm"
                        :class="
                            link.active
                                ? 'bg-primary-50 text-primary-600'
                                : 'bg-white text-gray-500'
                        "
                    >
                        {{ link.label }}
                    </a>
                </template>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { router } from "@inertiajs/vue3";
import { ref } from "vue";

import { 
    ChevronLeftIcon, 
    ChevronRightIcon, 
} from "@heroicons/vue/24/solid";

const props = defineProps({
    items: {
        type: Object
    },
    rows: {
        type: Number,
        default: 10,
    },
})

const rows = ref(props.rows);

const options = [
    {
        id: 5,
        value: "5 Rows",
    },
    {
        id: 25,
        value: "25 Rows",
    },
    {
        id: 50,
        value: "50 Rows",
    },
    {
        id: 100,
        value: "100 Rows",
    },
];

const updatePagination = (value) => {
    const params = route().params;
    const data = params;

    if (value) {
        data.rows = value;
    } else {
        delete params.rows;
    }

    if (params.page) {
        delete params.page;
    }

    router.replace(route(route().current(), params), {
        data: data,
        replace: false,
        preserveState: true,
        preserveScroll: true,
    });

    rows.value = value;
};
</script>
