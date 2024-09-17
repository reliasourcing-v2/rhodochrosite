<template>
    <div
        class="flex justify-between items-center py-5 px-6 rounded-lg transition"
        :class="[value ? 'bg-gray-50' : 'bg-white']"
    >
        <div
            class="cursor-pointer select-none"
            @click="$emit('change', !value)"
        >
            <h5 class="font-bold text-sm leading-6">{{ label }}</h5>
            <p class="mt-1 text-sm text-gray-900">
                {{ description }}
            </p>
        </div>
        <div class="flex items-center">
            <Switch
                v-model="switchValue"
                :class="switchValue ? 'bg-primary-800' : 'bg-gray-300'"
                class="relative inline-flex h-6 w-11 items-center rounded-full transition"
            >
                <span class="sr-only">{{ label }}</span>
                <span
                    :class="switchValue ? 'translate-x-6' : 'translate-x-1'"
                    class="inline-block h-4 w-4 transform rounded-full bg-white transition"
                />
            </Switch>
        </div>
    </div>
</template>

<script setup lang="ts">
import { computed } from 'vue';
import { Switch } from "@headlessui/vue";

const props = defineProps({
    value: {
        default: null,
        required: true,
    },
    label: {
        default: null,
        required: true,
    },
    description: {
        default: null,
        required: false,
    },
})

const emit = defineEmits(['change'])
const switchValue = computed ({
    get() {
        return props.value;
    },
    set(value) {
        emit('change', value);
    }
});
</script>
