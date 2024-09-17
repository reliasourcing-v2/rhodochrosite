<template>
    <TransitionRoot
        :show="show"
        enter="transition-opacity duration-75"
        enter-from="opacity-0"
        enter-to="opacity-100"
        leave="transition-opacity duration-150"
        leave-from="opacity-100"
        leave-to="opacity-0"
    >
        <div v-if="message()" :class="`bg-${color()}-50 p-4`">
            <div class="flex">
                <div class="flex-shrink-0">
                    <CheckCircleIcon
                        :class="`h-5 w-5 text-${color()}-400`"
                        aria-hidden="true"
                        v-if="success !== null"
                    />
                    <XCircleIcon
                        :class="`h-5 w-5 text-${color()}-400`"
                        aria-hidden="true"
                        v-else-if="danger !== null"
                    />
                    <ExclamationCircleIcon
                        :class="`h-5 w-5 text-${color()}-400`"
                        aria-hidden="true"
                        v-else-if="warning !== null"
                    />
                    <ChatBubbleBottomCenterTextIcon
                        :class="`h-5 w-5 text-${color()}-400`"
                        aria-hidden="true"
                        v-else
                    />
                </div>
                <div class="ml-3">
                    <p
                        :class="`text-sm font-medium text-${color()}-800`"
                        v-html="message()"
                    />
                </div>
                <div class="ml-auto pl-3">
                    <div class="-mx-1.5 -my-1.5">
                        <button
                            type="button"
                            :class="`
                                inline-flex
                                rounded-md
                                p-1.5
                                focus:outline-none
                                focus:ring-2
                                focus:ring-offset-2
                                bg-${color()}-50 text-${color()}-500 hover:bg-${color()}-100 focus:ring-offset-${color()}-50 focus:ring-${color()}-600
                            `"
                        >
                            <span class="sr-only">Dismiss</span>
                            <XCircleIcon class="h-5 w-5" aria-hidden="true" @click="show = false" />
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </TransitionRoot>
</template>

<script lang="ts" setup>
import {
    CheckCircleIcon,
    XCircleIcon,
    ExclamationCircleIcon,
    ChatBubbleBottomCenterTextIcon,
} from "@heroicons/vue/24/solid";
import { ref, computed } from "vue";
import { usePage } from "@inertiajs/vue3";
import { TransitionRoot } from "@headlessui/vue";

const success = computed(() => usePage<any>().props.flash.success);
const danger = computed(() => usePage<any>().props.flash.danger);
const warning = computed(() => usePage<any>().props.flash.warning);
const show = ref(
    success.value !== null || danger.value !== null || warning.value !== null
);

const message = () => {
    if (success.value !== null) {
        return success.value;
    } else if (danger.value !== null) {
        return danger.value;
    } else if (warning.value !== null) {
        return warning.value;
    }
}

const color = () => {
    if (success.value !== null) {
        return "green";
    } else if (danger.value !== null) {
        return "red";
    } else if (warning.value !== null) {
        return "yellow";
    } else {
        return "slate";
    }
}
</script>
