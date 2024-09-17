<template>
    <admin-layout
        title="Create Card"
        :pages="pages"
        showButton
    >
        <div class="p-4 md:p-7 space-y-5">
            <jet-form-section>
                <template #title>
                    Card
                </template>

                <template #description>
                    Relevant data and other details
                </template>

                <template #form>
                    <div class="col-span-12">
                        <dropzone
                            label="Image"
                            v-model:path="form.image"
                            v-model:file="form.image"
                            description="Max file size: 10MB | Dimension: 300px x 434px"
                            :error="form.errors.image"
                        ></dropzone>
                    </div>
                    <div class="col-span-12">
                        <text-input
                            v-model="form.title"
                            label="Title"
                            id="title"
                            :error="form.errors.title"
                        />
                    </div>
                    <div class="col-span-12">
                        <ck-editor
                            v-model="form.content"
                            label="Content"
                            id="content"
                            :error="form.errors.content"
                        ></ck-editor>
                    </div>
                    <div class="col-span-12">
                        <label class="flex items-center cursor-pointer">
                            <jet-checkbox v-model="form.accent" :checked="form.accent == 1"/>
                            <span class="ml-2 text-sm text-gray-600">With accent color</span>
                        </label>
                    </div>
                </template>

                <template #actions>
                    <slot />
                </template>
            </jet-form-section>
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
import usePRXForm from "@/composables/usePRXForm.ts";
import { computed, ref } from 'vue';
// Components

const props = defineProps({
    item: {
        type: Object,
    },
    selectedTab: {
        type: String
    },
    frame_id: { 
        type: Number, 
        default: null 
    },
});

/*---------------*
* Variables
*---------------*/
const isSubpage = computed(()=>window.location.pathname.includes('/admin/pages/subpage/'));
const isChild = computed(()=>window.location.pathname.includes('/admin/pages/child/'));


const formData = {
    frame_id: props.frame_id,
    title: null,
    content: null,
    image: null,
    accent: null,
};

const pages = [
    {
        href: route("admin.pages.parent.edit-frame", props.frame_id),
        name: "Frames",
    },
    {
        href: "",
        name: "Create Card",
    },
];

/*--------------*
* Functions
*--------------*/
const submitUrl = isSubpage.value ? route("admin.pages.subpage.store-frame-card", props.frame_id) :
                  isChild.value ? route("admin.pages.child.store-frame-card", props.frame_id) :
                  route("admin.pages.parent.store-frame-card", props.frame_id);
const { form, submit } = usePRXForm(
    formData,
    submitUrl
);
</script>