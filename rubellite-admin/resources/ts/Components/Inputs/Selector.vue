<template>
    <Listbox
    as="div"
    :modelValue="modelValue"
    :disabled="disabled"
    @update:model-value="$emit('update:modelValue', $event.id)"
    >
        <ListboxLabel v-if="label" class="block text-sm text-gray-500 mb-2">
            {{ label }}<span v-if="required" class="text-red-600 ml-0.5">*</span>
        </ListboxLabel>
        <div class="relative">
            <ListboxButton
            class="
                relative
                w-full
                bg-white
                border
                rounded
                pl-4
                pr-10
                h-11
                text-left
                cursor-default
                focus:outline-none focus:ring-1
                disabled:bg-gray-100
            "
            :class="[
                error
                    ? 'focus:ring-red-500 focus:border-red-500 border-red-500'
                    : 'text-gray-800 border-gray-200 focus:ring-gray-900 focus:border-gray-900 disabled:bg-gray-200',
                readonly ? 'pointer-events-none cursor-default' : ''
            ]"
            >
                <span v-if="selected"
                class="block truncate text-sm">
                    {{ selected }}
                </span>
                <span
                    v-else
                    class="block text-sm">
                    {{ placeholder }}
                </span>
            </ListboxButton>
            <template v-if="modelValue && !disabled">
                <span
                    @click="clearValue"
                    class="
                        absolute
                        inset-y-0
                        right-0
                        flex
                        items-center
                        pr-2
                        z-10
                        cursor-pointer
                    "
                    title="Clear Filter"
                >
                    <XMarkIcon class="h-5 w-5 text-gray-500" aria-hidden="true" />
                </span>
            </template>
            <template v-else>
                <span
                    class="
                        absolute
                        inset-y-0
                        right-0
                        flex
                        items-center
                        pr-2
                        z-10
                        cursor-pointer
                    "
                >
                    <ChevronUpDownIcon class="h-5 w-5 text-gray-500" aria-hidden="true" />
                </span>
            </template>

            <transition
                leave-active-class="transition ease-in duration-100"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
            >
                <ListboxOptions
                    class="
                        absolute
                        z-20
                        mt-1
                        w-full
                        bg-white
                        shadow-lg
                        max-h-60
                        rounded-md
                        py-1
                        text-base
                        ring-1 ring-black ring-opacity-5
                        overflow-auto
                        focus:outline-none
                        list-none
                        pl-0
                    "
                    :class="topOptions ? 'bottom-12' : ''"
                >
                    <ListboxOption
                        as="template"
                        v-for="item in options"
                        :key="item.id"
                        :value="item"
                        :disabled="item.unavailable"
                        :hidden="item.hidden"
                        @click="select(item.id)"
                    >
                        <li
                            :class="[
                                modelValue == item.id
                                ? 'bg-gray-300'
                                : item.unavailable
                                ? 'text-gray-900'
                                : 'text-gray-900 hover:bg-primary-50',
                                'cursor-default select-none relative py-2 px-3',
                            ]"
                        >
                            <span
                                :class="[
                                    'block truncate text-sm',
                                ]"
                            >
                                {{ item.value }}
                            </span>
                        </li>
                    </ListboxOption>
                </ListboxOptions>
            </transition>
        </div>
        <p
            v-if="error"
            class="mt-2 text-sm"
            :class="error ? 'text-red-600' : 'text-gray-800'"
            id="email-error"
        >
            {{ error }}
        </p>
    </Listbox>
</template>

<script setup lang="ts">
import { computed } from "vue";
import {
    Listbox,
    ListboxButton,
    ListboxLabel,
    ListboxOption,
    ListboxOptions,
} from "@headlessui/vue";
import { XMarkIcon, ChevronUpDownIcon } from "@heroicons/vue/24/solid";

const props = defineProps({
    modelValue: {
        default: null,
        required: true,
    },
    options: {
        type: Object,
        required: true,
    },
    label: {
        type: String,
        default: "",
    },
    error: {
        type: String,
        default: "",
    },
    placeholder: {
        type: String,
        default: "",
    },
    disabled: {
        type: Boolean,
        default: false,
    },
    required: {
        type: Boolean,
        default: false
    },
    readonly: {
        type: Boolean,
        default: false
    },
    topOptions: {
        type: Boolean,
        default: false
    }
});

const emit = defineEmits(['update:modelValue'])

const selected = computed(() => {
    const option = props.options.find(x => x.id == props.modelValue);
    if(option) {
        return option.value;
    }
    else {
        return props.placeholder;
    }
});

const select = (id) => {
    emit('update:modelValue', id);
}

const clearValue = () => {
    emit("update:modelValue", null);
}
</script>
