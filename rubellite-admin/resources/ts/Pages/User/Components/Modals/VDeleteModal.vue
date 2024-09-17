<template>
    <div>
        <modal :id="id" :show="show" :max-width="maxWidth" :closeable="closeable" @close="close" :cstmClass="cstmClass">
            <div class="bg-white p-6 rounded-none border">
                <div class="flex items-center text-center mb-6">
                    <div class="w-[48px] h-[48px] flex justify-center items-center bg-red-600 bg-opacity-10 rounded-full">
                        <TrashIcon class="h-5 w-5 text-red-600" aria-hidden="true" />
                    </div>
                    <div class="flex flex-col justify-center ml-4">
                        <p class="text-lg text-left font-bold text-gray-800">{{  title }}</p>
                        <p class=" text- text-gray-500">{{ description }}</p>
                    </div>
                    <slot name="headerText"></slot>
                </div>
                <slot name="content" class="mb-6"></slot>
                <div class="flex space-x-2 justify-end">
                    <slot name="button"></slot>
                </div>
            </div>
        </modal>
    </div>
</template>

<script>
import Modal from '@/Components/Modals/Modal.vue';
import { TrashIcon } from "@heroicons/vue/24/solid";

export default {
    emits: ['close'],

    components: {
        Modal,
        TrashIcon
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
        cstmClass: {
            type: String,
            default: 'rounded-none'
        }
    },

    methods: {
        close() {
            this.$emit('close')
        },
    }
}
</script>
