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
                :tab-route="route('admin.pages.parent.edit', item.id)"
                :preserve-state="true"
            />
        </div>

        <div class="p-4 !pt-0 md:p-7">
            <div v-if="activeTab == null">
                <form-section :form="form" />
            </div>
            <frame-index 
                v-if="activeTab == 'frames'" 
                :create-route="'admin.pages.parent.create-frame'" 
                :edit-route="'admin.pages.parent.edit-frame'" 
                :id="item.id" 
                :frames="frames"
            />
            <div v-if="activeTab == 'sub-pages'" >
                <subpage-index 
                    :item="item" 
                    :sub-pages="subPages"
                />
            </div>
            <meta-form 
            v-if="activeTab == 'seo-meta-data'" 
                :form="form" 
            />
            <div v-if="activeTab == 'archived'" >
                <subpage-index 
                    :item="item" 
                    :sub-pages="archivedSubPages"
                />
            </div>
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
import FormSection from "./FormSection.vue";
import FrameIndex from "./Components/FrameIndex.vue";
import SubpageIndex from "./Components/SubpageIndex.vue";

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
    archivedSubPages: {
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
        name: "Modular Page",
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
        name: 'Sub Pages',
        value: 'sub-pages',
    },
    {
        name: 'SEO Meta Data',
        value: 'seo-meta-data',
    },
]);

/*--------------*
* Functions
*--------------*/
const submitUrl = route("admin.pages.parent.update", props.item.id);
const { form, submit } = usePRXForm(
    formData,
    submitUrl
);
</script>