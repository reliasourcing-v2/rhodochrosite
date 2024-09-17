<template>
    <admin-layout
    title="Create Modular Page"
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
                :tab-route="''"
                :preserve-state="true"
            />
        </div>
        <div class="p-4 !pt-0 md:p-7">
            <form-section :form="form" />
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
import FormSection from "./FormSection.vue";

const props = defineProps({
    item: {
        type: Object,
    },
    selectedTab: {
        type: String
    },
});

/*---------------*
* Variables
*---------------*/

const formData = {
    title: null,
    image: null,
    header: null,
    subtitle: null,
    description: null,

    meta_title: null,
    meta_description: null,
    meta_keyword: null,
    meta_image: null,

};

const pages = [
    {
        href: route("admin.pages.parent.index"),
        name: "Modular Page",
    },
    {
        href: "",
        name: "Create",
    },
];

const activeTab = ref<string>(props.selectedTab);
const tabs = ref<{ name: string, value?: string}[]>([
    {
        name: 'Information',
        value: null,
    },
]);

/*--------------*
* Functions
*--------------*/
const submitUrl = route("admin.pages.parent.store");
const { form, submit } = usePRXForm(
    formData,
    submitUrl
);
</script>