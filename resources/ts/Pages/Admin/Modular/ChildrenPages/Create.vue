<template>
    <admin-layout
    title="Create Child Page"
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
            <jet-form-section>
                <template #title>
                    Child Page
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
                            :error="form.errors.image_path"
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
                        <text-input
                            v-model="form.subtitle"
                            label="Subtitle"
                            id="subtitle"
                            :error="form.errors.subtitle"
                            textarea
                        />
                    </div>
                    <div class="col-span-12">
                        <text-input
                            v-model="form.description"
                            label="Description"
                            id="description"
                            :error="form.errors.description"
                            textarea
                        />
                    </div>
                </template>

                <template #actions>
                    <slot />
                </template>
            </jet-form-section>
            <meta-form 
                :form="form" 
            >
            </meta-form>
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
import MetaForm from "@/Components/Forms/MetaForm.vue";

const props = defineProps({
    item: {
        type: Object,
    },
    selectedTab: {
        type: String
    },
    sub_page_id: {   
        type: Number,
        default: null 
    }
});

/*---------------*
* Variables
*---------------*/

const formData = {
    sub_page_id: props.sub_page_id,
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
        href: route("admin.pages.child.index"),
        name: "Child Page",
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
const submitUrl = route("admin.pages.child.store", props.sub_page_id);
const { form, submit } = usePRXForm(
    formData,
    submitUrl
);
</script>