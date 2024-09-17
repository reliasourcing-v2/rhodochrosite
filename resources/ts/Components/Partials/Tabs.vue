<template>
    <div class="">
        <div class="border-b border-gray-200 flex justify-between">
            <nav class="-mb-px flex space-x-2 px-12 py-2" aria-label="Tabs">
                <a
                    v-for="tab in tabs"
                    :key="tab.name"
                    :href="tab.value ?? ''"
                    @click.prevent="selectTab(tab.value)"
                    :class="[
                        isSelectedTab(tab.value)
                            ? 'text-primary-500'
                            : 'text-gray-400 hover:text-gray-600 hover:border-gray-200',
                        'whitespace-nowrap flex py-4 px-1 text-sm cursor-pointer relative',
                    ]"
                    :aria-current="tab.current ? 'page' : undefined"
                >
                    {{ tab.name }}
                    <span
                        v-if="tab.count"
                        :class="[
                            isSelectedTab(tab.value)
                                ? 'bg-primary-500/[0.2] text-primary-500'
                                : 'bg-gray-100 text-gray-400',
                            'hidden ml-3 py-0.5 px-2.5 rounded-xl text-xs md:inline-block',
                        ]"
                        >{{ tab.count }}</span
                    >
                    <span
                        class="
                            bg-primary-500
                            w-full
                            inline-block
                            h-1
                            absolute
                            -bottom-2
                            left-0
                        "
                        v-if="isSelectedTab(tab.value)"
                    />
                </a>
            </nav>
            <div class="px-12 py-2 flex items-center">
                <template v-if="buttonItems">
                    <slot name="buttons" />
                </template>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { router } from "@inertiajs/vue3";
import pickBy from "lodash/pickBy";

const props = defineProps({
    tabs: {
        type: Object,
    },
    buttonItems: {
        type: Boolean,
        default: false,
    },
    activeTab: {
        type: String,
        default: null,
    },
    tabRoute: {
        type: String,
        required: true,
    },
    preserveState: {
        type: Boolean,
        default: false,
    },
})

const emit = defineEmits(['update:tab'])

const isSelectedTab = (value) => {
    return props.activeTab === value;
}

const selectTab = (value) => {
    router.get(
        props.tabRoute,
        pickBy({ tab: value }), // removes falsey values
        {
            preserveState: props.preserveState,
            onSuccess: () => {
                emit("update:tab", value);
            },
        }
    );
}
</script>
