<template>
    <TransitionRoot as="template" :show="show">
        <Dialog as="div" class="relative z-50" @close="$emit('close')">
            <div class="fixed inset-0 bg-black/20" />

            <div class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                        <TransitionChild 
                        as="template" 
                        enter="transform transition ease-in-out" 
                        enter-from="translate-x-full" 
                        enter-to="translate-x-0" 
                        leave="transform transition ease-in-out" 
                        leave-from="translate-x-0" 
                        leave-to="translate-x-full">
                            <DialogPanel class="pointer-events-auto w-screen max-w-md">
                                <div class="flex h-full flex-col overflow-y-scroll bg-white py-6">
                                    <div class="px-4 sm:px-6">
                                        <div class="flex items-start justify-between">
                                            <DialogTitle class="text-base font-semibold leading-6 text-gray-900">
                                                {{ title }}
                                            </DialogTitle>
                                            
                                        </div>
                                    </div>
                                    <div class="relative mt-6 flex-1 px-4 sm:px-6">
                                        <slot name="body" />
                                    </div>
                                    <div class="px-4 sm:px-6">
                                        <slot name="footer" />
                                    </div>
                                </div>
                            </DialogPanel>
                        </TransitionChild>
                    </div>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script setup lang="ts">
import { 
    Dialog, 
    DialogPanel, 
    DialogTitle, 
    TransitionChild, 
    TransitionRoot 
} from '@headlessui/vue'

defineProps({
    show: {
        type: Boolean,
        default: false
    },
    title: {
        type: String,
    }
})
</script>