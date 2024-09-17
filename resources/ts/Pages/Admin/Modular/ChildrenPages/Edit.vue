<template>
    <admin-layout
        :title="item.title"
        :pages="pages"
        showButton
    >
        <!-- Tabs -->
        <div>
            <Tabs
                :tabs="tabs"
                :button-items="true"
                :active-tab="activeTab"
                @update:tab="(value: string) => (activeTab = value)"
                :tab-route="route('admin.pages.child.edit', item.id)"
                :preserve-state="true"
            />
        </div>

        

        <div class="p-4 !pt-0 md:p-7">
            <div v-if="activeTab == null">
                <jet-form-section>
                    <template #title>
                        {{ form.title }}
                    </template>

                    <template #description>
                        Relevant data and other details
                    </template>

                    <template #form>
                        <div class="col-span-12">
                            <text-input
                                v-model="form.title"
                                label="Title"
                                id="title"
                                :error="form.errors.title"
                            />
                        </div>
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
                                v-model="form.header"
                                textarea
                                label="Header"
                                id="header"
                                :error="form.errors.header"
                            />
                        </div>
                        <div class="col-span-12">
                            <ck-editor
                                v-model="form.subtitle"
                                label="Subtitle"
                                id="subtitle"
                                :error="form.errors.subtitle"
                            ></ck-editor>
                        </div>
                        <div class="col-span-12">
                            <ck-editor
                                v-model="form.description"
                                label="Description"
                                id="description"
                                :error="form.errors.description"
                            ></ck-editor>
                        </div>
                    </template>

                    <template #actions>
                        <slot />
                    </template>
                </jet-form-section>
            </div>
            <frame-index 
                v-if="activeTab == 'frames'" 
                :create-route="'admin.pages.child.create-frame'" 
                :edit-route="'admin.pages.child.edit-frame'" 
                :id="item.id" 
                :frames="frames"
            />
            <children-index 
                v-if="activeTab == 'children-pages'" 
                :item="item" 
                :children-pages="childrenPages"
            />
            <meta-form 
                v-if="activeTab == 'seo-meta-data'" 
                :form="form" 
            />
        </div>
        <template #buttons>
            <action-button @click="submit">
                Save Changes
            </action-button>
        </template>
    </admin-layout>
</template>

<script setup lang="ts">
// Packages
import usePRXForm from "@/composables/usePRXForm.ts";
import { ref } from 'vue'

// Components
import MetaForm from "@/Components/Forms/MetaForm.vue";
import FrameIndex from "../Components/FrameIndex.vue";
import ChildrenIndex from "../Components/ChildrenIndex.vue";

const props = defineProps({
    item: {
        type: Object,
    },
    frames: {
        type: Object,
    },
    subPages: {
        type: Object,
    },
    childrenPages: {
        type: Object,
    },
    selectedTab: {
        type: String
    },
});

/*---------------*S
* Variables
*---------------*/

const formData = {
    title: props.item.title,
    image: props.item.image,
    header: props.item.header,
    subtitle: props.item.subtitle,
    description: props.item.description,

    meta_title: props.item.meta_title,
    meta_description: props.item.meta_description,
    meta_keyword: props.item.meta_keyword,
    meta_image: props.item.meta_image,
};

const pages = [
    {
        href: route("admin.pages.parent.index"),
        name: "Child Page",
    },
    {
        href: "",
        name: "Edit",
    },
];

const activeTab = ref<string>(props.selectedTab);
const tabs = ref<{ name: string, value?: string}[]>([
    {
        name: 'Information',
        value: null,
    },
    {
        name: 'Frames',
        value: 'frames',
    },
    {
        name: 'SEO Meta Data',
        value: 'seo-meta-data',
    },
]);

/*--------------*
* Functions
*--------------*/
const submitUrl = route("admin.pages.child.update", props.item.id);
const { form, submit } = usePRXForm(
    formData,
    submitUrl
);
</script>