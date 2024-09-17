<template>
    <TransitionRoot as="template" :show="show">
        <Dialog
            as="div"
            auto-reopen="true"
            class="fixed z-50 inset-0 overflow-y-auto"
            @close="open = false"
        >
            <div
                class="
                    flex
                    items-end
                    justify-center
                    min-h-screen
                    pt-4
                    px-4
                    pb-20
                    text-center
                    sm:block sm:p-0
                "
            >
                <TransitionChild
                    as="template"
                    enter="ease-out duration-300"
                    enter-from="opacity-0"
                    enter-to="opacity-100"
                    leave="ease-in duration-200"
                    leave-from="opacity-100"
                    leave-to="opacity-0"
                >
                    <DialogOverlay
                        class="
                            fixed
                            inset-0
                            bg-gray-500 bg-opacity-75
                            transition-opacity
                        "
                    />
                </TransitionChild>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span
                    class="hidden sm:inline-block sm:align-middle sm:h-screen"
                    aria-hidden="true"
                    >&#8203;</span
                >
                <TransitionChild
                    as="template"
                    enter="ease-out duration-300"
                    enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    enter-to="opacity-100 translate-y-0 sm:scale-100"
                    leave="ease-in duration-200"
                    leave-from="opacity-100 translate-y-0 sm:scale-100"
                    leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                >
                    <div
                        class="
                            inline-block
                            align-bottom
                            bg-white
                            rounded-lg
                            px-4
                            pt-5
                            pb-4
                            text-left
                            overflow-hidden
                            shadow-xl
                            transform
                            transition-all
                            sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6
                        "
                    >
                        <div
                            class="
                                hidden
                                sm:block
                                absolute
                                top-0
                                right-0
                                pt-4
                                pr-4
                            "
                        >
                            <button
                                type="button"
                                class="
                                    bg-white
                                    rounded-md
                                    text-gray-400
                                    hover:text-gray-500
                                    focus:outline-none
                                "
                                @click="$emit('cancel')"
                            >
                                <span class="sr-only">Close</span>
                                <XCircleIcon class="h-6 w-6" aria-hidden="true" />
                            </button>
                        </div>
                        <div class="sm:flex sm:items-start">
                            <div
                                class="
                                    mx-auto
                                    flex-shrink-0 flex
                                    items-center
                                    justify-center
                                    h-12
                                    w-12
                                    rounded-full
                                    bg-gray-100
                                    sm:mx-0 sm:h-10 sm:w-10
                                "
                            >
                                <PlusIcon class="h-5 w-5" aria-hidden="true" />
                            </div>
                            <div
                                class="
                                    mt-3
                                    text-center
                                    sm:mt-0 sm:ml-4 sm:text-left
                                "
                            >
                                <DialogTitle
                                    as="h3"
                                    class="
                                        leading-6
                                        font-bold
                                        text-s-primary-500
                                    "
                                >
                                    {{ title }}
                                </DialogTitle>
                                <div class="">
                                    <p class="text-sm text-s-primary-500">
                                        {{
                                            itemName
                                                ? `Are you sure you wish to delete ${itemName}?`
                                                : content
                                        }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full py-3">
                            <slot name="body" />
                        </div>
                        <a
                            v-if="withManifest"
                            :href="manifestRoute"
                            class="text-blue-500 mt-3 inline-block"
                        >
                            Download Sample Manifest
                        </a>
                        <div class="mt-4 flex justify-end">
                            <action-button
                                type="button"
                                @click="$emit('cancel')"
                                fill="secondary"
                                class="mr-2"
                            >
                                {{ cancelText }}
                            </action-button>
                            <action-button type="button" @click="$emit('confirm')">
                                {{ actionText }}
                            </action-button>
                        </div>
                    </div>
                </TransitionChild>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script>
import {
    Dialog,
    DialogOverlay,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";
import { PlusIcon, XCircleIcon } from "@heroicons/vue/24/outline";

export default {
    components: {
        Dialog,
        DialogOverlay,
        DialogTitle,
        TransitionChild,
        TransitionRoot,
        PlusIcon,
        XCircleIcon,
    },
    props: {
        show: {
            type: Boolean,
            default: false,
        },
        title: {
            type: String,
            default: "Approve Item",
        },
        content: {
            type: String,
            default: "Are you sure you want to approve this item?",
        },
        itemName: {
            type: String,
            default: null,
        },
        actionText: {
            type: String,
            default: "Approve",
        },
        cancelText: {
            type: String,
            default: "Cancel",
        },
        withManifest: {
            type: Boolean,
            default: true,
        },
        manifestRoute: {
            type: String,
            required: true,
        },
    },
};
</script>
