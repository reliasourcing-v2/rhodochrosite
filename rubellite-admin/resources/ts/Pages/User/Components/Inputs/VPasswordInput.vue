<template>
    <div class="relative">
        <v-text-input
            :modelValue="modelValue"
            :type="hidden ? 'password' : 'text'"
            :label="label"
            :placeholder="placeholder"
            :name="name"
            :id="id"
            customInputClass="pr-11"
            @update:modelValue="(value: string) => $emit('update:modelValue', value)"
            :error="error"
        />
        <div class="absolute right-0 bottom-0">
            <button
                type="button"
                tabindex="-1"
                class="border-0 h-11 w-11"
                @click="hidden = !hidden"
            >
                <EyeIcon
                    v-if="hidden"
                    class="h-5 w-5 my-auto mx-auto text-[#8B9AB1]"
                    aria-hidden="true"
                />
                <EyeSlashIcon
                    v-if="!hidden"
                    class="h-5 w-5 my-auto mx-auto text-[#8B9AB1]"
                    aria-hidden="true"
                />
            </button>
        </div>
    </div>
</template>

<script setup lang="ts">
import { EyeIcon, EyeSlashIcon } from "@heroicons/vue/24/solid";
import { ref } from "vue";

defineProps({
    modelValue: {
        default: null,
        required: true,
    },
    placeholder: {
        type: String,
        default: null,
    },
    name: {
        type: String,
        default: null,
    },
    id: {
        type: String,
        default: null,
    },
    label: {
        type: String,
        default: null,
    },
    error: {
        type: String,
        default: null,
    },
    type: {
        type: String,
        default: "text",
    },
});

const hidden = ref(true);
</script>
