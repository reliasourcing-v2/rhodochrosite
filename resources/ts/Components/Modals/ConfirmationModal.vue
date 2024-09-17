<template>
    <modal :id="id" :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">
        <div class="bg-white p-6 rounded-lg border">
            <div class="flex items-center space-x-4 mb-6">
                <div
                    class="
                    mx-auto
                    flex-shrink-0 flex
                    items-center
                    justify-center
                    h-12
                    w-12
                    rounded-full
                    bg-primary-50
                    sm:mx-0 sm:h-12 sm:w-12
                    "
                >
                    <QuestionMarkCircleIcon
                        class="h-6 w-6 text-primary-800"
                        aria-hidden="true"
                    />
                </div>
                <div>
                    <p class="text-[18px] font-bold text-gray-900">{{  title }}</p>
                    <p class="text-gray-500 text-sm">{{ description }}</p>
                    <slot name="headerText"></slot>
                </div>
            </div>
            <slot name="content" class="mb-6"></slot>
            <div class="flex space-x-2 justify-end">
                <slot name="button"></slot>
            </div>
        </div>
    </modal>
</template>

<script>
import Modal from '@/Components/Modals/Modal.vue';
import { QuestionMarkCircleIcon } from "@heroicons/vue/24/solid";

export default {
    emits: ['close'],

    components: {
        Modal,
        QuestionMarkCircleIcon,
    },

    props: {
        id: {
            type: String,
        },
        title: {
            type: String,
            default: null
        },
        description: {
            type: String,
            default: null
        },
        show: {
            default: false
        },
        maxWidth: {
            default: 'lg'
        },
        closeable: {
            default: true
        },
    },

    methods: {
        close() {
            this.$emit('close')
        },
    }
}
</script>
