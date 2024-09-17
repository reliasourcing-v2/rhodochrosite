<template>
    <admin-layout
        title="Create Frame"
        :pages="pages"
        showButton
    >
        <div class="p-4 md:p-7 space-y-5">
            <text-input
                v-model="form.label"
                label="Label"
                id="label"
                :error="form.errors.label"
            />

            <div>
                <div class="block text-sm text-gray-500 mb-2">Frame Types</div>

                <div class="grid grid-cols-3 gap-6">
                    <label 
                        for="image-text" 
                        class="border rounded p-3 transition" 
                        :class="form.frame_type == 1 ? 'border-primary-500 bg-primary-500 hover:bg-primary-500' : 'hover:bg-primary-500/[0.5]'"
                    >
                        <input id="image-text" type="radio" name="frame-type" class="hidden" :value="1" v-model="form.frame_type">
                        <div class="w-full flex space-x-3">
                            <div class="w-4/12">
                                <div class="aspect-w-1 aspect-h-1 bg-primary-50"></div>
                            </div>
                            <div class="w-7/12 space-y-3 flex justify-between flex-col">
                                <div class="space-y-3">
                                    <div class="w-1/2 h-3 bg-primary-50"></div>
                                    <div class="w-full h-3 bg-primary-50"></div>
                                    <div class="w-full h-3 bg-primary-50"></div>
                                    <div class="w-full h-3"></div>
                                </div>
                                <div class="w-1/4 h-3 bg-primary-50"></div>
                            </div>
                        </div>
                    </label>
                    <label 
                        for="image-card" 
                        class="border rounded p-3 flex items-center transition" 
                        :class="form.frame_type == 2 ? 'border-primary-500 bg-primary-500 hover:bg-primary-500' : 'hover:bg-primary-500/[0.5]'"
                    >
                        <input id="image-card" type="radio" name="frame-type" class="hidden" :value="2" v-model="form.frame_type">
                        <div class="grid grid-cols-3 gap-3 w-full">
                            <div v-for="i in 3">
                                <div class="aspect-w-1 aspect-h-1 bg-primary-50"></div>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
        </div>
        <template #buttons>
            <action-button @click="submit">
                Create
            </action-button>
        </template>
    </admin-layout>
</template>

<script setup lang="ts">
// Packages
import { ref } from "vue";
import usePRXForm from "@/composables/usePRXForm.ts";

// Components

const props = defineProps({
    item: {
        type: Object,
    },
    languages: {
        type: Object
    },
    selectedTab: {
        type: String
    },
    parent_page_id: { 
        type: Number, 
        default: null 
    },
});

/*---------------*
* Variables
*---------------*/

const formData = {
    parent_page_id: props.parent_page_id,
    label: null,
    frame_type: null,
};

const pages = [
    {
        href: route("admin.pages.parent.create-frame", props.parent_page_id),
        name: "Frames",
    },
    {
        href: "",
        name: "Create",
    },
];

/*--------------*
* Functions
*--------------*/
const submitUrl = route("admin.pages.parent.store-frame", props.parent_page_id);
const { form, submit } = usePRXForm(
    formData,
    submitUrl
);
</script>