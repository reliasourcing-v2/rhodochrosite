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
                        class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
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
                        <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
                            <button
                                type="button"
                                class="
                                    bg-white
                                    rounded-md
                                    text-gray-400
                                    hover:text-gray-500
                                    focus:outline-none
                                "
                                @click="cancel"
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
                                    bg-red-100
                                    sm:mx-0 sm:h-10 sm:w-10
                                "
                            >
                                <ExclamationCircleIcon
                                    class="h-6 w-6 text-red-600"
                                    aria-hidden="true"
                                />
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <DialogTitle
                                    as="h3"
                                    class="text-lg leading-6 font-medium text-gray-900"
                                >
                                    {{ title }}
                                </DialogTitle>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        {{
                                            itemName
                                                ? `Are you sure you wish to delete ${itemName}?`
                                                : content
                                        }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                            <button
                                type="button"
                                class="
                                    w-full
                                    inline-flex
                                    justify-center
                                    rounded-md
                                    border border-transparent
                                    shadow-sm
                                    px-4
                                    py-2
                                    bg-red-600
                                    text-base
                                    font-medium
                                    text-white
                                    hover:bg-red-700
                                    focus:outline-none
                                    focus:ring-2
                                    focus:ring-offset-2
                                    focus:ring-red-500
                                    sm:ml-3 sm:w-auto sm:text-sm
                                "
                                @click="confirm"
                            >
                                {{ actionText }}
                            </button>
                            <button
                                type="button"
                                class="
                                    mt-3
                                    w-full
                                    inline-flex
                                    justify-center
                                    rounded-md
                                    border border-gray-300
                                    shadow-sm
                                    px-4
                                    py-2
                                    bg-white
                                    text-base
                                    font-medium
                                    text-gray-700
                                    hover:text-gray-500
                                    focus:outline-none
                                    focus:ring-2
                                    focus:ring-offset-2
                                    focus:ring-primary-300
                                    sm:mt-0 sm:w-auto sm:text-sm
                                "
                                @click="cancel"
                            >
                                {{ cancelText }}
                            </button>
                        </div>
                    </div>
                </TransitionChild>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script>
import { ref } from "vue";
import {
    Dialog,
    DialogOverlay,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";
import { ExclamationCircleIcon, XCircleIcon } from "@heroicons/vue/24/outline";

export default {
    components: {
        Dialog,
        DialogOverlay,
        DialogTitle,
        TransitionChild,
        TransitionRoot,
        ExclamationCircleIcon,
        XCircleIcon,
    },
    props: {
        show: {
            type: Boolean,
            default: false,
        },
        title: {
            type: String,
            default: "Delete Item",
        },
        content: {
            type: String,
            default: "Are you sure you want to delete this item?",
        },
        itemName: {
            type: String,
            default: null,
        },
        actionText: {
            type: String,
            default: "Delete",
        },
        cancelText: {
            type: String,
            default: "Cancel",
        },
    },
    setup(props, context) {

        function confirm() {
            context.emit("confirm");
        }

        function cancel() {
            context.emit("cancel");
        }

        return {
            confirm,
            cancel,
        };
    },
};
</script>
